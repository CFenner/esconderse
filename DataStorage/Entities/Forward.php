<?php
class Forward{
	public $id;
	public $userId;
	public $description;
	public $status;
	public $createDate;
	public $changeDate;

	public function init($id, $userId, $description, $status, $createDate, $changeDate){
		$this->id = $id;
		$this->userId= $userId;
		$this->description = $description;
		$this->status = $status;
		$this->createDate = $createDate;
		$this->changeDate = $changeDate;
	}

	public function getMail(){
		return $this->id. ".". $this->userId. "@". DOMAIN;
	}

	public function getChangeDate(){
		return !empty($this->changeDate)
				?$this->changeDate
				:$this->createDate;
	}
}
?>