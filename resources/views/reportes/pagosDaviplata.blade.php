@extends('layouts.admin')
@section('titulo')
<h3 class="box-title"><i class="fa fa-credit-card"></i> Pagos Daviplata </h3>
@endsection

@section('content')
<div class="container-fluid">
    {!! Form::open(array('method'=>'POST','autocomplete'=>'off') ) !!}
    {{Form::token()}}
        <table class="tabledata">
        <tr>
            <td>
                <b>Id servicio:</b>
            </td>
            <td>
                <input type="number" id="id_mensajero" name="id_mensajero" class="form-control" required="" placeholder="Id mensajero" />
            </td>
            {!! Form::close() !!}
            <td>
                <button id="miboton" class="btn btn-success"><i class="fa fa-file-excel-o" hidden="true"></i> Consultar y descargar</button>
            </td>
        </tr>
    </table>
</div>
@endsection

