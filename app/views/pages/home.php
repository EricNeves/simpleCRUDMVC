<main>
  <section class="container">
    <div class="header__main">
      <h1>
        Products

        <i class="fa-solid fa-shop"></i>
      </h1>

    </div>

    <section class="products">

      <?php foreach ($products as $item) { ?>

        <div class="deleteModal">
          <div class="contentModal">

            <a href="javascript:void(0)" id="closeModal">
              <i class="fa-solid fa-circle-xmark"></i>
            </a>
            <h1>Tem certeza que deseja apagar ?</h1>
            <a id="btnDel" href="javascript:void(0)">Deletar</a>

            <div class="result modal__msg">
            </div>
          </div>
        </div>

        <section>
          <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">

          <h1>
            <?php echo ucfirst($item['name']); ?>
          </h1>
          <p>R$
            <?php echo number_format($item['price'], 2, ',', '.'); ?>
          </p>

          <?php
          if ($isAuth) { ?>

            <div class="actions">
              <a href="<?php echo BASE_URL . 'edit/' . $item['id']; ?>">
                <i class="fa-solid fa-pen"></i>
              </a>

              <a id="btnOpenModal" item="<?php echo $item['id']; ?>" href="javascript:void(0)">
                <i class="fa-solid fa-trash-can"></i>
              </a>
            </div>

          <?php } ?>

        </section>
      <?php } ?>
    </section>

    <div class="pagination">
        <?php for ($q = 0; $q <= $totalProducts; $q++) { ?>
          <?php
              if ($q !== 0) {
            ?>
            <a href="<?php echo BASE_URL . "page/$q"; ?>"><?php echo $q; ?></a>
          <?php }
        } ?>
      </div>
  </section>
</main>

<script src="<?php echo BASE_URL; ?>app/public/js/deleteProduct.js"></script>