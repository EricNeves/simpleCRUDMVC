<section class="login profile">
  <div class="container">
    <section class="box__login box__profile">

      <div class="result"></div>

      <form action="" method="POST">
        <label for="">Username</label>
        <input type="text" name="username" placeholder="Username" value="<?php echo $data['username'] ?>">

        <label for="">Email</label>
        <input type="email" disabled placeholder="Email" value="ericnevesr@gmail.com"
          value="<?php echo $data['email'] ?>">

        <label for="">Password</label>
        <input type="password" name="passwd" placeholder="*********">

        <label for="">Avatar</label>
        <input type="url" name="avatar" placeholder="https://your-avatar.png" value="<?php echo $data['avatar'] ?>">
        <input type="submit" value="Update Profile">
      </form>
    </section>
  </div>
</section>

<script src="<?php echo BASE_URL; ?>app/public/js/updateProfile.js"></script>