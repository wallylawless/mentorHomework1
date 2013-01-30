<?php
require_once('../WidgetRepository.php');

class WidgetRepositoryTest extends PHPUnit_Framework_Testcase
{
	public function testEmptyInterface()
	{
		$dataModel = $this->getMock('IWidgetData', array('getAll', 'getByName', 'getById', 'save'));
		$repository = new WidgetRepository($dataModel);

		$this->assertFalse($repository->getAllWidgets(), "Repository should return false when there are no widgets to get");
	}

	public function testRepositoryReturnsWidgetThroughInterface()
	{
		$dataModel = $this->getMock('IWidgetData', array('getAll'));

		$dataModel->expects($this->once())
				  ->method('getAll')
				  ->will($this->returnValue(array(array('id'=>1, 'name'=>'First Widget', 'value'=>42))));

		$repository = new WidgetRepository($dataModel);
		$foundWidgets = $repository->getAllWidgets();

		$this->assertEquals(count($foundWidgets), 1, "The repository is not returning the single widget in the data source");
	}

	public function testRepositorySavesWidget()
	{
		$dataModel = $this->getMock('IWidgetData', array('save'));

		$dataModel->expects($this->once())
				  ->method('save')
				  ->will($this->returnValue(true));

		$fakeWidget = $this->getMockBuilder('Widget')
						   ->disableOriginalConstructor()
						   ->getMock();

		$repository = new WidgetRepository($dataModel);
		
		$this->assertTrue($repository->saveWidget($fakeWidget), "Saving a widget did not return true");

	}
}