<?php
require_once('../WidgetRepository.php');

class WidgetRepositoryTest extends PHPUnit_Framework_Testcase
{
	public function testEmptyInterface()
	{
		$dataModel = $this->getMock('WidgetDataInterface', array('getAll', 'getByName', 'getById', 'saveWidget'));
		$repository = new WidgetRepository($dataModel);

		$this->assertFalse($repository->getAllWidgets(), "Repository should return false when there are no widgets to get");
	}

	public function testRepositoryReturnsWidgetThroughInterface()
	{
		$dataModel = $this->getMock('WidgetDataInterface', array('getAll'));

		$dataModel->expects($this->once())
				  ->method('getAll')
				  ->will($this->returnValue(array(array('id'=>1, 'name'=>'First Widget', 'value'=>42))));

		$repository = new WidgetRepository($dataModel);
		$foundWidgets = $repository->getAllWidgets();

		$this->assertEquals(count($foundWidgets), 1, "The repository is not returning the single widget in the data source");
	}
}