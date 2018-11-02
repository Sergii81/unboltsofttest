<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Translation;
use App\Language;

class TranslationController extends Controller
{
    public function tableShow()
    {
        return view('table');
    }

    public function language()
    {
    	$languages_id = Language::pluck('id');
    	$id = [];
    	foreach ($languages_id as $language_id) {
    		array_push($id, $language_id);
    	}
    	return $id;
    }

    public function read()
    {
    	$translation = Translation::all();
    	return json_encode($translation);
    }

    public function create(Request $request)
    {
        $translation = new Translation;
        $translation->description = $request->description;
        $translation->label_id = $request->label_id;
        $translation->text = $request->text; 
        
        $translation->save();
        
        return redirect()->route('read');  
        
    }
}
