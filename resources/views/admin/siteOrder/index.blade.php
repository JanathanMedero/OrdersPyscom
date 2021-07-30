@extends('layouts.admin')

@section('content')
	@livewire('show-orders-site')
@endsection

@section('extra-js')
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script>
    $('.form-delete').submit(function(e){
        e.preventDefault();
        Swal.fire({
          title: '¿Estas seguro de eliminar la orden de servicio?',
          text: "Esto eliminará los servicios asociados",
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