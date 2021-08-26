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
			<div class="col-md-4 my-4">
				<h3 class="text-center">Orden de servicio en sitio</h3>
			</div>
		</div>

		<div class="col-xs-12 my-4">
			<div class="accordion" id="accordionFlushExample">
				<div class="accordion-item">
					<h2 class="accordion-header" id="flush-headingOne">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
							Datos del cliente
						</button>
					</h2>
					<div id="flush-collapseOne" class="accordion-collapse collapse px-3 py-3" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
						<div class="row">

							<div class="col-xs-12">
								<p class="mb-0"><strong>Nombre:</strong> {{ $order->client->name }}</p>
							</div>

							@if($order->client->phone)
							<div class="col-xs-12">
								<p class="mb-0"><strong>Teléfono:</strong> {{ $order->client->phone }}</p>
							</div>
							@endif

							@if($order->client->rfc)
							<div class="col-xs-12">
								<p class="mb-0"><strong>RFC:</strong> {{ $order->client->rfc }}</p>
							</div>
							@endif

							@if($order->client->street)
							<div class="col-xs-12">
								<p class="mb-0"><strong>Calle:</strong> {{ $order->client->street }}</p>
							</div>
							@endif

							@if($order->client->suburb)
							<div class="col-xs-12">
								<p class="mb-0"><strong>Colonia:</strong> {{ $order->client->suburb }}</p>
							</div>
							@endif

							@if($order->client->postal_code)
							<div class="col-xs-12">
								<p class="mb-0"><strong>C.P.:</strong> {{ $order->client->postal_code }}</p>
							</div>
							@endif

						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xs-12">
			<div class="alert alert-info" role="alert">
				<p class="mb-0 text-center">Servicios contratados</p>
			</div>
		</div>

		<div class="col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered align-middle">
					<thead>
						<tr class="text-center">
							<th scope="col">Cantidad</th>
							<th scope="col">Nombre del servicio</th>
							<th scope="col">Descripción</th>
							<th scope="col">Precio NETO</th>
						</tr>
					</thead>
					<tbody>
						@foreach($services as $service)
						<tr class="text-center">
							<th>{{ $service->quantity }}</th>
							<th>{{ $service->name }}</th>
							<th>{{ $service->description }}</th>
							<th>{{ $service->net_price }}</th>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="row d-flex justify-content-center">
			<div class="card col-md-6">
				<div class="card-header">
					<span><strong>Detalles de la orden</strong></span>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><p class="mb-0"><strong>Fecha de alta del servicio: </strong>{{ $date_of_service }}</p></li>
					@if($order->advance)
					<li class="list-group-item"><p class="mb-0"><strong>Anticipo: </strong>${{ $order->advance }}.00</p></li>
					@endif
					<li class="list-group-item"><p class="mb-0"><strong>Total NETO: </strong>${{ $net_price }}.00</p></li>
					<li class="list-group-item"><p class="mb-0"><strong>Total a pagar: </strong>${{ $total }}.00</p></li>
				</ul>
			</div>
		</div>

		<div class="row d-flex justify-content-center">
			<div class="col-xs-12 col-md-6 my-4">
				<label for="observations" class="form-label">Observaciones</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" id="observations" disabled style="resize: none;">{{ $order->observations }}</textarea>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>