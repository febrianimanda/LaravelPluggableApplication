<?php

use Illuminate\Auth\Reminders\RemindableInterface;

class LearningSession extends Eloquent implements RemindableInterface{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sessions';
	public function getReminderEmail()
	{
		return $this->email;
	}
}