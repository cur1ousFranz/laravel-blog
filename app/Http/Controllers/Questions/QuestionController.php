<?php

namespace App\Http\Controllers\Questions;

use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class QuestionController extends Controller
{
    public function index()
    {
        return view('questions.question');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', Rule::unique('questions', 'title')],
            'body' => 'required',
        ]);

        auth()->user()->questions()->create([
            'title' => ucwords($validated['title']),
            'body' => $validated['body'],
            'slug' => Str::slug($validated['title']),
        ]);

        return view('questions.question');
    }

    public function show(Question $question)
    {

        $description = $this->extractSentence($question);
        return view('questions.question-show', ['question' => $question, 'description' => $description]);
    }

    public function edit(Question $question)
    {
       return view('questions.question-edit', ['question' => $question]);
    }

    public function update(Question $question, Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', Rule::unique('questions', 'title')->ignore($question->id)],
            'body' => 'required',
        ]);

        $question->title = ucwords($validated['title']);
        $question->body = $validated['body'];
        $question->slug = Str::slug($validated['title']);
        $question->save();
        $description = $this->extractSentence($question);

        return view('questions.question-show', ['question' => $question, 'description' => $description]);
    }

    private function extractSentence($question)
    {
        $description = preg_match('/^([^\.!?]*[\.!?]+){2}/', $question->body, $matches);

        // Extract the first sentence from the full text
        $description = $matches[0];
        $description = preg_replace('/<[^>]*>/', '', $description);

        return $description;
    }
}
