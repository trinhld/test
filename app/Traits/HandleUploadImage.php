<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait HandleUploadImage
{
    /**
     * Upload image to S3
     * @return string
     */
    public function saveImage($image)
    {
        // get name off image
        $originalName = $image->getClientOriginalName();

        // set new name to image
        $imageName = THUMBNAIL_IMAGE_FIRST_NAME . time() . '_' . $originalName;

        // resize image
        $imgFile = Image::make($image)->fit(150, 150);

        // get content image
        $contents = $imgFile->encode()->__toString();

        // save image to s3 - path in s3
        $path = Storage::disk('s3')->put(AVATAR_PATH . $imageName, $contents);

        if ($path !== false) {
            return Storage::disk('s3')->url(AVATAR_PATH . $imageName);
        }
        return null;
    }

    /**
     * Delete image from storage
     * @param $imagePath
     */
    public function deleteUploadImage($imagePath)
    {
        if ($imagePath != null) {
            Storage::disk('s3')->delete(parse_url($imagePath, PHP_URL_PATH));
        }
    }
}