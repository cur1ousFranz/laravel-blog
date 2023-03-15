<x-layouts.layout>
    <div class="px-4 mt-8">
        <div class="w-full flex space-x-2">

            <div class="hidden relative w-96 md:block">
                {{-- ADS --}}
                <ins class="adsbygoogle"
                    style="display:inline-block;width:300px;height:250px"
                    data-ad-client="ca-pub-4812454445865215"
                    data-ad-slot="2051817189"></ins>

                <ins class="adsbygoogle"
                    style="display:inline-block;width:300px;height:250px"
                    data-ad-client="ca-pub-4812454445865215"
                    data-ad-slot="1525488989">
                </ins>

                <ins class="adsbygoogle"
                    style="display:inline-block;width:300px;height:250px"
                    data-ad-client="ca-pub-4812454445865215"
                    data-ad-slot="1278911129"></ins>

                </ins>
                <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
            <div class="w-full p-4 shadow-xl">
                <h1 class="text-2xl font-bold mb-2 text-gray-800">Create Question</h1>
                <form action="{{ route('question-create') }}" method="POST" class="w-full space-y-8" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <input type="text" name="title" class="px-4 py-2 w-full border rounded-lg border-gray-900" placeholder="Title" value="{{ old('title') }}">
                        @error('title')
                            <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <textarea name="body" id="" cols="30" rows="10">{{ old('body') }}</textarea>
                        @error('body')
                            <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="tags" class="px-4 py-2 w-full border rounded-lg border-gray-900" placeholder="Tags" value="{{ old('tags') }}">
                        @error('tags')
                            <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <h1 class="text-2xl font-bold mb-2 text-gray-800">Upload Image</h1>
                    <div>
                        <input type="file" name="img" class="px-4 py-2 w-full border rounded-lg border-gray-900">
                        @error('img')
                            <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="img_title" class="px-4 py-2 w-full border rounded-lg border-gray-900" placeholder="Image Title" value="{{ old('img_title') }}">
                        @error('img_title')
                            <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="img_caption" class="px-4 py-2 w-full border rounded-lg border-gray-900" placeholder="Image Caption" value="{{  old('img_caption')  }}">
                        @error('img_caption')
                            <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="img_alt" class="px-4 py-2 w-full border rounded-lg border-gray-900" placeholder="Image Alt" value="{{ old('img_alt') }}">
                        @error('img_alt')
                            <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="history.back()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-600 hover:text-white  text-gray-900">
                            Cancel
                        </button>
                        <button class="px-4 py-2 rounded-lg bg-gray-800 hover:bg-gray-900 text-white">
                            Create
                        </button>
                    </div>
                </form>

            </div>
            <div class="hidden relative w-96 md:block">
                 {{-- ADS --}}

                 <ins class="adsbygoogle"
                 style="display:inline-block;width:300px;height:250px"
                 data-ad-client="ca-pub-4812454445865215"
                 data-ad-slot="2051817189"></ins>

                <ins class="adsbygoogle"
                    style="display:inline-block;width:300px;height:250px"
                    data-ad-client="ca-pub-4812454445865215"
                    data-ad-slot="1525488989">
                </ins>

                <ins class="adsbygoogle"
                    style="display:inline-block;width:300px;height:250px"
                    data-ad-client="ca-pub-4812454445865215"
                    data-ad-slot="1278911129"></ins>
                   
                <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
    </div>
</x-layouts.layout>