<?php

session_start();

class NotFoundController extends RenderView
{

  private $authenticated;
  public function __construct()
  {
    $this->authenticated = isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0 ? 1 : 0;
  }

  public function index()
  {
    $auth = $this->authenticated;

    $this->loadView('pages/partials/header', [
      "title" => "Página não encontrada",
      "isAuth" => $auth
    ]);
    $this->loadView('404', []);
    $this->loadView('pages/partials/footer', []);
  }
}