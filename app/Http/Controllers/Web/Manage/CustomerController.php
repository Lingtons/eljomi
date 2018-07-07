<?php

namespace App\Http\Controllers\Web\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Type;
use App\Models\Preference;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::orderBy('id', 'asc')->paginate(5);
        $preferences  = Preference::all();
        $values = DB::select('select value from customer_preference');
        return view('manage.customers.list', compact('customers', 'preferences', 'values'));
    }

    /**
     * Add a value to the preference.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function add_client_preference(Request $request){
        
        $this->validate($request, [
            'preference' => 'required',
            'client_preference'=> 'required',
        ]);

        $id = $request->input('id');
        $pref = $request->input('preference');
        $cp = $request->input('client_preference');

        $customer = Customer::findOrFail($id);
        $customer->preferences()->attach($pref, ['value' => $cp]);        
            
        flash('The Preference has been added.')->important();
        return redirect()->route('customers.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('manage.customers.create');
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
             'phone' => 'required',
             'type' => 'required',
             'gender' => 'required',
         ]);

          $length = 10;
          $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
          $str = '';
          $max = mb_strlen($keyspace, '8bit') - 1;
          for ($i = 0; $i < $length; ++$i) {
              $str .= $keyspace[random_int(0, $max)];
          }
          $code = $str;

          $customer = Customer::create([
             'name' => $request->input('name'),
             'email' => $request->input('email'),
             'phone' => $request->input('phone'),
             'dob' => $request->input('dob'),
             'nickname' => $request->input('nickname'),
             'type' => $request->input('type'),
             'address' => $request->input('address'),
             'gender' => $request->input('gender'),
             'code'=>$code,
         ]);

         flash('New Customer '.$customer->name.' was created successfully')->important();
                return redirect()->route('customers.index');
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
        $customer = Customer::findOrFail($id);
    
        return view('manage.customers.edit', compact('customer'));
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
             'phone' => 'required',
             'type' => 'required',
             'gender' => 'required',
         ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        if($customer->save()){
            flash('The Customer '.$customer->name.' was successfully updated')->important();
            return redirect()->route('customers.index');
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
