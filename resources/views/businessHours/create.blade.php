<div class="modal fade" id="businessHoursModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h5 class="modal-title" id="exampleModalLongTitle">Agregar horario</h5>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <div class="modal-body">
			<table class="table table-striped">
			    <thead>
			    	<tr>
				        <th scope="col">Habilitado</th>
				        <th scope="col">Día</th>
				        <th scope="col">Apertura</th>
				        <th scope="col">Cierre</th>
				        <th scope="col">Guardar</th>
			    	</tr>
			    </thead>
			</table>

			{!! Form::open(['route' => ['businessHours.store'], 'method' => 'POST']) !!}
				<table class="table table-borderless">
				    <tr>
						<td>
							{!! Form::hidden('enabled',0) !!}
							{!! Form::checkbox('enabled', '1','') !!}
						</td>
						<td>
							{!! Form::select('date', $dow, '', ['class' => 'form-control']) !!}
						</td>
						<td>
							{!! Form::time('start_time', '', ['class' => 'form-control']) !!}
						</td>
						<td>
							{!! Form::time('end_time', '', ['class' => 'form-control']) !!}
						</td>

						<td>
							<button class="btn btn-success">
								<i class="fas fa-check"></i>
							</button>
						</td>
					</tr>
				</table>
			{!! Form::close() !!}
		</div>