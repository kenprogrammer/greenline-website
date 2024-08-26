<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .login-container {
      max-width: 400px;
      margin: 150px auto; /* Center the container */
      padding: 30px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: #fff;
      box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    }

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