@extends('backend/admin/layouts/master')
@section('title','Admin Banner')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
                <div class="header-left"><h5><i class="fa fa-bars"></i> All Banners</h5></div>
                <div class="header-rith"><a href="{{route('banner.create')}}" class="btn btn-success rounded"><i class="fa fa-plus"></i> Add New</a></div>
            </div>

            @include('backend/admin/layouts/partials/message')
        <div class="row">
            
            <div class="col-md-12">
                <div class="card table-responsive">
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>description</th>
                                    <th>photo</th>
                                    <th>Condition</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $banners as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->description}}</td>
                                    <td><img src="{{asset($item->photo)}}" alt="" style="height:50px;width:70px"></td>
                                    <td><h6 class="badge badge-success py-1">{{$item->conditional}}</h6></td>
                                    <td>
                                    <input type="checkbox" data-toggle="switchbutton" data-onlabel="Active"
                                     data-offlabel="Inactive" data-onstyle="success" data-offstyle="danger" data-size="sm"
                                    name="status" value="{{$item->id}}" id="status" {{$item->status==='active' ? 'checked' : '' }}
                                     >

                                    </td>
                                    <td>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="edit" class="btn btn-sm btn-outline-warning rounded"><i class="fa fa-edit font-lg"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="delete" class="btn btn-sm btn-outline-danger rounded"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection

@section('script')
    <script>
        $('#status').change(function(){
            var changeStatus = $(this).prop('checked');
            alert(changeStatus);
        });
    </script>
@endsection