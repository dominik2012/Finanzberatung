<?php
class NeuForm extends CFormModel
{
	public $grobphase_id;
	
	public function rules()
	{
		return array(
			// grobphase_id are required
			array('grobphase_id', 'required'),
			
		);
	}
	
}