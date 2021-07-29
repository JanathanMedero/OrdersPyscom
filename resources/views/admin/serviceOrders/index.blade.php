@extends('layouts.admin')

@section('content')
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

	@if(session()->has('success'))
		<script>
			Swal.fire(
			  'Exito',
			  'Orden de servicio creada correctamente',
			  'success'
			)
		</script>
	@endif
	@if(session()->has('successOder'))
		<script>
			Swal.fire(
			  'Exito',
			  'Reporte creado correctamente',
			  'success'
			)
		</script>
	@endif
	@if(session()->has('updateOrder'))
		<script>
			Swal.fire(
			  'Exito',
			  'Orden actualizada correctamente',
			  'success'
			)
		</script>
	@endif
	@if(session()->has('updateReport'))
		<script>
			Swal.fire(
			  'Exito',
			  'Reporte actualizado correctamente',
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