@extends('layouts.admin')

@section('content')

<x-error></x-error>

<x-card>
	<div class="row">
		<div class="col-md-12">
			<h4 class="display-4">Nueva orden de servicio - Descripción del equipo</h4>
		</div>
	</div>

	<form action="{{ route('orderService.store', $client->slug) }}" method="POST">
		@csrf
		<div class="row mt-4">
			<div class="form-group col-md-4">
				<label for="team" class="form-control-label">Equipo</label>
				<input class="form-control" name="team" type="text" placeholder="Ejemplo: Gabinete, Monitor, etc." id="team" value="{{ old('team') }}">
			</div>
			<div class="form-group col-md-4">
				<label for="brand" class="form-control-label">Marca</label>
				<input class="form-control" name="brand" type="text" placeholder="Ingrese la marca del equipo" id="brand" value="{{ old('brand') }}">
			</div>
			<div class="form-group col-md-4">
				<label for="model" class="form-control-label">No. Serie o modelo (Opcional)</label>
				<input class="form-control" name="model" type="text" placeholder="Ingrese la serie o modelo del equipo" id="model" value="{{ old('model') }}">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="accesories" class="form-control-label">Accesorios (Opcional)</label>
				<input class="form-control" name="accesories" type="text" placeholder="Ingrese los accesorios del equipo" id="accesories" value="{{ old('accesories') }}">
			</div>
			<div class="form-group col-md-4">
				<label for="features" class="form-control-label">Características del equipo</label>
				<input class="form-control" name="features" type="text" placeholder="Ingrese las características del equipo" id="features" value="{{ old('features') }}">
			</div>
			<div class="form-group col-md-4">
				<label for="fault_report" class="form-control-label">Reporte de falla</label>
				<input class="form-control" name="fault_report" type="text" placeholder="Ingrese la falla conocida" id="fault_report" value="{{ old('fault_report') }}">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="observations" class="form-control-label">Observaciones (Opcional)</label>
				<input class="form-control" name="observations" type="text" placeholder="Ingrese las observaciones del equipo" id="observations" value="{{ old('observations') }}">
			</div>
			<div class="form-group col-md-4">
				<label for="solicited_service" class="form-control-label">Servicio solicitado</label>
				<input class="form-control" name="solicited_service" type="text" placeholder="Ingrese el servicio que solicitaron" id="solicited_service" value="{{ old('solicited_service') }}">
			</div>
			<div class="form-group col-md-4">
				<label for="user_id">Le atendió</label>
				<select class="form-control" id="user_id" name="user_id">
					@foreach($users as $user)
					<option value="{{ $user->id }}" {{ ( $user->id == Auth::user()->id) ? 'selected' : '' }}>{{ $user->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-4 pt-2">
				<button type="submit" class="btn btn-success btn-block mt-4">Guardar orden de servicio</button>
			</div>
		</div>


		{{-- <div class="row">
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="complete_maintenance" {{ old('complete_maintenance') ? 'checked' : null }} name="complete_maintenance">
					<label class="custom-control-label" for="complete_maintenance">Mantenimiento completo</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="preventive_maintenance" name="preventive_maintenance">
					<label class="custom-control-label" for="preventive_maintenance">Mantenimiento preventivo</label>
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="bios" name="bios">
					<label class="custom-control-label" for="bios">Cambio de pila/configuración de BIOS</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="virus" name="virus">
					<label class="custom-control-label" for="virus">Eliminación de virus</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="software_reinstallation" name="software_reinstallation">
					<label class="custom-control-label" for="software_reinstallation">Reinstalación de software</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="special_software" name="special_software">
					<label class="custom-control-label" for="special_software">Software especial</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="clean" name="clean">
					<label class="custom-control-label" for="clean">Limpieza/Aceleración</label>
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="printer_cleaning" name="printer_cleaning">
					<label class="custom-control-label" for="printer_cleaning">Mantenimiento a impresora</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="head_maintenance" name="head_maintenance">
					<label class="custom-control-label" for="head_maintenance">Mantenimiento de cabezales</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="hardware" name="hardware">
					<label class="custom-control-label" for="hardware">Cambio de piezas/ hardware</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="observation">Reporte técnico efectuado</label>
				<textarea class="form-control" rows="4" name="observations" resize="none" id="observation" name="observation"></textarea>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="special_remarks" class="form-control-label">Observaciones especiales</label>
				<input class="form-control" name="special_remarks" type="text" placeholder="Ingrese las observaciones del equipo" id="special_remarks">
			</div>
			<div class="form-group col-md-4">
				<label for="user_name">Le atendió</label>
				<select class="form-control" id="user_name" name="user_name">
					@foreach($users as $user)
					<option value="{{ $user->id }}" {{ ( $user->id == Auth::user()->id) ? 'selected' : '' }}>{{ $user->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group col-md-4">
				<label for="technical_name">Técnico que atendio</label>
				<select class="form-control" id="technical_name" name="technical_name">
					
					<option>Pablito</option>
					
				</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="price">Costo del servicio</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">$</span>
					</div>
					<input type="number" class="form-control" placeholder="Ingrese el costo del servicio" name="price" value="{{ old('price') }}" id="price">
					<div class="input-group-append">
						<span class="input-group-text">.00</span>
					</div>
				</div>
			</div>
			<div class="form-group col-md-4">
				<label for="delivery_date" class="form-control-label">Fecha de venta</label>
				<input class="form-control" name="delivery_date" type="date" value="{{ old('delivery_date', $date->format('d-m-Y')) }}" id="delivery_date">
			</div> --}}
		
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