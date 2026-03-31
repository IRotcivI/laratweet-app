@extends('back.app')

@section('title', 'Acceuil')

@section('header')
    @include('back.partials.header')
@endsection

@section('content')
    <!-- Stats Cards -->
    @include('back.partials.statsCard')
    <!-- End stats cards -->

    <!-- Content Grid -->
    @include('back.partials.contentGrid')
    <!-- End content grid -->
@endsection