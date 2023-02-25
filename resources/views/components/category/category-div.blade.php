@props(['src', 'name', 'category'])

<a href="{{ route('category', [$category]) }}" class="rounded-md p-4 flex space-x-3 border cursor-pointer shadow-sm hover:shadow-xl">
    <img class="w-1/4" src="{{ $src }}" />
    <h2 class="text-sm mt-1 font-semibold text-gray-700 lg:text-xl">{{ $name }}</h2>
</a>