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
            <form action="{{ route('update-menu', $produk->id) }}" method="post">
                @csrf
                <input type="hidden" value="{{ $produk->id }}">
                <label for="">Menu</label>
                <input required type="text" required value="{{ $produk->nama_menu }}" class="form-control" name="nama_menu">
                <label for="">Category</label>
                <select required name="type" id="" class="form-control">
                    <option value="{{ $category->tipe->id }}">{{ $category->tipe->tipe_makanan }} <span class="badge badge-secondary">(Old)</span></option>
                    @foreach($tipe as $t)
                    <option value="{{ $t->id }}">{{ $t->tipe_makanan }}</option>
                    @endforeach
                </select>
                <label for="">Price</label>
                <input required name="harga" type="number" class="form-control" value="{{ $category->harga }}" required>
                <a href="{{ route('menu') }}" class="btn btn-warning mt-3">Back</a>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
</div>