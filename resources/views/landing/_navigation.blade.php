<section class="md:w-[85%] mx-auto md:mt-10 mt-6 md:space-y-10 w-[96%] space-y-6">
    <h1 class="text-[xl] md:text-[25px] md:leading-[30px] font-extrabold">{{$head}}</h1>
    <nav>
        <ul class="flex gap-4 md:gap-[72px]">
            <li class="{{request()->is('worldwide') ? 'border-b-[3px] border-[#010414] md:pb-4 pb-3 font-bold' : ''}}"><a href="{{route('landings.worldwide')}}" class=" text-sm md:text-base">{{trans('messages.world')}}</a></li>
            <li class="{{request()->is('country') ? 'border-b-[3px] border-[#010414] md:pb-4 pb-3 font-bold' : ''}}"><a href="{{route('landings.country')}}" class="text-sm md:text-base ">{{trans('messages.by_country')}}</a></li>
        </ul>
    </nav>
</section>
