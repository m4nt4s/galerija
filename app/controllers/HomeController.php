<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function home()
	{
//		$categories = Category::all();
//
//		return View::make('index')->with('category', $categories);

//		$photos = Photo::with('comments')->get();
//		$categories =  Category::get(['name']);
//
//		return View::make('index')->with('photos', $photos)->with('categories', $categories);

		//dd($categories[1]['photos'][0]['comments'][1]['user']['name']);
		/*foreach ($categories as $id => $category) {
			foreach ($category['photos'] as $photos) {
				foreach ($photos['comments'] as $comment) {
					var_dump($comment);
				}
			}
			echo '<hr>';
		}*/

		$categories = Category::remember(1)->get(['name']);

		$photos = Photo::with('comments.user')->remember(1)->get();

		return View::make('index')->with('categories', $categories)->with('photos', $photos);

	}
}
