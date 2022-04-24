<?php
$genreUrl = $_GET['v'] ?? ''
?>
<div class="tags wrap">
    {{ $slot }}
    @foreach ($genres as $genre)
    <?php
    $edit1 = $edit ?? false;
    $href1 = $edit1 ? route('genres.edit', $genre['id']) : ("/genres?v=" . $genre['id']);
    ?>
    @if ($links ?? true)
        <a class="tag {{$genre['style']}} {{ $genreUrl == $genre['id'] ? 'select-highlight' : '' }}" href="{{$href1}}">{{$genre['name']}}</a>
    @else
        <div class="tag {{$genre['style']}}">{{$genre['name']}}</div>
    @endif
    @endforeach
</div>