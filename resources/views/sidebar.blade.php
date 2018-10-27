<div class="col-md-3">
    @if(auth()->check())
        <div class="card">
            <div class="card-header">Manage</div>
            <div class="card-body">
                <ul>
                    <li><a href="{{ route('manager.create' ) }}">Add news</a></li>
                </ul>
            </div>
        </div>
        <br>
    @endif

    @isset($category)
        <div class="card">
            <div class="card-body">
                <p>{{ $category->description }}</p>
            </div>
        </div>
        <br>
    @endisset

    <div class="card">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <ul>
                @foreach ($categories as $category)
                    <li><a href="/category/{{ $category->id }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>