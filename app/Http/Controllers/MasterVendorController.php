<?php

namespace App\Http\Controllers;

use App\Models\MasterVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class MasterVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor = MasterVendor::all();
        return view('vendor.index', ['vendor'=>$vendor]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MasterVendor::create([
            'nama'=> $request->nama,
            'kode'=> $request->kode,
            'harga_katering_dasar'=> $request->harga_katering_dasar,
            'add_on'=> $request->add_on,
            'harga_add_on'=> $request->harga_add_on,
        ]);
        return redirect('/kantin/vendor')->with('status', 'Add successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterVendor  $masterVendor
     * @return \Illuminate\Http\Response
     */
    public function show(MasterVendor $vendor)
    {
        return view('vendor.edit', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterVendor  $masterVendor
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterVendor $vendor)
    {
        return view('vendor.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterVendor  $masterVendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterVendor $vendor)
    {
        MasterVendor::where('id',$vendor->id)
            ->update([
            'nama'=> $request->nama,
            'kode'=> $request->kode,
            'harga_katering_dasar'=> $request->harga_katering_dasar,
            'add_on'=> $request->add_on,
            'harga_add_on'=> $request->harga_add_on,
        ]);
        return redirect('/kantin/vendor')->with('status', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterVendor  $masterVendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterVendor $vendor)
    {
        MasterVendor::destroy($vendor->id);
        return redirect('/kantin/vendor')->with('status', 'Delete successful');
    }
}
