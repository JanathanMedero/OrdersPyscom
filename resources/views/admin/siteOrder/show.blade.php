@extends('layouts.admin')

@section('content')
<x-alert></x-alert>

<x-card>
	<div class="row">
		<div class="col-md-8">
			<h4 class="display-4">Orden de venta en sitio: {{ $order->folio }} - {{ $order->Client->name }}</h4>
		</div>
		<div class="col-md-4 d-flex justify-content-end">
			<a type="button" class="btn btn-info text-white" href="{{ route('orderSite.edit', $order->folio) }}">
				<span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
				<span class="btn-inner--text">Editar Orden</span>
			</a>
		</div>
	</div>
</x-card>

<x-table>

	<div class="d-flex">
		<div class="col-md-4">
			<h3 class="display-4 mb-4">Servicios</h3>
		</div>
		<div class="col-md-8 d-flex justify-content-end">
			<div>
				<button type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#create-product">
					Agregar servicio
				</button>
				<a type="button" href="{{ route('pdf.show', $order->folio) }}" class="btn btn-warning text-white" target="_blank">
					Imprimir orden de venta
				</a>

				<!-- Modal -->
				<div class="modal fade" id="create-product" role="dialog" aria-labelledby="create-product" aria-hidden="false">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<form method="POST" action="{{ route('serviceSite.store', $order->folio) }}">
							@csrf
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="create-product">Ingresa los datos del servicio</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="row my-2">
										<div class="form-group col-md-12">
											<input class="form-control" type="text" placeholder="Ingrese el nombre del servicio" name="name" value="{{ old('name') }}" required>
										</div>
										<div class="form-group col-md-12">
											<input class="form-control" type="number" id="example-number-input" placeholder="Ingrese la cantidad" min="1" name="quantity" value="{{ old('quantity') }}" required>
										</div>
										<div class="form-group col-md-12 mb-4">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">$</span>
												</div>
												<input type="number" class="form-control" placeholder="Ingrese el precio total NETO" name="net_price" min="1" value="{{ old('net_price') }}" required>
												<div class="input-group-append">
													<span class="input-group-text">.00</span>
												</div>
											</div>
										</div>
										<div class="form-group col-md-12">
											<label for="editor">Descripción del Producto</label>
											<textarea class="form-control" rows="5" name="description" id="editor" required></textarea>
										</div>
										<div class="form-group col-md-12">
											<label for="observation">Observaciones (Opcional)</label>
											<textarea class="form-control" rows="4" name="observations" resize="none" id="observation"></textarea required>
										</div>

										<div class="form-group col-md-12">
											<label for="advance" class="form-control-label">Anticipo (Opcional)</label>
											<input class="form-control" type="text" id="advance" placeholder="Ingrese la cantidad del anticipo" name="advance" value="{{ old('advance') }}">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-success">Agregar servicio</button>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>

	<table class="table align-items-center">
		<thead class="thead-light">
			<tr>
				<th scope="col" class="sort" data-sort="name">Nombre del servicio</th>
				<th scope="col" class="sort" data-sort="budget text-center">Cantidad</th>
				<th scope="col" class="sort" data-sort="status">Precio sin IVA</th>
				<th scope="col" class="sort" data-sort="status">Precio NETO</th>
				<th scope="col" class="sort" data-sort="completion">Acciones</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody class="list">
			@foreach($order->services as $service)
			<tr>
				<th scope="row">
					<div class="media align-items-center">
						<div class="media-body">
							<span class="name mb-0 text-sm">{{ $service->name }}</span>
						</div>
					</div>
				</th>
				<td class="budget">{{ $service->quantity }}</td>
				<td class="budget">{{ $service->iva_price }}</td>
				<td class="budget">{{ $service->net_price }}</td>
				<td class="d-flex">
					<a type="button" class="btn btn-info text-white" href="{{-- {{ route('products.edit', ['folio' => $order->folio, 'slug' => $product->slug]) }} --}}">
						<span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
						<span class="btn-inner--text">Editar</span>
					</a>
					<form class="form-delete" action="{{-- {{ route('products.destroy', $product->slug) }} --}}" method="POST">
						@method("delete")
						@csrf
						<button type="submit" class="btn btn-danger text-white">
							<span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
							<span class="btn-inner--text">Eliminar</span>
						</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</x-table>

@endsection