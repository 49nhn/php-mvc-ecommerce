<?php
require_once ('Lib/db.php');
class Banner extends Model{
    private $banner='banner';

    public function getBanner(){
        $sql = "SELECT * FROM $this->banner";
        $result = $this->db->query($sql);
        $data = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[]=$row;
            }
        }
        return $data;
    }
}