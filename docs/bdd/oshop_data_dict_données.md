- user_id
- email
- password
- firstname
- lastname
- role
- status
- brand_id
- brand name
- category_id
- category name
- subtitle
- picture
- home order
- product_id
- product name
- description
- picture
- price
- rate
- status
- tag_id
- tag name
- type_id
- type name

# table TYPE

| Champ | Type | Spécificités | Description |
|--|--|--|--|
| id | int(10) | unsigned | Incrément automatique |
| name | varchar(64) | NOT NULL | Le nom du type |
| created_at | timestamp | [CURRENT_TIMESTAMP] | La date de création de la catégorie |
| updated_at | timestamp | NULL | La date de la dernière mise à jour de la catégorie |

# table PRODUCT

| Champ | Type | Spécificités | Description |
|--|--|--|--|
| id | int(10) | unsigned | Incrément automatique |
| name | varchar(45) | NOT NULL | Le nom du produit |
| description | text | NULL | La description du produit |
| picture | varchar(128) | NULL | L'URL de l'image du produit |
| price | decimal(10,2) | [0.00] | Le prix du produit |
| rate | tinyint(1) | [0] | L'avis sur le produit, de 1 à 5 |
| status | tinyint(1) | [0] | Le statut du produit (1=dispo, 2=pas dispo) |
| created_at | timestamp | [CURRENT_TIMESTAMP] | La date de création du produit |
| updated_at | timestamp | NULL | La date de la dernière mise à jour du produit |
| brand_id | int(10) | unsigned | Clé étrangère liant la marque au produit | 
| category_id | int(10) | unsigned NULL | Clé étrangère liant la la catégorie au produit | 
| type_id | int(10) | unsigned | Clé étrangère liant le type au produit  | 