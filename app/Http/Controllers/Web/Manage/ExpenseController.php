<?php

namespace App\Http\Controllers\Web\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Carbon\Carbon;


class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $expenses = Expense::orderBy('id', 'asc')->paginate(5);
        return view('manage.expenses.list', ['expenses' => $expenses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $expense_categories  = ExpenseCategory::pluck('name', 'id');
        return view('manage.expenses.create', compact('expense_categories'));
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
             'reason' => 'required',
             'expense_category_id' => 'required',
             'description' => 'required',
             'date_occurred' => 'required',
             'amount' => 'required',
         ]);

        $expense = expense::create([
             'amount' => $request->input('amount'),
             'reason' => $request->input('reason'),
             'expense_category_id' => $request->input('expense_category_id'),
             'description' => $request->input('description'),
             'date_occurred' => $request->input('date_occurred'),
         ]);

         flash('The new Expense was created successfully')->important();
                return redirect()->route('expenses.index');
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
        $expense = Expense::findOrFail($id);
        $expense_categories  = ExpenseCategory::pluck('name', 'id');
        return view('manage.expenses.edit', compact('expense_categories', 'expense'));

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
             'reason' => 'required',
             'expense_category_id' => 'required',
             'description' => 'required',
             'date_occurred' => 'required',
             'amount' => 'required',
         ]);

        $expense = Expense::findOrFail($id);
        $expense->update($request->all());

        if($expense->save()){
            flash('The Expense was successfully updated')->important();
            return redirect()->route('expenses.index');
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

    
    public function expenditureData(){

        $response = Expense::whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->groupBy('month')
        ->selectRaw('sum(amount) as sum, monthname(created_at) as month')
        ->OrderBy('month', 'DESC')->get();                                    
        
        //return response()->json($response);
        return $response;


}
}
