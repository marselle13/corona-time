<x-layout>
    <div class="grid justify-items-center h-5/6 mx-4 md:mx-0">
        <div class="md:pt-10 pt-4 justify-self-start md:justify-self-center">
            <img src="{{asset('./images/coronatime.png')}}" alt="coronatime"/>
        </div>
        <div class="flex flex-col justify-between md:block">
            <div class="flex flex-col items-center gap-4 text-center  w-2/3 mx-auto md:w-full">
                <img src="{{asset('./images/success.gif')}}" class="" alt="success">
                <p class="md:text-lg text-base">{{$slot}}</p>
            </div>
            @if($button)
            <div class="w-full md:pt-[94px] pt-0 pb-10">
                <x-form.button>{{$button}}</x-form.button>
            </div>
            @endif
        </div>
    </div>
</x-layout>

