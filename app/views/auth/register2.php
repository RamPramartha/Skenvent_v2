<div class="jumbotron">
  <div class="jumbotron__title">
    <h1>Lanjut lagi! ✍</h1>
    <p>
      Hey agar kita bisa saling mengenal, bisakah aku mengetahui nama
      lengkapmu? 🥰
    </p>
  </div>
  <div class="jumbotron__card">
    <form action="<?= currpath(); ?>" method="POST" class="form">
      <div class="form__group <?= isError("fullname"); ?>">
        <div class="form__group--icon">
          <i class="fas fa-fw fa-signature"></i>
        </div>
        <div class="form__group--fields">
          <label for="fullname">Nama lengkapmu?</label>
          <input
            type="text"
            name="fullname"
            id="fullname"
            autocomplete="off"
            class="form__fullname"
            value="<?= getValue("fullname"); ?>"
          />
          <small class="err"><?= showError("fullname"); ?></small>
        </div>
        <div class="form__group--inform">
          <span
            class="err-fullname"
          >
            <i
              class="fas fa-fw fa-exclamation-triangle err-fullname"
            ></i>
          </span>
          <span
            class="simptip-position-right simptip-smooth info-fullname"
            data-tooltip="Misalnya John Smith, 🥰"
          >
            <i class="fas fa-fw fa-question info-fullname"></i>
          </span>
        </div>
      </div>
      <div class="form__submit">
        <button
          type="submit"
          class="btn btn__primary simptip-position-right simptip-smooth"
          data-tooltip="Lanjutkan ke langkah selanjutnya! 👌"
        >
          Lanjutkan
        </button>
      </div>
    </form>
  </div>
</div>
