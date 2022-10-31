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
    <a class="nav-link @if($menu->children->count()) dropdown-toggle @endif text-white nav-text" {{ $attributes }} href="{{ $parent_link }}" id="{{ $menu->slug }}" @if($menu->children->count()) data-bs-toggle="dropdown" role="button" onclick="toggleFunc(this)" @endif>
        {{ $menu->menu_name }}
        @if($menu->children->count())
        <span class="d-inline d-sm-none fas fa-plus text-right caret" aria-hidden="true" style="float:right !important"></span>
        <span class="d-none d-sm-inline d-xs-inline fas fa-angle-down text-right mt-2" aria-hidden="true"></span>
        @endif
    </a>
    @if( $menu->children->count())
    <ul class="dropdown-menu" aria-labelledby="{{ $menu->slug }}">
        @foreach ( $menu->children as $child_menu)
        <?php
        $child_link = "#";
        if ($child_menu->external_links) {
            $child_link = $child_menu->external_links->external_url;
        } else {
            $child_link = route('frontend.view', $menu->slug);
        }
        ?>
        <li>
            <a style="font-weight: 400;" class="dropdown-item nav-text" href="{{ $child_link }}">
                {{ $child_menu->menu_name }}
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</li>
@endforeach