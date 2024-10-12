<?php 

    include 'header-nav.php'; 
    include 'func.php'; 

    $get_detail = file_get_contents("./setting/introduction.txt");

?>
    <style type="text/css">
        .bg-gradient-primary {
            background-color: #1cc88a;
            background-image: linear-gradient(180deg, #75872f 10%, #3a4a23 100%);
            background-size: cover;
        }

    </style>
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
                    <h1 class="h3 mb-2 text-gray-800">Introduction</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                                                                                  

                                        <?php 
                                            $get_detail = file_get_contents("./setting/introduction.txt");
                                            include "quilljs-editor-2.php"; 
                                        ?>
                                <center>
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


          $("#btn_save_introduction").click(function(){        
            

            var detail  = $(".ql-editor").html();

            $.post("action.php",{ 

                introduction : detail

            }, function(data,status){ alert("Edit successful."); });  

          });

        });    




    </script>