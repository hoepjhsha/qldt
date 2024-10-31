<?php

namespace Exam\Controllers;

use App\Controllers\BaseController;
use Exam\Libraries\CourseLib;
use ReflectionException;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class Course extends BaseController
{
    protected string $module_name = 'ExamManagement';

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function index(): string
    {
        if (session()->has('user')) {
            $user_info = session()->get('user')['name'];
            $user_info = ucwords($user_info);
            $user_flag = session()->get('user')['flag_name'];
        } else {
            $user_info = 'Guest';
        }

        $csrf_token = csrf_token();
        $csrf_hash  = csrf_hash();

        $model   = new CourseLib();
        $courses = $model->getAll();

        return $this->twig->renderView('index.html.twig', [
            'user'       => $user_info,
            'user_flag'  => $user_flag,
            'csrf_token' => $csrf_token,
            'csrf_hash'  => $csrf_hash,
            'courses'    => $courses,
        ]);
    }

    /**
     * @throws ReflectionException
     */
    public function bruh(): \CodeIgniter\HTTP\ResponseInterface
    {
        if ($this->request->getMethod() === 'POST') {
            $form      = new CourseLib();
            $create_id = $this->request->getPost('create_id');
            if ($create_id) {
                $form->course_name = $this->request->getPost('create_course_name');
                if ($form->addCourse()) {
                    return redirect()->back();
                }
            }

            $change_id = $this->request->getPost('change_id');
            if ($change_id) {
                $data = [
                    'course_name' => $this->request->getPost('update_course_name'),
                ];
                if ($form->updateCourse($change_id, $data)) {
                    return redirect()->back();
                }
            }

            $delete_id = $this->request->getPost('delete_id');
            if ($delete_id) {
                if ($form->deleteCourse($delete_id)) {
                    return redirect()->back();
                }
            }
        }

        return redirect()->back();
    }
}
