@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise hay campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
 
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nuevo Biblioteca</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('bibliotecas.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="form-group">
									<div class="col-md">
										<input type="text" name="nombreBiblioteca" id="nombreBiblioteca" class="form-control input-sm" placeholder="Nombre De La Biblioteca">
									</div>
							</div>

							<div class="form-group">
									<input type="text" name="ciudad" id="ciudad" class="form-control input-sm" placeholder="Ciudad">
							</div>
							
 
							<div class="form-group">
								<div class="col-md">
										<input type="number" name="numeroTelefonico" id="numeroTelefonico" class="form-control input-sm" placeholder="Numero Telefonico">
								</div>
							</div>

							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('bibliotecas.store') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection