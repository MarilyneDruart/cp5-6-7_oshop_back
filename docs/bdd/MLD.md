# Explications du MCD :

- APP_USER ( user_id, email, password, firstname, lastname, role, status )
    - Le champ user_id constitue la clé primaire de la table. C'était déjà un identifiant de l'entité APP_USER.
    - Les champs email, password, firstname, lastname, role et status étaient déjà de simples attributs de l'entité APP_USER.

- BRAND ( brand_id, brand name )
    - Le champ brand_id constitue la clé primaire de la table. C'était déjà un identifiant de l'entité BRAND.
    - Le champ brand name était déjà un simple attribut de l'entité BRAND.

- CATEGORY ( category_id, category name, subtitle, picture, home order )
    - Le champ category_id constitue la clé primaire de la table. C'était déjà un identifiant de l'entité CATEGORY.
    - Les champs category name, subtitle, picture et home order étaient déjà de simples attributs de l'entité CATEGORY.

- PRODUCT ( product_id, product name, description, picture, price, rate, status, #brand_id, #category_id, #type_id )
    - Le champ product_id constitue la clé primaire de la table. C'était déjà un identifiant de l'entité PRODUCT.
    - Les champs product name, description, picture, price, rate et status étaient déjà de simples attributs de l'entité PRODUCT.
    - Le champ brand_id est une clé étrangère. Il a migré par l'association de dépendance fonctionnelle made à partir de l'entité BRAND en perdant son caractère identifiant.
    - Le champ category_id est une clé étrangère. Il a migré par l'association de dépendance fonctionnelle related to à partir de l'entité CATEGORY en perdant son caractère identifiant.
    - Le champ type_id est une clé étrangère. Il a migré par l'association de dépendance fonctionnelle is a à partir de l'entité TYPE en perdant son caractère identifiant.

- TAG ( tag_id, tag name )
    - Le champ tag_id constitue la clé primaire de la table. C'était déjà un identifiant de l'entité TAG.
    - Le champ tag name était déjà un simple attribut de l'entité TAG.

- TYPE ( type_id, type name )
    - Le champ type_id constitue la clé primaire de la table. C'était déjà un identifiant de l'entité TYPE.
    - Le champ type name était déjà un simple attribut de l'entité TYPE.

- product_has_tag ( #tag_id, #product_id )
    - Le champ tag_id fait partie de la clé primaire de la table. C'est une clé étrangère qui a migré directement à partir de l'entité TAG.
    - Le champ product_id fait partie de la clé primaire de la table. C'est une clé étrangère qui a migré directement à partir de l'entité PRODUCT.