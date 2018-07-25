<?php

namespace App\Http\Controllers\Web\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
use App\Models\Customer;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\DB;
use Response;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          
          $transactions = Transaction::orderBy('id', 'desc')->get();
          return view('manage.transactions.list', ['transactions' => $transactions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $id = 0 )    
    {
        
        
        if($id == 1){
            return view('manage.transactions.individual');
        }elseif($id == 2){
            return view('manage.transactions.corporate');
        }else{
            return redirect()->back();
        }
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

        return response()->json(['success' => 'Successfully rcieevfd']);
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
        $transaction = Transaction::find($id);
        return view('manage.transactions.show', ['transaction' => $transaction]);
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
        
      $this->validate($request, [
            'total' => 'required',
            'paid' => 'required',
            'balance' => 'required',
            'delivered' => 'required',
        ]);
 
 

        $transaction = Transaction::findOrFail($id);
        $transaction->paid = $request->input('paid');
        $transaction->balance = $request->input('balance');
        $transaction->delivered = $request->input('delivered');

        if($transaction->save()){
            flash('Transaction was successfully updated')->important();
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

    public function newTransaction(Request $request)
    {
        

        $total = $request->get('total');
        $customer_id = $request->get('customer_id');
        $transaction_code = $this->randomstr();
        $service_category_id = $request->get('service_category_id');

        $hours = ServiceCategory::findOrFail($service_category_id)->hours;

        $short_note = $request->get('short_note');
        $collections = $request->get('collections');
        $pickup_time = Carbon::now()->toDateTimeString();
        $due_time = Carbon::parse($pickup_time)->addHour($hours)->toDateTimeString();
        $delivery_time = null;
        $paid = false;

        $customer = Customer::findOrFail($customer_id);

       $transaction = Transaction::create([
            'customer_id' => $customer_id,
            'service_category_id' => $service_category_id,
            'transaction_code' => $transaction_code,
            'pickup_time' => $pickup_time,
            'due_time' => $due_time,
            'delivery_time' => $delivery_time,
            'paid' => $paid,
            'total' => $total,
            'short_note' => $short_note,
            'collections' => $collections,
            'balance' => $total
        ]);

        $customer->increment('point', $total); 
            
    
        return response()->json(['transactionId' => $transaction->id]);
        
    }

    public function randomstr(){
        $length = 7;
        $keyspace = '1234567890';
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }        
        return $str;
    }

    public function transactionData(){

            $response = Transaction::whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])->groupBy('month')
            ->selectRaw('sum(total) as sum, monthname(created_at) as month')
            ->OrderBy('month', 'DESC')->get();                                    
            
            //return response()->json($response);
            return $response;


    }
}