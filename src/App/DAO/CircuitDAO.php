<?php

namespace App\DAO;

use Doctrine\DBAL\Connection;
use App\Domain\Circuit;

class CircuitDAO {
	private $db;

	public function __construct(Connection $db) {
		$this->db = $db;
	}

	public function findAll() {
		$sql = "SELECT * FROM circuits";
		$result = $this->db->fetchAll($sql);

		$circuits = array();
		foreach($result as $row) {
			$circuits[$row["id"]] = $this->buildCircuit($row);
		}

		return $circuits;
	}

	private function buildCircuit(array $row) {
		$circuit = new Circuit();

		$circuit->setId($row["id"]);
		$circuit->setName($row["name"]);
		$circuit->setType($row["type"]);
		$circuit->setDescription($row["description"]);
		$circuit->setPrice($row["price"]);

		return $circuit;
	}
}