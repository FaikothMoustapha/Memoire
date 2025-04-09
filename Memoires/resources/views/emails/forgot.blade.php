@component('mail::message')
# Récupération de mot de passe

Bonjour {{ $user->nom }} {{ $user->prenom }},

Vous recevez cet e-mail car une demande de réinitialisation de mot de passe a été effectuée pour votre compte.
<br>
Si vous avez initié cette demande, veuillez cliquer sur le bouton ci-dessous pour réinitialiser votre mot de passe. 

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
Réinitialiser le Mot de Passe
@endcomponent

Si vous n'avez pas fait cette demande, aucune action n'est nécessaire.

Merci,<br>
{{ config('app.name') }}
@endcomponent