<x-form.password>
    <form class="md:min-w-[392px] pt-10 md:pt-8 flex flex-col md:block h-3/4 justify-between">
        <div class="space-y-4 md:space-y-6">
            <x-form.input name="new-password" label="{{trans('messages.new_password')}}" type="password" placeholder="{{trans('messages.new_placeholder')}}"/>
            <x-form.input name="repeat-password" label="{{trans('messages.repeat_password')}}" type="password" placeholder="{{trans('messages.repeat_password')}}"/>
        </div>
        <div class="md:mt-14">
            <x-form.button>{{trans('messages.save_changes')}}</x-form.button>
        </div>
    </form>
</x-form.password>
