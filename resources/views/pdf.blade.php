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
		}

	</style>



</head>
<body>
	<div>
		<div style="display: block;">
			<img src="{{ asset('assets/images/pyscom.png') }}" style="width: 30%; float: left;">
			<p style="width: 70%; float: right;" class="text-center">PRODUCTOS PROYECTOS Y SERVICIOS INFORMATICOS.</p>
		</div>

		<div style="display: block;">
			<p style="margin-top: 150px;" class="text-center"><strong>Orden de venta</strong></p>
		</div>

		<div style="dispay: block;">
			<div style="float: left;">
				<span><strong>DATOS DEL CLIENTE</strong></span>
			</div>
			<div style="float: right;">
				<span><strong>No. de Folio: {{ $order->folio }}</strong></span>
			</div>
		</div>

		<div>
			<p style="margin-top: 5%;"></p>

			<div style="float: left;">
				<p><strong>NOMBRE: </strong><u>{{ $order->client->name }}</p>
			</div>
			<div style="float: left;">
				<p style="margin-left: 15px;"><strong>RFC: </strong><u>{{ $order->client->rfc }}</p>
			</div>
			<div style="float: left;">
				<p style="margin-left: 15px;"><strong>TEL.: </strong><u>{{ $order->client->phone }}</p>
			</div>

			<p style="margin-top: 3%;"></p>

			<div style="float: left;">
				<p><strong>DOMICILIO: </strong><u>{{ $order->client->street }} {{ $order->client->number }}</p>
			</div>
			<div style="float: left;">
				<p style="margin-left: 15px;"><strong>COLONIA: </strong><u>{{ $order->client->suburb }}</p>
			</div>
			<div style="float: left;">
				<p style="margin-left: 15px;"><strong>C.P.: </strong><u>{{ $order->client->postal_code }}</p>
			</div>
		</div>

		<p style="margin-top: 5%;"></p>

		<table style="width:100%; border: 1px solid black;">
			<tr class="text-center">
			    <th>Cant.</th>
			    <th>Descripción</th>
			    <th>Precio Unitario</th>
			    <th>Precio NETO</th>
		  	</tr>
		  @foreach($products as $product)
		  	<tr class="text-center">
			    <td>{{ $product->quantity }}</td>
			    <td>{{ strip_tags($product->description) }}</td>
			    <td>$ {{ $product->unit_price }}.00</td>
			    <td>$ {{ $product->net_price }}.00</td>
		  	</tr>
		  @endforeach
		</table>

		<p style="margin-top: 5%;"></p>

			<div style="float: left;">
				<p><strong>FECHA DE VENTA: </strong><u>{{ $order->created_at }}</p>
			</div>
			<div style="float: right;">
				<p style="margin-left: 15px;"><strong>TOTAL A PAGAR: </strong><u>{{ $order->client->rfc }}</p>
			</div>

	</div>
</body>
</html>
