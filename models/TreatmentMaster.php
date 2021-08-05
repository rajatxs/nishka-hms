<?php
require_once "../lib/pdo.php";

class TreatmentMaster
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
        $query = "SELECT * FROM treatment_master;";

        $this->db->query($query);

        return $this->db->resultset();
    }

    /**
     * @param d_id - Department ID
     * @return array
     */
    public function find_with_department()
    {
        $query = "SELECT t.id, t.treatment, d.dept
                        FROM treatment_master t, department_master d
                        WHERE t.d_id=d.id";

        $this->db->query($query);

        return $this->db->resultset();
    }

    public function find_by_doctor()
    {
        $query = "SELECT t.id, t.treatment, d.dept
                        FROM treatment_master t, department_master d
                        WHERE t.d_id=d.id";

        $this->db->query($query);

        return $this->db->resultset();
    }

    public function create($data)
    {
        $query = "INSERT INTO treatment_master(treatment, d_id)
                    VALUES (:treatment, :d_id)";

        $this->db->query($query);

        $this->db->bind('treatment', $data['treatment']);
        $this->db->bind('d_id', $data['d_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param integer $id - Treatment id
     * @return object
     */
    public function remove_byid($id)
    {
        $query = "DELETE FROM treatment_master WHERE id= :id;";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        $affected_rows = $this->db->row_count();

        return ($affected_rows > 0) ? true : false;
    }

    /**
     * @param integer $d_id - Department d_id
     * @return object
     */
    public function remove_byd_id($d_id)
    {
        $query = "DELETE FROM treatment_master WHERE d_id= :d_id;";

        $this->db->query($query);
        $this->db->bind('d_id', $d_id);

        $this->db->execute();

        $affected_rows = $this->db->row_count();

        return ($affected_rows > 0) ? true : false;
    }
}
