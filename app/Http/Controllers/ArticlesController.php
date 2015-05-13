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

		$this->createArticle($request);

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

		$this->syncTags($article, $request->input('tag_list'));

		return redirect('articles');
	}

	/**
	 * Description of this method.
	 *
	 * @return Response
	 */
	private function createArticle(ArticleRequest $request)
	{
		$article = Auth::user()->articles()->create($request->all());

		$this->syncTags($article, $request->input('tag_list'));
	}

	/**
	 * Description of this method.
	 *
	 * @return Response
	 */
	public function syncTags(Article $article, array $request)
	{
		$article->tags()->sync($request);
	}
}
