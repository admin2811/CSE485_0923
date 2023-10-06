<?php 
class Patient{
    private int $id;
    private string $tenBenhNhan;
    private string $ngayKham;
    private string $trieuChung;
    private int $idBacSi;

    public function __construct($id , $tenBenhNhan,$ngayKham,$trieuChung, $idBacSi){
        $this->id = $id;
        $this->tenBenhNhan = $tenBenhNhan;
        $this->ngayKham = $ngayKham;
        $this->trieuChung = $trieuChung;
        $this->idBacSi = $idBacSi;
    }
    public function getId(){
        return $this->id;
    }
    public function getTenBenhNhan(){
        return $this->tenBenhNhan;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setTenBenhNhan($tenBenhNhan){
        $this->tenBenhNhan = $tenBenhNhan;
    }
    public function getNgayKham(){
        return $this->ngayKham;
    }
    public function setNgayKham($ngayKham){
        $this->ngayKham = $ngayKham;
    }
    public function getTrieuChung(){
        return $this->trieuChung;
    }
    public function setTrieuChung($trieuChung){
        $this->trieuChung = $trieuChung;
    }
    public function getIdBacSi(){
        return $this->idBacSi;
    }
    public function setIdBacSi($idBacSi){
        $this->idBacSi = $idBacSi;
    }
}

?>