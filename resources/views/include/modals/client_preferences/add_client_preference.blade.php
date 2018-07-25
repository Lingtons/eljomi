<!-- Modal -->
<div class="modal fade" id="addClientPreference{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="addClientPreference" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addClientPreference">Add value for {{ $customer->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" method="POST" action="{{ route('add_client_preference') }}">
              {{ csrf_field() }}    
              <div class="form-group">
                <div class="col-md-12">
                  <select name="preference" class="form-control " required>
                  @foreach ($preferences as $preference)
                      <option value="{{$preference->id}}">{{ $preference->name }}</option>
                  @endforeach
                  </select>

                    @if ($errors->has('preference'))
                  <span class="help-block">
                    <strong>{{ $errors->first('preference') }}</strong>
                  </span>
                  @endif
                </div>
                
              </div>   
              <div class="form-group">
                <div class="col-md-12">
                  <select name="client_preference" class="form-control " required>
                    <option value="">Select Answer</option>
                      @foreach( \DB::table('preference_values')->select('name')->get() as $el)
                        <option>{{$el->name}}</option>
                      @endforeach
                      
                  </select>

                    @if ($errors->has('client_preference'))
                  <span class="help-block">
                    <strong>{{ $errors->first('client_preference') }}</strong>
                  </span>
                  @endif
                </div>
                
              </div>                         
              <div class="modal-footer">
                  <input type="hidden" name="id" value="{{$customer->id}}">
                  <input type="hidden" name="_token" value="{{ Session::token() }}">  
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
              </div>
      </div>
      
  </form>
    </div>
  </div>
</div>