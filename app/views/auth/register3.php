<div class="card">
  <div class="card__title">
    <h1>Sedikit lagi 🤏</h1>
    <p>
      Hello <?= $username ?>, lengkapi sedikit lagi data dirimu dengan memilih
      sebuah jurusan! 💪
    </p>
  </div>
  <form action="<?= currpath(); ?>" method="POST">
    <div class="card__body">
      <!-- dpib -->
      <input
        type="radio"
        class="--radioToggler"
        name="jurusan"
        value="dpib"
        id="dpib"
      />
      <label for="dpib" class="chip">
        <span class="chip__title">
          Design Pemodelan Informasi dan Bangunan
        </span>
        <span class="chip__icon">
          <i class="far fa-fw fa-check-circle"></i>
        </span>
      </label>
      <!-- end dpib -->

      <!-- bkp -->
      <input
        type="radio"
        class="--radioToggler"
        name="jurusan"
        value="bkp"
        id="bkp"
      />
      <label for="bkp" class="chip">
        <span class="chip__title">
          Bisnis Kontruksi dan Properti
        </span>
        <span class="chip__icon">
          <i class="far fa-fw fa-check-circle"></i>
        </span>
      </label>
      <!-- end bkp -->

      <!-- tp -->
      <input
        type="radio"
        class="--radioToggler"
        name="jurusan"
        value="tp"
        id="tp"
      />
      <label for="tp" class="chip">
        <span class="chip__title">
          Teknik Pendingin dan Tata Udara
        </span>
        <span class="chip__icon">
          <i class="far fa-fw fa-check-circle"></i>
        </span>
      </label>
      <!-- end tp -->

      <!-- tl -->
      <input
        type="radio"
        class="--radioToggler"
        name="jurusan"
        value="tl"
        id="tl"
      />
      <label for="tl" class="chip">
        <span class="chip__title">
          Teknik Instalasi Tenaga LIstrik
        </span>
        <span class="chip__icon">
          <i class="far fa-fw fa-check-circle"></i>
        </span>
      </label>
      <!-- end tl -->

      <!-- pm -->
      <input
        type="radio"
        class="--radioToggler"
        name="jurusan"
        value="pm"
        id="pm"
      />
      <label for="pm" class="chip">
        <span class="chip__title">
          Permesinan
        </span>
        <span class="chip__icon">
          <i class="far fa-fw fa-check-circle"></i>
        </span>
      </label>
      <!-- end pm -->

      <!-- tbsm -->
      <input
        type="radio"
        class="--radioToggler"
        name="jurusan"
        value="tbsm"
        id="tbsm"
      />
      <label for="tbsm" class="chip">
        <span class="chip__title">
          Teknik Bisnis Sepeda Motor
        </span>
        <span class="chip__icon">
          <i class="far fa-fw fa-check-circle"></i>
        </span>
      </label>
      <!-- end tbsm -->

      <!-- tkro -->
      <input
        type="radio"
        class="--radioToggler"
        name="jurusan"
        value="tkro"
        id="tkro"
      />
      <label for="tkro" class="chip">
        <span class="chip__title">
          Teknik Kendaraan Ringan Otomotif
        </span>
        <span class="chip__icon">
          <i class="far fa-fw fa-check-circle"></i>
        </span>
      </label>
      <!-- end tkro -->

      <!-- av -->
      <input
        type="radio"
        class="--radioToggler"
        name="jurusan"
        value="av"
        id="av"
      />
      <label for="av" class="chip">
        <span class="chip__title">
          Audio Video
        </span>
        <span class="chip__icon">
          <i class="far fa-fw fa-check-circle"></i>
        </span>
      </label>
      <!-- end av -->

      <!-- tkj -->
      <input
        type="radio"
        class="--radioToggler"
        name="jurusan"
        value="tkj"
        id="tkj"
      />
      <label for="tkj" class="chip">
        <span class="chip__title">
          Teknik Komputer dan Jaringan
        </span>
        <span class="chip__icon">
          <i class="far fa-fw fa-check-circle"></i>
        </span>
      </label>
      <!-- end tkj -->

      <!-- mm -->
      <input
        type="radio"
        class="--radioToggler"
        name="jurusan"
        value="mm"
        id="mm"
      />
      <label for="mm" class="chip">
        <span class="chip__title">
          Multimedia
        </span>
        <span class="chip__icon">
          <i class="far fa-fw fa-check-circle"></i>
        </span>
      </label>
      <!-- end mm -->

      <!-- rpl -->
      <input
        type="radio"
        class="--radioToggler"
        name="jurusan"
        value="rpl"
        id="rpl"
      />
      <label for="rpl" class="chip">
        <span class="chip__title">
          Rekayasa Perangkat Lunak
        </span>
        <span class="chip__icon">
          <i class="far fa-fw fa-check-circle"></i>
        </span>
      </label>
      <!-- end rpl -->
    </div>

    <!-- submit button -->
    <div class="card__button">
      <button
        type="submit"
        name="submit"
        disabled
        class="btn btn__primary simptip-position-bottom simptip-smooth simptip-fade"
        data-tooltip="Hey kamu masih belum memilih satupun jurusan"
      >
        Lanjutkan Ke Langkah Selanjutnya
      </button>
    </div>
  </form>
</div>
