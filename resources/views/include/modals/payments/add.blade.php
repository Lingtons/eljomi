<!-- Modal -->
<div class="modal fade" id="addPaymentModal{{ $transaction->id }}" tabindex="-1" role="dialog" aria-labelledby="editPreferenceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addPreferenceModalLabel">Payment for {{ $transaction->transaction_code }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="POST" action="{{ route('transactions.update', $transaction->id) }}">
                {{ csrf_field() }}    
                <div class="form-group">
                  <div class="col-md-12 mb-2">
                      <label for="total">Total Amount</label>                      
                    <input id="total" type="number" class="form-control" name="total" value="{{$transaction->total}}" readonly>                     
                  </div>

                  <div class="col-md-12 mb-2">
                        <label for="paid">Amount Paid</label>                      
                      <input id="paid" type="number" class="form-control" name="paid" value="{{$transaction->paid}}" required>                     
                    </div>

                    <div class="col-md-12 mb-2">
                            <label for="balance">Balance</label>                      
                          <input id="balance" type="number" class="form-control" name="balance" placeholder="Balance" readonly>                     
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="delivered">Delivery Status</label>
                        <select name="delivered" id="delivered" class="form-control" required>                            
                            <option value="{{$transaction->delivered}}" selected>{{$transaction->delivered == 0 ? 'Not Delivered' : 'Delivered'}}</option>
                            <option value="0">Not Delivered</option>
                            <option value="1">Delivered</option>
                        </select>
                    </div>
                  
                </div>                           
                <div class="modal-footer">                 
                    <input type="hidden" name="_token" value="{{ Session::token() }}">  
                    <input name="_method" type="hidden" value="PUT">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
        </div>
        
    </form>
      </div>
    </div>
  </div>

  @section('scripts')
<script type="text/javascript">
    $('input[name="paid"]').on('keyup', function () {
        var paid = $(this).val();
        var total = $('input[name="total"]').val();
        var balance = total - paid;
        if(balance < 0){
            alert('Avoid Excess Payment Entry');
            $('input[name="paid"]').val("");
            $('input[name="balance"]').val("");
        }else{
            $('input[name="balance"]').val(balance);
        }                
    });

</script>
@endsection