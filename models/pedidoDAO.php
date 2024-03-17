<?php
class PedidoDAO {
    private $con_db;

    // Constructor
    public function __construct(){
        $this->con_db = Database::connect();
    }

    // Método para insertar un nuevo pedido
    public function insertarPedido($idUsuario) {
        $query = "INSERT INTO pedido (id_usuario) VALUES (:idUsuario)";
        $stmt = $this->con_db->prepare($query);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true; // Pedido insertado correctamente
        } else {
            return false; // Error al insertar pedido
        }
    }

    // Método para obtener todos los pedidos
    public function getAllPedidos() {
        $query = "SELECT * FROM pedido";
        $stmt = $this->con_db->prepare($query);
        $stmt->execute();

        return $$stmt->fetchAll();
    }

    // Método para obtener un pedido por su ID
    public function getPedidoById($idPedido) {
        $query = "SELECT * FROM pedido WHERE id_pedido = :idPedido";
        $stmt = $this->con_db->prepare($query);
        $stmt->bindParam(':idPedido', $idPedido, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);;
    }

    // Método para eliminar un pedido por su ID
    public function eliminarPedidoPorId($idPedido) {
        $query = "DELETE FROM pedido WHERE id_pedido = :idPedido";
        $stmt = $this->con_db->prepare($query);
        $stmt->bindParam(':idPedido', $idPedido, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true; // Pedido eliminado correctamente
        } else {
            return false; // Error al eliminar pedido
        }
    }

    public function actualizarPedidoPorId($idPedido, $fecha, $idUsuario) {
        $query = "UPDATE pedido SET id_usuario = :idUsuario, fecha = :fecha, WHERE id_pedido = :idPedido";
        $stmt = $this->con_db->prepare($query);
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->bindParam(':idPedido', $idPedido, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return true; // Pedido actualizado correctamente
        } else {
            return false; // Error al actualizar pedido
        }
    }
}
?>
