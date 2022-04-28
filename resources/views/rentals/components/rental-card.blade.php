<style>
.rental-request {
    margin: 2rem auto;
}
.rental-request:hover {
    box-shadow: 0px 5px 20px #aaa;
    cursor: pointer;
}
</style>

<div>
@foreach ($rentals as $rental)
    @if ($rental['status'] == $status)
        <a href="{{route('rentals.show', $rental->id)}}">
            <div class="card rental-request">
                <div> <strong>{{$rental->book->title}}</strong> | {{$rental->book->authors}}</div>
                <div>Submitted: {{ Carbon\Carbon::parse($rental['created_at'])->format('Y-m-d') }} | Deadline: {{ Carbon\Carbon::parse($rental['deadline'])->format('Y-m-d') }}</div>
            </div>
        </a>
    @endif
@endforeach
</div>