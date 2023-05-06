@extends('admin.admin_master')
@section('admin')
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Home Slide Page</h4>
                        <form method="post" action="{{route('update.slider')}}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{$homeslide->id}}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="title" name="title" value="{{$homeslide->title}}" type="text">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="short_title" name="short_title" value="{{$homeslide->short_title}}" type="text">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Video Url</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="video_url" value="{{$homeslide->video_url}}" type="text" id="video_url">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Slide Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="home_slide" name="home_slide" value="{{$homeslide->home_slide}}" type="file">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{(!empty($homeslide->home_slide))?url($homeslide->home_slide):url('upload/def.jpeg')}}" alt="Card image cap">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <input type="submit" value="Update Slide" class="btn btn-info waves-effect waves-light">
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#home_slide').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection