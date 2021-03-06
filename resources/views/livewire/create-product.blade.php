<div>
	<button type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#create-product">
		Agregar Producto
	</button>

	<!-- Modal -->
	<div class="modal fade" id="create-product" role="dialog" aria-labelledby="create-product" aria-hidden="false">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<form>
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="create-product">Ingresa los datos del producto</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row my-2">
							<div class="form-group col-md-12">
								<input class="form-control" type="text" id="name-product" placeholder="Ingrese el nombre del producto" name="name" value="{{ old('name') }}" wire:model.defer="name">
							</div>
							<div class="form-group col-md-12">
								<input class="form-control" type="number" id="example-number-input" placeholder="Ingrese la cantidad" min="1" name="quantity" value="{{ old('quantity') }}">
							</div>
							<div class="form-group col-md-12 mb-4">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">$</span>
									</div>
									<input type="number" class="form-control" placeholder="Ingrese el precio unitario" name="unit_price" wire:model.defer="unit_price">
									<div class="input-group-append">
										<span class="input-group-text">.00</span>
									</div>
								</div>
							</div>
							<div class="form-group col-md-12 mb-4">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">$</span>
									</div>
									<input type="number" class="form-control" placeholder="Ingrese el precio total NETO" name="net_price" value="{{ old('net_price') }}" wire:model.defer="net_price">
									<div class="input-group-append">
										<span class="input-group-text">.00</span>
									</div>
								</div>
							</div>
							<div class="form-group col-md-12">
								<label for="editor">Descripci??n del Producto</label>
								<textarea class="form-control" rows="5" name="description" id="editor" wire:model.defer="description">
								</textarea>
							</div>
							<div class="form-group col-md-12">
								<label for="observation">Observaciones (Opcional)</label>
								<textarea class="form-control" rows="4" name="observations" resize="none" id="observation" wire:model.defer="observations"></textarea>
							</div>
							<div class="form-group col-md-12">
								<label for="date_of_sale" class="form-control-label">Fecha de venta</label>
								<input class="form-control" name="date_of_sale" type="date" id="date_of_sale" wire:model.defer="date_of_sale">
							</div>
							<div class="form-group col-md-12">
								<label for="id_employee">Recibio</label>
								<select class="form-control" id="id_employee" name="employee">
									@foreach($users as $user)
									<option value="{{ $user->id }}" {{ ( $user->id == Auth::user()->id) ? 'selected' : '' }}>{{ $user->name }}</option wire:model.defer="user_id">
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-success" wire:click="saveProduct">Agregar producto</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@section('extra-js')
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'editor' );
</script>