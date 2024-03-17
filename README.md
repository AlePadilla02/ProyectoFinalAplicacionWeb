# ProyectoFinalAplicacionWeb

## Índice
- [Introducción](#introducción)
- [Composición de las Carpetas](#composición-de-las-carpetas)
- [Funcionalidades](#funcionalidades)
  - [Funcionalidades Principales](#funcionalidades-principales)
  - [Funcionalidades Extras](#funcionalidades-extras)
- [Posibles Mejoras](#posibles-mejoras)
- [Conclusión](#conclusión)

---

## Introducción
En este proyecto final, se debe de conseguir una aplicación web de compras, en mi caso está dedicada a la compra de mascotas con unas funcionalidades principales, además de manera opcional, aplicar unas funcionalidades extras.
---

## Composición de las Carpetas
- **Database:** Esta carpeta contiene el archivo `database.php` que sirve para conectar con la base de datos.
- **Controllers:** Contiene los controladores de usuarios y productos.
- **Images:** Almacena las imágenes de la aplicación web.
- **Models:** Almacena los DAO de las tablas usuario, pedido y producto de la base de datos.
- **Utils:** Contiene las utilidades de la aplicación, como `validation.php` que valida los datos introducidos.
- **Views:** Contiene todas las vistas de la aplicación web, como los apartados de login, listado de productos, detalles del producto, carrito y almacén de productos.
- **Index:** Fichero principal donde pasan todos los controladores.

---

## Funcionalidades
### Funcionalidades Principales
- Listado de productos.
- Ver un producto (Mostrar una descripción de un producto).
- Inicio de sesión (admin y usuario). Se deben crear los usuarios directamente en la BBDD.
- Dar de alta nuevo producto (solo administrador).
- Añadir producto a carro de compra.
- Ver carro de la compra.

### Funcionalidades Extras
- Eliminar un producto del almacén.
- Eliminar por cantidad en el carrito.
- En el carrito se muestra un recuento de los productos y su coste total.
- Vaciar carrito.
- Categorías.
- Comodidades a la hora de querer ir al carrito o a la página principal.

---

## Posibles Mejoras
- Añadir un registro de usuarios.
- Implementar el buscador de productos.
- Implementar actualizar un producto.
- Mejorar el control de errores.

---

## Conclusión
En este proyecto, se ha logrado de manera bastante completa una aplicación web de compras de mascotas, con sus funcionalidades principales y algunas extras. No obstante, cabe destacar que hay que tener en cuenta las propuestas de posibles mejoras, ya que serán necesarias a la hora de la salida al mercado del proyecto.




