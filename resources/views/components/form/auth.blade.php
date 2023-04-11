@props(['info'])
<div class="">
    <div class="mb-11 md:mb-14 ">
        <img src="{{asset('./images/coronatime.png')}}" alt="coronatime"/>
    </div>
    <div class="space-y-2 md:space-y-4">
        <h1 class="font-black  text-xl md:text-2xl text-[#010414]">{{$slot}}</h1>
        <p class="text-base md:text-xl text-[#808189]">{{$info}}</p>
    </div>
</div>
