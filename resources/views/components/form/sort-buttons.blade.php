<div class="flex flex-col gap-1">
    <button type="submit" name="{{$name}}" value="desc">
        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-b-[8px] {{request($name) == 'desc'  ?  'border-b-[#010414]' : 'border-b-[#BFC0C4]'}} border-r-[5px] border-r-transparent"></div>
    </button>
    <button type="submit" name="{{$name}}" value="asc">
        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-t-[8px] {{request($name) == 'asc'  ?  'border-t-[#010414]' : 'border-t-[#BFC0C4]'}} border-r-[5px] border-r-transparent"></div>
    </button>
</div>
