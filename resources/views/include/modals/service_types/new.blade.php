<!-- Modal -->
<div class="modal fade" id="newServiceModal" tabindex="-1" role="dialog" aria-labelledby="newServiceModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newServiceModalLabel">New Transaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">          
          <p class="text-center">Choose Transaction Type</p>
        <div class="row">          
          <div class="col-6 text-center p-5">
              <a href="{{route('transactions.create', 1)}}"> <img src=" {{asset('images/icon/individual.png')}}" alt=""></a>   
             <h5 class="mt-2">Individual</h5> 
          </div>
          <div class="col-6 text-center p-5">
              <a href="{{route('transactions.create', 2)}}"> <img src=" {{asset('images/icon/corporate.png')}}" alt=""></a>              
              <h5 class="mt-2">Corporate</h5>
            </div>
        </div>

          <div class="modal-footer">              
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           
          </div>
      </div>
      
          </div>
  </div>
</div>