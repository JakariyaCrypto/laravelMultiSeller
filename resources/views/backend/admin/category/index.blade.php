@extends('backend/admin/layouts/master')
@section('title','Admin Category')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
                <div class="header-left"><h5><i class="fa fa-bars"></i> All Category</h5></div>
                <div class="header-rith"><a href="{{route('category.create')}}" class="btn btn-success rounded"><i class="fa fa-plus"></i> Add New</a></div>
            </div>

            @include('backend/admin/layouts/partials/message')
        <div class="row">
            
            <div class="col-md-12">
                <div class="card table-responsive">
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered-less">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>photo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $categories as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td><img src="{{asset($item->photo)}}" alt="" style="height:50px;width:70px"></td>

                                    <td>
                                    <input type="checkbox" data-toggle="switchbutton" data-onlabel="Active"
                                     data-offlabel="Inactive" data-onstyle="success" data-offstyle="danger" data-size="sm" name="status" value="{{$item->id}}" id="status_change"
                                     {{$item->status == 'active' ? 'checked' : ''}}
                                     >

                                    </td>
                                    <td class="d-flex">
                                        <a href="{{route('category.edit',$item->id)}}" data-toggle="tooltip" data-placement="top" title="edit" class="btn btn-sm btn-outline-warning rounded mr-1"><i class="fa fa-edit font-lg"></i></a>
                                        

                                    <form action="{{route('category.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="#" data-id="{{$item->id}}" data-toggle="tooltip" data-placement="top" title="delete" class="del-btn btn btn-sm btn-outline-danger rounded"><i class="fa fa-trash"></i></a>
                                    </form>

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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- delete -->
<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.del-btn').click(function(e){
    e.preventDefault();
    var form = $(this).closest('form');
    var dataId = $(this).data('id');

    swal({
      title: "Are you sure?",
      text: "Delete the category",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
        form.submit();
      if (willDelete) {
        swal("succeess! category deleted success!", {
          icon: "success",
        });
      } else {
        swal("something is wrong!");
      }
    });

});
</script>


<!-- change status -->
   <script>
        $('input[name=status]').change(function(){
            
            var status = $(this).prop('checked');
            // alert(status);exit;
            var id = $(this).val();
            // alert(id);
            $.ajax({
                url: "{{route('category.status')}}",
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    mode: status,
                    id: id,
                },
                success: function(response){

                }
            });

        });
    </script>
@endsection

