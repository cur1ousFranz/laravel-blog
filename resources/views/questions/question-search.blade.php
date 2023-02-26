<x-layouts.layout title="{{ $search }} - Search">
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
                    <input type="text" name="search" class="rounded-full px-4 py-2 w-full border focus:outline-none  border-gray-900 " placeholder="Search" value="{{ old('search') ?? $search }}">
                    @error('search')
                        <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                    @enderror
                </form>
                <div class="mt-4">
                    @if ($questions)
                        @foreach ($questions as $question)
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