<?php
	class CEController {
		private $model;
		private $view;
		private $data;
		
		public function __construct() {
			$this->model = new CEModel();
			$this->view = new CEView();
			$this->data = NULL;
		}
		
		public function call( $string ) {
			if($string == "postCE" or $string == "evalCE"){
				$dataaa = $this->model->{$string}($this->data);
			}elseif($string === "getMyCE"){
				$dataaa = $this->model->{$string}();
				echo $this->view->useroutput( $dataaa );
			}elseif($string === "getAllCE"){
				$dataaa = $this->model->{$string}();
				echo $this->view->manoutput( $dataaa );
			}
		}
		
		public function addData ( $datas ) {
			$this->data = $datas;
		}
	}
?>