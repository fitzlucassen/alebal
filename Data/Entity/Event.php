<?php 
	/**********************************************************
	 **** File generated by fitzlucassen\DALGenerator tool ****
	 * All right reserved to fitzlucassen repository on github*
	 ************* https://github.com/fitzlucassen ************
	 **********************************************************/
	namespace fitzlucassen\FLFramework\Data\Entity;

	use fitzlucassen\FLFramework\Library\Core;
	use fitzlucassen\FLFramework\Data\Base\Entity as EntityBase;

	class Event extends EntityBase\EventBase {
		public function __construct($id = '', $id_Competitor1 = '', $id_Competitor2 = '', $score_Competitor1 = '', $score_Competitor2 = '', $date = ''){
			parent::__construct($id, $id_Competitor1, $id_Competitor2, $score_Competitor1, $score_Competitor2, $date);
		}

	}
