<div class="container">

<div class="columns mt-1">
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

<!-- modal untuk form peminjaman -->

<div class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Modal title</p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <!-- Content ... -->
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success">Save changes</button>
      <button class="button">Cancel</button>
    </footer>
  </div>
</div>

