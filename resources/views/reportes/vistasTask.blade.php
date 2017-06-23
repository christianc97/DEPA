<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="panel">
        <div class="panel-body">
            <b>Task</b>
        </div>
    </div>
    <div class="panel panel-body">
        <table id="mitabla" class="table table-condensed table-hover table-bordered table-striped">
            @if (count($task)>0)
            @foreach($task as $t)
            <tr>
                <td>id</td>
                <td>{{$t->id}}</td>
            </tr>
            <tr>
                <td>uuid</td>
                <td>{{$t->uuid}}</td>
            </tr>
            <tr>
                <td>descripcion</td>
                <td>{{$t->descripcion}}</td>
            </tr>
            <tr>
                <td>type_task_id</td>
                <td>{{$t->type_task_id}}</td>
            </tr>
            <tr>
                <td>fecha inicio</td>
                <td>{{$t->fecha_inicio}}</td>
            </tr>
            <tr>
                <td>hora inicio</td>
                <td>{{$t->hora_inicio}}</td>
            </tr>
            <tr>
                <td>fecha final</td>
                <td>{{$t->fecha_final}}</td>
            </tr>
            <tr>
                <td>hora final</td>
                <td>{{$t->hora_final}}</td>
            </tr>
            <tr>
                <td>valor declarado</td>
                <td>{{$t->valor_declarado}}</td>
            </tr>
            <tr>
                <td>valor descuento</td>
                <td>{{$t->valor_descuento}}</td>
            </tr>
            <tr>
                <td>recargo distancia</td>
                <td>{{$t->recargo_distancia}}</td>
            </tr>
            <tr>
                <td>recargo ida y vuelta</td>
                <td>{{$t->recargo_ida_vuelta}}</td>
            </tr>
            <tr>
                <td>recargo seguro</td>
                <td>{{$t->recargo_seguro}}</td>
            </tr>
            <tr>
                <td>recargo tiempo</td>
                <td>{{$t->recargo_tiempo}}</td>
            </tr>
            <tr>
                <td>Tiempo adicional</td>
                <td>{{$t->tiempo_adicional}}</td>
            </tr>
            <tr>
                <td>Valor total</td>
                <td>{{$t->valor_total}}</td>
            </tr>
            <tr>
                <td>Comision</td>
                <td>{{$t->comision}}</td>
            </tr>
            <tr>
                <td>Total otro</td>
                <td>{{$t->total_otro}}</td>
            </tr>
            <tr>
                <td>Estado</td>
                <td>{{$t->estado}}</td>
            </tr>
            <tr>
                <td>Solicitante</td>
                <td>{{$t->solicitante}}</td>
            </tr>
            <tr>
                <td>Estado pago</td>
                <td>{{$t->estado_pago}}</td>
            </tr>
            <tr>
                <td>type task carga id</td>
                <td>{{$t->type_task_carga_id}}</td>
            </tr>
            <tr>
                <td>Code prom</td>
                <td>{{$t->code_prom }}</td>
            </tr>
            <tr>
                <td>Ciudad id</td>
                <td>{{$t->ciudad_id}}</td>
            </tr>
            <tr>
                <td>Date created</td>
                <td>{{$t->date_created}}</td>
            </tr>
            <tr>
                <td>Date_modify</td>
                <td>{{$t->date_modify}}</td>
            </tr>
            <tr>
                <td>User modify</td>
                <td>{{$t->user_modify}}</td>
            </tr>
            <tr>
                <td>User create</td>
                <td>{{$t->usercreate}}</td>
            </tr>
            <tr>
                <td>Distancia</td>
                <td>{{$t->distancia}}</td>
            </tr>
            <tr>
                <td>Paradas</td>
                <td>{{$t->paradas}}</td>
            </tr>
            <tr>
                <td>Recargo paradas</td>
                <td>{{$t->recargo_paradas}}</td>
            </tr>
            <tr>
                <td>Night surcharge</td>
                <td>{{$t->night_surcharge}}</td>
            </tr>
            <tr>
                <td>Parking surcharge</td>
                <td>{{$t->parking_surcharge}}</td>
            </tr>
            <tr>
                <td>Ida y vuelta</td>
                <td>{{$t->ida_vuelta}}</td>
            </tr>
            <tr>
                <td>Term</td>
                <td>{{$t->term}}</td>
            </tr>
            <tr>
                <td>Cc</td>
                <td>{{$t->cc}}</td>
            </tr>
            <tr>
                <td>Factura</td>
                <td>{{$t->factura}}</td>
            </tr>
            <tr>
                <td>Mix</td>
                <td>{{$t->mix}}</td>
            </tr>
            <tr>
                <td>Fuente</td>
                <td>{{$t->fuente}}</td>
            </tr>
            <tr>
                <td>Os</td>
                <td>{{$t->os}}</td>
            </tr>
            <tr>
                <td>Tipo pago terceros</td>
                <td>{{$t->tipo_pago_terceros}}</td>
            </tr>
            <tr>
                <td>Tipo segmentacion id</td>
                <td>{{$t->tipo_segmentacion_id}}</td>
            </tr>
            <tr>
                <td>Tipo recurso</td>
                <td>{{$t->tipo_recurso}}</td>
            </tr>
            <tr>
                <td>Id resource</td>
                <td>{{$t->id_resource}}</td>
            </tr>
            <tr>
                <td>Resource name</td>
                <td>{{$t->resource_name}}</td>
            </tr>
            <tr>
                <td>Id company</td>
                <td>{{$t->id_company}}</td>
            </tr>
            <tr>
                <td>Name_company</td>
                <td>{{$t->name_company}}</td>
            </tr>
            <tr>
                <td>Phone company</td>
                <td>{{$t->phone_company}}</td>
            </tr>
            <tr>
                <td>Customer name</td>
                <td>{{$t->customer_name}}</td>
            </tr>
            <tr>
                <td>Customer email</td>
                <td>{{$t->customer_email}}</td>
            </tr>
            <tr>
                <td>Customer phone</td>
                <td>{{$t->customer_phone}}</td>
            </tr>
            <tr>
                <td>Status date</td>
                <td>{{$t->status_date}}</td>
            </tr>
            <tr>
                <td>activacion</td>
                <td>{{$t->activation}}</td>
            </tr>
            <tr>
                <td>tags_edit</td>
                <td>{{$t->tags_edit}}</td>
            </tr>
            <tr>
                <td>Rating</td>
                <td>{{$t->rating}}</td>
            </tr>
            <tr>
                <td>rating distace</td>
                <td>{{$t->rating_distance}}</td>
            </tr>
            <tr>
                <td>Rating time</td>
                <td>{{$t->rating_time}}</td>
            </tr>
            <tr>
                <td>Rating client</td>
                <td>{{$t->rating_client}}</td>
            </tr>
            <tr>
                <td>Resolved</td>
                <td>{{$t->resolved}}</td>
            </tr>
            @endforeach
            @else
            No hay datos
            @endif
        </table>
    </div>
