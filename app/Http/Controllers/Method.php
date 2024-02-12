<?php

namespace App\Http\Controllers;

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

class Method extends Controller
{
    public static $token = "ErK8s*7MT8-F";
    public static $baseUrl = "http://192.168.21.1:8021/api/";

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

    private static function token()
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

    public static function uploadFile($file, $name)
    {
        return null;
        $accessToken = Method::token();
        if ($file != null) {
            $fileName = Carbon::now()->format('Y_m_d_His') . '_' . $name . '.' . $file->getClientOriginalExtension();
            $mime = $file->getClientMimeType();

            try {
                $client = new Client();
                $client->setAccessToken($accessToken);
                $client->addScope(Drive::DRIVE);
                $driveService = new Drive($client);
                $folderId = \Config('services.google.folder_id');

                $fileMetadata = new Drive\DriveFile([
                    'name' => $fileName,
                    'parents' => [$folderId],
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

                return $file->id;

                $url = 'https://drive.google.com/thumbnail?id=';
            } catch (Exception $e) {
                echo "Error Message: " . $e;
            }
        }
        return response('Failed');
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
