
<?php
require_once("Connection.php");
class BackupModel
{

    private $db_handle;
    private $table = 'backup';

    function __construct()
    {
        $this->db_handle = new Connection();
    }



    function Backup()
    {
        // $filename = 'db_backup_' . date('G_a_m_d_y') . '.sql';

        // $query = "mysqldump ftms --password='' --user=root --single-transaction > '.$filename'";
        
        $backup_file = 'ftms' . date("Y-m-d-H-i-s") . '.gz';
        $command = "mysqldump --opt -h localhost -u root -p  ". "ftms | gzip > $backup_file";

        $back = system($command);

        // $insertId = $this->db_handle->runBaseQuery($query);
        return $back;
    }

    function addBackup($timeDate)
    {
        $query = "INSERT INTO $this->table (timeDate) VALUES ( ? )";
        $paramType = "s";
        $paramValue = array(
            $timeDate,
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }

    function getBackupById($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getAllBackup()
    {
        $sql = "SELECT * FROM $this->table ORDER BY id";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
