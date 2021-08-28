<div>
    <x-table>
        <div class="d-flex">
            <div class="col-md-6 d-flex align-items-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="display-4 mb-0">Tabla de ordenes de servicio - {{ $client->name }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-4">
                <div class="row">
                    <div class="col">
                        <input type="number" wire:model="search" class="form-control" placeholder="Buscar Orden de servicio (Ingrese No. de orden)">
                    </div>
                </div>
            </div>
        </div>
        <table class="table align-items-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="sort" data-sort="name">No. orden</th>
                    <th scope="col" class="sort" data-sort="budget">Cliente</th>
                    <th scope="col" class="sort" data-sort="status">Fecha de creación de orden</th>
                    <th scope="col" class="sort" data-sort="status">Sucursal</th>
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
                                <span class="name mb-0 text-sm">{{ $order->id }}</span>
                            </div>
                        </div>
                    </th>
                    <td class="budget">
                       {{ $order->client->name }}
                    </td>
                    <td class="budget">
                        {{ $order->created_at->diffForHumans() }}
                    </td>
                    <td class="budget">
                        {{ $order->office->name }}
                    </td>
                    <td class="d-flex">
                        <a type="button" class="btn btn-success text-white" href="{{ route('orderService.show', $order->folio) }}">
                            <span class="btn-inner--icon"><i class="far fa-eye"></i></span>
                            <span class="btn-inner--text">Mostrar Orden</span>
                        </a>
                        @if(Auth::user()->role_id === 1)
                        <form class="form-delete" action="{{ route('orderService.destroy', $order->folio) }}" method="POST">
                            @method("delete")
                            @csrf
                            <button type="submit" class="btn btn-danger text-white">
                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                <span class="btn-inner--text">Eliminar Orden</span>
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-table>
</div>
