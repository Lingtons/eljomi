<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}" >
			{!! Form::label('reason', 'Reason: ', ['class'=>'control-label']) !!}
			{!! Form::text('reason', old('reason'), ['class'=>'form-control mb-1']) !!}

			@if ($errors->has('reason'))
		   		<span class="help-block"> {{ $errors->first('reason') }}</span>
		    @endif
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
			{!! Form::label('amount', 'Amount: ', ['class'=>'control-label']) !!}
			{!! Form::number('amount', old('amount'), ['class'=>'form-control mb-1"']) !!}

			@if ($errors->has('amount'))
		   		<span class="help-block"> {{ $errors->first('amount') }}</span>
		    @endif
		</div>
	</div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('date_occurred') ? ' has-error' : '' }}">
        	{!! Form::label('date_occurred', 'Date Occured: ', ['class'=>'control-label']) !!}

        	@if ($errors->has('date_occurred'))
            	<span class="help-block">{{ $errors->first('date_occurred') }}</span>
            @endif
        	{!! Form::date('date_occurred', old('date_occurred'), ['class'=>'form-control ', 'placeholder'=>'Date Occured', 'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        
        {!! Form::label('expense_category_id', 'expense_category_id: ', ['class'=>'control-label']) !!}

            {!! Form::select('expense_category_id', $expense_categories, old('expense_category_id'), ['class'=>'form-control  mb-1']) !!}

            @if ($errors->has('expense_category_id'))
                <span class="help-block">{{ $errors->first('expense_category_id') }}</span>
            @endif
    </div>
</div>

<div class="row">
	<div class="col-md-12">
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}" >
            {!! Form::label('description', 'Description: ', ['class'=>'control-label']) !!}
            {!! Form::textArea('description', old('description'), ['class'=>'form-control mb-1"']) !!}

            @if ($errors->has('description'))
                <span class="help-block"> {{ $errors->first('description') }}</span>
            @endif
        </div>
    </div>
</div>

<div>
    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
        <span id="payment-button-amount">{{ $submit}}</span>
    </button>
</div>
