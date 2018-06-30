<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" >

	{!! Form::label('name', 'Name: ', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}

	<div class="col-md-6 col-sm-6 col-xs-12">

		{!! Form::text('name', old('name'), ['class'=>'form-control col-md-7 col-xs-12"']) !!}

		@if ($errors->has('name'))
	   		<span class="help-block"> {{ $errors->first('name') }}</span>
	    @endif

	</div>

</div>

<div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}" >

	{!! Form::label('nickname', 'Nickname: ', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}

	<div class="col-md-6 col-sm-6 col-xs-12">

		{!! Form::text('nickname', old('nickname'), ['class'=>'form-control col-md-7 col-xs-12"']) !!}

		@if ($errors->has('nickname'))
	   		<span class="help-block"> {{ $errors->first('nickname') }}</span>
	    @endif

	</div>

</div>

<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">

	{!! Form::label('phone', 'Phone: ', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}

	<div class="col-md-6 col-sm-6 col-xs-12">

		{!! Form::number('phone', old('phone'), ['class'=>'form-control col-md-7 col-xs-12"']) !!}

		@if ($errors->has('phone'))
	   		<span class="help-block"> {{ $errors->first('phone') }}</span>
	    @endif

	</div>

</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" >

	{!! Form::label('email', 'Email: ', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}

	<div class="col-md-6 col-sm-6 col-xs-12">

		{!! Form::text('email', old('email'), ['class'=>'form-control col-md-7 col-xs-12"']) !!}

		@if ($errors->has('email'))
	   		<span class="help-block"> {{ $errors->first('email') }}</span>
	    @endif

	</div>

</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}" >

	{!! Form::label('address', 'Address: ', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}

	<div class="col-md-6 col-sm-6 col-xs-12">

		{!! Form::textArea('address', old('address'), ['class'=>'form-control col-md-7 col-xs-12"']) !!}

		@if ($errors->has('address'))
	   		<span class="help-block"> {{ $errors->first('address') }}</span>
	    @endif

	</div>
</div>

<fieldset class="form-group">
    <legend class="col-md-2 col-md-offset-1">Gender</legend>
    <div class="form-check">
      <label class="form-check-label col-md-3 col-sm-3 col-xs-12">
        <input type="radio" class="form-check-input" name="gender" id="optionsRadios1" value="Female" @if(isset($customer)){{ $customer->gender == 'Female' ? 'checked' : '' }} @endif>
        Female
      </label>
    </div>
    <div class="form-check">
    <label class="form-check-label col-md-3 col-sm-3 col-xs-12">
        <input type="radio" class="form-check-input" name="gender" id="optionsRadios2" value="Male" @if(isset($customer)){{ $customer->gender == 'Male' ? 'checked' : '' }} @endif>
        Male
      </label>
    </div>
 </fieldset>

<div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">

	{!! Form::label('dob', 'Date of Birth: ', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}

	@if ($errors->has('dob'))
    	<span class="help-block">{{ $errors->first('dob') }}</span>
    @endif
    
    <div class="col-md-6 col-sm-6 col-xs-12">
		{!! Form::date('dob', old('dob'), ['class'=>'form-control col-md-4 col-xs-12', 'placeholder'=>'Date of birth', 'required']) !!}
	</div>

</div>


<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">

	{!! Form::label('type', 'Client Type: ', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}

	<div class="col-md-6 col-sm-6 col-xs-12">

<select name="type" class="form-control col-md-7 col-xs-12" required>
<option value="">Select Client Type</option>
<option value="Individual">Individual</option>
<option value="Corporate">Corporate</option>
</select>
		@if ($errors->has('type'))
	    	<span class="help-block">{{ $errors->first('type') }}</span>
	    @endif

	</div>
</div>

<div class="form-group">

	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

		{!! Form::submit($submit, ['class'=>'btn btn-success'])!!}

    </div>

</div>
