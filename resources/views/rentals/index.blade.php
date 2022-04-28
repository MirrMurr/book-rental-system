@extends('layout')
@section('title', 'My rentals')

<style>

</style>

@section('content')
<div class="my-rentals-page">
    <h1>My rentals</h1>
    @component('rentals.components.lists', compact('pending', 'accepted', 'acceptedLate', 'rejected', 'returned')) @endcomponent
</div>
@endsection