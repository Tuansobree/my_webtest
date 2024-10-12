<?php 

if (isset($_GET['f'])) {
	$file   = $_GET['f'];
	$path   = "./admin/content/page/detail/".$file.".txt";
		
    if (file_exists($path)) {
    	$detail = file_get_contents($path);
    } else {
    	$detail = "<center> EError Page 404</center>";
    }

}
else {
		echo '<script>window.location.href = "./"; </script>';
}

?>


<?php include "healder-top.php"; ?>
    

    
<!--------------------------------------
MAIN
--------------------------------------->
<div class="container pt-4 pb-4">
	<div class="row justify-content-center">
		<div class="col-md-12 col-lg-8">
			<article class="article-post">
				<?php echo $detail; ?>
			</article>			
		</div>
	</div>
</div>
    
<div class="container pt-4 pb-4">
	<h5 class="font-weight-bold spanborder"><span>Recommend</span></h5>
	<div class="row">
		<div class="col-lg-6">
			<div class="card border-0 mb-4 box-shadow h-xl-300">
				<?php hight_light_first(); ?>	
			</div>
		</div>
		<div class="col-lg-6">
			<div class="flex-md-row mb-4 box-shadow h-xl-300">
				<?php hight_light(); ?>		
			</div>
		</div>
	</div>
</div>
<!-- End Main -->
    
<!--------------------------------------
FOOTER
--------------------------------------->
<?php include 'footer.php'; ?>