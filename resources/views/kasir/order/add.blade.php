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
            <h6 class="m-0 font-weight-bold text-primary">New Order</h6>
        </div>
        <div class="card-body">
            <form method="post" id="dynamic_form">
                <div class="row">
                    <div class="col-md-4" id="customer">
                        <h5>Customer detail</h5>
                        <label for="">Customer name :</label>
                        <input required type="text" name="nama" class="form-control">
                        <label for="">Gender :</label>
                        <select required name="jk" id="" class="form-control">
                            <option>-- Select Gender --</option>
                            <option value="1">Man</option>
                            <option value="2">Women</option>
                        </select>
                        <label for="">No Hp</label>
                        <input required type="number" name="hp" class="form-control">
                        <label for="">Address</label>
                        <textarea name="alamat" id="" cols="30" rows="10"></textarea>
                        <label for="">Table</label>
                        <select required name="table" id="" class="form-control">
                            <option>-- Choose Table --</option>
                            @foreach($table as $t)
                            <option value="{{ $t->id }}">{{ $t->meja }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-8">
                        <h5>Menu's</h5>
                        <div class="table-responsive">
                            <span id="result"></span>
                            <table class="table table-bordered table-striped" id="user_table">
                                <thead>
                                    <tr>
                                        <th width="35%">Menu</th>
                                        <th width="35%">Jumlah</th>
                                        <th width="35%">Customer Service</th>
                                        <th width="30%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" align="right">&nbsp;</td>
                                        <td>
                                            @csrf
                                            <input type="submit" name="save" id="save" class="btn btn-primary float-right" value="Save" />
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {

        var count = 1;

        dynamic_field(count);

        function dynamic_field(number) {
            html = '<tr>';
            html += '<td><select class="form-control" name="menu_id[]"><option>-- Select Menu --</option>@foreach($product as $p)<option value="{{ $p->id }}">{{ $p->nama_menu }}</option>@endforeach</select></td>'
            html += '<td><input type="text" name="jumlah[]" class="form-control" /></td>';
            html += '<td><input type="text" name=user_id[]" class="form-control" readonly value="{{ $auth->id }}"/>{{ $auth->name }}</td>';
            if (number > 1) {
                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                $('tbody').append(html);
            } else {
                html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                $('tbody').html(html);
            }
        }

        $(document).on('click', '#add', function() {
            count++;
            dynamic_field(count);
        });

        $(document).on('click', '.remove', function() {
            count--;
            $(this).closest("tr").remove();
        });

        $('#dynamic_form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: '{{ route("store-order") }}',
                method: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $('#save').attr('disabled', 'disabled');
                },
                success: function(data) {
                    if (data.error) {
                        var error_html = '';
                        for (var count = 0; count < data.error.length; count++) {
                            error_html += '<p>' + data.error[count] + '</p>';
                        }
                        $('#result').html('<div class="alert alert-danger">' + error_html + '</div>');
                    } else {
                        dynamic_field(1);
                        $('#result').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong> Yeay </strong>' + data.success + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        $('#dynamic_form')[0].reset();
                    }
                    $('#save').attr('disabled', false);
                }
            })
        });

    });
</script>