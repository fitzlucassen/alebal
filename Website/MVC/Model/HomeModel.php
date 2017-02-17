<?php

	namespace fitzlucassen\FLFramework\Website\MVC\Model;
	
	 /*
		Class : HomeModel
		Déscription : Model de donnée pour les pages du controller home
	 */
	class HomeModel extends Model{
		public $events = null;
		public $repository = null;
		public $competitors = null;
		public $classement = null;
		
		public function __construct($manager) {
			parent::__construct($manager);
		}
	}
