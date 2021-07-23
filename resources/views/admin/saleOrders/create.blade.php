@extends('layouts.admin')

@section('content')

<x-error></x-error>

<x-card>
	<div class="row">
		<div class="col-md-12">
			<h4 class="display-4">Nueva Orden de Venta</h4>
		</div>
	</div>
	<div class="row">
		<hr class="my-2">
	</div>

	<form action="{{ route('orderSale.store', $client->slug) }}" method="POST">
		@csrf

		<div id="mainContent">

			<div id="newProduct">
				<div class="row my-2">
					<div class="form-group col-md-3">
						<input class="form-control" type="text" id="name-product" placeholder="Ingrese el nombre del producto" name="name" value="{{ old('name') }}">
					</div>
					<div class="form-group col-md-3">
						<input class="form-control" type="number" id="example-number-input" placeholder="Ingrese la cantidad" min="1" name="quantity" value="{{ old('quantity') }}">
					</div>
					<div class="form-group col-md-3 mb-0">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="text" class="form-control" placeholder="Ingrese el precio unitario" name="unit_price">
							<div class="input-group-append">
								<span class="input-group-text">.00</span>
							</div>
						</div>
					</div>
					<div class="form-group col-md-3 mb-0">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="text" class="form-control" placeholder="Ingrese el precio total NETO" name="net_price" value="{{ old('net_price') }}">
							<div class="input-group-append">
								<span class="input-group-text">.00</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="editor">Descripción del Producto</label>
						<textarea class="form-control" rows="5" name="description" id="editor">
							{{ old('description') }}
						</textarea>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="observation">Observaciones (Opcional)</label>
						<textarea class="form-control" rows="4" name="observations" resize="none" id="observation"></textarea>
					</div>
				</div>
			</div>
			
		</div>

		<div class="row">
			<div class="form-group col-md-4">
				<label for="date_of_sale" class="form-control-label">Fecha de venta</label>
				<input class="form-control" name="date_of_sale" type="date" value="{{ old('date_of_sale', $date->format('d-m-Y')) }}" id="date_of_sale">
			</div>
			<div class="form-group col-md-4">
				<label for="id_employee">Vendio</label>
				<select class="form-control" id="id_employee" name="employee">
					@foreach($users as $user)
					<option value="{{ $user->id }}" {{ ( $user->id == Auth::user()->id) ? 'selected' : '' }}>{{ $user->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group col-md-4">
				<label for="warranty">Garantía</label>
				<input class="form-control" type="text" id="warranty" placeholder="Ingrese la garantía del producto" name="warranty" value="{{ old('warranty') }}">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-success">Terminar Orden</button>
			</div>
		</div>
	</form>

</x-card>

<x-card>
	<div class="row">
		<div class="col">
			<h4 class="display-4">Datos del cliente</h4>
		</div>
		<div class="col">
			<p class="text-danger text-bold">Nota: Si hay algún dato erroneo, favor rectificar los datos.</p>
		</div>
	</div>
	<div class="row">
		<hr class="my-2">
	</div>
	<form>
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
	</form>
</x-card>

@endsection

@section('extra-js')
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'editor' );
</script>

@endsection