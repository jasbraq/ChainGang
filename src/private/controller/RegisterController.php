<?php
require_once config["CONTROLLER_FOLDER"] . "PageController.php";

class  RegisterController extends PageController
{
    public function __construct($db)
    {
        parent::__construct("Register.phtml", "register", $db);
    }

    protected function getData() : array
    {
        $data = array();
        if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["password"]) && isset($_POST["email"]))
        {
            try
            {
                $result = User::createNewUser($this->dataBase, $_POST["firstname"], $_POST["lastname"], $_POST["password"], $_POST["email"]);
                $data["succes"] = "Registreren geslaagd";
            }
            catch(Exception $e)
            {
                $data["succes"] = "Kan niet registreren";
            }
        }
        return $data;
    }
}