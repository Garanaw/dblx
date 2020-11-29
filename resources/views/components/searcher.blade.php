
<form method="post" action="{{ route('content.search') }}" class="relative w-1/2">
    @csrf
    <div class="flex flex-wrap items-stretch w-full mb-4 relative">
        <input
            type="text"
            name="term"
            class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-grey-light rounded rounded-r-none px-3 relative"
            placeholder="Recipient's username"
        >
        <div class="flex -mr-px">
            <button
                type="submit"
                class="flex items-center leading-normal bg-grey-lighter rounded rounded-l-none border border-l-0 border-grey-light px-3 whitespace-no-wrap text-grey-dark text-sm"
            >
                Search Content
            </button>
        </div>
    </div>
</form>
