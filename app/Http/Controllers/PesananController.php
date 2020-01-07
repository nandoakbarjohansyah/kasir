<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\Pesanan;
use App\Product;
use App\Table;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $auth = Auth::user();
        $data['menu'] = 'Order';
        $data['view'] = 'kasir.order';
        $data['role'] = DB::table('role_users')->where('user_id', $auth->id)->first();
        $data['pesanan'] = Pesanan::with(['menu', 'pelanggan.pesanan'])->get();
        $data['product'] = Product::all();

        return view('kasir.layout.app', $data, compact('auth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auth = Auth::user();
        $data['menu'] = 'Order';
        $data['view'] = 'kasir.order.add';
        $data['role'] = DB::table('role_users')->where('user_id', $auth->id)->first();
        $data['product'] = Product::all();
        $data['table'] = Table::orderby('meja', 'asc')->where('status', '=', '1')->get();

        return view('kasir.layout.app', $data, compact('auth'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Pelanggan;
        $customer->nama_pelanggan = $request->nama;
        $customer->jenis_kelamin = $request->jk;
        $customer->no_hp = $request->hp;
        $customer->alamat = $request->alamat;
        $customer->table_id = $request->table;
        $customer->save();

        if ($request->ajax()) {
            $rules = array(
                'menu_id.*'  => 'required',
                'jumlah.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }

            $menu_id = $request->menu_id;
            $jumlah = $request->jumlah;
            $user_id = $request->user_id;
            $pelanggan_id = $customer->id;

            for ($count = 0; $count < count($menu_id); $count++) {
                $data = array(
                    'menu_id' => $menu_id[$count],
                    'jumlah'  => $jumlah[$count],
                    'user_id' => $user_id[$count],
                    'pelanggan_id' => $pelanggan_id
                );
                $insert_data[] = $data;
            }

            Pesanan::insert($insert_data);
            return response()->json([
                'success'  => 'Data Added successfully.'
            ]);
        }
        return redirect(route('order'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auth = Auth::user();
        $data['menu'] = 'Order';
        $data['view'] = 'kasir.checkout';
        $data['role'] = DB::table('role_users')->where('user_id', $auth->id)->first();
        $data['pesanan'] = Pesanan::with(['menu', 'pelanggan.pesanan'])->find($id);

        return view('kasir.layout.app', $data, compact('auth'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->delete();

        return redirect()->back()->with(['success' => 'Data deleted']);
    }

    public function export()
    {
        $pegawai = Pegawai::all();
        return view('pegawai', ['pegawai' => $pegawai]);
    }
}
