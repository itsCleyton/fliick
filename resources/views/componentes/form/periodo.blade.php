<div class="col-md-7 text-left">
	<div class="form-inline">
		<div class="form-group">
			{!! Form::label('periodo', 'Intervalo', ['class' => 'control-label']) !!}
			{!! Form::text('periodo', null, ['class'  => 'form-control input-md']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('limite', 'Mostrar', ['class' => 'control-label']) !!}
			{!! Form::select('limite', 
				[
				'250' 	=> '250', 
				'500' 	=> '500',
				'1000' 	=> '1.000',
				'5000' 	=> '5.000'
				], 
				'500', 
				[
				'class' 	=> 'form-control input-md',
				'required' 	=> ''
				]
			)!!}
		</div>
		<div class="form-group">
			{!! Form::button('Atualizar', ['class' => 'btn btn-info', 'id' => 'atu_peri']); !!}
		</div>
	</div>
</div>