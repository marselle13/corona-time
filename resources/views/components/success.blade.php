<x-layout>
    <div class="grid justify-items-center h-full md:h-5/6 mx-4 md:mx-0">
        <div class="md:pt-10 pt-4 md:justify-self-center">
            <img src="{{asset('./images/coronatime.png')}}" alt="coronatime"/>
        </div>
        <div class="flex flex-col justify-between md:block md:w-[392px] w-full md:whitespace-nowrap">
            <div class="flex flex-col items-center gap-4 text-center mx-auto md:w-full">
                <img src="{{asset('./images/success.gif')}}" alt="success">
                <p class="text-base">{{$slot}}</p>
            </div>
            @if($button)
            <div class="w-full md:pt-[94px] pt-0 pb-10">
                <x-form.button>{{$button}}</x-form.button>
            </div>
            @endif
        </div>
    </div>
</x-layout>

