<?php
class Controller_Users extends Controller_Template
{
    public function before()
    {
        parent::before();

        if (!\Auth::check()) {
            Session::set_flash('error', 'Please Login');
            Response::redirect('login');
        }
    }

    public function action_index()
    {
        $data['users'] = Model_User::find('all');
        $this->template->title = "Users";
        $this->template->content = View::forge('users/index', $data);

    }

    public function action_view($id = null)
    {
        is_null($id) and Response::redirect('users');

        if ( ! $data['user'] = Model_User::find($id))
        {
            Session::set_flash('error', 'Could not find user #'.$id);
            Response::redirect('users');
        }

        $this->template->title = "User";
        $this->template->content = View::forge('users/view', $data);

    }

    public function action_create()
    {
        $data = array('create'=>true);
        if (Input::method() == 'POST')
        {
            $val = Model_User::validate('create');

            if ($val->run())
            {
                try
                {
                    $user_id = Auth::create_user(
                        $val->validated('username'),
                        Input::post('password'),
                        $val->validated('email'),
                        1,
                        array()
                    );

                    Session::set_flash('success', 'Added user #'.$user_id.'.');
                    Response::redirect('users');
                }
                catch (Exception $e)
                {
                    // var_dump($e->getMessage());exit;
                    Session::set_flash('error', 'Could not save user.');
                }
            }
            else
            {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Users";
        $this->template->content = View::forge('users/create', $data);

    }

    public function action_edit($id = null)
    {
        is_null($id) and Response::redirect('users');

        if ( ! $user = Model_User::find($id))
        {
            Session::set_flash('error', 'Could not find user #'.$id);
            Response::redirect('users');
        }

        $val = Model_User::validate('edit');

        if ($val->run())
        {
            $user->username = Input::post('username');
            // $user->password = Input::post('password');
            $user->email = Input::post('email');

            if ($user->save())
            {
                Session::set_flash('success', 'Updated user #' . $id);

                Response::redirect('users');
            }

            else
            {
                Session::set_flash('error', 'Could not update user #' . $id);
            }
        }

        else
        {
            if (Input::method() == 'POST')
            {
                $user->username = $val->validated('username');
                $user->email = $val->validated('email');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('user', $user, false);
        }

        $this->template->title = "Users";
        $this->template->content = View::forge('users/edit');

    }

    public function action_delete($id = null)
    {
        is_null($id) and Response::redirect('users');

        if ($user = Model_User::find($id))
        {
            $user->delete();

            Session::set_flash('success', 'Deleted user #'.$id);
        }

        else
        {
            Session::set_flash('error', 'Could not delete user #'.$id);
        }

        Response::redirect('users');

    }

}
