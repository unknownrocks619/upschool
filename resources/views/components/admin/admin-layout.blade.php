@extends("themes.admin.master")

@section("title")
{{ $title ?? "" }}
@endsection

@section("content")
<x-layout>
    {{ $slot }}
</x-layout>
@endsection