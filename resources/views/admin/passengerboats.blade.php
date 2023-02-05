@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<div class="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#PassengerBoatAddModal">
        Add New
      </button>

    

    <!-- add Modal -->
                    
    <div class="modal fade" id="PassengerBoatAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Passenger Boat</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                
            <div class="modal-body">
                <ul class="alert alert-warning d-none" id="save_errorList"></ul>

                <form id="PassengerBoatAddForm" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf

                <div class="col-md-6">
                    <label class="form-label">Boat Name</label>
                    <input type="text" name="boatname" class="form-control">
                </div>


                <div class="col-md-6">
                  <label for="image" class="form-label">Choose Image</label>
                  <input class="form-control" type="file" name="image">
                  <small class="form-text text-muted">Please choose image size</small>
                </div>

                <div class="form-group">
                    <label for="description">Short Description</label>
                    <textarea class="form-control" name="discription" rows="3"></textarea>
                </div>

                <div class="col-md-12">
                    <label for="lastname">Specification</label>
                </div>

                <div class="col-md-3">
                    <label for="length" class="form-label">Length</label>
                    <input type="text" class="form-control" name="length">
                </div>

                <div class="col-md-3">
                    <label for="Beam" class="form-label">Beam</label>
                    <input type="text" class="form-control" name="beam">
                </div>

                <div class="col-md-3">
                    <label for="length" class="form-label">Draft</label>
                    <input type="text" class="form-control" name="draft" >
                </div>

                <div class="col-md-3">
                    <label for="Main Hull Beam" class="form-label">Main Hull Beam</label>
                    <input type="text" class="form-control" name="mainhullbeam">
                </div>


                <div class="col-md-3">
                    <label for="fuel" class="form-label">Fuel</label>
                    <input type="text" class="form-control" name="fuel" >
                </div>

                <div class="col-md-3">
                    <label for="water" class="form-label">Water</label>
                    <input type="text" class="form-control" name="water"  >
                </div>

                <div class="col-md-3">
                    <label for="fuel" class="form-label">Seating Capacity</label>
                    <input type="text" class="form-control" name="seating_capacity" >
                </div>

                <div class="col-md-3">
                    <label for="Speed" class="form-label">Speed</label>
                    <input type="text" class="form-control" name="speed"  >
                </div>


                <div class="col-md-3">
                    <label for="Beds" class="form-label">Beds</label>
                    <input type="text" class="form-control" name="beds" >
                </div>

                <div class="col-md-3">
                    <label for="Hull Type" class="form-label">Hull Type</label>
                    <input type="text" class="form-control" name="hulltype"  >
                </div>

                <div class="col-md-3">
                    <label for="fish hold capacity" class="form-label">Fish hold capacity</label>
                    <input type="text" class="form-control" name="fish_hold_capacity">
                </div>

                <div class="col-md-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" name="price">
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
                    
    <div class="modal fade" id="PassengerBoatEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Passenger Boat</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                
            <div class="modal-body">
                <ul class="alert alert-warning d-none" id="edit_errorList"></ul>

                <form id="PassengerBoatEditForm" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf

                <input type="hidden" id="p_e_boat_id" name="p_e_boat_id">

                <div class="col-md-6">
                    <label class="form-label">Boat Name</label>
                    <input type="text" name="p_e_boatname" id="p_e_boatname" class="form-control">
                </div>


                <div class="col-md-6">
                  <label for="image" class="form-label">Choose Image</label>
                  <input class="form-control" type="file" name="p_e_image" id="p_e_image">
                </div>

                <div class="form-group">
                    <label for="description">Short Description</label>
                    <textarea class="form-control" name="p_e_discription" id="p_e_discription" rows="3"></textarea>
                </div>

                <div class="col-md-12">
                    <label for="lastname">Specification</label>
                </div>

                <div class="col-md-3">
                    <label for="length" class="form-label">Length</label>
                    <input type="text" class="form-control" name="p_e_length" id="p_e_length">
                </div>

                <div class="col-md-3">
                    <label for="Beam" class="form-label">Beam</label>
                    <input type="text" class="form-control" name="p_e_beam" id="p_e_beam">
                </div>

                <div class="col-md-3">
                    <label for="length" class="form-label">Draft</label>
                    <input type="text" class="form-control" name="p_e_draft" id="p_e_draft">
                </div>

                <div class="col-md-3">
                    <label for="Main Hull Beam" class="form-label">Main Hull Beam</label>
                    <input type="text" class="form-control" name="p_e_mainhullbeam" id="p_e_mainhullbeam">
                </div>


                <div class="col-md-3">
                    <label for="fuel" class="form-label">Fuel</label>
                    <input type="text" class="form-control" name="p_e_fuel" id="p_e_fuel">
                </div>

                <div class="col-md-3">
                    <label for="water" class="form-label">Water</label>
                    <input type="text" class="form-control" name="p_e_water" id="p_e_water">
                </div>

                <div class="col-md-3">
                    <label for="fuel" class="form-label">Seating Capacity</label>
                    <input type="text" class="form-control" name="p_e_seating_capacity" id="p_e_seating_capacity">
                </div>

                <div class="col-md-3">
                    <label for="Speed" class="form-label">Speed</label>
                    <input type="text" class="form-control" name="p_e_speed" id="p_e_speed">
                </div>


                <div class="col-md-3">
                    <label for="Beds" class="form-label">Beds</label>
                    <input type="text" class="form-control" name="p_e_beds" id="p_e_beds">
                </div>

                <div class="col-md-3">
                    <label for="Hull Type" class="form-label">Hull Type</label>
                    <input type="text" class="form-control" name="p_e_hulltype" id="p_e_hulltype">
                </div>

                <div class="col-md-3">
                    <label for="fish hold capacity" class="form-label">Fish hold capacity</label>
                    <input type="text" class="form-control" name="p_e_fish_hold_capacity" id="p_e_fish_hold_capacity">
                </div>

                <div class="col-md-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" name="p_e_price" id="p_e_price">
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
                    
    <div class="modal fade" id="PassengerBoatViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">View Passenger Boat Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                
            <div class="modal-body">
                <ul class="alert alert-warning d-none" id="edit_errorList"></ul>

                <form id="PassengerBoatViewForm" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf

                <input type="hidden"  name="p_v_boat_id">

                <div class="col-md-6">
                    <label class="form-label">Boat Name</label>
                    <input type="text" name="p_v_boatname" class="form-control" disabled>
                </div>


                <div class="col-md-6">
                  <label for="image" class="form-label">Choose Image</label>
                  {{-- <input class="form-control" type="file" name="p_v_image"> --}}

                  <input type="hidden" name="p_v_image">
                
                  <img src="" class="img-fluid"  name="p_v_image"  width="" height="100" disabled>
                </div>

                <div class="form-group">
                    <label for="description">Short Description</label>
                    <textarea class="form-control" name="p_v_discription" rows="3" disabled></textarea>
                </div>

                <div class="col-md-12">
                    <label for="lastname">Specification</label>
                </div>

                <div class="col-md-3">
                    <label for="length" class="form-label">Length</label>
                    <input type="text" class="form-control" name="p_v_length" disabled>
                </div>

                <div class="col-md-3">
                    <label for="Beam" class="form-label">Beam</label>
                    <input type="text" class="form-control" name="p_v_beam" disabled>
                </div>

                <div class="col-md-3">
                    <label for="length" class="form-label">Draft</label>
                    <input type="text" class="form-control" name="p_v_draft" disabled>
                </div>

                <div class="col-md-3">
                    <label for="Main Hull Beam" class="form-label">Main Hull Beam</label>
                    <input type="text" class="form-control" name="p_v_mainhullbeam" disabled>
                </div>


                <div class="col-md-3">
                    <label for="fuel" class="form-label">Fuel</label>
                    <input type="text" class="form-control" name="p_v_fuel" disabled>
                </div>

                <div class="col-md-3">
                    <label for="water" class="form-label">Water</label>
                    <input type="text" class="form-control" name="p_v_water" disabled>
                </div>

                <div class="col-md-3">
                    <label for="fuel" class="form-label">Seating Capacity</label>
                    <input type="text" class="form-control" name="p_v_seating_capacity" disabled>
                </div>

                <div class="col-md-3">
                    <label for="Speed" class="form-label">Speed</label>
                    <input type="text" class="form-control" name="p_v_speed" disabled>
                </div>


                <div class="col-md-3">
                    <label for="Beds" class="form-label">Beds</label>
                    <input type="text" class="form-control" name="p_v_beds" disabled>
                </div>

                <div class="col-md-3">
                    <label for="Hull Type" class="form-label">Hull Type</label>
                    <input type="text" class="form-control" name="p_v_hulltype" disabled>
                </div>

                <div class="col-md-3">
                    <label for="fish hold capacity" class="form-label">Fish hold capacity</label>
                    <input type="text" class="form-control" name="p_v_fish_hold_capacity" disabled>
                </div>

                <div class="col-md-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" name="p_v_price" disabled>
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


        $(document).on('submit', '#PassengerBoatAddForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#PassengerBoatAddForm')[0]);

            $.ajax({
                type: "POST",
                url: "{{URL('/admin/passengerboats')}}",
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
                        $('#PassengerBoatAddForm').find('input').val('');
                        $('#PassengerBoatAddModal').modal('hide');
                        $('#PassengerBoatAddForm')[0].reset();
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
                url: "{{URL('/fetch-passengerboats')}}",
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.boats, function (key, item) { 
                        $('tbody').append('' 
                        +'<tr><td> '+ item.boat_name +' </td>' +
                        '<td>'+'<img src=../uploads/passengerboats/'+item.image +' height="60px"></td>'+
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
                        '<td>'+ item.price +' </td>'+
                        '<td>'+ '<button type="button" value="' + item.id + '" class="btn btn-success viewbtn-passenger btn-circle"><i class="fa fa-eye"></i></button>' +' </td>'+
                        '<td>'+ '<button type="button" value="' + item.id + '" class="btn btn-warning editbtn-passenger btn-circle"><i class="fas fa-edit"></i></button>' +' </td>'+
                        '<td>'+ '<button type="button" value="' + item.id + '" class="btn btn-danger deletebtn-passenger btn-circle"><i class="fas fa-trash"></i></button>' +' </td>  </tr>');
                    });
                }
            });
        }


        $(document).on('click', '.editbtn-passenger', function (e) {
            var boat_id = $(this).val();
            var url = "{{URL('/edit-passengerboats/')}}";
            var dltUrl = url+"/"+boat_id;
            $('#PassengerBoatEditModal').modal('show');
            // alert(emp_id);
            $.ajax({
                type: "GET",
                url: dltUrl,
                success: function (response) {
                    console.log(response);
                    if (response.status == 404) {
                        alert(response.message)
                        $('#PassengerBoatEditModal').modal('hide');
                    }else{

                        $('#p_e_boatname').val(response.boat.boat_name);
                        // $('#p_e_image').siblings("img").attr("src", "../uploads/passenger/"+response.boat.image);
                        $('#p_e_discription').val(response.boat.short_description);
                        $('#p_e_length').val(response.boat.length);
                        $('#p_e_beam').val(response.boat.beam);
                        $('#p_e_draft').val(response.boat.draft);
                        $('#p_e_mainhullbeam').val(response.boat.main_hull_beam);
                        $('#p_e_fuel').val(response.boat.fuel);
                        $('#p_e_water').val(response.boat.water);
                        $('#p_e_seating_capacity').val(response.boat.seating_capacity);
                        $('#p_e_speed').val(response.boat.speed);
                        $('#p_e_beds').val(response.boat.beds);
                        $('#p_e_hulltype').val(response.boat.hull_type);
                        $('#p_e_fish_hold_capacity').val(response.boat.fish_hold_capacity);
                        $('#p_e_price').val(response.boat.price);
                        $('#p_e_boat_id').val(boat_id);

                    }
                        
                }
            });

        });

        //view model

        $(document).on('click', '.viewbtn-passenger', function (e) {
            var boat_id = $(this).val();
            var url = "{{URL('/edit-passengerboats/')}}";
            var dltUrl = url+"/"+boat_id;
            $('#PassengerBoatViewModal').modal('show');
            // alert(emp_id);
            $.ajax({
                type: "GET",
                url: dltUrl,
                success: function (response) {
                    console.log(response);
                    if (response.status == 404) {
                        alert(response.message)
                        $('#PassengerBoatViewModal').modal('hide');
                    }else{
                        console.log(response);

                        $("input[name='p_v_boatname']").val(response.boat.boat_name);
                        $("textarea[name='p_v_discription']").val(response.boat.short_description);
                        // $('#p_v_image').val(response.boat.image);
                        $("input[name='p_v_image']").siblings("img").attr("src", "../uploads/passengerboats/"+response.boat.image);
                        $("input[name='p_v_length']").val(response.boat.length);
                        $("input[name='p_v_beam']").val(response.boat.beam);
                        $("input[name='p_v_draft']").val(response.boat.draft);
                        $("input[name='p_v_mainhullbeam']").val(response.boat.main_hull_beam);
                        $("input[name='p_v_fuel']").val(response.boat.fuel);
                        $("input[name='p_v_water']").val(response.boat.water);
                        $("input[name='p_v_seating_capacity']").val(response.boat.seating_capacity);
                        $("input[name='p_v_speed']").val(response.boat.speed);
                        $("input[name='p_v_beds']").val(response.boat.beds);
                        $("input[name='p_v_hulltype']").val(response.boat.hull_type);
                        $("input[name='p_v_fish_hold_capacity']").val(response.boat.fish_hold_capacity);
                        $("input[name='p_v_price']").val(response.boat.price);
                        $("input[name='p_v_boat_id']").val(boat_id);

                    }
                        
                }
            });

        });



        $(document).on('submit','#PassengerBoatEditForm', function (e) {
            e.preventDefault();
            var id = $('#p_e_boat_id').val();
            let EditFormData = new FormData($('#PassengerBoatEditForm')[0]);

            var url = "{{URL('/update-passengerboats/')}}";
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
                        $('#PassengerBoatEditForm')[0].reset();
                        $('#PassengerBoatEditModal').modal('hide');
                        fetchBoats();
                        
                    }
                }
            });
        });


        $(document).on('click', '.deletebtn-passenger',function (e) {
            e.preventDefault();

            var id = $(this).val();
            var url = "{{URL('/delete-passengerboats/')}}";
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