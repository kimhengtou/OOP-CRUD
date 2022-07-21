<?php 

	Class Model{

		private $server = "localhost";
		private $username = "root";
		private $password;
		private $db = "heng";
		private $conn;

		public function __construct(){
			try {
				
				$this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
			} catch (Exception $e) {
				echo "connection failed" . $e->getMessage();
			}
		}

		public function insert(){

			if (isset($_POST['submit'])) {
				if (isset($_POST['fristname']) && isset($_POST['lastname']) && isset($_POST['phone_number']) && isset($_POST['password'])) {
					if (!empty($_POST['fristname']) && !empty($_POST['lastname']) && !empty($_POST['phone_number']) && !empty($_POST['password']) ) {
						
						$fristname = $_POST['fristname'];
						$lastname = $_POST['lastname'];
						$phone_number = $_POST['phone_number'];
						$password = $_POST['password'];

						$query = "INSERT INTO oop_crud (fristname,lastname,phone_number,password) VALUES ('$fristname','$lastname','$phone_number','$password')";
						if ($sql = $this->conn->query($query)) {
							echo "<script>alert('added successfully');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}else{
							echo "<script>alert('failed');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}

					}else{
						echo "<script>alert('empty');</script>";
						echo "<script>window.location.href = 'index.php';</script>";
					}
				}
			}
		}

		public function fetch(){
			$data = null;

			$query = "SELECT * FROM oop_crud";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function delete($id){

			$query = "DELETE FROM oop_crud where id = '$id'";
			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}

		public function fetch_single($id){

			$data = null;

			$query = "SELECT * FROM oop_crud WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				while ($row = $sql->fetch_assoc()) {
					$data = $row;
				}
			}
			return $data;
		}

		public function edit($id){

			$data = null;

			$query = "SELECT * FROM oop_crud WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

		public function update($data){

			$query = "UPDATE oop_crud SET fristname='$data[fristname]', lastname='$data[lastname]', phone_number='$data[phone_number]', password='$data[password]' WHERE id='$data[id] '";

			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}
	}

 ?>


