# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 categories | - |
| `/category/[i:id]` | `GET` | `CatalogController` | `category` | Dans les shoe | 1 categorie + les articles de cette catégorie | - |
| `/mentions-legales` | `GET` | `MainController` | `legalMentions` | Terms of service | Terms of service of the site | - |
| `/types/[i:id]` | `GET` | `CatalogController` | `type` | Name of the type | Products attached to the type | [id] represents the id of the type |
| `/marques/[i:id]` | `GET` | `CatalogController` | `marque` | Name of the brand | Products attached to the brand | [id] represents the id of the brand |
| `/produit/[i:id]` | `GET` | `CatalogController` | `produit` | Name of the product | Product details page | [id] represents the id of the product |
| `/public-url/with-sub-folder/[and-dynamic-part]` | `GET` ou `POST` | `ControllerName` | `methodName` | Titre de la page | Description of page's content | Explain here the dynamics parts of your URL (`[]`) |