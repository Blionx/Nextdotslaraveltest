@extends('Layouts.Layout')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h1 class="page-header">Nueva Propiedad</h1>
	</div>
	
</div>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="form-group">
				<a href="{{action('PropertyController@index')}}" class="btn btn-primary pull-left"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>  Regresar</a>
			</div>
		</div>
		<div class="col-md-12"> &nbsp;</div>
		<form action="{{action('PropertyController@creator')}}" method="post">
			{{ csrf_field() }}
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="title" id="title" placeholder="Titulo" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="address" placeholder="Direccion" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="town" placeholder="Ciudad" class="form-control">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="county" placeholder="Condado" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="country" class="form-control" placeholder="País">
				</div>
				<div class="form-group">
					<select name="state_id" class="form-control">
						<optgroup label="Estados">
							@foreach($states as $state)
								<option value="{{$state->id}}">{{$state->name}}</option>
							@endforeach
						</optgroup>
					</select>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<textarea class="form-control" name="description" placeholder="Descripcion"></textarea>
				</div>
			</div>
			<div class="col-md-12">
				<h3>Facilities</h3>
				<div class="form-group">
					@foreach($facilities as $facil)
						<input type="checkbox" name="facilities_{{$facil->id}}" value="{{$facil->id}}" class="form-control"> {{$facil->name}}
					@endforeach
				</div>
			</div>
			<div class="col-md-12">
				<button class="btn btn-success pull-right"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Guardar</button>
			</div>
		</form>
	</div>
</div>
@stop