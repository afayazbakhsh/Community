@extends('layouts.app')

@section('content')
    <?php use App\Models\PostVote; ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __($community->name) }}
                        <div>
                            <a href="{{ route('communities.show', $community) }}"
                                @if (request('sort', '') == '') style="font-size:20px" @endif>Newest</a>
                        </div>
                        <div>
                            <a href="{{ route('communities.show', $community) }}?sort=popular"
                                @if (request('sort', '') == 'popular') style="font-size:20px" @endif>Popular</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <a class="btn btn-sm btn-primary" href="{{ route('communities.posts.create', $community) }}">Create
                            Post</a>
                    </div>

                    <div class="card-body">
                        @forelse ($posts as $post)
                            <a class="" href="{{ route('communities.posts.show', [$community, $post]) }}">
                                <h3>{{ $post->title }}</h3>
                            </a>
                            <div>
                                <p>{{ \Illuminate\Support\Str::words($post->post_text, 10) }}</p>
                            </div>
                            @can('view', $post)
                                <span class="btn btn-success">Owner</span>
                            @endcan
                            <hr>
                        @empty
                            No post exist
                        @endforelse

                        {{ $posts->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
