  <?php 
#configurar base de datos
 /*
    $nombre_servidor = 'localhost';
    $nombre_usuario = 'root';
    $password = '';
    $nombre_base_datos = 'blogweb';*/
  
  
    #info de la base de datos
    define('NOMBRE_SERVIDOR', 'localhost');
    define('NOMBRE_USUARIO', 'root');
    define('PASSWORD', '');
    define('NOMBRE_DB', 'blogweb');

    //ruta de la web

    
    define("SERVIDOR","http://localhost/Proyecto_web");
    define("RUTA_REGISTRO", "http://localhost/Proyecto_web/registro.php");
    define("RUTA_REGISTRO_CORRECTO","http://localhost/Proyecto_web/registro_correcto.php");
    define("RUTA_LOGIN", SERVIDOR. "/login.php");





    /*
    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
         
    } catch (PDOException $e) {
        die('Conexion fallida:'. $e->getMessage());
       
    }

     */
     ?>
    

