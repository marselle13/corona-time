<div {{$attributes->class(["bg-[$color] bg-opacity-[0.08] rounded-2xl h-[193px] md:h-[255px] shadow-[1px_2px_8px_-15px_rgba(0,0,0,0.4)]"])}}>
    <div class="py-6 justify-between h-full md:py-10 flex flex-col items-center" >
        <x-icons icon="{{$icon}}" color="{{$color}}" class="w-[90px]"/>
        <div class="mt-4 md:mt-6 text-center space-y-4">
            <h5 class="capitalize md:text-2xl text-base text-[{{$color}}]">{{$slot}}</h5>
            <h3 class="font-black md:text-[39px] leading-[30px] md:leading-[47px] text-[25px]  text-[{{$color}}]">715,523</h3>
        </div>
    </div>

</div>
