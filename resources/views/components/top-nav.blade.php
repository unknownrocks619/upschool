@foreach(menus()->where("menu_position","top") as $menu)
<?php
$parent_link = "#";
if ($menu->external_links) {
    $parent_link = $menu->external_links->external_url;
} elseif (!$menu->children->count()) {
    $parent_link = route('frontend.view', $menu->slug);
}
?>
<li class="nav-item @if($menu->children->count()) dropdown @endif">
    <a class="nav-link @if($menu->children->count()) dropdown-toggle @endif text-white nav-text" {{ $attributes }} href="{{ $parent_link }}">
        {{ $menu->menu_name }}
    </a>
    @if( $menu->children->count())
    <ul class="dropdown-menu">
        @foreach ( $menu->children as $child_menu)
        <?php
        $child_link = "#";
        if ($menu->external_links) {
            $child_link = $menu->external_links->external_url;
        } else {
            $child_link = route('frontend.view', $menu->slug);
        }
        ?>
        <li>
            <a class="dropdown-item nav-text" href="{{ $child_link }}">
                {{ $child_menu->menu_name }}
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</li>
@endforeach