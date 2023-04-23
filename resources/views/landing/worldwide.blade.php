<x-layout>
    @include('landing._header')
    @include('landing._navigation' , ['head' => trans('messages.world_statistic')])
    <main class="md:w-[85%] mx-auto grid lg:grid-cols-3 gap-6 mt-6 md:mt-10 grid-cols-2 w-[96%]">
        <x-card color="#2029F3" icon="high" class="col-span-2 lg:col-span-1">{{trans('messages.new_cases')}}</x-card>
        <x-card color="#0FBA68" icon="low">{{trans('messages.recovered')}}</x-card>
        <x-card color="#EAD621" icon="middle">{{trans('messages.death')}}</x-card>
    </main>
</x-layout>
