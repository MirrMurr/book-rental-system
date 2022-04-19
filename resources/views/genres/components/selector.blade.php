<?php
$genreUrl = $_GET['v'] ?? ''
?>
<div class="tags">
    {{ $slot }}
    @foreach ($genres as $genre)
    <?php
    $edit1 = $edit ?? false;
    $href1 = $edit1 ? route('genres.edit', $genre['id']) : ("/genres?v=" . $genre['id']);
    // $href1 = $edit1 ? '/genres'.'/'.$genre['id'].'/edit' : ("/genres?v=" . $genre['id']);
    ?>
    <a class="tag {{$genre['style']}} {{ $genreUrl == $genre['id'] ? 'select-highlight' : '' }}" href="{{$href1}}">{{$genre['name']}}</a>
    @endforeach
</div>