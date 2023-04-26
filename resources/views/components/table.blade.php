@props(['countries'])
<div class="relative sm:rounded-lg overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-xs text-[#010414] uppercase bg-[#F6F6F7] font-semibold flex w-full ">
            <tr class="w-full flex">
                <th class="pl-4 md:pl-10 py-5 w-1/4 lg:w-1/6">
                    <div class="flex items-center gap-1 md:gap-2">
                        {{trans('messages.location')}}
                        @if(request('search'))
                            <input type="hidden" name="search" value="{{request('search')}}">
                        @endif
                        <x-form.sort-buttons name="location"/>
                    </div>
                </th>
                <th class="{{app()->getLocale() == 'en' ? 'pl-2' : "-ml-2"}} md:pl-10 py-5 w-1/4 lg:w-1/6">
                    <div class="flex items-center gap-1 md:gap-2 whitespace-nowrap">
                        {{trans('messages.new_cases')}}
                        <x-form.sort-buttons name="confirmed"/>
                    </div>
                </th>
                <th class="pl-4 md:pl-10 py-5 w-1/4 lg:w-1/6">
                    <div class="flex items-center gap-1 md:gap-2">
                        {{trans('messages.death')}}
                        <x-form.sort-buttons name="deaths"/>
                    </div>
                </th>
                <th class="md:pl-10 py-5 w-1/4 lg:w-1/6">
                    <div class="flex items-center gap-1 md:gap-2">
                        {{trans('messages.recovered')}}
                        <x-form.sort-buttons name="recovered"/>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody
            class="overflow-y-scroll flex flex-col w-full items-center scrollbar-thin scrollbar-thumb-[#808189] scrollbar-thumb-rounded h-[543px]">
        @foreach($countries as $country)
                <tr class="flex bg-white border-b border-[#F6F6F7] w-full">
                <td class="pl-4 md:pl-10 py-4 text-sm text-[#010414] w-1/4 lg:w-1/6">
                    {{$country?->name}}
                </td>
                <td class="pl-4 md:pl-12 py-4 text-sm text-[#010414] w-1/4 lg:w-1/6">
                    {{$country?->confirmed}}
                </td>
                <td class="pl-4 md:pl-12 py-4 text-sm text-[#010414] w-1/4 lg:w-1/6">
                    {{$country?->deaths}}
                </td>
                <td class="md:pl-12 py-4 text-sm text-[#010414] w-1/4 lg:w-1/6">
                    {{$country?->recovered}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
