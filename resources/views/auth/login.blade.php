<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des Employés</title>


</head>
<body>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700,600" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

    <form method="POST" action="{{ route('traitementLogin') }}">
        @csrf
        <div class="box">
            <h1>Espace de Connexion</h1>

            @if(Session::get('status'))
                <b style="font-size:15px; color: #cb2031">{{ Session::get('status') }}</b>
            @endif

            <input type="email" name="email" class="email" />

            <input type="password" name="password" class="email" />

            <div class="btn-container">
                <button type="submit"> Se connecter</button>
            </div>

        </div>

    </form>

</body>
</html>
