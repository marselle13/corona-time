<x-layout>
    <form method="POST" action="{{route('auth.logout')}}">
        @csrf
        <button type="submit">logout</button>
    </form>
</x-layout>
