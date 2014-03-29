<?php namespace Wwallace\Poll\Facades;

use Illuminate\Support\Facades\Facade;

class PollFacade extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'poll'; }

}
