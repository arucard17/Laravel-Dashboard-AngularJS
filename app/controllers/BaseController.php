<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	protected function _toArray($arr){

		$tmp = array();

		foreach ($arr as $key => $elm) {

			if( method_exists($elm, 'toArray')){
				array_push($tmp, $elm->toArray());
			}else{
				if(is_object($elm))
					array_push($tmp, get_object_vars($elm));
				else
					array_push($tmp, $elm);

			}

		}
		return $tmp;
	}


}
