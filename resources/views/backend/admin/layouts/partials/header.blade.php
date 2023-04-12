<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('backend/assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/jqvmap/dist/jqvmap.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/switch-button-bootstrap/css/bootstrap-switch-button.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/select-picker/bootstrap-select.min.css')}}">
<!-- Filepond stylesheet -->
  <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
  
    <!-- include summernote css/js -->
    <link href="{{asset('backend/assets/summernote-0.8.18/summernote.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('backend/assets/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/dropzone/dropzone.min')}}">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.css" integrity="sha512-zoIoZAaHj0iHEOwZZeQnGqpU8Ph4ki9ptyHZFPe+BmILwqAksvwm27hR9dYH4WXjYY/4/mz8YDBCgVqzc2+BJA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

<style type="text/css">
    .btn-light {
        color: #212529;
        background-color: white;
        border-color: #e9ecef;
    }
</style>

<style type="text/css">
.hilight {
    border: 1px solid orange;
    list-style: none;
    text-align: center;
    border-radius: .5rem;
    padding: 3px;
    color: black;
    font-weight: bold;
    text-transform: capitalize;
}

.not-found-imoji img {
    width: 200px;
}

.not-found-imoji {
    text-align: center;
}

.not-found-imoji h2 {
    text-transform: capitalize;
    font-weight: bold;
    margin: ;
    padding: 20px 0;
}

.not-found-imoji {
    padding-bottom: 28px;
}
</style>



</head>

<body>
