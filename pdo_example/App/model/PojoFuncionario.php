<?php
    namespace App\Model;

    class PojoFuncionario extends PojoUsuario {
        private $cargo;
        private $dataAdmissao;
        private $salario;
        private $setor;

        public function getCargo() {
            return $this -> cargo;
        }

        public function setCargo($cargo) {
            $this -> cargo = $cargo; 
        }

        public function getDataAdmissao(){
            return $this -> dataAdmissao;
        }

        public function setDataAdmissao(){
            $this -> dataAdmissao = $dataAdmissao;
        }

        public function getSalario(){
            return $this -> salario;
        }

        public function setSalario(){
            $this -> salario = $salario;
        }

        public function getSetor(){
            return $this -> setor;
        }

        public function setSetor(){
            $this -> setor = $setor;
        }
    }
?>