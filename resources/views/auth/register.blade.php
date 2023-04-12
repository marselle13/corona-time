<x-layout>
    <div class="flex md:justify-between justify-center">
        <x-form.container>
            <x-form.auth info="{{trans('messages.info_register')}}">{{trans('messages.welcome_register')}}</x-form.auth>
            <form class="lg:w-[392px] md:space-y-6 space-y-4">
                <div class="space-y-2">
                    <x-form.input name="{{trans('messages.username')}}" placeholder="{{trans('messages.username_placeholder')}}"/>
                    <p class="text-xs text-[#808189]">{{trans('messages.username_rule')}}</p>
                </div>
                <x-form.input name="{{trans('messages.email')}}" type="email" placeholder="{{trans('messages.email_placeholder')}}"/>
                <x-form.input name="{{trans('messages.password')}}" type="password" placeholder="{{trans('messages.password_placeholder')}}"/>
                <x-form.input name="repeat-password" type="password" label="{{trans('messages.repeat_password')}}"
                              placeholder="{{trans('messages.repeat_password')}}"/>
                <x-form.checkbox/>
                <x-form.button>{{trans('messages.sign_up')}}</x-form.button>
                <div class="text-center">
                    <p class="text-[#808189] text-sm md:text-base">{{trans('messages.have_account')}} <a
                            href="{{route('auth.login')}}" class="text-[#010414] font-bold">{{trans('messages.log_in')}}</a></p>
                </div>
            </form>
        </x-form.container>
        <div class="md:min-h-screen hidden md:block">
            <img src="{{asset('./images/vaccine.png')}}" alt="vaccine" class="h-full w-full object-cover"/>
        </div>
    </div>
</x-layout>
