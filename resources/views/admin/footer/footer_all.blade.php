@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Footr SetUp</h4>

                        <form method="post" action="{{ route('update.footer') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $allfooter->id }}">

                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="number" type="text" value="{{ $allfooter->number }}" id="example-text-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea required="" class="form-control" name="short_description" rows="5" id="example-input">
                                        {{ $allfooter->short_description }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="address" type="text" value="{{ $allfooter->address }}" id="example-text-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="email" type="text" value="{{ $allfooter->email }}" id="example-text-input">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="facebook" type="text" value="{{ $allfooter->facebook }}" id="example-text-input">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="twitter" type="text" value="{{ $allfooter->twitter }}" id="example-text-input">
                                </div>
                            </div>
                   

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Instagram</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="instagram" type="text" value="{{ $allfooter->instagram }}" id="example-text-input">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Linkedin</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="linkedin" type="text" value="{{ $allfooter->linkedin }}" id="example-text-input">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="copyright" type="text" value="{{ $allfooter->copyright }}" id="example-text-input">
                                </div>
                            </div>

                          
                            <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Update Footer">

                        </form>
                        

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>



@endsection