<?php

class model_Categories extends Model
{
    const TABLE_NAME = 'Categories';

    public $category_id = 0;
    public $category_name = '';


     static public function getAllCat()
    {

        $conn=Db2::getDB();
        $query="SElECT * from Categories";
        $conn=$conn->select($query);
        return $conn;
       /* $sth = Db::getInst()->prepare('SELECT * FROM ' . self::TABLE_NAME);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'model_Categories');
        $sth->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_CLASS);*/
    }

    static public function getById($category_id){
        /*if ($this->category_id < 1)
            return false;*/
        $conn=DB2::getDB();
        $query="select * from products where product_category_id=".$category_id;
        $conn=$conn->select($query);
        return $conn;
    }

}