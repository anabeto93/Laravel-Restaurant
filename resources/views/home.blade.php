@extends('layouts.app')

@section('content')
<div class="container">
    <menu-container :items="{{ json_encode($menus) }}" :restaurant-id="1"></menu-container>
</div>
@endsection
