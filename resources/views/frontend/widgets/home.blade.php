@foreach ($widgets as $widget)
@include ("frontend.widgets.home.".$widget->widget_type.".".$widget->layouts->layout,compact("widget"))
@endforeach