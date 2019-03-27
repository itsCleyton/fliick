<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller{

	public function index(){
		// dd(auth()->user()->eventos);
		return view('admin.index',['titulo' => 'Meus eventos']); 
	}

	public function estados(){
		header('Cache-Control: max-age=36000');
		header("Content-Type: text/javascript; charset=UTF-8");
		$json = array();
		$estados = Estado::orderBy('nome_estado')->get();
		foreach ($estados as $key => $estado) {
			$json[] = array(
				'estado_id'	=> $estado->id,
				'nome' 		=> $estado->nome_estado
			);
		}	
	return $json;			
	}

	public function cidades(Request $request){
		header('Cache-Control: max-age=36000');
		header("Content-Type: text/javascript; charset=UTF-8");
		$json = array();
		$cidades = Cidade::where('estado_id', $request->estado_id)->orderBy('nome_cidade')->get();
		foreach ($cidades as $cidade) {
			$json[] = array(
				'cidade_id'	=> $cidade->id,
				'nome' 		=> $cidade->nome_cidade
			);
		}	
		return $json;		
	} 	

	public function retorna_parametro(Request $request){
		header('Cache-Control: max-age=36000');
		header("Content-Type: text/javascript; charset=UTF-8");
		$id_param = $request['id_param'];
		$entidade_id = Auth::user()->entidade_id;
		$json = array();
		$sql = "select valor,descricao from parametros WHERE (tipo_parametro_id='$id_param' AND comum=1) OR (tipo_parametro_id='$id_param' AND comum=0 AND entidade_id='$entidade_id')";
		$parametros = DB::select($sql);
		foreach ($parametros as $parametro) {$json[] = $parametro;}	
		return $json;		
	} 	

	public function dados_cep(Request $request){
		$source  = array('.','-');
		$replace = array('','');
		$cep   = str_replace($source, $replace, $request['buscacep']);
		$ret   = ZipCode::find($cep,false);
		if($ret)$dados = $ret->getArray();
		else return 'CEP inválido.';
		$nome_cidade = html_entity_decode($dados['localidade']);
		$sql = "select id, estado_id FROM cidades WHERE nome_cidade = '$nome_cidade'";
		if($cidade = DB::select($sql)){
			$json = array(
				'cidade_id'	 	=> $cidade[0]->id,
				'estado_id' 	=> $cidade[0]->estado_id,
				'logradouro'	=> html_entity_decode($dados['logradouro']),
				'bairro'		=> html_entity_decode($dados['bairro'])
			);	
		}else return 'Dados do CEP não encontrados.';
		return json_encode($json,JSON_PRETTY_PRINT);
	}

	public function dados_cnpj(Request $request){
		return json_encode(buscadadoscnpj($request['buscacnpj']),JSON_PRETTY_PRINT);
	}

	public function dados_mapa(Request $request){
		$source  = array('.','-');
		$replace = array('','');
		$cep   = str_replace($source, $replace, $request['buscamapa']);
		// $cep 	  = Funcoes :: limpacep($cep); 
		$link     = 'https://maps.googleapis.com/maps/api/geocode/json?';
		$chave 	  = '&key=AIzaSyDzg6JqdTYfBRcFG6f05KJskM95L8RQosA';
		$address  = 'components=postal_code:'.$cep.'|country:BR';
		$query    = $link.$address.$chave;
		$json     = file_get_contents($query);
		$detalhes = json_decode($json, true);
		$resposta = array();
		if ($detalhes['status'] == 'OK'){
			$resposta = array(
				'status' 	=> 'OK',
				'lat'		=> $detalhes['results'][0]['geometry']['location']['lat'],
				'lng'		=> $detalhes['results'][0]['geometry']['location']['lng'],
				'id_google'	=> $detalhes['results'][0]['place_id']
			);
		}else{
			$resposta = array('status' => 'Falha ao consultar coordenadas');
		}
		return $resposta;
	}

}
