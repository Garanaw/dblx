<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('content/create.title') }}
        </h2>
    </x-slot>

    <form
        method="post"
        action="{{ route('content.store', ['user' => $user->getRenderableId()]) }}"
        enctype="multipart/form-data"
        x-data="createContentForm"
        @keydown.escape="isDialogOpen = false"
    >

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <button type="button" class="border p-2 bg-white hover:border-gray-500" @click="isDialogOpen = true">Open modal</button>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Applicant Information
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Personal details and application.
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 p-5">
                        <dt class="text-sm font-medium text-gray-500">
                            <label for="title">Title</label>
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 py-5">
                            <input
                                type="text"
                                name="title"
                                id="title"
                                class="mt-1 block w-full rounded border-gray-300 shadow focus:border-gray-900 focus:ring focus:ring-gray-200 focus:ring-opacity-50"
                            >
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 p-5">
                        <dt class="text-sm font-medium text-gray-500">
                            <label for="description">Description</label>
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 p-2 py-5">
                            <textarea
                                name="description"
                                id="description"
                                class="resize-none m-1 block w-full p-2 rounded border-gray-300 shadow"
                            ></textarea>
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            <label for="content">Content</label>
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 h-80">
                            <textarea
                                name="content"
                                id="content"
                                class="resize-none m-1 block w-full p-2 rounded border-gray-300 shadow text-grey-darkest h-full"
                            ></textarea>
                        </dd>
                    </div>

                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Attachments
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        <x-svg.clip></x-svg.clip>
                                        <span class="ml-2 flex-1 w-0 truncate">
                                            resume_back_end_developer.pdf
                                        </span>
                                    </div>
                                </li>
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        <x-svg.clip></x-svg.clip>
                                        <span class="ml-2 flex-1 w-0 truncate">
                                            coverletter_back_end_developer.pdf
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        {{-- Modal --}}
        <div
            class="overflow-auto"
            style="background-color: rgba(0,0,0,0.5)"
            x-show="isDialogOpen"
            :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }"
        >
            <div
                class="bg-white shadow-2xl m-4 sm:m-8"
                x-show="isDialogOpen"
                @click.away="isDialogOpen = false"
            >
                <div class="flex justify-between items-center border-b p-2 text-xl">
                    <h6 class="text-xl font-bold">Simple modal dialog</h6>
                    <button type="button" @click="isDialogOpen = false">✖</button>
                </div>
                <div class="p-2">
                    <!-- content -->

                    <select class="rounded">
                        <option value="yes">Yes</option>
                        <option value="no">NO</option>
                    </select>
                </div>
            </div>
        </div>

    </form>

    @push('scripts')
        <script type="text/javascript" src="{{ mix('js/content/create/fileUploader.js') }}"></script>
    @endpush
</x-app-layout>
