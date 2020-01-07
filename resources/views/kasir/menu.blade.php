<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Menu's Management</h1>
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
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category Table</h6>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary rounded mb-3" data-toggle="modal" data-target="#exampleModalLong">
                        Add Category
                    </button>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datasTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach($type as $t)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td class="text-capitalize">{{ $t->tipe_makanan }}</td>
                                    <td>
                                        <a href="{{ route('edit-category', $t->id) }}" class="btn btn-warning"><i class="fas fa-edit text-white"></i></a>
                                        <a href="{{ route('delete-category', $t->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Menu Table</h6>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary rounded mb-3" data-toggle="modal" data-target="#exampleModal">
                        Add Menu
                    </button>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Menu</th>
                                    <th>Category</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Menu</th>
                                    <th>Category</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach($daftar as $d)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td class="text-capitalize">{{ $d->nama_menu }}</td>
                                    <td class="text-capitalize">{{ $d->tipe->tipe_makanan }}</td>
                                    <td>Rp. {{ number_format($d->harga) }}</td>
                                    <td>
                                        <a href="{{ route('edit-menu', $d->id) }}" class="btn btn-warning"><i class="fas fa-edit text-white"></i></a>
                                        <a href="{{ route('delete-menu', $d->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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

</div>
<!-- /.container-fluid -->

<!-- Modal add menu -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('add-menu') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <label for="">Name of menu :</label>
                    <input required type="text" required name="nama_menu" class="form-control">
                    <label for="">Category :</label>
                    <select required name="type" id="" class="form-control">
                        <option value="">-- Choose type of menu --</option>
                        @foreach($type as $t)
                        <option class="text-capitalize" value="{{ $t->id }}">{{ $t->tipe_makanan }}</option>
                        @endforeach
                    </select>
                    <label for="">Price</label>
                    <input required type="number" required name="harga" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal add category -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('add-tipe') }}" method="post">
                @csrf
                <div class="modal-body">
                    <label for="">New Category</label>
                    <input type="text" class="form-control" required name="tipe_makanan">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</div>

</div>
</div>
<!-- End of Main Content -->