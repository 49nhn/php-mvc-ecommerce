<?php
class Category extends Model {

    private $table = "categories";

    public function getMenu($display){
        try{
            $sql = "SELECT * FROM $this->table WHERE display = $display";
            $result = $this->db->query($sql);
            $data = [];
            $i = 0;
            //kiểm có dữ liệu không
            if($result->num_rows > 0){
                //xuất dữ liệu từng dòng vào biến row
                while($row = $result->fetch_assoc()){
                    //Gán dữ liệu vào mảng data
                    $data[$i++] =  $row;
                }
            }
            return $data;
        }
        catch (Exception $e){
            return $e;
        }
    }

    public function getidCategory($s){
        try{
            $sql = "SELECT * FROM $this->table WHERE $s";
            $result = $this->db->query($sql);
            //kiểm có dữ liệu không
            if($result->num_rows > 0){
                //xuất dữ liệu từng dòng vào biến row
                while($row = $result->fetch_assoc()){
                    return $row['id'];
                }
            }
        }
        catch (Exception $e){
            return $e;
        }
    }
    public function getCategoryById($id){
        try{
            $sql = "SELECT * FROM $this->table WHERE id = $id";
            $result = $this->db->query($sql);
            //kiểm có dữ liệu không
            if($result->num_rows > 0){
                //xuất dữ liệu từng dòng vào biến row
                while($row = $result->fetch_assoc()){
                    return $row;
                }
            }
        }
        catch (Exception $e){
            return $e;
        }
    }
}