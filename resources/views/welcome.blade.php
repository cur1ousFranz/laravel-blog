<x-layouts.layout>
    <div class="px-12 mt-8 max-h-screen min-h-screen">
        
        <form action="{{ route('question-search') }}" class="w-full flex justify-end" method="POST">
            @csrf
            <input type="text" name="search" class="px-4 py-2 border-b w-full focus:outline-none md:w-2/4 border-gray-900 " placeholder="Search">
            <button>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mt-2 bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                </span>
            </button>
        </form>

        <div class="flex flex-col md:flex-row md:justify-between mt-10">
            <div class="space-y-6">
                <h1 class="text-xl font-bold text-gray-900 md:text-4xl">Need help for something?</h1>
                <div>
                    @foreach ($questions as $question)
                        <a href="{{ route('question-show', [$question->slug]) }}" target="_blank" class="underline hover:cursor-pointer md:text-lg text-gray-700 hover:text-gray-900">{{ $question->title }}</a>
                        <br>
                    @endforeach
                </div>
            </div>
            <div class="hidden md:block">
                <img class="rounded-lg shadow-2xl w-full rotate-2 mr-12" src="{{ asset('storage/logo/code.png') }}" alt="code_image">
            </div>
        </div>

    </div>
   
</x-layouts.layout>