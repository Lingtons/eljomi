<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard(){
        $today_deliveries = Transaction::where('delivered', 0)->whereDate('due_time', Carbon::today())->orderBy('created_at', 'desc')->get();        
        $pending_deliveries = Transaction::where('delivered', 0)->whereDate('due_time', '>=', Carbon::today())->orderBy('created_at', 'desc')->get();        
        $overdue_deliveries = Transaction::where('delivered', 0)->whereDate('due_time', '<', Carbon::today())->orderBy('created_at', 'desc')->get();        
        $debts = Transaction::where('balance', '>', 0)->orderBy('created_at', 'desc')->get();
        return view('manage.dashboard', ['today_deliveries' => $today_deliveries, 'pending_deliveries' => $pending_deliveries, 'overdue_deliveries' => $overdue_deliveries, 'debts' => $debts]);
    }
}
