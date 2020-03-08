<div class="card">
 <div class="card__title">
   <h1>Ayo lagi 🤏</h1>
   <p>
     Hello <?= $username; ?>, Setelah kamu memilih jurusan, mari kita pilih
     kelasmu! 💪
   </p>
 </div>
 <form action="" method="POST">
   <div class="card__body">
     <!-- x -->
     <input
       type="radio"
       class="--radioToggler"
       name="kelas"
       value="x"
       id="x"
     />
     <label for="x" class="chip">
       <span class="chip__title">
         Kelas Sepuluh (X)
       </span>
       <span class="chip__icon">
         <i class="far fa-fw fa-check-circle"></i>
       </span>
     </label>
     <!-- end x -->

     <!-- xi -->
     <input
       type="radio"
       class="--radioToggler"
       name="kelas"
       value="xi"
       id="xi"
     />
     <label for="xi" class="chip">
       <span class="chip__title">
         Kelas Sebelas (XI)
       </span>
       <span class="chip__icon">
         <i class="far fa-fw fa-check-circle"></i>
       </span>
     </label>
     <!-- end xi -->

     <!-- XII -->
     <input
       type="radio"
       class="--radioToggler"
       name="kelas"
       value="XII"
       id="XII"
     />
     <label for="XII" class="chip">
       <span class="chip__title">
         Kelas Dua Belas (XII)
       </span>
       <span class="chip__icon">
         <i class="far fa-fw fa-check-circle"></i>
       </span>
     </label>
     <!-- end XII -->
   </div>
   <!-- submit button -->
   <div class="card__button">
     <button
       id="submitter"
       type="submit"
       name="submit"
       disabled
       class="btn btn__primary simptip-position-bottom simptip-smooth simptip-fade"
       data-tooltip="Hey pilihlah kelasmu terlebih dahulu"
     >
       Langkah Selanjutnya
     </button>
   </div>
 </form>
</div>
