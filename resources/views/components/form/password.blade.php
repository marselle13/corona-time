<x-layout>
    <div class="md:grid md:justify-center mx-4 md:mx-0 h-full md:h-auto">
        <x-form.auth info="" class="md:space-y-[88px] flex flex-col md:items-center text-center pt-10">{{trans('messages.reset_password')}}
        </x-form.auth>
            {{$slot}}
    </div>
</x-layout>
