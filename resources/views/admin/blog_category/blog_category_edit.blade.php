@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Blog Category Page</h4>

                        <form method="post" action="{{ route('update.blog.category', $blogcategory->id) }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="{{ $blogcategory->blog_category }}" name="blog_category" type="text" id="example-text-input">

                                    @error('blog_category')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                           
                            <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Update Blog Category">
                        </form>
                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>





@endsection