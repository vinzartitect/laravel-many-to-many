@extends('layouts.app')

@section('content')
<div class="container">
    <form action=" {{route('admin.posts.update', $post->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" placeholder="Titolo del post" name="title" value="{{ old( 'title', $post->title) }}">
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id" id="category">
                <option value="">Nessuna Categoria</option>
                @foreach ($categories as $category )
                    <option
                        @if( old( 'category_id', $post->category_id ) == $category->id ) selected @endif
                        value=" {{ $category->id }} "
                        >{{ $category->label }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="content">Contenuto del post</label>
            <textarea name="content" id="content" cols="30" rows="10"
                placeholder="Scrivi il contenuto del post">
            {{ old('content', $post->content)  }}
            </textarea>
        </div>
        <div class="form-group">
            <label for="image">Immagine del post</label>
            <input type="url" class="form-control" id="image" placeholder="url dell'immagine" name="image" value="{{ old('image', $post->image) }}">
        </div>
        <button type="submit" class="btn btn-success">Modifica</button>

    </form>
</div>
@endsection

@section('scripts')
{{-- ??? --}}
@endsection