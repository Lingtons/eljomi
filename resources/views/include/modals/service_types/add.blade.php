<!-- Modal -->
<div class="modal fade" id="addTypeModal" tabindex="-1" role="dialog" aria-labelledby="addTypeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryModalLabel">Add New Service Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="{{ route('types.store') }}">
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
              <button type="submit" class="btn btn-success">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           
          </div>
      </div>
      
      </form>
    </div>
  </div>
</div>