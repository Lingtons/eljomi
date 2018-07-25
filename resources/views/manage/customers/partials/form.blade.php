<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" >
			{!! Form::label('name', 'Name: ', ['class'=>'control-label']) !!}
			{!! Form::text('name', old('name'), ['class'=>'form-control mb-1"']) !!}
			@if ($errors->has('name'))
		   		<span class="help-block"> {{ $errors->first('name') }}</span>
		    @endif
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}" >
			{!! Form::label('nickname', 'Nickname: ', ['class'=>'control-label']) !!}
			{!! Form::text('nickname', old('nickname'), ['class'=>'form-control mb-1']) !!}

			@if ($errors->has('nickname'))
		   		<span class="help-block"> {{ $errors->first('nickname') }}</span>
		    @endif
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
			{!! Form::label('email', 'Email: ', ['class'=>'control-label']) !!}
			{!! Form::text('email', old('email'), ['class'=>'form-control mb-1"']) !!}

			@if ($errors->has('email'))
		   		<span class="help-block"> {{ $errors->first('email') }}</span>
		    @endif
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
			{!! Form::label('phone', 'Phone: ', ['class'=>'control-label']) !!}
			{!! Form::number('phone', old('phone'), ['class'=>'form-control mb-1"']) !!}

			@if ($errors->has('phone'))
		   		<span class="help-block"> {{ $errors->first('phone') }}</span>
		    @endif
		</div>
	</div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="row form-group">
            <div class="col col-md-4">
                <label class=" form-control-label">Gender: </label>
            </div>
            <div class="col-md-8">
            	<div class="form-check-inline form-check">
            	  <label class="form-check-label">
            	    <input type="radio" class="form-check-input" name="gender" id="optionsRadios1" value="Female" @if(isset($customer)){{ $customer->gender == 'Female' ? 'checked' : '' }} @endif>
            	    Female &nbsp
            	  <label class="form-check-label">
            	      <input type="radio" class="form-check-input" name="gender" id="optionsRadios2" value="Male" @if(isset($customer)){{ $customer->gender == 'Male' ? 'checked' : '' }} @endif>
            	      Male
            	   </label>
            	</div>
            </div>
         </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
        	{!! Form::label('dob', 'Date of Birth: ', ['class'=>'control-label']) !!}

        	@if ($errors->has('dob'))
            	<span class="help-block">{{ $errors->first('dob') }}</span>
            @endif
        	{!! Form::date('dob', old('dob'), ['class'=>'form-control ', 'placeholder'=>'Date of birth']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
        	{!! Form::label('type', 'Client Type: ', ['class'=>'control-label']) !!}
        	<select name="type" class="form-control mb-1" required>
        	<option value="">Select Client Type</option>
        	<option value="Individual"@if(isset($customer)) selected= "{{ $customer->type == 'Individual' ? 'selected' : '' }}" @endif>Individual</option>
        	<option value="Corporate" @if(isset($customer)) selected= "{{ $customer->type == 'Corporate' ? 'selected' : '' }}" @endif>Corporate</option>
        	</select>
        	@if ($errors->has('type'))
            	<span class="help-block">{{ $errors->first('type') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}" >
        	{!! Form::label('address', 'Address: ', ['class'=>'control-label']) !!}
        	{!! Form::textArea('address', old('address'), ['class'=>'form-control mb-1"']) !!}

        	@if ($errors->has('address'))
           		<span class="help-block"> {{ $errors->first('address') }}</span>
            @endif
        </div>
    </div>    
</div>

<div>
    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
        <span id="payment-button-amount">{{ $submit}}</span>
    </button>
</div>
