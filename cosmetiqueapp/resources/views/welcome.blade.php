@extends('layouts.app')

@section('title', 'Accueil - B - Univers Cosmétiques')

@section('content')

    @include('partials.hero')

    @include('partials.about')

    @include('partials.products')

    @include('partials.collections')

    @include('partials.contact')

    @include('partials.testimonials')

@endsection
