<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rota para raiz do site
Route::get('/', 'Site\SiteController@index')->name('welcome');

//Grupo com rotas para /admin
$this->group(['middleware' => ['auth'], 'namespace' => 'Admin','prefix' => 'admin'], function(){
	$this-> get('/admin', 'Admin\AdminController@index')->name('admin');
});

//Grupo com rotas para a tela
$this->group(['middleware' => ['auth'], 'namespace' => 'Tela','prefix' => 'tela'], function(){
	$this-> get('/', 'Tela\TelaController@index')->name('tela');
});

//Roda para logout do sistema
$this->get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');


$this->group(['middleware' => ['auth'], 'namespace' => 'Admin','prefix' => 'admin'], function(){

	$this-> post('estados'   , ['uses' => 'AdminController@estados','as' 			=> 'admin.estados']);
	$this-> post('cidades'   , ['uses' => 'AdminController@cidades','as' 			=> 'admin.cidades']);
	$this-> post('parametros', ['uses' => 'AdminController@retorna_parametro','as' 	=> 'admin.parametros']);
	$this-> post('buscacep'  , ['uses' => 'AdminController@dados_cep','as' 			=> 'admin.buscacep']);
	$this-> post('buscamapa' , ['uses' => 'AdminController@dados_mapa','as' 		=> 'admin.buscamapa']);
	$this-> post('buscacnpj' , ['uses' => 'AdminController@dados_cnpj','as'         => 'admin.buscacnpj']);
	$this->  get('/'         , 'AdminController@index')->name('admin');	
});
Auth::routes();

// Route::get('/login', 'HomeController@index')->name('home');
