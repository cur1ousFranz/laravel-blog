<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class SiteMapController extends Controller
{
    public function index()
    {   

        $questions = Question::with('image')->get();
        return response()->view('index', [
            'questions' => $questions
        ])->header('Content-Type', 'text/xml');
    }
}
