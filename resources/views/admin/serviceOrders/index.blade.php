@extends('layouts.admin')

@section('content')
	<x-alert></x-alert>
	@livewire('show-orders-service')
@endsection

@section('extra-js')
	<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>

	@if(session()->has('delete'))
		<script>
			Swal.fire(
			  'Eliminada',
			  'La orden fue eliminada exitosamente',
			  'success'
			)
		</script>
	@endif

	<script>
		$('.form-delete').submit(function(e){
			e.preventDefault();
			Swal.fire({
			  title: '¿Estas seguro de borrar esta orden?',
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