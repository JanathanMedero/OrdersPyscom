<div>
    <x-table>
        <div class="row">
            <div class="col-md-4 d-flex align-items-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="display-4 mb-0">Tabla de Ordenes de Venta</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-8 my-4">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" {{-- wire:model="search" --}} placeholder="Buscar Orden de Venta">
                    </div>
                </div>
            </div>
        </div>
        <table class="table align-items-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="sort" data-sort="name">Folio</th>
                    <th scope="col" class="sort" data-sort="budget">Cliente</th>
                    <th scope="col" class="sort" data-sort="status">Fecha de creación de orden</th>
                    <th scope="col" class="sort" data-sort="status">Fecha de ultima modificación de orden</th>

                    <th scope="col" class="sort" data-sort="completion">Acciones</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="list">

                @foreach($orders as $order)
                <tr>
                    <th scope="row">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <span class="name mb-0 text-sm">{{ $order->folio }}</span>
                            </div>
                        </div>
                    </th>
                    <td class="budget">
                        {{ $order->client->name }}
                    </td>
                    <td class="budget">
                        {{ $order->client->created_at }}
                    </td>
                    <td class="budget">
                        {{ $order->client->updated_at }}
                    </td>
                    <td class="d-flex">
                        <a type="button" class="btn btn-success text-white" href="#">
                            <span class="btn-inner--icon"><i class="fas fa-shopping-bag"></i></span>
                            <span class="btn-inner--text">Agregar Producto</span>
                        </a>
                        <a type="button" class="btn btn-info text-white" href="#">
                            <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                            <span class="btn-inner--text">Editar Orden</span>
                        </a>
                        <form class="form-delete" action="#" method="POST">
                            @method("delete")
                            @csrf
                            <button type="submit" class="btn btn-danger text-white">
                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                <span class="btn-inner--text">Eliminar Orden</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-table>
</div>