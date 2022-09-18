@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Tags Count</th>
                                    <th>Posts Count</th>
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
                                            {{ $community->tags_count }}
                                        </td>
                                        <td>
                                            {{ $community->posts_count }}
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
