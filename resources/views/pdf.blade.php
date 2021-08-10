<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Folio: {{ $order->folio }}</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<style type="text/css">
		
		th, td{
			border: 2px solid black;
		},
		th{
			background-color: #c1d5e0;
		},
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
				<p class="mb-0" style="font-size: 32px; display: inline;"><u>Orden de venta</u></p>
			</div>
		</div>

		<div style="width: 100%; text-align: right;">
			<p class="mb-0 text-format">Fecha de venta: <u>{{ $date }}</u></p>
		</div>

		<div class="alert alert-info mt-2" style="padding: 8px 15px;" role="alert">
			<div style="width: 100%;">
				<div style="width: 50%; display: inline-block;">
					<p class="mb-0" style="font-size: 18px;"><strong>Datos del cliente</strong></p>
				</div>
				<div style="width: 49%; text-align: right; display: inline-block;">
					<p style="font-size: 18px; text-align: right;" class="mb-0">No. de folio: <strong>{{ $order->folio }}</p>
				</div>
			</div>
		</div>

		<div style="width: 100%;" class="mb-2">
			<div style="width: 50%; display: inline-block;">
				<p class="text-format mb-0"><strong>NOMBRE: </strong><u>{{ $order->client->name }}</p>
			</div>
			<div style="width: 25%; display: inline-block;">
				<p class="text-format mb-0"><strong>TEL.: </strong><u>{{ $order->client->phone }}</p>
			</div>
			<div style="width: 20%; display: inline-block;">
				<p class="text-format mb-0"><strong>RFC: </strong><u>{{ $order->client->rfc }}</p>
			</div>
		</div>

		<div style="width: 100%;">
			<div style="width: 50%; display: inline-block;">
				<p class="text-format mb-0"><strong>DOMICILIO: </strong><u>{{ $order->client->street }} {{ $order->client->number }}</p>
			</div>
			<div style="width: 49%; display: inline-block;">
				<p class="text-format mb-0"><strong>COLONIA: </strong><u>{{ $order->client->suburb }}</p>
			</div>
		</div>
		
		<div style="width: 100%;" class="mb-2">
			<div style="width: 100%; display: inline-block;">
				<p class="text-format mb-0"><strong>C.P.: </strong><u>{{ $order->client->postal_code }}</p>
			</div>
		</div>
		

		<table style="width:100%; border: 1px solid black;" class="my-4">
			<tr class="text-center">
				<th>Cant.</th>
				<th>Nombre del producto</th>
				<th>Garantía</th>
				<th>Precio Unitario</th>
				<th>Precio NETO</th>
			</tr>
		  @foreach($products as $product)
			<tr class="text-center">
				<td>{{ $product->quantity }}</td>
				<td>{{ $product->name }}</td>
				@if($product->warranty)
					<td>{{ $product->warranty }}</td>
				@else
					<td><p class="mb-0">Sin garantía</p></td>
				@endif
				<td>$ {{ $product->unit_price }}.00</td>
				<td>$ {{ $product->net_price }}.00</td>
			</tr>
		  @endforeach
		</table>

		<div style="width: 100%">
			<div style="width: 50%; display: inline-block;">
				<p class="text-format mb-0"><strong>FECHA DE VENTA: </strong><u>{{ $order->created_at->format('d/m/Y'); }}</p>
			</div>
			<div style="width: 48%; display: inline-block; text-align: right;">
				<p class="text-format mb-0"><strong>TOTAL A PAGAR: </strong><u>${{ $total }}.00</p>
			</div>
		</div>
			
</body>
</html>
