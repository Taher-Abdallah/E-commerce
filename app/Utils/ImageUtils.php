<?php

namespace App\Utils;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageUtils
{
    //==================================================================================== Upload Files
    public static function upload(UploadedFile $image, string $folder = 'blogs'): string
    {
        $newImageName = time() . '-' . $image->getClientOriginalName();
        $image->storeAs($folder, $newImageName, 'public');
        return $newImageName;
    }
    //==================================================================================== Update Files

    public static function update(?string $oldImage, UploadedFile $newImage, string $folder = 'blogs'): string
    {
        // حذف الصورة القديمة لو موجودة
        if ($oldImage && Storage::disk('public')->exists($folder . '/' . $oldImage)) {
            Storage::disk('public')->delete($folder . '/' . $oldImage);
        }

        // رفع الصورة الجديدة
        return self::upload($newImage, $folder);
    }

    //==================================================================================== Upload Multiple Files

    public static function uploadMultiple(array $images, string $folder = 'products'): array
    {
        $imagesPath = [];

        foreach ($images as $image) {
            if ($image instanceof UploadedFile) {
                $newImageName = time() . '-' . $image->getClientOriginalName();
                $image->storeAs($folder, $newImageName, 'public');
                $imagesPath[] = $newImageName;
            }
        }

        return $imagesPath;
    }

    //==================================================================================== Update Multiple File
    public static function updateMultiple(?string $oldImages, array $newImages, string $folder = 'products'): array
    {
        // حذف الصور القديمة لو موجودة
        if ($oldImages) {
            $oldImagesArray = explode(',', $oldImages);
            foreach ($oldImagesArray as $oldImage) {
                if (Storage::disk('public')->exists($folder . '/' . $oldImage)) {
                    Storage::disk('public')->delete($folder . '/' . $oldImage);
                }
            }
        }

        // رفع الصور الجديدة
        return self::uploadMultiple($newImages, $folder);
    }
}

?>