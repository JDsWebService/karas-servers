<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Handlers\FileHandler;
use App\Models\Resource\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Grab all the Ingredients
        $ingredients = Ingredient::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.resources.ingredients.index')
                                ->withIngredients($ingredients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resources.ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|string',
            'fileUpload' => 'required|image|max:1999'
        ]);

        // Handle File Upload
        $file = FileHandler::uploadFile($request, 'ingredients');

        // Create the object
        $ingredient = new Ingredient;

        // Add request to object
        $ingredient->name = Purifier::clean($request->name);
        $ingredient->fileNameWithExt = $file->fileNameWithExt;
        $ingredient->fileName = $file->fileName;
        $ingredient->extension = $file->extension;
        $ingredient->fileNameToStore = $file->fileNameToStore;
        $ingredient->fullPath = $file->fullPath;
        $ingredient->publicPath = $file->publicPath;
        
        // Save Object
        $ingredient->save();
        // Flash Message
        Session::flash('success', 'Ingredient has been added to the database!');
        // Redirect
        return redirect()->route('admin.resources.ingredients.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Grab the Ingredient by the ID
        $ingredient = Ingredient::where('id', $id)->first();

        // Return the view with the ingredient
        return view('admin.resources.ingredients.edit')
                                ->withIngredient($ingredient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255|string',
            'fileUpload' => 'nullable|image|max:1999'
        ]);

        // Create the object
        $ingredient = Ingredient::where('id', $id)->first();

        // Handle File Upload
        if($request->fileUpload != null) {
            $file = FileHandler::replaceFile($ingredient, $request, 'ingredients');
            $ingredient->fileNameWithExt = $file->fileNameWithExt;
            $ingredient->fileName = $file->fileName;
            $ingredient->extension = $file->extension;
            $ingredient->fileNameToStore = $file->fileNameToStore;
            $ingredient->fullPath = $file->fullPath;
            $ingredient->publicPath = $file->publicPath;
        }
        
        // Add request to object
        $ingredient->name = Purifier::clean($request->name);
        
        // Save Object
        $ingredient->save();

        // Flash Message
        Session::flash('success', 'Ingredient has been added to the database!');
        // Redirect
        return redirect()->route('admin.resources.ingredients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingredient = Ingredient::where('id', $id)->first();
        $fileDelete = FileHandler::deleteFile($ingredient);
        $ingredient->delete();
        Session::flash('success', 'Ingredient has been deleted.');
        return redirect()->route('admin.resources.ingredients.index');
    }
}
