@extends('layouts.admin')

@section('content')

<x-error></x-error>

<x-card>
	<div class="row">
		<div class="col-md-12">
			<h4 class="display-4">Editar servicio: {{ $service->name }}</h4>
		</div>
	</div>
	<div class="row">
		<hr class="my-2">
	</div>

	<form action="{{ route('serviceSite.update', $service->slug) }}" method="POST">
		@method("PUT")
		@csrf

		<div id="mainContent">

			<div id="newProduct">
				<div class="row my-2">
					<div class="form-group col-md-3">
						<label for="name-product">Nombre del servicio</label>
						<input class="form-control" type="text" id="name-product" placeholder="Ingrese el nombre del producto" name="name" value="{{ $service->name }}">
					</div>
					<div class="form-group col-md-3">
						<label for="example-number-input">Cantidad</label>
						<input class="form-control" type="number" id="example-number-input" placeholder="Ingrese la cantidad" min="1" name="quantity" value="{{ $service->quantity }}">
					</div>
					<div class="form-group col-md-3 mb-0">
						<label for="net_price">Precio NETO</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="text" id="net_price" class="form-control" placeholder="Ingrese el precio total NETO" name="net_price" value="{{ $service->net_price }}">
							<div class="input-group-append">
								<span class="input-group-text">.00</span>
							</div>
						</div>
					</div>
					<div class="form-group col-md-3">
						<label for="advance">Anticipo</label>
						<input class="form-control" type="text" id="advance" placeholder="Ingrese el nombre del producto" name="advance" value="{{ $service->advance }}">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="editor">Descripción del servicio</label>
						<textarea class="form-control" rows="5" name="description" id="editor">{{ $service->description }}</textarea>
					</div>
				</div>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-info">Terminar edición</button>
			</div>
		</div>
	</form>

</x-card>

@endsection

@section('extra-js')
{{-- <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'editor' );
</script> --}}

@endsection