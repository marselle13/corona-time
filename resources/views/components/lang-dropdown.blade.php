<form id="language-form" method="POST" action="{{ route('language.set')}}" class="flex items-end">
    @csrf
    <button id="states-button" data-dropdown-toggle="dropdown-states"
            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-center rounded-md hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100"
            type="button">
        {{app()->getLocale() == 'en' ? 'English' : 'Georgian'}}
        <x-dropdown-icon/>
    </button>
    <div id="dropdown-states" class="z-10 hidden">
        <ul {{$attributes->class(['list-none flex flex-col absolute bg-gray-50 rounded-lg shadow w-36 -right-[68px]'])}}>
            <li class="inline-block">
                <button type="submit" name="locale" value="en"
                        class="py-2 px-4 w-full hover:bg-gray-100  border-none bg-transparent focus:outline-none {{ app()->getLocale() == 'en' ? 'text-blue-500' : 'text-gray-500' }}">
                    English
                </button>
            </li>
            <li class="inline-block">
                <button type="submit" name="locale" value="ka"
                        class="py-2 px-4  w-full hover:bg-gray-100 border-none bg-transparent focus:outline-none {{ app()->getLocale() == 'ka' ? 'text-blue-500' : 'text-gray-500' }}">
                    Georgian
                </button>
            </li>
        </ul>
    </div>
</form>

