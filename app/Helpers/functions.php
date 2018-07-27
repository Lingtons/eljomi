<?php

function sumMonthTransaction(){   
    
    $response = App\Models\Transaction::whereBetween('created_at', [
        Carbon\Carbon::now()->startOfMonth(),
        Carbon\Carbon::now()->endOfMonth(),
    ])
    ->selectRaw('sum(total) as sum')->pluck('sum');                                        
    
    if (strip($response) > 0 ){
        return strip($response);
    }else{
        return 0;
    }

    }
function sumMonthExpenditure(){   

    $response = App\Models\Expense::whereBetween('created_at', [
        Carbon\Carbon::now()->startOfMonth(),
        Carbon\Carbon::now()->endOfMonth(),
    ])
    ->selectRaw('sum(amount) as sum')->pluck('sum');                                        

    if (strip($response) > 0 ){
        return strip($response);
    }else{
        return 0;
    }
    

}    

function countMonthClients(){   

    $response = App\Models\Customer::whereBetween('created_at', [
        Carbon\Carbon::now()->startOfMonth(),
        Carbon\Carbon::now()->endOfMonth(),
    ])
    ->selectRaw('count(*) as total')->pluck('total');                                        
    return strip($response);
    }    

    
function strip($reponse) {
    $skips = ["[","]","\""];
    return str_replace($skips, '',$reponse);       

}

function formatCur(){

$f = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);

return $f;


}

?>
