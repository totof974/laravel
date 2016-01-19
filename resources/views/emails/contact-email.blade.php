<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Réception data users</title>
    </head>
    <body>
    <h1>Demandes de contact de mon laravel</h1>
    <ul>
        <li>Nom: {{ $data['first'] }}</li>
        <li>Email: {{ $data['email'] }}</li>

        <li>Message: {{ $data['message'] }}</li>
    </ul>


    </body>
</html>