<?php 

require_once(__DIR__ . '/../config/pdo.php');

class Categoria extends Conectar {
    
    private $categoriaId;
    private $nombreCategoria;
    private $fechaCreacionCategoria;
    private $fechaActualizacionCategoria;

    public function __construct($categoriaId = 0, $nombreCategoria = "", $fechaCreacionCategoria = "", $fechaActualizacionCategoria = "") {
        $this->categoriaId = $categoriaId;
        $this->nombreCategoria = $nombreCategoria;
        $this->fechaCreacionCategoria = $fechaCreacionCategoria;
        $this->fechaActualizacionCategoria = $fechaActualizacionCategoria;
        parent::__construct();
    }

    //getters
    public function getCategoriaId(){
        return $this->categoriaId;
    }

    public function getNombreCategoria(){
        return $this->nombreCategoria;
    }

    public function getFechaCreacionCategoria(){
        return $this->fechaCreacionCategoria;
    }

    public function getFechaActualizacionCategoria(){
        return $this->fechaActualizacionCategoria;
    }

    //setters
    public function setCategoriaId($categoriaId){
        $this->categoriaId = $categoriaId;
    }

    public function setNombreCategoria($nombreCategoria){
        $this->nombreCategoria = $nombreCategoria;
    }

    public function setFechaCreacionCategoria($fechaCreacionCategoria){
        $this->fechaCreacionCategoria = $fechaCreacionCategoria;
    }

    public function setFechaActualizacionCategoria($fechaActualizacionCategoria){
        $this->fechaActualizacionCategoria = $fechaActualizacionCategoria;
    }

    //GET
    public function obtenerCategorias(){
        try {
            $stm = $this->db->prepare("SELECT * FROM Category");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    //GET ONE
    public function obtenerUnaCategoria(){
        try {
            $stm = $this->db->prepare("SELECT * FROM Category WHERE id = ?");
            $stm->execute([$this->categoriaId]);
            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    //POST
    public function insertarCategorias(){
        try {
            $stm = $this->db->prepare("INSERT INTO Category(name, createdAt, updatedAt ) VALUES (?, ?, ?)");
            $stm->execute([$this->nombreCategoria, $this->fechaCreacionCategoria, $this->fechaActualizacionCategoria]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    //DELETE
    public function borrarCategorias(){
        try {
            $stm = $this->db->prepare("DELETE FROM Category WHERE id = ?");
            $stm->execute([$this->categoriaId]);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    //UPDATE
    public function editarCategorias(){
        try {
            $stm = $this->db->prepare("UPDATE Category SET name = ?, createdAt = ?, updatedAt = ? WHERE id = ?"); // Corregido 'empleadoId' a 'id'
            $stm->execute([$this->nombreCategoria, $this->fechaCreacionCategoria, $this->fechaActualizacionCategoria, $this->categoriaId]);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}   


