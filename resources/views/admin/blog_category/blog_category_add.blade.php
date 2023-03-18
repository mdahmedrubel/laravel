@extends('admin.admin_master')
@section('admin')

{{-- needed this jquery file for validation jaquery  --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Blog Category Page</h4>
                        <form id="myForm" method="post" action="{{ route('store.blog.category') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>

                                <div class="form-group col-sm-10">
                                    <input class="form-control" name="blog_category" type="text" id="example-text-input">

                                    {{-- @error('blog_category')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror --}}
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Insert Blog Category">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

{{-- added jquery validate.min.js to admin_master.blade.php  --}}
{{-- validation for add blog category form  --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('#myForm').validate({
            rules: {
                blog_category: {
                    required: true,
                },
                // blog_title: {
                //     required: true,
                // },
            },
            messages: {
                blog_category: {
                    required: 'Please Enter Blog Category',
                },
                // blog_title: {
                //     required: 'Please Enter Blog Title',
                // },
            },
            errorElement: 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass){
                $(element).removeClass('is-invalid'); 
            },



        });
    });
</script>



@endsection