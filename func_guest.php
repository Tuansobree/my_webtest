<?php 
date_default_timezone_set("Asia/Bangkok");

function nav_category(){
	$path    = './admin/content/category/';	
	$files = array_diff(scandir($path), array('.', '..'));
	foreach ($files as $key => $value) {
		$pre_user_id = explode(".", $value);
		$id   = $pre_user_id[0];
		$name = file_get_contents($path.$value);


		echo '	<li class="nav-item">
					<a class="nav-link" href="./category.php?f='.$id.'">'.$name.'<span class="sr-only">(current)</span></a>
				</li>';
	}	
}


function page_top($limit){
	$path    = './admin/content/page/title/';	
	$files = array_diff(scandir($path), array('.', '..'));


	krsort($files);
	$files_limit = array_slice($files, 1, $limit);

	

	foreach ($files_limit as $key => $value) {
		$pre_user_id = explode(".", $value);
		$id     = $pre_user_id[0];
		$data_get    = explode( "%|%" , file_get_contents($path.$value) );


		$JS_ID = "'".$id."'";
		$func_del   = ' onclick="del('.$JS_ID.')" ';
		$func_edit  = ' onclick="edit('.$JS_ID.')" ';
		$func_view  = ' onclick="view('.$JS_ID.')" ';

		//$category_name = category_name($data_get[0]);
		$title    = $data_get[1];
		$tag      = $data_get[2];
		$creater  = $data_get[3];


		$date  = date('m/d/Y H:i', $id);

		echo '
					<li>
					<span>
					<h6 class="font-weight-bold">
					<a href="./article.php?f='.$id.'" class="text-dark">'.$title.'</a>
					</h6>
					<p class="text-muted">
						 ' . $date . '  '.$creater.'
					</p>
					</span>
					</li>
		';
	}	
}


function page_top_on_category($limit,$category){
	$path    = './admin/content/page/title/';	


	$files = page_with_category($category);

	krsort($files);
	$files_limit = array_slice($files, 1, $limit);

	

	foreach ($files_limit as $key => $value) {
		$pre_user_id = explode(".", $value);
		$id     = $pre_user_id[0];
		$data_get    = explode( "%|%" , file_get_contents($path.$value) );


		$JS_ID = "'".$id."'";
		$func_del   = ' onclick="del('.$JS_ID.')" ';
		$func_edit  = ' onclick="edit('.$JS_ID.')" ';
		$func_view  = ' onclick="view('.$JS_ID.')" ';

		$title    = $data_get[1];
		$tag      = $data_get[2];
		$creater  = $data_get[3];


		$date  = date('m/d/Y H:i', $id);

		echo '
					<li>
					<span>
					<h6 class="font-weight-bold">
					<a href="./article.php?f='.$id.'" class="text-dark">'.$title.'</a>
					</h6>
					<p class="text-muted">
						 ' . $date . '  '.$creater.'
					</p>
					</span>
					</li>
		';
	}	
}

function page_first_top(){

	$path    = './admin/content/page/title/';	
	$files = array_diff(scandir($path), array('.', '..'));


	krsort($files);
	$files_limit = array_slice($files, 0, 1);

	

	foreach ($files_limit as $key => $value) {
		$pre_user_id = explode(".", $value);
		$id     = $pre_user_id[0];
		$data_get    = explode( "%|%" , file_get_contents($path.$value) );


		$JS_ID = "'".$id."'";
		$func_del   = ' onclick="del('.$JS_ID.')" ';
		$func_edit  = ' onclick="edit('.$JS_ID.')" ';
		$func_view  = ' onclick="view('.$JS_ID.')" ';

		
		$title    = $data_get[1];
		$tag      = $data_get[2];
		$creater  = $data_get[3];


		$date  = date('m-d-Y H:i', $id);

		$path_2   = "./admin/content/page/detail/".$id.".txt";
		$detail = file_get_contents($path_2);

		echo '
			<h5 class="font-weight-bold spanborder"><span>เนื้อหาล่าสุด</span></h5>
			<div class="card border-0 mb-1 box-shadow">
				<div>
				</div>
				<div class="card-body px-0 pb-0 d-flex flex-column align-items-start">
					<h2 class="h2 font-weight-bold">					
					<a class="text-dark" href="./article.php?f='.$id.'">'.$title.'</a>
					</h2>
					<p class="card-text">
						 '.$detail.'
					</p>
					<div>
						<small class="d-block"><a class="text-muted" href="./author.html">'.$creater.'</a></small>
						<small class="text-muted">'.$date.'</small>
					</div>
				</div>
			</div>
		';
	}	

}


function page_with_category($category){

	$path    = './admin/content/page/title/';	
	$files = array_diff(scandir($path), array('.', '..'));

	$get_page = array();

	

	foreach ($files as $key => $value) {
		$detail = explode( "%|%" , file_get_contents($path.$value) );
		$category_get = $detail[0];
		if ( $category_get == $category ) { array_push( $get_page , $value ); }
		
	}

	krsort($get_page);

	return $get_page;
}

function hight_light(){
	$path    = './admin/content/page/title/';	
	$files = array_diff(scandir($path), array('.', '..'));


	krsort($files);
	$files_limit = array_slice($files, 1, 3);

	foreach ($files_limit as $key => $value) {
		$pre_user_id = explode(".", $value);
		$id     = $pre_user_id[0];
		$data_get    = explode( "%|%" , file_get_contents($path.$value) );

		$title    = $data_get[1];
		$tag      = $data_get[2];
		$creater  = $data_get[3];


		$date  = date('m-d-Y H:i', $id);


		echo "
					<div class='mb-3 d-flex align-items-center'>
						<div class='pl-3'>
							<h2 class='mb-2 h6 font-weight-bold'>
							<a class='text-dark' href='./article.php?f=".$id."'>".$title."</a>
							</h2>
							<div class='card-text text-muted small'>
								 ".$creater."
							</div>
							<small class='text-muted'>".$date."</small>
						</div>
					</div>
		";
	}
}

function hight_light_first(){
	$path    = './admin/content/page/title/';	
	$files = array_diff(scandir($path), array('.', '..'));


	krsort($files);
	$files_limit = array_slice($files, 0, 1);

	foreach ($files_limit as $key => $value) {
		$pre_user_id = explode(".", $value);
		$id     = $pre_user_id[0];
		$data_get    = explode( "%|%" , file_get_contents($path.$value) );

		$title    = $data_get[1];
		$tag      = $data_get[2];
		$creater  = $data_get[3];


		$date  = date('m-d-Y H:i', $id);


		echo "
				<div class='card-body px-0 pb-0 d-flex flex-column align-items-start'>
					<h2 class='h4 font-weight-bold'>
					<a class='text-dark' href='./article.php?f=".$id."'>".$title."</a>
					</h2>
					<div>
						<small class='d-block'><a class='text-muted' href='./author.html'>".$creater."</a></small>
						<small class='text-muted'>".$date."</small>
					</div>
				</div>
		";
	}
}

$name_web = file_get_contents("./admin/setting/name.txt");

?>