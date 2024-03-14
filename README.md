# DESARROLLO PRUEBA TECNICA - APPLUS

### DETALLES

- Desarrollo de prueba técnica de **APPLUS**, dividida en 2 partes:
  - **CRUD** de Productos (prueba_1)
  - Sistema de **gestión** de Biblioteca (prueba_2)

- Desarrollado con **PHP**, **MySQL**, **JQuery** y **Bootstrap**
- Mas detalles de su funcionamiento en los **Commits** y dentro del **código** 

---

### INTRUCCIONES DE USO

1. **Instalar un servidor web local:**
   - Puedes usar aplicaciones como XAMPP, WAMP, MAMP, o instalar individualmente Apache, PHP y MySQL en tu sistema. En mi caso yo use **XAMPP**
2. **Clonar el proyecto PHP:**
   - Descarga el código fuente del proyecto PHP desde el repositorio en GitHub



> [!NOTE]
>
> En el repositorio se encuentran 2 carpetas: **prueba_1** y **prueba_2**, las instrucciones van para la carpeta de **prueba_1** 
>
> (para prueba_2 solo use el archivo SQL que se encuentra ahí)



3. **Copia el proyecto en el directorio raíz del servidor web local**:
   - Como yo uso XAMPP, el directorio raíz se encuentra en `htdocs`, también puede ser `www` para MAMP. Copia todos los archivos del proyecto en este directorio.

4. **Inicia el servidor web y la base de datos**

   - Inicia tu servidor web local y asegúrate de que la base de datos esté también en ejecución.
   - usar y ejecutar el archivo SQL **'database.sql'**

   - La base de datos debería tener al menos 3 datos por tabla

5. **Configura el entorno de desarrollo:**
   - Asegúrate de actualizar la configuración del entorno con los detalles de tu entorno local.

el nombre del archivo se encuentra en la carpeta de  "**prueba_1**", dentro de "**config**" y con el nombre de "**db.php**", el archivo se ve de esta manera:

```php
<?php
if (!defined("DB_TYPE")) {
    define("DB_TYPE","mysql");
}
if (!defined("DB_HOST")) {
    define("DB_HOST","localhost");
}
if (!defined("DB_NAME")) {
    define("DB_NAME","prueba1db");
}
if (!defined("DB_USER")) {
    define("DB_USER","root");
}
if (!defined("DB_PWD")) {
    define("DB_PWD","");
}
```

6. **Accede al proyecto a través del navegador:**

   - Abre tu navegador web y navega a la URL. 
   - El enlace es: http://localhost/prueba-applus/prueba_1/frontend/.

   ---

   **Gracias por su atención <3**

 
