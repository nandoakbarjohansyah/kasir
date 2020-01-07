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
            <h6 class="m-0 font-weight-bold text-primary">Checkout</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">

                </div>
            </div>
            <p>{{ $pesanan->pelanggan->id }}</p>
            <p>{{ $pesanan->pelanggan->nama_pelanggan }}</p>
            <p>{{ $pesanan->menu->nama_menu }} : {{ $pesanan->jumlah }} </p>
            <p>{{ $pesanan->menu->harga }}</p>
        </div>
    </div>
</div>
</div>