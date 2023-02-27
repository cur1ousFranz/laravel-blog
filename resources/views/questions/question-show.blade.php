<x-layouts.layout title="{{ $question->title }}" description="{{ $description }}">
    <div class="mt-8">
        <div class="w-full flex lg:space-x-1">
            <div class="p-6 w-full" style="max-width: 60rem;">
                <div class="mb-4 pb-4">
                    {{-- ADS --}}
                </div>
                @if (Auth::user())
                    <div class="flex justify-end space-x-2">
                        <span class="cursor-pointer hover:underline text-gray-900">
                            <a href="{{ route('question-edit', [$question->slug]) }}" class="text-gray-700 hover:text-gray-900">Edit</a>
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil mt-1" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                              </svg>
                        </span>
                    </div>
                @endif
                <section class="header">
                    <div class="space-x-2 mb-1">
                        <span class="date inline-block text-gray-700">
                            {{ $question->created_at->format('F j, Y') }}
                        </span>
                        <span>-</span>
                        <span class="inline-block text-gray-700">
                            {{ $question->read_time }} min read.
                        </span>
                    </div>
                    <h1 class="text-xl font-bold mb-10 text-gray-800 md:text-4xl">{{ $question->title }}</h1>
                </section>
                <section class="body">
                    {!! $question->body !!}</code>
                </section>
                <section class="footer">
                    <div class="tags mt-2 flex flex-wrap overflow-auto">
                        @foreach (json_decode($question->tags) as $tag)
                            <a href="{{ route('question-tag', [$tag]) }}" class="py-1 mx-1 px-2 my-1 w-fit rounded-md text-sm text-white bg-gray-700 hover:bg-gray-900">
                                {{ $tag }}
                            </a>
                        @endforeach
                    </div>
                </section>
                <div class="mt-6 pb-4">
                    {{-- ADS --}}
                </div>
                <section class="related-problems">
                    <div class="mt-12">
                        <h1 class="text-lg font-bold text-gray-800 md:text-2xl">Related problems</h1>
                        <div class="mt-4">
                            @if ($questions)
                                @foreach ($questions->random(10) as $question)
                                    <div class="p-2 max-w-full rounded hover:bg-gray-200" >
                                        <span class="inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-up-right-square" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707l-4.096 4.096z"/>
                                            </svg>
                                        </span>
                                        <a href="{{ route('question-show', [$question->slug]) }}" target="_blank" class=" w-full font-semibold underline hover:cursor-pointer text-blue-500 hover:text-blue-700">{{ $question->title }}</a>
                                    </div>
                                @endforeach
                            @else
                                <h4 class="text-lg mt-4 text-center font-bold text-gray-500">Nothing to show.</h4>
                            @endif
                        </div>
                    </div>
                </section>
            </div>
            <div class="hidden w-80 lg:block" style="min-width: 300px;">
                 {{-- ADS --}}
            </div>
        </div>
    </div>
</x-layouts.layout>

<style>
    a {
        color: blue;
    }

    p {
        font-size: 1.125rem/* 18px */;
        line-height: 1.75rem/* 28px */;
    }
</style>