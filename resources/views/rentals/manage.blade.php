@extends('layout')
@section('title', 'Manage books')

<style>

</style>

@section('content')
<div class="manage-rentals-page">
    <h1>Manage rentals</h1>
    @component('rentals.components.lists', compact('pending', 'accepted', 'acceptedLate', 'rejected', 'returned')) @endcomponent
</div>
@endsection