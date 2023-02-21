<x-layouts.layout title="{{ $search }}">
    <div class="px-4 mt-8">
        <div class="w-full flex">
            <div class="hidden w-96 md:block">
                {{-- ADS --}}
            </div>
            <div class="w-full p-4 shadow-sm">
                <div class="mb-4">
                    {{-- ADS --}}
                </div>

                <form action="{{ route('question-search') }}" class="w-full flex justify-center" method="POST">
                    @csrf
                    <input type="text" name="search" class="px-4 py-2 border-b w-full focus:outline-none  border-gray-900 " placeholder="Search" value="{{ old('search') ?? $search }}">
                    <button>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mt-2 bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                        </span>
                    </button>
                </form>
                <div class="mt-4">
                    @if ($questions->count())
                        @foreach ($questions as $question)
                            <a href="{{ route('question-show', [$question->slug]) }}" target="_blank" class="underline hover:cursor-pointer md:text-lg text-blue-700 hover:text-blue-900">{{ $question->title }}</a>
                            <br>
                        @endforeach
                    @else
                        <h4 class="text-lg mt-4 text-center font-bold text-gray-500">
                            No result keyword "{{ $search }}".
                        </h4>
                    @endif
                    {{-- {{ $questions->links('pagination::semantic-ui')}}  --}}
                </div>

                <div class="mt-6">
                    {{-- ADS --}}
                </div>

            </div>
            <div class="hidden w-96 md:block">
                 {{-- ADS --}}
            </div>
        </div>
    </div>
</x-layouts.layout>