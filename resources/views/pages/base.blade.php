<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Malla Curricular</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  {{-- Header opcional --}}
  @yield('header')

  {{-- Contenido principal --}}
<main class="container-fluid px-0">
  @yield('main')
</main>

</body>
</html>
