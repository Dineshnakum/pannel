<?php

namespace App\Helper;

use App\Models\Setting;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class CommonHelper
{
    public static function makeSlug(string $string): string
    {
        return preg_replace('/\s+/u', '-', trim($string));
    }

    public static function uploadFile(UploadedFile $file, $path, $oldFile = ''): string
    {
        if (! empty($file)) {
            // Remove Old file
            if (! empty($oldFile)) {
                Storage::delete('public/'.$path.'/'.$oldFile);  // Delete file from local
            }

            // Upload image
            $path = $file->store('public/'.$path);
            $parts = explode('/', $path);

            return end($parts);
        }

        return '';
    }

    public static function removeOldFile($oldFile): void
    {
        // Remove Old file
        if (! empty($oldFile)) {
            // Storage::disk('s3')->delete($oldFile);    // Delete file from s3
            Storage::delete($oldFile);                      // Delete file from local
        }
    }

    public static function getImageValidationRule(string $key): array
    {
        if (request()->hasFile($key)) {
            return [File::types(['jpeg', 'jpg', 'png', 'webp'])->max(1 * 1024)];
        }
        return ['string'];
    }
}
