# Récupérer les tags liés à un produit:
## on vien selectionner le champs nom sur tag puis sur product 
SELECT tag.name AS tag_name, product.name AS product_name
## je recupere depuis tag
FROM tag
## en joignant product tag et en indiquantl'égalité souhaitée
INNER JOIN product_has_tag ON tag.id = product_has_tag.tag_id
## again
INNER JOIN product ON product_has_tag.product_id = product.id
WHERE product.id = 1

SELECT tag.name AS tag_name, product.name AS product_name
FROM tag
INNER JOIN product_has_tag ON tag.id = product_has_tag.tag_id
INNER JOIN product ON product_has_tag.product_id = product.id
WHERE product.id = 1

# Récupérer les produits liés à un tag :

SELECT tag.name AS tag_name, product.name AS product_name
FROM tag
INNER JOIN product_has_tag ON tag.id = product_has_tag.tag_id
INNER JOIN product ON product_has_tag.product_id = product.id
WHERE tag.id = 1