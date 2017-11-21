<?php

/**
 * Created by PhpStorm.
 * User: GORILLA
 * Date: 24/10/2017
 * Time: 01:43
 */
class EspecieModel extends Model
{
    protected $table = 'especie';

    public function salvar($data){

        if(array_key_exists('id_especie',$data)){
            $id['id_especie'] = $data['id_especie'];

            return $this->update($data,$id);
        }else{
            return $this->inserir($data);
        }
    }

    public function All(){
        return parent::buscarAllModel($this->table);
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

    public function getById($id){
        return parent::buscarModel($this->table,$id);
    }

    public function getNomeEspecieById($post, $return = null)
    {
        $result = parent::where($this->table, $post, $return); // TODO: Change the autogenerated stub
        return $result;
    }
    public function where($post, $return = null, $option = null)
    {
        return parent::where($this->table, $post, $return, $option); // TODO: Change the autogenerated stub
    }

    public function getEspecies(){
        return parent::buscarColumsModel($this->table,['nm_especie' =>'nm_especie','id_especie'=>'id_especie']) ;
    }

}