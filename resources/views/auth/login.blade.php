<x-layout>
    <div class="flex md:justify-between justify-center">
           <x-form.container>
            <x-form.auth info="Welcome back! Please enter your details">Welcome back</x-form.auth>
            <form action="#" class="space-y-6 lg:min-w-[392px]">
                <x-form.input name="username" placeholder="Enter uniqure username or email"/>
                <x-form.input name="password" type="password" placeholder="Fill in password"/>
                <div class="flex justify-between">
                    <x-form.checkbox/>
                    <a href="#" class="text-[#2029F3] text-sm font-semibold">Forget Password?</a>
                </div>
                <x-form.button>Log In</x-form.button>
                <div class="text-center">
                    <p class="text-[#808189] text-sm md:text-base">Don't have and an account? <a href="{{route('auth.register')}}" class="text-[#010414] font-bold">Sign up for free</a></p>
                </div>
            </form>
           </x-form.container>
        <div class="md:min-h-screen hidden md:block">
            <img src="{{asset('./images/vaccine.png')}}" class="h-full w-full object-cover"/>
        </div>
    </div>
</x-layout>
