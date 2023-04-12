@props(['info'])
<div {{$attributes}}>
    <div class="mb-11 md:mb-14 inline-flex justify-between">
        <div>
            <img src="{{asset('./images/coronatime.png')}}" alt="coronatime"/>
        </div>
        <x-lang-dropdown/>
    </div>
    <div class="space-y-2 md:space-y-4">
        <h1 class="font-black  text-xl md:text-2xl text-[#010414] ">{{$slot}}</h1>
        @if($info)
        <p class="text-base md:text-xl text-[#808189]">{{$info}}</p>
        @endif
    </div>
</div>
