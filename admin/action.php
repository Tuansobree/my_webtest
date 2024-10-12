<?php 


include 'func.php';

if (isset($_POST["add_user"]) && isset($_POST["add_pass"]) && isset($_POST["add_pass_2"]) 
	&& isset($_POST["display_name"]) && isset($_POST["add_position"])) {

	echo '<script>
				
				const myTimeout = setTimeout( reset , 2000 );
				function reset(){ window.location.href = "./user-acc.php"; }	
				
	      </script>';

	echo "<center><br><p>";
	
	$id       = QC_str_00($_POST["add_user"]);
	$pass     = QC_str_00($_POST["add_pass"]);
	$pass_2   = QC_str_00($_POST["add_pass_2"]);
	$name     = QC_str_00($_POST["display_name"]);
	$position = QC_str_00($_POST["add_position"]);


	//----------------------------------------------//
	$check_id   = preg_match('/[^A-Za-z0-9]+/', $id);
/*	$check_pass = preg_match('/[^A-Za-z0-9]+/', $pass);
	$check_pass_2 = preg_match('/[^A-Za-z0-9]+/', $pass_2);	*/
	//----------------------------------------------//

	//----------------------------------------------//
	$count_id   = strlen($id);
	$count_pass = strlen($pass);
	//----------------------------------------------//
	

	if ($count_id < 4 ||  $count_pass < 4) { echo "User name or Password \n Shorter than 6 !!"; exit;  }
	if ($check_id) {	echo "User name : Not support !!"; exit;	}
/*	if ($check_pass) {	echo "Password : Not support  !!"; exit;	}*/
	if ($pass != $pass_2) {	echo "Password : Fail  !!"; exit;	}

	//echo $id."<br>".$pass."<br>".$pass_2."<br>".$position."<br>";


	$pass = Encode_set($pass);
	if ($id == "admin") { $position = "Admin"; }

	$myfile = fopen( "./user/" . $id . ".txt", "w") or die("Unable to open file!");
	$txt = $pass."%|%".$name."%|%".$position;
	fwrite($myfile, $txt);
	fclose($myfile);

	echo "Create user account successful. !!";

	echo "</p></center>";

}



if (isset($_POST["del_user"])) {
	$id = QC_str_00($_POST["del_user"]);
	
	if ($id == "admin") { exit; }

	$path    = './user/';	
	unlink($path.$id.".txt");
}


if (isset($_POST["add_category"])) {
	$category = QC_str_00($_POST['add_category']);

	echo '<script>
				
				const myTimeout = setTimeout( reset , 2000 );
				function reset(){ window.location.href = "./category.php"; }	
				
	      </script>';

	echo "<center><br><p>";


	$myfile = fopen( "./content/category/" . time() . ".txt", "w") or die("Unable to open file!");

	fwrite($myfile, $category);
	fclose($myfile);

	echo "Create a category  successful. !!";
	echo "</p></center>";	

}

if (isset($_POST["del_category"])) {
	$id = QC_str_00($_POST["del_category"]);
	
	$path    = './content/category/';	
	unlink($path.$id.".txt");
}


if ( isset($_POST["id_category"]) &&  isset($_POST["edit_category"])) {

	$id       = QC_str_00($_POST['id_category']);
	$category = QC_str_01($_POST['edit_category']);

	echo '<script>
				
				const myTimeout = setTimeout( reset , 2000 );
				function reset(){ window.location.href = "./category.php"; }	
				
	      </script>';

	echo "<center><br><p>";

	$myfile = fopen( "./content/category/" . $id . ".txt", "w") or die("Unable to open file!");
	fwrite($myfile, $category);
	fclose($myfile);

	echo "Edit a category  successful. !!";
	echo "</p></center>";

}


if (isset($_POST["add_page_category"]) && isset($_POST["add_page_title"]) && 
	isset($_POST["add_page_tag"]) && isset($_POST["add_page_content"]) ) {

	$category = QC_str_01($_POST['add_page_category']);
	$title    = QC_str_01($_POST['add_page_title']);
	$tag      = QC_str_01($_POST['add_page_tag']);

	$content  = $_POST['add_page_content'];

	$id       = time();


	$creater  = account_name();
	$text_1   = $category . "%|%" . $title . "%|%" . $tag . "%|%" . $creater;

	$myfile = fopen( "./content/page/title/" . $id . ".txt", "w") or die("Unable to open file!");
	fwrite($myfile, $text_1);
	fclose($myfile);

	$myfile = fopen( "./content/page/detail/" . $id . ".txt", "w") or die("Unable to open file!");
	fwrite($myfile, $content);
	fclose($myfile);

	echo date("d/m/Y H:i");

}


if (isset($_POST["edit_page_file"]) && isset($_POST["edit_page_category"]) && isset($_POST["edit_page_content"]) && 
	isset($_POST["edit_page_title"]) && isset($_POST["edit_page_tag"]) ) {




	$category = QC_str_01($_POST['edit_page_category']);
	$title    = QC_str_01($_POST['edit_page_title']);
	$tag      = QC_str_01($_POST['edit_page_tag']);

	$file     = $_POST['edit_page_file'];	
	$content  = $_POST['edit_page_content'];


	$creater  = account_name();
	$text_1   = $category . "%|%" . $title . "%|%" . $tag . "%|%" . $creater;

	$myfile = fopen( "./content/page/title/" . $file . ".txt", "w") or die("Unable to open file!");
	fwrite($myfile, $text_1);
	fclose($myfile);

	$myfile = fopen( "./content/page/detail/" . $file . ".txt", "w") or die("Unable to open file!");
	fwrite($myfile, $content);
	fclose($myfile);

	echo $file;

}


if (isset($_GET["del_page"])) {
	$id = $_GET["del_page"];	

	$path    = './content/page/detail/';	
	unlink($path.$id.".txt");

	$path    = './content/page/title/';	
	unlink($path.$id.".txt");
	echo "<script> window.open('','_self').close() </script>";

}


if (isset($_POST["introduction"])) {
	$detail = $_POST["introduction"];
	$myfile = fopen( "./setting/introduction.txt", "w") or die("Unable to open file!");
	fwrite($myfile, $detail);
	fclose($myfile);	

}


if (isset($_POST["about"])) {
	$detail = $_POST["about"];
	$myfile = fopen( "./setting/about.txt", "w") or die("Unable to open file!");
	fwrite($myfile, $detail);
	fclose($myfile);	

}

if (isset($_POST["Edit_name_web"])) {
	$detail = $_POST["Edit_name_web"];
	$myfile = fopen( "./setting/name.txt", "w") or die("Unable to open file!");
	fwrite($myfile, $detail);
	fclose($myfile);	

}

?>