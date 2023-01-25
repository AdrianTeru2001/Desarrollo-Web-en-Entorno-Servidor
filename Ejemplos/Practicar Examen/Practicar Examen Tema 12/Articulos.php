<?php
require_once 'BlogDB.php';
require_once 'Cuentas.php';
class Articulos{

    //Atributos//
    private $codigo;
    private $titulo;
    private $categoria;
    private $fecha;
    private $contenido;
    private $likes;


    //Constructor//
    function __construct($codigo = 0, $titulo = "", $categoria="", $fecha = "", $contenido = "", $likes = 0){
        $this->codigo = $codigo;
        $this->titulo = $titulo;
        $this->categoria = $categoria;
        $this->fecha = $fecha;
        $this->contenido = $contenido;
        $this->likes = $likes;
    }


    //Getters y Setters//
    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($codigo){
        $this->codigo = $codigo;
        return $this;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
        return $this;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
        return $this;
    }
    public function getContenido(){
        return $this->contenido;
    }
    public function setContenido($contenido){
        $this->contenido = $contenido;
        return $this;
    }
    public function getCategoria(){
        return $this->categoria;
    }
    public function getLikes(){
        return $this->likes;
    }


    //Metodos//
    public function insert(){
        $conexion = BlogDB::connectDB();
        $insercion = "INSERT INTO articulos (titulo, fecha, contenido) VALUES ('$this->titulo','" . date('Y-m-d H:i:s') . "', '$this->contenido')";
        $conexion->exec($insercion);
    }

    public function delete(){
        $conexion = BlogDB::connectDB();
        $borrado = "DELETE FROM articulos WHERE codigo=$this->codigo";
        $conexion->exec($borrado);
    }

    public function update(){
        $conexion = BlogDB::connectDB();
        $actualiza = "UPDATE articulos SET titulo='$this->titulo', fecha=now(), contenido='$this->contenido' WHERE codigo='$this->codigo'";
        $conexion->exec($actualiza);
    }

    public static function getArticulos(){
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT * FROM articulos ORDER BY fecha DESC";
        $consulta = $conexion->query($seleccion);
        $articulos = [];
        while ($registro = $consulta->fetchObject()) {
            $articulos[] = new Articulos($registro->codigo, $registro->titulo, $registro->fecha, $registro->contenido);
        }
        return $articulos;
    }

    public static function getArticuloById($id){
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT * FROM articulos WHERE codigo='$id'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $articulo = new Articulos($registro->codigo, $registro->titulo, $registro->fecha, $registro->contenido);
        return $articulo;
    }

    public static function getArticulosNormalByTituloylikes($titulo, $likes){
        $conexion = BlogDB::connectDB();
        if ($titulo=="" && $likes=="") {
            $seleccion = "SELECT * FROM articulos WHERE categoria='normal' ORDER BY fecha DESC";
        } else if ($titulo!="" && $likes=="") {
            $seleccion = "SELECT * FROM articulos WHERE categoria='normal' and titulo like '%$titulo%' ORDER BY fecha DESC";
        } else if ($titulo=="" && $likes!="") {
            $seleccion = "SELECT * FROM articulos WHERE categoria='normal' and likes > $likes ORDER BY fecha DESC";
        } else if ($titulo!="" && $likes!="") {
            $seleccion = "SELECT * FROM articulos WHERE categoria='normal' and titulo like '%$titulo%' and likes > $likes ORDER BY fecha DESC";
        }
        $consulta = $conexion->query($seleccion);
        $articulos = [];
        while ($registro = $consulta->fetchObject()) {
            $articulos[] = new Articulos($registro->codigo, $registro->titulo, $registro->categoria, $registro->fecha, $registro->contenido, $registro->likes);
        }
        return $articulos;
    }

    public static function getArticulosPremiumByTokenytexto($token, $texto){
        $conexion = BlogDB::connectDB();
        $cuenta = Cuentas::getCuentaByToken($token);
        if ($cuenta==false) {
            return "noExiste";
        } else {
            if ($cuenta->getConsultas()>0) {
                $seleccion = "SELECT * FROM articulos WHERE categoria='premium' and contenido like '%$texto%' ORDER BY fecha DESC";
                $consulta = $conexion->query($seleccion);
                $articulos = [];
                while ($registro = $consulta->fetchObject()) {
                    $articulos[] = new Articulos($registro->codigo, $registro->titulo, $registro->categoria, $registro->fecha, $registro->contenido, $registro->likes);
                }
                $cuenta->restarUno();
                $cuenta2 = Cuentas::getCuentaByToken($token);
                if ($cuenta2->getConsultas()==0) {
                    $cuenta2->bloquearCuenta();
                }
                return $articulos;
            } else {
                return "sinPermiso";
            }
        }
        
    }
}
