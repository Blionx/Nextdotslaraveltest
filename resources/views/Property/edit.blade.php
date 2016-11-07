@extends('Layouts.Layout')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h1 class="page-header">EditarPropiedad</h1>
	</div>
	
</div>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="form-group">
				<a href="{{action('PropertyController@index')}}" class="btn btn-primary pull-left"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Regresar</a>
			</div>
		</div>
		<div class="col-md-12"> &nbsp;</div>
		<form action="{{action('PropertyController@editor',array('id'=>$props->id))}}" method="post">
			{{ csrf_field() }}
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="title" id="title" placeholder="Titulo" class="form-control" value="{{$props->title}}" required>
				</div>
				<div class="form-group">
					<input type="text" name="address" placeholder="Direccion" class="form-control" value="{{$props->address}}" required>
				</div>
				<div class="form-group">
					<input type="text" name="town" placeholder="Ciudad" class="form-control" value="{{$props->town}}" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="county" placeholder="Condado" class="form-control" value="{{$props->county}}" required>
				</div>
				<div class="form-group">
					<input type="text" name="country" class="form-control" placeholder="País" value="{{$props->country}}" required>
				</div>
				<div class="form-group">
					<select name="state_id" class="form-control" required>
						<optgroup label="Estados">
							@foreach($states as $state)
								<option value="{{$state->id}}" @if($props->state_id == $state->id) selected="selected" @endif >{{$state->name}}</option>
							@endforeach
						</optgroup>
					</select>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<textarea class="form-control" name="description" placeholder="Descripcion">{{$props->description}}</textarea>
				</div>
			</div>
			<div class="col-md-12">
				<h3>Facilities</h3>
				<div class="form-group">
					@foreach($facilities as $facil)
						<input type="checkbox" name="facilities_{{$facil->id}}" value="{{$facil->id}}" class="form-control"@foreach($props->fac as $fac)  @if($fac->facility_id == $facil->id) checked @endif @endforeach
						> {{$facil->name}}
					@endforeach
				</div>
			</div>
			<div class="col-md-12">
				<button class="btn btn-success pull-right"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Actualizar</button>
			</div>
		</form>
	</div>
</div>
@stop