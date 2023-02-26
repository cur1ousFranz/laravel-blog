@props(['title', 'questions', 'logos' => false])

<x-layouts.layout title="Category - {{ ucwords($title) }}">
    <div class="mt-8">
        <div class="w-full flex lg:space-x-1">
            <div class="p-6 w-full" style="max-width: 60rem;">
                <div class="mb-4 pb-4">
                    {{-- ADS --}}
                </div>

                {{ $header }}
                {{-- <h1 class="text-lg mb-12 font-bold text-gray-800 lg:text-2xl ">{{ ucwords($category) }} category</h1> --}}
                @if ($questions->count())
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($questions as $question)
                            @php

                                $description = preg_match('/^([^\.!?]*[\.!?]+){2}/', $question->body, $matches);

                                $description = $matches[0];
                                $description = preg_replace('/<[^>]*>/', '', $description);

                            @endphp

                            <a href="{{ route('question-show', [$question->slug]) }}" target="_blank" class="relative p-4 border shadow-sm space-y-1 rounded-md hover:shadow-lg border-gray-400 hover:border-gray-800">
                                <p class="abosulte w-fit px-2 py-1  rounded-l-md border-l-4 shadow-sm shadow-gray-300 border-gray-700 -ml-6 space-x-2 -mt-3 text-xs bg-gray-200">
                                    <span class="inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                                            <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                                            <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                                          </svg>
                                    </span>
                                {{ $question->read_time }} min read.</p>

                                @if ($logos)
                                    @foreach ($logos as $logo => $src)
                                        @if ($logo == $title)
                                            <img class="p-12" src="{{ $src }}" alt="{{ $title }}_logo">
                                        @endif
                                    @endforeach
                                @else
                                    <img class="p-12" src="{{ asset('img/logo.png') }}" alt="website_logo">
                                @endif

                                <h1 class="truncate text-sm font-semibold">{{ $question->title }}</h1>
                                <h1 class="truncate text-xs">{{ $description }}</h1>
                            </a>
                        
                        @endforeach
                    </div>

                    <div class="mt-6">{{ $questions->links('pagination-tailwind') }}</div>
                @else
                    <h1 class="my-24 font-bold text-center lg:text-2xl text-gray-400">
                        No questions to show in this category.
                    </h1>
                @endif

                <div class="mt-6 pb-4">
                    {{-- ADS --}}
                </div>
             
            </div>
            <div class="hidden w-80 lg:block" style="min-width: 300px;">
                 {{-- ADS --}}
            </div>
        </div>
    </div>
</x-layouts.layout>