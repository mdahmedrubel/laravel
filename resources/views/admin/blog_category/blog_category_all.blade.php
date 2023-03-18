@extends('admin.admin_master')
@section('admin')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Blog Category All Data</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Blog Category</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Blog Category All</h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Blog Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php($i= 1)
                                @foreach ($blogcategory as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->blog_category }}</td>

                                    <td>
                                        <a href="{{ route('edit.blog.category',$item->id) }}" class="btn btn-info sm" title="Edit Portfolio Data"> <i class="fas fa-edit"></i></a> || 
                                        <a href="{{ route('delete.blog.category',$item->id) }}" class="btn btn-danger sm" title="Delete Portfolio" id="delete"> <i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


        
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->



<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script> © Upcube.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                </div>
            </div>
        </div>
    </div>
</footer>
    
<!-- end main content-->


@endsection