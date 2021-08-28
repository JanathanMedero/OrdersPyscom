@extends('layouts.admin')

@section('content')
<x-card>
	<div class="row">
		<div class="col d-flex justify-content-center">
			<h4 class="display-4">{{ $client->name }}</h4>
		</div>
	</div>

	<div class="row d-flex justify-content-between my-4 mx-4">
		<div class="card col-md-3" style="background-color: #dee2e6;">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="card-title text-center mb-0"><h2>Ordenes de venta</h2></div>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-md-12">
						<a type="button" class="btn btn-success btn-block text-white" href="{{ route('orderSale.create', $client->slug) }}">Nueva orden de venta</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 mt-4">
						@if($sales)
						<a type="button" class="btn btn-warning btn-block text-white" href="{{ route('ServiceClient.index.sale', $client->slug) }}">Mostrar ordenes de venta</a>
						@else
						<p class="text-muted text-center">No hay ordenes de ventas</p>
						@endif
					</div>
				</div>
			</div>
		</div>

		<div class="card col-md-3" style="background-color: #dee2e6;">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="card-title text-center mb-0"><h2>Ordenes de servicio</h2></div>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-md-12">
						<a type="button" class="btn btn-success btn-block text-white" href="{{ route('orderService.create', $client->slug) }}">Nueva orden de servicio</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 mt-4">
						@if($orderService)
						<a type="button" class="btn btn-warning btn-block text-white" href="{{ route('ServiceClient.index.orderService', $client->slug) }}">Mostrar ordenes de servicio</a>
						@else
						<p class="text-muted text-center">No hay ordenes de servicio</p>
						@endif
					</div>
				</div>
			</div>
		</div>

		<div class="card col-md-3" style="background-color: #dee2e6;">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="card-title text-center mb-0"><h2>Ordenes de servicio en sitio</h2></div>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-md-12">
						<a type="button" class="btn btn-success btn-block text-white" href="{{ route('orderSite.create', $client->slug) }}">Nueva orden de servicio en sitio</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 mt-4">
						@if($orderServiceSite)
						<a type="button" class="btn btn-warning btn-block text-white" href="{{ route('ServiceClient.index.orderServiceSite', $client->slug) }}">Mostrar ordenes de servicio en sitio</a>
						@else
						<p class="text-muted text-center">No hay ordenes de servicio en sitio</p>
						@endif
					</div>
				</div>
			</div>
		</div>

	</div>

</x-card>
@endsection