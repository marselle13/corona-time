@props(['name'])
<div class="flex flex-col space-y-2">
    <label for="{{$name}}" class="text-sm md:text-base capitalize leading-5 font-bold">
        {{$name}}
    </label>
    <input id="{{$name}}"
           class="px-5 py-4 placeholder-[#808189] text-[#010414] outline-[#2029F3] border border-[#E6E6E7] rounded-lg w-full" {{$attributes}}/>
</div>
