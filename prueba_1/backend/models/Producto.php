<?php 

require_once(__DIR__ . '/../config/pdo.php');

class Producto extends Conectar{
    
    private $productoId;
    private $codigoProducto;
    private $nombreProducto;
    private $categoria_id;
    private $precioProducto;
    private $createdAtProducto;
    private $updatedAtProducto;

    public function __construct($productoId = 0, $codigoProducto = "", $nombreProducto = "", $categoria_id = 0, $precioProducto = 0.0, $createdAtProducto = "", $updatedAtProducto = ""){
        $this->productoId = $productoId;
        $this->codigoProducto = $codigoProducto;
        $this->nombreProducto = $nombreProducto;
        $this->categoria_id = $categoria_id;
        $this->precioProducto = $precioProducto;
        $this->createdAtProducto = $createdAtProducto;
        $this->updatedAtProducto = $updatedAtProducto;
        parent::__construct();
    }

    //getters
    public function getProductoId(){
        return $this->productoId;
    }

    public function getCodigoProducto(){
        return $this->codigoProducto;
    }

    public function getNombreProducto(){
        return $this->nombreProducto;
    }

    public function getCategoria_id(){
        return $this->categoria_id;
    }

    public function getPrecioProducto(){
        return $this->precioProducto;
    }

    public function getCreatedAtProducto(){
        return $this->createdAtProducto;
    }

    public function getUpdatedAtProducto(){
        return $this->updatedAtProducto;
    }

    //setters
    public function setProductoId($productoId){
        $this->productoId = $productoId;
    }

    public function setCodigoProducto($codigoProducto){
        $this->codigoProducto = $codigoProducto;
    }

    public function setNombreProducto($nombreProducto){
        $this->nombreProducto = $nombreProducto;
    }

    public function setCategoria_id($categoria_id){
        $this->categoria_id = $categoria_id;
    }

    public function setPrecioProducto($precioProducto){
        $this->precioProducto = $precioProducto;
    }

    public function setCreatedAtProducto($createdAtProducto){
        $this->createdAtProducto = $createdAtProducto;
    }

    public function setUpdatedAtProducto($updatedAtProducto){
        $this->updatedAtProducto = $updatedAtProducto;
    }

   //GET
   public function obtenerProductos(){
    try {
        $stm = $this->db->prepare("SELECT * FROM Product");
        $stm->execute();
        return $stm->fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }
    }

    //GET ONE
    public function obtenerUnProducto(){
        try {
            $stm = $this->db->prepare("SELECT * FROM Product WHERE id = ?");
            $stm->execute([$this->productoId]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    //POST
    public function insertarProducto() {
        try {
            $stm = $this->db->prepare("INSERT INTO Product(code, name, category_id, price, createdAt, updatedAt) VALUES (?, ?, ?, ?, ?, ?)");
            $stm->execute([$this->codigoProducto, $this->nombreProducto, $this->categoria_id, $this->precioProducto, $this->createdAtProducto, $this->updatedAtProducto]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

        //DELETE
        public function borrarProducto (){
            try {
                $stm = $this->db->prepare("DELETE FROM Product WHERE id = ?");
                $stm->execute([$this->productoId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

    //UPDATE
    public function editarProducto(){
        try {
            $stm = $this->db->prepare("UPDATE Product SET code = ?, name = ?, category_id = ?, price = ?, createdAt = ?, updatedAt = ? WHERE id = ?");
            $stm->execute([$this->codigoProducto, $this->nombreProducto, $this->categoria_id, $this->precioProducto, $this->createdAtProducto, $this->updatedAtProducto, $this->productoId]);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}