<?php

class PhotosController extends \BaseController
{

    /**
     * Display a listing of the resource.
     * GET /photos
     *
     * @return Response
     */
    public function index()
    {
        $photos = Photo::all();

        return View::make('admin.photos.index')->with('photos', $photos);
    }

    /**
     * Show the form for creating a new resource.
     * GET /photos/create
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();

        return View::make('admin.photos.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     * POST /photos
     *
     * @return Response
     */
    public function store()
    {
        $rules = array(
            'title' 	=> 'required|min:3',
            'category' 	=> 'required',
            'photo' 	=> 'required|image|mimes:jpg,jpeg,png,bmp,gif',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::back()
                ->withInput(Input::except(array('photo')))
                ->withErrors($validator);
        }
        else
        {
            $image = Input::file('photo');
            if ($image->isValid())
            {
                $filename = time().$image->getClientOriginalName();
                $path = public_path() . '/uploads/' . $filename;

                if (file_exists($path)) {
                    return Redirect::back()
                        ->withInput(Input::except(array('image')))
                        ->withErrors('Tokiu pavadinimu nuotrauka jau egzistuoja');
                }
				else
				{
                    $destinationPath = public_path() . '\uploads';

                    $save = Photo::create([
                        'title' 		=> Input::get('title'),
                        'category_id' 	=> Input::get('category'),
                        'img' 			=> '/uploads/'.$filename
                    ]);

                    $upload = $image->move($destinationPath, $filename);

                    if ($upload && $save)
					{

                        return Redirect::back()->with('success', 'Jūsų pasirinkta nuotrauka sėkmingai pridėta');
                    }
					else
					{

                        return Redirect::back()->withErrors('Dėl sistemos klaidos nuotrauka negalėjo būti pridėta. Prašome bandyti vėliau');
                    }
                }
            } else
			{

                return Redirect::back()->withErrors('Blogas failas');
            }
        }
    }

    /**
     * Display the specified resource.
     * GET /photos/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /photos/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $photo = Photo::with('category')->where('id', '=', $id)->first();

        return View::make('admin.photos.edit')->with('photo', $photo)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     * PUT /photos/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $photo = Photo::where('id', '=', $id)->first();

        $photo->title = Input::get('title');
        $photo->category_id = Input::get('category');
        $photo->save();

        return Redirect::back()->with('success', 'Sėkmingai atnaujinote nuotrauką');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /photos/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        return $id.' Galima trinti';
    }

	public function delete($id)
	{
		$photo = Photo::where('id', '=', $id)->firstOrFail();
		File::delete(public_path().$photo->img);
		Photo::where('id', '=', $id)->delete();

		return Redirect::back()->with('success', 'Nuotrauka sėkmingai pašalinta');
	}

}