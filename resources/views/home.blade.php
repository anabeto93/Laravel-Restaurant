@extends('layouts.app')

@section('content')
<div class="container">
    <menu-container :items="{{ json_encode($menus) }}" :restaurant-id="{{ $restaurant_id }}"></menu-container>
</div>
@endsection
