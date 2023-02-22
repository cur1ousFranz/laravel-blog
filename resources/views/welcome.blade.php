<x-layouts.layout>
    <div class="px-12 mt-8 min-h-screen">
        
        <form action="{{ route('question-search') }}" class="w-full flex justify-end" method="POST">
            @csrf
            <input type="text" name="search" class="px-4 py-2 border w-full rounded-full focus:outline-none md:w-2/4 border-gray-900" placeholder="Search">
        </form>

        <div class="flex space-x-12 justify-between mt-10">
            <div class="space-y-6 lg:w-6/12">
                <h1 class="text-xl font-bold text-gray-900 lg:text-4xl">Need help for something?</h1>
                <div class="p-4 rounded-md shadow-lg">
                    @foreach ($questions as $question)
                        <div class="p-2 rounded hover:bg-gray-200">
                            <span class="inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                  </svg>
                            </span>
                            <a href="{{ route('question-show', [$question->slug]) }}" target="_blank" class=" w-full font-semibold text-sm underline hover:cursor-pointer text-blue-500 hover:text-blue-700">{{ $question->title }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="hidden lg:w-6/12 lg:flex lg:justify-end">
                <img class="rounded-lg shadow-2xl mt-24 rotate-2 h-2/3" src="{{ asset('storage/logo/code-hero.jpg') }}" alt="code_image">
            </div>
        </div>

    </div>
   
</x-layouts.layout>