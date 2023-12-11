<?php
class Comment {
    
    public function countcom(){
        $db = new connect();
        $sql = "SELECT COUNT(commentID) AS countcom FROM comment";
        $result = $db->pdo_execute($sql);
        return $result;
    }
}
