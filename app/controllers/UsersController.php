<?php

class UsersController extends \BaseController {

    public function showLogin()
    {
        //show the form
        if (Auth::check())
        {
            return Redirect::route('account');
        }

        // Show the page
        return View::make('account.log');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function doLogin()
    {
        // bandom jungtis
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails())
        {
            return Redirect::to('log')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else
        {

            // create our user data for the authentication
            $userdata = array(
                'email'    => Input::get('email'),
                'password' => Input::get('password'),
                'active'   => 1
            );

            $remember = (Input::has('remember')) ? true : false;

            // attempt to do the login
            if (Auth::attempt($userdata, $remember))
            {

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                return Redirect::route('account')
                    ->with('success', 'Jūs sėkmingai prisijungėte!');

            } else
            {

                // validation not successful, send back to form
                return Redirect::to('log')
                    ->withErrors('Slaptažodis arba el. pašto adresas yra neteisingas, arba jūsų paskyra neaktyvuota') // send back all errors to the login form
                    ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form

            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function showReg()
    {
        //show the form
        if (Auth::check())
        {
            return Redirect::route('account');
        }

        // Show the page
        return View::make('account.reg');
    }


    /******************
     * Registracija
     *******************/
    public function doReg()
    {
        $rules = [
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::to('reg')->withInput()->withErrors($validator);
        } else
        {
            $code = str_random(60);
            $username = Input::get('username');

            $user = User::create(array(
                'email'    => Input::get('email'),
                'username' => Input::get('username'),
                'name'     => Input::get('name'),
                'surname'  => Input::get('surname'),
                'password' => Hash::make(Input::get('password')),
                'code'     => $code,
                'admin'    => false,
                'active'   => false,
            ));

            if ($user)
            {

                Mail::send('emails.auth.activate', array('link' => URL::route('acc-activate', $code), 'username' => $username), function ($message) use ($user)
                {
                    $message->to($user->email, $user->username)->subject('Activate your account');
                });


                return Redirect::route('log')
                    ->with('success', 'Jūs sėkmingai užsiregistravote! Dabar pasitikrinkite savo elektroninį paštą, kad galėtumėte aktyvuoti savo paskyrą.');
            }

        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function logout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to('log'); // redirect the user to the login screen
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */

    public function activate($code)
    {
        if (Auth::check())
        {
            return Redirect::to('/');
        }


        $user = User::where('code', '=', $code)->where('active', '=', 0);

        if ($user->count())
        {
            $user = $user->first();

            //update user to active state
            $user->active = 1;
            $user->code = '';

            if ($user->save())
            {

                return Redirect::route('log')
                    ->with('success', 'Your account is activated. Now you can sign in.');
            }
        }

        return Redirect::route('log')
            ->with('success', 'WE could not activate your account. Try again later.');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
