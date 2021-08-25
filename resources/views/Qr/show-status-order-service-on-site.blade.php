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
				<div class="card bg-primary">
					<div class="card-body text-center text-white">
						Orden de servicio en sitio
					</div>
				</div>
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

		<div class="row">
			<div class="col-xs-12 col-md-6 my-4">
				<label for="observations" class="form-label">Observaciones</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" id="observations" disabled>{{ $order->observations }}</textarea>
			</div>
			<div class="col-xs-12 col-md-6 my-md-4 my-sm-2">
				<div class="row">
					<div class="col-xs-12">
						<p><strong>Fecha de alta del servicio: </strong>{{ $date_of_service }}</p>
						@if($order->advance)
						<p><strong>Anticipo: </strong>${{ $order->advance }}.00</p>
						@endif
						<p><strong>Total NETO: </strong>${{ $net_price }}.00</p>
						<p class="mb-4"><strong>Total a pagar: </strong>${{ $total }}.00</p>
					</div>
				</div>
			</div>
		</div>

	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>