<x-layouts.layout>
    <div class="px-4 mt-8">
        <div class="w-full flex">
            <div class="w-96">
                {{-- ADS --}}
            </div>
            <div class="w-full p-4 shadow-xl">
                <h1 class="text-2xl font-bold mb-2 text-gray-800">Create Post</h1>
                <form action="{{ route('question-create') }}" method="POST" class="w-full space-y-8">
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
            <div class="w-96">
                 {{-- ADS --}}
            </div>
        </div>
    </div>
</x-layouts.layout>