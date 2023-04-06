<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
  <!-- Google Fonts CSS -->
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    body {
    font-family: 'Lato';}
    .container {max-width: 980px;}
    .form-label {margin-top: 10px;}
    a {text-decoration: none;}
    .btn-container {display: flex;}
    .btn-container-btn {margin-left: auto; margin-bottom: 10px;}
    .btn-container-btn {display: flex;}
    .add-student-btn {display: flex;}
    .btn2 {margin-top: 20px;}
    .index-container {margin: 0 auto;}
    .required {color: red;}
    .panel-default-top {margin: 20px auto;}
    .table>thead>tr>th {border-bottom: none;}
    .table>tbody>tr>td {vertical-align: middle;}
  </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>