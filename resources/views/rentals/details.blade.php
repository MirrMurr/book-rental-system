@extends('layout')
@section('title', 'Rental details')

<?php
// $genreUrl = $_GET['v'] ?? ''
$librarian = true
?>
@section('content')
<div>
    <h1>Rental details</h1>

    @if ($librarian)
    <form action="{{route('rentals.update', $rental->id)}}" method="POST">
        <div>
            TODO handle rental as librarian
        </div>
        <select name="status" id="status" class="form-item">
            <option value="PENDING" @if($rental->status === 'PENDING') selected @endif>Pending</option>
            <option value="ACCECPTED" @if($rental->status === 'ACCEPTED') selected @endif>Accept</option>
            <option value="RETURNED" @if($rental->status === 'RETURNED') selected @endif>Return</option>
            <option value="REJECTED" @if($rental->status === 'REJECTED') selected @endif>Reject</option>
        </select>
    </form>
    @endif

    <div class="card">
        <div>{{$book['title']}}</div>
        <div>{{$book['authors']}}</div>
        <div>{{$rental['status']}}</div>
    </div>
</div>
@endsection