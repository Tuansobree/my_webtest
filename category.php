<?php 

include "healder-top.php"; 

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
    
<!--------------------------------------
Main
--------------------------------------->
<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-8">

			<?php page_first_top(); ?>
			
		</div>
		<div class="col-md-4 pl-4">
			<div class="sticky-top">
				<h5 class="font-weight-bold spanborder"><span>เนื้อหาที่เกี่ยวข้อง</span></h5>
				<ol class="list-featured">
					<?php page_top_on_category(6,$file); ?>
				</ol>
			</div>
		</div>
	</div>
</div>
    


<!-- End Main -->
    
<!--------------------------------------
FOOTER
--------------------------------------->
<?php include 'footer.php'; ?>