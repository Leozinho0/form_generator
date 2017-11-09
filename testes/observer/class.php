<?php 
//Interfaces
interface IGroup{
	public function add(GroupMember	$groupMember);
	public function remove(GroupMember	$groupMember);
}

interface IGroupChat{
	public function update($message);
	public function getMessages();
}

//Classes
class Group implements IGroup{
	private $groupMembers = array();

	public function add(GroupMember	$groupMember){
		$this->groupMembers[] = $groupMember;
	}

	public function remove(GroupMember $groupMember){
		//Remove Group Member
	}

}

class GroupMember implements IGroupChat{
	private $messages = array();
	private $group = "";
	private $memberName = "";

	function __construct(Group $group){
		$this->group = $group;
		$this->group->add($this);
	}
	//
	public function update($message){
		$this->messages[] = $message;
	}
	public function getMessages(){
		return $this->messages;
	}
	public function getMemberName(){
		return $this->memberName;
	}
	public function setMemberName($name){
		$this->memberName = $name;
	}
}


 ?>