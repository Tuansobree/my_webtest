<?php include "healder-top.php"; ?>
<!-- End Navbar -->
    
    

    
<!--------------------------------------
MAIN
--------------------------------------->    
<div class="container pt-4 pb-4">
	<div class="row justify-content-center">
		<div class="col-md-12 col-lg-8">
			<article class="article-post">
				<?php echo file_get_contents("./admin/setting/about.txt"); ?>

			</article>

		</div>
	</div>
</div>
    
<div class="container pt-4 pb-4">
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
    
<?php include 'footer.php'; ?>