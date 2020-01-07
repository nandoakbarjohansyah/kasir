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
            <form action="{{ route('update-table', $meja->id) }}" method="post">
                @csrf
                <input type="hidden" value="{{ $meja->id }}">
                <label for="">Table</label>
                <input type="text" required value="{{ $meja->meja }}" class="form-control" name="meja">
                <label for="">Status</label>
                <select required name="type" id="" class="form-control">
                    @if($meja->status == 1)
                    <option value="{{ $meja->status }}"><span class="badge badge-secondary">Ready (Old)</span></option>
                    @elseif($meja->status == 2)
                    <option value="{{ $meja->status }}"><span class="badge badge-secondary">Service (Old)</span></option>
                    @else
                    <option value="{{ $meja->status }}"><span class="badge badge-secondary">Empty (Old)</span></option>
                    @endif
                    <option value="">-- Select status table --</option>
                    <option value="1">Ready</option>
                    <option value="2">Service</option>
                    <option value="3">Empty</option>
                </select>
                </select>
                <a href="{{ route('menu') }}" class="btn btn-warning mt-3">Back</a>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
</div>