@foreach ($widgets as $widget)
@php
$page = ($widget->widget_setting && to_object($widget->widget_setting,"layout")) ? to_object($widget->widget_setting,"layout") : "index";
@endphp
@include("frontend.pages.hooks.widgets.".$widget->widget_type.".".$page,["side_grid"=> (isset($side_grid)) ? true : false, "side_layout" => isset($side_layout) ? $side_layout : 12])
@endforeach