<?
session_start();

class Connection {
	// Configure Database Vars
	private $host     = 'localhost';
	private $username = 'atlasalp_atlas';
	private $password = 'wq5z9wf2atlas!';
	private $db_name  = 'atlasalp_atlas';
	public $db;

	function __construct() {
		// Create connection
		$db = new mysqli($this->host, $this->username, $this->password, $this->db_name);
		// Check connection
		if ($db->connect_errno > 0) {
			die('Unable to connect to the database: '.$db->connect_error);
		}
		$this->db = $db;
	}

	public function query($query) {
		$db = $this->db;
		$this->db->query('SET NAMES utf8');
		if (!$result = $this->db->query($query)) {
			die('There was an error running the query ['.$db->error.']');
		} else {
			return $result;
		}
	}

	public function multi_query($query) {
		$db = $this->db;
		if (!$result = $this->db->multi_query($query)) {
			die('There was an error running the multi query ['.$db->error.']');
		} else {
			return $result;
		}
	}

	public function real_escape_string($value) {
		return $this->db->real_escape_string($value);
	}

	public function inserted_id() {
		return $this->db->insert_id;
	}
}

$conn = new Connection;

?>
