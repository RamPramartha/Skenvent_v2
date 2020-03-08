<div class="jumbotron">
  <div class="jumbotron__title">
    <h1>Selamat Datang 👋</h1>
    <p>
      Hey, kamu adalah anggota kami? Jika iya silahkan lengkapi yang dibawah untuk lanjut. 👇
    </p>
  </div>
  <div class="jumbotron__card">
    <form action="" method="POST" class="form">
      <!-- input email -->
      <div class="form__group">
        <div class="form__group--icon">
          <i class="far fa-fw fa-envelope"></i>
        </div>
        <div class="form__group--fields">
          <label for="verifyUser">Email atau Username</label>
          <input type="text" name="verifyUser" id="verifyUser" autocomplete="off" />
          <small class="err"></small>
        </div>
        <div class="form__group--inform">
          <span class="simptip-position-right simptip-smooth simptip-fade err-email" data-tooltip="err disini">
            <i class="fas fa-fw fa-exclamation-triangle"></i>
          </span>
          <span class="simptip-position-right simptip-smooth simptip-fade info-email" data-tooltip="Kamu bisa masuk menggunakan email ataupun username loh.">
            <i class="fas fa-fw fa-question"></i>
          </span>
        </div>
      </div>
      <!-- end input -->

      <!-- input password -->
      <div class="form__group">
        <div class="form__group--icon">
          <i class="fas fa-fw fa-fingerprint"></i>
        </div>
        <div class="form__group--fields">
          <label for="password">Passwordmu disini</label>
          <input type="password" name="password" id="password" autocomplete="off" />
          <small class="err"></small>
        </div>
        <div class="form__group--inform">
          <span class="simptip-position-right simptip-smooth simptip-fade err-password" data-tooltip="err disini">
            <i class="fas fa-fw fa-exclamation-triangle"></i>
          </span>
          <span class="simptip-position-right simptip-smooth simptip-fade info-password" data-tooltip="Masukkan password mu dengan benar! 😉">
            <i class="fas fa-fw fa-question"></i>
          </span>
        </div>
      </div>
      <!-- end input -->

      <div class="form__submit">
        <a href="<?= base_url("/auth/register"); ?>" class="btn btn__secondary simptip-position-left simptip-smooth" data-tooltip="Belum memiliki akun? Mari buat satu. 🏃‍♀️">Mari Buat Akun</a>
        <button type="submit" class="btn btn__primary simptip-position-right simptip-smooth" data-tooltip="Masukkan aku tolong! 👉">
          Lanjutkan
        </button>
    </form>
  </div>
</div>
