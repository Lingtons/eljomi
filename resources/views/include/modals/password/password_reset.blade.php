<!-- Modal -->
<div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resetPasswordModalLabel">Reset Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="{{route('reset_password')}}">
          {{ csrf_field() }}
          <div class="form-group">

            <div class="col-md-12">
              <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password"
                required> 
            </div>
            <div class="col-md-12">
              <input id="password_confirmation" type="password" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="Confirm password"
                required>
            </div>
          </div>
          <div class="modal-footer">
              <input type="hidden" name="_token" value="{{ Session::token() }}">  
              <input name="_method" type="hidden" value="PUT">
              <button type="submit" class="btn btn-success">Reset Password</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           
          </div>
      </div>
      
      </form>
    </div>
  </div>
</div>