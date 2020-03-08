<div class="jumbotron">
  <div class="jumbotron__title">
    <h1>Selamat Datang 👋</h1>
    <p>
      Hey, mari kita membuat sebuah akun baru untuk mu dengan mengisi
      beberapa data dibawah. 👇
    </p>
  </div>

  <div class="jumbotron__card">
    <form action="<?= currpath(); ?>" method="POST" class="form">
      <!-- input NISN -->
      <div class="form__group <?= isError("nisn"); ?>">
        <div class="form__group--icon">
          <i class="far fa-fw fa-id-badge"></i>
        </div>
        <div class="form__group--fields">
          <label for="nisn">Masukkan NISN mu disini</label>
          <input type="text" name="nisn" id="nisn" autocomplete="off" value="<?= getValue("nisn"); ?>" />
          <small class="err"><?= showError("nisn");?></small>
        </div>
        <div class="form__group--inform">
          <span
            class="err-nisn"
          >
            <i class="fas fa-fw fa-exclamation-triangle"></i>
          </span>
          <span
            class="simptip-position-right simptip-smooth simptip-fade info-nisn"
            data-tooltip="NISN biasanya terdiri dari 4 angka atau lebih."
          >
            <i class="fas fa-fw fa-question"></i>
          </span>
        </div>
      </div>
      <!-- end input -->

      <!-- input email -->
      <div class="form__group <?= isError("email"); ?>">
        <div class="form__group--icon">
          <i class="fas fa-fw fa-at"></i>
        </div>
        <div class="form__group--fields">
          <label for="email">Emailmu disini</label>
          <input
            type="text"
            name="email"
            id="email"
            autocomplete="off"
            value="<?=getValue("email"); ?>"
          />
          <small class="err"><?= showError("email"); ?></small>
        </div>
        <div class="form__group--inform">
          <span
            class="err-email"
          >
            <i class="fas fa-fw fa-exclamation-triangle"></i>
          </span>
          <span
            class="simptip-position-right simptip-smooth simptip-fade info-email"
            data-tooltip="Ini contoh email untuk mu. 'example@gmail.com'"
          >
            <i class="fas fa-fw fa-question"></i>
          </span>
        </div>
      </div>
      <!-- end input -->

      <!-- input password -->
      <div class="form__group <?= isError("password"); ?>">
        <div class="form__group--icon">
          <i class="fas fa-fw fa-fingerprint"></i>
        </div>
        <div class="form__group--fields">
          <label for="password">Passwordmu disini</label>
          <input
            type="password"
            name="password"
            id="password"
            autocomplete="off"
            value="<?= getValue("password") ?>"
          />
          <small class="err"><?= showError("password"); ?></small>
        </div>
        <div class="form__group--inform">
          <span
            class="err-password"
          >
            <i class="fas fa-fw fa-exclamation-triangle"></i>
          </span>
          <span
            class="simptip-position-right simptip-smooth simptip-fade info-password"
            data-tooltip="Buat password yang kuat yahhh! 😉"
          >
            <i class="fas fa-fw fa-question"></i>
          </span>
        </div>
      </div>
      <!-- end input -->

      <!-- input cpasswrod -->
      <div class="form__group <?= isError("cpassword"); ?>">
        <div class="form__group--icon">
          <i class="fas fa-fw fa-redo-alt"></i>
        </div>
        <div class="form__group--fields">
          <label for="cpassword">Konfirmasikan passwordmu</label>
          <input
            type="password"
            name="cpassword"
            id="cpassword"
            autocomplete="off"
            value="<?= getValue("cpassword"); ?>"
          />
          <small class="err"><?= showError("cpassword"); ?></small>
        </div>
        <div class="form__group--inform">
          <span
            class="err-cpassword"
          >
            <i class="fas fa-fw fa-exclamation-triangle"></i>
          </span>
          <span
            class="simptip-position-right simptip-smooth simptip-fade info-cpassword"
            data-tooltip="Tulis kembali passwordmu disini. 🤫"
          >
            <i class="fas fa-fw fa-question"></i>
          </span>
        </div>
      </div>
      <!-- end input -->

      <div class="form__submit">
        <a
          href="#!"
          class="btn btn__secondary simptip-position-left simptip-smooth"
          data-tooltip="Sudah punya akun? masuk. 🏃‍♀️"
          >Masuk</a
        >
        <button
          type="submit"
          class="btn btn__primary simptip-position-right simptip-smooth"
          data-tooltip="Lanjutkan ke langkah selanjutnya! 👉"
        >
          Lanjutkan
        </button>
      </div>
    </form>
  </div>
</div>