</div>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 table-responsive ">
    <div class="panel">
        <div class="panel-body">
            <b>Task places</b>
        </div>
    </div>
    <table id="mitabla" class="table table-condensed table-hover table-bordered table-striped">
        <tr>
            <td>id</td>
            <td>tipo task places</td>
            <td>latitud</td>
            <td>longitud</td>
            <td>address</td>
            <td>direccion</td>
            <td>post code</td>
            <td>localidad</td>
            <td>neighborhood</td>
            <td>ciudad</td>
            <td>estado</td>
            <td>pais</td>
            <td>date create</td>
            <td>date update</td>
            <td>Task id</td>
            <td>Descripcion</td>
            <td>estado p</td>
            <td>Valor compra</td>
            <td>Client name</td>
            <td>Client_phone</td>
            <td>Client email</td>
            <td>Paiment type</td>
            <td>Products value</td>
            <td>Domicile value</td>
            <td>Order id</td>
            <td>Document</td>
            <td>Token</td>
            <td>Type</td>
            <td>OGR FID</td>
        </tr>
        @if (count($task_places)>0)
        @foreach($task_places as $tp)
        <tr>
            <td>{{$tp->id}}</td>
            <td>{{$tp->tipo_task_places}}</td>
            <td>{{$tp->lat}}</td>
            <td>{{$tp->long}}</td>
            <td>{{$tp->address}}</td>
            <td>{{$tp->direccion}}</td>
            <td>{{$tp->postcode}}</td>
            <td>{{$tp->localidad}}</td>
            <td>{{$tp->neighborhood}}</td>
            <td>{{$tp->ciudad}}</td>
            <td>{{$tp->estado}}</td>
            <td>{{$tp->pais}}</td>
            <td>{{$tp->datecreate}}</td>
            <td>{{$tp->dateupdate}}</td>
            <td>{{$tp->task_id}}</td>
            <td>{{$tp->descripcion}}</td>
            <td>{{$tp->estado_p}}</td>
            <td>{{$tp->valor_compra}}</td>
            <td>{{$tp->client_name}}</td>
            <td>{{$tp->client_phone}}</td>
            <td>{{$tp->client_email}}</td>
            <td>{{$tp->paiment_type}}</td>
            <td>{{$tp->products_value}}</td>
            <td>{{$tp->domicile_value}}</td>
            <td>{{$tp->order_id}}</td>
            <td>{{$tp->document}}</td>
            <td>{{$tp->token}}</td>
            <td>{{$tp->type}}</td>
            <td>{{$tp->OGR_FID}}</td>
        </tr>
        @endforeach
        @else
        No hay datos
        @endif
    </table>
</div><br>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 table-responsive ">
    <div class="panel">
        <div class="panel-body">
            <b>Task history</b>
        </div>
    </div>
    <table id="mitabla" class="table table-condensed table-hover table-bordered table-striped">
        <tr>
            <td>id</td>
            <td>task id</td>
            <td>type task status id</td>
            <td>recurso id</td>
            <td>type task pago id</td>
            <td>date create</td>
            <td>latitud</td>
            <td>longitud</td>
            <td>task_places_id</td>
            <td>descripcion</td>
            <td>tipo cancelacion</td>
            <td>distancia</td>
            <td>tipo parada</td>
            <td>create users id</td>
            <td>penalizacion</td>
            <td>verification code</td>
            <td>status code verification</td>
            <td>is fake location</td>
        </tr>
        @if (count($task_history)>0)
        @foreach($task_history as $th)
        <tr>
            <td>{{$th->id}}</td>
            <td>{{$th->task_id}}</td>
            <td>{{$th->type_task_status_id}}</td>
            <td>{{$th->recurso_id}}</td>
            <td>{{$th->type_task_pago_id}}</td>
            <td>{{$th->datecreate}}</td>
            <td>{{$th->lat}}</td>
            <td>{{$th->long}}</td>
            <td>{{$th->task_places_id}}</td>
            <td>{{$th->descripcion}}</td>
            <td>{{$th->tipo_cancelacion}}</td>
            <td>{{$th->distancia}}</td>
            <td>{{$th->tipo_parada}}</td>
            <td>{{$th->create_users_id}}</td>
            <td>{{$th->penalizacion}}</td>
            <td>{{$th->verification_code}}</td>
            <td>{{$th->status_code_verification}}</td>
            <td>{{$th->is_fake_location}}</td>
        </tr>
        @endforeach
        @else
        No hay datos
        @endif
    </table>
</div>
