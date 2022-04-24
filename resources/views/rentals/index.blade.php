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
    <h1>Rentals</h1>
    <div class="rental-lists col--2">
        <div class="rentals-list card my-2">
            <h2 class="pending">Pending rental requests</h2>
            @component('rentals.components.rental-card', ['rentals' => $rentals, 'status' => 'PENDING'])@endcomponent
        </div>

        <div class="rentals-list card my-2">
            <h2 class="accepted">Accepted in-time rentals</h2>
            @component('rentals.components.rental-card', ['rentals' => $rentals, 'status' => 'ACCEPTED'])@endcomponent
        </div>

        <div class="rentals-list card my-2">
            <h2 class="accepted-late">Accepted late rentals</h2>
            @component('rentals.components.rental-card', ['rentals' => $rentals, 'status' => 'acceptedLate'])@endcomponent
        </div>

        <div class="rentals-list card my-2">
            <h2 class="rejected">Rejected rentals</h2>
            @component('rentals.components.rental-card', ['rentals' => $rentals, 'status' => 'REJECTED'])@endcomponent
        </div>

        <div class="rentals-list card my-2">
            <h2 class="returned">Returned rentals</h2>
            @component('rentals.components.rental-card', ['rentals' => $rentals, 'status' => 'RETURNED'])@endcomponent
        </div>
    </div>
</div>
@endsection