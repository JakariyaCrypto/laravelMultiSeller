@extends('backend/admin/layouts/master')
@section('title','Admin Color')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
                <div class="header-left"><h5><i class="fa fa-bars"></i> All Color</h5></div>

                <div class="header-rith"><a href="{{route('color.create')}}" class="btn btn-success btn-sm rounded"><i class="fa fa-plus-circle"></i> Add New</a></div>
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
                                    <th>Color</th>
                                    <th>Status</th>
                                    <th style="width: 15%">Active</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $colors as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        {{$item->color}}
                                        <span class="color_box" style="background: {{$item->color}};background: #{{$item->color}};"></span>
                                    </td>
                                    
                                <td>
                                    <input type="checkbox" data-toggle="switchbutton" data-onlabel="Active"
                                     data-offlabel="Inactive" data-onstyle="success" data-offstyle="danger" data-size="sm" name="status" value="{{$item->id}}" id="status_change"
                                     {{$item->status == 'active' ? 'checked' : ''}}
                                     >

                                    </td>

                                    <td class="d-flex" style="width: 15%">
                                       
                                        <a href="{{route('color.edit',$item->id)}}" data-toggle="tooltip" data-placement="top" title="edit" class="btn btn-sm btn-outline-warning rounded mr-1"><i class="fa fa-edit font-lg"></i></a>

                                    <form action="{{route('color.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="color_id" value="{{$item->id}}">
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
<style>
.color_box {
padding: 4px 14px;
margin-left: 8px;
}
</style>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->


@endsection

@section('script')
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
      text: "Delete the Color",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
        form.submit();
      if (willDelete) {
        swal("Done! Color Deleted Successfull!", {
          icon: "success",
        });
      } else {
        swal("Something Wrong!");
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
                url: "{{route('color.status')}}",
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    mode: status,
                    id: id,
                },
                success: function(response){
                    alert(response.msg);
                }
            });

        });
    </script>
@endsection

