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

            td:nth-child(6){ text-align: center; }
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
                    <h1 class="h3 mb-2 text-gray-800">บทความ</h1>
                    <p class="mb-4">
                        สร้าง , กำหนด หรือ แก้ไข บทความ <span class="badge badge-secondary"></span>
                    </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-white btn btn-success" data-toggle="modal" data-target="#myModal">
                                สร้างบทความ
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>                                                                                     
                                            <th>Title</th>                                            
                                            <th>Category</th>
                                            <th>Tag</th>
                                            <th>Author</th> 
                                            <th>Date</th> 
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php table_page(); ?>
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
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">สร้างหมวดหมู่</h5>
                            <button class="btn btn-default btn-sm btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                                                     
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Category</span>
                                </div>                                
                                <select class="form-control" id="category_page">
                                    <option value="">-- Select --</option>
                                    <?php select_category(); ?>
                                </select>
                              </div> 

                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Title</span>
                                </div>
                                <input type="text" class="form-control" placeholder="หัวข้อ" id="title" required>
                              </div>                               

                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Tag</span>
                                </div>
                                <input type="text" class="form-control" placeholder="แท็ก" id="tag" required>
                              </div> 

                              <?php include "quilljs-editor.php"; ?>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger btn-close" type="button" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-success" id="btn_save_page">Save</button>
                        </div>
                    </div>
                </div>
            </div>

<?php include 'footer.php'; ?>


    <script>
        $(document).ready(function(){

          $(".btn-close").click(function(){        
            $('.modal').modal('hide');
          });

          $("#btn_save_page").click(function(){        
            
            //$('.modal').modal('hide');
            var category = $("#category_page").val();
            var title = $("#title").val();
            var tag = $("#tag").val();
            var content = $(".ql-editor").html();

            var User_ID_Name = $("#User_ID_Name").html();

            $.post("action.php",{ 

                add_page_category : category,
                add_page_title : title,
                add_page_tag : tag,
                add_page_content : content

            }, function(data,status){ 
                $('.modal').modal('hide');  
                $("tbody").prepend("<tr><td>"+title+"</td><td>"+category+"</td><td>"+tag+"</td><td>"+User_ID_Name+"</td><td>"+data+"</td><td>wait refresh</td></tr>");
            });  

          });

        });    

        function del(id){
            var row_id = "row-"+id;
            var name   = $("#" + row_id + " td:nth-child(1)").html();             
            if (confirm(id+"Delete page : " + name) == true) {               
                $("#"+row_id).remove();                                                             
                window.open('./action.php?del_page='+id, "", "width=200,height=100");              
            }
        }



       function edit(id){
            window.open('./page-edit.php?f='+id, '_blank');
        }

        function view(id){            
            window.open('../article.php?f='+id, '_blank');
        }

    </script>

