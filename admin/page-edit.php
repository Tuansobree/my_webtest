<?php 

    include 'header-nav.php'; 
    include 'func.php'; 

    if (isset($_GET["f"])) {
        $file = $_GET["f"];
        $pach = './content/page/title/'.$file.".txt";
        if (file_exists($pach)) {
            $get_detail = file_get_contents('./content/page/detail/'.$file.".txt");   

            $data_get    = explode( "%|%" , file_get_contents($pach) );         
            $category = $data_get[0];
            $title    = $data_get[1];
            $tag      = $data_get[2];

        } else { 
            echo "<center> <h2>Error 404 </h2></center>"; 
            exit;
        }
    }
    else {
            echo "<center> <h2>Error 404 </h2></center>"; 
            exit;        
    }


?>
        <style type="text/css"> 

            td:nth-child(5){ text-align: center; }
            #editor{min-height: 200px;}

        </style>



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "topbar.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">แก้ไขบทความ</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                                                                   
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">Category</span>
                                        </div>                                
                                        <input type="hidden" value="<?php echo $file; ?>" id="edit_page_file">
                                        <select class="form-control" id="edit_category_page">
                                            <option value="">-- Select --</option>
                                            <?php select_category(); ?>
                                        </select>
                                      </div> 

                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">Title</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="หัวข้อ" id="edit_page_title" value="<?php echo $title; ?>" required>                                        
                                      </div>                               

                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">Tag</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="แท็ก" id="edit_page_tag" value="<?php echo $tag; ?>" required>
                                      </div> 

                                      <?php include "quilljs-editor.php"; ?>
                                      
                                <center>
                                    <button class="btn btn-success" id="btn_save_page">Save</button>                                    
                                </center>
                                
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


<?php include 'footer.php'; ?>




    <script>
        $(document).ready(function(){


          $("#btn_save_page").click(function(){        
            
            var file     = $("#edit_page_file").val();
            var category = $("#edit_category_page").val();
            var title    = $("#edit_page_title").val();
            var tag      = $("#edit_page_tag").val();
            var content  = $(".ql-editor").html();

            $.post("action.php",{ 

                edit_page_file : file,
                edit_page_category : category,
                edit_page_title : title,
                edit_page_tag : tag,
                edit_page_content : content

            }, function(data,status){ alert("Edit successful."); });  

          });

        });    


            var options = document.getElementById("edit_category_page").options;
            for (var i = 0; i < options.length; i++) {
              if (options[i].value == "<?php echo $category ?>") {
                options[i].selected = true;
                break;
              }
            }


    </script>