@foreach(menus()->where("menu_position","top") as $menu)
<li class="nav-item @if($menu->children->count()) dropdown @endif">
    <a class="nav-link @if( $menu->children->count()) dropdown-toggle @endif text-white nav-text" {{ $attributes }} href="{{ route('frontend.view',$menu->slug) }}">
        {{ $menu->menu_name }}
    </a>
    @if( $menu->children->count())
    <ul class="dropdown-menu">
        @foreach ( $menu->children as $child_menu)
        <li>
            <a class="dropdown-item nav-text" href="{{ route('frontend.view',$child_menu->slug) }}">
                {{ $child_menu->menu_name }}
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</li>
@endforeach