<?php
class Connectionclass
{
    public $db = null;

    public function open()
    {
        $dbname = "ewaste"; // your DB name
        $this->db = mysqli_connect("localhost", "root", "", $dbname) 
            or die('Error connecting to MySQL server.');
    }

    public function Manipulation($qry)
    {
        $this->open();
        $response = array();

        try {
            $result = mysqli_query($this->db, $qry);
            $response['status'] = $result ? "true" : "false";

            if (!$result) {
                throw new Exception(mysqli_error($this->db));
            }
        } catch (Exception $e) {
            $response['status'] = "false";
            $response['Message'] = $e->getMessage();
        }

        mysqli_close($this->db);
        return $response;
    }

    public function GetTable($qry)
    {
        $this->open();

        try {
            $result = mysqli_query($this->db, $qry);
            if ($result) {
                $data = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
                return $data;
            } else {
                throw new Exception(mysqli_error($this->db));
            }
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            mysqli_close($this->db);
        }
    }

    public function GetSingleData($qry)
    {
        $this->open();

        try {
            $result = mysqli_query($this->db, $qry);
            if ($result) {
                $row = mysqli_fetch_row($result);
                return ($row != null) ? $row[0] : "";
            } else {
                throw new Exception(mysqli_error($this->db));
            }
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            mysqli_close($this->db);
        }
    }

    public function GetSingleRow($qry)
    {
        $this->open();

        try {
            $result = mysqli_query($this->db, $qry);
            if ($result) {
                return mysqli_fetch_array($result);
            } else {
                throw new Exception(mysqli_error($this->db));
            }
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            mysqli_close($this->db);
        }
    }

    public function GenerateID($qry, $num)
    {
        $this->open();

        try {
            $result = mysqli_query($this->db, $qry);
            if ($result) {
                $row = mysqli_fetch_row($result);
                return empty($row[0]) ? ($num + 1) : ($row[0] + 1);
            } else {
                throw new Exception(mysqli_error($this->db));
            }
        } catch (Exception $e) {
            return $e->getMessage();
        } finally {
            mysqli_close($this->db);
        }
    }

    public function alert($msg, $url = null)
    {
        echo "
        <script type='text/javascript'>
        alert('$msg');
        location.href='$url';
        </script>";
    }

    public function getpostedby()
    {
        session_start();
        return $_SESSION['username'] ?? null;
    }

    public function getcurtime()
    {
        return date('Y-m-d');
    }
}
?>
