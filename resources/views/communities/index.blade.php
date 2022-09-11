@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Communities') }}</div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-info" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <div>
                            <a href="{{ route('communities.create') }}" class="btn btn-sm mb-2 mt-3 btn-primary">Create
                                Community</a>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($communities as $community)
                                    <tr>
                                        <td>
                                            <a href="{{ route('communities.show', $community) }}">{{ $community->name }}</a>
                                        </td>

                                        <td>
                                            {{ $community->description }}
                                        </td>

                                        <td>
                                            <a href="{{ route('communities.edit', $community) }}"
                                                class="btn btn-sm btn-primary">Edit</a>

                                            <form action="{{ route('communities.destroy', $community) }}" method="POST"
                                                style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
