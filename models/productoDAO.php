<?php
class ProductoDAO {
    private $con_db;

    // Constructor
    public function __construct(){
        $this->con_db = Database::connect();
    }

    // Método para insertar un nuevo producto
    // Método para insertar un nuevo producto
    public function insertarProducto($nombre, $precio, $stock, $categoria, $descripcion, $descripcion_larga) {
        $query = "INSERT INTO producto (nombre, precio, stock, categoria, descripcion, descripcion_larga) VALUES (:nombre, :precio, :stock, :categoria, :descripcion, :descripcion_larga)";
        $stmt = $this->con_db->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $precio, PDO::PARAM_INT);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion_larga', $descripcion_larga, PDO::PARAM_STR);


        if ($stmt->execute()) {
            return true; // Producto insertado correctamente
        } else {
            return false; // Error al insertar producto
        }
    }

    // Método para obtener todos los productos
    public function getAllProductos() {
        $query = "SELECT * FROM producto";
        $stmt = $this->con_db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener un producto por su ID
    public function getProductoById($idProducto) {
        $query = "SELECT * FROM producto WHERE id_producto = :idProducto";
        $stmt = $this->con_db->prepare($query);
        $stmt->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);;
    }

    // Método para actualizar un producto por su ID
    public function actualizarProductoPorId($idProducto, $nombre, $precio, $stock, $categoria, $descripcion, $descripcion_larga) {
        $query = "UPDATE producto SET nombre = :nombre, precio = :precio, stock = :stock categoria = :categoria descripcion = :descripcion descripcion_larga = :descripcion_larga WHERE id_producto = :idProducto";
        $stmt = $this->con_db->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $precio, PDO::PARAM_INT);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        $stmt->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion_larga, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            return true; // Producto actualizado correctamente
        } else {
            return false; // Error al actualizar producto
        }
    }

    // Método para eliminar un producto por su ID
    public function eliminarProductoPorId($idProducto) {
        $query = "DELETE FROM producto WHERE id_producto = :idProducto";
        $stmt = $this->con_db->prepare($query);
        $stmt->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true; // Producto eliminado correctamente
        } else {
            return false; // Error al eliminar producto
        }
    }

    public function getAllCategorias() {
        // Realizamos la consulta para obtener todas las categorías
        $query = "SELECT DISTINCT categoria FROM producto";
        $stmt = $this->con_db->prepare($query);

        // Ejecutamos la consulta
        $stmt->execute();

        // Recogemos todas las categorías
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Devolvemos las categorías
        return $categorias;
    }
}
?>
