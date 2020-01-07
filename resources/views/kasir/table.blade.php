<div class="container-fluid">
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
            <h6 class="m-0 font-weight-bold text-primary">Table Management</h6>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary rounded mb-3" data-toggle="modal" data-target="#exampleModal">
                Add Table
            </button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Table</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Table</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $no = 1 ?>
                        @foreach($meja as $m)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $m->meja }}</td>
                            @if($m->status == 1)
                            <td><span class="badge badge-success">Ready</span></td>
                            @elseif($m->status == 2)
                            <td><span class="badge badge-secondary">Service</span></td>
                            @else
                            <td><span class="badge badge-danger">Empty</span></td>
                            @endif
                            <td>
                                <a href="{{ route('edit-table', $m->id) }}" class="btn btn-warning"><i class="fas fa-edit text-white"></i></a>
                                <a href="{{ route('delete-table', $m->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal add menu -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Table</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('add-table') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <label for="">Table name :</label>
                    <input type="text" required name="meja" class="form-control">
                    <label for="">Status :</label>
                    <select name="status" id="" class="form-control" required>
                        <option value="">-- Select status table --</option>
                        <option value="1">Ready</option>
                        <option value="2">Service</option>
                        <option value="3">Empty</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>