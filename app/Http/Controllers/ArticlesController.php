<?php namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;

use Carbon\Carbon;

use Auth;

class ArticlesController extends Controller {

	public function __construct()
	{
		$this->middleware('auth', ['except' => 'index']);
	}

	public function index()
	{
		$articles = Article::latest('published_at')->published()->get();

		return view('articles.index', compact('articles'));
	}

	public function show($id)
	{
		$article = Article::findOrFail($id);

		return view('articles.show', compact('article'));
	}

	public function create()
	{
		$tags = Tag::lists('name', 'id');
		return view('articles.create', compact('tags'));
	}

	public function store(ArticleRequest $request)
	{
		$article = Auth::user()->articles()->create($request->all());

		$article->tags()->attach($request->input('tag_list'));

		flash('Your article has been created!');

		return redirect('articles');
	}

	public function edit($id)
	{
		$article = Article::findOrFail($id);

		$tags = Tag::lists('name', 'id');

		return view('articles.edit', compact('article', 'tags'));
	}

	public function update($id, ArticleRequest $request)
	{
		$article = Article::findOrFail($id);

		$article->update($request->all());

		$article->tags()->detach();
		$article->tags()->attach($request->input('tag_list'));

		return redirect('articles');
	}
}
