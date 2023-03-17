<x-layouts.layout title="{{ $search }} - Search">
    <div class="px-4 mt-8">
        <div class="mb-4 pb-4">
            {{-- ADS --}}

            <!-- HORIZONTAL -->
            <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-4812454445865215"
            data-ad-slot="3496243870"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        </div>
        <div class="w-full flex lg:space-x-1">
            <div class="p-6 w-full" style="max-width: 60rem;">
                
                <form action="{{ route('question-search') }}" class="w-full flex justify-center" method="POST">
                    @csrf
                    <input type="text" name="search" class="rounded-full px-4 py-2 w-full border focus:outline-none  border-gray-900 " placeholder="Search" value="{{ old('search') ?? $search }}">
                    @error('search')
                        <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                    @enderror
                </form>
                <div class="mt-12">
                    @if ($questions->count())
                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-2">
                            @foreach ($questions as $question)
                                @php
                                    $description = preg_match('/^([^\.!?]*[\.!?]+){2}/', $question->body, $matches);
                                    $description = $matches[0];
                                    $description = preg_replace('/<[^>]*>/', '', $description);
                                @endphp
                                <x-question-container :question="$question" :description="$description"/>
                            @endforeach
                        </div>
                    @else
                        <h4 class="text-lg mt-4 text-center font-bold text-gray-500">
                            No result keyword "{{ $search }}".
                        </h4>
                    @endif
                </div>
            </div>
            <div class="hidden w-80 lg:block" style="min-width: 300px;">
                {{-- ADS --}}
        
                <ins class="adsbygoogle"
                    style="display:inline-block;width:300px;height:250px"
                    data-ad-client="ca-pub-4812454445865215"
                    data-ad-slot="1525488989">
                </ins>

                <ins class="adsbygoogle"
                    style="display:inline-block;width:300px;height:250px"
                    data-ad-client="ca-pub-4812454445865215"
                    data-ad-slot="1278911129"></ins>
           </div>
        </div>
        <div class="mt-2">
            {{-- ADS --}}

            <!-- HORIZONTAL 2 -->
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-4812454445865215"
                data-ad-slot="6935181031"
                data-ad-format="auto"
                data-full-width-responsive="true"></ins>

        </div>
    </div>
</x-layouts.layout>