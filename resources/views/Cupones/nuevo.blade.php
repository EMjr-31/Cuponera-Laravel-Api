@extends('Layout.template')
@section('nombre_pagina','Lista de cupones')
@section('contenido')
<div class="container">
    <form>
        <fieldset>
          <legend>Titulo</legend>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Campo</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder="Input deshabilitado">
          </div>
          <div class="mb-3">
            <label for="disabledSelect" class="form-label">Campo</label>
            <select id="disabledSelect" class="form-select mi-selector">
                <option value=''>Seleccionar una marca</option>
                <option value='audi'>Audi</option>
                <option value='bmw'>BMW</option>
                <option value='citroen'>Citroen</option>
                <option value='fiat'>Fiat</option>
                <option value='ford'>Ford</option>
                <option value='honda'>Honda</option>
                <option value='hyundai'>Hyundai</option>
                <option value='kia'>Kia</option>
                <option value='mazda'>Mazda</option>
            </select>
          </div>
          <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled>

            </div>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </fieldset>
      </form>
</div>
@endsection