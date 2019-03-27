<div class="box farquivos collapse">
	<div class="box-header with-border">
		<h3 class="box-title">Arquivos vinculados <b id="tit_arq">Confirmação</b></h3>
	</div>
	<div class="box-body">
		{!! Form::file('arquivos[]', [
		'id' 		=> 'arquivos',
		'class' 	=> 'file-loading',
		'multiple' 	=> 'true'
		]) !!}

	</div>
    <div class="box-footer">
		{!! Form::button('Fechar', ['class' => 'btn btn-info',    'id' => 'fechararquivos']) !!}
		{!! Form::hidden('id_arq'  , null, ['id' => 'id_arq']) !!}
    </div>
</div>
