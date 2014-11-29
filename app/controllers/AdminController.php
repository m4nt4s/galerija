<?php


class AdminController extends \BaseController {

    public function show()
    {
        $photosAll = Photo::all();
        $categoriesAll = Category::all();

        return View::make('admin.admin')->with(['photosAll' => $photosAll, 'categoriesAll' => $categoriesAll]);
    }
} 