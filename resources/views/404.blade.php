<x-layouts.layout title="Not found">
    <div class="px-4 mt-8">
        <div class="w-full flex lg:space-x-1">
            <div class="p-6 w-full" style="max-width: 60rem;">
                <div class="mb-4">
                    {{-- ADS --}}
                </div>
                <button onclick="history.back()" class="font-semibold uppercase">
                    <span class="inline-block font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/>
                          </svg></span>    
                    Get back
                </button>
                <div class="my-12 flex justify-center">
                    <span>
                        <img class="w-96" src="{{ asset('img/404.svg') }}" alt="">
                    </span>
                </div>
                <div class="mt-6">
                    {{-- ADS --}}
                </div>
            </div>
            <div class="hidden w-96 lg:block">
                 {{-- ADS --}}
            </div>
        </div>
    </div>
</x-layouts.layout>