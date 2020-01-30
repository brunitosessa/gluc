<div class="modal fade" id="happyglucModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Happy Gluc</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Happy Gluc -->
          {!! Form::model($bar->happygluc, ['route' => ['happygluc.store']]) !!}
            <div class="form-group">
              {!! Form::label('enabled', '¿Quieres ofrecer Happy Gluc?') !!}
              {!! Form::hidden('enabled',0) !!}
              {!! Form::checkbox('enabled', '1', old('enabled')) !!}
            </div>
            <div class="form-group">
              {!! Form::label('quantity', 'Cantidad') !!}
              {!! Form::number('quantity', old('frequency'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
              {!! Form::label('frequency', '¿Cada cuantos días?') !!}
              {!! Form::number('frequency', old('frequency'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
              {!! Form::label('exclusive', '¿Es exclusivo?') !!}
              {!! Form::hidden('exclusive',0) !!}
              {!! Form::checkbox('exclusive', '1', old('exclusive')) !!}
            </div>
                          
            {!! Form::button('Guardar', array('class' => 'btn btn-success float-right', 'type' => 'submit')) !!}
          {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>