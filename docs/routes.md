# Routes

## Sprint 2

Pour plus de lisibilité, seules les routes pour gérer les catégories sont indiquées mais celles-ci devront être adaptées pour gérer les types, marques, produits ...

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Backoffice oShop | Backoffice dashboard | - |
| `/category/list` | `GET`| `CategoryController` | `list` | Liste des catégories | Categories list | - |
| `/category/add` | `GET`| `CategoryController` | `add` | Ajouter une catégorie | Form to add a category | - |
| `/category/add` | `POST`| `CategoryController` | `store` | Ajouter une catégorie | Category add | - |
| `/category/[i:id]/edit` | `GET`| `CategoryController` | `edit` | Éditer une catégorie | Form to update a category | [i:id] is the category to update |
| `/category/[i:id]/edit` | `POST`| `CategoryController` | `store` | Éditer une catégorie | Category edit | [i:id] is the category to update |
| `/category/[i:id]/delete` | `POST`| `CategoryController` | `delete` | Supprimer une catégorie | Category delete | [i:id] is the category to delete |
| -- | -- | -- | -- | -- | -- | -- |
| `/user/login` | `GET`| `UserController` | `login` | Connexion d'un utilisateur | Form to login a user | - |
| `/user/login` | `POST`| `UserController` | `loginPost` | Connexion d'un utilisateur | User login | - |
| `/user/list` | `GET`| `UserController` | `list` | Liste des utilisateurs | Users list | - |
| `/user/add` | `GET`| `UserController` | `add` | Ajouter un utilisateur | Form to add a user | - |
| `/user/add` | `POST`| `UserController` | `store` | Ajouter un utilisateur | User add | - |
| `/user/[i:id]/edit` | `GET`| `UserController` | `edit` | Éditer un utilisateur | Form to update a user | [i:id] is the user to update |
| `/user/[i:id]/edit` | `POST`| `UserController` | `store` | Éditer un utilisateur | Form to update a user | [i:id] is the user to update |
| `/user/[i:id]/delete` | `POST`| `UserController` | `delete` | Supprimer un utilisateur | User delete | [i:id] is the user to delete |
