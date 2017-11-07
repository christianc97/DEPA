function validar() {
    var a0, a1, a2, b0, b1, b2, c1, c2, d1, d2, e1, e2, f1, f2, g1, g2, h1, h2 ;
    //lunes
    a0 = document.getElementById("lunes24"). value;
    a1 = document.getElementById("lunes1"). value;
    a2 = document.getElementById("lunes2"). value;
    //martes
    b0 = document.getElementById("martes24"). value;
    b1 = document.getElementById("martes1"). value;
    b2 = document.getElementById("martes2"). value;
    //miercoles
    c1 = document.getElementById("miercoles1"). value;
    c2 = document.getElementById("miercoles2"). value;
    //jueves
    d1 = document.getElementById("jueves1"). value;
    d2 = document.getElementById("jueves2"). value;
    //viernes
    e1 = document.getElementById("viernes1"). value;
    e2 = document.getElementById("viernes2"). value;
    //sabados
    f1 = document.getElementById("sabado1"). value;
    f2 = document.getElementById("sabado2"). value;
    //domingos
    g1 = document.getElementById("domingo1"). value;
    g2 = document.getElementById("domingo2"). value;
    //festivos
    h1 = document.getElementById("festivos1"). value;
    h2 = document.getElementById("festivos2"). value;

    //lunes
    if (isNaN(a1) || a1 >= 0  && a1 < 24) {
        text = "ok";
    } else {
        document.getElementById("lunes1" + id). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    if (isNaN(a2) || a2 >= 0  && a2 < 24) {
        text = "ok";
    } else {
        document.getElementById("lunes2"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    //martes
    if (isNaN(b1) || b1 >= 0  && b1 < 24) {
        text = "ok";
    } else {
        document.getElementById("martes1"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    if (isNaN(b2) || b2  >= 0  && b2 < 24) {
        text = "ok";
    } else {
        document.getElementById("martes2"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    //miercoles
    if (isNaN(c1) || c1 >= 0  && c1 < 24) {
        text = "ok";
    } else {
        document.getElementById("miercoles1"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    if (isNaN(c2) || c2 >= 0  && c2 < 24) {
        text = "ok";
    } else {
        document.getElementById("miercoles2"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    //jueves
    if (isNaN(d1) || d1 >= 0  && d1 < 24) {
        text = "ok";
    } else {
        document.getElementById("jueves1"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    if (isNaN(d2) || d2 >= 0  && d2 < 24) {
        text = "ok";
    } else {
        document.getElementById("jueves2"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    //viernes
    if (isNaN(e1) || e1 >= 0  && e1 < 24) {
        text = "ok";
    } else {
        document.getElementById("viernes1"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    if (isNaN(e2) || e2 >= 0  && e2 < 24) {
        text = "ok";
    } else {
        document.getElementById("viernes2"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    //sabados
    if (isNaN(f1) || f1 >= 0  && f1 < 24) {
        text = "ok";
    } else {
        document.getElementById("sabado1"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    if (isNaN(f2) || f2 >= 0  && f2 < 24) {
        text = "ok";
    } else {
        document.getElementById("sabado2"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    //domingos
    if (isNaN(g1) || g1 >= 0  && g1 < 24) {
        text = "ok";
    } else {
        document.getElementById("domingo1"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    if (isNaN(g2) || g2 >= 0  && g2 < 24) {
        text = "ok";
    } else {
        document.getElementById("domingo2"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    //festivos
    if (isNaN(h1) || h1 >= 0  && h1 < 24) {
        text = "ok";
    } else {
        document.getElementById("festivos1"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
    if (isNaN(h2) || h2 >= 0  && h2 < 24) {
        text = "ok";
    } else {
        document.getElementById("festivos2"). value = "";
        alert("Ingrese los valores estalecidos\nnumeros entre (0 y 23.99)");
    }
 }