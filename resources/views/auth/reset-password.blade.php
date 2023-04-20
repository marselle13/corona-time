<x-form.password>
    <form method="POST" action="{{route('auth.reset_password')}}" class="md:min-w-[392px] pt-10 md:pt-8 flex flex-col justify-between h-3/4">
       @csrf
        <div>
           <x-form.input name="email" label="{{trans('messages.email')}}" type="email" placeholder="{{trans('messages.email_placeholder')}}"/>
       </div>
        <div class="mt-14">
            <x-form.button class="">{{trans('messages.reset_password')}}</x-form.button>
        </div>
    </form>
</x-form.password>
