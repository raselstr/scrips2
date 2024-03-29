
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url(); ?>templates/node_modules/selectric/public/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>templates/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>templates/assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?= base_url(); ?>templates/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>
            

            <div class="card card-primary">
              <div class="card-header"><h4>Daftar User Baru</h4></div>
              <div class="card-body">
               
              <?php $errors = session()->getFlashdata('validation') ?>

                <form action="<?= site_url('users/create'); ?>" method="post" >
                  <?= csrf_field(); ?>
                  <div class="form-group">
                    <label for="user_nama">Nama Lengkap</label>
                    <input id="user_nama" type="text" class="form-control <?= isset($errors['user_nama']) ? 'is-invalid' : null ; ?>" name="user_nama"  value="<?= old('user_nama'); ?>" >
                    <div class="invalid-feedback">
                        <?= isset($errors['user_nama']) ? $errors['user_nama'] : null ; ?>
                        
                    </div>

                  </div>
                  <div class="form-group">
                    <label for="user_email">Email</label>
                    <input id="user_email" type="text" class="form-control <?= isset($errors['user_email']) ? 'is-invalid' : null ; ?>" name="user_email" value="<?= old('user_email'); ?>">
                    <div class="invalid-feedback">
                        <?= isset($errors['user_email']) ? $errors['user_email'] : null ; ?>        
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="user_password" class="d-block">Password</label>
                      <input id="user_password" type="password" class="form-control <?= isset($errors['user_password']) ? 'is-invalid' : null ; ?> " data-indicator="pwindicator" name="user_password" value="<?= old('user_password'); ?>">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                      <div class="invalid-feedback">
                        <?= isset($errors['user_password']) ? $errors['user_password'] : null ; ?>        
                    </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="pass_confirm" class="d-block">Confirm Password</label>
                      <input id="pass_confirm" type="password" class="form-control <?= isset($errors['pass_confirm']) ? 'is-invalid' : null ; ?> " data-indicator="pwindicator" name="pass_confirm" value="<?= old('pass_confirm'); ?>">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                      <div class="invalid-feedback">
                        <?= isset($errors['pass_confirm']) ? $errors['pass_confirm'] : null ; ?>        
                    </div>
                    </div>
                  </div>

                    

                  <!-- <div class="form-divider pwstrength">
                    Your Home
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Country</label>
                      <select class="form-control selectric">
                        <option>Indonesia</option>
                        <option>Palestine</option>
                        <option>Syria</option>
                        <option>Malaysia</option>
                        <option>Thailand</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Province</label>
                      <select class="form-control selectric">
                        <option>West Java</option>
                        <option>East Java</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>City</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-6">
                      <label>Postal Code</label>
                      <input type="text" class="form-control">
                    </div>
                  </div> -->

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row sm-gutters">
                      <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" te>
                          Register
                        </button>
                      </div>
                      <div class="col-6">
                        <a href="<?= site_url('login'); ?>" class="btn btn-primary btn-lg btn-block">Batal</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url(); ?>templates/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?= base_url(); ?>templates/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?= base_url(); ?>templates/node_modules/selectric/public/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url(); ?>templates/assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>templates/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url(); ?>templates/assets/js/page/auth-register.js"></script>
</body>
</html>
