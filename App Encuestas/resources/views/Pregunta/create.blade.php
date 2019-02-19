@extends('layouts.app')
@section('content')
    
    <h1 align="center">Crear Pregunta</h1>
    <h5 align="center"> {{$pagina->nombre_seccion}}</h5>
    
    <div class="container">
        
        <form method="POST" action ={{route('pregunta.store',$pagina->id_pagina)}} class="form-group" > 
            @csrf
            {!! csrf_field()!!}
            <div class="form-group">
                <label for="formGroupExampleInput">Ingrese Nueva pregunta : </label>
                <input type="text" class="form-control" name="pregunta_new" id="formGroupExampleInput" placeholder="Ingrese Aqui"required>
            </div>
            <div class="form-inline">
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Selecione el tipo de respuesta :</label>
                <select class="custom-select my-1 mr-sm-2" name="tipo_pregunta" id="respuestaSelect" required="required">
                    <option selected>Seleccione...</option>
                    <option value="CheckBox">checkbox</option>
                    <option id = "Select" name="tipo_pregunta_select" value="Select">select</option>
                    <option value="String">string</option>
                </select><br>
            </div><br>
            
            <!--
            <div id ="id_select" class="div">
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Ingrese una nueva opcion al select :</label>
                <select class="custom-select my-1 mr-sm-2" name="tipo_pregunta" id="respuestaSelect" required="required">
                        <option selected>Seleccione...</option>
                </select>
            </div>
            -->
            {{--IMPORTANTE CAMPO "TYPE=SUBMIT" PARA EL CREATE--}}
            <button class="btn btn-success btn-sm" type="submit" name="createButton" >Crear Pregunta</button>
        </form>
        <div id="id_select" class="div" >
            <select class="custom-select my-1 mr-sm-2" name="tipo_pregunta" id="respuestaSelect" required="required">
                <option selected>Seleccione...</option>
            </select>
            <input type="text" class="form-control" id="val"><br>
            <button id="addButton" class="btn btn-success" >Agregar campo</button><br>
            &nbsp
        </div>
    </div>
    
    <a class="btn btn-secondary btn-sm" href="{{ route('pregunta.index',$pagina->id_pagina) }}" role="button">Atras</a> {{--ENVIAR PAGINA--}}

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <script> //generar cuantas opciones tiene que tener el el checkbox

        $(document).ready(function(){

            
            $("#respuestaSelect").change(function() {
                var selectvalue = $("#respuestaSelect").val();
                //alert(selectvalue);
                if (selectvalue == 'Select') { // "Select" Es el Value del option 
                
                    $("#addButton").click(function(){

                        var textvalue = $("#val").val();

                        $("select").append($('<option>', {
                            value: 1,
                            text: textvalue
                        }));
                    });
                } else {
                    //alert("No es select");
                }
                
            });
            
            /*
            $("#respuestaSelect").change(function() {
                alert($(this).val());
                //alert($('#my-select option:selected').html());
            });
            */
            /*
            $("#addButton").click(function(){
                var textvalue = $("#val").val();
                $("select").append($('<option>', {
                    value: 1,
                    text: textvalue
                }));
            });
            */
        });
        
    </script>
@endsection