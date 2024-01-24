<?php

declare(strict_types=1);

namespace Main\Controllers;

use Main\Models\User;
use Library\Request;
use Main\Models\Order;
use Services\CartService;
//use Controllers\PageNotFoundException;
use Library\Controller;
use Library\Response;
use Library\VivaWalletApi;
use Services\DiscountService;
use Validation\RegistrationValidation;
use Library\Database;
//use Library\Exceptions\PageNotFoundException;
use PDO;
use Services\SessionService;
use Validation\UserValidation;

class Users extends Controller
{
//    private $database;
    public function __construct(private User $model,
                                private Database $database,
                                private SessionService $session
                                )

    {

    }

    public function index(): Response
    {
        $orders = $this->model->findAll();

        return $this->view("/index.template.php", [
            "orders" => $orders,
        ]);
    }

    public function register(): Response
    {

        return $this->view("Users/register.template.php");
    }

    public function userLogin(): Response
    {

        $errors = RegistrationValidation::validate($this->request->post);

        if (!empty($errors)) {

            return $this->view("Users/register.template.php", [
                "errors" => $this->model->getErrors(),
            ]);

        }

//        $this->model->find(['email'=>$this->request->post["email"]]);
        $conn = $this->database->getConnection();

        $sql = "SELECT *
                FROM users
                WHERE email = :email ";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":email", $this->request->post["email"], PDO::PARAM_STR);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        if (password_verify($this->request->post['password'], $user['password'])) {

            $__session = [
                "user_id" => $user["id"],
                "firstname" => $user["firstname"],
                "lastname" => $user["lastname"],
                "email" => $user["email"],
                "roles" => $user["roles"],
                "loggedIn" => true
            ];

            $this->session->updateSession($__session);

            return $this->redirect("/");
        }


        return $this->view("Users/login.template.php",[
            "errors" => "Invalid password"
        ]);

    }
    public function login(): Response
    {

        return $this->view("Users/login.template.php");
    }


    public function edit(string $id): Response
    {
        $user = $this->model->find($id);

        return $this->view("Users/edit.template.php", [
            "user" => $user
        ]);
    }


    public function create(): Response
    {


        $errors = RegistrationValidation::validate($this->request->post);

        if (!empty($errors)) {

            return $this->view("Users/register.template.php", [
                "errors" => $this->model->getErrors(),
            ]);

        }

        $conn = $this->database->getConnection();

        $sql = "SELECT *
                FROM users
                WHERE email = :email";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":email", $this->request->post["email"], PDO::PARAM_STR);

        $stmt->execute();

        $check = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($check)) {

            return $this->view("Users/register.template.php", [
                "errors" => "User using this email is already registered!",
            ]);

        }

        $data = [
            "email" => $this->request->post["email"],
            "password" => password_hash($this->request->post["password"], PASSWORD_DEFAULT),
            "roles"=> "C",
        ];

        if ($this->model->insert($data)) {
            return $this->view("Users/success.template.php", []);

        } else {

            return $this->view("Products/new.mvc.php", [
                "errors" => $this->model->getErrors(),
                "product" => $data
            ]);

        }
    }

    public function update(string $id): Response
    {

        $errors = UserValidation::validate($this->request->post);

        if (!empty($errors)) {
            $user = $this->model->find($this->request->post['id']);

            $this->session->updateSession(["errors"=>$errors]);
            return $this->redirect("/users/".$this->request->post['id']."/edit");

        }

        $user["email"] = !empty($this->request->post["email"]) ? $this->request->post["email"]:"";
        $user["firstname"] = !empty($this->request->post["firstname"]) ? $this->request->post["firstname"] : "";
        $user["lastname"] = !empty($this->request->post["lastname"]) ? $this->request->post["lastname"] : "";
        $user["coupon"] = !empty($this->request->post["coupon"]) ? $this->request->post["coupon"] : "";

        if ($this->model->update($this->request->post["id"], $user)) {

            return $this->redirect("/users/{$id}/edit");

        } else {

            return $this->view("Users/edit.template.php", [
                "errors" => $this->model->getErrors(),
                "user" => $user
            ]);

        }
    }




}