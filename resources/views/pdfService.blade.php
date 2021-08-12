<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pyscom - Orden de servicio: {{ $order->id }}</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<style>
	.text-format{
		font-size: 18px;
	}
</style>

</head>
<body>
	<div class="" style="width: 100vh;">
		<div style="width: 100%;">
			<div style="width: 20%; display: inline-block;">
				<img src="{{ asset('assets/images/pyscom.png') }}" style="width: 100%;">
			</div>
			<div style="width: 79%; height: 80px; font-size: 24px; display: inline-block;" class="text-center">
				<p class="mt-2">PRODUCTOS, PROYECTOS Y SERVICIOS INFORMÁTICOS</p>
			</div>
		</div>

		<div class="title" style="width: 100%; text-align: center; margin-bottom: 2%;">
			<p class="mb-0" style="font-size: 32px; display: inline;"><u>Orden de servicio</u></p>
		</div>
	</div>

	<div style="width: 100vh;">
		<div class="content" style="width: 100%;">
			<div style="width: 70%; display: inline-block;">
				<p class="mb-0 text-format">Le atendio: <strong>{{ $employee->name }}</strong></p>
			</div>
			<div style="width: 28%; display: inline-block; text-align: right;">
				<p class="mb-0 text-right text-format">Fecha: <u>{{ $date }}</u></p>
			</div>
		</div>
	</div>

	
	<div class="alert alert-info px-4 py-2 mt-2" role="alert">
		<div style="width: 100%;">
			<div style="width: 50%; display: inline-block; margin-bottom: 0px;"><span class="mb-0" style="font-size: 18px;"><strong>Datos del cliente</strong></span></div>
			<div style="width: 49%; text-align: right; display: inline-block; margin-bottom: 0px;"><span style="font-size: 18px; text-align: right;">Número de orden: <strong>{{ $order->folio }}</span></div>
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

		@if($service)

		<div style="width: 100%; height: auto;" class="mb-2">
			<div style="display: inline; text-align: center;">
				<div class="alert alert-primary px-4 py-2 text-format" role="alert">
					Reporte técnico efectuado
				</div>
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

		<div style="width: 100%;">

			<div style="width: 50%; display: inline-block;">
				@if($order->technical_report)
				<div style="idth: 100%;">
					<p class="mb-0"><strong>Reporte técnico: </strong><u>{{ $order->technical_report }}</u></p>
				</div>
				@else
				<div style="width: 100%;">
					<p class="mb-0"><strong>Reporte técnico: </strong><u>N/A</u></p>
				</div>
				@endif
			</div>

			<div style="width: 49%; display: inline-block;">
				<div style="display: inline-block; width: 100%;" class="mb-2">
					{{-- <p class="mb-0"><strong>Técnico que atendió: </strong><u>{{ $order->technical->name }}</u></p> --}}
				</div>
			</div>
		</div>

		<div style="width: 100%;">
			<div style="width: 100%; display: inline-block;">
				@if($order->special_remarks)
				<div style="display: inline;" class="mb-2">
					<p class="mb-0"><strong>Observaciones Especiales: </strong><u>{{ $order->special_remarks }}</u></p>
				</div>
				@else
				<div style="display: inline;" class="mb-2">
					<p class="mb-0"><strong>Observaciones Especiales: </strong><u>N/A</u></p>
				</div>
				@endif
			</div>
			
		</div>

		<div style="width: 100%; margin-top: 2%;">
			<div style="width: 50%; display: inline-block;">
				<p><strong>Costo del servicio: </strong><u>${{ $order->price }}.00 Pesos M.N.</u></p>
			</div>
			<div style="width: 49%; display: inline-block; text-align: right;">
				<p><strong>Fecha de entrega estimada: </strong><u>{{ $delivery }}</u></p>
			</div>
		</div>
		@else

		<div style="width: 100%;" class="my-4">
			<div class="alert alert-primary" role="alert">
				<p class="mb-0 text-center">En espera del reporte técnico</p>
			</div>
		</div>

		@endif

		<div style="width: 100%; margin-top: 15px;">
			<div style="width: 15%; display: inline-block;">
				<img src="{{ asset('qrcodes/qrcode-'.$order->folio.'.svg') }}" style="width: 100%;">
			</div>
			<div style="width: 80%; display: inline-block; height: 106px; padding-left: 10px;">
				<p class="text-format">Puede consultar el estatus de su servicio en todo momento, solamente escaneé el siguiente código QR.</p>
			</div>
		</div>	

	</body>
	</html>
