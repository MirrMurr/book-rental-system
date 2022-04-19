<?php
$genreUrl = $_GET['v'] ?? ''
?>
<div class="tags">
    {{ $slot }}
    @foreach ($genres as $genre)
    <a class="tag {{ $genreUrl == $genre['id'] ? 'active' : '' }}" href="/genres?v={{$genre['id']}}">{{$genre['name']}}</a>
    @endforeach
</div>