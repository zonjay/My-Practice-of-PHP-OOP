<?php
	
class Product{
	private $con;
	private $tableName = "products";

	public $id;
	public $name;
	public $description;
	public $price;
	public $created;

	public function __construct($db){
		$this->con = $db;
	}

	function create(){
		$query = "INSERT INTO " . $this->tableName . " SET name = :name, price = :price , description = :description , created = :created";
		$stmt = $this->con->prepare($query);

		$this->name = htmlspecialchars(strip_tags($this->name));
		$this->price = htmlspecialchars(strip_tags($this->price));
		$this->description = htmlspecialchars(strip_tags($this->description));
		$this->created = htmlspecialchars(strip_tags($this->created));

		$stmt->bindParam(":name", $this->name);
		$stmt->bindParam(":price", $this->price);
		$stmt->bindParam(":description", $this->description);
		$stmt->bindParam(":created", $this->created);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	function readAll($from_record_num, $records_per_page){
		$query = "SELECT id, name, description, price, created FROM " . $this->tableName . " ORDER BY id DESC LIMIT ?, ?";
		$stmt = $this->con->prepare($query);
		$stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
		$stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt;
	}

	function readOne(){
		$query = "SELECT name, price, description FROM " .  $this->tableName . " WHERE id = ? LIMIT 0, 1";

		$stmt = $this->con->prepare($query);
		$stmt->bindParam(1, $this->id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->name = $row['name'];
		$this->price = $row['price'];
		$this->description = $row['description'];
	}

	function update(){
		$query = "UPDATE " . $this->tableName . " SET name = :name, price = :price, description = :description WHERE id = :id";

		$stmt = $this->con->prepare($query);

		$this->name = htmlspecialchars(strip_tags($this->name));
	    $this->price = htmlspecialchars(strip_tags($this->price));
	    $this->description = htmlspecialchars(strip_tags($this->description));  

	    $stmt->bindParam(':name', $this->name);
	    $stmt->bindParam(':price', $this->price);
	    $stmt->bindParam(':description', $this->description);
	    $stmt->bindParam(':id', $this->id);

	    if($stmt->execute()){
	    	echo $stmt;
      	  return true;
   	    }else{
   	    	echo $stmt;
          return false;
   		}
	}

	function delete(){
		$query = "DELETE FROM " . $this->tableName . " WHERE id = ?";
		$stmt = $this->con->prepare($query);
		$stmt->bindParam(1, $this->id);

		if($stmt->execute()){
			return true;
		} else{
			return false;
		}
	}


	function countAll(){
		$query = "SELECT COUNT(*) AS total_rows FROM " . $this->tableName;
		$stmt = $this->con->prepare($query);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		return $row['total_rows'];	
	}
}

?>	