
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $content->title }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- Media Section --}}
                @if($content->hasMedia())
                    <x-media.media-list :medias="$content->media"></x-media.media-list>
                @endif
                {{-- Content Section --}}
                <div class="px-5 flex-wrap">
                    {!! $content->content !!}
                </div>
                @dump($content->media)
            </div>
        </div>
    </div>
</x-app-layout>
