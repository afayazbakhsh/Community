@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Community') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('communities.update',$community)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $community->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="textarea" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="dscription" autofocus>{{ $community->description }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="topics" class="col-md-4 col-form-label text-md-end">{{ __('Topics') }}</label>

                            <div class="col-md-6">

                                <select class="form-control select2" name="topics[]" multiple>
                                    @foreach($topics as $topic)
                                        <option value="{{$topic->id}}" @if($community->topics->contains($topic->id)) selected @endif> {{$topic->name}}</option>
                                        {{$topic->name}}
                                        <br>
                                    @endforeach
                                </select>


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
