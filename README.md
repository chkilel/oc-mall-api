# RESTFUL API for October CMS OFFLINE MALL plugin


Plugins Required:
- RainLab.User
- OFFLINE.Mall
- OFFLINE.SiteSearch
- RLuders.JWTAuth
- RLuders.CORS

**This API is based on the first version of this plugin https://github.com/SaifurRahmanMohsin/oc-rest-plugin**


<a name="overview"></a>
# API Overview

### Shop

- [ ] `GET /api/mall/settings`

- [ ] `GET /api/mall/shippings`

- [ ] `GET /api/mall/payments`

- [x] `GET /api/mall/brands`
- [x] `GET /api/mall/brands/{slug*}` or `GET /api/mall/brands/{id}`

- [x] `GET /api/mall/categories`
- [x] `GET /api/mall/categories/{slug*}`
- [x] `GET /api/mall/categories/{id}`
- [x] `GET /api/mall/categories/{slug*}/filters` OR `GET /api/mall/categories/{id}/filters`
- [x] `GET /api/mall/categories/{slug*}/products` OR `GET /api/mall/categories/{id}/products`

- [x] `GET /api/mall/categories/{slug*}?gender=female` or `GET /api/mall/categories/{id}?gender=female`
- [x] `GET /api/mall/products`
- [x] `GET /api/mall/products?sort=latest` >> default
- [x] `GET /api/mall/products?on_sale=true`
- [x] `GET /api/mall/products?brand=cruiser-bikes`
- [x] `GET /api/mall/products?brand=cruiser-bikes&on_sale=true&sort=latest`
- [x] `GET /api/mall/products?sort=oldest`
- [x] `GET /api/mall/products?sort=bestseller`
- [x] `GET /api/mall/products?sort=ratings`
- [x] `GET /api/mall/products?sort=price`
- [x] `GET /api/mall/products?sort=price_high`
- [x] `GET /api/mall/products?sort=price_low`
- [x] `GET /api/mall/products?sort=name_asc`
- [x] `GET /api/mall/products?sort=name_desc`
- [x] `GET /api/mall/products/category/{categorySlug*}` (Ex: /api/mall/products/category/bikes or /api/mall/products/category/bikes/citybikes)
- [x] `GET /api/mall/products/category/{categorySlug*}?sort=name_desc`
- [x] `GET /api/mall/products/category/{categorySlug*}?sort=name_desc&gender=female` (Ex: /api/mall/products/category/bikes?sort=name_desc&gender=female)
- [x] `GET /api/mall/products/{slug*}` OR `GET /api/mall/products/{id}`
- [ ] `GET /api/mall/products/{slug*}/reviews` OR  `GET /api/mall/products/{id}/reviews`

- [x] `GET /api/mall/variants/{id}`



### Customers

- [x] `POST /api/mall/auth/register`
- [x] `POST /api/mall/auth/account-activation`
- [x] `POST /api/mall/auth/forgot-password`
- [x] `POST /api/mall/auth/reset-password`
- [x] `POST /api/mall/auth/refresh-token`
- [x] `POST /api/mall/auth/login`
- [x] `GET /api/mall/auth/me`
- [ ] `GET /api/mall/auth/me/customer`
- [ ] `PUT /api/mall/auth/me/customer`
- [ ] `GET /api/mall/auth/me/addresses`
- [ ] `GET /api/mall/auth/me/addresses/{id}`
- [ ] `POST /api/mall/auth/me/addresses`
- [ ] `PUT /api/mall/auth/me/addresses/{id}`
- [ ] `DELETE /api/mall/auth/me/addresses/{id}`
- [ ] `GET /api/mall/auth/me/orders`
- [ ] `GET /api/mall/auth/me/orders/{id}`
- [ ] `GET /api/mall/auth/me/wishlist`
- [ ] `DELETE /api/mall/auth/me/wishlist/{id}`


### Cart &amp; Checkout process

- [ ] `GET /api/mall/cart`
- [ ] `POST /api/mall/cart`
- [ ] `PUT /api/mall/cart/{cartItemId}`
- [ ] `DELETE /api/mall/cart/{cartItemId}`
- [ ] `POST /api/mall/checkout`

### Routes caching

To enhance performances, type this command in your console

`php artisan route:cache`
