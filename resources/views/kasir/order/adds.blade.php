<div class="container bg-white rounded p-3 mb-3">
    <br />
    <h3 align="center">Dynamically Add / Remove input fields in Laravel 5.8 using Ajax jQuery</h3>
    <br />
    <div class="table-responsive">
        <form method="post" id="dynamic_form">
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
                            <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
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
                        $('#result').html('<div class="alert alert-success">' + data.success + '</div>');
                    }
                    $('#save').attr('disabled', false);
                }
            })
        });

    });
</script>