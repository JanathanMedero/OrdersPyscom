@extends('layouts.admin')

@section('content')

<x-card>
	<div class="row">
		<div class="col-md-12">
			<h4 class="display-4 mb-0">Datos de la orden</h4>
		</div>
	</div>
	<div class="row">
		<hr class="my-2">
	</div>
	<form action="{{ route('clients.update', $order->client->slug) }}" method="POST">
		@method('PUT')
		@csrf
		<div class="row">
			<div class="form-group col-md-6">
				<label for="name-input-text" class="form-control-label">Ingrese el nombre del cliente</label>
				<input class="form-control" name="name" type="text" id="name-input-text" placeholder="Ingrese el nombre del cliente" value="{{ $order->client->name }}">
			</div>
			<div class="form-group col-md-6">
				<label for="rfc-input-text" class="form-control-label">Ingrese el RFC (Opcional)</label>
				<input class="form-control" name="rfc" type="text" id="rfc-input-text" placeholder="Ingrese el RFC del cliente" value="{{ $order->client->rfc }}">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="phone-input-text" class="form-control-label">Telefono de contacto</label>
				<input class="form-control" name="phone" type="tel" id="phone-input-text" placeholder="Ingrese un número telefónico para contactar al cliente" value="{{ $order->client->phone }}">
			</div>
			<div class="form-group col-md-6">
				<label for="street-input-text" class="form-control-label">Ingrese la calle (Opcional)</label>
				<input class="form-control" name="street" type="text" id="street-input-text" placeholder="Ingrese la calle del cliente" value="{{ $order->client->street }}">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="suburb-input-text" class="form-control-label">Ingresa la colonia (Opcional)</label>
				<input class="form-control" name="suburb" type="text" id="suburb-input-text" placeholder="Ingrese la colonia del cliente" value="{{ $order->client->suburb }}">
			</div>
			<div class="form-group col-md-6">
				<label for="number-input-text" class="form-control-label">Ingresa el número de domocilio (Opcional)</label>
				<input class="form-control" name="number" type="number" id="number-input-text" placeholder="Ingresa el número de domocilio del cliente" value="{{ $order->client->number }}">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="cp-input-text" class="form-control-label">Ingrese el código postal (Opcional)</label>
				<input class="form-control" name="postal_code" type="number" id="cp-input-text" placeholder="Ingrese la calle del cliente" value="{{ $order->client->postal_code }}">
			</div>
			<div class="form-group col-md-6">
				<label for="office_id">Seleccione la sucursal</label>
				<select class="form-control" id="office_id" name="office_id">
					@foreach($offices as $office)
					<option value="{{ $office->id }}">{{ $office->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<button class="btn btn-icon btn-info" type="submit">
					<span class="btn-inner--text">Actualizar Orden</span>
				</button>
			</div>
		</div>
	</form>
</x-card>
@endsection