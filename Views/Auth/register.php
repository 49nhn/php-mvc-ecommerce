<div class="auth">
  <div class="auth__header">
    <div class="auth__logo">
      <img height="90" src="https://d2eip9sf3oo6c2.cloudfront.net/series/square_covers/000/000/083/full/EGH_VueJS_Final.png" alt="">
    </div>
  </div>
  <div class="auth__body">
    <form class="auth__form" autocomplete="off" method="post" action="/index.php?controller=auth&action=registerUser">
      <div class="auth__form_body">
        <h3 class="auth__form_title">Register</h3>
        <div class="auth__form_message">
          <?php if (isset($message)) : ?>
            <div class="alert alert-danger" role="alert">
              <?= $message ?>
            </div>
          <?php endif; ?>
        <div>

          <div class="form-group">
            <div class="form-group">
              <label class=" small">Email</label>
              <input type="email" class="form-control" placeholder="example@example.com" name="email">
            </div>
            <label class=" small">Username</label>
            <input type="text" class="form-control" placeholder="Username" name="username">
          </div>
          <div class="form-group">
            <label class=" small">Password</label>
            <input type="password" class="form-control" placeholder="*******" name="password">
          </div>
        </div>
      </div>
      <div class="auth__form_actions">
        <button class="btn btn-primary btn-lg btn-block">
          Register
        </button>
      </div>
    </form>
  </div>
</div>