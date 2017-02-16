<?php 
	/**********************************************************
	 **** File generated by fitzlucassen\DALGenerator tool ****
	 * All right reserved to fitzlucassen repository on github*
	 ************* https://github.com/fitzlucassen ************
	 **********************************************************/
	namespace fitzlucassen\FLFramework\Data\Base\Entity;

	use fitzlucassen\FLFramework\Library\Core;
	use fitzlucassen\FLFramework\Data\Entity;

	class CompetitorBase  {
		private $_id;
		private $_name;
		private $_date;
		private $_events;
		private $_queryBuilder;

		public function __construct($id = '', $name = '', $date = ''){
			$this->_queryBuilder = new Core\QueryBuilder(true);
			$this->fillObject(array("id" => $id, "name" => $name, "date" => $date));
		}

		/***********
		 * GETTERS *
		 ***********/
		public function getId() {
			return $this->_id;
		}
		public function getName() {
			return $this->_name;
		}
		public function getDate() {
			return $this->_date;
		}
		public function getEvents($repository) {
			$result = $repository->getBy("id_Competitor1", $this->_id);
			array_merge($result, $repository->getBy("id_Competitor2", $this->_id));

			return $result;
		}

		/*******
		 * END *
		 *******/

		public function fillObject($properties) {
			if(!empty($properties["id"]))
				$this->_id = $properties["id"];
			if(!empty($properties["name"]))
				$this->_name = $properties["name"];
			if(!empty($properties["date"]))
				$this->_date = $properties["date"];
		}
	}
