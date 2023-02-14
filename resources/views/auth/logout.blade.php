<form method="POST" action="{{ route('logout') }}">
    @csrf
    <x-dropdown-link :href="route('logout')"
        onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Sair') }}
    </x-dropdown-link>
</form>
