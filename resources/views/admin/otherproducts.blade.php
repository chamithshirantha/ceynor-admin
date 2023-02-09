@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<div class="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#OtherproductAddModal">
        Add New
      </button>

    

    <!-- add Modal -->
                    
    <div class="modal fade" id="OtherproductAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Other Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                
            <div class="modal-body">
                <ul class="alert alert-warning d-none" id="save_errorList"></ul>

                <form id="OtherproductAddForm" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf

                <div class="col-md-6">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="productname" class="form-control">
                </div>


                <div class="col-md-6">
                  <label for="image" class="form-label">Choose Image</label>
                  <input class="form-control" type="file" name="image">
                  <small class="form-text text-muted">Please choose image size</small>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Length</label>
                    <input type="text" name="length" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Width</label>
                    <input type="text" name="width" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Height</label>
                    <input type="text" name="height" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Price</label>
                    <input type="text" name="price" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Short Description</label>
                    <textarea class="form-control" name="shortdescription" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="6"></textarea>
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
                    
    <div class="modal fade" id="OtherproductEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                
            <div class="modal-body">
                <ul class="alert alert-warning d-none" id="edit_errorList"></ul>

                <form id="OtherproductEditForm" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf

                <input type="hidden" id="o_e_id" name="o_e_id">

                <div class="col-md-6">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="o_e_productname" id="o_e_productname" class="form-control">
                </div>


                <div class="col-md-6">
                  <label for="image" class="form-label">Choose Image</label>
                  <input class="form-control" type="file" name="o_e_image">
                  <small class="form-text text-muted">Please choose image size</small>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Length</label>
                    <input type="text"  name="o_e_length" id="o_e_length" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Width</label>
                    <input type="text" name="o_e_width" id="o_e_width" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Height</label>
                    <input type="text" name="o_e_height" id="o_e_height" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Price</label>
                    <input type="text" name="o_e_price" id="o_e_price" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Short Description</label>
                    <textarea class="form-control" name="o_e_shortdescription" id="o_e_shortdescription" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="o_e_description" id="o_e_description" rows="6"></textarea>
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
                    
    <div class="modal fade" id="OtherproductViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">View Passenger Boat Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                
            <div class="modal-body">
                <ul class="alert alert-warning d-none" id="edit_errorList"></ul>

                <form id="PassengerBoatViewForm" class="row g-3" method="POST" enctype="multipart/form-data" >
                    @csrf

                <div class="col-md-6">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="o_v_productname" id="o_v_productname" class="form-control" disabled>
                </div>


                <div class="col-md-6">
                  <label for="image" class="form-label">Choose Image</label>
                  <input type="hidden" name="o_v_image" disabled>
                
                    <img src="" class="img-fluid"  name="o_v_image"  width="" height="100">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Length</label>
                    <input type="text"  name="o_v_length" id="o_v_length" class="form-control" disabled>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Width</label>
                    <input type="text" name="o_v_width" id="o_v_width" class="form-control" disabled>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Height</label>
                    <input type="text" name="o_v_height" id="o_v_height" class="form-control" disabled>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Price</label>
                    <input type="text" name="o_v_price" id="o_v_price" class="form-control" disabled>
                </div>

                <div class="form-group">
                    <label for="description">Short Description</label>
                    <textarea class="form-control" name="o_v_shortdescription" id="o_v_shortdescription" rows="3" disabled></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="o_v_description" id="o_v_description" rows="6" disabled></textarea>
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
                <div class="card-header">Passenger Boats</div> 
                <div class="card-body">
                    <!-- Table Start -->
                    <div class="container">
                        <div class="row">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Boat Name</th>
                                                <th>Image</th>
                                                <th>Short Description</th>
                                                {{-- <th>Length</th>
                                                <th>Beam</th>
                                                <th>Draft</th>
                                                <th>Main Hull Beam</th>
                                                <th>Fuel</th>
                                                <th>Water</th>
                                                <th>Seating Capacity</th>
                                                <th>Speed</th>
                                                <th>Bed</th>
                                                <th>Hull Type</th>
                                                <th>Fish Hold Capacity</th> --}}
                                                <th>Price</th>
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


        $(document).on('submit', '#OtherproductAddForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#OtherproductAddForm')[0]);

            $.ajax({
                type: "POST",
                url: "{{URL('/admin/otherproducts')}}",
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
                        $('#OtherproductAddForm').find('input').val('');
                        $('#OtherproductAddModal').modal('hide');
                        $('#OtherproductAddForm')[0].reset();
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
                url: "{{URL('/fetch-otherproducts')}}",
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.otherpro, function (key, item) { 
                        $('tbody').append('' 
                        +'<tr><td> '+ item.product_name +' </td>' +
                        '<td>'+'<img src=../uploads/otherproducts/'+item.image +' height="60px"></td>'+
                        '<td>'+ item.short_description +' </td>'+
                        // '<td>'+ item.length +' </td>'+
                        // '<td>'+ item.beam +' </td>'+
                        // '<td>'+ item.draft +' </td>'+
                        // '<td>'+ item.main_hull_beam +' </td>'+
                        // '<td>'+ item.fuel +' </td>'+
                        // '<td>'+ item.water +' </td>'+
                        // '<td>'+ item.seating_capacity +' </td>'+
                        // '<td>'+ item.speed +' </td>'+
                        // '<td>'+ item.beds +' </td>'+
                        // '<td>'+ item.hull_type +' </td>'+
                        // '<td>'+ item.fish_hold_capacity +' </td>'+
                        
                        '<td>'+ '<button type="button" value="' + item.id + '" class="btn btn-success viewbtn-otherproduct btn-circle"><i class="fa fa-eye"></i></button>' +' </td>'+
                        '<td>'+ '<button type="button" value="' + item.id + '" class="btn btn-warning editbtn-otherproduct btn-circle"><i class="fas fa-edit"></i></button>' +' </td>'+
                        '<td>'+ '<button type="button" value="' + item.id + '" class="btn btn-danger deletebtn-otherproduct btn-circle"><i class="fas fa-trash"></i></button>' +' </td>  </tr>');
                    });
                }
            });
        }


        $(document).on('click', '.editbtn-otherproduct', function (e) {
            var pro_id = $(this).val();
            var url = "{{URL('/edit-otherproducts/')}}";
            var dltUrl = url+"/"+pro_id;
            $('#OtherproductEditModal').modal('show');
            // alert(pro_id);
            $.ajax({
                type: "GET",
                url: dltUrl,
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                        alert(response.message)
                        $('#OtherproductEditModal').modal('hide');
                    }else{

                        $('#o_e_productname').val(response.other_pro.product_name);
                        // $('#p_e_image').siblings("img").attr("src", "../uploads/otherproduct/"+response.boat.image);
                        $('#o_e_length').val(response.other_pro.length);
                        $('#o_e_width').val(response.other_pro.width);
                        $('#o_e_height').val(response.other_pro.height);
                        $('#o_e_price').val(response.other_pro.price);
                        $('#o_e_shortdescription').val(response.other_pro.short_description);
                        $('#o_e_description').val(response.other_pro.description);
                        $('#o_e_id').val(pro_id);

                    }
                        
                }
            });

        });

        //view model

        $(document).on('click', '.viewbtn-otherproduct', function (e) {
            var pro_id = $(this).val();
            var url = "{{URL('/edit-otherproducts/')}}";
            var dltUrl = url+"/"+pro_id;
            $('#OtherproductViewModal').modal('show');
            // alert(emp_id);
            $.ajax({
                type: "GET",
                url: dltUrl,
                success: function (response) {
                    console.log(response);
                    if (response.status == 404) {
                        alert(response.message)
                        $('#OtherproductViewModal').modal('hide');
                    }else{
                        console.log(response);

                        $("input[name='o_v_productname']").val(response.other_pro.product_name);
                        $("input[name='o_v_image']").siblings("img").attr("src", "../uploads/otherproducts/"+response.other_pro.image);
                        $("input[name='o_v_length']").val(response.other_pro.length);
                        $("input[name='o_v_width']").val(response.other_pro.width);
                        $("input[name='o_v_height']").val(response.other_pro.height);
                        $("input[name='o_v_price']").val(response.other_pro.price);
                        $("textarea[name='o_v_shortdescription']").val(response.other_pro.short_description);
                        $("textarea[name='o_v_description']").val(response.other_pro.description);

                    }
                        
                }
            });

        });



        $(document).on('submit','#OtherproductEditForm', function (e) {
            e.preventDefault();
            var id = $('#o_e_id').val();
            let EditFormData = new FormData($('#OtherproductEditForm')[0]);

            var url = "{{URL('/update-otherproducts/')}}";
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
                        $('#OtherproductEditForm')[0].reset();
                        $('#OtherproductEditModal').modal('hide');
                        fetchBoats();
                        
                    }
                }
            });
        });


        $(document).on('click', '.deletebtn-otherproduct',function (e) {
            e.preventDefault();

            var id = $(this).val();
            var url = "{{URL('/delete-otherproducts/')}}";
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