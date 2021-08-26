<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Estatus de Pyscom</title>
</head>
<body>

	<nav class="navbar" style="background-color: #133aa1;">
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
			<div class="col-md-6 my-4">
				<div class="card">
					<div class="card-body text-center">
						<h4>Estatus del pedido de: <strong>{{ $order->client->name }}</strong></h4>
					</div>
				</div>
			</div>
		</div>

		<div class="row d-flex justify-content-center">
			<div class="col-md-3 my-4">
				<h3 class="text-center">Orden de servicio</h3>
			</div>
		</div>

		<div class="row d-flex justify-content-center">
			<div class="card col-md-6 my-2">
				<div class="card-header">
					<p class="mb-0"><strong>Detalles del servicio</strong></p>
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
		</div>

		<div class="row">
			<div class="col-md-12 text-center my-4">
				<h5>¿Tienes dudas? Comunicate con nosotros a cualquiera de nuestras sucursales.</h5>
			</div>
		</div>

		
		<div class="row d-flex justify-content-between my-4">
			<div class="card col-md-5">
				<h5 class="card-header">Sucursal Matríz</h5>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<p class="mb-0"><strong>Dirección: </strong>Naraxan 359, Felix Ireta CP. 58070</p>
						</div>
						<div class="col-md-12">
							<p class="mb-0"><strong>Telefono: </strong>(443) 315-19-88</p>
						</div>
						<div class="col-md-12">
							<p class="mb-0"><strong>RFC: </strong>AAVA800421DE1</p>
						</div>
						<div class="col-md-12">
							<p class="mb-0"><strong>E-mail: </strong>pyscom1@hotmail.com | administracion@pyscom.com</p>
						</div>
					</div>
				</div>
			</div>
			<div class="card col-md-5">
				<h5 class="card-header">Sucursal Virrey</h5>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<p class="mb-0"><strong>Dirección: </strong>Virrey de mendoza 1415-A, Felix Ireta CP. 58070</p>
						</div>
						<div class="col-md-12">
							<p class="mb-0"><strong>Telefono: </strong>(443) 275-43-21</p>
						</div>
						<div class="col-md-12">
							<p class="mb-0"><strong>RFC: </strong>AAVA800421DE1</p>
						</div>
						<div class="col-md-12">
							<p class="mb-0"><strong>E-mail: </strong>ventasvirrey@pyscom.com | adminvirrey@pyscom.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>