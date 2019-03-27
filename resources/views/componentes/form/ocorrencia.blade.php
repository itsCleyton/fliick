<div class="box ocorrencia collapse">
	<div class="box-header with-border">
		<h3 class="box-title">Ocorrência vinculada <b id="reg_oco"></b></h3>
	</div>
	{!! Form::open([
		'class'     => 'form-inline',
		'id'        => 'form_oco',
		'name'      => 'form_oco',
		'role'      => 'form',
	]) !!}
	<div class="box-body">
		<div class="form-inline">
			<div class="form-group">
				{!! Form::label('desc_oco', 'Histórico', ['class' => 'control-label']) !!}
				{!! Form::text('desc_oco', null,  
				[
					'name'			=> 'desc_oco',
					'placeholder'   => 'descreva a ocorrência',
					'class'         => 'form-control input-md',
					'style'			=> 'min-width:500px;'
				]
				) !!}
			</div>
			<div class="form-group">
				{!! Form::label('data_oco', 'Data', ['class' => 'control-label']) !!}
				{!! Form::text('data_oco', date('d/m/Y H:i'),['class' => 'form-control input-md']) !!}
			</div>
			<div class="form-group">
				{!! Form::button('Gravar',   ['class' => 'btn btn-info',    'id' => 'gravar_oco']) !!}
				{!! Form::button('Cancelar', ['class' => 'btn btn-default', 'id' => 'cancel_oco']) !!}
				{!! Form::hidden('id_oco'    , null, ['id' => 'id_oco']) !!}
				{!! Form::hidden('tabela_oco', null, ['id' => 'tabela_oco']) !!}
			</div>
		</div>
	</div>
</div>