
<!-- calendar.blade.php -->
<!doctype html>
<html lang="en">
<head>
<!-- Base do CSS para criação da agenda -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
</head>
<body>
<div class="container">
@if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
   <div class="panel panel-default">
         <div class="panel-heading">
             <li><a href="{{ URL::previous() }}"><b>Voltar</b></a></li>
            
         </div>

         <div class="panel-body" >
            {!! $calendar->calendar() !!}
        </div>
    </div>
</div>
<!-- Arquivos .JS para apresentação grafica da agenda e importação -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
</body>
</html>
