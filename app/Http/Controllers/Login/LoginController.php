<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use App\Repositorio\Login\LoginRepositorio;
use App\Repositorio\Util\UtilRepositorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  protected $loginRepositorio;

  public function __construct()
  {
    $this->loginRepositorio = new LoginRepositorio();
  }

  public function login()
  {
  
      return view('login.login');
    
  }

  public function loginIn(LoginRequest $login)
  {
    if ($this->loginRepositorio->login($login->all()) || Auth::hasUser()) {
      $page = UtilRepositorio::nivelForPage();
      
      return redirect($page);
    }
    return redirect()->back()->with('msg-error', 'Error,Email ou senha incorretos!');
  }

  public function logout()
  {

    if ($this->loginRepositorio->logout()) {
      return redirect()->to('/login');
    }
  }

  
}
