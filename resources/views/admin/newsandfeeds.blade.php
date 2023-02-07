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
              <h5 class="modal-title" id="exampleModalLabel">Add News & Feeds</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                
            <div class="modal-body">
                <ul class="alert alert-warning d-none" id="save_errorList"></ul>

                <form id="NewsAddForm" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf

                <div class="col-md-8">
                    <label class="form-label">Topic</label>
                    <input type="text" name="newstopic" class="form-control">
                </div>

                <div class="col-md-4">
                    <label for="image" class="form-label">Choose Image</label>
                    <input class="form-control" type="file" name="image">
                    <small class="form-text text-muted">Please choose image size</small>
                  </div>


                <div class="form-group">
                    <label for="description">Description 01</label>
                    <textarea class="form-control" name="description_1"  rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Description 02</label>
                    <textarea class="form-control" name="description_2"  rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Description 03</label>
                    <textarea class="form-control" name="description_3"  rows="4"></textarea>
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
                    
    <div class="modal fade" id="NewsEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">News & Feeds Update</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                
            <div class="modal-body">
                <ul class="alert alert-warning d-none" id="edit_errorList"></ul>

                <form id="NewsEditForm" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf

                <input type="hidden" id="e_n_id" name="e_n_id">

                <div class="col-md-8">
                    <label class="form-label">Topic</label>
                    <input type="text" name="e_n_newstopic" id="e_n_newstopic" class="form-control">
                </div>

                <div class="col-md-4">
                    <label for="image" class="form-label">Choose Image</label>
                    <input class="form-control" type="file" name="e_n_image" id="e_n_image">
                    <small class="form-text text-muted">Please choose image size</small>
                  </div>


                <div class="form-group">
                    <label for="description">Description 01</label>
                    <textarea class="form-control" name="e_n_description_1"  id="e_n_description_1" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Description 02</label>
                    <textarea class="form-control" name="e_n_description_2" id="e_n_description_2"  rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Description 03</label>
                    <textarea class="form-control" name="e_n_description_3" id="e_n_description_3" rows="4"></textarea>
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
                    
    <div class="modal fade" id="NewsViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">View News & Feeds Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                
            <div class="modal-body">
                <ul class="alert alert-warning d-none" id="edit_errorList"></ul>

                {{-- <form id="GalleryBoatViewForm" class="row g-3" method="POST" enctype="multipart/form-data"> --}}
                    @csrf

                <input type="hidden" id="v_n_id" name="v_n_id" disabled>

                <div class="col-md-12">
                    <label class="form-label">Topic</label>
                    <input type="text" name="v_n_newstopic" id="v_n_newstopic" class="form-control" disabled>
                </div>

                <div class="col-md-4">
                    <label for="image" class="form-label">Image</label>
                    <input type="hidden" name="v_n_image" disabled>
                
                    <img src="" class="img-fluid"  name="v_n_image"  width="" height="100">
                  </div>


                <div class="form-group">
                    <label for="description">Description 01</label>
                    <textarea class="form-control" name="v_n_description_1"  id="v_n_description_1" rows="3" disabled></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Description 02</label>
                    <textarea class="form-control" name="v_n_description_2" id="v_n_description_2"  rows="5" disabled></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Description 03</label>
                    <textarea class="form-control" name="v_n_description_3" id="v_n_description_3" rows="4" disabled></textarea>
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
                <div class="card-header">News & Feeds</div> 
                <div class="card-body">
                    <!-- Table Start -->
                    <div class="container">
                        <div class="row">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Topic</th>
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


        $(document).on('submit', '#NewsAddForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#NewsAddForm')[0]);

            $.ajax({
                type: "POST",
                url: "{{URL('/admin/news-feeds')}}",
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
                        $('#NewsAddForm').find('input').val('');
                        $('#NewsAddModal').modal('hide');
                        $('#NewsAddForm')[0].reset();
                        alert(response.message);
                        // fetchBoats();
                       
                    }
                }
            });

        });

        fetchData();

        function fetchData() {
            $.ajax({
                type: "GET",
                url: "{{URL('/fetch-news-feeds/')}}",
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.news_feeds, function (key, item) { 
                        $('tbody').append('' 
                        +'<tr><td> '+ item.topic +' </td>' +
                        '<td>'+'<img src=../uploads/news-feeds/'+item.image +' height="60px"></td>'+
                        '<td>'+ '<button type="button" value="' + item.id + '" class="btn btn-success viewbtn-news-feeds btn-circle"><i class="fa fa-eye"></i></button>' +' </td>'+
                        '<td>'+ '<button type="button" value="' + item.id + '" class="btn btn-warning editbtn-news-feeds btn-circle"><i class="fas fa-edit"></i></button>' +' </td>'+
                        '<td>'+ '<button type="button" value="' + item.id + '" class="btn btn-danger deletebtn-news-feeds btn-circle"><i class="fas fa-trash"></i></button>' +' </td>  </tr>');
                    });
                }
            });
        }


        $(document).on('click', '.editbtn-news-feeds', function (e) {
            var news_id = $(this).val();
            var url = "{{URL('/edit-news-feeds')}}";
            var dltUrl = url+"/"+news_id;
            $('#NewsEditModal').modal('show');
            // alert(news_id); 
            $.ajax({
                type: "GET",
                url: dltUrl,
                success: function (response) {
                    console.log(response);
                    if (response.status == 404) {
                        // alert(response.message)
                        $('#NewsEditModal').modal('hide');
                    }else{

                        $('#e_n_newstopic').val(response.news_feeds.topic);
                        $('#e_n_description_1').val(response.news_feeds.description_1);
                        $('#e_n_description_2').val(response.news_feeds.description_2);
                        $('#e_n_description_3').val(response.news_feeds.description_3);
                        $('#e_n_id').val(news_id);
                       
                    }
                        
                }
            });

        });

        //view model

        $(document).on('click', '.viewbtn-news-feeds', function (e) {
            var n_id = $(this).val();
            var url = "{{URL('/edit-news-feeds/')}}";
            var dltUrl = url+"/"+n_id;
            $('#NewsViewModal').modal('show');
            // alert(n_id);
            $.ajax({
                type: "GET",
                url: dltUrl,
                success: function (response) {
                    console.log(response);
                    if (response.status == 404) {
                        alert(response.message)
                        $('#NewsViewModal').modal('hide');
                    }else{
                        console.log(response);

                        $("input[name='v_n_newstopic']").val(response.news_feeds.topic);
                        $("input[name='v_n_image']").siblings("img").attr("src", "../uploads/news-feeds/"+response.news_feeds.image);
                        $("textarea[name='v_n_description_1']").val(response.news_feeds.description_1);
                        $("textarea[name='v_n_description_2']").val(response.news_feeds.description_2);
                        $("textarea[name='v_n_description_3']").val(response.news_feeds.description_3);
                        

                    }
                        
                }
            });

        });



        $(document).on('submit','#NewsEditForm', function (e) {
            e.preventDefault();
            var id = $('#e_n_id').val();
            let EditFormData = new FormData($('#NewsEditForm')[0]);

            var url = "{{URL('/update-news-feeds/')}}";
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
                        $('#NewsEditForm')[0].reset();
                        $('#NewsEditModal').modal('hide');
                        fetchData();
                        
                    }
                }
            });
        });


        $(document).on('click', '.deletebtn-news-feeds',function (e) {
            e.preventDefault();

            var id = $(this).val();
            var url = "{{URL('/delete-news-feeds/')}}";
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