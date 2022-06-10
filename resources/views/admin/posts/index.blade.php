@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif

        <a href=" {{route('admin.posts.create')}} " class="btn btn-success">Crea post</a>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">title</th>
                    <th scope="col">Category</th>
                    <th scope="col">content</th>
                    <th scope="col">image</th>
                    <th scope="col">slug</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                    <th>{{ $post->title }}</th>
                    <td>
                        @if( $post->category )
                            <span class="badge badge-pill badge-{{$post->Category->color}}">{{ $post->Category->label}}</span>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <p>{{ $post->content }}</p>
                    </td>
                    <td>
                        <img src="{{ $post->image }}" alt="{{ $post->title }}" width="50">
                    </td>
                    <td> {{ $post->slug }} </td>
                    <td class="d-flex">
                        <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary">View</a>
                        {{-- <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="delete-form">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}
                        @include('includes.deletePost')
                        <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>                    
                @empty
                  <h2> non ci sono post</h2>
                @endforelse

            </tbody>
        </table>

        @if ( $posts->hasPages() )
            {{ $posts->links() }}            
        @endif
        
    </div>

@endsection

@section('scripts')
<script src="{{ asset('js/delete-form.js') }}"></script>
@endsection

