<?php
require_once "../lib/pdo.php";

class PatientCredential
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
        $query = "SELECT * FROM patient_cred;";

        $this->db->query($query);

        return $this->db->resultset();
    }

    public function find_username($uname)
    {
        $query = "SELECT u_name FROM patient_cred
                        WHERE u_name='$uname';";

        $this->db->query($query);

        return $this->db->resultset();
    }

    /**
     * @param user_name - User name
     * @return array
     */
    public function find_by_uname($user_name)
    {
        $query = "SELECT * FROM patient_cred
                    WHERE u_name = '$user_name'";

        $this->db->query($query);

        return $this->db->resultset();
    }

    /**
     * @param user_name - User name and password
     * @param password - Password
     * @return array
     */
    public function find_by_uname_password($user_name, $password)
    {
        $query = "SELECT * FROM patient_cred
                    WHERE u_name = '$user_name' AND password = '$password";

        $this->db->query($query);

        return $this->db->resultset();
    }

    public function create($data)
    {
        $query = "INSERT INTO patient_cred(u_name, password) VALUES (:u_name, :password)";

        $password = $data['password'];

        // encrypt password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $this->db->query($query);

        $this->db->bind('u_name', $data['u_name']);
        $this->db->bind('password', $hash);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {
        $query = "UPDATE patient_cred
                        SET u_name= :u_name, password= :password
                        WHERE u_name= :u_name";

        $password = $data['password'];

        // encrypt password
        // $hash = password_hash($password, PASSWORD_DEFAULT);

        $this->db->query($query);

        $this->db->bind('u_name', $data['u_name']);
        $this->db->bind('password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $u_name - patient username
     * @return object
     */
    public function remove($u_name)
    {
        $query = "DELETE FROM patient_cred WHERE u_name= :u_name;";

        $this->db->query($query);
        $this->db->bind('u_name', $u_name);

        $this->db->execute();

        $affected_rows = $this->db->row_count();

        return ($affected_rows > 0) ? true : false;
    }
}
