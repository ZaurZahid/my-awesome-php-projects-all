
   <?php require view('static/header')?>
  
   <div class="container">
        <div class="row justify-content-md-center mt-4">
            <div class="col-md-4">
                <form method="POST">
                    <h3 class="mb-3">Giris ele</h3>
                    <?php if($err=error()):?>
                        <div class="alert alert-danger" role="alert">
                       <?= $err?>
                        </div>
                    <?php endif ?>
                    <?php if($succ=success()):?>
                        <div class="alert alert-success" role="alert">
                       <?= $succ?>
                        </div>
                    <?php endif ?> 
                    <div class="form-group">
                        <label for="username">Kullanici adiniz</label>
                        <input type="text" class="form-control" name="username" value="<?= post('username')?>" placeholder="Adinizi yazin...."/>
                    </div>
                 
                    <div class="form-group">
                        <label for="password">Sifreniz</label>
                        <input type="text" class="form-control" name="password" value="<?= post('password')?>" placeholder="Sifrenizi yazin...."/>
                    </div>                    
                    <input type="hidden" name="submit" value="1">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Giris yap</button>              
                  </div>
                </form>
            </div>
        </div>
  </div>
   <?php require view('static/footer')?>