<?php

namespace App\Http\Controllers\Questions;

use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
            'tags' => 'required',
        ]);
        
        $question = auth()->user()->questions()->create([
            'title' => ucwords($validated['title']),
            'slug' => Str::slug($validated['title']),
            'body' => $validated['body'],
            'tags' => json_encode(explode (",", $validated['tags'])),
            'read_time' => $this->calculateReadTime($validated['body']),
        ]);

        $description = $this->extractSentence($question);
        $questions = $this->getQuestionsByTag($question);

        return view('questions.question-show', [
            'question' => $question, 
            'description' => $description,
            'questions' => $questions
        ]);
    }

    public function show(Question $question)
    {
        $description = $this->extractSentence($question);
        $questions = $this->getQuestionsByTag($question);

        return view('questions.question-show', [
            'question' => $question, 
            'description' => $description,
            'questions' => $questions
        ]);
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

    public function category($category)
    {

        $questions = DB::table('questions')
            ->whereJsonContains('tags', [$category])
            ->paginate(12);

        $categoryLogo = [
            'laravel' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain-wordmark.svg',
            'vuejs' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original-wordmark.svg',
            'angular' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/angularjs/angularjs-original-wordmark.svg',
            'react' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original-wordmark.svg',
            'jquery' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jquery/jquery-original-wordmark.svg',
            'php' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg',
            'python' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original-wordmark.svg',
            'bootstrap' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original-wordmark.svg',
            'javascript' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-plain.svg',
            'mysql' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original-wordmark.svg',
            'nodejs' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original-wordmark.svg',
            'codeigniter' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/codeigniter/codeigniter-plain-wordmark.svg',
            'c' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/c/c-original.svg',
            'c#' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/csharp/csharp-original.svg',
            'c++' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/cplusplus/cplusplus-original.svg',
            'docker' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original-wordmark.svg',
            'apache' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/apache/apache-original-wordmark.svg',
            'composer' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/composer/composer-original.svg',
        ];

        return view('questions.category-question', [
            'category' => $category,
            'questions' => $questions,
            'categoryLogo' => $categoryLogo,
        ]);
    }

    public function searchQuestion(Request $request)
    {
        $validated = $request->validate(['search' => 'required']);
        $words = explode(" ", $validated['search']);
        $questions = [];

        foreach ($words as $word) {
            $result = Question::where('title', 'like', '%' . $word . '%')->take(30)->get();

            foreach ($result as $question) {
                if(!in_array($question, $questions)) {
                    array_push($questions, $question);
                }
            }
        }

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
        $questionLists = [];
        $questions = [];

        foreach ($tags as $tag) {
            $results = Question::where('title', 'like', '%'.$tag.'%')->get();
            array_push($questionLists, $results);
        }

        foreach ($questionLists as $questionList) {
            foreach ($questionList as $currentQuestion) {
                if(!in_array($currentQuestion, $questions) && $question->id !== $currentQuestion->id) {
                    array_push($questions, $currentQuestion);
                }
            }
        }

        return $questions;
    }

    function calculateReadTime($content) {

        $wordCount = str_word_count(strip_tags($content));
        $readingSpeed = 200; // words per minute

        return ceil($wordCount / $readingSpeed);
    }

}
