@extends('layouts.admin')

@section('content')
<x-error></x-error>

<x-card>
	<div class="row">
		<div class="col-md-12">
			<h4 class="display-4 mb-0">Editando empleado: {{ $employee->name }}</h4>
		</div>
	</div>
</x-card>

<x-card>
	<form action="{{ route('employe.update', $employee->slug) }}" method="POST">
		@csrf
		@method('PUT')

		<div class="row">
			<div class="form-group col-md-4">
				<label for="name-input-text" class="form-control-label">Ingrese el nombre del empleado</label>
				<input class="form-control" name="name" type="text" id="name-input-text" placeholder="Ingrese el nombre del empleado" value="{{ $employee->name }}">
			</div>

			<div class="form-group col-md-4">
				<label for="email-input-text" class="form-control-label">Ingrese el correo electrónico del empleado</label>
				<input class="form-control" name="email" type="email" id="email-input-text" placeholder="Ingrese el correo electrónico del empleado" value="{{ $employee->email }}">
			</div>

			<div class="form-group col-md-4">
				<div class="form-group">
					<label for="roles">Seleccione el rol del empleado</label>
					<select class="form-control" id="roles" name="role_id">
						@foreach($roles as $role)
						<option value="{{ $role->id }}" {{ ( $role->id == $employee->role_id) ? 'selected' : '' }} id="role-{{ $role->id }}">{{ $role->role }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-4">
				<label for="password-input" class="form-control-label">Ingrese la nueva contraseña (Opcional) - Solo ingresar si el empleado ha olvidado la contraseña</label>
				<input class="form-control" name="password" type="password" id="password-input" placeholder="Ingrese la nueva contraseña del empleado">
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-4">
				<button class="btn btn-icon btn-info" type="submit">
					<span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
					<span class="btn-inner--text">Actualizar Empleado</span>
				</button>
			</div>
		</div>
		
	</form>
</x-card>

@endsection