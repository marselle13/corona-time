<x-form.password>
    <form class="md:min-w-[392px] pt-10 md:pt-8 flex flex-col justify-between h-3/4">
       <div>
           <x-form.input name="{{trans('messages.email')}}" type="email" placeholder="{{trans('messages.email_placeholder')}}"/>
       </div>
        <div class="mt-14">
            <x-form.button class="">{{trans('messages.reset_password')}}</x-form.button>
        </div>
    </form>
</x-form.password>
