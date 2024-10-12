<?php 

    include 'header-nav.php'; 
    include 'func.php'; 

?>
    <style type="text/css">
        .bg-gradient-primary {
            background-color: #1cc88a;
            background-image: linear-gradient(180deg, #75872f 10%, #3a4a23 100%);
            background-size: cover;
        }

    </style>
        <style type="text/css"> 

            td:nth-child(3){ text-align: center; }

        </style>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "topbar.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">หมวดหมู่บทความ</h1>
                    <p class="mb-4">
                        สร้าง , กำหนด หรือ แก้ไข หมวดหมู่บทความ <span class="badge badge-secondary">แนะนำไม่ควรเกิน 7 หมวดหมู่</span>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-white btn btn-success" data-toggle="modal" data-target="#myModal">
                                สร้างหมวดหมู่
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php table_category(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form class="modal-content" method="POST" action="action.php">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">สร้างหมวดหมู่</h5>
                            <button class="btn btn-default btn-sm btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                                                     
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Category</span>
                                </div>
                                <input type="text" class="form-control" placeholder="ชื่อหมวดหมู่" name="add_category" required>
                              </div> 

                        </div>
                        <div class="modal-footer"><button class="btn btn-danger btn-close" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-success" type="submit">Save</button></div>
                    </form>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="myModal_edit_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form class="modal-content" method="POST" action="action.php">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">สร้างหมวดหมู่</h5>
                            <button class="btn btn-default btn-sm btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                                                     
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Category</span>
                                </div>
                                <input type="hidden" class="form-control" placeholder="ชื่อหมวดหมู่" id="id_category" name="id_category" required>
                                <input type="text" class="form-control" placeholder="ชื่อหมวดหมู่" id="edit_category" name="edit_category" required>
                              </div> 

                        </div>
                        <div class="modal-footer"><button class="btn btn-danger btn-close" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-success" type="submit">Save</button></div>
                    </form>
                </div>
            </div>


<?php include 'footer.php'; ?>


    <script>
        $(document).ready(function(){
          $(".btn-close").click(function(){        
            $('.modal').modal('hide');
          });
        });    

        function del(id){

            var row_id = "row-"+id;
            var name   = $("#" + row_id + " td:nth-child(2)").html(); 
            if (confirm("Delete category : " + name) == true) {               
                $("#"+row_id).remove();                             
                $.post("action.php",{ del_category: id }, function(data,status){ });            
            }
        }

       function edit(id){

            $("#myModal_edit_category").modal("show");
                
            var row_id = "row-"+id;
            var name = $("#" + row_id + " td:nth-child(2)").html();

            $("#id_category").val(id);
            $("#edit_category").val(name);


        }

    </script>