<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset='utf-8'/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema de Reunioes</title>
    <link rel="stylesheet" type="text/css" href="assets/fullcalendarNPM/css/fullcalendar.css">
    <link rel="stylesheet" type="text/css" href="assets/fullcalendarNPM/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/fullcalendarNPM/css/style.css">

</head>
<body>

<div id='wrap'>@yield('content')</div>

<div style='clear:both'></div>
<script src="assets/fullcalendarNPM/js/fullcalendar.js"></script>
<script src="assets/fullcalendarNPM/js/jquery-and-mask-and-moment.js"></script>
<script src="assets/fullcalendarNPM/js/bootstrap.js"></script>

<script src="assets/fullcalendarNPM/js/scriptCalendar.js"></script>
<!--
<script src='{{asset('assets/fullcalendarNPM/js/fullcalendar.js')}}'></script>
<script src='{{asset('assets/fullcalendarNPM/js/jquery-and-mask-and-moment.js')}}'></script>
<script src='{{asset('assets/fullcalendarNPM/js/bootstrap.js')}}'></script>

<script src='{{asset('assets/fullcalendarNPM/js/scriptCalendar.js')}}'></script>
-->

</body>
</html>
