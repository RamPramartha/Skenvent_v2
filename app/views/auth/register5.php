<div class="card">
  <div class="card__title">
    <h1>Ayo lagi 🤏</h1>
    <p>
      Hello <?= $username; ?>, Langkah terakhir adalah memilih index dan semua
      selesai. 🤘
    </p>
  </div>
  <form action="" method="POST">
    <div class="card__body">
      <!-- index 1 -->
      <input
        type="radio"
        class="--radioToggler"
        name="index"
        value="i-1"
        id="i1"
      />
      <label for="i1" class="chip">
        <span class="chip__title">
          Index Satu (1)
        </span>
        <span class="chip__icon">
          <i class="far fa-fw fa-check-circle"></i>
        </span>
      </label>
      <!-- end index 1 -->

      <!-- index 2 -->
      <input
        type="radio"
        class="--radioToggler"
        name="index"
        value="i-2"
        id="i2"
      />
      <label for="i2" class="chip">
        <span class="chip__title">
          Index Dua (2)
        </span>
        <span class="chip__icon">
          <i class="far fa-fw fa-check-circle"></i>
        </span>
      </label>
      <!-- end index 2 -->

      <!-- index 3 -->
      <input
        type="radio"
        class="--radioToggler"
        name="index"
        value="i-3"
        id="i3"
      />
      <label for="i3" class="chip">
        <span class="chip__title">
          Index Tiga (3)
        </span>
        <span class="chip__icon">
          <i class="far fa-fw fa-check-circle"></i>
        </span>
      </label>
      <!-- end index 3 -->
    </div>
    <!-- submit button -->
    <div class="card__button">
      <button
        id="submitter"
        type="submit"
        name="submit"
        disabled
        class="btn btn__primary simptip-position-bottom simptip-smooth simptip-fade"
        data-tooltip="Hey kamu masih belum memilih satupun dari index diatas"
      >
        Selesai, Ayo Mulai!
      </button>
    </div>
  </form>
</div>
