<?php

class CategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /category
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::with('photos')->get();

		return View::make('admin.category.index')->with('categories', $categories);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /category/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::all();

		return View::make('admin.category.create')->with('categories', $categories);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /category
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
			'name' => 'required|min:3'
		];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else
		{
			$save = Category::create([
				'name'	=> Input::get('name'),
			]);

			if($save)
			{
				return Redirect::back()->with('success', 'Nauja kategorija '.Input::get("name").' sėkmingai pridėta');
			}
		}
		return Redirect::back()->withErrors('Įvyko klaida, prašoma mėginti vėliau');
	}

	/**
	 * Display the specified resource.
	 * GET /category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = Category::with('photos')->where('id', '=', $id)->firstOrFail();

		return View::make('admin.category.photos.index')->with('category', $category);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /category/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{

		$category = Category::with('photos')->where('id', '=', $id)->first();

		/**
		 * Trinam nuotraukas iš folderio
		 */
		foreach($category->photos as $ind => $photo)
		{
			File::delete(public_path().$photo->img);
		}

		/*
		 * Trinam nuotraukas iš duomenų bazės
		 */
		Photo::where('category_id', '=', $id)->delete();

		/*
		 * Trinam kategoriją iš duomenų bazės
		 */
		$category->delete();

		return Redirect::back()->with('success', 'Kategorija su nuotraukomis ištrinta');
	}

}