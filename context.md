# Amazonia Market

## 1. Contexto del proyecto

Amazonia Market es una plataforma de comercio electrónico multivendedor enfocada en conectar comunidades afrocolombianas e indígenas de la Amazonía colombiana con el mercado digital.

El proyecto nace como parte de una investigación que busca crear un ecosistema digital que permita a comunidades rurales comercializar sus productos mientras preservan su historia cultural.

La plataforma inicia en el departamento del Caquetá (Colombia) pero está diseñada para escalar a nivel nacional.

El objetivo principal es que cada producto tenga un valor cultural agregado, permitiendo que los consumidores conozcan la historia de las personas y comunidades que lo producen.

---

# 2. Tecnologías del proyecto

El proyecto utiliza las siguientes tecnologías principales.

## Backend

- WordPress
- WooCommerce
- WCFM Marketplace

## Base de datos

MySQL

## Infraestructura

- VPS / hosting propio
- CDN para archivos estáticos

## Pagos

Posibles integraciones:

- Stripe
- PayU
- MercadoPago

---

# 3. Modelo de negocio

La plataforma funciona como un **marketplace multivendedor**.

Cada comunidad o productor podrá:

- crear su tienda
- publicar productos
- gestionar pedidos
- ver análisis de ventas

---

# 4. Información cultural del producto

Cada producto debe incluir información cultural adicional.

Campos requeridos:

- comunidad o etnia
- municipio
- departamento
- coordenadas geográficas
- historia del producto
- significado cultural
- proceso de elaboración

Contenido multimedia:

- fotos de la comunidad
- video del proceso de elaboración
- mapa de ubicación

Esto busca aumentar el valor cultural y emocional del producto.

---

# 5. Uso de inteligencia artificial

La IA se usará como asistente para las comunidades y para la plataforma.

Funciones principales:

## Generación de contenido

- generación de descripciones de productos
- generación de historias culturales
- optimización SEO

## Análisis comercial

- análisis de mercado
- recomendación de precios
- análisis de ventas

## Experiencia del usuario

- recomendación de productos
- personalización del catálogo

---

# 6. Personalización del frontend

El diseño visual del sitio se basa en tres archivos HTML de referencia.

Archivos de referencia visual:

- code.html
- code2.html
- code3.html

Estos archivos contienen:

- estructura visual del sitio
- diseño de componentes
- colores
- tipografía
- estilos CSS

La IA debe usar estos archivos como guía visual para generar el theme de WordPress.

---

# 7. Reglas para la IA que genere el theme

La IA debe cumplir las siguientes reglas.

1. Usar los estilos definidos en los archivos HTML de referencia.
2. Mantener coherencia con los colores y tipografía existentes.
3. Convertir los componentes HTML en templates de WordPress.
4. Mantener compatibilidad con WooCommerce.
5. Mantener compatibilidad con WCFM Marketplace.

---

# 8. Estructura del theme

El theme del proyecto debe tener la siguiente estructura.

### Estructura del Proyecto

```
amazonia-market-theme

assets/
css/
js/
images/

template-parts/

woocommerce/

archive-product.php
content-product.php
single-product.php
content-single-product.php

cart/
cart.php

checkout/
form-checkout.php

myaccount/
dashboard.php

wcfm/

dashboard/
products/
orders/
store/
```

---

# 9. Templates WooCommerce a personalizar

Templates principales:

archive-product.php  
content-product.php  
single-product.php  
content-single-product.php

cart/cart.php  
checkout/form-checkout.php

myaccount/dashboard.php

Estos templates controlan la mayoría del frontend de la tienda.

---

# 10. Templates WCFM a personalizar

Templates importantes del marketplace.

wcfm-view-dashboard.php  
wcfm-view-products.php  
wcfm-view-products-manage.php  
wcfm-view-orders.php  
wcfm-view-store.php

---

# 11. Escalabilidad

La plataforma debe permitir:

- múltiples comunidades
- múltiples regiones
- expansión a todo Colombia

---

# 12. Impacto esperado

Impacto social  
Fortalecer la economía de comunidades indígenas y afrocolombianas.

Impacto cultural  
Preservar tradiciones y conocimiento ancestral.

Impacto económico  
Crear nuevas oportunidades de comercio digital.
