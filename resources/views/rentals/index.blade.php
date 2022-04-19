@extends('layout')
@section('title', 'My rentals')

<style>
.rental-lists {
    display: grid;
    column-gap: 5rem;
}

.col--1 {
    grid-template-columns: 1fr;
}

.col--2 {
    grid-template-columns: 1fr 1fr;
}

@media only screen and (max-width: 1100px) {
  .rental-lists {
    grid-template-columns: 1fr;
  }
}

</style>

@section('content')
<div class="my-rentals-page">
    <h1>My rentals</h1>
    <div class="rental-lists col--2">
        <div class="rentals-list">
            <h4 class="pending">Pending rental requests</h4>
            @component('rentals.components.rental-card', ['rentals' => $rentals, 'status' => 'pending'])@endcomponent
        </div>

        <div class="rentals-list">
            <h4 class="accepted">Accepted in-time rentals</h4>
            @component('rentals.components.rental-card', ['rentals' => $rentals, 'status' => 'accepted'])@endcomponent
        </div>

        <div class="rentals-list">
            <h4 class="accepted-late">Accepted late rentals</h4>
            @component('rentals.components.rental-card', ['rentals' => $rentals, 'status' => 'acceptedLate'])@endcomponent
        </div>

        <div class="rentals-list">
            <h4 class="rejected">Rejected rentals</h4>
            @component('rentals.components.rental-card', ['rentals' => $rentals, 'status' => 'rejected'])@endcomponent
        </div>

        <div class="rentals-list">
            <h4 class="returned">Returned rentals</h4>
            @component('rentals.components.rental-card', ['rentals' => $rentals, 'status' => 'returned'])@endcomponent
        </div>
    </div>
</div>
@endsection