@extends('layouts.admin')

@section('content')
<x-alert></x-alert>

<x-card>
	<div class="row">
		<div class="col-md-6">
			<h4 class="display-4">Orden de venta en sitio: {{ $order->folio }} - {{ $order->Client->name }}</h4>
		</div>
		<div class="col-md-6 d-flex justify-content-end">
			<button type="button" class="btn btn-warning text-white" href="#" data-toggle="modal" data-target="#edit-observations" aria-hidden="false">
				<span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
				<span class="btn-inner--text">Editar observaciones</span>
			</button>

			<button type="button" class="btn btn-success text-white" href="#" data-toggle="modal" data-target="#edit-advance" aria-hidden="false">
				<span class="btn-inner--icon"><i class="fas fa-dollar-sign"></i></span>
				<span class="btn-inner--text">Editar Anticipo</span>
			</button>

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
				<a type="button" href="{{ route('pdfServiceSite.show', $order->folio) }}" class="btn btn-warning text-white" target="_blank">
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
											<label for="editor">Descripción del servicio (Opcional)</label>
											<textarea class="form-control" rows="5" name="description" id="editor"></textarea>
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

				<!-- Modal -->
				<div class="modal fade" id="edit-advance" role="dialog" aria-labelledby="edit-advance" aria-hidden="false">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<form method="POST" action="{{ route('orderSite.updateAdvance', $order->folio) }}">
							@method('PUT')
							@csrf
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="create-product">Editar Anticipo</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="row my-2">
										<div class="form-group col-md-12 mb-4">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">$</span>
												</div>
												<input type="number" class="form-control" placeholder="Ingrese el precio total NETO" name="advance" min="1" value="{{ $order->advance }}" required>
												<div class="input-group-append">
													<span class="input-group-text">.00</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-success">Editar anticipo</button>
								</div>
							</div>
						</form>
					</div>
				</div>


				<!-- Modal -->
				<div class="modal fade" id="edit-observations" role="dialog" aria-labelledby="edit-observations" aria-hidden="false">
					<div class="modal-dialog" role="document">
						<form method="POST" action="{{ route('orderSite.observations', $order->folio) }}">
							@method('PUT')
							@csrf
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="create-product">Editar observaciones</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group col-md-12">
										<label for="observation">Observaciones</label>
										<textarea class="form-control" rows="5" name="observation" id="observation" resize="none">{{ $order->observations }}</textarea>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-success">Editar observaciones</button>
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
				<td class="budget">{{ $service->net_price }}</td>
				<td class="d-flex">
					<a type="button" class="btn btn-info text-white" href="{{ route('serviceSite.edit', ['folio' => $order->folio, 'slug' => $service->slug]) }}">
						<span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
						<span class="btn-inner--text">Editar</span>
					</a>
					<form class="form-delete" action="{{ route('serviceSite.destroy', $service->slug) }}" method="POST">
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

@section('extra-js')
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>

@if(session()->has('delete'))
<script>
	Swal.fire(
		'Eliminado',
		'El servicio fue eliminado exitosamente',
		'success'
		)
	</script>
	@endif

	<script>
		$('.form-delete').submit(function(e){
			e.preventDefault();
			Swal.fire({
				title: '¿Estas seguro de eliminar el servicio?',
				text: "Esta acción no se puede revertir",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Borrar',
				cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.value) {
					this.submit();
				}
			})
		});
	</script>
	@endsection