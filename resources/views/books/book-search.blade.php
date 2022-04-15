<style>
.book-filter {
    margin-right: 2rem;
}
</style>
<?php
$title = $_POST['title'] ?? '';
$author = $_POST['author'] ?? '';
?>
<form action="/books" method="POST">
    @csrf
    <div class="book-filter">
        <label for="title">Title:</label>
        <input  name="title" id="title" placeholder="" class="form-item" value="{{ $title }}" />
    </div>
    <div class="book-filter">
        <label for="author">Author:</label>
        <input name="author" id="author" placeholder="" class="form-item" value="{{ $author }}" />
    </div>
    <button type="submit" class="btn btn-primary large">Search</button>
</form>