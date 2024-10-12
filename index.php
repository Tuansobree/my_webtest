<?php include "healder-top.php"; ?>
    
<!--------------------------------------
HEADER
--------------------------------------->
<div class="container">
	<div class="jumbotron jumbotron-fluid mb-3 pt-4 pb-0 bg-lightblue position-relative">
		<div class="pl-4 pr-0 h-100 tofront">
			<div class="row justify-content-between mr-2">
				<?php include './admin/setting/introduction.txt'; ?>
			</div>
		</div>
	</div>
</div>
<!-- End Header -->
    
    
<!--------------------------------------
MAIN
--------------------------------------->
    
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
    

    
<!--------------------------------------
FOOTER
--------------------------------------->
<?php include 'footer.php'; ?>