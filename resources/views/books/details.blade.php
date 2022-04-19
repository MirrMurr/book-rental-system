@extends('layout')
@section('title', 'Book details')

@section('content')

<style>
.columns {
  display: flex;
  /* column-gap: 1rem;
  grid-template-columns: 1fr 1fr; */
}
.book-cover-container {
    height: 100%;
    max-width: 40%;
    margin-right: 2rem;
}
.book-cover {
    max-height: 100%;
    max-width: 100%;
    border-radius: 14px;
}
.title {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.borrow-btn {
    max-height: max-content;
    max-width: max-content;
}

.delete-btn {
    max-height: max-content;
    max-width: max-content;
}

.details {
    width: 60%;
}

.book-info {
    display: grid;
    column-gap: 3rem;
    margin-bottom: 3rem;
    grid-template-columns: 1fr 1fr;
}

.stock-info {
    margin-bottom: 3rem;
}

@media only screen and (max-width: 900px) {
    .title {
        display: block;
    }
    .columns {
        display: block;
    }
    .book-info {
        grid-template-columns: 1fr;
    }
}
</style>

{{-- TODO --}}
<?php
$loggedInAsReader = true;
$loggedInAsLibrarian = true;
?>

<div class="card">
    <div class="title">
        <h1>{{ $book['title'] }}</h1>
        <div class="action-buttons">
            @if ($loggedInAsReader)
            <form action="/new-rental" method="POST">
                @csrf
                <input type="hidden" name="bookId" value="{{$book['id']}}" />
                <button type="submit" class="btn btn-primary borrow-btn large">Borrow this book</button>
            </form>
            @endif
            @if ($loggedInAsLibrarian)
            <form action="/delete-book" method="POST">
                @csrf
                <input type="hidden" name="bookId" value="{{$book['id']}}" />
                <button type="submit" class="btn btn-danger delete-btn large">Delete book</button>
            </form>
            @endif
        </div>
    </div>

    <div class="columns">
        @if ($book['coverImage'] != null)
        <div class="book-cover-container">
            <img class="book-cover" src="{{$book['coverImage']}}" alt="">
        </div>
        @endif
        <div class="details">
            <div class="book-info">
                <div>
                    <h3>Author</h3>
                    <div>{{ $book['author'] }}</div>
                </div>

                <div>
                    <h3>Genres</h3>
                    <div class="tags">
                        <div class="tag">
                            <?php
                        $r = '';
                        foreach ($genres as $genre) {
                            if ($genre['id'] == $book['genreId']) {
                                $r = $genre['name'];
                            }
                        }
                        echo $r;
                        ?>
                        </div>
                    </div>
                </div>

                <div>
                    <h3>Date of pubhish</h3>
                    <div>Placeholder</div>
                </div>

                <div>
                    <h3>Number of pages</h3>
                    <div>Placeholder</div>
                </div>

                <div>
                    <h3>Language</h3>
                    <div>Placeholder</div>
                </div>

                <div>
                    <h3>ISBN number</h3>
                    <div>Placeholder</div>
                </div>

            </div>


            <div class="stock-info">
                <h3>Number of this book in the library</h3>
                <div>Placeholder</div>

                <h3>Number of available books</h3>
                <div>Placeholder</div>

                @if ($loggedInAsReader)
                <h3>Is borrowed</h3>
                <div>NO</div>
                @endif
            </div>
        </div>
    </div>

    <h3>Description</h3>
    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex veritatis cum consequuntur ipsum sequi quis dolorum beatae, hic inventore asperiores molestiae ipsa velit consequatur cumque, consectetur commodi fuga porro exercitationem.</div>
</div>
@endsection