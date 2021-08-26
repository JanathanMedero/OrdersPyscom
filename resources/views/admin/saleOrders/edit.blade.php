@extends('layouts.admin')

@section('content')

<x-error></x-error>

<x-card>
	<div class="row">
		<div class="col-md-12">
			<h4 class="display-4">Editar producto: {{ $product->name }}</h4>
		</div>
	</div>
	<div class="row">
		<hr class="my-2">
	</div>

	<form action="{{ route('products.update', $product->slug) }}" method="POST">
		@method("PUT")
		@csrf

		<div id="mainContent">

			<div id="newProduct">
				<div class="row my-2">
					<div class="form-group col-md-4">
						<label for="name-product">Nombre del producto</label>
						<input class="form-control" type="text" id="name-product" placeholder="Ingrese el nombre del producto" name="name" value="{{ $product->name }}">
					</div>
					<div class="form-group col-md-3">
						<label for="example-number-input">Cantidad</label>
						<input class="form-control" type="number" id="example-number-input" placeholder="Ingrese la cantidad" min="1" name="quantity" value="{{ $product->quantity }}">
					</div>
					<div class="form-group col-md-4 mb-0">
						<label for="unit_price">Precio unitario</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="text" id="unit_price" class="form-control" placeholder="Ingrese el precio unitario" name="unit_price" value="{{ $product->unit_price }}">
							<div class="input-group-append">
								<span class="input-group-text">.00</span>
							</div>
						</div>
					</div>
					<div class="form-group col-md-4 mb-0">
						<label for="net_price">Precio NETO</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="text" id="net_price" class="form-control" placeholder="Ingrese el precio total NETO" name="net_price" value="{{ $product->net_price }}">
							<div class="input-group-append">
								<span class="input-group-text">.00</span>
							</div>
						</div>
					</div>
					<div class="form-group col-md-3">
						<label for="warranty">Garantía</label>
						<input class="form-control" type="text" id="warranty" placeholder="Ingrese la garantía del producto" name="warranty" value="{{ $product->warranty }}">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="editor">Descripción del Producto</label>
						<textarea class="form-control" rows="5" name="description" id="editor">{{ $product->description }}</textarea>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="observation">Observaciones (Opcional)</label>
						<textarea class="form-control" rows="4" name="observations" resize="none" id="observation">{{ $product->observations }}</textarea>
					</div>
				</div>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-info">
				<span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                <span class="btn-inner--text">Terminar edición</span>
				</button>
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