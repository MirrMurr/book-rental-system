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
        <a href="rental/{{$rental['id']}}">
            <div class="card rental-request">
                <ul>
                    <li>{{$rental['title']}}</li>
                    <li>{{$rental['author']}}</li>
                    <li>{{$rental['dateOfRental']}}</li>
                    <li>{{$rental['deadline']}}</li>
                </ul>
            </div>
        </a>
    @endif
@endforeach
</div>