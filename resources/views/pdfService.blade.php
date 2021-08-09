<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>{{ $order->folio }}</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
	<div class="content-header" style="width: 100vh; height: auto;">
		<div class="header" style="width: 100%;">
			<div style="width: 20%; float: left;">
				<img src="{{ asset('assets/images/pyscom.png') }}" style="width: 100%;">
			</div>
			<div style="width: 80%; float: left; height: 80px; font-size: 24px;" class="text-center">
				<p class="mt-2">PRODUCTOS, PROYECTOS Y SERVICIOS INFORMÁTICOS</p>
			</div>
		</div>
		<div class="title" style="width: 100%;">
			<p class="mb-0 text-center" style="font-size: 24px;">Orden de servicio</p>
		</div>
	</div>

	<div class="content" style="width: 100vh; height: auto;">
		<div class="employee px-4 py-2" style="width: 70%; float: left;">
			<p class="mb-0">Le atendio: <strong>{{ $employee->name }}</strong></p>
		</div>
		<div class="employee px-4 py-2" style="width: 30%; float: left;">
			<p class="mb-0 text-right">Fecha: <u>{{ $date }}</u></p>
		</div>
	</div>

	<div class="order" style="width: 100vh; height: auto;">
		<div class="employee px-4 py-2" style="width: 100%; text-align: right;">
			<p class="mb-0">Número de orden: <strong>{{ $order->folio }}</strong></p>
		</div>
	</div>

	<div class="text" style="width: 100vh; height: auto;">
		<div class="employee px-4 py-2" style="width: 100%;">
			<p class="mb-0" style="font-size: 18px;"><strong>Datos del cliente:</strong></p>
		</div>
	</div>

	<div class="text" style="width: 100vh; height: auto;">
		<div class="px-4 py-2" style="width: 60%; float: left;">
			<p class="mb-0" style="font-size: 18px;"><strong>Nombre: </strong><u>{{ $order->client->name }}</u></p>
		</div>
		<div class="px-4 py-2" style="width: 40%; float: left;">
			<p class="mb-0" style="font-size: 18px;"><strong>Teléfono: </strong><u>{{ $order->client->phone }}</u></p>
		</div>
	</div>


	<div class="text" style="width: 100vh; height: auto;">
		<div class="px-4 py-2" style="width: 100%;">
			@if($order->equipment->accessories)
			<p class="mb-0" style="font-size: 18px;"><strong>Accesorios: </strong><u>{{ $order->equipment->accessories }}</u></p>
			@else
			<p class="mb-0" style="font-size: 18px;"><strong>Accesorios: </strong><u>N/A</u></p>
			@endif
		</div>
	</div>

	<div class="text" style="width: 100vh; height: auto;">
		<div class="px-4 py-2" style="width: 100%;">
			<p class="mb-0" style="font-size: 18px;"><strong>Características del equipo: </strong><u>{{ $order->equipment->features }}</u></p>
		</div>
	</div>

	<div class="text" style="width: 100vh; height: auto;">
		<div class="px-4 py-2" style="width: 100%;">
			<p class="mb-0" style="font-size: 18px;"><strong>Reporte de falla: </strong><u>{{ $order->equipment->fault_report }}</u></p>
		</div>
	</div>

	<div class="text" style="width: 100vh; height: auto;">
		<div class="px-4 py-2" style="width: 100%;">
			<p class="mb-0" style="font-size: 18px;"><strong>Servicio solicitado: </strong><u>{{ $order->equipment->solicited_service }}</u></p>
		</div>
	</div>

	

		@foreach($order->equipment->services as $service)

		<div style="width: 100%; height: auto;" class="my-2">
			<div style=" display: inline;">
				<label>Mantenimiento completo</label>
				<input type="checkbox" {{  ($service->complete_maintenance == true ? ' checked' : '') }}>
			</div>
			<div style=" display: inline;">
				<label>Mantenimiento preventivo</label>
				<input type="checkbox" {{  ($service->preventive_maintenance == true ? ' checked' : '') }}>
			</div>
			<div style=" display: inline;">
				<label>Cambio de pila/Config. de BIOS</label>
				<input type="checkbox" {{  ($service->bios == true ? ' checked' : '') }}>
			</div>
		</div>

		<div style="width: 100%; height: auto;" class="mb-2">
			<div style="display: inline;">
				<label>Eliminación de virus</label>
				<input type="checkbox" {{  ($service->virus == true ? ' checked' : '') }}>
			</div>
			<div style="display: inline;">
				<label>Reinstalación de sotware</label>
				<input type="checkbox" {{  ($service->software_reinstallation == true ? ' checked' : '') }}>
			</div>
			<div style="display: inline;">
				<label>Software especial</label>
				<input type="checkbox" {{  ($service->special_software == true ? ' checked' : '') }}>
			</div>
			<div style="display: inline;">
				<label>Limpieza/Aceleración</label>
				<input type="checkbox" {{  ($service->clean == true ? ' checked' : '') }}>
			</div>
		</div>

		<div style="width: 100%; height: auto;" class="mb-2">
			<div style=" display: inline;">
				<label>Mantenimiento de impresora</label>
				<input type="checkbox" {{  ($service->printer_cleaning == true ? ' checked' : '') }}>
			</div>
			<div style=" display: inline;">
				<label>Mantenimiento de cabezales</label>
				<input type="checkbox" {{  ($service->head_maintenance == true ? ' checked' : '') }}>
			</div>
			<div style=" display: inline;">
				<label>Cambio de piezas/ hardware</label>
				<input type="checkbox" {{  ($service->hardware == true ? ' checked' : '') }}>
			</div>
		</div>

		@endforeach

		<div style="width: 100%; height: auto;" class="mb-2">
			<div style="display: inline;">
				<p class="mb-0"><strong>Reporte Técnico Efectuado: </strong><u>{{ $service->technical_report }}</u></p>
			</div>
		</div>

		<div style="width: 100%; height: auto;">
			@if($service->special_remarks)
			<div style="display: inline;" class="mb-2">
				<p class="mb-0"><strong>Observaciones Especiales: </strong><u>{{ $service->special_remarks }}</u></p>
			</div>
			@else
				<div style="display: inline;" class="mb-2">
					<p class="mb-0"><strong>Observaciones Especiales: </strong><u>N/A</u></p>
				</div>
			@endif
			<div style="display: inline;" class="mb-2">
				<p class="mb-0"><strong>Técnico que atendió: </strong><u>{{ $order->technical->name }}</u></p>
			</div>
		</div>

		<div style="width: 100%; height: auto;" class="mt-4">
			<div style="display: inline;">
				<p class="mb-2"><strong>Costo del servicio: </strong><u>${{ $service->price }}.00 Pesos M.N.</u></p>
			</div>
			<div style="display: inline;">
				<p class="mb-4"><strong>Fecha de entrega: </strong><u>{{ $service->delivery_date }}</u></p>
			</div>
		</div>

		<div style="width: 100%;" class="mb-4 mt-4">
		</div>

		<div style="width: 100%;" class="mt-2">
			<img src="{{ asset('qrcodes/qrcode-'.$order->folio.'.svg') }}">
		</div>
	
	
</body>
</html>
