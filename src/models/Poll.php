<?php
use LaravelBook\Ardent\Ardent;

class Poll extends Ardent {

	protected $table = 'polls';

	public static $rules = array(
		'question' => 'required|between:1,255',
		'active' => 'integer|between:0,1',
		'public' => 'integer|between:0,1'
	);

	protected $fillable = array('question','active','public');


	/**
	 * Relationships
	 *
	 */
	public function options() {
		return $this->hasMany('Option');
	}
}
