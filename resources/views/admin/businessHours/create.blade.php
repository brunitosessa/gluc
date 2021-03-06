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
		    	{!! Form::open(['route' => ['admin.bars.businessHours.store', $bar->id], 'method' => 'POST']) !!}
		    	<div class="table-responsive">
					<table class="table">
					    <thead>
					        <th></th>
					        <th>Día</th>
					        <th>Apertura</th>
					        <th>Cierre</th>
					    </thead>
						
						<tbody>
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
							</tr>
						</tbody>
					</table>
				</div>
				
				<button class="btn btn-success float-right">Guardar</button>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>