@extends('layouts.admin')

@section('content')
<div class="col-md-12">
	<div class="card card-stats mx-4 my-4">
		<div class="row">
			<div class="col-md-12 d-flex justify-content-center my-4">
				<h3 class="display-4">Tabla de Clientes</h3>
			</div>
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<div>
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
							<tr>
								<th scope="row">
									<div class="media align-items-center">
										<div class="media-body">
											<span class="name mb-0 text-sm">Argon Design System</span>
										</div>
									</div>
								</th>
								<td class="budget">
									4432256669
								</td>
								<td class="budget">
									4 servicios
								</td>
								<td>
									<button type="button" class="btn btn-info">Editar</button>
									<button type="button" class="btn btn-danger">Eliminar</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

		</div>    
	</div>
</div>
@endsection