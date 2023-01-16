<!-- Ejercicio 3
Crea un servicio web que proporcione información sobre los productos de la base de datos, del carrito de la compra. 
Se devolverá en formato JSON, el nombre, precio y url de la imagen, de cada uno de los productos seleccionados.
La petición podrá ser por nombre o por precio. Por nombre el servicio devolverá los productos cuyo nombre contenga la cadena recibida 
por parámetro. Y por precio el servicio devolverá los productos cuyo precio este dentro del rango mínimo y máximo recibido por parámetro.
Para poder usar el servicio, el cliente debe haberse registrado previamente y recibido su 'TOKEN' de acceso. Estos tokens están 
almacenados en una tabla nueva llamada 'clientes' con tres campos, 'nombre', 'token' y 'peticiones'. 
En cada petición el cliente debe mandar el token y el servidor debe comprobar que es un token válido correspondiente a 
un cliente registrado, y sumar uno al campo peticiones en la tabla, para llevar un control de las peticiones que realiza cada cliente. -->

<?php 

    session_start();

    /* Comprobamos que hayamos inciado sesion o no para ir a una pagina u otra */
    if (isset($_SESSION["inicio"])) {
        header("Location: controller/index.php");
    } else {
        header("Location: view/formInicioSesion.php");
    }