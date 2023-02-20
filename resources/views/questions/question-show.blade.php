<x-layouts.layout title="{{ $question->title }}" description="{{ $description }}">
    <div class="px-4 mt-8">
        <div class="w-full flex">
            <div class="w-96">
                {{-- ADS --}}
            </div>
            <div class="w-full p-4 shadow-sm">
                <h1 class="text-xl font-bold mb-2 text-gray-800 md:text-4xl">{{ $question->title }}</h1>
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
                <h2 class="mt-6 text-gray-900">
                    {!! $question->body !!}</code>
                </h2>
            </div>
            <div class="w-96">
                 {{-- ADS --}}
            </div>
        </div>
    </div>
</x-layouts.layout>