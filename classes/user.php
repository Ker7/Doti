<?php

include('password.php');

class User extends Password{

    private $_db;

    function __construct($db){
    	parent::__construct();

    	$this->_db = $db;
    }

	private function get_user_hash($username){

		try {
			$stmt = $this->_db->prepare('SELECT password, username, id AS memberID FROM doti_users WHERE username = :username AND active="Yes" ');
			$stmt->execute(array('username' => $username));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function login($username,$password){

		$row = $this->get_user_hash($username);

		if($this->password_verify($password,$row['password']) == 1){

		    $_SESSION['loggedin'] = true;
		    $_SESSION['username'] = $row['username'];
		    $_SESSION['memberID'] = $row['memberID'];
		    return true;
		}
	}
  
  // ___________________________ MINU FUNKID _________________________________
  
  /* Küsib enese Fieldid
   *
   */
  public function getFieldsPersonal(){
    try {
			$stmt = $this->_db->prepare(
     'SELECT doti_fields.name AS FieldName,
      doti_user_fields.id as FieldId
      FROM doti_fields 
      LEFT JOIN doti_user_fields
        ON doti_fields.id = doti_user_fields.fields_id
      WHERE users_id = :myId
      ORDER BY FieldName DESC;');
			$stmt->execute(array('myId' => $_SESSION['memberID']));

			return $stmt->fetchAll(PDO::FETCH_ASSOC);

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
  }
  
  // ========================== FUNCTIONS END =================================

	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

}


?>
