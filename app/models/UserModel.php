<?php

class UserModel extends Database
{
  private $pdo;

  public function __construct()
  {
    $conn = $this->getConnection();
    $this->pdo = $conn;
  }

  public function login($email, $passwd)
  {
    try {
      $stm = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
      $stm->execute([$email]);

      if ($stm->rowCount() > 0) {
        $user = $stm->fetch(PDO::FETCH_ASSOC);
      } else {
        return false;
      }

      if (password_verify($passwd, $user['passwd'])) {
        return $user['id'];
      } else {
        return false;
      }
    } catch (PDOException $e) {
      return false;
    }
  }

  public function fetchUserById($id)
  {
    try {
      $stm = $this->pdo->prepare("SELECT username, email, avatar FROM users WHERE id = ?");
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

  public function update($data)
  {
    try {
      $stm = $this->pdo->prepare("UPDATE users SET username = ?, passwd = ?, avatar = ? WHERE id = ?");
      $stm->execute([
        $data['username'], $data['passwd'], $data['avatar'], $data['id']
      ]);

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