<?php
class Controller_Books extends Controller_Template
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
        $data['books'] = Model_Book::find('all');
        $this->template->title = "Books";
        $this->template->content = View::forge('books/index', $data);

    }

    public function action_view($id = null)
    {
        is_null($id) and Response::redirect('books');

        if ( ! $data['book'] = Model_Book::find($id))
        {
            Session::set_flash('error', 'Could not find book #'.$id);
            Response::redirect('books');
        }
        
        $this->template->title = "Book";
        $this->template->content = View::forge('books/view', $data);

    }

    public function action_create()
    {
        if (Input::method() == 'POST')
        {
            $val = Model_Book::validate('create');

            if ($val->run())
            {
                $book = Model_Book::forge(array(
                    'author' => Input::post('author'),
                    'document' => Input::post('document'),
                    'year' => Input::post('year'),
                    'pages' => Input::post('pages'),
                    'price' => Input::post('price'),
                ));

                if ($book and $book->save())
                {
                    Session::set_flash('success', 'Added book #'.$book->id.'.');

                    Response::redirect('books');
                }

                else
                {
                    Session::set_flash('error', 'Could not save book.');
                }
            }
            else
            {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Books";
        $this->template->content = View::forge('books/create');

    }

    public function action_edit($id = null)
    {
        is_null($id) and Response::redirect('books');

        if ( ! $book = Model_Book::find($id))
        {
            Session::set_flash('error', 'Could not find book #'.$id);
            Response::redirect('books');
        }

        $val = Model_Book::validate('edit');

        if ($val->run())
        {
            $book->author = Input::post('author');
            $book->document = Input::post('document');
            $book->year = Input::post('year');
            $book->pages = Input::post('pages');
            $book->price = Input::post('price');

            if ($book->save())
            {
                Session::set_flash('success', 'Updated book #' . $id);

                Response::redirect('books');
            }

            else
            {
                Session::set_flash('error', 'Could not update book #' . $id);
            }
        }

        else
        {
            if (Input::method() == 'POST')
            {
                $book->author = $val->validated('author');
                $book->document = $val->validated('document');
                $book->year = $val->validated('year');
                $book->pages = $val->validated('pages');
                $book->price = $val->validated('price');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('book', $book, false);
        }

        $this->template->title = "Books";
        $this->template->content = View::forge('books/edit');

    }

    public function action_delete($id = null)
    {
        is_null($id) and Response::redirect('books');

        if ($book = Model_Book::find($id))
        {
            $book->delete();

            Session::set_flash('success', 'Deleted book #'.$id);
        }

        else
        {
            Session::set_flash('error', 'Could not delete book #'.$id);
        }

        Response::redirect('books');

    }

}
