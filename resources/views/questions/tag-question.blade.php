<x-filter-question title="Tags" :questions="$questions">
    <x-slot name="header">
        <h1 class="text-lg mb-12 font-bold text-gray-800 lg:text-2xl ">
           Tag "{{ ucwords($tag) }}"
        </h1>
    </x-slot>
</x-filter-question>