<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Réception data users</title>
    </head>
    <body>
    <h1>Demandes de contact de mon laravel</h1>
    <ul>
        <li>Nom: {{ $data['userName'] }}</li>
        <li>Email: {{ $data['userEmail'] }}</li>
        <li>Tel: {{ $data['userPhone'] }}</li>
        <li>Message: {{ $data['userMsg'] }}</li>
    </ul>


    </body>
</html>