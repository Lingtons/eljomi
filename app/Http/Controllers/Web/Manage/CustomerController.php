<?php

namespace App\Http\Controllers\Web\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Type;

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
        $customers = Customer::orderBy('id', 'desc')->paginate(10);
        return view('manage.customers.list', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types  = Type::pluck('name', 'id');
        return view('manage.customers.create', compact('types'));
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
             'email' => 'required|unique:customers,email',
             'type_id' => 'required|numeric',
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

            $table->string('nickname')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();

          $customer = Customer::create([
             'name' => $request->input('name'),
             'email' => $request->input('email'),
             'phone' => $request->input('phone'),
             'dob' => $request->input('dob'),
             'nickname' => $request->input('nickname'),
             'type_id' => $request->input('type_id'),
             'address' => $request->input('address'),
             'gender' => $request->input('gender'),
             'code'=>$transit_code,
         ]);

         flash('New Customer '.$customer->name.' was created successfully')->important();
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
        $customer = Customer::findOrFail($id);
        $types  = Type::pluck('name', 'id');
        return view('manage.customers.edit', compact('customer', 'types'));
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
             'email' => 'required|unique:customers,email',
             'type_id' => 'required|numeric',
             'gender' => 'required',
         ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        if($customer->save()){
            flash('The Customer '.$customer->name.' was successfully updated')->important();
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
