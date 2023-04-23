<button data-collapse-toggle="navbar-default" type="button"
        class="inline-flex flex-shrink-0 items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
        aria-controls="navbar-default" aria-expanded="false">
    <img src="{{asset('./images/burger.png')}}" alt="burger"/>
</button>
<div class="hidden md:block md:w-auto absolute top-20 w-[140px] md:static right-4" id="navbar-default">
    <ul class="font-medium flex flex-col md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white ">
        <li>
            <h4 class="font-bold px-4 py-2">{{$username}}</h4>
        </li>
        <div class="border-r-2 border-[#F6F6F6]"></div>
        <li>
            <form method="POST" action="{{route('auth.logout')}}">
                @csrf
                <div class="px-4 block py-2 hover:bg-gray-100 ">
                    <button type="submit">Log Out</button>
                </div>
            </form>
        </li>
    </ul>
</div>


