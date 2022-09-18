<?php
namespace App\Classes;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
class ImageMaker{

    public $image;
    public $image_path;


    public static function makeAndStore($image,$path){
        Log::info($path);
        $file = file_get_contents($image);
            Storage::disk('s3')->put($path, $file, 'public');
    }


}
