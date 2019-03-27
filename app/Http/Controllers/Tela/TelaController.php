<?php

namespace App\Http\Controllers\Tela;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TelaController extends Controller{
    public function index(){
    return view('tela.index');
    }
}
