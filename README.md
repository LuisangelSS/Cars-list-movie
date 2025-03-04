#  Cars list movie
 App de registros de personajes de la pelicula Cars  2006

-Descripción
Este proyecto es una aplicación web desarrollada en PHP con MySQL para la gestión de personajes de la película Cars (2006). Permite registrar, editar, eliminar, ver y descargar en PDF los perfiles de los personajes.

-Características
CRUD completo para la gestión de personajes, Diseño inspirado en la estética de Cars (2006), Generación de perfiles en PDF con FPDF e Instalador de base de datos en caso de que no esté configurada.

-Base de Datos
Nombre de la base de datos: cars_db
Tabla: personajes

id (INT, AUTO_INCREMENT, PRIMARY KEY)
nombre (VARCHAR 100)
color (VARCHAR 50)
tipo (VARCHAR 50)
nivel (INT)
foto (VARCHAR 255)

-Instalación
Clonar el repositorio:
git clone https://github.com/tuusuario/tu-repo.git.
Configurar la base de datos en db_config.php.
Importar el archivo dump.sql en MySQL.
Asegurar que Apache y MySQL estén corriendo.
Acceder a la aplicación desde el navegador.

-Uso
Agregar personajes a la base de datos.
Ver la lista de personajes con imágenes.
Editar y eliminar personajes.
Descargar perfiles en PDF.

-Tecnologías
PHP
MySQL
Bootstrap 
FPDF

-Créditos
Desarrollado por Luis Ángel Sánchez.
