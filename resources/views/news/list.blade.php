@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @foreach ($news as $new)
                    <div class="card">
                        <div class="card-body">
                            <h3><a href="/news/{{ $new->id }}">{{ $new->title }}</a></h3>
                            <h4>{{ $new->created_at->format('d.m.Y') }} by <strong>{{ $new->user->name }}</strong> in category <a href="/category/{{ $new->category_id }}">{{ $new->category->name }}</a></h4>
                        </div>
                    </div>
                    <br>
                @endforeach

                {{ $news->links() }}
            </div>

            @include('sidebar')
        </div>
    </div>
@endsection