<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>
    <?php echo $title; ?>
  </title>

  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>app/public/images/favicon.png" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/public/css/master.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet">

</head>

<body>

  <header>
    <div class="container">
      <div class="brand">
        <img src="<?php echo BASE_URL; ?>app/public/images/brand.svg" alt="">
      </div>

      <a href="javascript:void(0)" id="bar">
        <i class="fa-solid fa-bars"></i>
      </a>

      <nav>
        <ul>
          <li>
            <a href="<?php echo BASE_URL; ?>" id="home__link">Home</a>
          </li>

          <?php if (!$isAuth) { ?>

            <a href="<?php echo BASE_URL; ?>login" id="signin__link">
              <li>
                Login
                <i class="fa-solid fa-right-to-bracket"></i>
              </li>
            </a>

          <?php } else { ?>
          
            <li id="box__dropdown">
              <a href="javascript:void(0)" id="btn__dropdown">
                <p><?php echo $user['username']; ?></p>
                <img src="<?php echo $user['avatar']; ?>" alt="Profile">
                <i class="fa-solid fa-caret-down"></i>
              </a>

              <ul id="dropdown">
                <a href="<?php echo BASE_URL; ?>add">
                  <li>Add Product</li>
                </a>
                <a href="<?php echo BASE_URL.'profile/'.$_SESSION['user_id']; ?>">
                  <li>Profile</li>
                </a>
                <a href="<?php echo BASE_URL; ?>logout">
                  <li>Logout</li>
                </a>
              </ul>
            </li>

          <?php } ?>
          
        </ul>
      </nav>
    </div>
  </header>