<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class Download
{
    public static function downloadPDFByLink(string $link)
    {
        try {
            $path = 'boletos/';
            if (!Storage::exists($path)) {
                Storage::makeDirectory($path, 0775, true);
            }
            $nameFile = $path . Uuid::uuid4() . '.pdf';
            Storage::put($nameFile,  fopen($link, 'r'));

            return $nameFile;
        } catch (Exception $e) {
        }
        return false;
    }

    public static function downloadImagePixEncodeImg($base64_string)
    {
        $path = 'pix/';
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path, 0775, true);
        }
        $nameFile = $path . Uuid::uuid4() . '.jpg';

        Storage::put($nameFile,  base64_decode($base64_string));
        return $nameFile;
    }
}
