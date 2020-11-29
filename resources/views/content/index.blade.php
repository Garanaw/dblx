
<x-app-layout>
    <x-slot name="header">
        <x-title :title="__('content/index.title')"></x-title>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="bg-gray-50">
                    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
                        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                            <span class="block">{{ __('dashboard.welcome') }}</span>
                        </h2>
                        <div class="mt-8 lex lg:mt-0 lg:flex-shrink-0">
                            <div class="inline-flex rounded-md shadow">
                                <a href="{{ route('content.create', ['user' => $user->getRenderableId()]) }}"
                                   class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700"
                                >
                                    {{ __('content/index.add_content') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <span class="block">{{ __('dashboard.intro') }}</span>
                </div>

                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1">
                    <div class="flex p-6 w-max justify-center">
                        <x-content.content-table :content="$content"></x-content.content-table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
