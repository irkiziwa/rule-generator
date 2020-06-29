<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Involve Asia Test</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <!-- <link href="/css/bootstrap.css" rel="stylesheet"> -->
    <!-- Addon CSS -->
    <!-- <link href="/css/addon.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <!-- Styles -->

    <style>
      html, body {
          background-color: #fff;
          color: #636b6f;
          font-family: 'Nunito', sans-serif;
          font-weight: 200;
          height: 100vh;
          margin: 0;
      }
    </style>
</head>

<body class="bg-pale-1">
    <div id="app">
      <home />
    </div>
    <script src=" /js/app.js?v={{ time() }}"></script>
</body>

</html>