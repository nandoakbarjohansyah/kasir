<?php

namespace App\Http\Controllers;

use App\Product;
use App\Tipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $auth = Auth::user();
        $data['menu'] = 'menu';
        $data['view'] = 'kasir.menu';
        $data['daftar'] = Product::with(['tipe'])->orderby('nama_menu', 'asc')->get();
        $data['role'] = DB::table('role_users')->where('user_id', $auth->id)->first();
        $data['type'] = Tipe::orderby('tipe_makanan','asc')->get();

        return view('kasir.layout.app', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menu = new Product;
        $menu->nama_menu = $request->nama_menu;
        $menu->harga = $request->harga;
        $menu->tipe_id = $request->type;
        $menu->save();

        return redirect()->back()->with(['success' => 'New menu is added']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipe = new Tipe;
        $tipe->tipe_makanan = $request->tipe_makanan;
        $tipe->save();

        return redirect()->back()->with(['success' => 'New category is added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auth = Auth::user();
        $data['produk'] = Product::find($id);
        $data['menu'] = 'edit menu';
        $data['tipe'] = Tipe::all();
        $data['category'] = Product::with(['tipe'])->find($id);
        $data['role'] = DB::table('role_users')->where('user_id', $auth->id)->first();
        $data['view'] = 'kasir.menu.edit';

        return view('kasir.layout.app', $data, compact('auth'));
    }

    public function update(Request $request, $id)
    {
        $produk = Product::find($id);
        $produk->update([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'tipe_id' => $request->type
        ]);

        return redirect(route('menu'))->with(['success' => 'Menu has been updated']);
    }

    public function edit_cat($id)
    {
        $auth = Auth::user();
        $data['category'] = Tipe::find($id);
        $data['menu'] = 'edit category';
        $data['view'] = 'kasir.menu.edit-cat';
        $data['role'] = DB::table('role_users')->where('user_id', $auth->id)->first();

        return view('kasir.layout.app', $data);
    }

    public function update_cat(Request $request, $id)
    {
        $cat = Tipe::find($id);
        $cat->update([
            'tipe_makanan' => $request->tipe
        ]);

        return redirect(route('menu'))->with(['success' => 'Menu has been updated']);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with(['success' => 'Menu is deleted']);
    }

    public function des_cat($id)
    {
        $cat = Tipe::find($id);
        $cat->delete();
        return redirect()->back()->with(['success' => 'Category is deleted']);
    }
}
