# CRUD de Usuarios

Este proyecto consiste en un CRUD de Usuarios.



## Tecnologías utilizadas
- Framework Back-End: Laravel, versión 7.20
- Motor de Bases de Datos: MySQL
- Librería jQuery
- Librería Intervention Image
- Librería Faker
- Bootstrap



### Consideraciones
- Basándose en las instrucciones, se utiliza un solo campo para Nombres y otro para Apellidos, aunque cada uno de estos puede tener una o más palabras. 
- Al eliminar un usuario, no se elimina su imagen de perfil, ya que esto no se especificaba. De todas formas, el proceso es sencillo por si se requiere añadirlo.
- Se incluyen validaciones por el lado del servidor y del cliente, con tal de evitar el ingreso de datos y/o archivos maliciosos. No obstante, esto no es exhaustivo y se requiere de más trabajo futuro para brindarle más seguridad al sitio.
- Se proveen algunas imágenes para utilizar en el Seeder.
- Se creo un modelo Usuario y se omite el uso de la tabla pre-definida "users", con tal de ejemplificar el cómo se puede crear un modelo y posteriormente su controlador.
- Existen algunos aspectos por mejorar, como el manejo de la imagen por parte del cliente (la edición del tamaño, por ejemplo, está siendo realizada por el lado del servidor), pero esto no se incluyó por temas de tiempo. 
- El Seeder ingresa números aleatorios para el "Rut", sin embargo, este campo sí es validado a la hora de crear y editar Usuarios.
- Por temas de tiempo, no se incluyó un modal para confirmar la eliminación de un Usuario, sin embargo, esta tarea no es compleja y es fácilmente implementable en un futuro.
- Si un Usuario no desea ingresar una imagen, se le da una por defecto.
- Basándose en las instrucciones, no se incluyeron lógicas o restricciones para la contraseña (largo, caractéres especiales, etc.). No obstante, esto es fácilmente implementable en un futuro.

#### Proyecto desarrollado por Francisco Tapia Fontecilla
#### francisco.tapia.fontecilla@gmail.com
