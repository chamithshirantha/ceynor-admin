@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<div class="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ProjectAddModal">
        Add New
      </button>

    

    <!-- add Modal -->
                    
    <div class="modal fade" id="ProjectAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                
            <div class="modal-body">
                <ul class="alert alert-warning d-none" id="save_errorList"></ul>

                <form id="ProjectAddForm" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf

                <div class="col-md-6">
                    <label class="form-label">Project Name</label>
                    <input type="text" name="projectname" class="form-control">
                </div>


                <div class="col-md-6">
                  <label for="image" class="form-label">Choose Image</label>
                  <input class="form-control" type="file" name="image">
                  <small class="form-text text-muted">Please choose image size</small>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Start Date</label>
                    <input type="date" name="startdate" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">End Date</label>
                    <input type="date" name="enddate" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" aria-label="Default select example">\
                        <option selected>Select the status</option>
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                        </select>
                </div>

                <div class="col-md-8">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Short Description</label>
                    <textarea class="form-control" name="shortdescription" rows="2"></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="4"></textarea>
                </div>
                  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
          </div>
        </div>
    </div>

    <!-- add Modal End-->






    <!-- edit Modal -->
                    
    <div class="modal fade" id="ProjectEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                
            <div class="modal-body">
                <ul class="alert alert-warning d-none" id="save_errorList"></ul>

                <form id="ProjectEditForm" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf

                <input type="hidden" id="p_e_project_id" name="p_e_project_id">

                <div class="col-md-6">
                    <label class="form-label">Project Name</label>
                    <input type="text" name="p_e_projectname" id="p_e_projectname" class="form-control">
                </div>


                <div class="col-md-6">
                  <label for="image" class="form-label">Choose Image</label>
                  <input class="form-control" type="file" name="p_e_image" id="p_e_image">
                  <small class="form-text text-muted">Please choose image size</small>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Start Date</label>
                    <input type="date" name="p_e_startdate" id="p_e_startdate" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">End Date</label>
                    <input type="date" name="p_e_enddate" id="p_e_enddate" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="p_e_status" id="p_e_status" aria-label="Default select example">
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                        </select>
                </div>

                <div class="col-md-8">
                    <label class="form-label">Location</label>
                    <input type="text" name="p_e_location" id="p_e_location" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Short Description</label>
                    <textarea class="form-control" name="p_e_shortdescription" id="p_e_shortdescription" rows="2"></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="p_e_description" id="p_e_description" rows="4"></textarea>
                </div>
                  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
          </div>
        </div>
    </div>

    <!-- edit Modal End-->



    <!-- view Modal Start-->
                    
    <div class="modal fade" id="ProjectViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">View Project Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                
            <div class="modal-body">
                <ul class="alert alert-warning d-none" id="save_errorList"></ul>

                <form id="ProjectViewForm" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf

               
                <div class="col-md-6">
                    <label class="form-label">Project Name</label>
                    <input type="text" name="p_v_projectname"  class="form-control" disabled>
                </div>


                <div class="col-md-6">
                  <label for="image" class="form-label">Choose Image</label>
                  <input type="hidden" name="p_v_image">
                
                  <img src="" class="img-fluid"  name="p_v_image"  width="" height="100" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Start Date</label>
                    <input type="date" name="p_v_startdate"  class="form-control" disabled>
                </div>

                <div class="col-md-6">
                    <label class="form-label">End Date</label>
                    <input type="date" name="p_v_enddate"  class="form-control" disabled>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="p_v_status"  aria-label="Default select example" disabled>
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                        </select>
                </div>

                <div class="col-md-8">
                    <label class="form-label">Location</label>
                    <input type="text" name="p_v_location"  class="form-control" disabled>
                </div>

                <div class="form-group">
                    <label for="description">Short Description</label>
                    <textarea class="form-control" name="p_v_shortdescription"  rows="2" disabled></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="p_v_description"  rows="4" disabled></textarea>
                </div>
                  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             
            </div>
            </form>
          </div>
        </div>
    </div>



    <!-- view Modal End-->



    


    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Projects</div> 
                <div class="card-body">
                    <!-- Table Start -->
                    <div class="container">
                        <div class="row">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Project Name</th>
                                                <th>Image</th>
                                                <th>Start</th>
                                                <th>End</th>
                                                <th>Status</th>
                                                <th colspan="3">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

<!-- Table End -->   
                    
                </div>
            </div>
        </div>
    </div>










</div><!-- End Div container -->




