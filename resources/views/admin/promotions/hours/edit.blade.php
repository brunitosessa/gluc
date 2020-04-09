<div class="modal fade" id="updatePromotionHourModal-{{ $promotionHour->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Horario de promocion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        {!! Form::model($promotionHour, ['route' => ['admin.bars.promotions.hours.update', $promotionHour->promotion->bar->id, $promotionHour->id], 'method' => 'PATCH' , 'class' => 'form-inline']) !!}
        <div class="table-responsive">
          <table class="table">
            <thead>
                <th>Habilitado</th>
                <th>Día</th>
                <th>Apertura</th>
                <th>Cierre</th>
            </thead>

            <tbody>
              <tr>
                <td>
                  {!! Form::hidden('enabled',0) !!}
                  {!! Form::checkbox('enabled', '1', old('enabled')) !!}
                </td>
                <td>
                  {!! Form::select('date', $dow, old('date'), ['class' => 'form-control']) !!}
                </td>
                <td>
                  {!! Form::time('start_time', old('start_time'), ['class' => 'form-control']) !!}
                </td>
                <td>
                  {!! Form::time('end_time', old('end_time'), ['class' => 'form-control']) !!}
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