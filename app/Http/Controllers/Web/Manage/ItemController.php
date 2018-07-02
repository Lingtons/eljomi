<?php

namespace App\Http\Controllers\Web\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\ServiceCategory;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Item::orderBy('id', 'asc')->paginate(5);
        return view('manage.items.list', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $item_categories  = ItemCategory::pluck('name', 'id');
        $service_categories = ServiceCategory::pluck('name', 'id');
        return view('manage.items.create', compact('item_categories', 'service_categories'));
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
        $this->validate($request, [

             'name' => 'required',
             'price' => 'required',
             'item_category_id' => 'required',
             'service_category_id' => 'required',
         ]);

        $item = Item::create([
             'name' => $request->input('name'),
             'price' => $request->input('price'),
             'service_category_id' => $request->input('service_category_id'),
             'item_category_id' => $request->input('item_category_id'),
         ]);

         flash('New Item '.$item->name.' was created successfully')->important();
                return redirect()->route('items.index');

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
        //
        $item = Item::findOrFail($id);
        $item_categories  = ItemCategory::pluck('name', 'id');
        $service_categories = ServiceCategory::pluck('name', 'id');
    
        return view('manage.items.edit', compact('item', 'item_categories', 'service_categories'));
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
        $this->validate($request, [

             'name' => 'required',
             'price' => 'required',
             'item_category_id' => 'required',
             'service_category_id' => 'required',
         ]);

        $item = Item::findOrFail($id);
        $item->update($request->all());

        if($item->save()){
            flash('The Customer '.$item->name.' was successfully updated')->important();
            return redirect()->route('items.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
