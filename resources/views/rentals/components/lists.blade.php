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

<div class="rental-lists col--2">
    <div class="rentals-list my-2">
        <h2 class="pending">Pending rental requests</h2>
        @component('rentals.components.rental-card', ['rentals' => $pending, 'status' => 'PENDING'])@endcomponent
    </div>

    <div class="rentals-list my-2">
        <h2 class="accepted">Accepted in-time rentals</h2>
        @component('rentals.components.rental-card', ['rentals' => $accepted, 'status' => 'ACCEPTED'])@endcomponent
    </div>

    <div class="rentals-list my-2">
        <h2 class="accepted-late">Accepted late rentals</h2>
        @component('rentals.components.rental-card', ['rentals' => $acceptedLate, 'status' => 'ACCEPTED'])@endcomponent
    </div>

    <div class="rentals-list my-2">
        <h2 class="rejected">Rejected rentals</h2>
        @component('rentals.components.rental-card', ['rentals' => $rejected, 'status' => 'REJECTED'])@endcomponent
    </div>

    <div class="rentals-list my-2">
        <h2 class="returned">Returned rentals</h2>
        @component('rentals.components.rental-card', ['rentals' => $returned, 'status' => 'RETURNED'])@endcomponent
    </div>
</div>