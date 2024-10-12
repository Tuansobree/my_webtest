<?php 

session_start();
date_default_timezone_set("Asia/Bangkok");

if ($_SESSION["User_ID"] && $_SESSION["User_class"] && $_SESSION["User_Name"]) {
	$User_ID_Account = $_SESSION["User_ID"];
	$User_ID_Class   = $_SESSION["User_class"];
	$User_ID_Name    = $_SESSION["User_Name"];
}
else{
	session_unset(); session_destroy();  
            echo "<script>                    
                    window.location.href = './login.php';
                  </script>";
            exit;   	
}



function QC_str_00($str){
	$str = str_replace(" ","",$str);
	$str = str_replace("?>","",$str);
	$str = str_replace("<?","",$str);
	$str = str_replace(".php","",$str);
	$str = str_replace(".txt","",$str);
	$str = str_replace("%|%","",$str);
	$str = str_replace(";","",$str);
	$str = str_replace(".","",$str);

	return $str;
}

function QC_str_01($str){
	$str = str_replace("?>","",$str);
	$str = str_replace("<?","",$str);
	$str = str_replace(".php","",$str);
	$str = str_replace(".txt","",$str);
	$str = str_replace("%|%","",$str);
	$str = str_replace(";","",$str);
	$str = str_replace(".","",$str);

	return $str;
}

function Encode_set($str){
	$str = base64_encode( $str."-".time().$str.time() );
	return $str;
}

function Decode_set($str){
	$str   = base64_decode( $str );
	$str_r = explode("-" , $str);	
	return $str_r[0];
}



function table_accout(){
	$path    = './user/';	
	$files = array_diff(scandir($path), array('.', '..'));
	foreach ($files as $key => $value) {
		$pre_user_id = explode(".", $value);
		$user_id     = $pre_user_id[0];
		$data_get    = explode( "%|%" , file_get_contents($path.$value) );
		$pass        = Decode_set($data_get[0]);
		$name        = $data_get[1];
		$class       = $data_get[2];

		$JS_ID = "'".$user_id."'";
		$func_del   = ' onclick="del('.$JS_ID.')" ';
		$func_edit  = ' onclick="edit('.$JS_ID.')" ';

		echo "
				<tr id='row-$user_id'>
				    <td>$user_id</td>
				    <td class='text_pass'>$pass</td>
				    <td>$name</td>
				    <td>$class</td>				    
				    <td>
				    	<button class='btn btn-danger' $func_del ><i class='fas fa-trash'></i></button>
				    	<button class='btn btn-success' $func_edit ><i class='fas fa-pencil-alt'></i></button>
				    </td>
				</tr>
		";
	}
}


function table_category(){
	$path    = './content/category/';	
	$files = array_diff(scandir($path), array('.', '..'));
	foreach ($files as $key => $value) {
		$pre_user_id = explode(".", $value);
		$id     = $pre_user_id[0];
		$data_get    = file_get_contents($path.$value);


		$JS_ID = "'".$id."'";
		$func_del   = ' onclick="del('.$JS_ID.')" ';
		$func_edit  = ' onclick="edit('.$JS_ID.')" ';

		echo "
				<tr id='row-$id'>
				    <td>$id</td>
				    <td>$data_get</td>			    
				    <td>
				    	<button class='btn btn-danger' $func_del ><i class='fas fa-trash'></i></button>
				    	<button class='btn btn-success' $func_edit ><i class='fas fa-pencil-alt'></i></button>
				    </td>
				</tr>
		";
	}
}

function table_page(){
	$path    = './content/page/title/';	
	$files = array_diff(scandir($path), array('.', '..'));
	
	foreach ($files as $key => $value) {
		$pre_user_id = explode(".", $value);
		$id     = $pre_user_id[0];
		$data_get    = explode( "%|%" , file_get_contents($path.$value) );


		$JS_ID = "'".$id."'";
		$func_del   = ' onclick="del('.$JS_ID.')" ';
		$func_edit  = ' onclick="edit('.$JS_ID.')" ';
		$func_view  = ' onclick="view('.$JS_ID.')" ';

		$category_name = category_name($data_get[0]);
		$title    = $data_get[1];
		$tag      = $data_get[2];
		$creater  = $data_get[3];

		$date  = date('m/d/Y H:i', $id);

		echo "
				<tr id='row-$id'>							   
				    <td>$title</td>	
				    <td>$category_name</td>				    
				    <td>$tag</td>			
				    <td>$creater</td>	
				    <td>$date</td>		    
				    <td>				    					    	
				    	<button class='btn btn-danger' $func_del ><i class='fas fa-trash'></i></button>
				    	<button class='btn btn-success' $func_edit ><i class='fas fa-pencil-alt'></i></button>
				    	<button class='btn btn-info' $func_view ><i class='fas fa-eye'></i></button>
				    </td>
				</tr>
		";
	}
}


function select_category(){
	$path    = './content/category/';	
	$files = array_diff(scandir($path), array('.', '..'));
	foreach ($files as $key => $value) {
		$pre_user_id = explode(".", $value);
		$id     = $pre_user_id[0];
		$data_get    = file_get_contents($path.$value);

		echo "
<option value='$id'>$data_get</option>";
	}
}


function category_name($id){
	$path    = './content/category/'.$id.".txt";	

    if (file_exists($path)) {
    	$data_get    = file_get_contents($path);
    	return $data_get;
    } else {
    	return "unknown ".$path;
    }

}


function account_name(){

	$id = $_SESSION["User_ID"];
	$path = "./user/".$id.".txt";	
	$get_data_accout = explode( "%|%" , file_get_contents($path) );
	$name  = $get_data_accout[1];

	return $name;
}


$name_web = file_get_contents("./setting/name.txt");

?>