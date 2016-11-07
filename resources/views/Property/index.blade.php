@extends('Layouts.Layout')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h1 class="page-header">Propiedades</h1>
	</div>
	
</div>
<div class="row">
	<div class="col-md-12">
	<a href="{{action('PropertyController@create')}}" class="btn btn-success pull-right"> Crear propiedad</a>
		<table class="table table-hover">
			<thead>
				<th>Titulo</th>
				<th>Direccion</th>
				<th>ciudad</th>
				<th>Condado</th>
				<th>País</th>
				<th>Estado</th>
				<th>acciones</th>
			</thead>
			<tbody>
				@foreach($properties as $property)
				<tr>
					<td>{{$property->title}}</td>
					<td>{{$property->address}}</td>
					<td>{{$property->town}}</td>
					<td>{{$property->county}}</td>
					<td>{{$property->country}}</td>
					<td>{{$property->state->name}}</td>
					<td><a href="{{action('PropertyController@edit',array('id'=>$property->id))}}" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a> <a href="{{action('PropertyController@deletor',array('id'=>$property->id))}}" class="btn btn-danger"><i class="fa fa-times-circle" aria-hidden="true"></i> Eliminar</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop