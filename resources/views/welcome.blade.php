<x-layouts.layout>
    <div class="px-12 mt-8">
        
        <div class="flex justify-end">
            <input type="text" class="px-4 py-2 border-b w-full focus:outline-none md:w-2/4 border-gray-900 " placeholder="Search">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mt-2 bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>
            </span>
        </div>

        <div class="flex flex-col md:flex-row md:justify-between mt-10">
            <div class="space-y-2">
                <h1 class="text-xl font-bold text-gray-900 md:text-4xl">Welcome back developer!</h1>
                <h1 class="text-lg md:text-2xl">Lorem ipsum dolor sit amet consectetur adipisicing elit!</h1>
                <h1 class="text-lg md:text-2xl">Lorem ipsum dolor sit amet.</h1>
            </div>
            <div class="hidden md:block">
                <img class="rounded-lg shadow-2xl w-full rotate-2 mr-24" src="{{ asset('storage/logo/code.png') }}" alt="code_image">
            </div>
        </div>

    </div>
   
</x-layouts.layout>