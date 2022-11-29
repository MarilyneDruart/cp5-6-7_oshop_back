# Les sessions

## Démarrer une session

Pour démarrer ou reprendre une session existante, il faut impérativement utiliser la fonction `session_start()` !

Celle-ci doit être utilisée avant tout affichage de données pour éviter de provoquer des erreurs.

```php
<?php
session_start();
```

## Variables de session

Pour accéder aux variables de sessions, vous allez devoir passer par la superglobale `$_SESSION`. Celle-ci est simplement un tableau que vous pouvez donc manipuler comme tel !

```php
<?php
session_start();

$_SESSION['id'] = 8;

var_dump($_SESSION['id']);
```

## Détruire une session

Pour détruire une session (détruit la superglobale `$_SESSION` et son contenu), il vous suffit d'utiliser la fonction `session_destroy()` ! La destruction d'une session implique d'avoir d'abord démarré une session.

```php
<?php
session_start();

// ...

session_destroy();
```

## Détruire une valeur dans la superglobale `$_SESSION`

On peut utiliser la fonction `unset()` :

```php
<?php
session_start();

$_SESSION['id'] = 12;

unset($_SESSION['id']);
```
