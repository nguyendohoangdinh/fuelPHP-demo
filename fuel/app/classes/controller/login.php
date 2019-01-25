<?php
class Controller_Login extends Controller_Template
{
    public function action_index()
    {
        if (\Auth::check()) {
            Session::set_flash('success', 'Welcome back.');
            Response::redirect('books');
        }

        if (Input::method() == 'POST')
        {
            $val = Model_Auth::validate('create');

            if ($val->run())
            {
                $username = $val->validated('username');
                $password = $val->validated('password');
                if (\Auth::login($username, $password))
                {
                    // the user is succesfully logged in
                    Session::set_flash('success', 'Logged succesfully');
                    Response::redirect('books');
                } else {
                    Session::set_flash('error', 'Invalid username or password');
                }
            }
            else
            {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Login";
        $this->template->content = View::forge('auth/index');
    }

    public function action_logout()
    {
        Auth::logout();
        Response::redirect('login');
    }

    public function action_install()
    {
        // create a new user
        Auth::create_user(
            'mateus',
            'abc123',
            'mateus@gmail.com',
            1,
            array(
                'fullname' => 'Mateus Rovari',
            )
        );

        Response::redirect('login');
    }
}