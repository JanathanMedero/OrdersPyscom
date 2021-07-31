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
		<div style="display: block; width: 100%;">
			<img src="{{ asset('assets/images/pyscom.png') }}" style="width: 20%; float: left;">
			<p style="width: 80%; float: right;" class="text-center mt-4">PRODUCTOS PROYECTOS Y SERVICIOS INFORMATICOS.</p>
		</div>

		<div style="display: block;">
			<p style="margin-top: 100px; font-size: 24px;" class="text-center"><strong>Orden de servicio en sitio</strong></p>
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
			    <th>Nombre del servicio</th>
			    <th>Descripción</th>
			    <th>Precio NETO</th>
		  	</tr>
		  @foreach($services as $service)
		  	<tr class="text-center">
			    <td>{{ $service->quantity }}</td>
			    <td>{{ $service->name }}</td>
			    @if($service->description)
			    <td>{{ $service->description }}</td>
			    @else
			    <td>Sin descripción</td>
			    @endif
			    <td>$ {{ $service->net_price }}.00</td>
		  	</tr>
		  @endforeach
		</table>

		<div style="width: 100%;" class="mb-2 mt-2">
			<div style="display: inline;">
				<span class="mb-2 mt-2"><strong>Observaciones: </strong>{{ $order->observations }}</span>
			</div>
			<div style="display: inline; float: right;">
				<span class="mb-2 mt-2"><strong>Anticipo: </strong>$ {{ $order->advance }}.00</span>
			</div>
			<div style="display: inline; float: right;">
				<span class="mb-2 mt-2"><strong>Total NETO: </strong>$ {{ $net_price }}.00</span>
			</div>
		</div>

			<div style="float: left;">
				<p><strong>FECHA DE VENTA: </strong><u>{{ $order->created_at->format('d/m/Y'); }}</p>
			</div>
			<div style="float: right;">
				<p style="margin-left: 15px;"><strong>TOTAL A PAGAR: </strong><u>${{ $total }}.00</p>
			</div>

		<p style="margin-top: 2%;"></p>

		<p class="mb-0"><strong>Politicas de servicio y garantías</strong></p>

		<p class="mb-0" style="font-size: 8px;">1. Horario de recepción de llamadas o solicitudes es: de lunes a viernes de 9:30 a 17:30 horas.</p>
		<p class="mb-0" style="font-size: 8px;">2. En caso de requerir revisión de equipo para garantía o soporte, acudir a las oficinas ubicadas en Naraxan #359 col. Felix Ireta en un horario de lunes a viernes de 9:30 a 5:30 PM. y sabados de 8:00 am a 8:00 pm.</p>
		<p class="mb-0" style="font-size: 8px;">3. Tiempo de atención al cliente: Un día hábil o de acuerdo a disponibilidad de la empresa.</p>
		<p class="mb-0" style="font-size: 8px;">4. Piezas y refacciones: de 6 meses a un año depende de la refacción.</p>
		<p class="mb-0" style="font-size: 8px;">5. Mano de obra: 48 horas posteriores a la conclusión del servicio y que esté relacionado con el servicio efectuado</p>
		<p class="mb-0" style="font-size: 8px;">6. No existe garantía en la instalación de software debido a que el software podría corromperse por cuestiones ajenas a nuestro servicio.</p>
		<p class="mb-0" style="font-size: 8px;">7. Toda revisión tiene un costo mínimo de $180.00 (equipo especial tiene un precio superior).</p>
		<p class="mb-0" style="font-size: 8px;">8. En servicios y/o reparaciones la garantía es de 30 días (cubre unicamente las fallas corregidas y expresadas en la orden de servicio).</p>
		<p class="mb-0" style="font-size: 8px;">9. La garantía de hardware adquirido en PYSCOM es de 1 año, pero esta puede variar segun la marca y el equipo.</p>
		<p class="mb-0" style="font-size: 8px;">10. PYSCOM no se hace responsable por perdida de información, se da por hecho que el cliente cuenta con un respaldo como medida de seguridad antes de traer el equipo a revisión.</p>
		<p class="mb-0" style="font-size: 8px;">11. No se entregará el equipo sin la orden de servicio.</p>
		<p class="mb-0" style="font-size: 8px;">12. Cumplidos 60 días a partir de la fecha de elaboración de esta orden, la empresa PYSCOM y su agente legal se reservan el derecho de almacenar o eliminar dicho equipo.</p>
		<p class="mb-0" style="font-size: 8px;">13. Toda cancelación de servicio o venta, tendrá una penalización del 20% del costo total.</p>
		<p class="mb-0" style="font-size: 8px;">14. Para garantías es necesario fotocopias de la factura que compruebe la fecha de compra y número de serie del equipo presentado, ademas de que el equipo no debe dar muestras de haber sido intervenido, ni presentar componentes quemados.</p>
		<p class="mb-0" style="font-size: 8px;">15. La garantía cubre solamente defectos de fabricación en sus componente internos.</p>
		<p class="mb-0" style="font-size: 8px;">16. La empresa no se hace responsable por carcasas ni tapas rayadas.</p>
		<p class="mb-0" style="font-size: 8px;">17. El tiempo de reparación esta sujeto a disponibilidad de refacciones y del tipo de falla presentada</p>
		<p class="mb-0" style="font-size: 8px;">18. El diagnostico y estado real de los componentes internos de su maquina quedaran sujetos hasta la revisión del técnico.</p>
		<p class="mb-0" style="font-size: 8px;">19. El cliente AUTORIZA los trabajos necesarios para la REPARACIÓN de el (los) equipo(s). Para cualquier duda o sugerencia enviar un correo a la direccion: pyscom@live.com.mx o llamar al tel. (443) 3151988.</p>

		
			<div class="firms" style="margin-top: 7%; display: block; width: 100%;">

				<img src="{{ asset('assets/images/firms.png') }}" style="width: 100%;">

			</div>
		
			<div class="footer" style="margin-top: 3%; display: block; width: 100%;">
				<img src="{{ asset('assets/images/footer.png') }}" style="width: 100%;">
			</div>
			

	</div>
</body>
</html>
