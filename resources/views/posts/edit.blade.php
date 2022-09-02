@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __($community->name . ' /    ' . $post->title) }}</div>

                    <div class="card-body">

                        <form action="{{ route('communities.posts.update', [$community, $post]) }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="title"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ $post->title }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="post_text"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Post Text') }}</label>

                                <div class="col-md-6">
                                    <textarea id="post_text" type="textarea" class="form-control @error('post_text') is-invalid @enderror" name="post_text"
                                        value="" required autocomplete="post_text" autofocus>{{ $post->post_text }}</textarea>

                                    @error('post_text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="post_url"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Post URL') }}</label>

                                <div class="col-md-6">
                                    <input id="post_url" type="text"
                                        class="form-control @error('post_url') is-invalid @enderror" name="post_url"
                                        value="{{ $post->post_url }}" required autocomplete="post_url" autofocus>

                                    @error('post_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="post_image"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Post Image') }}</label>

                                <div class="col-md-6">
                                    <input id="post_image" type="file"
                                        class="form-control @error('post_image') is-invalid @enderror" name="post_image"
                                        value="{{ $post->post_image }}">

                                    @error('post_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 form-group">

                                <div class="col-md-4 offset-md-4">
                                    <input class="form-control btn btn-primary" type="submit" value="Update">
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
