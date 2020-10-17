<?php 
  class DataSH {
    // DB stuff
    private $conn;
    private $table = 'dataSH';

    // Post Properties
    public $id;
    public $username;
    public $negeri;
    public $tarikhBukaSH;
    public $tarikhTutupSH;
    public $tarikhPenilaianSH;
    public $tarikhSSTSH;
    public $namaPembekal;
    public $nilaiSH;
    public $tarikhCO;
    public $bilJudulPesan;
    public $bilNaskhahPesan;
    public $bilNaskhahBekal;
    public $peratusBekal;
    public $statusBekal;
    public $statusTuntut;
    public $statusBayar;
    public $remark;
    public $colorBar;
    public $latitude;
    public $longitude;

    


    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get employeeData
    public function read() {
      // Create query
      $query = 'SELECT id,username,negeri,tarikhBukaSH,tarikhTutupSH,tarikhPenilaianSH,tarikhSSTSH,namaPembekal,nilaiSH,tarikhCO,bilJudulPesan,bilNaskhahPesan,bilNaskhahBekal,peratusBekal,statusBekal,statusTuntut,statusBayar,remark,colorBar,latitude,longitude
                                FROM ' . this->table . ' 
                                ORDER BY
                                  negeri ASC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    