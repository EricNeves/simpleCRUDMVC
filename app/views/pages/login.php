<section class="login">
  <div class="container">
    <section class="box__login">

      <div class="result"></div>

      <form action="<?php BASE_URL; ?>verify" method="POST">
        <label for="">Email</label>
        <input type="email" name="email" placeholder="E-mail">
        <label for="">Senha</label>
        <input type="password" name="passwd" placeholder="********">
        <input type="submit" value="Entrar">
      </form>
    </section>
  </div>
</section>

<script src="<?php echo BASE_URL; ?>app/public/js/loginUser.js"></script>