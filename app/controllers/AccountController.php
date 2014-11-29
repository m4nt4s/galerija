<?php

class AccountController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function showDash()
    {
        return View::make('account.dash');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function changePassIndex()
    {
        return View::make('account/change-pass');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function changePassPost()
    {
        // Declare the rules for the form validation
        $rules = array(
            'old_password'     => 'required|between:3,32',
            'password'         => 'required|between:3,32',
            'password_confirm' => 'required|same:password',
        );
        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $user = User::findOrFail(Auth::id());

        $pass = Input::get('old_password');
        $new_pass = Input::get('password');

        if (Hash::check($pass, $user->password))
        {
            $user->password = Hash::make($new_pass);
            $user->save();
        }
        else
        {
            return Redirect::back()->withErrors('Senas slaptažodis neatitinka esamo slaptažodžio');
        }

        return Redirect::route('change-pass')->with('success', 'Slaptažodis sėkmingai atnaujintas');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function changeEmailIndex()
    {
        return View::make('account/change-email');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function changeEmailPost()
    {
        // Declare the rules for the form validation
        $rules = array(
            'old_email'     => 'required|email',
            'email'         => 'required|email',
            'email_confirm' => 'required|same:email',
        );
        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $user = User::findOrFail(Auth::id());

        $email = Input::get('old_email');
        $new_email = Input::get('email');


        if ($email == $user->email)
        {
            $user->email = $new_email;
            $user->save();
        }
        else
        {
            return Redirect::back()->withErrors('Neteisingas senas elektroninio pašto adresas');
        }

        return Redirect::route('change-email')->with('success', 'Elektroninis paštas sėkmingai atnaujintas');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function changeInfoIndex()
    {
        return View::make('account/change-info');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function changeInfoPost()
    {

        // Declare the rules for the form validation
        $rules = array(
            'name'     => 'min:3',
            'surname'  => 'min:3',
            'username' => 'min:3',
            'country'  => 'min:3',
            'city'     => 'min:3',
            'address'  => 'min:3',
            'phone'    => 'min:3',
        );
        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $user = User::findOrFail(Auth::id());

        if ($user)
        {
            //return Input::all();
            $user->name = Input::get('name');
            $user->surname = Input::get('surname');
            $user->username = Input::get('username');
            $user->city = Input::get('city');
            $user->country = Input::get('country');
            $user->phone = Input::get('phone');
            $user->address = Input::get('address');
            $user->save();
        }
        else
        {
            return Redirect::back()->withErrors('Įvyko klaida');
        }

        return Redirect::route('change-info')->with('success', 'Informacija sėkmingai atnaujinta');
    }
}
