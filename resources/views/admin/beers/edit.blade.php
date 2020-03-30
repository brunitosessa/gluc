<div class="modal fade" id="updateBeerModal-{{ $beer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Actualizar cerveza</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      {!! Form::model($beer, ['route' => ['admin.bars.beers.update', $beer->bar->id, $beer->id], 'method' => 'PATCH']) !!}
        <div class="form-group row">
          <div class="form-group col-6">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
          </div>

          <div class="form-group col-6">
            {!! Form::label('brand', 'Productor') !!}
            {!! Form::text('brand', old('brand'), ['class' => 'form-control']) !!}
          </div>
        </div>

        <div class="form-group row">
          <div class="form-group col-6">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Estilo</span>
              </div>
              {!! Form::text('style', old('style'), ['class' => 'form-control']) !!}
            </div>
          </div>

          <div class="form-group col-6">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Color</span>
              </div>
              {!! Form::text('color', old('color'), ['class' => 'form-control']) !!}
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="form-group col-6">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">IBU</span>
              </div>
              {!! Form::number('ibu', old('ibu'), ['class' => 'form-control']) !!}
            </div>
          </div>

          <div class="form-group col-6">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Alc</span>
              </div>
              {!! Form::number('alcohol', old('alcohol'), ['class' => 'form-control']) !!}
              <div class="input-group-append">
                <span class="input-group-text">%</span>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          {!! Form::label('description', 'Descripcion') !!}
          {!! Form::text('description', old('description'), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group row">
          <div class="form-group col-6">
            {!! Form::label('price', 'Precio') !!}
            <div class="input-group">
              {!! Form::number('price', old('price'), ['class' => 'form-control']) !!}
              <div class="input-group-append">
                <span class="input-group-text">$</span>
              </div>
            </div>
          </div>

          <div class="form-group col-6">
            {!! Form::label('happyhour_price', 'Precio en Happy Hour') !!}
            <div class="input-group">  
              {!! Form::number('happyhour_price', old('happyhour_price'), ['class' => 'form-control']) !!}
              <div class="input-group-append">
                <span class="input-group-text">$</span>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          {!! Form::label('enabled', 'Habilitado') !!}
          {!! Form::hidden('enabled',0) !!}
          {!! Form::checkbox('enabled', '1', old('enabled')) !!}
        </div>

        <hr>
        
        <div class="form-group">
          {{ Form::button('Guardar', array('class' => 'btn btn-success float-right', 'type' => 'submit')) }}
        </div>

      {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>