@extends('layout')
@section('title', 'Profile')

@section('content')
<style>

</style>

<h1>Profile</h1>
<div class="profile-page card">
    <h4>Name</h4>
    <div>{{ Auth::user()->name }}</div>
    <h4>Email address</h4>
    <div>{{ Auth::user()->email }}</div>
    <h4>Role</h4>
    <div>{{ Auth::user()->role }}</div>
</div>
@endsection