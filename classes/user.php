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
  
  /* Küsib kõik $member'iga SEOTUD fieldid User<->Field tabel: doti_user_fields
	 *
	 * Mai-tea-miks on vajalik eraldi array'sse toppida, et ühekaupa utf8_encode ära teha...
	 * print_r() keerab ka kohe selle pekki, kui pole enkooditud, must investigate
   */
  public function getFieldsPersonal($member_ID){
    try {
			$stmt = $this->_db->prepare(
     'SELECT doti_fields.name AS FieldName,
      doti_fields.id as FieldId
      FROM doti_fields 
      LEFT JOIN doti_user_fields
        ON doti_fields.id = doti_user_fields.fields_id
      WHERE users_id = :myId
      ORDER BY FieldName DESC;');
			$stmt->execute(array('myId' => $member_ID));
		
		$p = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$RetFields = array(); // seda töötlen läbi...
		
		foreach($p as $field){
				$tmpAr = array();
				$tmpAr["FieldId"] 	= $field["FieldId"];
				$tmpAr["FieldName"] = utf8_encode($field["FieldName"]);
				//$field["FieldName"] = "1".utf8_encode($field["FieldName"]);
				$RetFields[] = $tmpAr;
		}

		return $RetFields;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
  }
	
  /* Küsib KÕIK Fieldid kelle autor on $member
   *
   */
  public function getFieldsAuthor($member_ID){
    try {
			$stmt = $this->_db->prepare(
     'SELECT doti_fields.name AS FieldName,
      doti_fields.id as FieldId
      FROM doti_fields 
      WHERE author_users_id = :myId
      ORDER BY FieldName DESC;');
			$stmt->execute(array('myId' => $member_ID));
		
		$p = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$RetFields = array(); // seda töötlen läbi...

		foreach($p as $field){
				$tmpAr = array();
				$tmpAr["FieldId"] 	= $field["FieldId"];
				$tmpAr["FieldName"] = utf8_encode($field["FieldName"]);
				//$field["FieldName"] = "1".utf8_encode($field["FieldName"]);
				$RetFields[] = $tmpAr;
		}
		
		return $RetFields;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
  }
	
	// TOdo Funk mis kustutab/dislinkib fieldi kasutaja küljest hetkel... See ongi nüüd!
	/* unSet ehk lõhu habiti ja kasutaja vaheline seos. Field ise jääb alles, koos originaalse autori ID'ga
	 *
	 * returns affected rows
	 * Deal with errors after calling this!
	 */
	public function linkField($member_ID, $field_ID){
		try {
			$stmt = $this->_db->prepare(
                'INSERT into doti_user_fields (users_id, fields_id) VALUES (:uid, :fid)');
            
			$stmt->execute(array('uid' => $member_ID, 'fid' => $field_ID));
			
			$del = $stmt->rowCount();
            
            //echo "linkField test rowCount::" . $del;
					
			return ;
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function unlinkField($member_ID, $field_ID){
		try {
			$stmt = $this->_db->prepare(
     'DELETE from doti_user_fields
		 WHERE
				users_id = :myId
		 AND
				fields_id = :fieldsId;');
			$stmt->execute(array('myId' => $member_ID, 'fieldsId' => $field_ID));
			
			$del = $stmt->rowCount();
				
		//print_r($stmt); //idk see eemaldas selle... returnimist hetkel ei toimu, isegi kui ei leitud mida eemaldada,... oma mure?!
				
			return $del;
		

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	// @todo setFieldPersonal($member_ID, $field_ID)
	// Kui link an unlinked or a new Field with this's
    
    /* Fieldi loomine!
     *
     */
    public function setFieldAdd($member_ID, $field_name, $field_color){
        //$fn = $field_name;
        $fn = iconv("UTF-8", "CP1252", $field_name);
        $fc = $field_color;
        
        try {
            $stmt = $this->_db->prepare("INSERT INTO doti_fields (name, color, author_users_id) VALUES (:fin, :fic, :aun);");
            
            $stmt->bindParam(':fin', $fn);
            $stmt->bindParam(':fic', $fc);
            $stmt->bindParam(':aun', $member_ID);
            
            $stmt->execute();
            
            $insertedID = $this->_db->lastInsertId();
            
            $this->linkField($member_ID, $insertedID);
            
            echo "New records created successfully. ID: " . $this->_db->lastInsertId();
            
        } catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
        }
        
    }
	
  /* Küsib habiteid kasutaja Fieldi'i järgi...
   */
  public function getHabits($field_ID){
    try {
			$stmt = $this->_db->prepare(
     'SELECT
						doti_habits.name as HabitName,
						doti_spec.name as SpecName
				FROM doti_habits
      LEFT JOIN doti_field_habits
        ON doti_habits.id = doti_field_habits.habits_id
      LEFT JOIN doti_spec
        ON doti_spec.id = doti_field_habits.habitspec_id
      WHERE user_fields_id = :mineId
      ORDER BY doti_field_habits.id ASC;');
			$stmt->execute(array('mineId' => $field_ID));

//$Keskus->logi('getHabits($field_ID::'.$field_ID.')', 3);
			return $stmt->fetchAll(PDO::FETCH_ASSOC);

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
  }
  
  // ========================== FUNCTIONS END =================================

	/* Does log out!
	 */
	public function logout(){
		session_destroy();
	}

	/* If logged in return TRUE
	 */
	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

}


?>
