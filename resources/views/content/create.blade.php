<x-app-layout>
    <x-slot name="header">
        <x-title :title="__('content/create.title')"></x-title>
    </x-slot>

    <form
        method="post"
        action="{{ route('content.store', ['user' => $user->getRenderableId()]) }}"
        enctype="multipart/form-data"
    >
        @csrf
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    {{ __('content/create.info_line_1') }}
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    {{ __('content/create.info_line_2') }}
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 p-5">
                        <dt class="text-sm font-medium text-gray-500">
                            <label for="title">{{ __('common.title') }}</label>
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
                            <label for="description">{{ __('content/create.description') }}</label>
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
                            <label for="content">{{ __('content/create.content') }}</label>
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
                            {{ __('content/create.attachments') }}
                            <button
                                type="button"
                                onclick="addNewFileInput()"
                                class="flex items-center mx-1 my-1 py-2 px-4 text-white text-center font-medium border border-transparent rounded-md outline-none bg-gray-500"
                            >
                                {{ __('content/create.add_media') }}
                            </button>
                            <button
                                type="button"
                                onclick="addNewUrlInput()"
                                class="flex items-center mx-1 py-2 px-4 text-white text-center font-medium border border-transparent rounded-md outline-none bg-gray-500"
                            >
                                {{ __('content/create.from_url') }}
                            </button>
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul class="border border-gray-200 rounded-md divide-y divide-gray-200" id="fileList"></ul>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="m-20">
            <button
                type="submit"
                class="flex items-center mx-auto py-2 px-4 text-white text-center font-medium border border-transparent rounded-md outline-none bg-gray-500"
            >
                {{ __('content/create.publish') }}
            </button>
        </div>

    </form>

@push('scripts')
<script type="text/javascript">
    const fileList = document.getElementById('fileList');

    function createLiElement() {
        let li = document.createElement('li');
        li.setAttribute('class', 'pl-3 pr-4 py-3 flex items-center justify-between text-sm');
        return li;
    }

    function createWrapper() {
        let wrapper = document.createElement('div');
        wrapper.setAttribute('class', 'w-0 flex-1 flex items-center');
        return wrapper;
    }

    function getMediaAttribute() {
        let index = (parseInt(fileList.children.length) + 1);
        return 'media[' + index + ']';
    }

    function createInputElement() {
        let name = getMediaAttribute();
        let input = document.createElement('input');
        input.setAttribute('name', name);
        input.setAttribute('id', name);
        return input;
    }

    function createFileInput() {
        let input = createInputElement();
        input.setAttribute('type', 'file');
        return input;
    }

    function createUrlInput() {
        let input = createInputElement();
        input.setAttribute('type', 'url');
        input.setAttribute('class', 'mt-1 block w-full rounded border-gray-300 shadow focus:border-gray-900 focus:ring focus:ring-gray-200 focus:ring-opacity-50');
        return input;
    }

    function wrapElement(element) {
        let wrapper = createWrapper();
        let li = createLiElement();
        wrapper.append(element);
        li.append(wrapper);

        return li;
    }

    function addNewFileInput() {
        let input = createFileInput();
        let li = wrapElement(input);

        fileList.append(li);
    }

    function addNewUrlInput() {
        let input = createUrlInput();
        let li = wrapElement(input);

        fileList.append(li);
    }
</script>
@endpush
</x-app-layout>
