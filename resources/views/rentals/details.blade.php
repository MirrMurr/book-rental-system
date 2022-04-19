@extends('layout')
@section('title', 'Rental details')

<?php
// $genreUrl = $_GET['v'] ?? ''
?>
@section('content')
<div>
    <h1>Rental details</h1>
    <div>
        <div>{{$rental['title']}}</div>
        <div>{{$rental['author']}}</div>
        <div>{{$rental['status']}}</div>
    </div>
</div>
@endsection