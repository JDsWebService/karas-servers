<?php

namespace App\Http\Controllers\Handlers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileUploadHandler extends Controller
{
    
	// Create File Object
	protected static function createFileObject(Array $array) {
		// Create public storage path URL
		$prefix = 'public';
		$pathToStore = $array['fullPath'];
		if (substr($pathToStore, 0, strlen($prefix)) == $prefix) {
		    $pathToStore = substr($pathToStore, strlen($prefix));
		}

		// Create the Object
		$object = (object) [
			'originalFileName' => $array['originalFileName'],
    		'fileName' => $array['fileName'],
    		'extension' => $array['extension'],
    		'fileNameToStore' => $array['fileNameToStore'],
    		'fullPath' => $array['fullPath'],
    		'pathToStore' => '/storage' . $pathToStore
		];

		return $object;
	}

    // Handle a file upload
    public static function uploadFile(Request $request, $formName, $storageFolder = 'noPath') {
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
    		'originalFileName' => $fileNameWithExt,
    		'fileName' => $filename,
    		'extension' => $extension,
    		'fileNameToStore' => $fileNameToStore,
    		'fullPath' => $fullPath
    	];

    	return self::createFileObject($fileArray);
    }

}
