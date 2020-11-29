
<div class="flex flex-wrap justify-around py-2">
    @foreach($medias as $media)
        <div class="flex p-3 shadow">
        @if($media->isVideo())
            <video src="{{ $media->getUrl() }}" controls></video>
        @elseif($media->isImage())
            <img
                src="{{ asset($media->getUrl()) }}"
                style="max-width: 300px; max-height: 300px"
            >
        @endif
        </div>
    @endforeach
</div>
