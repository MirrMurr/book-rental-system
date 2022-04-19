<?php
$selectedGenre = $genre ?? null;
$styles = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
?>
<div class="custom-form-item">
    <h4 for="name">Name</h4>
    <input name="name" class="form-item @error('name') is-invalid @enderror" type="text" value="{{ old('name', $selectedGenre != null ? $selectedGenre['name'] : '')}}" {{!($isEditMode ?? true) ? 'disabled' : ''}} />
    @error('name')
        {{ $message }}
    @enderror
</div>
<div class="custom-form-item">
    <h4 for="style">Style</h4>
    <select name="style" class="form-item">
        @foreach ($styles as $style)
        <option {{!($isEditMode ?? true) ? 'disabled' : ''}} value="{{$style}}" {{ $selectedGenre != null && $style == $selectedGenre['style'] ? 'selected' : ''}}>{{$style}}</option>
        @endforeach
    </select>
</div>