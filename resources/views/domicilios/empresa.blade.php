<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="row1">
    <div id="personal_activo" class="col-lg-5 col-md-5 col-sm-5 col-xs-12 tabcontent">
        <div class="table-responsive">
            @if(!empty($empresa))
            {!! Form::open(array('url'=>'domicilios','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <table id="mitabla" class="table table-condensed table-hover table-bordered table-striped">
                @if (count($empresa)>0)
                @foreach ($empresa as $e)
                <tr>
                    <td><b>Id</b></td>
                    <td><input type="text" name="id_empresa" class="form-control" value="{{$e->id}}" placeholder="id empresa"></td>
                </tr>
                <tr>
                    <td><b>Nombre empresa</b></td>
                    <td><input type="text" name="nombre_empresa" class="form-control" value="{{$e->nombre_empresa}}" placeholder="nombre empresa"></td>
                </tr>
                <tr>
                    <td><b>Email contacto</b></td>
                    <td><input type="text" name="email_contacto" class="form-control" value="{{$e->email_contacto}}" placeholder="email contacto"></td>
                </tr>
                <tr>
                    <td><b>Celular</b></td>
                    <td><input type="text" name="celular" class="form-control" value="{{$e->celular}}" placeholder="celular"></td>
                </tr>
                <tr>
                    <td><b>Telefono</b></td>
                    <td><input type="text" name="telefono" class="form-control" value="{{$e->telefono}}" placeholder="telefono"></td>
                </tr>
                <tr>
                    <td><b>Dirección</b></td>
                    <td><input type="text" name="direccion" class="form-control" value="{{$e->direccion}}" placeholder="direccion"></td>
                </tr>
                <tr>
                    <td colspan="2">
                <centert><a href=""><button  class="btn btn-primary" type="submit">Guardar</button></a></centert>
                </td>
                </tr>
                @endforeach
                @else
                No hay datos
                @endif
                @endif

            </table>
            {{Form::close()}}
        </div>
    </div>
</div>
