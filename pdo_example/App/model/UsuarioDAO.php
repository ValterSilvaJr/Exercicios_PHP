<?php
    namespace App\Model;

    // require_once "PojoUsuario.php";
    // require_once "Conexao.php";

    class UsuarioDAO {

        public static $instance;
        
        // private function __construct() {
            
        //     //
        // }

        public static function getInstance() {
            if(!isset(self::$instance)) {
                self::$instance = new UsuarioDAO();

                return self::$instance;
            }
        }

        public function Inserir(PojoUsuario $usuario) {
            try {
                $sql = "INSERT INTO tblusuario (
                    nome_tblusuario, 
                    email_tblusuario, 
                    senha_tblusuario) 
                    VALUES (
                        :nome, 
                        :email, 
                        :senha)";

                $p_sql = Conexao::getInstance() -> prepare($sql);

                $p_sql -> bindValue(":nome", $usuario -> getNome());
                $p_sql -> bindValue(":email", $usuario -> getEmail());
                $p_sql -> bindValue(":senha", $usuario -> getSenha());

                return $p_sql -> execute();

            } catch (\PDOException $err) {
                echo "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.<br>";
                echo "Código do erro: " . $err -> getMessage();
                echo "<br><br>";

                switch($err -> getCode()) {
                    case '23000':
                        echo "Email já cadastrado no sistema";
                }
            }
        }

        public function Editar(PojoUsuario $usuario) {
            try {
                $sql = "UPDATE tblusuario 
                SET 
                nome_tblusuario = :nome,
                email_tblusuario = :email
                senha_tblusuario = :senha
                WHERE id_tblusuario = :id_usuario";

                $p_sql = Conexao::getInstance() -> prepare($sql);

                $p_sql -> bindValue(":id_usuario", $usuario -> getId());
                $p_sql -> bindValue(":nome", $usuario -> getNome());
                $p_sql -> bindValue(":email", $usuario -> getEmail());
                $p_sql -> bindValue(":senha", $usuario -> getSenha());

                return $p_sql -> execute();

            } catch(Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
                print "Código do erro: $e";
            }
        }

        public function Deletar($id) {
            try {
                $sql = "DELETE FROM tblusuario WHERE id_tblusuario = :id";
                $p_sql = Conexao::getInstance() -> prepare($sql);
                $p_sql -> bindValue(":id", $id);

                return $p_sql -> execute();

            } catch(Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
                print "Código do erro: $e";
            }
        }

        public function BuscarPorCod($id) {
            try {
                $sql = "SELECT * FROM tblusuario WHERE id_tblusuario = :id";
                $p_sql = Conexao::getInstance() -> prepare($sql);
                $p_sql -> bindValue(":id", $id);
                $p_sql -> execute();
                return $this -> populaUsuario($p_sql -> fetch(PDO::FETCH_ASSOC));

            } catch(Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
                print "Código do erro: $e";
            }
        }

        public function populaUsuario($row) {
            $pojo = new PojoUsuario;
            $pojo -> setId($row['id_usuario']);
            $pojo -> setNome($row['nome']);
            $pojo -> setEmail($row['email']);
            $pojo -> setSenha($row['senha']);

            return $pojo;
        }
    }
?>