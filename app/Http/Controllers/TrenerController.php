<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrenerController extends Controller
{
    public function getPage() {
        return view('trener_page');
    }
}
