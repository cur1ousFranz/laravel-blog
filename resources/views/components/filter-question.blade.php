@props(['title', 'questions'])

<x-layouts.layout title="Category - {{ ucwords($title) }}">
    <div class="mt-8">
        <div class="w-full flex lg:space-x-1">
            <div class="p-6 w-full" style="max-width: 60rem;">
                <div class="mb-4 pb-4">
                    {{-- ADS --}}
                </div>
                {{ $header }}
                @if ($questions->count())
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-2">
                        @foreach ($questions as $question)
                            @php
                                $description = preg_match('/^([^\.!?]*[\.!?]+){2}/', $question->body, $matches);
                                $description = $matches[0];
                                $description = preg_replace('/<[^>]*>/', '', $description);
                            @endphp
                            <x-question-container :question="$question" :description="$description"/>
                        
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

                    {{-- VERTICAL
                    <amp-ad width="100vw" height="320"
                        type="adsense"
                        data-ad-client="ca-pub-4812454445865215"
                        data-ad-slot="4415877212"
                        data-auto-format="rspv"
                        data-full-width="">
                    <div overflow=""></div>
                    </amp-ad> --}}
                </div>
             
            </div>
            <div class="hidden w-80 lg:block" style="min-width: 300px;">
                 {{-- ADS --}}

                 {{-- HORIZONTAL --}}
                 {{-- <amp-ad width="100vw" height="320"
                    type="adsense"
                    data-ad-client="ca-pub-4812454445865215"
                    data-ad-slot="4415877212"
                    data-auto-format="rspv"
                    data-full-width="">
                <div overflow=""></div> --}}
                </amp-ad>
            </div>
        </div>
    </div>
</x-layouts.layout>