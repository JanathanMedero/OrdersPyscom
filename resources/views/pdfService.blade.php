<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pyscom - Orden de servicio: {{ $order->id }}</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<style>
	.text-format{
		font-size: 18px;
		},
		footer{
			border-top: 5px solid black;
			padding-top: 10px;
			position: absolute;
			bottom: 0;
			width: 100%;
			height: 80px;
			overflow: hidden;
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

	
	<div class="alert alert-info px-4 py-2 mt-2" style="width: 100%;" role="alert">
		<div style="width: 100%;">
			<div style="width: 50%; display: inline-block; margin-bottom: 0px;"><span class="mb-0" style="font-size: 18px;"><strong>Datos del cliente</strong></span></div>
			<div style="width: 49%; text-align: right; display: inline-block; margin-bottom: 0px;"><span style="font-size: 18px; text-align: right;">Número de orden: <strong>{{ $order->id }}</span></div>
		</div>
	</div>

		<div class="text" style="width: 100%;">
			<div class="px-4" style="width: 60%; display: inline-block;">
				<p class="mb-0" style="font-size: 18px;"><strong>Nombre: </strong><u>{{ $order->client->name }}</u></p>
			</div>
			<div class="px-4" style="width: 40%; display: inline-block;">
				<p class="mb-0" style="font-size: 18px;"><strong>Teléfono: </strong><u>{{ $order->client->phone }}</u></p>
			</div>
		</div>

		<div class="alert alert-info" style="width: 100%;" role="alert">
			<div class="mb-0" style="width: 100%;">
				<div style="width: 100%; margin-bottom: 0px;"><p class="mb-0 text-center" style="font-size: 18px;"><strong>Datos del equipo</strong></p></div>
			</div>
		</div>


		<div class="text" style="width: 100%;">
			<div style="width: 50%; display: inline-block;">
				<p class="mb-0" style="font-size: 18px;"><strong>Equipo: </strong>{{ $order->equipment->team }}</p>
			</div>
			@if($order->equipment->accessories)
			<div style="width: 49%; display: inline-block;">
				<p class="mb-0" style="font-size: 18px;"><strong>Accesorios: </strong>{{ $order->equipment->accessories }}</p>
			</div>
			@endif
		</div>

		<div style="width: 100%;">
			<div style="width: 100%;">
				<p class="mb-0" style="font-size: 18px;"><strong>Servicio solicitado: </strong>{{ $order->equipment->solicited_service }}</p>
			</div>
		</div>

		<div class="text" style="width: 100%;">
			<div style="width: 100%;">
				<p class="mb-1" style="font-size: 18px;"><strong>Características del equipo: </strong>{{ $order->equipment->features }}</p>
			</div>
		</div>

		<div class="text" style="width: 100%;">
			<div style="width: 50%; display: inline-block;">
				<p class="mb-0" style="font-size: 18px;"><strong>Reporte de falla: </strong>{{ $order->equipment->fault_report }}</p>
			</div>
			@if($order->equipment->model)
			<div style="width: 49%; display: inline-block;">
				<p class="mb-0" style="font-size: 18px;"><strong>Modelo (No.serie): </strong>{{ $order->equipment->model }}</p>
			</div>
			@endif
		</div>

		<div style="width: 100%; padding-bottom: 5px;">
			@if($order->equipment->observations)
			<div style="width: 100%;">
				<p class="mb-0" style="font-size: 18px;"><strong>Observaciones: </strong>{{ $order->equipment->observations }}</p>
			</div>
			@endif
		</div>

		<div class="alert alert-info" style="width: 100%;" role="alert">
			<div class="mb-0" style="width: 100%;">
				<div style="width: 100%; margin-bottom: 0px;"><p class="mb-0 text-center" style="font-size: 18px;"><strong>Reporte técnico</strong></p></div>
			</div>
		</div>

		<div style="width: 100%; height: auto;" class="my-2">
			<div style=" display: inline;">
				<label>Mantenimiento completo</label>
				<input type="checkbox">
			</div>
			<div style=" display: inline;">
				<label>Mantenimiento preventivo</label>
				<input type="checkbox">
			</div>
			<div style=" display: inline;">
				<label>Cambio de pila/Config. de BIOS</label>
				<input type="checkbox">
			</div>
		</div>

		<div style="width: 100%; height: auto;" class="mb-2">
			<div style="display: inline;">
				<label>Eliminación de virus</label>
				<input type="checkbox">
			</div>
			<div style="display: inline;">
				<label>Reinstalación de sotware</label>
				<input type="checkbox">
			</div>
			<div style="display: inline;">
				<label>Software especial</label>
				<input type="checkbox">
			</div>
			<div style="display: inline;">
				<label>Limpieza/Aceleración</label>
				<input type="checkbox">
			</div>
		</div>

		<div style="width: 100%; height: auto;" class="mb-2">
			<div style=" display: inline;">
				<label>Mantenimiento de impresora</label>
				<input type="checkbox">
			</div>
			<div style=" display: inline;">
				<label>Mantenimiento de cabezales</label>
				<input type="checkbox">
			</div>
			<div style=" display: inline;">
				<label>Cambio de piezas/ hardware</label>
				<input type="checkbox">
			</div>
		</div>

		

		<div style="width: 100%;">
			<div class="mb-2" style="width: 100%;">
				<p class="mb-0"><strong>Reporte técnico: ________________________________________________________________________</strong></p>
			</div>				
		</div>

		<div class="mb-2" style="width: 100%;">
			<div style="width: 100%;">
				<div class="mb-2">
					<p class="mb-0"><strong>Observaciones Especiales: ________________________________________________________________</strong></p>
				</div>
			</div>
		</div>

		<div style="width: 100%;">
			<div style="width: 50%; display: inline-block;">
				<p><strong>Costo del servicio: ___________________________</strong></p>
			</div>
			<div style="width: 49%; display: inline-block;">
				<p><strong>Fecha de entrega: ___________________________</strong></p>
			</div>
		</div>

		<div style="width: 100%; margin-top: 15px;">
			<div style="width: 15%; display: inline-block;">
				<img src="{{ asset('qrcodes/qrcode-'.$order->folio.'.svg') }}" style="width: 100%;">
			</div>
			<div style="width: 80%; display: inline-block; height: 106px; padding-left: 10px;">
				<p class="text-format">Puede consultar el estatus de su servicio en todo momento, solamente escaneé el siguiente código QR.</p>
			</div>
		</div>	

		<footer style="padding-top: 15px;">

			<div style="width: 50%; display: inline-block;">
				<div class="title" style="width: 100%;">
					<p class="mb-0 text-center"><strong>MATRIZ</strong>:</p>
				</div>
				<div class="street" style="width: 100%;">
					<p class="mb-0 text-center" style="font-size: 12px;">
						NARAXAN 359, FELIX IRETA CP.58070
					</p>
				</div>
				<div class="phone" style="width: 100%;">
					<p class="mb-0 text-center" style="font-size: 12px;">
						<strong>TEL: </strong>(443) 315-19-88, <strong>RFC: </strong>AAVA800421DE1
					</p>
				</div>
				<div class="email" style="width: 100%;">
					<p class="mb-0 text-center" style="font-size: 12px;">
						<strong>E-mail: </strong>pyscom1@hotmail.com, administracion@pyscom.com
					</p>
				</div>
			</div>

			<div style="width: 50%; display: inline-block;">
				<div class="title" style="width: 100%;">
					<p class="mb-0 text-center"><strong>SUCURSAL VIRREY</strong>:</p>
				</div>
				<div class="street" style="width: 100%;">
					<p class="mb-0 text-center" style="font-size: 12px;">
						VIRREY DE MENDOZA # 1415-A, FELIX IRETA CP. 58070
					</p>
				</div>
				<div class="phone" style="width: 100%;">
					<p class="mb-0 text-center" style="font-size: 12px;">
						<strong>TEL: </strong>(443) 275-43-21, <strong>RFC: </strong>AAVA800421DE1
					</p>
				</div>
				<div class="email" style="width: 100%;">
					<p class="mb-0 text-center" style="font-size: 12px;">
						<strong>E-mail: </strong>ventasvirrey@pyscom.com, adminvirrey@pyscom.com
					</p>
				</div>
			</div>
		</footer>

	</body>
	</html>
