<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div class="modal fade modal-slide-in-left " aria-hidden="true" role="dialog" tabindex="-1" id="modal-view-{{$pd->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="modal-title">Nombre Punto <b>{{$pd->nombre}}</b></h3>
        </div>
        <div class="modal-body">
            <p>
                <label class="label label-primary">Lunes:</label>&ensp;
                <b>24 horas:</b>
                <input type="checkbox" onchange="lunes(this.checked);" value="24" id="dialunes">&ensp;
                <b>Hora apertura:</b> 
                <input type="time" id="lunes1" name="" autofocus="">&ensp;
                <b>Hora cierre:</b>
                <input type="time" id="lunes2" name="">
            </p>
                <hr>
          <div class="form-group">
            <div class="clearfix">
                <p>
                <label class="label label-primary">Martes:</label>&ensp;
                <b>24 horas:</b>
                <input type="checkbox" onchange="martes(this.checked);">&ensp;
                <b>Hora apertura:</b> 
                <input type="time" id="martes1" name="">&ensp;
                <b>Hora cierre:</b>
                <input type="time" id="martes2" name="">
            </p>
            </div>
          </div>
          <hr>
          <div class="form-group">
            <div class="clearfix">
                <p>
                <label class="label label-primary">Miercoles:</label>&ensp;
                <b>24 horas:</b>
                <input type="checkbox" onchange="miercoles(this.checked);" >&ensp;
                <b>Hora apertura:</b> 
                <input type="time" id="miercoles1" name="">&ensp;
                <b>Hora cierre:</b>
                <input type="time" id="miercoles2" name="">
            </p>
            </div>
          </div>
          <hr>
          <div class="form-group">
            <div class="clearfix">
                <p>
                <label class="label label-primary">Jueves:</label>&ensp;
                <b>24 horas:</b>
                <input type="checkbox" onchange="jueves(this.checked);" >&ensp;
                <b>Hora apertura:</b> 
                <input type="time" id="jueves1" name="">&ensp;
                <b>Hora cierre:</b>
                <input type="time" id="jueves2" name="">
            </p>
            </div>
          </div>
          <hr>
          <div class="form-group">
            <div class="clearfix">
                <p>
                <label class="label label-primary">Viernes:</label>&ensp;
                <b>24 horas:</b>
                <input type="checkbox" onchange="viernes(this.checked);" >&ensp;
                <b>Hora apertura:</b> 
                <input type="time" id="viernes1" name="">&ensp;
                <b>Hora cierre:</b>
                <input type="time" id="viernes2" name="">
            </p>
            </div>
          </div>
          <hr>
          <div class="form-group">
            <div class="clearfix">
                <p>
                <label class="label label-success">Sabado:</label>&ensp;
                <b>24 horas:</b>
                <input type="checkbox" onchange="sabado(this.checked);" >&ensp;
                <b>Hora apertura:</b> 
                <input type="time" id="sabado1" name="">&ensp;
                <b>Hora cierre:</b>
                <input type="time" id="sabado2" name="">
            </p>
            </div>
          </div>
          <hr>
          <div class="form-group">
            <div class="clearfix">
                <p>
                <label class="label label-warning">Domingo:</label>&ensp;
                <b>24 horas:</b>
                <input type="checkbox" onchange="domingo(this.checked);" >&ensp;
                <b>Hora apertura:</b> 
                <input type="time" id="domingo1" name="">&ensp;
                <b>Hora cierre:</b>
                <input type="time" id="domingo2" name="">
            </p>
            </div>
          </div>
          <hr>
          <div class="form-group">
            <div class="clearfix">
                <p>
                <label class="label label-danger">Festivos:</label>&ensp;
                <b>24 horas:</b>
                <input type="checkbox" onchange="festivos(this.checked);" >&ensp;
                <b>Hora apertura:</b> 
                <input type="time" id="festivos1" name="">&ensp;
                <b>Hora cierre:</b>
                <input type="time" id="festivos2" name="">
            </p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger " data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="falert();">Guardar</button>
        </div>        
      </div>
    </div>
</div>
<script>
        function lunes(value)
        {
            if(value==false)
            {
                document.getElementById("lunes1").disabled=false;
                document.getElementById("lunes2").disabled=false;
            }else if(value==true){
                document.getElementById("lunes1").disabled=true;
                document.getElementById("lunes2").disabled=true;
            }
        }
        function martes(value)
        {
            if(value==false)
            {
                document.getElementById("martes1").disabled=false;
                document.getElementById("martes2").disabled=false;
            }else if(value==true){
                document.getElementById("martes1").disabled=true;
                document.getElementById("martes2").disabled=true;
            }
        }
        function miercoles(value)
        {
            if(value==false)
            {
                document.getElementById("miercoles1").disabled=false;
                document.getElementById("miercoles2").disabled=false;
            }else if(value==true){
                document.getElementById("miercoles1").disabled=true;
                document.getElementById("miercoles2").disabled=true;
            }
        }
        function jueves(value)
        {
            if(value==false)
            {
                document.getElementById("jueves1").disabled=false;
                document.getElementById("jueves2").disabled=false;
            }else if(value==true){
                document.getElementById("jueves1").disabled=true;
                document.getElementById("jueves2").disabled=true;
            }
        }
        function viernes(value)
        {
            if(value==false)
            {
                document.getElementById("viernes1").disabled=false;
                document.getElementById("viernes2").disabled=false;
            }else if(value==true){
                document.getElementById("viernes1").disabled=true;
                document.getElementById("viernes2").disabled=true;
            }
        }
        function sabado(value)
        {
            if(value==false)
            {
                document.getElementById("sabado1").disabled=false;
                document.getElementById("sabado2").disabled=false;
            }else if(value==true){
                document.getElementById("sabado1").disabled=true;
                document.getElementById("sabado2").disabled=true;
            }
        }
        function domingo(value)
        {
            if(value==false)
            {
                document.getElementById("domingo1").disabled=false;
                document.getElementById("domingo2").disabled=false;
            }else if(value==true){
                document.getElementById("domingo1").disabled=true;
                document.getElementById("domingo2").disabled=true;
            }
        }
        function festivos(value)
        {
            if(value==false)
            {
                document.getElementById("festivos1").disabled=false;
                document.getElementById("festivos2").disabled=false;
            }else if(value==true){
                document.getElementById("festivos1").disabled=true;
                document.getElementById("festivos2").disabled=true;
            }
        }
        function falert(value)
        {
            var val = document.getElementById('dialunes').alert(val);
        }
</script>
</body>
</html>