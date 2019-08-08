<?php
	class LBController {
		private $model;
		private $view;
		public function __construct() {
			$this->model = new LBModel();
			$this->view = new LBView();
		}
		public function call( $string ) {
			$data = $this->model->{$string}();
			echo $this->view->output( $data );
		}
	}
?>