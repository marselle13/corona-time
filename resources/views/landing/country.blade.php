<x-layout>
    @include('landing._header')
    @include('landing._navigation' , ['head' => trans('messages.country_statistic')])
    <main class="md:w-[85%] mx-auto mt-6 md:mt-10 w-full space-y-6 md:space-y-10">
        <form>
            <div class="relative">
                <div class="absolute inset-y-0 left-4 md:left-6 flex items-center pointer-events-none">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.3334 19.3334L14 14.0001M8.66669 16.6667C4.24841 16.6667 0.666687 13.085 0.666687 8.66675C0.666687 4.24847 4.24841 0.666748 8.66669 0.666748C13.085 0.666748 16.6667 4.24847 16.6667 8.66675C16.6667 13.085 13.085 16.6667 8.66669 16.6667Z"
                            stroke="#010414"/>
                    </svg>
                </div>
                <form method="GET" action="{{route('landings.country')}}">
                    <input type="text" name="search"
                           class="text-sm w-60 rounded-lg md:border-1 md:border-[#E6E6E7] border-transparent focus:ring-0 md:focus:ring-1 pl-12 md:pl-14 placeholder-[#808189] placeholder-text-lg py-3"
                           placeholder="Search by country" value="{{request('search')}}">
                </form>
            </div>
        </form>
        <x-table :countries="$countries"/>
    </main>
</x-layout>
