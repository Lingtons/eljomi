<?php

namespace App\Http\Controllers\Web\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Preference;
use App\Models\PreferenceValue;

class PreferenceController extends Controller
{/**
     * Add a value to the preference.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function preferences_value(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:preference_values,name',
        ]);
                        
        $preferenceValue = PreferenceValue::create([
            'name' => $request->input('name'),
            'preference_id' => $request->input('id'),                    
        ]);            
            
        flash('The Value for  has been added.')->important();
        return redirect()->back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $preferences = Preference::orderBy('id', 'asc')->paginate(5);
        return view('manage.preferences.list', ['preferences' => $preferences]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                    'name' => 'required|unique:preferences,name',
                ]);
                                
                $preference = Preference::create([
                    'name' => $request->input('name'),                    
                ]);            
                    
                flash('New Client Preference '.$preference->name.' was created successfully')->important();
                return redirect()->back();
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
            'name' => 'required|unique:types,name,'.$id,
        ]);

        $preference = Preference::findOrFail($id);
        $preference->name =  $request->input('name');
        
        if($preference->save()){
            flash('The client preference '.$preference->name.' was successfully updated')->important();
            return redirect()->back();
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
