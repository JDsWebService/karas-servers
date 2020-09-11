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
	// ---------------------------------------
	// Create a Symbolic Link To The Storage
	// ---------------------------------------
	// 
	// Before using the handler, you must create a symbolic link to the
	// storage folder by running the following command.
	//
	// $ php artisan storage:link
	//
	// ---------------------------------------
	// Calling the Handler
	// ---------------------------------------
	// 
	// $file = FileHandler::uploadFile($request, 'ingredients');
	// 
	// ---------------------------------------
	// Using This Handler
	// ---------------------------------------
	// 
	// Saving the information processed in this handler is quite easy.
	// Just make sure to save the following after calling the handler.
	// 
	// $resource->fileNameWithExt = $file->fileNameWithExt;
	// $resource->fileName = $file->fileName;
	// $resource->extension = $file->extension;
	// $resource->fileNameToStore = $file->fileNameToStore;
	// $resource->fullPath = $file->fullPath;
	// $resource->publicPath = $file->publicPath;


	/**
	 * Trim from the beginning of a path
	 *
	 * @param string $path
	 * @param string $prefix
	 * @return string $trimmedPath
	 **/
    protected static function trimPath($path, $prefix) {
		$trimmedPath = $path;
		if (substr($trimmedPath, 0, strlen($prefix)) == $prefix) {
		    return $trimmedPath = substr($trimmedPath, strlen($prefix));
		}
    }

	/**
	 * Creates a file object to be used inside of a controller
	 *
	 * @param array $array
	 * @return object $object
	 **/
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

    /**
	 * Handles uploading a file to the storage folder.
	 *
	 * @param Illuminate\Http\Request $request
	 * @param string $storageFolder
	 * @param string $formName
	 * @return self::createFileObject()
	 **/
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

    /**
	 * Handles repalcing a file in the storage folder.
	 * Passes to uploadFile Method, then returns file object
	 *
	 * @param Illuminate\Database\Eloquent\Model $resource
	 * @param Illuminate\Http\Request $request
	 * @param string $storageFolder
	 * @param string $formName
	 * @return self::createFileObject()
	 **/
    public static function replaceFile(Model $resource, Request $request, $storageFolder = 'noPath', $formName = 'fileUpload') {
    	// Delete the old file
    	Storage::delete($resource->fullPath);
    	// Place the new file
    	return self::uploadFile($request, $storageFolder, $formName);
    }

    /**
	 * Handles file deletion from the storage folder
	 *
	 * @param Illuminate\Database\Eloquent\Model $resource
	 * @return bool true
	 **/
    public static function deleteFile(Model $resource) {
    	Storage::delete($resource->fullPath);
    	return true;
    }

}
