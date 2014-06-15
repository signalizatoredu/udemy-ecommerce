<?php

require_once('PHPMailer/PHPMailer.php');

class Email {
    
    private $objMailer;
    
    public function __construct() {

        $this->objMailer = new PHPMailer();
        $this->objMailer->IsSMTP();
        
        // added by Marley 
        
        $this->objMailer->SMTPSecure = 'tls'; 
        // $this->objMailer->SMTPDebug = 1;

        $this->objMailer->SMTPAuth = true;
        $this->objMailer->SMTPKeepAlive = true;
        $this->objMailer->Host = "smtp.gmail.com";
        
        $this->objMailer->Port = 587;
        $this->objMailer->Username = "your_mail@gmail.com";
        $this->objMailer->Password = "your_password";
        $this->objMailer->SetFrom("your_mail@gmail.com", "YourName");
        $this->objMailer->AddReplyTo("your_mail@gmail.com", "YourName");
    }
    
    public function process($case = null, $array = null){
        if (!empty($case)){
            
            switch ($case){
                case 1:
                   
                    // add url to the array
                    $link  = "<a href=\"".SITE_URL."/?page=activate&code=";
                    $link .= $array['hash'];
                    $link .= "\">";
                    $link .= SITE_URL."/?page=activate&code=";
                    $link .= $array['hash'];
                    $link .= "</a>";
                                       
                    $array['link'] = $link;
                    
                    $this->objMailer->Subject = "Activate your account";
                    $this->objMailer->MsgHTML($this->fetchEmail($case, $array));
                    $this->objMailer->AddAddress($array['email'], $array['first_name'].' '.$array['last_name']);
                    break;
            }
            // send email

            if ($this->objMailer->Send()){
                $this->objMailer->ClearAddresses();
            return true;
            }
        return false;
        }   
    }
      
    public function fetchEmail($case = null, $array = null){
        if (!empty($case)){
            if (!empty($array)){
                foreach ($array as $key => $value){
                    ${$key} = $value;
                }
            }
            ob_start();
            require_once (EMAILS_PATH.DS.$case.".php");
            
            $out = ob_get_clean();
            
            return $this->wrapEmail($out);
        }
    }
    
    
    public function wrapEmail($content = null){
        if (!empty($content)){
            return "<div style=\"font-family:Arial,Verdana,Sans-serif;font-size:12px;color:#333;line-height:21px;\">{$content}</div>";
        }
    }

 
   // class end;
}

