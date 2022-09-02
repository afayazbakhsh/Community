@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __($community->name . ' /    ' . $post->title) }}</div>

                    <div class="card-body">
                        @if ($post->post_url)
                            <div><a href="{{ $post->post_url }}">{{ $post->post_url }}</a></div>
                        @endif
                        @if ($post->post_text)
                            <div>
                                <p>
                                    {{ $post->post_text }}
                                </p>
                            </div>
                        @endif

                        @if ($post->post_image != '')
                            <div>
                                <img src={{ asset('storage/posts/' . $post->id . '/' . $post->post_image) }}>
                            </div>
                        @endif

                        <div class="" style="">
                            @can('update', $post)
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('communities.posts.edit', [$community, $post]) }}">Edit</a>
                            @endcan
                            @can('delete', $post)
                                <form action="{{ route('communities.posts.destroy', [$community, $post]) }}" method="POSt">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                </form>
                            @endcan


                        </div>

                    </div>

                    <div class="card-body">
                        <form action="{{ route('posts.comments.store', $post) }}" method="POST">
                            @csrf
                            <textarea name="text" class="form-control" rows="5" placeholder="comment ... "></textarea>
                            <button type="submit" class="mt-2 btn btn-sm btn-primary">Send</button>
                        </form>
                    </div>


                    <div class="card-footer">
                        @forelse ($post->comments as $comment)
                            <div>
                                <p>{{ $comment->text }}</p>
                                <p>{{ $comment->created_at->diffForHumans() }} / {{ $comment->user->name }}</p>
                            </div>
                            <hr>
                        @empty
                            NO Comment yet
                        @endforelse
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
