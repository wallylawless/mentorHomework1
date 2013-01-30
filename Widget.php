<?php

class Widget
{
	protected $id;
	protected $name;
	protected $value;

	public function __construct($initValues)
	{
		if(is_array($initValues)){
			$this->id = $initValues['id'];
			$this->name = $initValues['name'];
			$this->value = $initValues['value'];
		}
	}

	public function __toString()
	{
		if($value>1){
			return "Hey, you've got {$this->value} {$this->name}";
		} else {
			return "Hey, you've got a {$this->name}";
		}
	}

	public function setName($newName)
	{
		if(trim($newName)!=''){
			$this->name = 'newName_'.$newName;
			return true;
		}

		return false;
	}

	public function getId()
	{
		return $this->id;
	}
}