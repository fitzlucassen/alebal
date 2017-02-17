<?php

	namespace fitzlucassen\FLFramework\Website\MVC\Controller;
	
	use fitzlucassen\FLFramework\Website\MVC\Model;
	use fitzlucassen\FLFramework\Library\Helper;
	use fitzlucassen\FLFramework\Library\Adapter;
	use fitzlucassen\FLFramework\Data\Repository;
	use fitzlucassen\FLFramework\Library\Core;
	
	/*
		Class : HomeController
		Déscription : Permet de gérer les actions en relation avec le groupe de page Home
	*/
	class HomeController extends Controller {
		public function __construct($action, $manager) {
			parent::__construct("home", $action, $manager);
		}

		public function Index(){
			// Une action commencera toujours par l'initilisation de son modèle
			// Cette initialisation doit obligatoirement contenir le repository manager
			$Model = new Model\HomeModel($this->_repositoryManager);
			
			if(Core\Request::isPost()){
				// It's a form validation
				// Clean all vars
				$data = Core\Request::cleanRequest();

				$Model->repository = $this->_repositoryManager->get('event');
				$Model->repository->add([
					'id_Competitor1' => $data['id_Competitor1'],
					'id_Competitor2' => $data['id_Competitor2'],
					'score_Competitor1' => $data['score1'],
					'score_Competitor2' => $data['score2'],
					'date' => $data['date'],
				]);
				// Process request...
			}

			$Model->repository = $this->_repositoryManager->get('event');
			$Model->events = $Model->repository->getAll($this->_repositoryManager->getConnection());

			$Model->repository = $this->_repositoryManager->get('competitor');
			$Model->competitors = $Model->repository->getAll($this->_repositoryManager->getConnection());
			
			$array_date = [];

			foreach ($Model->events as $key => $value) {
				if(!array_key_exists($value->getDate(), $array_date)){
					$array_date[$value->getDate()] = [$value];
				}
				else {
					array_push($array_date[$value->getDate()], $value);
				}
			}

			$Model->events = $array_date;
			// Une action finira toujours par un $this->_view->view contenant : 
			// cette fonction prend en paramètre le modèle
			$this->_view->view($Model);
		}
		
		public function Classement(){
			// Une action commencera toujours par l'initilisation de son modèle
			// Cette initialisation doit obligatoirement contenir le repository manager
			$Model = new Model\HomeModel($this->_repositoryManager);
			
			$Model->repository = $this->_repositoryManager->get('event');
			$Model->events = $Model->repository->getAll($this->_repositoryManager->getConnection());

			$Model->repository = $this->_repositoryManager->get('competitor');
			$competitors = $Model->repository->getAll($this->_repositoryManager->getConnection());

			$array_victories = [];
			$array_match = [];
			$Model->classement = [];

			foreach ($Model->events as $key => $value) {
				if($value->getScore_Competitor1() > $value->getScore_Competitor2()){
					$this->incrementPlayer($array_victories, $value->getId_Competitor1());
					$this->incrementPlayer($array_match, $value->getId_Competitor1());
					$this->incrementPlayer($array_match, $value->getId_Competitor2());
					
					if(!array_key_exists($value->getId_Competitor2(), $array_victories))
						$array_victories[$value->getId_Competitor2()] = 0;
				}
				else {
					$this->incrementPlayer($array_victories, $value->getId_Competitor2());
					$this->incrementPlayer($array_match, $value->getId_Competitor1());
					$this->incrementPlayer($array_match, $value->getId_Competitor2());;

					if(!array_key_exists($value->getId_Competitor1(), $array_victories))
						$array_victories[$value->getId_Competitor1()] = 0;
				}
			}

			foreach ($competitors as $key => $competitor) {
				$id = $competitor->getId();
				
				$nbMatchs = array_key_exists($id, $array_match) ? $array_match[$id] : 0;
				$nbVictories = array_key_exists($id, $array_victories) ? $array_victories[$id] : 0;

				$Model->classement[$id] = [
					'rank' => round(($nbMatchs > 0 ? $nbVictories / $nbMatchs : 0), 2),
					'matchs' => $nbMatchs,
					'victories' => $nbVictories
				];
			}
			arsort($Model->classement);
			// Une action finira toujours par un $this->_view->view contenant : 
			// cette fonction prend en paramètre le modèle
			$this->_view->view($Model);
		}

		private function incrementPlayer(&$array, $competitorId){
			if(array_key_exists($competitorId, $array)) 
				$array[$competitorId]++;
			else
				$array[$competitorId] = 1;
		}

		public function Error404(){
			$Model = new Model\HomeModel($this->_repositoryManager);
			
			http_response_code(404);

			$this->_view->view($Model);
		}
	}