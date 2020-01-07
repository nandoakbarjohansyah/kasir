<?php

namespace App\Http\Controllers;

use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $auth = Auth::user();
        $data['menu'] = 'table';
        $data['view'] = 'kasir.table';
        $data['meja'] = Table::orderby('meja','asc')->get();
        $data['role'] = DB::table('role_users')->where('user_id', $auth->id)->first();

        return view('kasir.layout.app', $data, compact('auth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $table = new Table;
        $table->meja = $request->meja;
        $table->status = $request->status;
        $table->save();

        return redirect()->back()->with(['success' => 'New table added']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data['menu'] = 'table';
        $data['view'] = 'kasir.menu.edit-table';
        $data['meja'] = Table::find($id);
        $data['role'] = DB::table('role_users')->where('user_id', $auth->id)->first();

        return view('kasir.layout.app', $data, compact('auth'));
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
        $table = Table::find($id);
        $table->update([
            'meja' => $request->meja,
            'status' => $request->type
        ]);

        return redirect(route('table'))->with(['success' => 'Table Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Table::find($id);
        $table->delete();
        return redirect()->back()->with(['success' => 'Table deleted']);
    }
}
