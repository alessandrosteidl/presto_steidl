<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Presto.it | {{ $title }}</title>
  @vite('resources/css/app.css')
</head>
<body>
  <x-navbar />
  <div class="min-vh-100">
    {{ $slot }}
  </div>
  <x-footer />
  @vite('resources/js/app.js')
</body>
</html>