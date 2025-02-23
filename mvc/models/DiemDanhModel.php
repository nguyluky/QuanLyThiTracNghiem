<?php
class DiemDanhModel extends DB {
    public function create($title, $manhom, $ngaydiemdanh, $ngayhethan, $codediemdanh) {
        $sql = "INSERT INTO `diemdanh` (`title`, `manhom`, `ngaydiemdanh`, `ngayhethan`, `codediemdanh`)
        VALUES ('$title', $manhom, '$ngaydiemdanh', '$ngayhethan', '$codediemdanh');";
        $result = mysqli_query($this->con, $sql) ;
        return $this->con;
    }

    public function update() {

    }

    public function delete() {}

    public function getAll($manhom) {
        $query = "
            SELECT 
                DD.*, 
                (
                    SELECT COUNT(*) 
                    FROM chitietdiemdanh 
                    WHERE madiemdanh=DD.madiemdanh
                ) as ddd,
                (
                    SELECT COUNT(*) 
                    FROM chitietnhom CTN
                    WHERE CTN.manhom = DD.manhom
                ) as ss
            FROM `diemdanh` DD WHERE `manhom`='$manhom';
        ";

        $data = array();
        $result = mysqli_query($this->con, $query) ;
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;


    }
    public function getById($id) {
        $sql = " SELECT * FROM chitietdiemdanh WHERE madiemdanh=$id; ";

        $data = array();
        $result = mysqli_query($this->con, $sql) ;
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    public function getAllNhomHoc($gvId) {
        $sql = "SELECT * FROM `nhom` WHERE `giangvien` = '$gvId';";
        // error_log($sql);
        $data = array();
        $result = mysqli_query($this->con, $sql) ;
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getQuery($filter, $input, $args) {
        $query = "
        SELECT 
            DD.*, 
            (
                SELECT COUNT(*) 
                FROM chitietdiemdanh 
                WHERE madiemdanh=DD.madiemdanh
            ) as ddd,
            (
                SELECT COUNT(*) 
                FROM chitietnhom CTN
                WHERE CTN.manhom = DD.manhom
            ) as ss
        FROM `diemdanh` DD WHERE `manhom`=2;";
    }
    public function getTotalPage() {}
}
?>