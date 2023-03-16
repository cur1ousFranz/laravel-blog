<x-layouts.layout title="{{ $question->title }}">
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
        <div class="w-full flex">

            <div class="w-full p-4 shadow-sm">
                <h1 class="text-2xl font-bold mb-2 text-gray-800">Edit Post</h1>
                <form action="{{ route('question-update', [$question->slug]) }}" method="POST" class="w-full space-y-8">
                    @csrf
                    @method('PUT')
                    <div>
                        <input type="text" name="title" class="px-4 py-2 w-full border rounded-lg border-gray-900" placeholder="Title" value="{{ old('title') ?? $question->title }}">
                        @error('title')
                            <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <textarea name="body" id="" cols="30" rows="10">{{ old('body') ?? $question->body }}</textarea>
                        @error('body')
                            <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        @php
                            $tags = json_decode($question->tags);
                            $combinedTags = '';
                            foreach ($tags as $tag) {
                                if(!$combinedTags) {
                                    $combinedTags = $combinedTags . $tag;
                                } else {
                                    $combinedTags = $combinedTags . ',' . $tag;
                                }
                            }
                        @endphp

                        <input type="text" name="tags" class="px-4 py-2 w-full border rounded-lg border-gray-900" placeholder="Tags" value="{{ old('tags') ?? $combinedTags }}">
                        @error('tags')
                            <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="history.back()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-600 hover:text-white  text-gray-900">
                            Cancel
                        </button>
                     
                        <button class="px-4 py-2 rounded-lg bg-gray-800 hover:bg-gray-900 text-white">
                            Update
                        </button>
                    </div>
                </form>

                <form action="{{ route('question-image-update', [$question->slug]) }}" class="mt-6 space-y-8 shadow-md p-4 rounded w-full" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h1 class="text-2xl font-bold mb-2 text-gray-800">Edit Image</h1>
                    <div>
                        <input type="file" name="img" class="px-4 py-2 w-full border rounded-lg border-gray-900">
                        @error('img')
                            <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="img_title" class="px-4 py-2 w-full border rounded-lg border-gray-900" placeholder="Image Title" value="{{ $question->image ? $question->image->img_title : '' }}">
                        @error('img_title')
                            <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="img_caption" class="px-4 py-2 w-full border rounded-lg border-gray-900" placeholder="Image Caption" value="{{ $question->image ? $question->image->img_caption : '' }}">
                        @error('img_caption')
                            <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="img_alt" class="px-4 py-2 w-full border rounded-lg border-gray-900" placeholder="Image Alt" value="{{ $question->image ? $question->image->img_alt : '' }}">
                        @error('img_alt')
                            <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="history.back()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-600 hover:text-white  text-gray-900">
                            Cancel
                        </button>
                     
                        <button class="px-4 py-2 rounded-lg bg-gray-800 hover:bg-gray-900 text-white">
                            Update
                        </button>
                    </div>
                </form>

                <div class="mt-2 mb-4">
                    {{-- ADS --}}
        
                    <!-- HORIZONTAL -->
                    <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-4812454445865215"
                    data-ad-slot="3496243870"
                    data-ad-format="auto"
                    data-full-width-responsive="true"></ins>
                </div>
            </div>

            <div class="hidden w-96 lg:block">
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