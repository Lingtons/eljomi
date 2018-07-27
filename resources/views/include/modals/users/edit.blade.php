<!-- Modal -->
<div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editTypeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">Edit  {{ $user->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" method="POST" action="{{ route('users.update', $user->id) }}">
              {{ csrf_field() }}    
              <div class="form-group">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-12">                                    
                              <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required>

                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <input id="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ $user->email }}" required> 
                              @if ($errors->has('email'))
                              <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                              </span>
                              @endif
                          </div>
                      </div>

                      <div class="row">
                            <div class="col-md-12">              
                                    <select name="type" id="type" required class="form-control">
                                      <option selected>{{ $user->type }}</option>
                                      <option>Administrator</option>
                                      <option>Marketer</option>
                                      <option>Factory</option>
                                    </select>
                                </div>
                        </div>
                  </div>
              </div>
        </div>                            
        <div class="modal-footer">
            <input type="hidden" name="_token" value="{{ Session::token() }}">  
            <input name="_method" type="hidden" value="PUT">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save changes</button>
        </div>
    </div>
      
      </form>
    </div>
  </div>
</div>