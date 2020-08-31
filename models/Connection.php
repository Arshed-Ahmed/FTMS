<?php
class Connection {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "ftms";
    private $con;
    
    function __construct() {
        $this->con = $this->db_con();
    }   
    
    function db_con() {
        $con = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        return $con;
    }
    
    function runBaseQuery($query) {
        $result = $this->con->query($query);   
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        return $resultset;
    }
    
    
    
    function runQuery($query, $param_type, $param_value_array) {
        $sql = $this->con->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $result = $sql->get_result();
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        
        if(!empty($resultset)) {
            return $resultset;
        }
    }
    
    function bindQueryParams($sql, $param_type, $param_value_array) {
        $param_value_reference[] = & $param_type;
        for($i=0; $i<count($param_value_array); $i++) {
            $param_value_reference[] = & $param_value_array[$i];
        }
        call_user_func_array(array(
            $sql,
            'bind_param'
        ), $param_value_reference);
    }
    
    function insert($query, $param_type, $param_value_array) {
        $sql = $this->con->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $insertId = $sql->insert_id;
        return $insertId;
    }
    
    function update($query, $param_type, $param_value_array) {
        $sql = $this->con->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
    }
}
?>