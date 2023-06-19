@extends('layouts.dashboard.app')
@section('title','Dashboard')


@section('content')
    @include('Post.html')
@endsection

@section('extra_java')
    @include('Post.java')
@endsection