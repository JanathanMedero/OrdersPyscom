@extends('layouts.admin')

@section('content')

<x-error></x-error>

<x-card>
	<div class="row">
		<div class="col-md-8">
			<h4 class="display-4">Orden de servicio: {{ $order->folio }} - {{ $order->Client->name }}</h4>
		</div>
		<div class="col-md-4 d-flex justify-content-end">
			<a type="button" class="btn btn-info text-white" href="{{ route('orderService.edit', $order->folio) }}">
				<span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
				<span class="btn-inner--text">Editar Orden</span>
			</a>
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

@if($service)

	<x-card>
	<div class="row">
		<div class="col-md-8">
			<h4 class="display-4 mb-4">Reporte de orden de servicio</h4>
		</div>
	</div>
	<form action="{{ route('orderService.updateEquipment', ['folio' => $order->folio, 'id' => $order->equipment->id]) }}" method="POST">
		@method("PUT")
		@csrf
		<div class="row mt-2">
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="complete_maintenance" {{ old('complete_maintenance') ? 'checked' : null }} name="complete_maintenance" {{  ($service->complete_maintenance == true ? ' checked' : '') }}>
					<label class="custom-control-label" for="complete_maintenance">Mantenimiento completo</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="preventive_maintenance" name="preventive_maintenance" {{ old('preventive_maintenance') ? 'checked' : null }} {{  ($service->preventive_maintenance == true ? ' checked' : '') }}>
					<label class="custom-control-label" for="preventive_maintenance">Mantenimiento preventivo</label>
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="bios" name="bios" {{ old('bios') ? 'checked' : null }} {{  ($service->bios == true ? ' checked' : '') }}>
					<label class="custom-control-label" for="bios">Cambio de pila/configuración de BIOS</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="virus" name="virus" {{ old('virus') ? 'checked' : null }} {{  ($service->virus == true ? ' checked' : '') }}>
					<label class="custom-control-label" for="virus">Eliminación de virus</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="software_reinstallation" name="software_reinstallation" {{ old('software_reinstallation') ? 'checked' : null }} {{  ($service->software_reinstallation == true ? ' checked' : '') }}>
					<label class="custom-control-label" for="software_reinstallation">Reinstalación de software</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="special_software" name="special_software" {{ old('special_software') ? 'checked' : null }} {{  ($service->special_software == true ? ' checked' : '') }}>
					<label class="custom-control-label" for="special_software">Software especial</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="clean" name="clean" {{ old('clean') ? 'checked' : null }} {{  ($service->clean == true ? ' checked' : '') }}>
					<label class="custom-control-label" for="clean">Limpieza/Aceleración</label>
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="printer_cleaning" name="printer_cleaning" {{ old('printer_cleaning') ? 'checked' : null }} {{  ($service->printer_cleaning == true ? ' checked' : '') }}>
					<label class="custom-control-label" for="printer_cleaning">Mantenimiento a impresora</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="head_maintenance" name="head_maintenance" {{ old('head_maintenance') ? 'checked' : null }} {{  ($service->head_maintenance == true ? ' checked' : '') }}>
					<label class="custom-control-label" for="head_maintenance">Mantenimiento de cabezales</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="hardware" name="hardware" {{ old('hardware') ? 'checked' : null }} {{  ($service->hardware == true ? ' checked' : '') }}>
					<label class="custom-control-label" for="hardware">Cambio de piezas/ hardware</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="technical_report">Reporte técnico efectuado</label>
				<textarea class="form-control" rows="4" name="technical_report" resize="none" id="technical_report">{{ $order->technical_report }}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="special_remarks" class="form-control-label">Observaciones especiales (Opcional)</label>
				<input class="form-control" name="special_remarks" type="text" placeholder="Ingrese las observaciones del equipo" id="special_remarks" {{ old('special_remarks') }} value="{{ $order->special_remarks }}">
			</div>
			<div class="form-group col-md-4">
				<label for="user_name">Empleado que atendio</label>
				<select class="form-control" id="user_name" name="user_id">
					@foreach($users as $user)
					<option value="{{ $user->id }}" {{ $user->id == $order->attention_id ? 'selected' : '' }}>{{ $user->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group col-md-4">
				<label for="price">Costo del servicio</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">$</span>
					</div>
					<input type="number" class="form-control" placeholder="Ingrese el costo del servicio" name="price" value="{{ $order->price }}" id="price">
					<div class="input-group-append">
						<span class="input-group-text">.00</span>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="delivery_date" class="form-control-label">Fecha de entrega {{ $order->delivery_date->format('d-m-Y') }}</label>
				<input class="form-control" name="delivery_date" type="date" value="{{ $order->delivery_date->format('d-m-Y') }}" id="delivery_date">
			</div>
			<div class="form-group col-md-4 pt-4">
				<button type="submit" class="btn btn-success btn-block mt-2">Actualizar reporte</button>
			</div>
		</form>
	</x-card>

@else

<x-card>
	<div class="row">
		<div class="col-md-8">
			<h4 class="display-4 mb-4">Reporte de orden de servicio</h4>
		</div>
	</div>
	<form action="{{ route('orderService.storeEquipment', ['folio' => $order->folio, 'id' => $order->equipment->id]) }}" method="POST">
		@csrf
		<div class="row mt-2">
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="complete_maintenance" {{ old('complete_maintenance') ? 'checked' : null }} name="complete_maintenance">
					<label class="custom-control-label" for="complete_maintenance">Mantenimiento completo</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="preventive_maintenance" name="preventive_maintenance" {{ old('preventive_maintenance') ? 'checked' : null }}>
					<label class="custom-control-label" for="preventive_maintenance">Mantenimiento preventivo</label>
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="bios" name="bios" {{ old('bios') ? 'checked' : null }}>
					<label class="custom-control-label" for="bios">Cambio de pila/configuración de BIOS</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="virus" name="virus" {{ old('virus') ? 'checked' : null }}>
					<label class="custom-control-label" for="virus">Eliminación de virus</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="software_reinstallation" name="software_reinstallation" {{ old('software_reinstallation') ? 'checked' : null }}>
					<label class="custom-control-label" for="software_reinstallation">Reinstalación de software</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="special_software" name="special_software" {{ old('special_software') ? 'checked' : null }}>
					<label class="custom-control-label" for="special_software">Software especial</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="clean" name="clean" {{ old('clean') ? 'checked' : null }}>
					<label class="custom-control-label" for="clean">Limpieza/Aceleración</label>
				</div>
			</div>
			<div class="form-group col-md-3">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="printer_cleaning" name="printer_cleaning" {{ old('printer_cleaning') ? 'checked' : null }}>
					<label class="custom-control-label" for="printer_cleaning">Mantenimiento a impresora</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="head_maintenance" name="head_maintenance" {{ old('head_maintenance') ? 'checked' : null }}>
					<label class="custom-control-label" for="head_maintenance">Mantenimiento de cabezales</label>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="hardware" name="hardware" {{ old('hardware') ? 'checked' : null }}>
					<label class="custom-control-label" for="hardware">Cambio de piezas/ hardware</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12">
				<label for="technical_report">Reporte técnico efectuado</label>
				<textarea class="form-control" rows="4" name="technical_report" resize="none" id="technical_report">{{ old('technical_report') }}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="special_remarks" class="form-control-label">Observaciones especiales (Opcional)</label>
				<input class="form-control" name="special_remarks" type="text" placeholder="Ingrese las observaciones del equipo" id="special_remarks">
			</div>


			<div class="form-group col-md-4">
				<label for="employee_name">Empleado que atendio</label>
				<select class="form-control" id="employee_name" name="user_id">
					@foreach($users as $user)
					<option value="{{ $user->id }}">{{ $user->name }}</option>
					@endforeach
				</select>
			</div>


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
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				{{-- {{ old('delivery_date', $date->format('d-m-Y')) }} --}}
				<label for="delivery_date" class="form-control-label">Fecha de entrega</label>
				<input class="form-control" name="delivery_date" type="date" value="{{ $order->delivery_date }}" id="delivery_date">
			</div>
			<div class="form-group col-md-4 pt-4">
				<button type="submit" class="btn btn-success btn-block mt-2">Guardar reporte</button>
			</div>
		</form>
	</x-card>
	@endif

	@endsection