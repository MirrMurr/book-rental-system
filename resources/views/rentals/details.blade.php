@extends('layout')
@section('title', 'Rental details')

{{--
- Book
    - Title, author, date
    - Link to the *Book detail* page
- Rental data
    - Name of the borrower reader
    - Date of rental request (created_at)
    - Status
    - if it is not PENDING
        - Date of procession
        - Librarian's name
    - if it is RETURNED
        - Date of return
        - Librarian's name
    - if the rental is late, show this information, too.
--}}

<style>

.details {
    display: grid;
    column-gap: 3rem;
    row-gap: 3rem;
    grid-template-columns: 5fr 5fr 2fr 1fr;
}

.details-entry {
    display: flex;
    justify-content: space-between;
    width: 100%;
}
.handle-rental {
    /* max-width: 15rem; */
}

.handle-rental-form {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

@media only screen and (max-width: 1650px) {
    .details {
        grid-template-columns: 1fr;
    }
}

@media only screen and (max-width: 900px) {
    .details-entry {
        display: block;
    }
}
</style>

<?php
$librarian = true;
$book = $rental->book;
$requestManagedByUser = $rental->requestManagedByUser;
$returnManagedByUser = $rental->returnManagedByUser;
?>

@section('content')
<div>
    <h1>Rental details</h1>
    <div class="details">

        <div class="card">
            <div class="card-title">
                <h2>Book</h2>
                <form action="{{route('books.show', $book->id)}}" method="GET">
                    <button type="submit" class="btn btn-secondary medium">Details</button>
                </form>
            </div>
            <div class="details-entry">
                <strong>Title</strong>
                <div class="wrap">{{$book['title']}}</div>
            </div>

            <div class="details-entry">
                <strong>Author(s)</strong>
                <div>{{$book['authors']}}</div>
            </div>

            <div class="details-entry">
                <strong>Release date</strong>
                <div>{{$book['releasedAt']}}</div>
            </div>
        </div>

        <div class="card">
            <div class="card-title">
                <h2>Rental</h2>
                @if ($rental['status'] == "ACCEPTED" && $rental['deadline'] < Carbon\Carbon::now())
                <strong class="accepted-late">LATE</strong>
                @endif
            </div>

            <div class="details-entry">
                <strong>Borrower name</strong>
                <div>{{$rental->reader['name']}}</div>
            </div>

            <div class="details-entry">
                <strong>Date of submission</strong>
                <div>{{$rental['created_at']}}</div>
            </div>

            <div class="details-entry">
                <strong>Status</strong>
                <div class="{{Str::lower($rental['status'])}}">{{$rental['status']}}</div>
            </div>

            @if ($rental['status'] != "PENDING")
            <div class="details-entry">
                <strong>Date of procession</strong>
                <div>{{$rental['requestProcessedAt']}}</div>
            </div>

            <div class="details-entry">
                <strong>Request processed by</strong>
                <div>{{$requestManagedByUser['name']}}</div>
            </div>
            @endif

            @if ($rental['status'] == "RETURNED")
            <div class="details-entry">
                <strong>Date of return</strong>
                <div>{{$rental['returnedAt']}}</div>
            </div>

            <div class="details-entry">
                <strong>Return processed by</strong>
                <div>{{$returnManagedByUser['name']}}</div>
            </div>
            @endif
        </div>

        @can('manage')
        <div class="handle-rental card">
            <form action="{{route('rentals.update', $rental->id)}}" method="POST" class="handle-rental-form">
                @csrf
                @method('PUT')
                <div>
                    <div class="custom-form-item">
                        <label for="status">Status</label>
                        <select name="status" id="rental-status" class="form-item" @if ($rental['status'] == "RETURNED") disabled @endif>
                            <option value="PENDING" @if($rental->status === 'PENDING') selected @endif>Pending</option>
                            <option value="ACCEPTED" @if($rental->status === 'ACCEPTED') selected @endif>Accepted</option>
                            <option value="RETURNED" @if($rental->status === 'RETURNED') selected @endif>Returned</option>
                            <option value="REJECTED" @if($rental->status === 'REJECTED') selected @endif>Rejected</option>
                        </select>
                    </div>

                    <div class="custom-form-item">
                        <label for="deadline">Deadline</label>
                        <input
                            type="date"
                            name="deadline"
                            id="rental-deadline"
                            class="form-item @error('deadline') is-invalid @enderror"
                            value="{{old('deadline', Carbon\Carbon::parse($rental['deadline'])->format('Y-m-d'))}}"
                            @if ($rental['status'] == "RETURNED") disabled @endif
                        />
                    </div>
                    @error('deadline')
                    <span class="input-validation-error" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                @if ($rental['status'] != "RETURNED")
                <div class="action-buttons">
                    <button type="submit" class="btn btn-primary large">Save</button>
                </div>
                @endif
            </form>
        </div>
        @endcan

    </div>
</div>
@endsection