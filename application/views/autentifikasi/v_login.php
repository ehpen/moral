<div class="wrapper">
    <div class="title">
      Login Form
    </div>
    <form action="<?= base_url('auth') ?>" method="POST">
      <div class="field">
        <input type="email" name="email" value="<?= set_value('email');?>" required>
        <label>Email Address</label>
      </div>
      <div class="field">
        <input type="password" name="password" id="password" required>
        <label>Password</label>
      </div>
      <div class="content">
        <div class="checkbox">
          <input type="checkbox" id="showPassword" onclick="showpass()">
          <label for="show" id="show">Lihat Password</label>
        </div>
      </div>
      <div class="field">
        <button type="submit">Login</button>
      </div>
      <div class="signup-link">
        Belum Punya Akun? <a href="<?= base_url('auth/register') ?>">Daftar Sekarang</a>
      </div>
    </form>
</div>
</div>
</div>