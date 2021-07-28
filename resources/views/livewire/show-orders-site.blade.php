<div>
    <x-table>
        <div class="d-flex">
            <div class="col-md-4 d-flex align-items-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="display-4 mb-0">Tabla de ordenes de sitio</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-8 my-4">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" wire:model="search" placeholder="Buscar orden de sitio (Ingrese el Folio de la orden)">
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
                    <th scope="col" class="sort" data-sort="status">No. de productos</th>

                    <th scope="col" class="sort" data-sort="completion">Acciones</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="list">

                
                <tr>
                    <th scope="row">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <span class="name mb-0 text-sm"></span>
                            </div>
                        </div>
                    </th>
                    <td class="budget">
                        
                    </td>
                    <td class="budget">
                        
                    </td>
                    <td class="budget">
                        
                    </td>
                    <td class="d-flex">
                        <a type="button" class="btn btn-success text-white" href="#">
                            <span class="btn-inner--icon"><i class="far fa-eye"></i></span>
                            <span class="btn-inner--text">Mostrar Orden</span>
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
            </tbody>
        </table>
    </x-table>
</div>
