@foreach ($widgets as $widget)

@if ($loop->iteration == 3)
@include ("frontend.pages.hooks.widgets.home.six_points",["widgets" => $widgets]);
@endif

@if($widget->widget_type == "banner_video" && $loop->iteration == 1)

@include("frontend.pages.hooks.widgets.home.intro_video",["widget" => $widget])

@elseif($widget->widget_type == "text_image")

@include("frontend.pages.hooks.widgets.home.image_with_description",["widget" => $widget])

@elseif($widget->widget_type == "text_video")

@include ("frontend.pages.hooks.widgets.home.intro_attach_video",["widget" => $widget])

@elseif ($widget->widget_type == "video_banner" && $loop->iteration != 1)

@include ("frontend.pages.hooks.widgets.home.video_widget",["widget"=>$widget])

@elseif($widget->widget_type == "text_image")

@include("frontend.pages.hooks.widgets.home.image_with_description",["widget" => $widget])

@elseif($widget->widget_type == "testimoinals")

@include("frontend.pages.hooks.widgets.home.testimonials",["widget"=> $widget])
@endif

@endforeach