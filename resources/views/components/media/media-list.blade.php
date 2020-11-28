
@dump($medias)
<div class="flex flex-wrap justify-around">
    @foreach($medias as $media)
        <div class="flex">
        @if($media->isVideo())
            Es Video
        @elseif($media->isImage())
            <img src="{{ asset($media->getUrl()) }}">
        @endif
        </div>
    @endforeach
</div>
