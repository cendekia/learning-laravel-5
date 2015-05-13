<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $fillable = [
		'name'
	];

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
