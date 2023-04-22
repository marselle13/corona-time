<x-form.password>
    <form method="POST" action="{{route('passwords.update',[$user,$token])}}" class="md:min-w-[392px] pt-10 md:pt-8 flex flex-col md:block h-3/4 justify-between">
        @csrf
        @method('PATCH')
        <div class="space-y-4 md:space-y-6">
            <x-form.input name="password" label="{{trans('messages.new_password')}}" type="password" placeholder="{{trans('messages.new_placeholder')}}"/>
            <x-form.input name="password_confirmation" label="{{trans('messages.repeat_password')}}" type="password" placeholder="{{trans('messages.repeat_password')}}"/>
        </div>
        <div class="md:mt-14">
            <x-form.button>{{trans('messages.save_changes')}}</x-form.button>
        </div>
    </form>
</x-form.password>
