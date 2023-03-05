<x-filter-question title="{{ $category }}" :questions="$questions">
    <x-slot name="header">
        <h1 class="text-lg mb-12 font-bold text-gray-800 lg:text-2xl ">
            Category "{{ ucwords($category) }}"
        </h1>
    </x-slot>
</x-filter-question>