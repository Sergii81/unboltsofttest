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
        
        $a = $request->models;
        $a = trim($a, "[]");
        $b = json_decode($a);
        $id = $b->id;
        if ($id == 0) {
            $translation = new Translation;
            $translation->description = $b->description;
            $translation->label_id = $b->label_id;
            $translation->text = $b->text;
        }else{            
            $translation = Translation::find($id);
            $translation->description = $b->description;
            $translation->label_id = $b->label_id;
            $translation->text = $b->text;
        }          
        $translation->save();
        
        //return view('table');
        
        
    }

    public function destroy(Request $request)
    {
        $a = $request->models;
        $a = trim($a, "[]");
        $b = json_decode($a);
        $id = $b->id;
        $translation = Translation::destroy($id);
    }
}
