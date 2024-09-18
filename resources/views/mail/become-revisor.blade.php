<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Presto.it</title>
</head>
<body>
  <div>
    <h1>Un utente ha chiesto di lavorare con noi</h1>
    <h2>Questi sono i suoi dati:</h2>
    <p>Nome: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Se vuoi rendere questo utente un revisore, clicca sul seguente link:</p>
    <a href="{{ route('make.revisor', compact('user')) }}">Rendi revisore</a>
  </div>
</body>
</html>