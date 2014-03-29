<?php

use LaravelBook\Ardent\Ardent;

class Option extends Ardent {

	public $timestamps = false;
	public static $rules = array(
		'title' => 'required|between:1,255',
		'poll_id' => 'required'
	);

	protected $fillable = array('title','poll_id');

	/**
	 * Relationships
	 *
	 */
	public function poll() {
		return $this->belongsTo('Poll');
	}

	public function votes() {
		return $this->hasMany('Vote');
	}
}
