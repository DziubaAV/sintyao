<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Media;

class CatalogController extends Controller
{
    public function getCatalog($id=null) {
$catalog=Catalog::find($id);
$media_arr=[];
foreach($catalog->getMedia('catalog') as $media) {
    $media_arr[$media['id']]=asset('storage/'.$media['id'].'/'.$media['file_name']);
}

return view ('admin.catalog_one', compact('catalog','media_arr'));
    }

    public function addPicture(Catalog $catalog, Request $request) {
        if($request->has('picture')){
            $catalog->addMedia($request->file('picture'))->toMediaCollection('catalog');
        }
        return redirect()->back();
    }

    public function destroyPicture($id) {
$media=Media::find($id);
$media->delete();
return redirect()->back();
    }

    public function postIndex(Request $request) {
        Catalog::create($request->all());
        return redirect()->back();

    }
}
