@extends('layouts.admin')

@section('content')
	@livewire('show-clients')
@endsection

@section('extra-js')
	<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>

	@if(session()->has('delete'))
		<script>
			Swal.fire(
			  'Eliminado',
			  'El cliente fue eliminado exitosamente',
			  'success'
			)
		</script>
	@endif

	<script>
		$('.form-delete').submit(function(e){
			e.preventDefault();
			Swal.fire({
			  title: '¿Estas seguro de borrar al cliente?',
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