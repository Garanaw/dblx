
<x-app-layout>
    <x-slot name="header">
        <x-title :title="$content->title"></x-title>
    </x-slot>

    <div class="p-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-5 overflow-hidden shadow-xl sm:rounded-lg">
                {{-- Media Section --}}
                @if($content->hasMedia())
                    <x-media.media-list :medias="$content->media"></x-media.media-list>
                @endif
                {{-- Content Section --}}
                <div class="px-5 flex-wrap whitespace-pre-wrap">
                    {!! $content->content !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
