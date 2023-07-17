<?php

session_start();

class ProductController extends RenderView
{
  private $authenticated;
  public function __construct()
  {
    $this->authenticated = isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0 ? 1 : 0;
  }

  public function index()
  {
    if (!($_SESSION['user_id'] > 0)) {
      header("Location: " . BASE_URL . "login");
    }

    $user = new UserModel();
    $user = $user->fetchUserById($_SESSION['user_id']);

    $auth = $this->authenticated;

    $this->loadView('pages/partials/header', [
      "title" => "Add Product",
      'isAuth' => $auth,
      'user' => $user
    ]);
    $this->loadView('pages/add-product', []);
    $this->loadView('pages/partials/footer', []);
  }

  public function create()
  {
    if (($_SERVER['REQUEST_METHOD'] == 'GET') || (!isset($_SESSION['user_id']))) {
      header('Location: ' . BASE_URL . 'login');
    }

    $msg = [];

    $product = new ProductModel();

    if (!isset($_POST['name']) || empty($_POST['name'])) {
      $msg['error'] = "Preencha o campo Name!";
    } else if (!isset($_POST['price']) || empty($_POST['price'])) {
      $msg['error'] = "Preencha o campo Price!";
    } else if (!isset($_POST['image']) || empty($_POST['image'])) {
      $msg['error'] = "Preencha o campo Image!";
    } else {
      $name = $_POST['name'];
      $price = $_POST['price'];
      $image = $_POST['image'];

      if ($product->create($name, $price, $image)) {
        $msg['success'] = "Produto criado com sucesso!";
      } else {
        $msg['error'] = "Desculpa, algo deu errado, tente mais tarde!";
      }
    }

    echo json_encode($msg);
  }

  public function edit($id)
  {
    if (!isset($_SESSION['user_id'])) {
      header('Location: ' . BASE_URL . 'login');
    }

    $auth = $this->authenticated;

    $productModel = new ProductModel();
    $product = $productModel->fetchProduct($id[0]);

    $user = new UserModel();
    $user = $user->fetchUserById($_SESSION['user_id']);

    if (!$product) {
      header('Location: ' . BASE_URL . 'login');
    }

    $this->loadView('pages/partials/header', [
      "title" => "Update Product",
      "isAuth" => $auth,
      'user' => $user
    ]);
    $this->loadView('pages/edit-product', [
      'product' => $product
    ]);
    $this->loadView('pages/partials/footer', []);
  }

  public function updateProduct()
  {
    if (($_SERVER['REQUEST_METHOD'] == 'GET') || (!isset($_SESSION['user_id']))) {
      header('Location: ' . BASE_URL . 'login');
    }

    $msg = [];

    $product = new ProductModel();

    if (!isset($_POST['name']) || empty($_POST['name'])) {
      $msg['error'] = "Preencha o campo Name!";
    } else if (!isset($_POST['price']) || empty($_POST['price'])) {
      $msg['error'] = "Preencha o campo Price!";
    } else if (!isset($_POST['image']) || empty($_POST['image'])) {
      $msg['error'] = "Preencha o campo Image!";
    } else if (!isset($_POST['id']) || empty($_POST['id'])) {
      $msg['error'] = "Desculpa, algo deu errado, tente mais tarde!";
    } else {
      $name = $_POST['name'];
      $price = $_POST['price'];
      $image = $_POST['image'];
      $id = $_POST['id'];

      if ($product->update($name, $price, $image, $id)) {
        $msg['success'] = "Produto atualizado com sucesso!";
      } else {
        $msg['error'] = "Desculpa, algo deu errado, tente mais tarde!";
      }
    }

    echo json_encode($msg);
  }

  public function delete()
  {
    if (($_SERVER['REQUEST_METHOD'] == 'GET') || (!isset($_SESSION['user_id']))) {
      header('Location: ' . BASE_URL . 'login');
    }

    $product = new ProductModel();
    
    $msg = [];

    if ($product->delete($_POST['id'])) {
      $msg['success'] = "Produto deletado com sucesso!";
    } else {
      $msg['error'] = "Erro ao deletar o produto!";
    }

    echo json_encode($msg);
  }
}