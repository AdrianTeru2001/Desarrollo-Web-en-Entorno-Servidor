<?php
require_once 'BlogDB.php';
require_once "Cuentas.php";
class Articulos
{
    private $codigo;
    private $titulo;
    private $categoria;
    private $fecha;
    private $contenido;
    private $likes;

    function __construct($codigo = 0, $titulo = "", $categoria="", $fecha = "", $contenido = "", $likes = 0)
    {
        $this->codigo = $codigo;
        $this->titulo = $titulo;
        $this->categoria = $categoria;
        $this->fecha = $fecha;
        $this->contenido = $contenido;
        $this->likes = $likes;
    }

    public function insert()
    {
        $conexion = BlogDB::connectDB();
        $insercion = "INSERT INTO articulos (titulo, fecha, contenido) VALUES ('$this->titulo','" . date('Y-m-d H:i:s') . "', '$this->contenido')";
        $conexion->exec($insercion);
    }
    public function delete()
    {
        $conexion = BlogDB::connectDB();
        $borrado = "DELETE FROM articulos WHERE codigo=$this->codigo";
        $conexion->exec($borrado);
    }
    public function update()
    {
        $conexion = BlogDB::connectDB();
        $actualiza = "UPDATE articulos SET titulo='$this->titulo', fecha=now(), contenido='$this->contenido' WHERE codigo='$this->codigo'";
        $conexion->exec($actualiza);
    }
    public static function getArticulos()
    {
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT * FROM articulos ORDER BY fecha DESC";
        $consulta = $conexion->query($seleccion);
        $articulos = [];
        while ($registro = $consulta->fetchObject()) {
            $articulos[] = new Articulos($registro->codigo, $registro->titulo, $registro->fecha, $registro->contenido);
        }
        return $articulos;
    }
    public static function getArticuloById($id)
    {
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT * FROM articulos WHERE codigo='$id'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $articulo = new Articulos($registro->codigo, $registro->titulo,$registro->categoria, $registro->fecha, $registro->contenido, $registro->likes);
        return $articulo;
    }

    public static function obtenerArticulos($titulo = "", $likes = ""){
        $conexion = BlogDB::connectDB();
        $query = "";
        if($titulo == "" && $likes == ""){
            $query = "SELECT * FROM articulos WHERE categoria='normal'";
        }
        else if ($titulo != "" and $likes == ""){
            $query = "SELECT * FROM articulos WHERE categoria='normal' and titulo LIKE '%$titulo%'";
        }
        else if ($titulo == "" and $likes != ""){
            $query = "SELECT * FROM articulos WHERE categoria='normal' and likes >= $likes";
        }
        else{
            $query = "SELECT * FROM articulos WHERE categoria='normal' and titulo LIKE '%$titulo%' and likes >= $likes";
        }
        $consulta = $conexion->query($query);
        if($consulta -> rowCount() > 0){
            while($registro = $consulta->fetchObject()){
                $listado[] = new Articulos($registro->codigo, $registro->titulo,$registro->categoria, $registro->fecha, $registro->contenido, $registro->likes);
            }
            return $listado;
        }
        else{
            return false;
        }
    }

    public static function obtenerArticulosPremium($texto){
        $conexion = BlogDB::connectDB();
        $query = "SELECT * FROM articulos WHERE categoria = 'premium' and titulo LIKE '%$texto%'";
        $consulta = $conexion->query($query);
        $listado = [];
        while($registro = $consulta->fetchObject()){
            $listado[] = new Articulos($registro->codigo, $registro->titulo,$registro->categoria, $registro->fecha, $registro->contenido, $registro->likes);
        }
        return $listado;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
        return $this;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }
    public function getContenido()
    {
        return $this->contenido;
    }
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
        return $this;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function getLikes()
    {
        return $this->likes;
    }
}
