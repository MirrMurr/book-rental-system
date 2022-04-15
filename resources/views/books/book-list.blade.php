<style>
.book-entry {
    display: flex;
    height: 15rem;
}
.book-entry:hover {
    box-shadow: 0px 5px 20px #aaa;
    cursor: pointer;
}

.book-list {
    display: grid;
    column-gap: 3rem;
    margin-top: 2rem;
}

.view-selector {
    display: flex;
    margin-top: 2rem;
}
.col--list {
    grid-template-columns: 1fr;
}
.col--grid {
    grid-template-columns: 1fr 1fr 1fr;
}

.book-cover-container {
    height: 100%;
    max-width: 30%;
    margin-right: 2rem;
}
.book-cover {
    max-height: 100%;
    max-width: 100%;
    border-radius: 14px;
}
</style>

<script type="text/javascript">
function changeView() {
    let newView = document.getElementById('book-view-select').value;
    let bookList = document.getElementById('book-list')
    let covers = document.querySelectorAll('book-cover-container')
    switch (newView) {
        case "list":
            bookList.classList.remove('col--grid')
            bookList.classList.add('col--list')
            covers.forEach(i => i.classList.remove('hidden'))
            break;
        case "grid":
            bookList.classList.remove('col--list')
            covers.forEach(i => i.classList.add('hidden'))
            bookList.classList.add('col--grid')
            break;
        default:
            break;
    }
}
</script>

<?php
$view = $_GET["view"] ?? 'list';
?>

<form action="" class="view-selector">
    <label for="view">View:</label>
    <select name="view" id="book-view-select" onchange="changeView();" class="form-item">
        <option value="select">--select view--</option>
        <option value="list" {{ $view == 'list' ? 'selected' : ''}}>List</option>
        <option value="grid" {{ $view == 'grid' ? 'selected' : ''}}>Grid</option>
    </select>
</form>

<div id="book-list" class="book-list {{ $view == "list" ? 'col--list' : 'col--grid'}}">
    @foreach ($books as $book)
    <a href="/book/{{$book['id']}}">
        <div class="card my-1 book-entry">
            <div class="book-cover-container">
                <img class="book-cover" src="{{$book['coverImage']}}" alt="">
            </div>
            <div class="details">
                <h4>{{$book['title']}}</h4>
                <p>{{$book['author']}}</p>
                <div class='tag'>
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
    </a>
    @endforeach
</div>