<div class="box confirmacao collapse">
	<div class="box-header with-border">
		<h3 class="box-title" id="tit_conf"><b>Confirmação</b></h3>
	</div>
	<div class="box-body">
		<div class="form-inline">
			<div class="form-group">
				<h3 id="msg_conf"></h3>
			</div>
		</div>
	</div>
    <div class="box-footer">
		{!! Form::button('Confirmar', ['class' => 'btn btn-info',    'id' => 'gravar_conf']) !!}
		{!! Form::button('Cancelar' , ['class' => 'btn btn-default', 'id' => 'cancel_conf']) !!}
		{!! Form::hidden('id_conf'  , null, ['id' => 'id_conf'  ]) !!}
		{!! Form::hidden('id_rotina', 'padrao', ['id' => 'id_rotina']) !!}
		{!! Form::hidden('url_conf' , null, ['id' => 'url_conf' ]) !!}
    </div>
</div>