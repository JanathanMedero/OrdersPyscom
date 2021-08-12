@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<p class="mb-0 display-4 text-center">Lo sentimos, no tienes los permisos para ver este contenido</p>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="row d-flex justify-content-center">
					<div class="col-md-6">
						<img src="{{ asset('assets/images/security.svg') }}" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection