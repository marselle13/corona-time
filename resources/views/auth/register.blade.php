<x-layout>
    <div class="flex md:justify-between justify-center">
        <x-form.container class="lg:max-w-[392px]">
            <x-form.auth info="Please enter required info to sign up">Welcome to Coronatime</x-form.auth>
            <form class="md:space-y-6 space-y-4">
                <x-form.input name="username" placeholder="Enter unique username"/>
                <x-form.input name="email" type="email" placeholder="Enter your email"/>
                <x-form.input name="password" type="password" placeholder="Fill in password"/>
                <x-form.input name="repeat-password" type="password" label="Repeat password"
                              placeholder="Repeat password"/>
                <x-form.checkbox/>
                <x-form.button>Sign Up</x-form.button>
                <div class="text-center">
                    <p class="text-[#808189] text-sm md:text-base">Already have an account? <a
                            href="{{route('auth.login')}}" class="text-[#010414] font-bold">Log in</a></p>
                </div>
            </form>
        </x-form.container>
        <div class="md:min-h-screen hidden md:block">
            <img src="{{asset('./images/vaccine.png')}}" alt="vaccine" class="h-full w-full object-cover"/>
        </div>
    </div>
</x-layout>
