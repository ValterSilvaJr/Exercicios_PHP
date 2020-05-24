<?php
    namespace App\Model;

    class UsuarioDAO {

        // public static $instance;
    
        // public static function getInstance() {
        //     if(!isset(self::$instance)) {
        //         self::$instance = new UsuarioDAO();

        //         return self::$instance;
        //     }
        // }

        public function Inserir(PojoUsuario $usuario) {
            try {
                $sqlCommand = "INSERT INTO tblusuario (
                    nome_tblusuario, 
                    email_tblusuario, 
                    senha_tblusuario) 
                    VALUES (
                        :nome, 
                        :email, 
                        :senha)";

                $p_sql = Conexao::getInstance() -> prepare($sqlCommand);

                $p_sql -> bindValue(":nome", $usuario -> getNome());
                $p_sql -> bindValue(":email", $usuario -> getEmail());
                $p_sql -> bindValue(":senha", $usuario -> getSenha());

                $p_sql -> execute();

            } catch (\PDOException $err) {
                echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.<br>";
                echo "Código do erro: " . $err -> getMessage();

                //TODO retorno dos possíveis erros
                switch($err -> getCode()) {
                    case '23000':
                        echo "Email já cadastrado no sistema";
                    break;
                }
            }
        }

        public function Editar(PojoUsuario $usuario) {
            try {
                $sqlCommand = "UPDATE tblusuario 
                SET 
                nome_tblusuario = :nome,
                email_tblusuario = :email,
                senha_tblusuario = :senha
                WHERE 
                id_tblusuario = :id_usuario";

                $p_sql = Conexao::getInstance() -> prepare($sqlCommand);

                $p_sql -> bindValue(":nome", $usuario -> getNome());
                $p_sql -> bindValue(":email", $usuario -> getEmail());
                $p_sql -> bindValue(":senha", $usuario -> getSenha());
                $p_sql -> bindValue(":id_usuario", $usuario -> getId());

                $p_sql -> execute();

            } catch(\PDOException $err) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
                print "Código do erro: " . $err -> getMessage();

                //TODO retorno dos possíveis erros
                switch($err -> getCode()){
                    case '23000':
                        echo "E-mail já cadastrado no sistema";
                    break;
                }
            }
        }

        public function Deletar(PojoUsuario $usuario) {
            try {
                $sqlCommand = "DELETE FROM tblusuario WHERE id_tblusuario = :id_usuario";
                $p_sql = Conexao::getInstance() -> prepare($sqlCommand);
                $p_sql -> bindValue(":id_usuario", $usuario -> getId());

                $p_sql -> execute();

            } catch(\PDOException $err) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
                print "Código do erro: " . $err -> getMessage();

                //TODO retorno dos possíveis erros
                switch($err -> getCode()){
                    case '23000':
                        echo "Usuario não encontrado no Sistema";
                        break;
                }
            }
        }

        public function Buscar(PojoUsuario $usuario) {
            try {
                $sqlCommand = "SELECT * FROM tblusuario WHERE id_tblusuario = :id_usuario";
                $p_sql = Conexao::getInstance() -> prepare($sqlCommand);
                $p_sql -> bindValue(":id_usuario", $usuario -> getId());
                $p_sql -> execute();

                if($p_sql -> rowCount() > 0){
                    $result [] = $p_sql -> fetch(\PDO::FETCH_ASSOC);
                    return $result;
                }
                else{
                    return [];
                }

            } catch(\PDOException $err) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
                print "Código do erro: " . $err -> getMessage();

                //TODO retorno dos possíveis erros
                switch($err -> getCode()){
                    case '23000':
                        echo "Usuario não encontrado no sistema!";
                        break;
                }
            }
        }

        /*
        public function PopulaUsuario($usuario) {

            foreach($usuario as $value) {
                $dados = [
                    $value['nome_tblusuario'],
                    $value['email_tblusuario'],
                    $value['senha_tblusuario']
                ];
            }
            echo $dados[1];
            $pojo = new PojoUsuario;
            $usuario['id_tblusuario'] -> setId($usuario['id_tblusuario']);
            $usuario -> setNome($usuario['nome_tblusuario']);
            $usuario -> setEmail($usuario['email_tblusuario']);
            $usuario -> setSenha($usuario['senha_tblusuario']);

            return $dados;
        }
        */
    }
?>