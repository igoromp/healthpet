<?php

/**
 * Created by PhpStorm.
 * User: GORILLA
 * Date: 19/10/2017
 * Time: 14:56
 */
class UsuarioModel extends  \Model
{
    protected $table = 'usuario';

    public function All(){
        return $this->buscarAllModel($this->table);
    }
    public function salvar($data){

        if(array_key_exists('id_usuario',$data)){
            $id['id_usuario'] = $data['id_usuario'];
            return $this->update($data,$id);
        }else{
            return $this->inserir($data);
        }
    }

    public function exclui($post)
    {
        return parent::excluirModel($this->table, $post); // TODO: Change the autogenerated stub
    }

    private function inserir($data){
        return parent::gravarModel($this->table,$data);
    }

    private function update($data,$id){

        return parent::alterarModel($this->table,$data,$id);
    }
    public function filtrar($post)
    {
        return parent::filtrar($this->table, $post); // TODO: Change the autogenerated stub
    }
    public function like($post,$return = null,$like="?%"){
        return parent::buscarTermModel($this->table,$post,$like);
    }
    public function getNomeUsuarioById($post,$return){
        $result = parent::where($this->table,$post,$return);
        return $result['nm_usuario'];
    }
    public function getUsuarioByEmail($post,$return =null){
        $result = parent::where($this->table,$post,$return);
        return $result;
    }

    public function getById($id){

        return parent::buscarModel($this->table,$id);
    }
}