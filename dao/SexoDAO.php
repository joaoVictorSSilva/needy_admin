


<?php 

    require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR."global.php";

    class SexoDAO{


        public function getAll(){

            $conn = DB::getConn();

            $sql = "SELECT * FROM tbsexo";

            $pstm = $conn->prepare($sql);

            $pstm->execute();
            return $pstm->fetchAll();

        }

        public function verificaExistenciaPeloId($id){

            $conn = DB::getConn();
            $sql = "SELECT * FROM tbsexo WHERE idSexo = ?";

            $pstm = $conn->prepare($sql);

            $pstm->bindValue(1, $id);

            $pstm->execute();

            return ( count($pstm->fetchAll()) > 0 ) ? true : false;
        }

    }



?>