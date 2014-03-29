<?php namespace Wwallace\EasyPoll;

/**
 * Class EasyPoll
 * @package Wwallace\EasyPoll
 */
class EasyPoll {

	public function __construct()
	{

	}

	/**
	 * @param $pollAttributes
	 * @param $options
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function createWithOptions($pollAttributes, $options) {

		$poll = \Poll::create($pollAttributes);

		$optionAttachment = array();
		foreach($options as $option) {
			array_push($optionAttachment,new \Option($option));
		}

		$poll->options()->saveMany($optionAttachment);

		return $poll->load('options');
	}

	/**
	 * @param $optionId
	 * @return \Vote
	 */
	public function voteForOption($optionId) {
		$vote = new \Vote(['option_id' => $optionId]);
		$vote->save();

		$votes = \Vote::where('option_id',$optionId)->count();
		return $votes;
	}

	/**
	 * @param $pollId
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function getTally($pollId) {
		$poll = \Poll::find($pollId);

		$pollWithVotes = $poll->load('options.votes');
		foreach($pollWithVotes->options as &$option) {
			$votes = count($option->votes);
			unset($option->votes);
			$option->votes = $votes;
		}

		return $pollWithVotes;
	}

}
