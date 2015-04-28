
{{--- Comment : This Part Extends From Layout Blade Start  --}}

@extends('layout.layout')

{{--- Comment : This Part Extends From Layout Blade End  --}}

{{--- This Section Belongs to Title Bar Start  --}}

@section('title')
{{{$page_title}}}
@stop

{{--- This Section Belongs to Title Bar End  --}}

{{--- This Section Belongs to Page Middle Content Start  --}}

@section('content')
@include($page)
@stop

{{--- This Section Belongs to Page Middle Content End  --}}
