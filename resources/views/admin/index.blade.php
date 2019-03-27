@extends('adminlte::page')

@section('title', 'Fliick')

@section('content_header')
    <h1>Meus eventos</h1>
@stop

@section('content')
<div class="col-md-12">
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Line Chart</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="chart">
        <canvas id="lineChart" style="height: 250px; width: 789px;" width="789" height="250"></canvas>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
</div>
@stop
@section('local_js')
<script>
    
    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData, lineChartOptions)

    </script>
@endsection