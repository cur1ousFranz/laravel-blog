<?php

namespace App\Http\Controllers\Questions;

use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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
            'tags' => 'required',
            'img' => 'required',
            'img_title' => 'required',
            'img_caption' => 'required',
            'img_alt' => 'required',
            
        ]);
        
        $question = auth()->user()->questions()->create([
            'title' => ucwords($validated['title']),
            'slug' => Str::slug($validated['title']),
            'body' => $validated['body'],
            'tags' => json_encode(explode (",", $validated['tags'])),
            'read_time' => $this->calculateReadTime($validated['body']),
        ]);

        $file = $validated['img'];
        $filename = Str::slug($question->title) . '.' . $file->getClientOriginalExtension();
        $path = public_path('uploads');
        $file->move($path, $filename);
        $url = url('/uploads/' . $filename);

        $imageData = [
            'img_path' => $url,
            'img_title' => $validated['img_title'],
            'img_caption' => $validated['img_caption'],
            'img_alt' => $validated['img_alt'],
        ];

        $question->image()->create($imageData);

        $description = $this->extractSentence($question);
        $questions = $this->getQuestionsByTag($question);

        return view('questions.question-show', [
            'question' => $question, 
            'description' => $description,
            'questions' => $questions
        ]);
    }

    public function show($question)
    {
        $questionResult = Question::with('image')->where('slug', $question)->first();

        if($questionResult) {
            $description = $this->extractSentence($questionResult);
            $questions = $this->getQuestionsByTag($questionResult);

            return view('questions.question-show', [
                'question' => $questionResult, 
                'description' => $description,
                'questions' => $questions
            ]);

        }
        
        return view('404');
    }

    public function edit(Question $question)
    {   
        return view('questions.question-edit', ['question' => $question->load('image')]);
    }

    public function update(Question $question, Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', Rule::unique('questions', 'title')->ignore($question->id)],
            'body' => 'required',
            'tags' => 'required',
        ]);

        $question->title = ucwords($validated['title']);
        $question->slug = Str::slug($validated['title']);
        $question->body = $validated['body'];
        $question->tags = json_encode(explode (",", $validated['tags']));
        $question->read_time = $this->calculateReadTime($validated['body']);
        $question->save();
        $description = $this->extractSentence($question);

        $questions = $this->getQuestionsByTag($question);
        return view('questions.question-show', [
            'question' => $question, 
            'description' => $description,
            'questions' => $questions,
        ]);
    }

    public function updateImage(Question $question, Request $request)
    {
        $validated = $request->validate([
            'img' => 'required',
            'img_title' => 'required',
            'img_caption' => 'required',
            'img_alt' => 'required',
        ]);
        
        if($question->image && File::exists(public_path($question->image->img_path))) {
            File::delete(public_path($question->image->img_path));
        }

        $file = $validated['img'];
        $filename = Str::slug($question->title) . '.' . $file->getClientOriginalExtension();
        $path = public_path('uploads');
        $file->move($path, $filename);
        $url = url('/uploads/' . $filename);

        $imageData = [
            'img_path' => $url,
            'img_title' => $validated['img_title'],
            'img_caption' => $validated['img_caption'],
            'img_alt' => $validated['img_alt'],
        ];
        
        $question->image()->updateOrCreate([], $imageData);

        $description = $this->extractSentence($question);
        $questions = $this->getQuestionsByTag($question);

        return view('questions.question-show', [
            'question' => $question->load('image'), 
            'description' => $description,
            'questions' => $questions,
        ]);

    }

    public function category($category)
    {
        $questions = Question::with('image')
        ->whereJsonContains('tags', [$category])
        ->paginate(12);

        return view('questions.category-question', [
            'category' => $category,
            'questions' => $questions,
        ]);
    }

    public function searchQuestion(Request $request)
    {
        $validated = $request->validate(['search' => 'required']);
        $words = explode(" ", $validated['search']);
        $questionIds = [];

        foreach ($words as $word) {
            $result = Question::where('title', 'like', '%' . $word . '%')->take(30)->pluck('id');

            $questionIds = array_merge($questionIds, $result->toArray());
        }

        $questionIds = array_unique($questionIds);
        $questions = Question::whereIn('id', $questionIds)->get();

        return view('questions.question-search', [
            'questions' => $questions,
            'search' => $validated['search']
        ]);

    }

    private function extractSentence($question)
    {
        $description = preg_match('/^([^\.!?]*[\.!?]+){2}/', $question->body, $matches);

        // Extract the first sentence from the full text
        $description = $matches[0];
        $description = preg_replace('/<[^>]*>/', '', $description);

        return $description;
    }

    public function getQuestionsByTag($question)
    {
        $tags = json_decode($question->tags);
        $questionIds = [];
        $questions = [];
    
        foreach ($tags as $tag) {
            $results = Question::where('title', 'like', '%'.$tag.'%')->pluck('id');
            array_push($questionIds, $results->toArray());
        }
    
        $questionIds = array_unique(array_merge(...$questionIds));
    
        $questions = Question::whereIn('id', $questionIds)
                        ->where('id', '!=', $question->id)
                        ->get();
    
        return $questions;
    }

    public function showQuestionsByTag($tag)
    {
        $questions = Question::with('image')
            ->whereJsonContains('tags', [$tag])
            ->paginate(12);

        return view('questions.tag-question',[
            'questions' => $questions,
            'tag' => $tag
        ]);
    }

    function calculateReadTime($content) {

        $wordCount = str_word_count(strip_tags($content));
        $readingSpeed = 200; // words per minute

        return ceil($wordCount / $readingSpeed);
    }

}
