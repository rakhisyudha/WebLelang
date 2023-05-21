
    <div class="center">
      <h1>Login</h1>
      <?php if($this->session->flashdata('pesan')){echo $this->session->flashdata('pesan');} ?>
      <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
      <form method="post" action="<?= base_url('auth') ?>">
        <div class="txt_field">
          <input type="email" id="email" name="email" required />
          <span></span>
          <label for="email">Email</label>
        </div>
        <div class="txt_field">
          <input type="password" id="password" name="password" required />
          <span></span>
          <label for="password">Password</label>
        </div>
        <input type="submit" name="submit" value="Login" />
        <div class="signup_link">Doesn't Have any account? <a href="<?= base_url('auth/register') ?>">Register</a></div>
      </form>
    </div>
