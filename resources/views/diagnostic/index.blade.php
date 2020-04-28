
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Laudo</title>
 
        <!--Custon CSS (está em /public/assets/site/css/certificate.css)-->
        <link rel="stylesheet" href="{{ url('assets/site/css/certificate.css') }}">
    </head>
    <body>
         
 
 
<h1>Laudo</h1>
 
 
<ul>
            @forelse($Laudo as $Laudos)
                 
 
 
<li>{{ $Laudos->diagnostic }}</li>
 
 
<a> https://github.com/barryvdh/laravel-dompdf </a>
<a>https://blog.especializati.com.br/gerar-pdf-no-laravel-com-dompdf/</a>
            @empty
                 

 
<li>Nenhum Laudo Cadastrado.</li>
 
 
 
            @endforelse
        </ul>
 
 
 
    </body>
</html>
