<!-- Modal -->
<div class="modal fade" id="addValueModal{{ $preference->id }}" tabindex="-1" role="dialog" aria-labelledby="editPreferenceModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPreferenceModalLabel">Add value for {{ $preference->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" method="POST" action="{{ route('preferences_value') }}">
              {{ csrf_field() }}    
              <div class="form-group">
                <div class="col-md-12">
                  <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name"
                    required> @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                  @endif
                </div>
                
              </div>                           
              <div class="modal-footer">
                  <input type="hidden" name="id" value="{{$preference->id}}">
                  <input type="hidden" name="_token" value="{{ Session::token() }}">  
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
              </div>
      </div>
      
  </form>
    </div>
  </div>
</div>