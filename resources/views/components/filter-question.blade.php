@props(['title', 'questions'])

<x-layouts.layout title="Category - {{ ucwords($title) }}">
    <div class="mt-8">
        <div class="mb-4 pb-4">
            {{-- ADS --}}

            <!-- HORIZONTAL -->
            <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-4812454445865215"
            data-ad-slot="3496243870"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        </div>
        <div class="w-full flex lg:space-x-1">
            <div class="p-6 w-full h-fit" style="max-width: 60rem;">
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
             
            </div>
            <div class="hidden w-96 lg:block" >
                {{-- ADS --}}                                    
                
                <ins class="adsbygoogle"
                    style="display:inline-block;width:300px;height:250px"
                    data-ad-client="ca-pub-4812454445865215"
                    data-ad-slot="1525488989">
                </ins>

                <ins class="adsbygoogle"
                    style="display:inline-block;width:300px;height:250px"
                    data-ad-client="ca-pub-4812454445865215"
                    data-ad-slot="1278911129"></ins>
            </div>
        </div>
        <div class="mt-2">
            {{-- ADS --}}

        <!-- HORIZONTAL 2 -->
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-4812454445865215"
            data-ad-slot="6935181031"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        </div>
    </div>

</x-layouts.layout>