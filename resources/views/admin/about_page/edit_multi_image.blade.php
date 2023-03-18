@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Update Multi Image</h4>

                        <form method="post" action="{{ route('update.multi.image') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $multiImage->id }}">

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Multi Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="multi_image" type="file" id="image">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"> </label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="card-img-top img-fluid rounded avatar-lg" src=" {{ url(asset($multiImage->multi_image)) }}" alt="Card image cap">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Update Multiple Images">

                        </form>
                        

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">

    $( document ).ready(function() {
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>



@endsection