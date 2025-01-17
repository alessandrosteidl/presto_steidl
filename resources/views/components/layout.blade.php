<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Presto.it | {{ $title }}</title>
  @vite('resources/css/app.css')
</head>
<body class="app-font bg-body-tertiary">
  <x-navbar />
  <div class="vh-100-with-navbar">
    {{ $slot }}
  </div>
  <x-footer />
  @vite('resources/js/app.js')
</body>
</html>