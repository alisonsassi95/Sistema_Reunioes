@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')


<body class="hold-transition skin-blue sidebar-mini">
  <!-- Content Wrapper. Contains page content -->
  <div>

    <!-- Main content -->
    <section class="content">

      @cannot('user')
        
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Quant. Usuários</span>
            <span class="info-box-number"><small></small></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Quant. Médicos</span>
              <span class="info-box-number"></span>
            </div>
          </div>
        </div>

        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Quant. Funcionários</span>
              <span class="info-box-number"></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Quant. Pacientes</span>
              <span class="info-box-number"></span>
            </div>
          </div>
        </div>
      </div>

       <!-- LATERAL -->
       
          <!-- Info Boxes Style 2 -->
          <div class="row">
              <div class="col-md-3 col-sm-6 col-xs-12">

          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Exames Solicitados</span>
              <span class="info-box-number"></span>
          </div>
        </div>
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Exames Realizados</span>
              <span class="info-box-number"><</span>
            </div>
          </div>


          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Exames Cancelados</span>
              <span class="info-box-number"></span>
            </div>
          </div>
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Exames Agendados</span>
              <span class="info-box-number"></span>
            </div>
          </div>
        </div>

    


       <!-- fim da Info boxes -->

       <!-- INICIO DA TABELA -->

        <div class="col-md-9">
          <div class="row">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Próximos</h3>

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
                              <th>ID</th>
                              <th>Paciente</th>
                              <th>Médico</th>
                              <th>Data Realizada</th>
                              <th>Tipo Equipamento</th>
                              <th>Staus</th>
                              </tr>
                      </thead>
                      <tbody>
                                                
                      </tbody>
                  </table>

                  <div class="box-footer clearfix">
                      <a href="" class="btn btn-sm btn-primary btn-flat">Criar um novo Exame</a>
                      <a href="" class="btn btn-sm btn-warning btn-flat ">Ver todos os exames</a>
                    </div>

      
              </div> 
              <!-- FIM DA div class="table-responsive"> -->
            </div>
            <!-- FIM DA box-header -->
        </div>
      </div>
                        
          </div>
          <!-- FIM DA TABELA -->
          </div>

        </section>
    </div>

    
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

