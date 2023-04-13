<x-layout>
    <div class="block md:grid md:justify-center content-center h-full px-4 pt-4 md:px-0">
        <div>
            <img src="{{asset('./images/worldwide.png')}}" class="mx-auto" alt="worldwide"/>
        </div>
        <div class="space-y-2 md:space-y-4 text-center mt-14">
            <h1 class="font-black  text-xl md:text-2xl text-[#010414]">{{$slot}}</h1>
            <p class="text-base md:text-xl text-[#808189]">{{$info}}</p>
        </div>
        <div class="mt-10">
            <x-form.button>{{$button}}</x-form.button>
        </div>
    </div>
</x-layout>
