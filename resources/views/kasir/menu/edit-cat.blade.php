<div class="container">
    <div class="card shadow mb-4">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Menu</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('update-category', $category->id) }}" method="post">
                @csrf
                <input type="hidden" value="{{ $category->id }}">
                <label for="">Category</label>
                <input type="text" value="{{ $category->tipe_makanan }}" required class="form-control" name="tipe">
                <a href="{{ route('menu') }}" class="btn btn-warning mt-3">Back</a>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
</div>