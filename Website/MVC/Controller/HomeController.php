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
			
			// Une action finira toujours par un $this->_view->view contenant : 
			// cette fonction prend en paramètre le modèle
			$this->_view->view($Model);
		}
		
		public function Error404(){
			$Model = new Model\HomeModel($this->_repositoryManager);
			
			http_response_code(404);

			$this->_view->view($Model);
		}
	}