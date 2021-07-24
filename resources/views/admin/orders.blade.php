@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
	<div class="row">
		<div class="col-xl-4">
			<div class="card" style="width: 24rem;">
				<div>
					<img src="{{ asset('assets/images/saleOrder.png') }}" style="width:384px; height: 315px;">
				</div>
				<div class="card-body">
					<h2 class="card-title text-center">Orden de Venta</h2>
					<a href="{{ route('orderSale.create', $client->slug) }}" class="btn btn-default btn-block">Nueva Orden</a>
				</div>
			</div>
		</div>

		<div class="col-xl-4">
			<div class="card" style="width: 24rem;">
				<img src="{{ asset('assets/images/serviceOrder.png') }}" style="width:384px; height: 315px;">
				<div class="card-body">
					<h2 class="card-title text-center">Orden de Servicio</h2>
					<a href="{{ route('orderService.create', $client->slug) }}" class="btn btn-default btn-block">Nueva Orden</a>
				</div>
			</div>
		</div>

		<div class="col-xl-4">
			<div class="card" style="width: 24rem;">
				<img src="{{ asset('assets/images/serviceSite.png') }}">
				<div class="card-body">
					<h2 class="card-title text-center">Orden de Sitio</h2>
					<a href="#" class="btn btn-default btn-block">Nueva Orden</a>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection