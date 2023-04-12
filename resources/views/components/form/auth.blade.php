@props(['info'])
<div {{$attributes}}>
    <div class="mb-11 md:mb-14 flex justify-between">
        <div>
            <img src="{{asset('./images/coronatime.png')}}" alt="coronatime"/>
        </div>
        <form id="language-form" method="POST" action="{{ route('language.set')}}" class="flex items-center">
            @csrf
            <label for='language' class="hidden">language</label>
            <select id='language' name='locale' class="border-none focus:ring-0" onchange="this.form.submit()">
                <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
                <option value="ka" {{ app()->getLocale() == 'ka' ? 'selected' : '' }}>KA</option>
            </select>
        </form>
    </div>
    <div class="space-y-2 md:space-y-4">
        <h1 class="font-black  text-xl md:text-2xl text-[#010414]">{{$slot}}</h1>
        @if($info)
        <p class="text-base md:text-xl text-[#808189]">{{$info}}</p>
        @endif
    </div>
</div>
