@props(['name','label'])
<div class="flex flex-col space-y-2">
    <label for="{{$name}}" class="text-sm md:text-base capitalize leading-5 font-bold">
        {{$label ??= $name}}
    </label>
    <div class="relative space-y-2">
        <input name="{{$name}}" id="{{$name}}"
               class="px-5 py-4 placeholder-[#808189] text-[#010414] outline-[#2029F3] border rounded-lg w-full
           @if($errors->has($name) || $errors->has('login_error')) border-[#CC1E1E]
           @elseif(old($name) !== null) border-[#249E2C]
           @else border-[#E6E6E7]
           @endif"
            {{$attributes}}/>
        @if($errors->has($name))
            <div class="flex gap-2.5">
                <x-form.error-icon/>
                <p class="text-sm text-[#CC1E1E] pt-[1px]">{{$errors->first($name)}}</p>
            </div>
        @elseif(old($name) !== null)
            <div class="absolute top-3 right-0 pr-3">
                <x-form.pass-icon/>
            </div>
        @endif
    </div>
</div>
