@extends('layouts.default')

@section('content')

 <!-- display success message -->
@if (Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<div class="panel panel-success">
		<div class="panel-heading">Outlet Stock</div>
		<form action="/outlet" method="post" enctype="multipart/form-data" onsubmit="return showLoad('Submit?')">
		{{ csrf_field() }}
		<div class="panel-body">

      <div class="form-group {{ $errors->has('stype') ? 'has-error' : '' }}">
  			<label class="label-control">Stock Type</label>
  			<select name="stype" class="form-control" >
  				<option value=''>Please choose stock type</option>
  				<option value='T-Shirt'>T-Shirt</option>
  				<option value='Sweater'>Sweater</option>
  				<option value='Jacket'>Jacket</option>
  				<option value='Formal Shirt'>Formal Shirt</option>
  			</select>
         @if ($errors->has('stype'))
            <span class="help-block alert alert-danger">
                <strong>{{ $errors->first('stype') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('sname') ? 'has-error' : '' }}">
  			<label class="label-control">Stock Name</label>
  			<select name="sname" class="form-control" >
  				<option value=''>Please choose stock name</option>
				  @foreach($roles as $key => $role)
      <option value="{{ $role }} "> {{ $role }} </option>
    @endforeach
			</select>
         @if ($errors->has('sname'))
            <span class="help-block alert alert-danger">
                <strong>{{ $errors->first('sname') }}</strong>
            </span>
        @endif
      </div>

      <!--<div class="form-group {{ $errors->has('sname') ? 'has-error' : '' }}">
  			<label class="label-control">Stock Name/Description</label>
  			<input type="text" name="sname" class="form-control" placeholder="Please input stock name/description" value="{{ old('sname') }}" required="required">
  			@if ($errors->has('sname'))
            <span class="help-block alert alert-danger">
                <strong>{{ $errors->first('sname') }}</strong>
            </span>
        @endif
    </div>-->

			<div class="row">
				<div class="col-md-3">
          <div class="form-group {{ $errors->has('ssize') ? 'has-error' : '' }}">
  					<label class="label-control">Stock Size</label>
  					<select name="ssize" class="form-control" required="required">
  						<option value=''>Please choose stock size</option>
  						<option value='S'>S</option>
  						<option value='M'>M</option>
  						<option value='L'>L</option>
  						<option value='XL'>XL</option>
  					</select>
  					@if ($errors->has('ssize'))
                <span class="help-block alert alert-danger">
                    <strong>{{ $errors->first('ssize') }}</strong>
                </span>
            @endif
          </div>
				</div>


				<div class="col-md-2">
          <div class="form-group {{ $errors->has('squantity') ? 'has-error' : '' }}">
  					<label class="label-control">Stock Quantity</label>
  					<input type="number" name="squantity" class="form-control" required="required" placeholder="Insert quantity" value="{{ old('sname') }}">
  					@if ($errors->has('squantity'))
                <span class="help-block alert alert-danger">
                    <strong>{{ $errors->first('squantity') }}</strong>
                </span>
            @endif
          </div>
				</div>
			</div>
			<br>

	</div>
	<div class="panel-footer">
		<button type="submit" name="submit" class="btn btn-success">OUT</button>
		<button type="reset" name="reset" class="btn btn-warning" onclick="return confirm('Reset/clear form?');">Reset</button>
	</div>
	</form>
</div>


@stop
