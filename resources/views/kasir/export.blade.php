<style>
    table {
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }
</style>
<table>
    <tr>
        <td>Category</td>
        <td>Menu</td>
        <td>Price</td>
    </tr>
    @foreach($pesanan as $p)
    <tr>
        <td>{{ $p->tipe->tipe_makanan }}</td>
        <td>
            {{ $p->nama_menu }}
        </td>
        <td>{{ $p->harga }}</td>
    </tr>
    @endforeach
</table>