<div class="sidebar">
    <ul>
        <li>
            <x-nav.link href="{{ route('home') }}" icon="fa-solid fa-code" text="{{ __('Home') }}" />
        </li>
        <li>
            <x-nav.link href="{{ route('users') }}" icon="fa-solid fa-users" text="{{__('users')}}" />
        </li>
        <li>
            <x-nav.link href="/configuracion" icon="fa-solid fa-cog" text="Configuración" />
        </li>
    </ul>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
