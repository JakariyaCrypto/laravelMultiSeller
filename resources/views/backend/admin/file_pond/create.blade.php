@extends('backend/admin/layouts/master')
@section('title', 'Create Folder')
@section('content')


        <div class="content mt-3 pb-5 ">
            <div class="animated fadeIn">
                <h4 class="file-heading"> <i class="fa fa-folder"></i> Create folder</h4>
                 <form action="{{route('store.folder')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="container custom-container">
                            <div class="col-sm-6">
                                <div class="file-form">

                                    <!--  For multiple file uploads  -->
                                    <input type="file" class="filepond" name="file[]" id="file" multiple required/>
                                    <p class="help-block">{{ $errors->first('file.*') }}</p>
                                    <div class="upload-icon">
                                        <i class="fa fa-arrow-up"></i>
                                    </div>
                                   
                                
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput"> Name <span class="text text-primary text-lg">*</span></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="name">
                                    @error('name')
                                    <div class="alert alert-warning">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="formGroupExampleInput"> E-mail <span class="text text-primary text-lg">*</span></label>
                                    <input type="email" class="form-control" id="formGroupExampleInput" name="email">
                                    @error('email')
                                    <div class="alert alert-warning">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="formGroupExampleInput"> Phone <span class="text text-primary text-lg">*</span></label>
                                    <input type="number" class="form-control" id="formGroupExampleInput" name="phone">
                                  </div>
                                  <div class="form-group">
                                    <label for="formGroupExampleInput"> Address <span class="text text-primary text-lg">*</span></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="address">
                                   
                                  </div>
                                </div>
                                 <button type="submit" class="custom-btn btn btn-outline-primary btn-md">Create Folder</button>
                            </div>

                        </div>
                    </div>

                </form>
               
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->



<style type="text/css">
.file-form {
    margin-top: 50px;
}

.filepond--root.filepond--hopper {
    height: 397px !important;
}




.upload-icon {
    position: absolute;
    top: 161px;
    z-index: 999999999;
    left: 200px;
    width: 43px;
    height: 42px;
    background: white;
    line-height: 45px;
    text-align: center;
    border: 1px solid orange;
    border-radius: .2rem;
}

.upload-icon i.fa.fa-arrow-up {
    font-size: 29px;
    color: #626262;
}

.file-heading {
    text-transform: capitalize;
    border-bottom: 2px solid #fff;
    padding-bottom: 6px;
}

.filepond--drop-label {

    width: 400px !important;

}


/*.filepond--list-scroller {
    position: absolute;
    top: -70% !important;
    width: 500px;
    left: 56%;
}
*/

.filepond--drop-label {

    top: 0%;

}

.filepond--drop-label {
    width: 400px !important;
    height: 300px;
    margin: 11px;
}

.filepond--root.filepond--hopper {

    border-radius: .5rem;
}

.filepond--list-scroller {
    position: absolute;
    top: -105px;
}

.container.custom-container {
    background: white;
    margin-top: 50px;
    padding: 20px 10px;
}

.custom-btn {
    margin-top: 30px;
}


body {
    background: #f1f0ef;
}

</style>


@endsection

@section('script')

<!-- Load FilePond library -->
  <script src="https://unpkg.com/filepond/dist/filepond.js"></script>


  <script>


// Get a reference to the file input element
    const inputElement = document.querySelector('input[name="file"]');
    FilePond.create(document.querySelector('input[name="file[]"]'), {chunkUploads: true});

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);

	FilePond.setOptions({
			server: {
				url: '/admin/upload',
				headers: {
					'X-CSRF-TOKEN': '{{ csrf_token()}}'
				}
			}
            

	    });
            
        </script>

@endsection