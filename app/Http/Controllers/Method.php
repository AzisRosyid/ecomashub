<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Google_Client;
use Google_Service_PhotosLibrary;
use Google_Service_PhotosLibrary_MediaItem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Google\Client;
use Google\Service\Drive;
use Google\Service\Drive\PermissionTeamDrivePermissionDetails;
use Illuminate\Support\Facades\Session;

class Method extends Controller
{
    public static $token = "ErK8s*7MT8-F";
    public static $baseUrl = "http://192.168.21.1:8021/api/";
    public static $googleDrive = [
        'imageThumbnail' => 'https://drive.google.com/thumbnail?id=',
    ];

    private $imageMimeTypes = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/jpg',
    ];

    public static function auth($profile, $admin = false)
    {
        if ($profile->successful()) {
            $refreshToken = Http::withToken(session('token'))->get(Method::$baseUrl . 'Auth/RefreshToken');
            session(['token' => $refreshToken['token']]);
            if ($admin) {
                if ($profile['user']['role'] == "Admin") {
                    return true;
                }
            } else {
                return true;
            }
        }
        return false;
    }

    public static function comparisonStatus($value, $comparisonValue)
    {
        return $value > $comparisonValue ? 'more' : ($value < $comparisonValue ? 'less' : 'equal');
    }

    private static function googleToken()
    {
        $clientId = \Config('services.google.client_id');
        $clientSecret = \Config('services.google.client_secret');
        $refreshToken = \Config('services.google.refresh_token');

        $response = Http::post('https://oauth2.googleapis.com/token', [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'refresh_token' => $refreshToken,
            'grant_type' => 'refresh_token',
        ]);

        $accessToken = json_decode((string)$response->getBody(), true)['access_token'];

        return $accessToken;
    }

    public static function uploadFile($path, $file, $name)
    {
        if ($file != null) {
            return Method::googleUploadFile($path, $file, $name);
        }
        return response('Failed');
    }

    private function googleUploadFile($path, $file, $name)
    {
        $accessToken = Method::googleToken();
        $fileName = Carbon::now()->format('Y_m_d_His') . '_' . $name . '.' . $file->getClientOriginalExtension();
        $mime = $file->getClientMimeType();

        try {
            $client = new Client();
            $client->setAccessToken($accessToken);
            $client->addScope(Drive::DRIVE);
            $driveService = new Drive($client);
            $folderId = \Config('services.google.folder_id');

            $folders = explode('/', $path);

            $parentId = $folderId;

            foreach ($folders as $folder) {
                $folderExists = $this->checkFolderExists($driveService, $parentId, $folder);

                if (!$folderExists) {
                    $newFolder = new Drive\DriveFile([
                        'name' => $folder,
                        'mimeType' => 'application/vnd.google-apps.folder',
                        'parents' => [$parentId],
                    ]);
                    $createdFolder = $driveService->files->create($newFolder, ['fields' => 'id']);
                    $parentId = $createdFolder->id;
                } else {
                    $parentId = $folderExists;
                }
            }

            $fileMetadata = new Drive\DriveFile([
                'name' => $fileName,
                'parents' => [$parentId],
            ]);

            $file = $driveService->files->create($fileMetadata, array(
                'data' => $file->getContent(),
                'mimeType' => $mime,
                'uploadType' => 'multipart',
                'fields' => 'id'
            ));
            printf("File ID: %s\n", $file->id);

            $permission = new Drive\Permission([
                'type' => 'anyone',
                'value' => 'anyone',
                'role' => 'reader',
            ]);

            $driveService->permissions->create($file->id, $permission);

            return [
                'type' => in_array($mime, $this::$imageMimeTypes) ? 'Gambar' : 'File',
                'provider' => 'Google Drive',
                'content' => $file->id,
            ];
        } catch (Exception $e) {
            response("Error Message: " . $e);
        }
    }

    private function checkFolderExists($driveService, $parentId, $folderName)
    {
        $query = "mimeType='application/vnd.google-apps.folder' and name='$folderName' and '$parentId' in parents and trashed=false";
        $response = $driveService->files->listFiles([
            'q' => $query,
            'fields' => 'files(id)',
        ]);
        $files = $response->getFiles();
        if (count($files) > 0) {
            return $files[0]->getId();
        } else {
            return false;
        }
    }

    public static function view($view = null, $data = [])
    {
        $stores = Store::all();

        $select = Session::get('store_id');

        return view($view, array_merge(compact('select', 'stores'), $data));
    }

    // public static function uploadToGooglePhotos($image, $productName)
    // {
    //     // Google API client setup
    //     $client = new Google_Client();
    //     $client->setAuthConfig('path/to/your/credentials.json');
    //     $client->setScopes([Google_Service_PhotosLibrary::PHOTOS]);

    //     $service = new Google_Service_PhotosLibrary($client);

    //     // Create a new media item
    //     $mediaItem = new Google_Service_PhotosLibrary_MediaItem();
    //     $mediaItem->setDescription($productName);

    //     // Upload the image
    //     $mediaItem = $service->mediaItems->batchCreate(
    //         new Google_Service_PhotosLibrary_BatchCreateMediaItemsRequest([
    //             'newMediaItems' => [$mediaItem],
    //             'albumId' => 'your-album-id', // Specify your album ID or create a new album
    //         ])
    //     )->getMediaItemResults()[0]->getMediaItem();

    //     // Get the link to the uploaded image
    //     return $mediaItem->getBaseUrl();
    // }
}
