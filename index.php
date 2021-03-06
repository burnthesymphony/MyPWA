<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="assets/jquery.min.js"></script>
  <title>REPUBLIKA  PWA</title>
<!--  <link rel="stylesheet" type="text/css" href="styles/inline.css">-->
</head>
<body>
  <header class="header">
    <h1 class="header__title"><img src="assets/logo.png"></h1>
    <button id="butRefresh" class="headerButton">a</button>
    <button id="butAdd" class="headerButton">s</button>
  </header>

  <main class="main">
    <div class="card cardTemplate weather-forecast" hidden>
     </div>
  </main>

  <div class="dialog-container">
  . . .
  </div>

  <div class="loader">
    <svg viewBox="0 0 32 32" width="32" height="32">
      <circle id="spinner" cx="16" cy="16" r="14" fill="none"></circle>
    </svg>
  </div>

  <!-- Insert link to app.js here -->
  <script type="text/javascript" src="assets/app.js"></script>
</body>
</html>