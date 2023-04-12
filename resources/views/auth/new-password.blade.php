<x-form.password>
    <form class="md:min-w-[392px] pt-10 md:pt-8 flex flex-col md:block h-3/4 justify-between">
        <div class="space-y-4 md:space-y-6">
            <x-form.input name="new-password" label="new password" type="password" placeholder="Enter new password"/>
            <x-form.input name="repeat-password" label="repeat password" type="password" placeholder="Repeat password"/>
        </div>
        <div class="md:mt-14">
            <x-form.button>Save Changes</x-form.button>
        </div>
    </form>
</x-form.password>
