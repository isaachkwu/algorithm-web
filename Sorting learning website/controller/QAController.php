<?php
	class QAController {
		private $model;
		private $view;
		private $wtf;
		
		public function __construct() {
			$this->model = new QAModel();
			$this->view = new QAView();
			$this->wtf = NULL;
		}
		
		public function call( $string ) {
			if($string == "postQA"){
				$dataaa = $this->model->{$string}($this->wtf);
			}else{
				$dataaa = $this->model->{$string}();
			}
			echo $this->view->output( $dataaa );
		}
		
		public function addData ( $datas ) {
			$this->wtf = $datas;
		}
	}
?>