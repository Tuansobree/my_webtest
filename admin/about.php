<?php 

    include 'header-nav.php'; 
    include 'func.php'; 

    $get_detail = file_get_contents("./setting/introduction.txt");

?>

        <style type="text/css"> 

            td:nth-child(5){ text-align: center; }
            #editor{min-height: 200px;}

        </style>

        <style type="text/css">
            .bg-gradient-primary {
            background-color: #1cc88a;
            background-image: linear-gradient(180deg, #75872f 10%, #3a4a23 100%);
            background-size: cover;
        }

    </style>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "topbar.php"; ?>



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Name Web Site</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                                                                   
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">Name Web Site</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="แท็ก" id="Edit_name_web" value="<?php echo file_get_contents('./setting/name.txt'); ?>" required>
                                      </div> 

                                      
                                <center>
                                    <button class="btn btn-success" id="btn_save_name">Save</button>                                    
                                </center>
                                
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">About</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">                                                                                  
                                        <?php 
                                            $get_detail = file_get_contents("./setting/about.txt");
                                            include "quilljs-editor-2.php"; 
                                        ?>
                                <center>
                                    <br>
                                    <button class="btn btn-success" id="btn_save_introduction">Save</button>                                    
                                </center>
                        </div>
                    </div>



                </div>
                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->


<?php include 'footer.php'; ?>




    <script>
        $(document).ready(function(){

          $("#btn_save_name").click(function(){        

            var name  = $("#Edit_name_web").val();
            $.post("action.php",{  Edit_name_web : name   }, function(data,status){ alert("Edit successful."); });  
            
          });


          $("#btn_save_introduction").click(function(){                

            var detail  = $(".ql-editor").html();
            $.post("action.php",{  about : detail   }, function(data,status){ alert("Edit successful."); });  

          });

        });    




    </script>