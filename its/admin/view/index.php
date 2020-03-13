<?php require_once admin_view('static/header')?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Aktivlik</h4>
                  <p class="card-category">  Bu CMS projesi 2019 cu il avqustda Zaur Aliyev terefinden tasarlanmisdir. <br>
                    Elaqe saxlamaq ucun aliyevzaur1999@gmail.com adresine mesaj yaza bilersiz. <br>
                    Tesekkurler</p>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Yonetim islerini soldaki bar ile ede bilersiz.</label>
                        <h2 style="text-transform: uppercase;">Xosgeldin <?=$_SESSION['user_name']?> Necesen :)</h2> 
                        </div>
                      </div> 
                    </div> 
                     <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                    <a href="">
                        <img class="img" src="<?=admin_public_url('img/faces/zaur.png')?>" />
                    </a>
                    </div>
                    <div class="card-body">
                    <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                    <h4 class="card-title">Zaur Aliyev</h4>
                    <p class="card-description">
                        Don't be scared of the truth because we need to restart the human foundation in truth And Never give up, Believe in yourself everytime I love you so much...
                    </p>
                    </div>
                </div>
                </div>
          </div>
        </div>
      </div>
<?php require_once admin_view('static/footer')?>
