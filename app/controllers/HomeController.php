<?php

session_start();

class HomeController extends RenderView
{
  private $authenticated;
  public function __construct()
  {
    $this->authenticated = isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0 ? 1 : 0;
  }

  public function logout()
  {
    unset($_SESSION['user_id']);
    header("Location: " . BASE_URL . "login");
  }

  public function index($id)
  {
    $auth = $this->authenticated;

    $offset = 0;
    $limit = 8;

    $products = new ProductModel();

    $totalProducts = $products->getTotalProducts();

    $pages = ceil($totalProducts / $limit);

    $currentPage = 1;

    if($id) {
      $currentPage = $id[0];
    }

    $offset = (int) ($currentPage * $limit) - $limit; 

    $allProducts = $products->allProducts($offset, $limit);

    $user = new UserModel();
    $user = $user->fetchUserById(isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0);

    $this->loadView('pages/partials/header', [
      "title" => "Home Page",
      'isAuth' => $auth,
      'user' => $user
    ]);
    $this->loadView('pages/home', [
      'isAuth' => $auth,
      'products' => $allProducts,
      'totalProducts' => $pages,
    ]);
    $this->loadView('pages/partials/footer', []);
  }

  public function profile($id)
  {
    $auth = $this->authenticated;

    if (!$auth) {
      header("Location: " . BASE_URL . "login");
    }

    $user = new UserModel();
    $user = $user->fetchUserById($id[0]);

    if (!$user) {
      header("Location: " . BASE_URL);
    }

    $this->loadView('pages/partials/header', [
      "title" => "Profile",
      'isAuth' => $auth,
      'user' => $user
    ]);
    $this->loadView('pages/profile', [
      "data" => $user
    ]);
    $this->loadView('pages/partials/footer', []);
  }

  public function login()
  {
    $auth = $this->authenticated;

    if ($auth == 1) {
      header("Location: " . BASE_URL);
    }

    $this->loadView('pages/partials/header', [
      "title" => "Login",
      'isAuth' => $auth
    ]);
    $this->loadView('pages/login', []);
    $this->loadView('pages/partials/footer', []);
  }

  public function verifyCredentials()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      header('Location: ' . BASE_URL . 'login');
    }

    $msg = [];
    $userModel = new UserModel();

    if (
      (isset($_POST['email']) && !empty($_POST['email'])) || (isset($_POST['passwd']) && !empty($_POST['passwd']))
    ) {
      $email = $_POST['email'];
      $passwd = $_POST['passwd'];

      $user = $userModel->login($email, $passwd);

      if ($user) {
        $msg['success'] = "Usuário autenticado com sucesso!";
        $_SESSION['user_id'] = $user;
      } else {
        $msg['error'] = "Usuário não autenticado!";
      }
    } else {
      $msg['error'] = "Usuário não autenticado!";
    }

    echo json_encode($msg);
  }

  public function updateProfile()
  {
    if (($_SERVER['REQUEST_METHOD'] == 'GET') || (!isset($_SESSION['user_id']))) {
      header('Location: ' . BASE_URL . 'login');
    }
    $msg = [];

    if (!isset($_POST['username']) || empty($_POST['username'])) {
      $msg['error'] = "Preencha o campo Username!";
    } else if (!isset($_POST['passwd']) || empty($_POST['passwd'])) {
      $msg['error'] = "Preencha o campo Password!";
    } else if (!isset($_POST['avatar']) || empty($_POST['avatar'])) {
      $msg['error'] = "Preencha o campo Avatar!";
    } else {
      $dataUser = [
        "username" => $_POST['username'],
        "passwd" => password_hash($_POST['passwd'], PASSWORD_DEFAULT),
        "avatar" => $_POST['avatar'],
        "id" => $_SESSION['user_id']
      ];

      $user = new UserModel();

      if ($user->update($dataUser)) {
        $msg['success'] = "Usuário atualizado com sucesso!";
      } else {
        $msg['error'] = "Desculpa, erro ao atualizar o usuário";
      }
    }

    echo json_encode($msg);
  }
}