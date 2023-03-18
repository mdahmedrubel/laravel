@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Blog Page</h4>

                        <form method="post" action="{{ route('update.blog') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $blogs->id }}">
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                <div class="col-sm-10">
                                    <select name="blog_category_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Select Category</option>

                    
                                        @foreach ($categories as $cat)       
                                        <option value="{{ $cat->id }}" {{ $cat->id == $blogs->blog_category_id ? 'selected' : ' ' }} >{{ $cat->blog_category }}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text" class="col-sm-2 col-form-label">Blog Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="blog_title" value="{{ $blogs->blog_title }}" type="text" id="example-text">

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text" class="col-sm-2 col-form-label">Blog Tags</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="blog_tags" value="{{ $blogs->blog_tags }}" type="text" id="example-text" data-role="tagsinput">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="long-rext" class="col-sm-2 col-form-label">Blog Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="blog_description" id="long-text">
                                        {{ $blogs->blog_description }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Blog Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="blog_image" type="file" id="image">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"> </label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="card-img-top img-fluid rounded avatar-lg" src="{{ asset($blogs->blog_image) }}" alt="Card image cap">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Update Blog Data">

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