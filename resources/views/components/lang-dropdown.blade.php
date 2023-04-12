<form id="language-form" method="POST" action="{{ route('language.set')}}" class="flex items-end">
    @csrf
    <label for='language' class="hidden">language</label>
    <select id='language' name='locale' class="border-none focus:ring-0" onchange="this.form.submit()">
        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
        <option value="ka" {{ app()->getLocale() == 'ka' ? 'selected' : '' }}>KA</option>
    </select>
</form>
