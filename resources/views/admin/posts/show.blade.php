@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{ $post->image }}" alt="$post->title" width="50%">
    <h2>{{ $post->title }}</h2>
    @if( $post->category )
    <span class="badge badge-pill badge-{{$post->Category->color}}">{{ $post->Category->label}}</span>
    @else
    nessuna categoria è assegnata
    @endif
    <p>{{ $post->content }}</p>
    {{-- <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="delete-form">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
    </form> --}}
    @include('includes.deletePost')
</div>    
@endsection

@section('scripts')
<script src="{{ asset('js/delete-form.js') }}"></script>
@endsection