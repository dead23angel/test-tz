@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1><a href="/news/{{ $new->id }}">{{ $new->title }}</a></h1>
                    </div>
                    <div class="card-body">
                        <h4>{{ $new->created_at->format('d.m.Y') }} by <strong>{{ $new->user->name }}</strong> in category <a href="/category/{{ $new->category_id }}">{{ $new->category->name }}</a></h4>
                        <p>{{ $new->content }}</p>
                    </div>
                </div>
            </div>

            @include('sidebar')
        </div>
    </div>
@endsection