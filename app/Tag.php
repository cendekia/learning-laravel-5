<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	/**
	 * Description of this method.
	 *
	 * @return Response
	 */
	public function articles()
	{
		return $this->belongsToMany('App\Article');
	}

}
