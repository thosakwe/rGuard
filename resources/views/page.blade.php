@extends('layouts.master')

@section('title')
    {{ $page->title }}
@stop

@section('content')
    <div class="ui text container">
        {!! $page->html !!}
    </div>
@stop