<?php
class Chamado
{

    private $conn;
    public function __construct($dbConection)
    {
        $this->conn = $dbConection;
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT 
            c.id,
            c.titulo,
            c.descricao,
            c.categoria as categoria_id,
            c.preco,
            cat.categoria,
            u.nome
            FROM chamados c
            LEFT JOIN categoria cat ON c.categoria = cat.id
            LEFT JOIN user u ON c.idUser = u.id WHERE c.id = ?";

        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt)
            return false;

        mysqli_stmt_bind_param($stmt, 'i', $id);

        mysqli_stmt_execute($stmt);

        $resul = mysqli_stmt_get_result($stmt);

        $chamados = mysqli_fetch_assoc($resul);

        mysqli_stmt_close($stmt);

        return $chamados;
    }

    public function buscarTodos()
    {
        $sql = "SELECT chamados.*, categoria.categoria, user.nome FROM chamados 
                JOIN user ON chamados.idUser = user.id
                JOIN categoria ON chamados.categoria = categoria.id
                ";

        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt)
            return [];

        mysqli_stmt_execute($stmt);

        $resul = mysqli_stmt_get_result($stmt);

        $chamados = [];

        while ($chamado = mysqli_fetch_assoc($resul)) {
            $chamados[] = $chamado;
        }

        mysqli_stmt_close($stmt);

        return $chamados;
    }

    public function abrirChamado($titulo, $categoria, $descricao, $userId)
    {
        $sql = 'INSERT INTO chamados (titulo, categoria, descricao, idUser) VALUES(?, ?, ?, ?)';

        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt)
            return false;

        mysqli_stmt_bind_param($stmt, 'sisi', $titulo, $categoria, $descricao, $userId);

        $resul = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return $resul;
    }

    public function atualizaChamado($titulo, $categoria, $descricao, $preco, $id)
    {

        $sql = 'UPDATE chamados SET titulo = ?, categoria = ?, descricao = ?, preco = ? WHERE id = ?';

        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt)
            return false;

        mysqli_stmt_bind_param($stmt, 'sisss', $titulo, $categoria, $descricao, $preco, $id);

        $resul = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return $resul;
    }

    public function excluirChamado($id)
    {
        $sql = 'DELETE FROM chamados WHERE id = ?';

        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt)
            return false;

        mysqli_stmt_bind_param($stmt, 'i', $id);

        $resul = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return $resul;
    }
}