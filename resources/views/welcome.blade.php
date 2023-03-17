<x-layouts.layout>
    <div class="px-12 mt-8 min-h-screen">
        <div class="mt-2">
            {{-- ADS --}}

            <!-- HORIZONTAL -->
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-4812454445865215"
                data-ad-slot="3496243870"
                data-ad-format="auto"
                data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>

        <form action="{{ route('question-search') }}" class="mt-12 w-full flex justify-start" method="POST">
            @csrf
            <input type="text" name="search" class="px-4 shadow-md py-2 border w-full rounded-full focus:outline-none md:w-2/4 border-gray-900" placeholder="Search">
        </form>

        <div class="flex space-x-12 justify-between mt-6">
            <div class="space-y-6 w-full lg:w-6/12">
                <div class="p-4 rounded-md shadow-lg">
                    @if ($questions)
                        <ul>
                            @foreach ($questions->random(10) as $question)
                                <li class="truncate border-b border-gray-200 p-2 max-w-full hover:bg-gray-200" >
                                    <span class="inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-up-right-square" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707l-4.096 4.096z"/>
                                        </svg>
                                    </span>
                                    <a href="{{ route('question-show', [$question->slug]) }}" class=" w-full font-semibold">{{ $question->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <h4 class="text-lg mt-4 text-center font-bold text-gray-500">Nothing to show.</h4>
                    @endif
                </div>
            </div>
            <div class="hidden h-fit lg:w-6/12 lg:flex lg:justify-end">
                <img class="rounded-lg shadow-2xl mt-6 rotate-2" src="{{ asset('img/code-hero.jpg') }}" alt="code_image">
            </div>
        </div>
        <div class="mt-6">
            {{-- ADS --}}

            <!-- HORIZONTAL -->
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-4812454445865215"
                data-ad-slot="3496243870"
                data-ad-format="auto"
                data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>

        <section class="categories mt-4">
            <x-category.categories/>
        </section>

        
    </div>
    
    <div class="mt-6">
        {{-- ADS --}}

        <!-- HORIZONTAL 2 -->
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-4812454445865215"
            data-ad-slot="6935181031"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>

    <div class="my-44">
        <h1 class="text-center text-2xl font-bold italic uppercase text-gray-600">
            “Code is like humor. When you have to explain it, it’s bad.” <br> – Cory House
        </h1>
    </div>
</x-layouts.layout>