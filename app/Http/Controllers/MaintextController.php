<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintext;

class MaintextController extends Controller
{
    public function getUrl($url){
$maintext = Maintext::where('url',$url)->first();
//dd($maintext);
return view('maintext', compact('maintext'));
    }
}
