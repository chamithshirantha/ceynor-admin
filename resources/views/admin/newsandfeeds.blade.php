@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<div class="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#NewsAddModal">
        Add New
      </button>

    

    <!-- add Modal -->
                    
    <div class="modal fade" id="NewsAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Gallery</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                
            <div class="modal-body">
                <ul class="alert alert-warning d-none" id="save_errorList"></ul>

                <form id="GalleryAddForm" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf

                <div class="col-md-6">
                    <label class="form-label">Image Name</label>
                    <input type="text" name="imagename" class="form-control">
                </div>


                <div class="col-md-6">
                  <label for="image" class="form-label">Choose Image</label>
                  <input class="form-control" type="file" name="image">
                  <small class="form-text text-muted">Please choose image size</small>
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
                    
    <div class="modal fade" id="GalleryEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Image Update</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                
            <div class="modal-body">
                <ul class="alert alert-warning d-none" id="edit_errorList"></ul>

                <form id="GalleryEditForm" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf

                <input type="hidden" id="g_e_image_id" name="g_e_image_id">

                <div class="col-md-6">
                    <label class="form-label">Boat Name</label>
                    <input type="text" name="g_e_imagename" id="g_e_imagename" class="form-control">
                </div>


                <div class="col-md-6">
                  <label for="image" class="form-label">Choose Image</label>
                  <input class="form-control" type="file" name="g_e_image" id="g_e_image">
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
                    
    <div class="modal fade" id="GalleryViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">View Passenger Boat Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                
            <div class="modal-body">
                <ul class="alert alert-warning d-none" id="edit_errorList"></ul>

                <form id="GalleryBoatViewForm" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf

                <input type="hidden"  name="g_v_image_id">

                <div class="col-md-6">
                    <label class="form-label">Boat Name</label>
                    <input type="text" name="g_v_imagename" class="form-control" disabled>
                </div>


                <div class="col-md-6">
                  <label for="image" class="form-label">Choose Image</label>
                  {{-- <input class="form-control" type="file" name="g_v_image"> --}}

                  <input type="hidden" name="g_v_image">
                
                  <img src="" class="img-fluid"  name="g_v_image"  width="" height="100" disabled>
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
                <div class="card-header">Gallery</div> 
                <div class="card-body">
                    <!-- Table Start -->
                    <div class="container">
                        <div class="row">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Image Name</th>
                                                <th>Image</th>
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


        $(document).on('submit', '#GalleryAddForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#GalleryAddForm')[0]);

            $.ajax({
                type: "POST",
                url: "{{URL('/admin/gallery')}}",
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
                        $('#GalleryAddForm').find('input').val('');
                        $('#NewsAddModal').modal('hide');
                        $('#GalleryAddForm')[0].reset();
                        alert(response.message);
                        fetchBoats();
                       
                    }
                }
            });

        });

        fetchBoats();

        function fetchBoats() {
            $.ajax({
                type: "GET",
                url: "{{URL('/fetch-gallery')}}",
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.images, function (key, item) { 
                        $('tbody').append('' 
                        +'<tr><td> '+ item.image_name +' </td>' +
                        '<td>'+'<img src=../uploads/gallery/'+item.image +' height="60px"></td>'+
                        '<td>'+ '<button type="button" value="' + item.id + '" class="btn btn-success viewbtn-gallery btn-circle"><i class="fa fa-eye"></i></button>' +' </td>'+
                        '<td>'+ '<button type="button" value="' + item.id + '" class="btn btn-warning editbtn-gallery btn-circle"><i class="fas fa-edit"></i></button>' +' </td>'+
                        '<td>'+ '<button type="button" value="' + item.id + '" class="btn btn-danger deletebtn-gallery btn-circle"><i class="fas fa-trash"></i></button>' +' </td>  </tr>');
                    });
                }
            });
        }


        $(document).on('click', '.editbtn-gallery', function (e) {
            var image_id = $(this).val();
            var url = "{{URL('/edit-gallery')}}";
            var dltUrl = url+"/"+image_id;
            $('#GalleryEditModal').modal('show');
            // alert(emp_id);
            $.ajax({
                type: "GET",
                url: dltUrl,
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                        // alert(response.message)
                        $('#GalleryEditModal').modal('hide');
                    }else{

                        $('#g_e_imagename').val(response.images.image_name);
                        $('#g_e_image_id').val(image_id);
                       
                    }
                        
                }
            });

        });

        //view model

        $(document).on('click', '.viewbtn-gallery', function (e) {
            var image_id = $(this).val();
            var url = "{{URL('/edit-gallery/')}}";
            var dltUrl = url+"/"+image_id;
            $('#GalleryViewModal').modal('show');
            // alert(emp_id);
            $.ajax({
                type: "GET",
                url: dltUrl,
                success: function (response) {
                    console.log(response);
                    if (response.status == 404) {
                        alert(response.message)
                        $('#GalleryViewModal').modal('hide');
                    }else{
                        console.log(response);

                        $("input[name='g_v_imagename']").val(response.images.image_name);
                        $("input[name='g_v_image']").siblings("img").attr("src", "../uploads/gallery/"+response.images.image);
                        

                    }
                        
                }
            });

        });



        $(document).on('submit','#GalleryEditForm', function (e) {
            e.preventDefault();
            var id = $('#g_e_image_id').val();
            let EditFormData = new FormData($('#GalleryEditForm')[0]);

            var url = "{{URL('/update-gallery/')}}";
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
                        $('#GalleryEditForm')[0].reset();
                        $('#GalleryEditModal').modal('hide');
                        fetchBoats();
                        
                    }
                }
            });
        });


        $(document).on('click', '.deletebtn-gallery',function (e) {
            e.preventDefault();

            var id = $(this).val();
            var url = "{{URL('/delete-gallery/')}}";
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
                    fetchBoats();
                   }

                }
            });

        });


        
    });


</script>

@endsection