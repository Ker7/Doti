<?php

include('password.php');

 /* Kasutajaga ja Andmebaasiga seotud
  *
  *
  */
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
  public function getFieldsPersonal($member_ID){
    try {
			$stmt = $this->_db->prepare(
     'SELECT doti_fields.name AS FieldName,
      doti_user_fields.id as FieldId
      FROM doti_fields 
      LEFT JOIN doti_user_fields
        ON doti_fields.id = doti_user_fields.fields_id
      WHERE users_id = :myId
      ORDER BY FieldName DESC;');
			$stmt->execute(array('myId' => $member_ID));

//$Keskus->logi('getFieldsPersonal($memberID::'.$member_ID.')', 3); SIIN EI TEA KES KESKUS ON
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
  }
    
	// TOdo Funk mis kustutab/dislinkib fieldi kasutaja küljest hetkel...
	// Kasutada vaid ID on riskantne? Well see...
	public function unlinkField($member_ID, $field_ID) {
		try {
			$stmt = $this->_db->prepare(
		 'DELETE from doti_user_fields
		 WHERE users_id = :myId
		 AND fields_id = :fieldId;');
				$stmt->execute(array('myId' => $member_ID, 'fieldId' => $field_ID));
	
	//$Keskus->logi('getFieldsPersonal($memberID::'.$member_ID.')', 3); SIIN EI TEA KES KESKUS ON
				//return $stmt->fetchAll(PDO::FETCH_ASSOC);
			
	
			} catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
	}
	
  /* Küsib enese Fieldid
   *
   */
	public function getHabits($field_ID){
    try {
			$stmt = $this->_db->prepare(
     'SELECT
						doti_habits.name as HabitName,
						doti_spec.name as SpecName
				FROM doti_habits
      LEFT JOIN doti_user_habits
        ON doti_habits.id = doti_user_habits.habits_id
      LEFT JOIN doti_spec
        ON doti_spec.id = doti_user_habits.habitspec_id
      WHERE user_fields_id = :mineId
      ORDER BY doti_user_habits.id ASC;');
			$stmt->execute(array('mineId' => $field_ID));

//$Keskus->logi('getHabits($field_ID::'.$field_ID.')', 3);
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
