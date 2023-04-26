<x-layout>
    @include('landing._header')
    @include('landing._navigation' , ['head' => trans('messages.country_statistic')])
    <main class="md:w-[85%] mx-auto mt-6 md:mt-10 w-full space-y-6 md:space-y-10">
        <x-form.search/>
        <x-table :countries="$countries"/>
    </main>
</x-layout>
