<section class="login edit__product">
  <div class="container">
    <section class="box__login">

      <div class="result"></div>

      <form action="">
        <label for="">Name</label>
        <input type="text" name="name" placeholder="Name" value="<?php echo $product['name']; ?>">

        <label for="">Price</label>
        <input type="number" step="0.01" name="price" placeholder="Price" value="<?php echo $product['price']; ?>">

        <label for="">Image</label>
        <input type="url" name="image" placeholder="https://product.png" value="<?php echo $product['image']; ?>">

        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        
        <input type="submit" value="Update Product">
      </form>
    </section>
  </div>
</section>

<script src="<?php echo BASE_URL; ?>app/public/js/editProduct.js"></script>