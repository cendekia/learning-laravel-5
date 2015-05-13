<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model {

	protected $fillable = [
		'title',
		'body',
		'excerpt',
		'user_id',
		'published_at'
	];

	protected $dates = ['published_at'];

	public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
	}

	public function scopePublished($query)
	{
		$query->where('published_at', '<=', Carbon::now());
	}

	public function scopeUnpublished($query)
	{
		$query->where('published_at', '>=', Carbon::now());
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * Description of this method.
	 *
	 * @return Response
	 */
	public function tags()
	{
		return $this->belongsToMany('App\Tag')->withTimestamps();
	}

	/**
	 * Description of this method.
	 *
	 * @return Response
	 */
	public function getTagListAttribute()
	{
		return $this->tags->lists('id');
	}
}