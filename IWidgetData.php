<?php

Interface IWidgetData
{
	public function getAll();

	public function getByName($name);

	public function save($widget);
}