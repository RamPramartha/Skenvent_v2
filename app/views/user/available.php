<div class="container">

<p style="margin-top:2em;"></p>
<div class="columns">
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

