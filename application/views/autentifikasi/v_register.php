<div class="register">
    <div class="title">Registrasi</div>
    <div class="content_regis">
      <form action="<?= base_url('auth/register')?>" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nama Lengkap</span>
            <input type="text" name="nama" placeholder="Masukkan Nama Lengkap Anda"  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong atau Email Salah')" oninput="setCustomValidity('')">
          </div>
         
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Masukkan Email Anda"  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong atau Email Salah')" oninput="setCustomValidity('')">
          </div>
          <div class="input-box">
            <span class="details">username</span>
            <input type="text" name="username" placeholder="Masukkan Username Anda"  required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong atau Email Salah')" oninput="setCustomValidity('')">
          </div>
          <div class="input-box">
            <span class="details">Nomor KTP</span>
            <input type="text" name="ktp" placeholder="Masukkan Nomor KTP Anda"  required>
          </div>
          <div class="input-box">
            <span class="details">Nomor Telepon</span>
            <input type="text" name="no_hp" placeholder="Masukkan Nomor Telepon Anda"  required>
          </div>
          <div class="input-box">
            <span class="details">Alamat</span>
            <input type="text" name="alamat" placeholder="Masukkan Alamat Anda"  required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Masukkan Password Anda"  required>
          </div>
          <div class="input-box">
            <span class="details">Konfirmasi Password</span>
            <input type="password" name="cpassword" placeholder="Masukkan Password Anda Kembali"  required>
          </div>
        </div>
        <div class="jekel-details">
          <input type="radio" name="jekel" value="Laki-Laki" id="jk-1">
          <input type="radio" name="jekel" value="Perempuan" id="jk-2">
          <input type="radio" name="jekel" value="Tidak Diketahui" id="jk-3">
          <span class="jekel-title">Jenis Kelamin</span>
          <div class="category">
            <label for="jk-1">
            <span class="jk one"></span>
            <span class="jekel">Laki-Laki</span>
          </label>
          <label for="jk-2">
            <span class="jk two"></span>
            <span class="jekel">Perempuan</span>
          </label>
          <label for="jk-3">
            <span class="jk three"></span>
            <span class="jekel">Tidak Ingin Kasih Tau</span>
            </label>
          </div>
        </div>
        <div class="button">
          <button type="submit">Register</button>
        </div>
      </form>
      </div>
  </div>