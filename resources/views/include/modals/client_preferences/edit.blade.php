<!-- Modal -->
<div class="modal fade" id="editPreferenceModal{{ $preference->id }}" tabindex="-1" role="dialog" aria-labelledby="editPreferenceModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPreferenceModalLabel">Edit {{ $preference->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" method="POST" action="{{ route('preferences.update', $preference->id) }}">
              {{ csrf_field() }}    
              <div class="form-group">
                  <div class="col-md-12">                                    
                      <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $preference->name }}" required>

                      @if ($errors->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
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