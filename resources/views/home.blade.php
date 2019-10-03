@extends('layouts.app')

@section('content')
<div class="container">
    <menu-container :items="{{ json_encode($menus) }}"></menu-container>
</div>
@endsection
