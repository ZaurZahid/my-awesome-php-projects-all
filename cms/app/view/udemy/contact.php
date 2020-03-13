<?php require view('static/header')?>     
 
<section class="jumbotron text-center">
  <div class="container">
    <h1>Iletisim</h1>
    <div class="breadcrumb-custom">
        <a href="" style="color:red">Anasayfa</a>/
        <a href="" class="active">Iletisim</a> 
    </div> 
 </div>
</section>

<div class="container">
    <div class="alert alert-danger" style="display:none" id="contact-error-msg">  </div>
    <div class="alert alert-success" style="display:none" id="contact-success-msg">  </div>
    <form action="" id="contact-form" onsubmit="return false;">
       <div class="row">  
            <div class="col-md-6">
                    <label>Ad Soyad</label>
                    <input type="text" name="name" class="form-control" placeholder="Adinizi yazin">
            </div>
            <div class="col-md-6">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Emailiniz">
            </div>
            <div class="col-md-6">
                <label>Telefon Nomresi</label>
                <input type="text" name="phone" class="form-control" placeholder="Telefon Nomrenizi yazin">
            </div>
            <div class="col-md-6">
                <label>Mesaj basligi</label>
                <input type="text" name="subject" class="form-control" placeholder="Mesaj basligi">
            </div>
            <div class="col-md-12">
                <label>Mesajiniz</label>
                <textarea name="message" class="form-control" rows="3"></textarea><br>
            </div>  
            <div class="col-md-12"> 
                <button class="btn btn-primary" name='submit' onclick="contact('#contact-form')" >Gonder</button> 
            </div>
        </div>
    </form>
</div>  
<br><hr>
<?php require view('static/footer')?>