<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Google_Client;
use Google_Service_PhotosLibrary;
use Google_Service_PhotosLibrary_MediaItem;
use Illuminate\Support\Facades\Validator;

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
