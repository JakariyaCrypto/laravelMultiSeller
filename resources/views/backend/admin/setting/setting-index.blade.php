@extends('backend/admin/layouts/master')
@section('title','Setting')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="py-3 d-flex justify-content-between align-items-center">
                <div class="header-left"><h5><i class="fa fa-bars"></i> Site Setting</h5></div>

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
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>photo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>name</td>
                                    <td>name</td>
                                    <td>name</td>
                                    <td>name</td>
                                    
                                    

                                    <td class="d-flex">
                                        <a href="{{route('setting.edit')}}" data-toggle="tooltip" data-placement="top" title="edit" class="btn btn-sm btn-outline-warning rounded mr-1"><i class="fa fa-edit font-lg"></i></a>

                                    </td>
                                </tr>
                                
                                
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
      text: "Delete the Brand",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
        
      if (willDelete) {
        form.submit();
        swal("Done! Brand Deleted Successfull!", {
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
                url: "{{route('brnad.status')}}",
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

