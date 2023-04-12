<x-layout>
    <div class="md:grid md:justify-center mx-4 md:mx-0 h-full md:h-auto">
        <x-form.auth info="" class="md:space-y-[88px] flex flex-col md:items-center text-center pt-10">Reset Password
        </x-form.auth>
        <form class="md:min-w-[392px] pt-10 md:pt-8 md:space-y-14 flex flex-col justify-between md:block h-3/4">
            <x-form.input name="email" type="email" placeholder="Enter your email"/>
            <div>
                <x-form.button>Reset Password</x-form.button>
            </div>
        </form>
    </div>
</x-layout>
