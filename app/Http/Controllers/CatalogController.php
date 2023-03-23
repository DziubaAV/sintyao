<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;


class CatalogController extends Controller
{
    public function getIndex($type=''){
        $catalog_name = 'Каталог фотографий';
        if ($type=='video'){
            $catalog_name = 'Каталог видео';
        }
       $catalogs = Catalog::where('type',$type)->get();
       return view('catalog',compact('catalogs','catalog_name'));
    }

    public function getOne(Catalog $catalog=null){
        $media_arr=[];
        foreach($catalog->getMedia('catalog') as $media) {
            $media_arr[]=asset('storage/'.$media['id'].'/'.$media['file_name']);
        }

        return view ('catalog_one',compact('catalog','media_arr'));
    }

    public function addPicture(Catalog $catalog, Request $request) {
        $catalog->addMedia($request->file('picture'))->toMediaCollection('catalog');
        return response()->json(['catalog' => $catalog->id]);
    }

   
}