# dwes.local

Proyecto de Desarrollo Web en Entorno Servidor de 2.º de DAW.

Repositorio de la cuenta educativa **DAW-CMN**. La raíz de este repositorio es la carpeta que contiene el código de la web.

## Estado actual

- Práctica 6: dominio local, comprobación de PHP y plantilla Photo instalada.
- Práctica 7: preparación del repositorio local y remoto privado, rama `main` y exclusiones mediante `.gitignore`.

## Archivos de la web

- `index.html`: página inicial de la plantilla.
- `about.html`, `blog.html`, `contact.html` y `single_post.html`: páginas de la plantilla.
- `comprobacion.php`: página de prueba con el nombre del alumno.
- `css/` y `js/`: estilos y scripts de la plantilla.
- `Documentation/`: documentación original de la plantilla.
- `README.txt`: aviso original del autor de la plantilla; se conserva sin modificar.

Las siguientes prácticas irán transformando esta misma web y reorganizando sus archivos según los enunciados del profesor.

## Recursos locales

El enunciado de la práctica 7 propone excluir del repositorio las imágenes y las librerías de apoyo. Por eso `.gitignore` excluye las imágenes, `bootstrap/`, `font-awesome/` y la futura carpeta `public/`. Estos recursos siguen disponibles en la copia local.

Si se obtiene otra copia del repositorio, los recursos excluidos se recuperan de la [plantilla Photo indicada por el profesor](https://themewagon.com/themes/bootstrap-photography-template-free-responsive-photo/), conservando sus carpetas originales. Se deben restaurar los recursos de apoyo sin sobrescribir el código del proyecto que se haya modificado después.

XAMPP portable, las descargas, las copias de seguridad, las credenciales y las evidencias de entrega se encuentran fuera de este repositorio.

## Acceso local

- Web: `http://dwes.local/`
- Prueba PHP: `http://dwes.local/comprobacion.php`
- Bienvenida de XAMPP: `http://localhost/`

En el entorno de trabajo de esta asignatura, Apache sirve esta carpeta mediante el dominio local configurado en la práctica 6.
