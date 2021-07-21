<div>

    <x-alert></x-alert>

    <x-card>
        <div class="row">
            <div class="col-md-8">
                <h4 class="display-4">Orden de Venta: {{ $order->folio }} - {{ $order->Client->name }}</h4>
            </div>
            <div class="col-md-4 d-flex justify-content-end">
                <a type="button" class="btn btn-info text-white" href="{{ route('orderSale.edit', $order->folio) }}">
                    <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                    <span class="btn-inner--text">Editar Orden</span>
                </a>
            </div>
        </div>
    </x-card>

    <x-table>

        <div class="d-flex">
            <div class="col-md-4">
                <h3 class="display-4 mb-4">Productos</h3>
            </div>
            <div class="col-md-8 d-flex justify-content-end">
                <div>
                    <button type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#create-product">
                        Agregar Producto
                    </button>
                    <button type="button" class="btn btn-warning text-white">
                        Imprimir orden de venta
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="create-product" role="dialog" aria-labelledby="create-product" aria-hidden="false">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <form method="POST" action="{{ route('products.store', $order->folio) }}">
                                @csrf
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
                                                <input class="form-control" type="text" id="name-product" placeholder="Ingrese el nombre del producto" name="name" value="{{ old('name') }}" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <input class="form-control" type="number" id="example-number-input" placeholder="Ingrese la cantidad" min="1" name="quantity" value="{{ old('quantity') }}" required>
                                            </div>
                                            <div class="form-group col-md-12 mb-4">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="number" class="form-control" placeholder="Ingrese el precio unitario" name="unit_price" min="1" required>
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
                                                <label for="date_of_sale" class="form-control-label">Fecha de venta</label>
                                                <input class="form-control" name="date_of_sale" type="date" id="date_of_sale" value="{{ $order->date_of_sale }}" disabled>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="id_employee">Recibio</label>
                                                <select class="form-control" id="id_employee" name="employee" disabled>
                                                    @foreach($users as $user)
                                                    <option value="{{ $user->id }}" {{ ( $user->id == Auth::user()->id) ? 'selected' : '' }}>{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-success">Agregar producto</button>
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
                    <th scope="col" class="sort" data-sort="name">Nombre del producto</th>
                    <th scope="col" class="sort" data-sort="budget text-center">Cantidad</th>
                    <th scope="col" class="sort" data-sort="status">Precio unitario</th>
                    <th scope="col" class="sort" data-sort="status">Precio NETO</th>
                    <th scope="col" class="sort" data-sort="completion">Acciones</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach($order->products as $product)
                <tr>
                    <th scope="row">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <span class="name mb-0 text-sm">{{ $product->name }}</span>
                            </div>
                        </div>
                    </th>
                    <td class="budget">{{ $product->quantity }}</td>
                    <td class="budget">
                        ${{ $product->unit_price }}
                    </td>
                    <td class="budget">
                        ${{ $product->net_price }}
                    </td>
                    <td class="d-flex">
                        <a type="button" class="btn btn-info text-white" href="{{ route('products.edit', ['folio' => $order->folio, 'slug' => $product->slug]) }}">
                            <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                            <span class="btn-inner--text">Editar</span>
                        </a>
                        <form class="form-delete" action="{{ route('products.destroy', $product->slug) }}" method="POST">
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
</div>
@section('extra-js')
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>

<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>

@if(session()->has('delete'))
<script>
    Swal.fire(
      'Eliminado',
      'El producto fue eliminado exitosamente',
      'success'
      )
  </script>
  @endif

  @if(session()->has('success'))
  <script>
    Swal.fire(
      'Exito',
      'Producto creado correctamente',
      'success'
      )
  </script>
  @endif

  <script>
    $('.form-delete').submit(function(e){
        e.preventDefault();
        Swal.fire({
          title: '¿Estas seguro de eliminar el producto?',
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
