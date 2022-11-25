<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Auth;

class QuestionController extends Controller
{
    public function postIndex(Request $request){
$question = new Question;
$question->email=$request->email;
$question->body=$request->body;
$question->fullname=$request->fullname;
$question->user_id=(Auth::guest()) ? 0 : Auth::user()->id;

$question->save();
return redirect('/');

    }
}