@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
   
    
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(document).on('submit', '#ProjectAddForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#ProjectAddForm')[0]);

            $.ajax({
                type: "POST",
                url: "{{URL('/admin/projects')}}",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {  
                    if (response.status == 400) {
                        $('#save_errorList').html("");
                        $('#save_errorList').removeClass('d-none');
                        $.each(response.errors, function (key, err_value) { 
                        $('#save_errorList').append('<li>'+err_value+'</li>');
                        });
                    }else if(response.status == 200){
                        $('#save_errorList').html("");
                        $('#save_errorList').addClass('d-none');
                        // this.reset();
                        $('#ProjectAddForm').find('input').val('');
                        $('#ProjectAddModal').modal('hide');
                        $('#ProjectAddForm')[0].reset();
                        alert(response.message);
                        fetchData();
                       
                    }
                }
            });

        });

        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "{{URL('/fetch-projects')}}",
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.projects, function (key, item) { 
                        $('tbody').append('' 
                            +'<tr><td> '+ item.project_name +' </td>' +
                            '<td>'+'<img src=../uploads/projects/'+item.image +' height="60px"></td>'+
                            '<td>'+ item.start +' </td>'+
                            '<td>'+ item.end +' </td>'+
                            '<td>'+ item.status +' </td>'+
                            '<td>'+ '<button type="button" value="' + item.id + '" class="btn btn-success viewbtn-project btn-circle"><i class="fa fa-eye"></i></button>' +' </td>'+
                            '<td>'+ '<button type="button" value="' + item.id + '" class="btn btn-warning editbtn-project btn-circle"><i class="fas fa-edit"></i></button>' +' </td>'+
                            '<td>'+ '<button type="button" value="' + item.id + '" class="btn btn-danger deletebtn-project btn-circle"><i class="fas fa-trash"></i></button>' +' </td>  </tr>');
                    });
                }
            });
        }


        $(document).on('click', '.editbtn-project', function (e) {
            var pro_id = $(this).val();
            var url = "{{URL('/edit-projects')}}";
            var dltUrl = url+"/"+pro_id;
            $('#ProjectEditModal').modal('show');
            // alert(emp_id);
            $.ajax({
                type: "GET",
                url: dltUrl,
                success: function (response) {
                    console.log(response);
                    if (response.status == 404) {
                        // alert(response.message)
                        $('#ProjectAddModal').modal('hide');
                    }else{

                        $('#p_e_projectname').val(response.project.project_name);
                        $('#p_e_startdate').val(response.project.start);
                        $('#p_e_enddate').val(response.project.end);
                        $('#p_e_status').val(response.project.status);
                        $('#p_e_location').val(response.project.location);
                        $('#p_e_shortdescription').val(response.project.short_description);
                        $('#p_e_description').val(response.project.description);
                        $('#p_e_project_id').val(pro_id);
                    }
                        
                }
            });

        });

        //view model

        $(document).on('click', '.viewbtn-project', function (e) {
            var pro_id = $(this).val();
            var url = "{{URL('/edit-projects/')}}";
            var dltUrl = url+"/"+pro_id;
            $('#ProjectViewModal').modal('show');
            // alert(emp_id);
            $.ajax({
                type: "GET",
                url: dltUrl,
                success: function (response) {
                    console.log(response);
                    if (response.status == 404) {
                        alert(response.message)
                        $('#ProjectViewForm').modal('hide');
                    }else{
                        console.log(response);

                        $("input[name='p_v_projectname']").val(response.project.project_name);
                        $("input[name='p_v_image']").siblings("img").attr("src", "../uploads/projects/"+response.project.image);
                        $("input[name='p_v_startdate']").val(response.project.start);
                        $("input[name='p_v_enddate']").val(response.project.end);
                        $("input[name='p_v_status']").val(response.project.status);
                        $("input[name='p_v_location']").val(response.project.location);                  
                        $("textarea[name='p_v_shortdescription']").val(response.project.short_description);
                        $("textarea[name='p_v_description']").val(response.project.description);
                        

                    }
                        
                }
            });

        });



        $(document).on('submit','#ProjectEditForm', function (e) {
            e.preventDefault();
            var id = $('#p_e_project_id').val();
            let EditFormData = new FormData($('#ProjectEditForm')[0]);

            var url = "{{URL('/update-projects/')}}";
            var dltUrl = url+"/"+id;

            $.ajax({
                type: "POST",
                url: dltUrl,
                data: EditFormData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == 400) {
                        $('#edit_errorList').html("");
                        $('#edit_errorList').removeClass('d-none');
                        $.each(response.errors, function (key, err_value) { 
                        $('#edit_errorList').append('<li>'+err_value+'</li>');
                        });
                    }else if(response.status == 404){
                        alert(response.message);
                    }
                    else if(response.status == 200){
                        $('#edit_errorList').html("");
                        $('#edit_errorList').addClass('d-none');
                        alert(response.message);
                        $('#ProjectEditForm')[0].reset();
                        $('#ProjectEditModal').modal('hide');
                        fetchData();
                        
                    }
                }
            });
        });


        $(document).on('click', '.deletebtn-project',function (e) {
            e.preventDefault();

            var id = $(this).val();
            var url = "{{URL('/delete-projects/')}}";
            var dltUrl = url+"/"+id;

            $.ajax({
                type: "DELETE",
                url: dltUrl,
                dataType: "json",
                success: function (response) {
                   if (response.status == 400) {
                    alert(response.message);
                   }else if (response.status == 200){
                    alert(response.message);
                    fetchData();
                   }

                }
            });

        });


        
    });


</script>

@endsection