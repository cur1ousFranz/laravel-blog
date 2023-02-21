<x-layouts.layout title="{{ $question->title }}">
    <div class="px-4 mt-8">
        <div class="w-full flex">
            <div class="w-96">
                {{-- ADS --}}
            </div>

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

                    <button class="px-4 py-2 w-full rounded-lg bg-gray-800 hover:bg-gray-900 text-white">
                        Update
                    </button>
                </form>
            </div>

            <div class="w-96">
                 {{-- ADS --}}
            </div>
        </div>
    </div>
</x-layouts.layout>