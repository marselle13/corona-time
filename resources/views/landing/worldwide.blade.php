<x-layout>
    @include('landing._header')
    @include('landing._navigation' , ['head' => trans('messages.world_statistic')])
    <main class="md:w-[85%] mx-auto grid lg:grid-cols-3 gap-6 mt-6 md:mt-10 grid-cols-2 w-[96%]">
        @if($worldwide)
        <x-card color="#2029F3" icon="high" class="bg-[#2029F3] text-[#2029F3] col-span-2 lg:col-span-1" head="{{trans('messages.new_cases')}}">{{$worldwide->confirmed}}</x-card>
        <x-card color="#0FBA68" icon="low" class="bg-[#0FBA68] text-[#0FBA68] " head="{{trans('messages.recovered')}}">{{$worldwide->recovered}}</x-card>
        <x-card color="#EAD621" icon="middle" class="" class="bg-[#EAD621] text-[#EAD621]" head="{{trans('messages.death')}}">{{$worldwide->deaths}}</x-card>
        @else
        <p>{{trans('messages.no_data')}}</p>
        @endif
    </main>
</x-layout>
