<?php

namespace User\Controllers;

use App\Controllers\BaseController;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use User\Libraries\UserLib;

class Student extends BaseController
{
    protected string $module_name = 'UserManagement';

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function index(): string
    {
        $userModel  = new UserLib();
        $csrf_token = csrf_token();
        $csrf_hash  = csrf_hash();

        $students = $userModel->getAllStudent();

        return $this->twig->renderView('studentManager.php.twig', [
            'students'   => $students,
            'csrf_token' => $csrf_token,
            'csrf_hash'  => $csrf_hash,
        ]);
    }

    public function crud(): \CodeIgniter\HTTP\ResponseInterface
    {
        if ($this->request->getMethod() === 'POST') {
            $userModel = new UserLib();
            $delete_id = $this->request->getPost('delete_id');
            if ($delete_id) {
                $userModel->deleteUser($delete_id);

                return redirect()->back();
            }
            $create_id = $this->request->getPost('create_id');
            if ($create_id) {
                $data = [
                    'username'      => $this->request->getPost('create_username'),
                    'password'      => $this->request->getPost('create_password'),
                    'flag'          => 2,
                    'status'        => 1,
                    'last_login_at' => null,
                    'created_at'    => date('Y-m-d H:i:s'),
                ];
                $userModel->createUser($data);

                return redirect()->back();
            }
            $change_id = $this->request->getPost('change_id');
            if ($change_id) {
                $data2 = [
                    'username'   => $this->request->getPost('update_username'),
                    'password'   => $this->request->getPost('update_password'),
                    'status'     => $this->request->getPost('update_status'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $userModel->updateUser($change_id, $data2);

                return redirect()->back();
            }
        }

        return redirect()->back();
    }
}
