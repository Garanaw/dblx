<x-app-layout>
    <x-slot name="header">
        <x-title :title="__('dashboard.dashboard')"></x-title>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl">
                        {{ __('dashboard.welcome') }}
                    </div>

                    <div class="mt-6 text-gray-500">
                        {{ __('dashboard.intro') }}
                    </div>
                </div>

                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <x-svg.book></x-svg.book>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                                <a href="{{ route('content.index', ['user' => $user->getRenderableId()]) }}">
                                    {{ __('dashboard.entries.view.title') }}
                                </a>
                            </div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                {{ __('dashboard.entries.view.description') }}
                            </div>

                            <a href="{{ route('content.index', ['user' => $user->getRenderableId()]) }}">
                                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                    <div>{{ __('dashboard.entries.view.title') }}</div>

                                    <div class="ml-1 text-indigo-500">
                                        <x-svg.arrow-left></x-svg.arrow-left>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <x-svg.camera></x-svg.camera>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                                <a href="{{ route('content.create', ['user' => $user->getRenderableId()]) }}">
                                    {{ __('dashboard.entries.create.title') }}
                                </a>
                            </div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                {{ __('dashboard.entries.create.description') }}
                            </div>

                            <a href="{{ route('content.create', ['user' => $user->getRenderableId()]) }}">
                                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                    <div>{{ __('dashboard.entries.create.title') }}</div>

                                    <div class="ml-1 text-indigo-500">
                                        <x-svg.arrow-left></x-svg.arrow-left>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
