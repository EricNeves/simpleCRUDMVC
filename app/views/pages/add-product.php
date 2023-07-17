<section class="login add">
  <div class="container">
    <section class="box__login create__product">

      <div class="result"></div>

      <form action="">
        <label for="">Name</label>
        <input type="text" name="name" placeholder="Name Product">

        <label for="">Price</label>
        <input type="number" step="0.01" name="price" placeholder="Price">

        <label for="">Image</label>
        <input type="url" name="image" placeholder="https://product.png">
        <input type="submit" value="Add Product">
      </form>
    </section>
  </div>
</section>

<script src="<?php echo BASE_URL; ?>app/public/js/createProduct.js"></script>