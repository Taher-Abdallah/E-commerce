<?php

namespace App\Utils;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageUtils
{
    public static function upload(UploadedFile $image, string $folder = 'blogs'): string
    {
        $newImageName = time() . '-' . $image->getClientOriginalName();
        $image->storeAs($folder, $newImageName, 'public');
        return $newImageName;
    }

    public static function update(?string $oldImage, UploadedFile $newImage, string $folder = 'blogs'): string
    {
        // حذف الصورة القديمة لو موجودة
        if ($oldImage && Storage::disk('public')->exists($folder . '/' . $oldImage)) {
            Storage::disk('public')->delete($folder . '/' . $oldImage);
        }

        // رفع الصورة الجديدة
        return self::upload($newImage, $folder);
    }
}
?>