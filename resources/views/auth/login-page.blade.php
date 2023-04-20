<x-layout>
    <div class="flex md:justify-between justify-center">
        <x-form.container>
            <x-form.auth info="{{trans('messages.info_login')}}">{{trans('messages.welcome_login')}}</x-form.auth>
            <form method="POST" action="{{route('auth.login')}}" class="md:w-[392px] md:space-y-6 space-y-4  ">
                @csrf
                <x-form.input name="username_email" label="{{trans('messages.username')}}" placeholder="{{trans('messages.login_placeholder')}}" value="{{old('username_email')}}"/>
                <x-form.input name="password" label="{{trans('messages.password')}}" type="password" placeholder="{{trans('messages.password_placeholder')}}"/>
                @if($errors->has('login_error'))
                    <div class="flex gap-2.5">
                        <x-form.error-icon/>
                        <p class="text-sm text-[#CC1E1E] pt-[1px]">{{$errors->first('login_error')}}</p>
                    </div>
                @endif
                <div class="flex justify-between gap-2">
                    <x-form.checkbox/>
                    <a href="{{route('auth.reset_password')}}" class="text-[#2029F3] text-sm font-semibold">{{trans('messages.forget_password')}}</a>
                </div>
                <x-form.button>{{trans('messages.log_in')}}</x-form.button>
                <div class="text-center"><p class="text-[#808189] text-sm md:text-base">{{trans('messages.no_account')}} <a
                            href="{{route('auth.register_page')}}" class="text-[#010414] font-bold">{{trans('messages.sign_free')}}</a></p>
                </div>
            </form>
        </x-form.container>
        <div class="md:min-h-screen hidden md:block">
            <img src="{{asset('./images/vaccine.png')}}" class="h-full w-full object-cover" alt="vaccine"/>
        </div>
    </div>
</x-layout>
