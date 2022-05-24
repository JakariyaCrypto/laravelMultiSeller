<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
table{
	text-align: center;
	width: 70%;
	margin: auto;
	border: 1px solid #2222;
	padding: 20px 10px;
}
	table,tr{
		text-align: center;

	}

	.pdf-header{
		text-align: center;

	}
</style>
<body>
	<div class="row">
            
            <div class="col-md-12">
            	<div class="pdf-header">
            		<div class="pdf-title">
            			<img style="width:150px;border-radius: 5px" src="{{public_path('backend/assets/images/admin.jpg')}}">
            			<h5>data: <strong> 25 march 2022</strong></h5>
            		</div>
            	</div>
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

                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $banners as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->description}}</td>
                                    <td><img src="{{public_path($item->photo)}}" alt="" style="height:50px;width:70px"></td>
                                    <td><h6 class="badge badge-success py-1">{{$item->conditional}}</h6></td>
                                    
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
</body>
</html>