<x-layouts.layout title="{{ $question->title }}" description="{{ $description }}" 
    :image="$question->image ? $question->image->img_path : url('img/logo.png')" 
    :alt="$question->image ? $question->image->img_alt : 'CodeSnippetStuff Logo'">
    <div class="mt-8">
        <div class="mb-4 pb-4">
            {{-- ADS --}}
    
            <!-- HORIZONTAL -->
            <ins class="adsbygoogle"
                style="display:inline-block;width:728px;height:90px"
                data-ad-client="ca-pub-4812454445865215"
                data-ad-slot="3496243870"></ins>
        </div>
        <div class="w-full flex lg:space-x-1">
            <div class="p-6 w-full" style="max-width: 60rem;">
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
                <div class="p-6 shadow-sm border rounded-md border-t-2 border-t-gray-400">
                    <section class="header">
                        <div class="space-x-2 mb-1">
                            <span class="date text-sm inline-block text-gray-700">
                                <span class="inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                                        <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                      </svg>  
                                </span>
                                {{ $question->created_at->format('F j, Y') }}
                            </span>
                            <span class="read-time text-sm inline-block text-gray-700">
                                <span class="inline-block mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                      </svg>
                                </span>
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
                </div>
                <div class="mt-2">
                    {{-- ADS --}}

                    <!-- HORIZONTAL -->
                    <ins class="adsbygoogle"
                        style="display:inline-block;width:728px;height:90px"
                        data-ad-client="ca-pub-4812454445865215"
                        data-ad-slot="3496243870"></ins>
                </div>
                <div class="p-6 shadow-sm border rounded-md border-t-2 border-t-gray-400" style="margin-top: 50px">
                    <h1 class="text-xl font-bold text-gray-800 md:text-3xl">Related problems</h1>
                    <div class="mt-4">
                        @if ($questions->count() >= 6)
                            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach ($questions->random(6) as $question)
                                    @php
                                        $description = preg_match('/^([^\.!?]*[\.!?]+){2}/', $question->body, $matches);
                                        $description = $matches[0];
                                        $description = preg_replace('/<[^>]*>/', '', $description);
                                    @endphp
                                    <x-question-container :question="$question" :description="$description" :image="$question->image ? $question->image->img_path : url('img/logo.png')" :alt="$question->image ? $question->image->img_alt : 'CodeSnippetStuff Logo'"/>
                                @endforeach
                            </div>
                        @elseif($question->count() > 0)
                            <div class="grid grid-cols-2 lg:grid-cols-3 gap-2">
                                @foreach ($questions as $question)
                                    @php
                                        $description = preg_match('/^([^\.!?]*[\.!?]+){2}/', $question->body, $matches);
                                        $description = $matches[0];
                                        $description = preg_replace('/<[^>]*>/', '', $description);
                                    @endphp
                                    
                                    <x-question-container :question="$question" :description="$description" :image="$question->image ? $question->image->img_path : url('img/logo.png')" :alt="$question->image ? $question->image->img_alt : 'CodeSnippetStuff Logo'"/>
                                @endforeach
                            </div>
                        @else 
                            <h4 class="text-lg mt-4 text-center font-bold text-gray-500">Nothing to show.</h4>
                        @endif
                    </div>
                </div>

                {{-- Multiplex ads --}}
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4812454445865215"
                    crossorigin="anonymous"></script>
                <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-format="autorelaxed"
                    data-ad-client="ca-pub-4812454445865215"
                    data-ad-slot="9157401149"></ins>
            </div>
            <div class="hidden w-80 lg:block" style="min-width: 300px;">
                {{-- ADS --}}

                {{-- SKYSCRAPER --}}
                <ins class="adsbygoogle"
                    style="display:inline-block;width:160px;height:600px"
                    data-ad-client="ca-pub-4812454445865215"
                    data-ad-slot="4415877212"></ins>

                <!-- 2nd customized -->
                <ins class="adsbygoogle"
                    style="display:inline-block;width:300px;height:250px"
                    data-ad-client="ca-pub-4812454445865215"
                    data-ad-slot="2051817189"></ins>

                {{-- customized sized medium (1st) --}}
                <ins class="adsbygoogle"
                    style="display:inline-block;width:300px;height:250px"
                    data-ad-client="ca-pub-4812454445865215"
                    data-ad-slot="1525488989">
                </ins>

                {{-- 3rd customized --}}
                <ins class="adsbygoogle"
                    style="display:inline-block;width:300px;height:250px"
                    data-ad-client="ca-pub-4812454445865215"
                    data-ad-slot="1278911129"></ins>

                {{-- 4th customized --}}
                <ins class="adsbygoogle"
                    style="display:inline-block;width:300px;height:250px"
                    data-ad-client="ca-pub-4812454445865215"
                    data-ad-slot="6639899077"></ins>
            </div>
        </div>
    </div>
</x-layouts.layout>