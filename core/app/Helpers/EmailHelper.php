<?php
/**
 * Created by UniverseCode.
 */

namespace App\Helpers;

use App\{
    Models\EmailTemplate,
    Models\Setting
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\{
    PHPMailer,
    Exception
};

class EmailHelper
{

    public $mail;
    public $setting;

    public function __construct()
    {
        $this->setting = Setting::first();

        $this->mail = new PHPMailer(true);

        if($this->setting->smtp_check == 1){

            $this->mail->isSMTP();
            $this->mail->Host       = $this->setting->email_host;
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = $this->setting->email_user;
            $this->mail->Password   = $this->setting->email_pass;
            if ($this->setting->email_encryption == 'ssl') {
                 $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            } else {
                 $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            }
            $this->mail->Port           = $this->setting->email_port;
            $this->mail->CharSet        = 'UTF-8';
          
        }
    }

    public function sendTemplateMail(array $emailData)
    {
        $template = EmailTemplate::whereType($emailData['type'])->first();
        try{
            $email_body = preg_replace("/{user_name}/", $emailData['user_name'] ,$template->body);
            $email_body = preg_replace("/{order_cost}/", $emailData['order_cost'] ,$email_body);
            $email_body = preg_replace("/{transaction_number}/", $emailData['transaction_number'] ,$email_body);
            $email_body = preg_replace("/{site_title}/", $this->setting->title ,$email_body);
            
            // send with tribearc
            $this->tribearcSendMail($template->subject, $email_body, $emailData['to'], $this->setting->email_from_name, $this->setting->email_from);

            // $this->mail->setFrom($this->setting->email_from, $this->setting->email_from_name);
            // $this->mail->addAddress($emailData['to']);
            // $this->mail->isHTML(true);
            // $this->mail->Subject = $template->subject;
            // $this->mail->Body = $email_body;
            // $this->mail->send();
        }

      
        catch (Exception $e){
           // dd($e->getMessage());
        }

        return true;

    }

    public function sendCustomMail(array $emailData)
    {
        try{
            $this->tribearcSendMail($emailData['subject'], $emailData['body'], $emailData['to'], $this->setting->email_from_name, $this->setting->email_from);
            // $this->mail->setFrom($this->setting->email_from, $this->setting->email_from_name);
            // $this->mail->addAddress($emailData['to']);
            // $this->mail->isHTML(true);
            // $this->mail->Subject = $emailData['subject'];
            // $this->mail->Body = $emailData['body'];
            // $this->mail->send();

        }
        catch (Exception $e){
           // dd($e->getMessage());
        }

        return true;
    }


    public static function getEmail()
    {
        $user = Auth::user();
        if(isset($user)){
            $email = $user->email;
        }else{
            $email = Session::get('billing_address')['bill_email'];
        }
        return $email;
    }

    public function tribearcSendMail($subject, $content, $mails, $from = "El-Shaddahi Home Collections", $from_email="hello@elshaddai.com")
    {
        $curl = curl_init();
        curl_setopt(
            $curl,
            CURLOPT_URL,
            "https://mail.tribearc.com/api/campaigns/send_now.php"
        );
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); //
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST"); //
        curl_setopt($curl, CURLOPT_POSTFIELDS, [
            "api_key" => env("TribearcMail_API_KEY"),
            "from_name" => $from,
            "from_email" => $from_email,
            "reply_to" => $from_email,
            "subject" => $subject,
            "html_text" => $content,
            "track_opens" => "1",
            "track_clicks" => "1",
            "send_campaign" => "1",
            "json" => "1",
            "emails" => $mails,
            "business_address" => "Ibadan, Oyo State",
            "business_name" => "El-Shaddai Home Collections",
        ]);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Api-Token: Yo3UvyRyezbQewabuuWz",
        ]);

        $response = curl_exec($curl);

        $res = json_decode($response);
        curl_close($curl);

        return $res;
    }
}
