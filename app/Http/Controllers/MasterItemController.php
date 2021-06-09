<?php

namespace App\Http\Controllers;

use App\Models\MasterItem;
use Illuminate\Http\Request;

class MasterItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = MasterItem::all();
        return view('item.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        MasterItem::create($input);
        return redirect()->route('item.index')->with('status', 'Add successful');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterItem  $masterItem
     * @return \Illuminate\Http\Response
     */
    public function show(MasterItem $masterItem)
    {
        return view('item.edit', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterItem  $masterItem
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterItem $masterItem)
    {
        return view('item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterItem  $masterItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterItem $item)
    {
        $item->update($request->all());
        return redirect()->route('item.index')->with('status', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterItem  $masterItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterItem $item)
    {
        MasterItem::destroy($item->id);
        return redirect()->route('item.index')->with('status', 'Delete successful');
    }
}
