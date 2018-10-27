@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($news as $new)
                            <tr>
                                <td>{{ $new->id }}</td>
                                <td>{{ $new->title }}</td>
                                <td><a href="">{{ $new->category->name }}</a></td>
                                <td>
                                    <a href="{{ route('manager.edit', $new->id)  }}" class="btn btn-link">Edit</a>
                                    <form action="{{ route('manager.destroy', $new->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-link">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @include('sidebar')
        </div>
    </div>
@endsection