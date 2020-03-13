<?php require_once "header.php"?>

 
	<div class="aboutus">
		<div class="container">   <p> </p>


	<!-- sweet alert  start-->
    <?php if (isset($_SESSION['userkullanici_mail'])) {?>
		<script type="text/javascript">
	swal({
  title: "Oz Sehifene Xos Gelmisen!",
  text: "<?php echo "Salam"." ".$kullanicicek['kullanici_ad']."Dostum Necesen:) "?>",
  icon: "success",
  button: "Ok",
}).then((value) => {
  swal(`Kef Ele eeee Dostum:) `,'Yuxarida Gorduyun Bolmeden Istediyine Daxil ola Bilersen'
  
  );
});
<?php }?>

	</script>

	<!-- sweet alert finish-->
<img width="2000" src="dimg/w.jpg" alt="">

	</div>
	

	
 
	