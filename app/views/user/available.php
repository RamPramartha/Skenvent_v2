<div class="container">

<<<<<<< HEAD
<div class="columns" id="content">
=======
<div class="columns mt-1">
>>>>>>> e291f868be27a66ed3ee2d087521b57c7c23e8fd
<?php foreach ($items as $item) { ?>

<div class="columns is-one-quarter">
<div class="card" >
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
</div>


<?php } ?>

</div>
</div>

