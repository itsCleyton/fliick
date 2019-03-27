<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'Fliick'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    @endif

    @yield('adminlte_css')
    @yield('cabecalho')
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
</head>
<body class="hold-transition @yield('body_class')">

@yield('body')

<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>

@if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endif

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-colvis-1.3.1/b-html5-1.3.1/b-print-1.3.1/cr-1.3.3/fc-3.2.2/r-2.1.1/sc-1.4.2/se-1.2.2/datatables.min.js"></script>
    <!-- <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script> -->
@endif

<script>
    $(document).ready(function(){

        //Rotina para preencher o select com os nomes das cidades
        $('#estado_id').change(function(){
            cidades();
        });

        //Rotina para preencher o select com os nomes das cidades
        window.cidades = function (){
            $('#cidade_id option').remove();
            var estado_id = $('#estado_id').val();
            $.ajax({
                url        : '{{route("admin.cidades")}}',
                data       : {estado_id:estado_id},
                success    : function(json){								     			
                    for(var i = 0; i < json.length; i++){
                        $('<option>' + json[i].nome + '</option>').attr({value:json[i].cidade_id}).appendTo("#cidade_id");
                    }
                },
                complete   : function(){
                    $('#cidade_id').select2();                    
                }		    	
            });
        }

        window.estados = function(){
            $('#estado_id option').remove();
            $.ajax({
                url        : '{{route("admin.estados")}}',
                data       : {ler_estados:'1'},
                success    : function(json){								     			
                    for(var i = 0; i < json.length; i++){
                        $('<option>' + json[i].nome + '</option>').attr({value:json[i].estado_id}).appendTo("#estado_id");
                    }
                },
                complete	: function(){
                    $('#estado_id').select2();                    
                    $('#estado_id').trigger('change',false);
                }		    	
            });
	    }

        window.buscaparametro = function (nome_param,id,option,select2=false){
            $('#'+ id +' option').remove();
            $.ajax({
                url        : '{{route("admin.parametros")}}',
                data       : nome_param,
                success    : function(json){	
                    $('<option value="">'+option+'</option>').appendTo('#'+id+'');
                    for(var i = 0; i < json.length; i++){
                        $('<option>' + json[i].descricao + '</option>').attr({value:json[i].valor}).appendTo('#'+id+'');
                    }
                },
                complete   : function(){
                    if (select2){
                        $('#'+id+'').select2();
                    }
                }		
            });
        }

        window.dadoscep = function(valor){
            var cep = valor.replace(/\D/g, '');
            if (cep != ""){
                var validacep = /^[0-9]{8}$/;
                if(validacep.test(cep)) {
                    $.ajax({
                        url     : '{{route("admin.buscacep")}}',
                        data    : {buscacep:cep},
                        success : function(dadoscep){
                            $.ajax({
                                url        : '{{route("admin.cidades")}}',
                                data       : {estado_id:dadoscep.estado_id},
                                success    : function(json){								     			
                                    $('#cidade_id option').remove();
                                    for(var i = 0; i < json.length; i++){
                                        $('<option>' + json[i].nome 
                                        + '</option>').attr({value:json[i].cidade_id}).appendTo("#cidade_id");
                                    }
                                    $('select[name=cidade_id]').val(dadoscep.cidade_id);
                                    $('#cidade_id').select2();                    
                                }	
                            });								     
                            $('select[name=estado_id]').val(dadoscep.estado_id);
                            $('#estado_id').trigger('change');
                            $('#logradouro').val(dadoscep.logradouro);
                            $('#bairro').val(dadoscep.bairro);
                        },
                        error 	: function(xhr, status, error) {
                            alert(xhr.responseText);
                        }
                    });
                }else{
                    alert("Digite um CEP válido.");
                }	
            }else{
                alert("Digite um CEP válido.");
            }
        }

        $(document).on('click','#buscamapa',function(){
            var cep = $('#cep').val();
            if (!cep){
                alert("Preencha o campo CEP e tente outra vez.");
                return false;
            }else{
                $.ajax({
                    url        : '{{route("admin.buscamapa")}}',
                    data       : {buscamapa:cep},
                    success    : function(json){
                        if(json.status == 'OK'){
                            $("#lat").val(json.lat);
                            $("#lng").val(json.lng);
                            $("#id_google").val(json.id_google);
                        }else{
                            alert(json.status);
                        }	
                    },
                    complete   : function(){
                        $("#dvLoading").fadeOut();
                    }	
                });	
                return false;
            }	
        });

        window.periodo = function(id){
            var start = moment().subtract(29, 'days');
            var end = moment();
            $('#'+id+'').daterangepicker({
                "locale": {
                    "format": "DD/MM/YYYY",
                    "separator": " - ",
                    "applyLabel": "Aplicar",
                    "cancelLabel": "Cancelar",
                    "fromLabel": "De",
                    "toLabel": "Para",
                    "customRangeLabel": "Personalizar",
                    "daysOfWeek": [
                        "Do",
                        "Se",
                        "Te",
                        "Qa",
                        "Qi",
                        "Se",
                        "Sa"
                    ],
                    "monthNames": [
                        "Janeiro",
                        "Fevereiro",
                        "Março",
                        "Abril",
                        "Maio",
                        "Junho",
                        "Julho",
                        "Agosto",
                        "Setembro",
                        "Outubro",
                        "Novembro",
                        "Dezembro"
                    ],
                    "firstDay": 1
                },
                startDate: start,
                endDate: end,
                ranges: {
                   'Hoje': [moment(), moment()],
                   'Ontem': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                   'Últimos 7 dias': [moment().subtract(6, 'days'), moment()],
                   'Últimos 30 Dias': [moment().subtract(29, 'days'), moment()],
                   'Este Mês': [moment().startOf('month'), moment().endOf('month')],
                   'Último Mês': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            });
        }

        $(document).on('click', '#cancel_conf',function() {
            $(".tabela").show();
            $(".confirmacao").hide();
        });

    });
</script>
@yield('adminlte_js')
@yield('local_js')
</body>
</html>
