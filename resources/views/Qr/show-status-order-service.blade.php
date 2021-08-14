<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Estatus de Pyscom</title>
</head>
<body>

	<nav class="navbar" style="background-color: #2196F3;">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-md-4">
					<a class="navbar-brand" href="#">
						<img src="{{ asset('assets/images/pyscom.png') }}" alt="" width="40%" class="d-inline-block align-text-top">
					</a>
				</div>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-6 my-2">
				<div class="card">
					<div class="card-body text-center">
						Estatus del pedido de: <strong>{{ $order->client->name }}</strong>
					</div>
				</div>
			</div>
		</div>

		<div class="row d-flex justify-content-center">
			<div class="col-md-3 my-2">
				<div class="card bg-info">
					<div class="card-body text-center text-white">
						Orden de servicio
					</div>
				</div>
			</div>
		</div>

		<div class="card col-md-6 my-2">
			<div class="card-header">
				Detalles del servicio
			</div>
			<div class="card-body">
				<p class="card-text"><strong>Equipo: </strong>{{ $order->equipment->team }}</p>
				<p class="card-text"><strong>Marca: </strong>{{ $order->equipment->brand }}</p>
				@if($order->equipment->model)
				<p class="card-text"><strong>Modelo: </strong>{{ $order->equipment->model }}</p>
				@endif
				@if($order->equipment->accessories)
				<p class="card-text"><strong>Accesorios: </strong>{{ $order->equipment->accessories }}</p>
				@endif
				<p class="card-text"><strong>Características del equipo: </strong>{{ $order->equipment->features }}</p>
				<p class="card-text"><strong>Reporte de falla: </strong>{{ $order->equipment->fault_report }}</p>
				@if($order->equipment->observations)
				<p class="card-text"><strong>Observaciones: </strong>{{ $order->equipment->observations }}</p>
				<p class="card-text"><strong>Servicio solicitado: </strong>{{ $order->equipment->solicited_service }}</p>
				@endif
			</div>
		</div>


		@if($order->technical_report)
		<div class="card col-md-6 my-2">
			<div class="card-header">
				Reporte Técnico
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						@foreach($services as $service)

						@if($service->complete_maintenance)
						<span class="badge bg-primary">Mantenimiento completo</span>
						@endif

						@if($service->preventive_maintenance)
						<span class="badge bg-primary">Mantenimiento preventivo</span>
						@endif

						@if($service->bios)
						<span class="badge bg-primary">Cambio de pila/configuración de BIOS</span>
						@endif

						@if($service->virus)
						<span class="badge bg-primary">Eliminación de virus</span>
						@endif

						@if($service->software_reinstallation)
						<span class="badge bg-primary">Reinstalación de software</span>
						@endif

						@if($service->special_software)
						<span class="badge bg-primary">Software especial</span>
						@endif

						@if($service->clean)
						<span class="badge bg-primary">Limpieza/aceleración</span>
						@endif

						@if($service->printer_cleaning)
						<span class="badge bg-primary">Mantenimiento a impresora</span>
						@endif

						@if($service->head_maintenance)
						<span class="badge bg-primary">Mantenimiento de cabezales</span>
						@endif

						@if($service->hardware)
						<span class="badge bg-primary">Cambio de piezas/hardware</span>
						@endif

						@endforeach
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 my-2">
						<label for="technical_report" class="form-label">Reporte</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" id="technical_report" disabled>{{ $order->technical_report }}</textarea>
					</div>
				</div>

				@if($order->special_remarks)
				<div class="row">
					<div class="col-md-12 mt-2 mb-4">
						<label for="special_remarks" class="form-label">Observaciones especiales</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" id="special_remarks" disabled>{{ $order->special_remarks }}</textarea>
					</div>
				</div>
				@endif

				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12 mt-2">
								<p><strong>Empleado que atendio: </strong>{{ $attention_user->name }}</p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<p><strong>Fecha de entrega estimada: </strong>{{ $delivery_date }}</p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		@else
		<div class="my-4">
			<div class="alert alert-primary" role="alert">
				<p class="mb-0 text-center">En espera del reporte técnico</p>
			</div>
		</div>
		@endif


	</div>

</body>
</html>