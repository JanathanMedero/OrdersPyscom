@extends('layouts.admin')

@section('content')

<x-card>
	<div class="row">
		<div class="col-md-12">
			<h4 class="display-4">Datos del cliente</h4>
		</div>
	</div>
	<div class="row">
		<hr class="my-2">
	</div>
	<form>
		@csrf
		<div class="row">
			<div class="form-group col-md-6">
				<label for="name-input-text" class="form-control-label">Nombre del cliente</label>
				<input class="form-control" name="name" type="text" value="{{ $client->name }}" disabled>
			</div>
			<div class="form-group col-md-6">
				<label for="rfc-input-text" class="form-control-label">RFC del cliente (Opcional)</label>
				<input class="form-control" name="rfc" type="text" value="{{ $client->rfc }}" disabled>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="phone-input-text" class="form-control-label">Telefono de contacto</label>
				<input class="form-control" name="phone" type="tel" value="{{ $client->phone }}" disabled>
			</div>
			<div class="form-group col-md-6">
				<label for="street-input-text" class="form-control-label">Calle donde vive el cliente</label>
				<input class="form-control" name="street" type="text" value="{{ $client->street }}" disabled>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="suburb-input-text" class="form-control-label">Colonia donde vive el cliente</label>
				<input class="form-control" name="suburb" type="text" value="{{ $client->suburb }}" disabled>
			</div>
			<div class="form-group col-md-6">
				<label for="number-input-text" class="form-control-label">Número de domocilio donde vive el cliente</label>
				<input class="form-control" name="number" type="number" value="{{ $client->number }}" disabled>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="cp-input-text" class="form-control-label">Código postal donde vive el cliente</label>
				<input class="form-control" name="postal_code" type="number" value="{{ $client->postal_code }}" disabled>
			</div>
			<div class="col-md-8 d-flex justify-content-center align-items-center">
				<a class="btn btn-icon btn-info btn-block" type="button" href="{{ route('clients.edit', $client->slug) }}">
					<span class="btn-inner--icon"><i class="fas fa-user"></i></span>
					<span class="btn-inner--text">Editar Cliente</span>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p class="text-danger text-bold">Nota: Si hay algún dato erroneo, favor rectificar los datos.</p>
			</div>
		</div>
	</form>
</x-card>

@endsection