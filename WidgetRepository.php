<?
require_once('Widget.php');

class WidgetRepository
{

	protected $dataModel;
	protected $dataContainer;

	public function __construct($dataModel)
	{
		$this->dataModel = $dataModel;
	}

	public function getAllWidgets()
	{
		$allwidgets = array();
		$allWidgets = $this->dataModel->getAll();
		if(count($allWidgets)){
			foreach($allWidgets as $widget){
				$this->dataContainer[$widget['id']] = new Widget($widget);
			}
			return $this->dataContainer;
		}

		return false;
	}

	public function getWidgetByName($prmWidgetName)
	{
		$foundWidget = $this->dataModel->getByName($prmWidgetName);
		if($foundWidget){
			$this->dataContainer[$foundWidget['id']] = $foundWidget;
			return $foundWidget;
		}

		return false;
	}

	public function saveWidget($widget)
	{
		$this->dataContainer[$widget->getId()] = $widget;
		return $this->dataModel->save($widget);
	}
}