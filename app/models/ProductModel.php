<?php

class ProductModel extends Database
{
  private $pdo;

  public function __construct()
  {
    $conn = $this->getConnection();
    $this->pdo = $conn;
  }

  public function create($name, $price, $image)
  {
    try {
      $stm = $this->pdo->prepare("INSERT INTO products (name, price, image) VALUES (?, ?, ?)");
      $stm->execute([$name, $price, $image]);

      if ($this->pdo->lastInsertId() > 0) {
        return true;
      } else {
        return false;
      }
    } catch (PDOException $e) {
      return false;
    }
  }

  public function getTotalProducts()
  {
    try {
      $stm = $this->pdo->query("SELECT COUNT(*) as total FROM products");
      if ($stm->rowCount() > 0) {
        return $stm->fetch(PDO::FETCH_ASSOC)['total'];
      } else {
        return [];
      }
    } catch (PDOException $e) {
      return [];
    }
  }

  public function allProducts($offset, $limit)
  {
    try {
      $stm = $this->pdo->query("SELECT * FROM products LIMIT $offset, $limit");
      if ($stm->rowCount() > 0) {
        return $stm->fetchAll(PDO::FETCH_ASSOC);
      } else {
        return [];
      }
    } catch (PDOException $err) {
      return [];
    }
  }

  public function fetchProduct($id)
  {
    try {
      $stm = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
      $stm->execute([$id]);

      if ($stm->rowCount() > 0) {
        return $stm->fetch(PDO::FETCH_ASSOC);
      } else {
        return false;
      }
    } catch (PDOException $e) {
      return false;
    }
  }

  public function update($name, $price, $image, $id)
  {
    try {
      $stm = $this->pdo->prepare("UPDATE products SET name = ?, price = ?, image = ? WHERE id = ?");
      $stm->execute([$name, $price, $image, $id]);
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }

  public function delete($id)
  {
    try {
      $stm = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
      $stm->execute([$id]);
      if ($stm->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    } catch (PDOException $e) {
      return false;
    }
  }
}