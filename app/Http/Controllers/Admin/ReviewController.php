<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Auth;

class ReviewController extends Controller
{
    public function getIndex() {
        $reviews=Review::whereNull('status')->orderBy('id', 'DESC')->simplePaginate(5);
        return view('admin.review', compact('reviews'));
    }

    public function postIndex(Request $request) {
        $request['user_id']=(Auth::guest())?0:Auth::user()->id;
Review::create($request->all());
return redirect()->back();
    }
}
