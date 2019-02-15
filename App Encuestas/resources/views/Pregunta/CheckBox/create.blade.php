@extends('layouts.app')
@section('content')
    &nbsp
    <h1 align="center">Crear Pregunta - Instalacion de Sistema</h1> {{---------------- VER COMO MOSTRAR LOS DATOS ---------------}}
    
    <div class="container">
        
        <form method="POST" action ={{route('preguntaCheck.store',$encuestaa->id_encuesta)}} class="form-group" > 
            @csrf
            <div class="container">
                <div class="form-group">
                    <label for="formGroupExampleInput">Ingrese Nueva pregunta : </label>
                    <input type="text" class="form-control" name="pregunta_check_new" id="formGroupExampleInput" placeholder="Ingrese Aqui"required>
                </div>
                <div class="form-inline">
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Selecione el tipo de respuesta :</label>
                    <select class="custom-select my-1 mr-sm-2" name="tipo_pregunta" id="inlineFormCustomSelectPref" required>
                        <option selected>Seleccione...</option>
                        <option value="CheckBox">checkbox</option>
                        <option value="Select">select</option>
                        <option value="String">string</option>
                    </select>
                </div>
            </div>
            <!--
            <div class="form-group">
                <label for="formGroupExampleInput">Si el tipo de respuesta fue "select", cree los campos(Maximo 4) : </label><br>
                <input type="text" class="form-control" name="select-campo1" id="formGroupExampleInput" placeholder="Ingrese Aqui campo 1"><br>
                <input type="text" class="form-control" name="select-campo2" id="formGroupExampleInput" placeholder="Ingrese Aqui campo 2"><br>
                <input type="text" class="form-control" name="select-campo3" id="formGroupExampleInput" placeholder="Ingrese Aqui campo 3"><br>
                <input type="text" class="form-control" name="select-campo4" id="formGroupExampleInput" placeholder="Ingrese Aqui campo 4"><br>
            </div>
            -->
            &nbsp
            {{--IMPORTANTE CAMPO "TYPE=SUBMIT" PARA EL CREATE--}}
            <button class="btn btn-success btn-sm" type="submit" name="createButton">Crear Pregunta</button>
        </form>
    </div>
    
    <a class="btn btn-secondary btn-sm" href="{{ route('preguntaCheck.index',$encuestaa->id_encuesta) }}" role="button">Atras</a>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <script>
        $(document).ready(function(){
            //
        });
    </script>
@endsection