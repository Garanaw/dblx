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
                <td class="flex justify-center">
                    @if($content->hasMedia())
                        <x-svg.media></x-svg.media>
                    @endif
                </td>
                <td>{{ $content->title }}</td>
                <td class="flex justify-center">
                    <a
                        href="{{ route('content.show', ['content' => $content->getRenderableId()]) }}"
                        class="inline-flex items-center justify-center px-4 py-1 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700"
                    >
                        {{ __('content/index.view') }}
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
