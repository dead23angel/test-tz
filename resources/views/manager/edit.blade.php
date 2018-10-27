@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        @if($errors->any())
                            Errors:
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="post" action="{{ route('manager.update', $new->id) }}">
                            @method('PUT')
                            {!! csrf_field() !!}
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" value="{{ old('title', $new->title) }}" id="title" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category:</label>
                                <select name="category_id" class="form-control" id="category_id">
                                    @foreach($categories as $item)
                                        <option value="{{ $item->id }}" {{ (old('category_id', $new->category_id) === $item->id ? 'selected' : '') }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" class="form-control">{{ old('content', $new->content) }}</textarea>
                            </div>
                            <input type="submit" value="Save" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>

            @include('sidebar')
        </div>
    </div>
@endsection