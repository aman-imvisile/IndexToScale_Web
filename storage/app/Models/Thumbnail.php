<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Image;

class Thumbnail extends Model
{

 	static function attachmentThumb($fileContent, $width, $height,$fileOriginalName,$storagepath)
	{
		    
		    // create new image with transparent background color
    		$background = Image::canvas($width, $height);
   			// read image file and resize it
    		// but keep aspect-ratio and do not size up,
    		// so smaller sizes don't stretch
    		$image = Image::make($fileContent)->resize($width, $height, function ($c) {
       		$c->aspectRatio();
       		$c->upsize();
    		});
    		// insert resized image centered into background
    		$background->insert($image, 'center');   // create new image with transparent background color
    		$background = Image::canvas($width, $height);
    		// read image file and resize it
    		// but keep aspect-ratio and do not size up,
   		 	// so smaller sizes don't stretch
    		$image = Image::make($fileContent)->resize($width, $height, function ($c) {
      			$c->aspectRatio();
      			$c->upsize();
    		});
    		// insert resized image centered into background
    		$background->insert($image, 'center');
        	//return $thumbnail= $background->storeAs($storagepath,'thumb_'. $originalName);
        	return $thumbnail= $background->save(storage_path('/'.$storagepath.'thumb_'. $fileOriginalName));
    }
 
}
