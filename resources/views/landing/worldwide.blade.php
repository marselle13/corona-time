<x-layout>
    @include('landing._header')
    @include('landing._navigation')
    <main class="w-[85%] mx-auto grid lg:grid-cols-3 gap-6 mt-10 grid-cols-2">
        <x-card color="#2029F3" icon="high" class="col-span-2 lg:col-span-1"/>
        <x-card color="#0FBA68" icon="low"/>
        <x-card color="#EAD621" icon="middle"/>
    </main>
</x-layout>
