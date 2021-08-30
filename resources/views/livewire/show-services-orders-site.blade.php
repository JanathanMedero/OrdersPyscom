<div>
    <x-alert></x-alert>
    <x-table>
        <div class="d-flex">
            <div class="col-md-6 d-flex align-items-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="display-4 mb-0">Tabla de ordenes de sitio - {{ $client->name }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-4">
                <div class="row">
                    <div class="col">
                        <input type="number" class="form-control" wire:model="search" placeholder="Buscar orden de sitio (Ingrese el No. de orden)">
                    </div>
                </div>
            </div>
        </div>
        <table class="table align-items-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="sort" data-sort="name">No. de orden</th>
                    <th scope="col" class="sort" data-sort="budget">Cliente</th>
                    <th scope="col" class="sort" data-sort="status">Fecha de creación de orden</th>
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
                        
                    </td>
                    <td class="d-flex">
                        <a type="button" class="btn btn-success text-white" href="{{ route('orderSite.show', $order->folio) }}">
                            <span class="btn-inner--icon"><i class="far fa-eye"></i></span>
                            <span class="btn-inner--text">Mostrar Orden</span>
                        </a>
                        @if(Auth::user()->role_id === 1)
                        <form class="form-delete" action="{{ route('orderSite.destroy', $order->folio) }}" method="POST">
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

@section('extra-js')

<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>

@if(session()->has('delete'))
<script>
    Swal.fire(
      'Eliminado',
      'La orden fue eliminada correctamente',
      'success'
      )
  </script>
  @endif

  <script>
    $('.form-delete').submit(function(e){
        e.preventDefault();
        Swal.fire({
          title: '¿Estas seguro de eliminar la orden?',
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


