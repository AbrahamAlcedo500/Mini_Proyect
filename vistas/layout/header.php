<?php
// Capturamos la estación para cambiar el fondo dinámicamente
$estacionClase = 'fondo-defecto';

if (isset($resultado) && is_string($resultado)) {
    if (strpos($resultado, 'VERANO') !== false) $estacionClase = 'fondo-verano';
    if (strpos($resultado, 'OTOÑO') !== false) $estacionClase = 'fondo-otono';
    if (strpos($resultado, 'INVIERNO') !== false) $estacionClase = 'fondo-invierno';
    if (strpos($resultado, 'PRIMAVERA') !== false) $estacionClase = 'fondo-primavera';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>UTP - Taller Mini Proyecto #2</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

:root{
    --primary:#00d4ff;
    --primary-dark:#0099cc;
    --secondary:#38bdf8;

    --text:#f8fafc;
    --text-light:#cbd5e1;

    --success:#22c55e;
    --success-bg:#052e16;

    --card-bg:rgba(15,23,42,.85);
}

/* ==========================
   RESET
========================== */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Poppins',sans-serif;
    min-height:100vh;
    display:flex;
    flex-direction:column;
    transition:all .6s ease;
}

/* ==========================
   FONDOS
========================== */

.fondo-defecto{
    background:
        radial-gradient(circle at top left,#00d4ff 0%,transparent 30%),
        radial-gradient(circle at bottom right,#0ea5e9 0%,transparent 30%),
        linear-gradient(135deg,#020617,#0f172a,#1e293b);
}

.fondo-verano{
    background:
        linear-gradient(rgba(0,0,0,.45),rgba(0,0,0,.45)),
        url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1920&q=80')
        center center/cover fixed;
}

.fondo-otono{
    background:
        linear-gradient(rgba(0,0,0,.50),rgba(0,0,0,.50)),
        url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1920&q=80')
        center center/cover fixed;
}

.fondo-invierno{
    background:
        linear-gradient(rgba(0,0,0,.45),rgba(0,0,0,.45)),
        url('https://images.unsplash.com/photo-1491002052546-bf38f186af56?auto=format&fit=crop&w=1920&q=80')
        center center/cover fixed;
}

.fondo-primavera{
    background:
        linear-gradient(rgba(0,0,0,.45),rgba(0,0,0,.45)),
        url('https://images.unsplash.com/photo-1490730141103-6cac27aaab94?auto=format&fit=crop&w=1920&q=80')
        center center/cover fixed;
}

/* ==========================
   CONTENEDOR
========================== */

.container{
    width:min(95%,1000px);

    margin:50px auto;

    padding:45px;

    background:var(--card-bg);

    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);

    border-radius:28px;

    border:1px solid rgba(255,255,255,.08);

    box-shadow:
        0 20px 50px rgba(0,0,0,.4);
}

/* ==========================
   TITULOS
========================== */

h1,h2,h3{
    color:var(--text);
}

h2{
    font-size:2.2rem;
    font-weight:800;

    color:#67e8f9;

    border-bottom:1px solid rgba(103,232,249,.2);

    padding-bottom:18px;

    margin-bottom:20px;
}

h3{
    font-size:1.3rem;
    font-weight:700;
}

.subtitle{
    color:#94a3b8;
    line-height:1.8;
    margin-bottom:30px;
}

/* ==========================
   TARJETAS
========================== */

.grid-problemas{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
    gap:25px;
    margin-top:30px;
}

.card{
    background:rgba(30,41,59,.85);

    border:1px solid rgba(255,255,255,.06);

    border-radius:20px;

    padding:25px;

    text-decoration:none;

    transition:.35s ease;

    color:white;
}

.card:hover{

    transform:translateY(-8px);

    border-color:#22d3ee;

    box-shadow:
        0 15px 35px rgba(34,211,238,.18);
}

.card strong{

    display:block;

    color:#67e8f9;

    font-size:18px;

    margin-bottom:10px;
}

.card span{

    color:#cbd5e1;

    line-height:1.6;
}

/* ==========================
   FORMULARIOS
========================== */

.form-group{
    margin-bottom:22px;
}

label{

    display:block;

    margin-bottom:8px;

    color:#e2e8f0;

    font-weight:600;
}

input[type="number"],
input[type="text"],
input[type="date"]{

    width:100%;

    padding:15px;

    border-radius:14px;

    border:2px solid #334155;

    background:#0f172a;

    color:white;

    font-size:15px;

    transition:.3s;
}

input:focus{

    outline:none;

    border-color:#22d3ee;

    box-shadow:
        0 0 0 5px rgba(34,211,238,.15);
}

/* ==========================
   BOTONES
========================== */

button{

    width:100%;

    padding:16px;

    border:none;

    border-radius:14px;

    background:
        linear-gradient(
            135deg,
            #06b6d4,
            #0891b2
        );

    color:white;

    font-size:15px;

    font-weight:700;

    cursor:pointer;

    letter-spacing:.5px;

    transition:.3s;
}

button:hover{

    transform:translateY(-3px);

    box-shadow:
        0 10px 30px rgba(6,182,212,.35);
}

/* ==========================
   RESULTADOS
========================== */

.resultado-box{

    margin-top:35px;

    background:#052e16;

    border-left:6px solid #22c55e;

    border-radius:18px;

    padding:25px;
}

.resultado-box h3{

    color:#86efac;

    margin-bottom:15px;
}

.resultado-box pre{

    color:#dcfce7;

    white-space:pre-wrap;

    line-height:1.8;

    font-size:15px;
}

/* ==========================
   ESTACIONES
========================== */

.resultado-estacion-box{

    margin-top:35px;

    text-align:center;

    padding:30px;

    border-radius:20px;

    background:
        rgba(6,182,212,.08);

    border:2px solid rgba(34,211,238,.25);

    backdrop-filter:blur(10px);
}

.resultado-estacion-box h3{

    color:#67e8f9;

    margin-bottom:12px;
}

.resultado-estacion-box p{

    color:#ffffff;

    font-size:18px;

    font-weight:700;
}

/* ==========================
   LINKS
========================== */

a{
    color:#67e8f9;
    text-decoration:none;
    transition:.3s;
}

a:hover{
    color:#ffffff;
}

/* ==========================
   RESPONSIVE
========================== */

@media(max-width:768px){

    .container{
        width:95%;
        padding:25px;
        margin:20px auto;
    }

    h2{
        font-size:1.7rem;
    }

    .grid-problemas{
        grid-template-columns:1fr;
    }
}

</style>

</head>

<body class="<?php echo $estacionClase; ?>">