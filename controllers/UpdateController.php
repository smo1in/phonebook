
<?php

class UpdateController
{

    public function actionAddEmail()
    {
        $param = $_POST['email'];
        $name = "email_new";
        
        require_once(ROOT . '/views/inputFormForView.php');
        return true;
    }

    public function actionAddNumber()
    {
        $param = $_POST['number'];
        $name = "num_new";
        
        require_once(ROOT . '/views/inputFormForView.php');
        return true;
    }

    public function actionUpdateUser($userId)
    {
        $post = filter_input_array(INPUT_POST);
        
        if (isset($post['email'])){
        $emails = $post['email'];
        Update::updateTable($emails,'emails','email');
        }
        if(isset($post['email_cbx'])){
        $emails_cbx = $post['email_cbx'];
        Update::updateTable($emails_cbx,'emails','public_status');
        }
        if(isset($post['email_new'])){
         $email_new = $post['email_new'];
         $cbxemail_new = $post['cbxemail_new'];
         Update::createNewId($email_new,'emails','email',$cbxemail_new,$userId);
        }
        if(isset($post['number'])){
        $numbers = $post['number'];
        Update::updateTable($numbers,'numbers','number');
        }
        if(isset($post['number_cbx'])){
        $numbers_cbx = $post['number_cbx'];
        Update::updatePublicStatus($numbers_cbx,'numbers','public_status');
        }
        if(isset($post['number_new'])){
        $number_new = $post['number_new'];
        $cbxnumber_new = $post['cbxnumber_new'];
        Update::createNewId($number_new,'numbers','number',$cbxnumber_new, $userId);
        }
        if(isset($post['first_name'])){
        $first_name = $post['first_name'];
        Update::updateUser($first_name,'first_name',$userId);
        }
        if(isset($post['last_name'])){
        $last_name = $post['last_name'];
        Update::updateUser($last_name,'last_name',$userId);
        }
        if(isset($post['address'])){
        $address = $post['address'];
        Update::updateUser($address,'address',$userId);
        }
        if(isset($post['city'])){
        $city = $post['city'];
        Update::updateUser($city,'city',$userId);
        }
        if(isset($post['country'])){
        $country = $post['country'];
        Update::updateUser($country,'country',$userId);
        }

        header("Location: /contact/index");
    }
}
