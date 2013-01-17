<?php

Interface WidgetDataInterface
{
	public function getAll();

	public function getByName($name);

	public function saveWidget($widget);
}