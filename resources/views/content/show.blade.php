
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $content->title }}
        </h2>
    </x-slot>

    <div>
        @dump($content)
    </div>
</x-app-layout>
