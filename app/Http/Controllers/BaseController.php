<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Catalog;

class BaseController extends Controller
{
    public function getIndex(){
        $catalog_arr=[];
        foreach(Catalog::all() as $catalog) {
            $catalog_arr[$catalog->id]=$catalog->name;
        }
        $media_arr=[];
        $media_all=Media::where('collection_name', 'catalog')->where('model_type', 'App\Models\Catalog')->get();
        foreach($media_all as $media) {
        $media_arr[$media['model_id']]=asset('storage/'.$media['id'].'/'.$media['file_name']);
}

        return view("Welcome", compact('media_arr', 'catalog_arr'));
    }
}
