<?php

/****************************** require function ***************************** */
function valid_data_require($var_input_data,$key_of_var)
{
    return empty($var_input_data) ? "$key_of_var is required" : null;
}

/***************************sub check validation function ********************************** */ 
function valid_email($email)
{
    return filter_var($email,FILTER_VALIDATE_EMAIL) ? null:"invalid email, you hack me man !!";
}
function valid_phone($phone)
{
   $phone =strlen($phone);
    return (is_numeric($phone)&& $phone>10 && $phone<15)?null:"can you enter your phone ture";
}
function valid_password($password) 
    {
        $uppercase = preg_match('/[A-Z]/', $password);
        $lowercase = preg_match('/[a-z]/', $password);
        $number    = preg_match('/[0-9]/', $password);
        $length    = strlen($password) >= 8;
        switch ($password) {
            case !$uppercase:
                return "Password must contain at least one uppercase letter";
            case !$lowercase: 
                return "Password must contain at least one lowercase letter";
            case !$number:
                return "Password must contain at least one number";
            case !$length:
                return "Password must be at least 8 characters long";
            default:
                return null;
        }
    }

/********************************validation of register function *********************************** */
function valid_register($name,$email,$password){       
    $data_reg=[
        'name'=>htmlspecialchars($name),
        'email'=>htmlspecialchars($email),
        'password'=>htmlspecialchars($password),
            ];

    foreach($data_reg as $key =>$value)
    {
        if(valid_data_require($value,$key)){
            return $type_of_error = valid_data_require($value,$key);
        }
    }
    
if($type_of_error =  valid_email($email))
        {
    return $type_of_error; 
    }

if( $type_of_error=  valid_password($password))
    {
    return $type_of_error ;
    }
    return null; 
}
/**************************** login validation function ********************************* */

function valid_login($email,$password){
    $data_login=[
        'email'=>htmlspecialchars($email),
        'password'=>htmlspecialchars($password),
    ];
    // print_r($data_login); exit;
    foreach($data_login as $key => $value)
    {
        if($type_of_error =valid_data_require($value,$key))
        {
            return $type_of_error ;
        }
    }
    if($type_of_error = valid_email($email))
    {
        return $type_of_error;
    }
        return null; 
}



