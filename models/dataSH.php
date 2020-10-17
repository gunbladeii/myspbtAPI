<?php 
  class Employeedata {
    // DB stuff
    private $conn;
    private $table = 'employeeData';

    // Post Properties
    public $id;
    public $noIC;
    public $nama;
    public $emel;
    public $sex;
    public $dob;
    public $pob;
    public $nationality;
    public $race;
    public $religion;
    public $marriage;
    public $childrenNo;
    public $address;
    public $noTel;
    public $lesenNo;
    public $lesenExp;
    public $noPlate;
    public $roadtaxNo;
    public $vehicleModel;
    public $vehicleYear;
    public $pdrmRecordNo;
    public $caseNo;
    public $employeeStatus;
    public $stationCode;
    public $accNum;
    public $codeBank;

    


    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get employeeData
    public function read() {
      // Create query
      $query = 'SELECT id, noIC, nama, emel, sex, dob, pob, nationality, race, religion, marriage, childrenNo, address, noTel, lesenNo, lesenExp, noPlate, roadtaxNo, vehicleModel, vehicleYear, pdrmRecordNo, caseNo, employeeStatus, stationCode, accNum, codeBank
                                FROM ' . $this->table . ' 
                                ORDER BY
                                  nama ASC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Post
    public function read_single() {
          // Create query
          $query = 'SELECT id, noIC, nama, emel, sex, dob, pob, nationality, race, religion, marriage, childrenNo, address, noTel, lesenNo, lesenExp, noPlate, roadtaxNo, vehicleModel, vehicleYear, pdrmRecordNo, caseNo, employeeStatus, stationCode, accNum, codeBank
                                FROM ' . $this->table . '
                                    WHERE
                                      noIC = ?
                                    LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->noIC);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->id = $row['id'];
          $this->noIC = $row['noIC'];
          $this->nama = $row['nama'];
          $this->emel = $row['emel'];
          $this->sex = $row['sex'];
          $this->dob = $row['dob'];
          $this->pob = $row['pob'];
          $this->nationality = $row['nationality'];
          $this->race = $row['race'];
          $this->religion = $row['religion'];
          $this->marriage = $row['marriage'];
          $this->childrenNo = $row['childrenNo'];
          $this->address = $row['address'];
          $this->noTel = $row['noTel'];
          $this->lesenNo = $row['lesenNo'];
          $this->lesenExp = $row['lesenExp'];
          $this->noPlate = $row['noPlate'];
          $this->roadtaxNo = $row['roadtaxNo'];
          $this->vehicleModel = $row['vehicleModel'];
          $this->vehicleYear = $row['vehicleYear'];
          $this->pdrmRecordNo = $row['pdrmRecordNo'];
          $this->caseNo = $row['caseNo'];
          $this->employeeStatus = $row['employeeStatus'];
          $this->stationCode = $row['stationCode'];
          $this->accNum = $row['accNum'];
          $this->codeBank = $row['codeBank'];


    }

    // Create employeeData
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET noIC = :noIC, nama = :nama, emel = :emel, sex = :sex';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->noIC = htmlspecialchars(strip_tags($this->noIC));
          $this->nama = htmlspecialchars(strip_tags($this->nama));
          $this->emel = htmlspecialchars(strip_tags($this->emel));
          $this->stationCode = htmlspecialchars(strip_tags($this->stationCode));

          // Bind data
          $stmt->bindParam(':noIC', $this->noIC);
          $stmt->bindParam(':nama', $this->nama);
          $stmt->bindParam(':emel', $this->emel);
          $stmt->bindParam(':stationCode', $this->stationCode);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Post
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . '
                                SET nama = :nama, emel = :emel, sex = :sex, dob = :dob
                                WHERE noIC = :noIC';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->nama = htmlspecialchars(strip_tags($this->nama));
          $this->emel = htmlspecialchars(strip_tags($this->emel));
          $this->stationCode = htmlspecialchars(strip_tags($this->stationCode));
          $this->employeeStatus = htmlspecialchars(strip_tags($this->employeeStatus));
          $this->noIC = htmlspecialchars(strip_tags($this->noIC));

          // Bind data
          $stmt->bindParam(':nama', $this->nama);
          $stmt->bindParam(':emel', $this->emel);
          $stmt->bindParam(':stationCode', $this->stationCode);
          $stmt->bindParam(':employeeStatus', $this->employeeStatus);
          $stmt->bindParam(':noIC', $this->noIC);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // Delete Post
    public function delete() {
          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE noIC = :noIC';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->noIC = htmlspecialchars(strip_tags($this->noIC));

          // Bind data
          $stmt->bindParam(':noIC', $this->noIC);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
  }
