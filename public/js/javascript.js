$(document).ready(function(){

//-------------------- ROTINAS GENERICAS ------------------------------	
	//sair do sistema
	// $('#sair').click(function(){
	// 	$.fn.jAlert({
	// 		'title'		: 'Deseja realmente sair?',
	// 		'content'	: 'Sair do I.P. Simples',
	// 		'size'   	: 'auto',
	// 		closeBtnAlt	: true,
	// 		'btns'		: [
	// 			{
	// 				'text'			: 'Confirmar', 
	// 				'theme'     	: 'blue', 
	// 				'closeOnClick'	: true, 
	// 				'onClick'     	: function(){
	// 					location.href ='rotinas.php?sair=1';
	// 				} 
	// 			}
	// 		]
	// 	});
	// });

	//sair do sistema
	// $('#sairc').click(function(){
	// 	$.fn.jAlert({
	// 		'title'		: 'Deseja realmente sair?',
	// 		'content'	: 'Sair do I.P. Simples',
	// 		'size'   	: 'auto',
	// 		closeBtnAlt	: true,
	// 		'btns'		: [
	// 			{
	// 				'text'			:'Confirmar', 
	// 				'theme'     	: 'blue', 
	// 				'closeOnClick'	: true, 
	// 				'onClick'     	: function(){
	// 					location.href ='../rotinas.php?sair=1';
	// 				} 
	// 			}
	// 		]
	// 	});
	// });
		
   $('input').keypress(function (e) {
		var code = null;
		code = (e.keyCode ? e.keyCode : e.which);                
		return (code == 13) ? false : true;
   });
	//rotina para resetar formulario
	window.limpaform =  function (idform,classe, select=false){
		$(idform).each(function(){
			this.reset();
		});		
		$('.'+classe+'').parent().remove();
		if(select) $('.selectpicker').selectpicker('refresh');
	}    

	//Deixando o texto em Maiúsculo
	$(".maiusculo").keyup(function() {
		$(this).val($(this).val().toUpperCase());
	});

	//mascares de input genericas
	$(function(){
		$(".preciso").mask("00.000,0000",{placeholder:""});
		$(".moeda").mask("99.999,99",{placeholder:" "});
		$(".cep").mask("00.000-000",{placeholder:"Cep"});
		$(".rg").mask("99.999.999-9",{placeholder:" "});
		$(".cpf").mask("000.000.000-00",{placeholder:"Digite o CPF"});
		$(".telefone").mask("(00) 0000-00009",{placeholder:"Telefone"});
		$(".cnpj").mask("00.000.000/0000-00",{placeholder:"Digite o CNPJ"});
		$(".pis").mask("000.00000.00-0",{placeholder:"Digite o PIS"});
	});

	$(function(){
		$('.dinheiro').maskMoney({
			prefix			:'R$ ', 
			allowNegative		: false, 
			thousands		:'.', 
			decimal 		:',', 
			affixesStay		: true
		});
	})

	$(function(){
		$('.percent').maskMoney({
			thousands		:'.', 
			decimal 		:',', 
			allowNegative	: false, 
			suffix			: ' %', 
			affixesStay		: true
		});
	})
				
	$(".numeros, .numero").keypress(function (e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
			return false;
		}
	});	

	$('.datasimples').datepicker({
		format         : 'dd/mm/yyyy',                
		language       : 'pt-BR',
		autoclose      : true,
		todayBtn       : true,
		changeYear     : true,
		todayHighlight : true
	});

	$('.mesano').datepicker({
		format		: "mm-yyyy",
		viewMode	: "months", 
		minViewMode : "months",
		language    : 'pt-BR',
		autoclose   : true
	});

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		method     : "POST",
		cache      : false,
		dataType   :'json',		
		async      : true
	});

	$(document).ajaxStart(function(){
		$("#expira").val(2500);		
	    $(".loader").fadeIn(); 
	}).ajaxStop(function(){
	    $(".loader").fadeOut();
	    $(".inicial").fadeIn(); 
	});

	$(".form-disable").on('submit',function(){
		var self = $(this),
			button = self.find('input[type="submit"], button');
		submitValue = button.data('submit-value');
		button.attr('disabled','disabled').val((submitValue) ? submitValue : "Aguarde ...");
	});

	$(".form-disable").on('reset',function(){
		var self = $(this),
			button = self.find('input[type="submit"], button');
		button.removeAttr('disabled');
	});

	$(".form-disable").on('change',function(){
		var self = $(this),
			button = self.find('input[type="submit"], button');
		button.removeAttr('disabled');
	});

	$(".form-disable").on('blur',function(){
		var self = $(this),
			button = self.find('input[type="submit"], button');
		button.removeAttr('disabled');
	});

	//rotina para montar o menu com as permissões do usuário
	// var id_mapa = $("#id_mapa").val();
	// var path 	= $("#path").val();
	// var 	url = "../php/rotinas.php"
	// if (path) url = path;
	// if (id_mapa){
	// 	$.ajax({
	// 		url        	: url,
	// 		data       	: {montamenu : id_mapa},
	// 		success    	: function(json){
	// 			if(json != ''){
	// 				var linha   = "";
	// 				var posicao = "";
	// 				var id_posi = "";
	// 				var l_ini   = json[0].linha;
	// 				var p_ini   = 1;
	// 				for(var i = 0; i < json.length; i++){
	// 					if(l_ini != json[i].linha){
	// 						l_ini = json[i].linha;
	// 						p_ini = 1;
	// 					}	
	// 					linha   = json[i].linha;
	// 					posicao = json[i].posicao;
	// 					if(l_ini == json[i].linha && p_ini < posicao) posicao = p_ini;
	// 					p_ini++;
	// 					id_posi = "#l"+linha+"p"+posicao;
	// 					$(json[i].codigo_html).appendTo(id_posi);
	// 				}
	// 			}
	// 		},
	// 		complete	: function(){
	// 			$('.pop_over').popover({
	// 				container : 'body',
	// 				trigger	  : 'hover',
	// 				html	  : true,
	// 				delay	  :	{show: 1000, hide: 200}
	// 			});
	// 			$('.tool_tip').tooltip({
	// 				placement : 'bottom',
	// 				html	  : true,
	// 				delay	  :	{show: 1000, hide: 200}
	// 			});
	// 			$("#dvLoading").fadeOut();				
	// 		}
	// 	});
	// }

	function timer(elem, starttime, endtime, speed, funktion, count) {
		if (!endtime) endtime = 0;
		if (!starttime) starttime = 2500;
		if (!speed) speed = 1;
		speed = speed * 1000;
		if ($(elem).val()) {
			if (count == "next" && starttime > endtime) starttime--;
			else if (count == "next" && starttime < endtime) starttime++;
			if ($(elem).val()) $(elem).val(starttime);
			if (starttime != endtime && $(elem).val()) setTimeout(function() {
				timer(elem, $(elem).val(), endtime, speed / 1000, funktion, 'next');
			}, speed);
			if (starttime == endtime && funktion) funktion();
		} else return;
	}

	timer("#expira", 2500, 0, 1, function() {
		var path = $("#path").val();
		if (path) location.href = path;
	}); 

	//exemplo $("#email, #email-confirm, #password, #password-confirm").disableCCP(); não permite copiar e colar.
	function disabilita($){
		$.fn.disableCCP = function() {
			return this.each( function() {
				var $this = $(this);
				$this.live("cut copy paste",function(e) {
					e.preventDefault();
				})
				
			});
		}
	}

	// window.buscaparametro = function (nome_param,id,option,refresh){
	// 	$('#'+ id +' option').remove();
	// 	$.ajax({
	// 		url        : "../php/rotinas.php",
	// 		data       : nome_param,
	// 		success    : function(json){	
	// 			$('<option value="">'+option+'</option>').appendTo('#'+id+'');
	// 			for(var i = 0; i < json.length; i++){
	// 				$('<option>' + json[i].descricao + '</option>').attr({value:json[i].valor}).appendTo('#'+id+'');
	// 			}
	// 		},
	// 		complete   : function(){
	// 			if (refresh){
	// 				 $('#'+id+'').selectpicker('refresh');
	// 			}
	// 		}		
	// 	});
	// }

	window.validarCNPJ =  function (cnpj) {
		cnpj = cnpj.replace(/[^\d]+/g,'');
		if(cnpj == '') return false;
		if (cnpj.length != 14) return false;
		// LINHA 10 - Elimina CNPJs invalidos conhecidos
		if (cnpj == "00000000000000" || 
			cnpj == "11111111111111" || 
			cnpj == "22222222222222" || 
			cnpj == "33333333333333" || 
			cnpj == "44444444444444" || 
			cnpj == "55555555555555" || 
			cnpj == "66666666666666" || 
			cnpj == "77777777777777" || 
			cnpj == "88888888888888" || 
			cnpj == "99999999999999")
			return false; // LINHA 21
		// Valida DVs LINHA 23 -
		tamanho = cnpj.length - 2
		numeros = cnpj.substring(0,tamanho);
		digitos = cnpj.substring(tamanho);
		soma = 0;
		pos = tamanho - 7;
		for (i = tamanho; i >= 1; i--) {
		  soma += numeros.charAt(tamanho - i) * pos--;
		  if (pos < 2)
				pos = 9;
		}
		resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
		if (resultado != digitos.charAt(0))
			return false;
		tamanho = tamanho + 1;
		numeros = cnpj.substring(0,tamanho);
		soma = 0;
		pos = tamanho - 7;
		for (i = tamanho; i >= 1; i--) {
		  soma += numeros.charAt(tamanho - i) * pos--;
		  if (pos < 2)
				pos = 9;
		}
		resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
		if (resultado != digitos.charAt(1))
			  return false; // LINHA 49
		return true; // LINHA 51
	}

	//Rotina para preencher o select com os nomes das cidades
	// window.cidades = function (){
	// 	$('#id_cidade option').remove();
	// 	$('#id_cidade').attr('placeholder',"Carregando...");
	// 	var estado = $('#id_estado').val();
	// 	$.ajax({
	// 		url        : "../php/rotinas.php",
	// 		data       : {ler_cidades:estado},
	// 		success    : function(json){								     			
	// 			for(var i = 0; i < json.length; i++){
	// 				$('<option>' + json[i].nome_cidade + '</option>').attr({value:json[i].id_cidade}).appendTo("#id_cidade");
	// 			}
	// 		},
	// 		complete   : function(){
	// 			$('#id_cidade').selectpicker('refresh');
	// 			$("#dvLoading").fadeOut();			
	// 		}		    	
	// 	});
	// }

	//Rotina para preencher o select com os nomes dos estados e cidades
	// window.estados = function(){
	// 	$('#id_estado option').remove();
	// 	$.ajax({
	// 		url        : "../php/rotinas.php",
	// 		data       : {ler_estados:'1'},
	// 		success    : function(json){								     			
	// 			for(var i = 0; i < json.length; i++){
	// 				$('<option>' + json[i].nome + '</option>').attr({value:json[i].id_estado}).appendTo("#id_estado");
	// 			}
	// 		},
	// 		complete	: function(){
	// 			$('#id_estado').selectpicker('refresh');
	// 			$('#id_estado').trigger('change');
	// 		}		    	
	// 	});
	// }

	// window.dadoscep = function(valor){
	// 	var cep = valor.replace(/\D/g, '');
	// 	if (cep != ""){
	// 		var validacep = /^[0-9]{8}$/;
	// 		if(validacep.test(cep)) {
	// 			$.ajax({
	// 				url     : "../php/rotinas.php",
	// 				data    : {buscacep:cep},
	// 				success : function(dadoscep){
	// 					$.ajax({
	// 						url        : "../php/rotinas.php",
	// 						data       : {ler_cidades:dadoscep.id_estado},
	// 						success    : function(json){								     			
	// 							$('#id_cidade option').remove();
	// 							for(var i = 0; i < json.length; i++){
	// 								$('<option>' + json[i].nome_cidade + '</option>').attr({value:json[i].id_cidade}).appendTo("#id_cidade");
	// 							}
	// 							$('select[name=id_cidade]').val(dadoscep.id_cidade);
	// 							$("#id_cidade").selectpicker('refresh');
	// 						}	
	// 					});								     
	// 					$('select[name=id_estado]').val(dadoscep.id_estado);
	// 					$("#id_estado").selectpicker('refresh');
	// 					$('#logradouro').val(dadoscep.logradouro);
	// 					$('#bairro').val(dadoscep.bairro);
	// 				},
	// 				error 	: function(xhr, status, error) {
	// 					errorAlert(xhr.responseText);
	// 				}
	// 			});
	// 		}else{
	// 			errorAlert("Digite um CEP válido.");
	// 		}	
	// 	}else{
	// 		errorAlert("Digite um CEP válido.");
	// 	}
	// }

	window.moeda = function (valor, casas, separdor_decimal, separador_milhar){ 
		var valor_total = parseInt(valor * (Math.pow(10,casas)));
		var inteiros =  parseInt(parseInt(valor * (Math.pow(10,casas))) / parseFloat(Math.pow(10,casas)));
		var centavos = parseInt(parseInt(valor * (Math.pow(10,casas))) % parseFloat(Math.pow(10,casas)));
		if(centavos%10 == 0 && centavos+"".length<2 ){
			centavos = centavos+"0";
		}else if(centavos<10){
			centavos = "0"+centavos;
		}
		var milhares = parseInt(inteiros/1000);
		inteiros = inteiros % 1000; 
		var retorno = "";
		if(milhares>0){
			retorno = milhares+""+separador_milhar+""+retorno
			if(inteiros == 0){
				inteiros = "000";
			} else if(inteiros < 10){
				inteiros = "00"+inteiros; 
			} else if(inteiros < 100){
				inteiros = "0"+inteiros; 
			}
		}
		retorno += inteiros+""+separdor_decimal+""+centavos;
		return retorno;
	}

	window.getMoney = function ( valor ){
		if (typeof valor ==='string'){
			valor  = valor.replace('R$','');
			valor  = valor.replace('.','');
			valor  = valor.replace(',','.');
			if (valor==="") valor = '0.00';
			valor  = parseFloat(valor);
		}
		return valor;
	}

	window.getMoney5 = function ( valor ){
		if (typeof valor ==='string'){
			valor  = valor.replace('R$','');
			valor  = valor.replace('.','');
			valor  = valor.replace(',','.');
			if (valor==="" || parseFloat(valor)<0) valor = 0.00;
			valor = parseFloat(valor);
		}
		return valor;
	}

	window.arredondar = function(nr) {
	    nr = nr * 100;
	    return Math.floor(nr) / 100;
	}

	window.formatReal =  function (mixed) {
		var neg = false;
		if (parseFloat(mixed) < 0 ) neg = true;
		var int = parseInt(mixed.toFixed(2).toString().replace(/[\D]+/g,''));
		var tmp = int + '';
		if(tmp.indexOf("-") == 0) {
			neg = true;
			tmp = tmp.replace("-","");
		}
		if(tmp.length == 1) tmp = "0"+tmp
		tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
		if( tmp.length > 6)
			tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
		if( tmp.length > 9)
			tmp = tmp.replace(/([0-9]{3}).([0-9]{3}),([0-9]{2}$)/g,".$1.$2,$3");
		if( tmp.length > 12)
			tmp = tmp.replace(/([0-9]{3}).([0-9]{3}).([0-9]{3}),([0-9]{2}$)/g,".$1.$2.$3,$4");
		if(tmp.indexOf(".") == 0) tmp = tmp.replace(".","");
		if(tmp.indexOf(",") == 0) tmp = tmp.replace(",","0,");
		return (neg ? '-'+tmp : tmp);
	}

	window.dataAtualFormatada = function (data){
		var dia = data.getDate();
		if (dia.toString().length == 1) dia = "0" + dia;
		var mes = data.getMonth() + 1;
		if (mes.toString().length == 1) mes = "0" + mes;
		var ano = data.getFullYear();  
		return dia + "/" + mes + "/" + ano;
	}

	window.arquivos = function(id_input){
		$(id_input).fileinput({
			language				: 'pt-BR',
			maxFileSize 			: 1024,
			maxFilePreviewSize		: 1024,
     		allowedFileExtensions	: ['jpg', 'png', 'pdf', 'doc','docx', 'xls', 'xml','json','ods'],
			browseClass				: 'btn btn-primary',
			uploadUrl				: '../php/rotinas.php',
			uploadAsync				: true,
			minFileCount			: 1,
			maxFileCount			: 5,
			showUpload				: true,
			showRemove				: false,
			overwriteInitial		: false,
			initialPreviewAsData    : true,
			purifyHtml				: true
		});
	}

	$('.pop_over').popover({
		container : 'body',
		trigger	  : 'hover',
		html	  : true,
		delay	  :	{show: 1000, hide: 200}
	});

	$('.tool_tip').tooltip({
		placement : 'bottom',
		html	  : true,
		delay	  :	{show: 1000, hide: 200}
	});


	window.number_format = function ( numero, decimal, decimal_separador, milhar_separador ){ 
		numero = (numero + '').replace(/[^0-9+\-Ee.]/g, '');
		var n = !isFinite(+numero) ? 0 : +numero,
			prec = !isFinite(+decimal) ? 0 : Math.abs(decimal),
			sep = (typeof milhar_separador === 'undefined') ? ',' : milhar_separador,
			dec = (typeof decimal_separador === 'undefined') ? '.' : decimal_separador,
			s = '',
			toFixedFix = function (n, prec) {
				var k = Math.pow(10, prec);
				return '' + Math.round(n * k) / k;
			};
		// Fix para IE: parseFloat(0.55).toFixed(0) = 0;
		s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
		if (s[0].length > 3) {
			s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
		}
		if ((s[1] || '').length < prec) {
			s[1] = s[1] || '';
			s[1] += new Array(prec - s[1].length + 1).join('0');
		}
		return s.join(dec);
	}

	window.dataFormatada = function () {
		var data = new Date(),
			dia  = data.getDate(),
			mes  = data.getMonth() + 1,
			ano  = data.getFullYear();
		if (mes < 10) mes = '0'+ mes;
		if (dia < 10) dia = '0'+ dia;
		return [dia, mes, ano].join('/');
	}


	window.datavalida = function (data) {
	   if (data.length == 10) {
		   er = /(0[0-9]|[12][0-9]|3[01])[-\.\/](0[0-9]|1[012])[-\.\/][0-9]{4}/;
		   if (er.exec(data)) {
			   return true;
		   } else {
			   return false;
		   }
	   } else {
		   return false;
	   }
	}

	window.limparalerta = function(){
		$('#divalerta').empty();
	}

    window.showalerta = function(tipo, mensagem, limpar = false, tempo = 3000){
    	if(tipo == 'erro')   {var classe = 'alert-danger';  var titulo = "Erro !!!";} 
    	if(tipo == 'info')   {var classe = 'alert-info';    var titulo = "Informação !!!";}
    	if(tipo == 'atencao'){var classe = 'alert-warning'; var titulo = "Atenção !!!";}
    	if(tipo == 'sucesso'){var classe = 'alert-success'; var titulo = "Sucesso !!!";}
        if(limpar) $('#divalerta').empty();
        var clone = $('#clonar').clone(true);
        clone.removeAttr("id");
        clone.addClass(classe);
        clone.addClass('fechaalert');
        clone.addClass('mostraalert');
        clone.find("#titulomsg").text(titulo).removeAttr("id");
        clone.find("#textomsg").text(mensagem).removeAttr("id");
        $('#divalerta').append(clone);
        $('.mostraalert').show('fade');
		$('html,body').scrollTop(0);
        setTimeout(function () {
            $('.fechaalert').hide('fade');
        }, tempo);
	}

	window.periodo = function(id, start = null, end = null){
		if(!start) start = moment().subtract(29, 'days');
		if(!end) end = moment();
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
			   'Último Mês': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
			   'Último Ano': [moment().subtract(1, 'year'), moment()]
			}
		});
	}

	$('body').on('expanded.pushMenu collapsed.pushMenu', function() {
		setTimeout(function(){
			$.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
		}, 250);
	});

	// $('input').iCheck({
	// 	checkboxClass : 'icheckbox_square-blue',
	// 	radioClass    : 'iradio_square-blue'
	// });

	$(document).on('keydown', 'body', function(event) {
		if(event.keyCode==112){ //F1
			event.preventDefault();
			$(".ajuda").fadeIn();
		 }
	 });
	$(document).on('click', '#mostrar_ajuda',function(){
		$(".ajuda").fadeIn();
	});

	$(document).on('click', '#esconder_ajuda',function(){
		$(".ajuda").fadeOut();
	});

	var existeocorrencia  = document.getElementById('form_oco');
	if (existeocorrencia){
		var dataatual = moment();
		$('#data_oco').daterangepicker({
			timePicker 			: true,
			startDate			: dataatual,
			timePickerIncrement	: 5,
			 timePicker24Hour	: true,
			 singleDatePicker	: true,
			autoApply			: true,
			maxDate				: dataatual,
			"locale": {
				"format": "DD/MM/YYYY HH:mm",
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
		});
	}	

	$(document).on('click', '#cancel_oco',function() {
		limpaform('#form_oco','del');
		$(".tabela").show();
		$(".ocorrencia").hide();
	});

	$(document).on('click', '#cancel_conf',function() {
		$(".tabela").show();
		$(".confirmacao").hide();
	});

	$('#fechararquivos').click(function(){
		$('#arquivos').fileinput('destroy');
		arquivos('#arquivos');
		$(".tabela").show();
		$(".farquivos").hide();
	});

	// Highcharts.setOptions({
	// 	lang: {
	// 		decimalPoint: ',',
	// 		thousandsSep: '.'
	// 	}
	// });	

});

