@extends('layouts.admin')

@section('content')

<x-error></x-error>

<x-card>
	<div class="row">
		<div class="col-md-8">
			<h4 class="display-4">Orden de servicio: {{ $order->id }} - {{ $order->Client->name }}</h4>
		</div>
		<div class="col-md-4 d-flex justify-content-end">
			<a type="button" href="{{ route('pdfService.show', $order->folio) }}" class="btn btn-warning text-white" target="_blank">
				Imprimir orden de servicio
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<ul>
				<li><strong>Equipo:</strong> {{ $order->equipment->team }}</li>
				@if($order->equipment->brand)
				<li><strong>Modelo o marca:</strong> {{ $order->equipment->brand }}</li>
				@endif
				<li><strong>Características:</strong> {{ $order->equipment->features }}</li>
				<li><strong>Servicio solicitado:</strong> {{ $order->equipment->solicited_service }}</li>
			</ul>
		</div>
	</div>
</x-card>

<x-card>
	<div class="row">
		<div class="col-md-12">
			<h4 class="display-4">Editar orden de servicio</h4>
		</div>
	</div>

	<form action="{{ route('orderService.update', $order->folio) }}" method="POST">
		@method("PUT")
		@csrf
		<div class="row mt-4">
			<div class="form-group col-md-4">
				<label for="team" class="form-control-label">Equipo</label>
				<input class="form-control" name="team" type="text" placeholder="Ejemplo: Gabinete, Monitor, etc." id="team" value="{{ $order->equipment->team }}">
			</div>
			<div class="form-group col-md-4">
				<label for="brand" class="form-control-label">Marca</label>
				<input class="form-control" name="brand" type="text" placeholder="Ingrese la marca del equipo" id="brand" value="{{ $order->equipment->brand }}">
			</div>
			<div class="form-group col-md-4">
				<label for="model" class="form-control-label">No. Serie o modelo (Opcional)</label>
				<input class="form-control" name="model" type="text" placeholder="Ingrese la serie o modelo del equipo" id="model" value="{{ $order->equipment->model }}">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="accesories" class="form-control-label">Accesorios (Opcional)</label>
				<input class="form-control" name="accesories" type="text" placeholder="Ingrese los accesorios del equipo" id="accesories" value="{{ $order->equipment->accessories }}">
			</div>
			<div class="form-group col-md-4">
				<label for="features" class="form-control-label">Características del equipo</label>
				<input class="form-control" name="features" type="text" placeholder="Ingrese las características del equipo" id="features" value="{{ $order->equipment->features }}">
			</div>
			<div class="form-group col-md-4">
				<label for="fault_report" class="form-control-label">Reporte de falla</label>
				<input class="form-control" name="fault_report" type="text" placeholder="Ingrese la falla conocida" id="fault_report" value="{{ $order->equipment->fault_report }}">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="observations" class="form-control-label">Observaciones (Opcional)</label>
				<input class="form-control" name="observations" type="text" placeholder="Ingrese las observaciones del equipo" id="observations" value="{{ $order->equipment->observations }}">
			</div>
			<div class="form-group col-md-4">
				<label for="solicited_service" class="form-control-label">Servicio solicitado</label>
				<input class="form-control" name="solicited_service" type="text" placeholder="Ingrese el servicio que solicitaron" id="solicited_service" value="{{ $order->equipment->solicited_service }}">
			</div>
			<div class="form-group col-md-4">
				<label for="office_id">Seleccione la sucursal</label>
				<select class="form-control" id="office_id" name="office_id">
					@foreach($offices as $office)
					<option value="{{ $office->id }}">{{ $office->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-4 pt-2">
				<button type="submit" class="btn btn-info btn-block mt-4">Actualizar orden de servicio</button>
			</div>
		</div>
	</form>

</x-card>


@endsection