<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Greenline Holdings Ltd - Website Admin</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('lte/css/adminlte.min.css')}}">
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('lte/js/adminlte.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('plugins/ckeditor5/ckeditor5.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/ckeditor5/ckeditor5-content.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/ckeditor5/ckeditor5-editor.css') }}">
    <style>
        /**
         * For show and hide password icon
         */
        .input-group-addon {
          cursor: pointer;
        }

        .form-group {
            position: relative;
        }

        .input-group-addon a {
            position: absolute;
            top: 72%;
            right: 10px;
            transform: translateY(-50%);
            color: #000;
        }
    </style>
</head>