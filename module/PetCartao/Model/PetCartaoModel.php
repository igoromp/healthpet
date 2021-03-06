<?php

/**
 * Created by PhpStorm.
 * User: GORILLA
 * Date: 14/11/2017
 * Time: 14:42
 */
class PetCartaoModel extends Model
{
    protected $table = 'pet_cartao';

    public function All(){
        return $this->buscarAllModel($this->table);
    }
    public function salvar($data){

        if(array_key_exists('id_pet_cartao',$data)){
            $id['id_pet_cartao'] = $data['id_pet_cartao'];
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
    public function where($post, $return = null,$option=null)
    {
        $result = parent::where($this->table, $post, $return,$option); // TODO: Change the autogenerated stub
        return $result;
    }

    public function getById($id){

        return parent::buscarModel($this->table,$id);
    }
}