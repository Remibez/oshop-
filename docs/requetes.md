# Requêtes SQL

## Récupérer tous les produits

```sql
SELECT * FROM product
```

## Récupérer le produit ayant un id donné (#2)

```sql
SELECT *
FROM product
WHERE id = 2
```
## Dans le header

### Récupérer les 7 catégories dans l'ordre alphabétique
```sql
SELECT * FROM category ORDER BY name ASC;
```

### Récupérer les 7 types dans l'ordre alphabétique
```sql
SELECT * FROM type ORDER BY name ASC;
```

### Récupérer tous les types dans l'ordre alphabétique
```sql
SELECT * FROM type ORDER BY name ASC;
```

### Récupérer toutes les marques dans l'ordre alphabétique
```sql
SELECT * FROM brand ORDER BY name ASC;
```

## Dans la page d'accueil

### Afficher les 5 catégories dans l'ordre de home_order
```sql
SELECT * FROM category WHERE home_order != 0 ORDER BY home_order ASC;
```

## Page catégorie

### Pour récupérer les produits via l'id de la catégorie
```sql
SELECT * FROM product WHERE category_id = 1;
```

### Pour récupérer les produits via l'id de la catégorie dans l'ordre croissant
```sql
SELECT * FROM product WHERE category_id = 1 ORDER BY price ASC;
```

### Pour récupérer les produits via l'id de la catégorie dans l'ordre décroissant
```sql
SELECT * FROM product WHERE category_id = 1 ORDER BY price DESC;
```

## Types

### Pour récupérer les produits via l'id du type
```sql
SELECT * FROM product WHERE type_id = 1;
```

### Pour récupérer les produits via l'id du type dans l'ordre croissant
```sql
SELECT * FROM product WHERE type_id = 1 ORDER BY price ASC;
```

### Pour récupérer les produits via l'id du type dans l'ordre décroissant
```sql
SELECT * FROM product WHERE type_id = 1 ORDER BY price DESC;
```

## Marque

### Pour récupérer les produits via l'id de la marque
```sql
SELECT * FROM product WHERE brand_id = 1;
```

### Pour récupérer les produits via l'id de la marque dans l'ordre croissant
```sql
SELECT * FROM product WHERE brand_id = 1 ORDER BY price ASC;
```

### Pour récupérer les produits via l'id de la marque dans l'ordre décroissant
```sql
SELECT * FROM product WHERE brand_id = 1 ORDER BY price DESC;
```

## Page product

### Afficher la page de détail d'un produit avec le nom de la marque + le nom de la catégorie
```sql
SELECT product.*, brand.name, category.name 
FROM product 
LEFT JOIN brand ON brand.id = product.brand_id
LEFT JOIN category ON category.id = product.category_id
WHERE product.id = 1;
```