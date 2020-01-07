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
            <h6 class="m-0 font-weight-bold text-primary">Order Management</h6>
        </div>
        <div class="card-body">
            @if($role->id == 2)
            <a href="{{ route('add-order') }}" class="btn btn-primary mb-3">Add Order</a>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Address</th>
                            <th>Menu</th>
                            <th>Quantity</th>
                            @if($role->id == 3)
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Address</th>
                            <th>Menu</th>
                            <th>Quantity</th>
                            @if($role->id == 3)
                            <th>Action</th>
                            @endif
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $no = 1 ?>
                        @foreach($pesanan as $c)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td class="text-capitalize">{{ $c->pelanggan->nama_pelanggan }}</td>
                            <td class="text-capitalize">{{ $c->pelanggan->alamat }}</td>
                            <td class="text-capitalize">{{ $c->menu->nama_menu }}</td>
                            <td>{{ $c->jumlah }}</td>
                            @if($role->id == 3)
                            <td>
                                <a href="{{ route('delete-order', $c->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                <a href="{{ route('show-order', $c->id) }}" class="btn btn-primary">Checkout</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>