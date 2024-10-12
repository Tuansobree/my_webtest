<?php 

    include 'header-nav.php'; 
    include 'func.php'; 

    if ( $User_ID_Class !== "Admin" ) {
            echo "<script>
                    alert('You no access rights.');
                    window.location.href = './';

                  </script>";
            exit; 
    }

?>
    <style type="text/css">
        .bg-gradient-primary {
            background-color: #1cc88a;
            background-image: linear-gradient(180deg, #75872f 10%, #3a4a23 100%);
            background-size: cover;
        }

    </style>
        <style type="text/css"> 

        .text_pass{ color: white; } .text_pass:hover{color: gray; } 
        .text_pass:hover::before{ color : white; content: "";   } 
        .text_pass:before {                 
            content: "*****";                 
            color: rgb(187, 182, 182);                                 
        } 
        #add_user_show{cursor: no-drop;}

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
                    <h1 class="h3 mb-2 text-gray-800">บัญชีผู้ใช้</h1>
                    <p class="mb-4">
                        ท่านสามารถ เพิ่ม / ลบ / จัดการสิทธิ์การเข้าใช้งานของบัญชีผู้ใช้ได้
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">                            
                            <h3 class="m-0 font-weight-bold text-white btn btn-success" data-toggle="modal" data-target="#myModal">
                                เพิ่มบัญชีผู้ใช้
                            </h3>                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Password</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php table_accout(); ?>
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
                            <h5 class="modal-title" id="exampleModalLabel">เพิ่มบัญชีผู้ใช้</h5>
                            <button class="btn btn-default btn-sm btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                                                     
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">User Name</span>
                                </div>
                                <input type="text" class="form-control" placeholder="ไอดีผุ้ใช้" name="add_user" required>
                              </div>

                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Password</span>
                                </div>
                                <input type="text" class="form-control" placeholder="รหัส" name="add_pass" required>
                              </div>

                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Confirm Password</span>
                                </div>
                                <input type="text" class="form-control" placeholder="ยืนยันรหัส" name="add_pass_2" required>
                              </div>  

                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Display Name</span>
                                </div>
                                <input type="text" class="form-control" placeholder="ชื่อผู้เขียน" name="display_name" required>
                              </div> 

                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Position</span>
                                </div>
                                <select class="form-control" name="add_position" required>
                                    <option value=""> -- Select -- </option>
                                    <option value="Admin">Admin</option>
                                    <option value="Author">Author</option>
                                </select>
                              </div>  

                        </div>
                        <div class="modal-footer"><button class="btn btn-danger btn-close" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-success" type="submit">Save</button></div>
                    </form>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal_edit_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form class="modal-content" method="POST" action="action.php">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">แก้ไขบัญชีผู้ใช้</h5>
                            <button class="btn btn-default btn-sm btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                                                     
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">User Name</span>
                                </div>
                                <span type="text" class="form-control" id='add_user_show' ></span>
                                <input type="hidden" class="form-control" placeholder="ไอดีผุ้ใช้" id="edit_add_user" name="add_user" required>
                              </div>

                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Password</span>
                                </div>
                                <input type="text" class="form-control" placeholder="รหัส" id="edit_add_pass" name="add_pass" required>
                              </div>

                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Confirm Password</span>
                                </div>
                                <input type="text" class="form-control" placeholder="ยืนยันรหัส" id="edit_add_pass_2" name="add_pass_2" required>
                              </div>  

                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Display Name</span>
                                </div>
                                <input type="text" class="form-control" placeholder="ชื่อผู้เขียน" id="edit_display_name" name="display_name" required>
                              </div> 

                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Position</span>
                                </div>
                                <select class="form-control" id="edit_add_position" name="add_position" required>
                                    <option value=""> -- Select -- </option>
                                    <option value="Admin">Admin</option>
                                    <option value="Author">Author</option>
                                </select>
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
          if (confirm("Delete User ID : " + id) == true) {            
            $("#row-"+id).remove();               
            $.post("action.php",{ del_user: id }, function(data,status){ });            
          }
        }

       function edit(id){
            $("#myModal_edit_account").modal("show");
                
            var row_id = "row-"+id;
            var pass = $("#" + row_id + " td:nth-child(2)").html();
            var name = $("#" + row_id + " td:nth-child(3)").html();
            var position = $("#" + row_id + " td:nth-child(4)").html();
                        
            $("#add_user_show").html(id);
            $("#edit_add_user").val(id);
            $("#edit_add_pass").val(pass);
            $("#edit_add_pass_2").val(pass);
            $("#edit_display_name").val(name);

            var options = document.getElementById("edit_add_position").options;
            for (var i = 0; i < options.length; i++) {
              if (options[i].text == position) {
                options[i].selected = true;
                break;
              }
            }

        }

    </script>