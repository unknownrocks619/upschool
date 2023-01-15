@extends('themes.frontend.master')

@section("page_title")
{{ $menu->menu_name }}

@endsection

@section("content")

<?php
// $categories =\App\Models\Corcel\WPCategory::where('taxonomy', 'book_category')->get();

$listOfCategory = [];

foreach ($categories as $category) {
    $listOfCategory[] = $category->name;
}
dd($listOfCategory);
dd(json_decode($elementor->_elementor_data));

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
</div>

@endsection
