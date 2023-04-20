<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{

    public function IndexAction()
    {
        //this is the default function
    }

    public function registerAction()
    {
        $user = new Users();

        $user->assign(
            $this->request->getPost(),
            [
                'name',
                'email'
            ]
        );

        $success = $user->save();

        $this->view->success = $success;

        if ($success) {
            $this->view->message = "The name of the app is " . $this->config->app->name;
        } else {
            $this->view->message = "Not Register succesfully due to following reason: <br>" . \
            implode("<br>", $user->getMessages());
        }
    }
}
