<x-layouts.layout title="{{ $question->title }}" description="{{ $description }}">
    <div class="px-4 mt-8">
        <div class="w-full flex">
            <div class="hidden w-96 md:block">
                {{-- ADS --}}
            </div>
            <div class="w-full p-4 shadow-sm">
                <div class="mb-4">
                    {{-- ADS --}}
                </div>
                @if (Auth::user())
                    <div class="flex justify-end space-x-2">
                        <span class="cursor-pointer hover:underline text-gray-900">
                            <a href="{{ route('question-edit', [$question->slug]) }}">Edit</a>
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-pencil mt-1" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                              </svg>
                        </span>
                    </div>
                @endif
                <h1 class="text-xl font-bold mb-10 text-gray-800 md:text-4xl">{{ $question->title }}</h1>

                {!! $question->body !!}</code>

                <div class="mt-6">
                    @foreach (json_decode($question->tags) as $tag)
                        <span class="py-1 px-2 rounded-lg text-sm text-white bg-gray-700 ">{{ $tag }}</span>
                    @endforeach
                </div>
                <div class="mt-6">
                    {{-- ADS --}}
                </div>
                <div class="mt-12">
                    <h1 class="text-lg font-bold text-gray-800 md:text-2xl">Related problems</h1>
                    <div class="mt-4">
                        @if ($questions)
                            @foreach (array_slice($questions, 0, 10, true) as $question)
                                <a href="{{ route('question-show', [$question->slug]) }}" target="_blank" class="underline hover:cursor-pointer md:text-lg text-blue-700 hover:text-blue-900">{{ $question->title }}</a>
                                <br>
                            @endforeach
                        @else
                            <h4 class="text-lg mt-4 text-center font-bold text-gray-500">Nothing to show.</h4>
                        @endif
                    </div>
                </div>
            </div>
            <div class="hidden w-96 md:block">
                 {{-- ADS --}}
            </div>
        </div>
    </div>
</x-layouts.layout>