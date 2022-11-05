<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;

class CatalogController extends Controller
{
    public function getIndex($type=''){
        $catalog_name = 'Каталог фотографий';
        if ($type=='video'){
            $catalog_name = 'Католог видео';
        }
       $catalogs = Catalog::where('type',$type)->get();
       return view('catalog',compact('catalogs','catalog_name'));
    }

    public function getOne(Catalog $catalog=null){
        return view ('catalog_one',compact('catalog'));
    }
}

