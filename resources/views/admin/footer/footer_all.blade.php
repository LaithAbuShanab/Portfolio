@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Footer Page</h4>
                        <form method="post" action="{{route('update.footer')}}">
                            @csrf

                            <input type="hidden" name="id" value="{{$footerpage->id}}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="number" name="number" value="{{$footerpage->number}}" type="number">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea required="" name="short_description" id="short_description" class="form-control" rows="5">{{$footerpage->short_description}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">address</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="address" name="address" value="{{$footerpage->address}}" type="text">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="email" name="email" value="{{$footerpage->email}}" type="email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="facebook" name="facebook" value="{{$footerpage->facebook}}" type="text">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="twitter" name="twitter" value="{{$footerpage->twitter}}" type="text">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="copyright" name="copyright" value="{{$footerpage->copyright}}" type="text">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <input type="submit" value="Update Footer" class="btn btn-info waves-effect waves-light">
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection