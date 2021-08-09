<div>
	<x-error></x-error>
	<x-alert></x-alert>
	<x-table>
		<div class="d-flex">
			<div class="col-md-4 d-flex align-items-center">
				<div class="row">
					<div class="col-md-12">
						<h3 class="display-4 mb-0">Tabla de empleados</h3>
					</div>
				</div>
			</div>
			<div class="col-md-8 my-4">
				<div class="row">
					<div class="col">
						<input type="text" class="form-control" wire:model="search" placeholder="Buscar empleado por nombre">
					</div>
					<div class="col">
						<div class="row">
							<div class="col-md-12">
								<button type="button" class="btn btn-success text-white btn-block" href="#" data-toggle="modal" data-target="#new-employe" aria-hidden="false">
									<span class="btn-inner--icon"><i class="fas fa-user"></i></span>
									<span class="btn-inner--text">Nuevo empleado</span>
								</button>
								<!-- Modal -->
								<div class="modal fade" id="new-employe" role="dialog" aria-labelledby="new-employe" aria-hidden="false">
									<div class="modal-dialog" role="document">
										<form method="POST" action="{{ route('employe.store') }}">
											@csrf
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Nuevo empleado</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="row my-2">
														<div class="form-group col-md-12 mb-4">
															<label for="name">Nombre del empleado</label>
															<input type="text" class="form-control" placeholder="Ingrese el nombre del empleado" id="name" name="name" required>
														</div>
													</div>
													<div class="row my-2">
														<div class="form-group col-md-12 mb-4">
															<label for="email">Correo electrónico del empleado</label>
															<input type="email" class="form-control" placeholder="Ingrese el correo electrónico del empleado" id="email" name="email" required>
														</div>
													</div>
													<div class="row my-2">
														<div class="form-group col-md-12">
															<label for="password">Contraseña</label>
															<input type="password" class="form-control" placeholder="Ingrese la contraseña" id="password" name="password" required>
														</div>
														<div class="form-group col-md-12 mb-4">
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input" id="show-password">
																<label class="custom-control-label" for="show-password">Mostrar contraseña</label>
															</div>
														</div>

													</div>
													<div class="row my-2">
														<div class="form-group col-md-12 mb-4">
															<div class="form-group">
																<label for="roles">Seleccione el rol del empleado</label>
																<select class="form-control" id="roles" name="role_id">
																	@foreach($roles as $role)
																	<option value="{{ $role->id }}">{{ $role->role }}</option>
																	@endforeach
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
													<button type="submit" class="btn btn-success">Crear empleado</button>
												</div>
											</div>
										</form>
									</div>
								</div>
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
					<th scope="col" class="sort" data-sort="budget">Correo electrónico</th>
					<th scope="col" class="sort" data-sort="completion">Acciones</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody class="list">

				@foreach($employees as $employe)
				<tr>
					<th scope="row">
						<div class="media align-items-center">
							<div class="media-body">
								<span class="name mb-0 text-sm">{{ $employe->name }}</span>
							</div>
						</div>
					</th>
					<td class="budget">{{ $employe->email }}</td>
					<td class="d-flex">
						<button type="button" class="btn btn-success text-white" href="#" data-toggle="modal" data-target="#edit-employe">
							<span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
							<span class="btn-inner--text">Editar empleado</span>
						</button>

						<div class="modal fade" id="edit-employe" role="dialog" aria-labelledby="edit-employe" aria-hidden="false">
							<div class="modal-dialog" role="document">
								<form method="POST" action="{{ route('employe.update', $employe->id) }}">
									@method('PUT')
									@csrf
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Editar empleado</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="row my-2">
												<div class="form-group col-md-12 mb-4">
													<label for="name">Nombre del empleado</label>
													<input type="text" class="form-control" placeholder="Ingrese el nombre del empleado" id="name" name="name" value="{{ $employe->name }}" required>
												</div>
											</div>
											<div class="row my-2">
												<div class="form-group col-md-12 mb-4">
													<label for="email">Correo electrónico del empleado</label>
													<input type="email" class="form-control" placeholder="Ingrese el correo electrónico del empleado" id="email" name="email" value="{{ $employe->email }}" required>
												</div>
											</div>
											<div class="row my-2">
												<div class="form-group col-md-12 mb-4">
													<div class="form-group">
														<label for="roles">Seleccione el rol del empleado</label>
																<select class="form-control" id="roles" name="role_id">
																	@foreach($roles as $role)
																	<option value="{{ $role->id }}" {{ ( $role->id == $employe->role_id) ? 'selected' : '' }}>{{ $role->role }}</option>
																	@endforeach
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
													<button type="submit" class="btn btn-success">Editar empleado</button>
												</div>
											</div>
										</form>
									</div>
								</div>

								@if(Auth::user()->role_id === 1)
								<form class="form-delete" action="#" method="POST">
									@method("delete")
									@csrf
									<button type="submit" class="btn btn-danger text-white">
										<span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
										<span class="btn-inner--text">Eliminar empleado</span>
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
		<script>
			$(document).ready(function () {
				$('#show-password').click(function () {
					if ($('#show-password').is(':checked')) {
						$('#password').attr('type', 'text');
					} else {
						$('#password').attr('type', 'password');
					}
				});
			});
		</script>
		@endsection