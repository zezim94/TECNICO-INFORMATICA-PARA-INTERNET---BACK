<?php
class Categoria
{
    private $conn;

    public function __construct($dbConection)
    {
        $this->conn = $dbConection;
    }

    public function buscarCategoriaPorId($id)
    {
        $sql = "SELECT * FROM categoria WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $resul = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($resul); // Retorna array ou null/false
    }

    public function buscarTodasCategorias()
    {
        $sql = 'SELECT * FROM categoria ORDER BY categoria';

        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt)
            return [];

        mysqli_stmt_execute($stmt);

        $resul = mysqli_stmt_get_result($stmt);

        $categorias = [];

        while ($categoria = mysqli_fetch_assoc($resul)) {

            $categorias[] = $categoria;

        }

        mysqli_stmt_close($stmt);

        return $categorias;
    }

    public function novaCategoria($categoria)
    {

        $sql = 'INSERT INTO categoria (categoria) VALUES(?)';

        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt)
            return false;

        mysqli_stmt_bind_param($stmt, 's', $categoria);

        $resul = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return $resul;

    }

    public function excluirCategoria($id)
    {
        $sql = 'DELETE FROM categoria WHERE id = ?';

        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt)
            return false;

        mysqli_stmt_bind_param($stmt, 'i', $id);

        $resul = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return $resul;
    }

    public function editarCategoria($id, $categoria)
    {
        $sql = 'UPDATE categoria SET categoria = ? WHERE id = ?';

        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt)
            return false;

        mysqli_stmt_bind_param($stmt, 'si', $categoria, $id);

        $resul = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return $resul;
    }
}