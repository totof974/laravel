<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réception data users</title>
</head>
<body>
<h1>Rapport de satisfaction de mon laravel</h1>
<ul>

    <li>Nom: {{ $data['firstname'] }}</li>
    <li>Email: {{ $data['email'] }}</li>

    <li>Message: {{ $data['message'] }}</li>
</ul>


</body>
</html>