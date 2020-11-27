<table class="table-fixed border w-full">
    <thead>
        <tr>
            <th class="w-1/6">{{ __('content/index.has_media') }}</th>
            <th class="w-4/6">{{ __('common.title') }}</th>
            <th class="w-1/6">{{ __('common.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contents as $content)
            <tr>
                <td>
                    @if($content->hasMedia())
                        <x-svg.media></x-svg.media>
                    @endif
                </td>
                <td>{{ $content->title }}</td>
                <td>View</td>
            </tr>
        @endforeach
    </tbody>
</table>
