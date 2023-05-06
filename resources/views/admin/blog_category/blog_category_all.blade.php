@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Blog Category All</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Blog Category All</h4><br><br>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>SNumber</th>
                                    <th>Blog Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($blogcategory as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->blog_category}}</td>
                                    <td>
                                        <a href="{{route('edit.blog.category',$item->id)}}" class="btn btn-info sm" title="Edit Date"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('delete.blog.category',$item->id)}}" class="btn btn-danger sm" id="delete" title="Delete Date"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection