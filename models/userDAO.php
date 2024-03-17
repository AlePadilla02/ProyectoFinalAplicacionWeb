<?php
include ('views/view.php');
include ('Database/database.php');

class UserDAO{
    private $con_db;

    public function __construct() {
        $this->con_db = Database::connect();

        // Aquí puedes hacer lo que necesites con los parámetros
        // Por ejemplo, guardarlos en la base de datos o realizar alguna otra operación
    }

    public function insertarUsuario($nombre, $email, $contrasena, $rol = "usuario") {
        $query = "INSERT INTO usuario (nombre, email, contrasena, rol) VALUES (:nombre, :email, :contrasena, :rol)";
        $stmt = $this->con_db->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
        $stmt->bindParam(':rol', $rol, PDO::PARAM_STR);
    
        if ($stmt->execute()) {
            return true;
        } else {
            // Manejar el error de inserción de alguna manera
            return false;
        }
    }
    
    public function eliminarUsuarioPorId($idUsuario) {
        $query = "DELETE FROM usuario WHERE id_usuario = :id";
        $stmt = $this->con_db->prepare($query);
        $stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return true; // Se eliminó el usuario exitosamente
        } else {
            // Manejar el error de eliminación de alguna manera
            return false; // Error al eliminar el usuario
        }
    }


    public function getAllUsers(){
        try {
            $stmt = $this->con_db->prepare("SELECT * FROM usuario");
            $stmt->execute();

            return $stmt->fetchAll();

        } catch (PDOException $e){
            // Aquí podrías lanzar una excepción o registrar el error
            return -1;  
        }
    }

    public function getUser($username){
        try {
            $stmt = $this->con_db->prepare("SELECT * FROM usuario WHERE nombre = :usuario");
            $stmt->bindValue(':usuario', $username);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);

            if($result) {
                return $result;
            } else {
                $error="(No se encontró ningún usuario con el nombre: $username)";
                return $error;
            }
        } catch (PDOException $e){
            // Aquí podrías lanzar una excepción o registrar el error
            return -1;  
        }
    }

    public function actualizarUsuarioPorId($idUsuario, $nombre, $email, $contrasena, $rol = "usuario") {
        $query = "UPDATE usuario SET nombre = :nombre, email = :email, contrasena = :contrasena, rol = :rol WHERE id_usuario = :id";
        $stmt = $this->con_db->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
        $stmt->bindParam(':rol', $rol, PDO::PARAM_STR);
        $stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return true; // Usuario actualizado correctamente
        } else {
            return false; // Error al actualizar usuario
        }
    }
}
?>