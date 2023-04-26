<form method="GET" action="{{route('landings.country')}}" class="space-y-10">
<div class="flex flex-col gap-1">
    <input type="hidden" name="search" value="{{request('search')}}"/>
    <input type="hidden" name="sort" value="{{$name}}"/>
    <button type="submit" name="order" value="desc">
        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-b-[8px] {{request('order') == "desc" && request('sort') == $name ?  'border-b-[#010414]' : 'border-b-[#BFC0C4]'}} border-r-[5px] border-r-transparent"></div>
    </button>
    <button type="submit" name="order" value="asc">
        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-t-[8px] {{request('order') == 'asc' && request('sort') == $name  ?  'border-t-[#010414]' : 'border-t-[#BFC0C4]'}} border-r-[5px] border-r-transparent"></div>
    </button>
</div>
</form>
