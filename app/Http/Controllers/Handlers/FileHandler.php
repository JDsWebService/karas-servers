<?php

namespace App\Http\Controllers\Handlers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileHandler extends Controller
{

	// ---------------------------------------
	// Database Considerations for Handler
	// ---------------------------------------
	// Whatever the resource you're handling you must create the following
	// entries inside of your migration in order to utilize this handler.
	// 
	// $table->string('fileNameWithExt');
	// $table->string('fileName');
	// $table->string('extension');
	// $table->string('fileNameToStore');
	// $table->string('fullPath');
	// $table->string('publicPath');
	// 


	// Trim Path
    protected static function trimPath($path, $prefix) {
		$trimmedPath = $path;
		if (substr($trimmedPath, 0, strlen($prefix)) == $prefix) {
		    return $trimmedPath = substr($trimmedPath, strlen($prefix));
		}
    }
	// Create File Object
	protected static function createFileObject(Array $array) {
		$publicPath = self::trimPath($array['fullPath'], 'public');

		// Create the Object
		$object = (object) [
			'fileNameWithExt' => $array['fileNameWithExt'],
    		'fileName' => $array['fileName'],
    		'extension' => $array['extension'],
    		'fileNameToStore' => $array['fileNameToStore'],
    		'fullPath' => $array['fullPath'],
    		'publicPath' => '/storage' . $publicPath
		];

		return $object;
	}

    // Handle a file upload
    public static function uploadFile(Request $request, $storageFolder = 'noPath', $formName = 'fileUpload') {
    	$storagePath = 'public/' . $storageFolder;
    	// Get filename with extension
    	$fileNameWithExt = $request->file($formName)->getClientOriginalName();
    	// Get just the filename
    	$filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    	// Get just the extension
    	$extension = $request->file($formName)->getClientOriginalExtension();
    	// Filename to store
    	$fileNameToStore = $filename.'_'.time().'.'.$extension;
    	// Upload the image
    	$fullPath = $request->file($formName)->storeAs($storagePath, $fileNameToStore);

    	// Create an array of all relevent data
    	$fileArray = [
    		'fileNameWithExt' => $fileNameWithExt,
    		'fileName' => $filename,
    		'extension' => $extension,
    		'fileNameToStore' => $fileNameToStore,
    		'fullPath' => $fullPath
    	];

    	return self::createFileObject($fileArray);
    }

    // Handle File Replacement
    public static function replaceFile(Model $resource, Request $request, $storageFolder = 'noPath', $formName = 'fileUpload') {
    	// Delete the old file
    	Storage::delete($resource->fullPath);
    	// Place the new file
    	return self::uploadFile($request, $storageFolder, $formName);
    }

    // Handle File Deletion
    public static function deleteFile(Model $resource) {
    	Storage::delete($resource->fullPath);
    	return true;
    }

}
