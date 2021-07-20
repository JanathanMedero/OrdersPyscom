<div>
    <div class="row">
        <div class="col-md-4">
            <h3 class="display-4 mb-4">Productos</h3>
        </div>
        <div class="col-md-8 d-flex justify-content-end">
            <div>
                <a type="button" class="btn btn-success text-white" href="#">
                    <span class="btn-inner--icon"><i class="fas fa-shopping-bag"></i></span>
                    <span class="btn-inner--text">Agregar Producto</span>
                </a>
            </div>
        </div>
    </div>

    <table class="table align-items-center">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="sort" data-sort="name">Nombre del producto</th>
                <th scope="col" class="sort" data-sort="budget text-center">Cantidad</th>
                <th scope="col" class="sort" data-sort="status">Precio</th>

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
                    ${{ $product->net_price }}
                </td>
                <td class="d-flex">
                    <a type="button" class="btn btn-info text-white" href="#">
                        <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                        <span class="btn-inner--text">Editar</span>
                    </a>
                    <form class="form-delete" action="#" method="POST">
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
</div>
