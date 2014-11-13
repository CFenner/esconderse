<?
interface IDataStorage{
	public function createFW($userId, $forwardId, $desc);

	public function changestate($userId, $forwardId, $status);

	public function deleteFW($userId, $forwardId);

	public function getFW($userId, $forwardId);

	public function getFWList($userId);
}
?>
