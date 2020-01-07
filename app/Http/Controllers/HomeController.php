<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Pesanan;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth = Auth::user();
        $data['view'] = 'kasir.home';
        $data['menu'] = 'dashboard';
        $data['user'] = User::count();
        $data['product'] = Product::count();
        $data['order'] = Pesanan::count();
        $data['role'] = DB::table('role_users')->where('user_id', $auth->id)->first();
        return view('kasir.layout.app', $data, compact('auth'));
    }

    public function excel()
    {
        $data['pesanan'] = Product::with(['tipe'])->get();
        return view('kasir.export', $data);
    }

    public function export_excel()
	{
		return Excel::download(new ProductExport, 'product.xlsx');
	}
}
