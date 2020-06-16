@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')


<body class="hold-transition skin-blue sidebar-mini">
  <!-- Content Wrapper. Contains page content -->
  <div>

    <!-- Main content -->
    <section class="content">        
       <!-- INICIO DA TABELA -->

        <div class="col-md-9">
          <div class="row">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Próximas reuniões </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body">
                <table id="lista1" class="table table-bordered table-striped dataTable" role="grid">
                      <thead>
                          <tr>
                              <th>Titulo</th>
                              <th>Data Inicial</th>
                              <th>Data Final</th>
                              <th>Local</th>
                              <th>Status</th>
                              <th>Prioridade</th>
                              <th>Ação</th>
                              </tr>
                      </thead>
                      <tbody>
                      @foreach($results as $x)
                      <tr>
                              <th scope="row">{{ $x->titulo }}</th>
                              <td>{{ $x->Data_Inicial }}</td>
                              <td>{{ $x->Data_Final }}</td>
                              <td>{{ $x->sala }}</td>
                              <td>{{ $x->status }}</td>
                              <td>{{ $x->prioridade }}</td>
                              <td>    
                                    <a class="btn btn-default"><i class="glyphicon glyphicon-edit"></i >  Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('meeting.delete',$x->id)}}' : false)"><i class="glyphicon glyphicon-trash"></i > Deletar</a>
                                    
                              </td>
                          <tr>
                      @endforeach                           
                      </tbody>
                  </table>

                  <div class="box-footer clearfix">
                      <a href="" class="btn btn-sm btn-primary btn-flat">Criar</a>
                      <a href="" class="btn btn-sm btn-warning btn-flat ">Ver todos</a>
                    </div>
              </div> 
              <!-- FIM DA div class="table-responsive"> -->
            </div>
            <!-- FIM DA box-header -->
        </div>
      </div>
                        
          </div>
          <!-- FIM DA TABELA -->
    @cannot('user')
    @endcannot('user')
    
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
  
</body>

@stop

