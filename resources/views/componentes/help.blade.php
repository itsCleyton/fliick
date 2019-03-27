<div class="box box-default ajuda collapsed-box">
	<div class="box-header with-border">
		<h3 class="box-title">Ajuda</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-plus"></i>
			</button>
			<button class="btn btn-box-tool" id="esconder_ajuda">
				<i class="fa fa-times"></i>
			</button>
		</div>
	</div>
	<div class="box-body">
		<table class="table table-condensed">
			<tbody>
				@foreach ($helps as $help)
					<tr>
						<th>{{ $help->titulo }}</th>
						<td>{{ $help->descricao }}</td>
					</tr>
				@endforeach
		  </tbody>
	  </table>	
	</div>
</div>