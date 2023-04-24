<header class="border-b-2 border-[#F6F6F7] py-5">
    <div class="flex gap-1 justify-between md:w-[85%] mx-auto w-[96%]">
        <img src="{{asset('./images/coronatime.png')}}" alt="coronatime"/>
        <div class="flex md:gap-10 items-center overflow-x-auto">
            <x-lang-dropdown class="top-6"/>
            <x-navbar-dropdown :username="$username"/>
        </div>
    </div>
</header>
