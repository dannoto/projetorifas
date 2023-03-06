<?php


defined('BASEPATH') or exit('No direct script access allowed');



require './vendor/autoload.php';

// use AC\SDK\Models\Email; // import the Email class
// use AC\SDK\Models\DTO\Email; // import the Email class
// use AC\SDK\Models\Mail\Email; // import the Email class


class Teste extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('register_model');
        $this->load->model('login_model');
        $this->load->model('user_model');
        $this->load->model('email_model');

        $this->load->model('raffles_model');
        $this->load->model('payments_model');
        $this->load->model('cart_model');
    }


    public function email() {

        $data = array(
            'user_email' => 'danrib2018@gmail.com',
            'user_token' => '12345',
            'user_name' => 'Daniel',

        );
        if ($this->email_model->teste($data)) {
            echo "foi";
        } else {
            echo "n foi";
        }
    }
    function addList($ac)
    {

        $list = array(
            "name"           => "Betraffle Usuários",
            "sender_name"    => "Betraffle",
            "sender_addr1"   => "123 S. Street",
            "sender_city"    => "Rio de Janeiro",
            "sender_zip"     => "60601",
            "sender_country" => "BRL",
        );

        $list_add = $ac->api("list/add", $list);

        if (!(int)$list_add->success) {
            // request failed
            // echo "<p>Adding list failed. Error returned: " . $list_add->error . "</p>";
            // exit();
            return false;
        } else {

            return (int)$list_add->id;
        }
    }

    function addUserToList($ac, $list_id, $user_name, $user_surname, $user_email)
    {

        $contact = array(
            "email"              => $user_email,
            "first_name"         => $user_name,
            "last_name"          => $user_surname,
            "p[{$list_id}]"      => $list_id,
            "status[{$list_id}]" => 1, // "Active" status
        );

        $contact_sync = $ac->api("contact/sync", $contact);

        if (!(int)$contact_sync->success) {
            // request failed
            // echo "<p>Syncing contact failed. Error returned: " . $contact_sync->error . "</p>";
            // exit();
            return false;
        } else {

            return (int)$contact_sync->subscriber_id;
        }

        // successful request
        // $contact_id = (int)$contact_sync->subscriber_id;
        // echo "<p>Contact synced successfully (ID {$contact_id})!</p>";
    }

    function sendEmail($ac, $to = "danrib2018@gmail.com", $subject = "teste integração")
    {

        $email = new Email(); // create a new Email object
        $email->setTo($to); // set the recipient email address
        $email->setFrom('contato@ccoanalitica.com'); // set the sender email address
        $email->setSubject($subject); // set the email subject
        $email->setHtml("<p>This is a test email</p>"); // set the email content

        $response = $ac->email()->send($email); // send the email using the ActiveCampaign API

        print_r($response); // print the API response
        
    }


    public function index()
    {




        // Configurações da API

        // require_once("includes/ActiveCampaign.class.php");

        $ac = new ActiveCampaign("ccoanalitica.api-us1.com", "1b5a7e8977733ac82f16f86eebd298af6778e1003db0342d686c1f5439eaa2cd77ba4414");

        /*
         * TEST API CREDENTIALS.
         */

        if (!(int)$ac->credentials_test()) {
            echo "<p>Access denied: Invalid credentials (URL and/or API key).</p>";
            exit();
        }

        echo "<p>Credentials valid! Proceeding...</p>";

        /*
         * VIEW ACCOUNT DETAILS.
         */

        $account = $ac->api("account/view");

        echo "<pre>";
        print_r($account);
        echo "</pre>";


        // Add List
        // $add_lista = $this->addList($ac);

        // if ($add_lista) {
        //     echo "Lista criada com sucesso: ".$add_lista;
        // } else {
        //     echo "Erro ao criar lista";
        // }

        // Add Contact 
        // $add_user = $this->addUserToList($ac, $list_id, $user_name, $user_surname, $user_email);

        // if ($add_user) {
        //     echo "Usuario criada com sucesso: ".$add_user;
        // } else {
        //     echo "Erro ao criar usuario";
        // }

        // Send Email
        $send_email = $this->sendEmail($ac);

        // if ($send_email) {
        // } else {
        //     //     echo "Erro ao criar usuario";

        // }




        /*
         * ADD NEW LIST.
         */

        // $list = array(
        //     "name"           => "List 3",
        //     "sender_name"    => "My Company",
        //     "sender_addr1"   => "123 S. Street",
        //     "sender_city"    => "Chicago",
        //     "sender_zip"     => "60601",
        //     "sender_country" => "USA",
        // );

        // $list_add = $ac->api("list/add", $list);

        // if (!(int)$list_add->success) {
        //     // request failed
        //     echo "<p>Adding list failed. Error returned: " . $list_add->error . "</p>";
        //     exit();
        // }

        //     // successful request
        //     $list_id = (int)$list_add->id;
        //     echo "<p>List added successfully (ID {$list_id})!</p>";

        // /*
        //  * ADD OR EDIT CONTACT (TO THE NEW LIST CREATED ABOVE).
        //  */

        // $contact = array(
        //     "email"              => "test@example.com",
        //     "first_name"         => "Test",
        //     "last_name"          => "Test",
        //     "p[{$list_id}]"      => $list_id,
        //     "status[{$list_id}]" => 1, // "Active" status
        // );

        // $contact_sync = $ac->api("contact/sync", $contact);

        // if (!(int)$contact_sync->success) {
        //     // request failed
        //     echo "<p>Syncing contact failed. Error returned: " . $contact_sync->error . "</p>";
        //     exit();
        // }

        //     // successful request
        //     $contact_id = (int)$contact_sync->subscriber_id;
        //     echo "<p>Contact synced successfully (ID {$contact_id})!</p>";

        // /*
        //  * VIEW ALL CONTACTS IN A LIST (RETURNS ID AND EMAIL).
        //  */

        // $ac->version(2);
        // $contacts_view = $ac->api("contact/list?listid=14&limit=500");

        // $ac->version(1);

        // /*
        //  * ADD NEW EMAIL MESSAGE (FOR A CAMPAIGN).
        //  */

        // $message = array(
        //     "format"        => "mime",
        //     "subject"       => "Check out our latest deals!",
        //     "fromemail"     => "newsletter@test.com",
        //     "fromname"      => "Test from API",
        //     "html"          => "<p>My email newsletter.</p>",
        //     "p[{$list_id}]" => $list_id,
        // );

        // $message_add = $ac->api("message/add", $message);

        // if (!(int)$message_add->success) {
        //     // request failed
        //     echo "<p>Adding email message failed. Error returned: " . $message_add->error . "</p>";
        //     exit();
        // }

        //     // successful request
        //     $message_id = (int)$message_add->id;
        //     echo "<p>Message added successfully (ID {$message_id})!</p>";

        // /*
        //  * CREATE NEW CAMPAIGN (USING THE EMAIL MESSAGE CREATED ABOVE).
        //  */

        // $campaign = array(
        //     "type"             => "single",
        //     "name"             => "July Campaign", // internal name (message subject above is what contacts see)
        //     "sdate"            => "2013-07-01 00:00:00",
        //     "status"           => 1,
        //     "public"           => 1,
        //     "tracklinks"       => "all",
        //     "trackreads"       => 1,
        //     "htmlunsub"        => 1,
        //     "p[{$list_id}]"    => $list_id,
        //     "m[{$message_id}]" => 100, // 100 percent of subscribers
        // );

        // $campaign_create = $ac->api("campaign/create", $campaign);

        // if (!(int)$campaign_create->success) {
        //     // request failed
        //     echo "<p>Creating campaign failed. Error returned: " . $campaign_create->error . "</p>";
        //     exit();
        // }

        //     // successful request
        //     $campaign_id = (int)$campaign_create->id;
        //     echo "<p>Campaign created and sent! (ID {$campaign_id})!</p>";

        // /*
        //  * VIEW CAMPAIGN REPORTS (FOR THE CAMPAIGN CREATED ABOVE).
        //  */

        // $campaign_report_totals = $ac->api("campaign/report/totals?campaignid={$campaign_id}");

        // echo "<p>Reports:</p>";
        // echo "<pre>";
        // print_r($campaign_report_totals);
        // echo "</pre>";

    }
}
