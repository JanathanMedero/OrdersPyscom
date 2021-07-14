<div>
    <x-table>
        <div class="row">
            <div class="col-md-4 d-flex align-items-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="display-4 mb-0">Tabla de Clientes</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-8 my-4">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" wire:model="search" placeholder="Buscar Cliente">
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-success btn-block">Nuevo Cliente</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table align-items-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="sort" data-sort="name">Nombre</th>
                    <th scope="col" class="sort" data-sort="budget">Teléfono</th>
                    <th scope="col" class="sort" data-sort="status">Servicios</th>

                    <th scope="col" class="sort" data-sort="completion">Acciones</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="list">

                @foreach($clients as $client)
                <tr>
                    <th scope="row">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <span class="name mb-0 text-sm">{{ $client->name }}</span>
                            </div>
                        </div>
                    </th>
                    <td class="budget">
                        {{ $client->phone }}
                    </td>
                    <td class="budget">
                        4 servicios
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">Editar</button>
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </x-table>
</div>
