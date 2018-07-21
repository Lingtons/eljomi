<?php

namespace App\Http\Controllers\Web\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class ReportsController extends Controller
{
    //
    public function debts()
    {
          
          $transactions = Transaction::where('delivered', 0)->where('balance', '>', 0)->orderBy('created_at', 'desc')->get();
          return view('manage.reports.debts', ['transactions' => $transactions]);
    }

    public function todayDelivery()
    {
          
        $transactions = Transaction::where('delivered', 1)->whereDate('due_time', Carbon::today())->orderBy('created_at', 'desc')->get();        
        return view('manage.reports.today_delivery', ['transactions' => $transactions]);
    }

    public function pendingDelivery()
    {
          
        $transactions = Transaction::where('delivered', 0)->whereDate('due_time', '>=', Carbon::today())->orderBy('created_at', 'desc')->get();        
        return view('manage.reports.pending_delivery', ['transactions' => $transactions]);
    }

    public function overdueDelivery()
    {
          
        $transactions = Transaction::where('delivered', 0)->whereDate('due_time', '<', Carbon::today())->orderBy('created_at', 'desc')->get();        
        return view('manage.reports.overdue_delivery', ['transactions' => $transactions]);
    }

    public function highestSpender()
    {
        $customers = Customer::orderBy('point', 'desc')->get();
        
        return view('manage.reports.highspender', compact('customers'));        
    }
}
