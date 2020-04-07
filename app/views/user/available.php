<div class="container">


<div class="columns mt-1 is-multiline is-desktop">
<?php foreach ($items as $item) { ?>
  <div class="card column is-one-quarter mt-1" >
    <header class="card-header">
      <p class="card-header-title">
        <?= $item["nama"] ?>
      </p>
    </header>
    <div class="card-content">
      <div class="content">
          <?= $item["deskripsi"] ?>
      </div>
    </div>
    <footer class="card-footer">
      <p class="card-footer-item">Tersedia: <?= $item["available_qty"] ?></p>
      <a href="#" class="card-footer-item">Pinjam</a>
    </footer>
  </div>
<?php } ?>
</div>



</div>

