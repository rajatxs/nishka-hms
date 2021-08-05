<?php
require_once "../lib/pdo.php";

class District
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    /**
     * @return array
     */
    public function find()
    {
        $query = "SELECT * FROM dist_master;";

        $this->db->query($query);

        return $this->db->resultset();
    }

    /**
     * @param state_id - State id
     * @return array
     */
    public function find_by_state($state_id)
    {
        $query = "SELECT * FROM dist_master WHERE sid = '$state_id' ORDER BY district;";

        $this->db->query($query);

        return $this->db->resultset();
    }

    public function create($data)
    {
        $query = "INSERT INTO dist_master(sid, district)
                    VALUES (:sid, :district)";

        $this->db->query($query);

        $this->db->bind('sid', $data['sid']);
        $this->db->bind('district', $data['district']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param integer $id - district id
     * @return object
     */
    public function remove($id)
    {
        $query = "DELETE FROM dist_master WHERE id= :id;";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        $affected_rows = $this->db->row_count();

        return ($affected_rows > 0) ? true : false;
    }

    /**
     * @param integer $sid - State sid
     * @return object
     */
    public function remove_by_state($sid)
    {
        $query = "DELETE FROM dist_master WHERE sid= :sid;";

        $this->db->query($query);
        $this->db->bind('sid', $sid);

        $this->db->execute();

        $affected_rows = $this->db->row_count();

        return ($affected_rows > 0) ? true : false;
    }
}
