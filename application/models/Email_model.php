<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;


require './vendor/autoload.php';


require("./PHPMailer-master/src/PHPMailer.php");
require("./PHPMailer-master/src/SMTP.php");

class email_model extends CI_Model
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('register_model');
        $this->load->model('login_model');
        $this->load->model('user_model');
        $this->load->model('email_model');
        $this->load->model('admin_model');
    }

    // Active Campaign AddTo List
    public  function addUserToList($list_id, $user_name, $user_surname, $user_email)
    {

        try {


            $active_url = $this->admin_model->getGateways()['gateway_act_public'];
            $active_token = $this->admin_model->getGateways()['gateway_act_secret'];

            $ac = new ActiveCampaign($active_url, $active_token);


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

                // return (int)$contact_sync->subscriber_id;
                return true;
            }

            // successful request
            // $contact_id = (int)$contact_sync->subscriber_id;
            // echo "<p>Contact synced successfully (ID {$contact_id})!</p>";
        } catch (Exception $e) {
            return false;
        }
    }


    public function teste($user_data)
    {

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP(); // enable SMTP
        $mail->CharSet = "UTF-8";
        $mail->SMTPDebug = false; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "sh-pro112.hostgator.com.br";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "contato@betraffle.com.br";
        $mail->Password = "6bamG$?X]uUm";
        $mail->SetFrom("contato@betraffle.com.br", "Betraffle");
        $mail->Subject = "Assunto da mensagem";
        $mail->AddAddress($user_data['user_email'], $user_data['user_name']);


        $mail->Body = "Escreva o texto do email aqui";


        if ($mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Mensagem enviada com sucesso";
        };
    }

    public function welcomeUser()
    {
        return true;
    }

    public function SendRecovery($user_data)
    {


        try {

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            $mail->CharSet = "UTF-8";
            $mail->SMTPDebug = false; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "sh-pro112.hostgator.com.br";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = "contato@betraffle.com.br";
            $mail->Password = "6bamG$?X]uUm";
            $mail->SetFrom("contato@betraffle.com.br", "Betraffle");

            $mail->Subject = 'Redefinição de Senha';

            $mail->AddAddress($user_data['user_email'], $user_data['user_name']);


            $mail->Body  = '
            
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
    
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                    <meta name="viewport" content="width=device-width, minimal-ui, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="format-detection" content="telephone=no, date=no, email=no, address=no">
                    <meta name="x-apple-disable-message-reformatting">
                    <title></title>
    
                    <link rel="stylesheet" href="/campaign/stripo/css/custom.css" type="text/css">
                </head>
    
                <body class="es-wrapper-color">
                    <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td class="esd-email-paddings" valign="top">
                                    <table cellpadding="0" cellspacing="0" class="es-content esd-header-popover" align="center">
                                        <tbody>
                                            <tr>
                                                <td class="esd-stripe" align="center" bgcolor="#ffffff" style="background-color: #ffffff;">
                                                    <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="590">
                                                        <tbody>
                                                            <tr>
                                                                <td class="esd-structure es-p20t es-p20r es-p20l" align="left">
                                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td width="550" class="esd-container-frame" align="center" valign="top">
                                                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://content.app-us1.com/RG0yM/2023/03/05/c8aa1248-c820-409e-9444-a824470d46b7.png" alt style="display: block;" data-cf-ir-is-resized="true" data-cf-ir-should-resize-image="true" width="333" data-cf-ir-no-srcset="true"></a></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="esd-structure" align="left">
                                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td width="650" class="esd-container-frame" align="center" valign="top">
                                                                                    <table cellpadding="0" cellspacing="0" width="100%" style="border-radius: 5px; border-collapse: separate;">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td align="center" class="esd-block-text es-p20t">
                                                                                                    <p style="font-family: ' . 'open sans' . ', ' . 'helvetica neue' . ', helvetica, arial, sans-serif; font-size: 20px;"><strong>Redefinição de Senha</strong></p>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td align="center" class="esd-block-text es-p20t es-p25b es-p25r es-p25l">
                                                                                                    <p style="font-family: ' . 'open sans' . ', ' . 'helvetica neue' . ', helvetica, arial, sans-serif;">Clique no botão abaixo para redefinir sua senha.</p>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="esd-structure es-p20t es-p30b es-p20r es-p20l" align="left">
                                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td width="550" class="esd-container-frame" align="center" valign="top">
                                                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                                                        <tbody>
    
                                                                                            <tr>
                                                                                                <td align="center" class="esd-block-button" syle="margin:20px">
                                                                          <span class="msohide es-button-border" style="border-width: 0px; background: #ffbd0a;padding:12px;"><a href="https://betraffle.com.br/redefinicao/t/' . $user_data['user_token'] . '" class="es-button es-button-1653515864223" target="_blank" style="color: #ffffff; font-family: &quot;open sans&quot;, &quot;helvetica neue&quot;, helvetica, arial, sans-serif; font-weight: bold; border-width: 10px 25px; background: #ffbd0a; border-color: #ffbd0a;text-decoration:none">REDEFINIR</a></span>
    
                                                                                                </td>
                                                                                            </tr>
                                                                                            <br>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="esd-structure es-p20" align="left">
                                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td width="550" class="esd-container-frame" align="center" valign="top">
                                                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td align="center" class="esd-block-text">
                                                                                                    <p>https://betraffle.com.br/redefinicao/t/' . $user_data['user_token'] . '</p>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
    
                                </td>
                            </tr>
                        </tbody>
                    </table>
    
                </body>

            </html>';

            if ($mail->Send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function paymentApproved($user_data, $order_data)
    {

        try {

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            $mail->CharSet = "UTF-8";
            $mail->SMTPDebug = false; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "sh-pro112.hostgator.com.br";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = "contato@betraffle.com.br";
            $mail->Password = "6bamG$?X]uUm";
            $mail->SetFrom("contato@betraffle.com.br", "Betraffle");

            $mail->Subject = 'Pagamento Aprovado';

            $mail->AddAddress($user_data['user_email'], $user_data['user_name']);

            $mail->Body    = '<td class="esd-stripe" align="center" bgcolor="#ffffff" style="background-color: #ffffff;">
            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="590">
                <tbody>
                    <tr>
                        <td class="esd-structure es-p20t es-p20r es-p20l" align="left">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="550" class="esd-container-frame" align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://content.app-us1.com/RG0yM/2023/03/05/c8aa1248-c820-409e-9444-a824470d46b7.png" alt style="display: block;" data-cf-ir-is-resized="true" data-cf-ir-should-resize-image="true" width="333" data-cf-ir-no-srcset="true"></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure" align="left">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="650" class="esd-container-frame" align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%" style="border-radius: 5px; border-collapse: separate;">
                                                <tbody>
                                                    <tr>
                                                        <td align="center" class="esd-block-text es-p20t">
                                                            <p style="font-family: ' . 'open sans' . ', ' . 'helvetica neue' . ', helvetica, arial, sans-serif; font-size: 20px;"><strong>Pagamento Aprovado</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="esd-block-text es-p20t es-p25b es-p25r es-p25l">
                                                            <p style="font-family: ' . 'open sans' . ', ' . 'helvetica neue' . ', helvetica, arial, sans-serif;">Seu pagamento no valor de<strong> R$ ' . $order_data['order_amount'] . '</strong>&nbsp;foi <strong>aprovado</strong>.<br>Desejamos boa sorte no sorteio.<br><br>Qualquer dúvida entre em contato.</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure es-p20t es-p30b es-p20r es-p20l" align="left">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="550" class="esd-container-frame" align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <br>
                                                        <td align="center" class="esd-block-button">
                                                          <span class="msohide es-button-border" style="border-width: 0px; background: #ffbd0a;padding:12px;margin:20px"><a href="https://betraffle.com.br/login" class="es-button es-button-1653515864223" target="_blank" style="color: #ffffff; font-family: &quot;open sans&quot;, &quot;helvetica neue&quot;, helvetica, arial, sans-serif; font-weight: bold; border-width: 10px 25px; background: #ffbd0a; border-color: #ffbd0a;text-decoration:none">ENTRAR NA PLATAFORMA</a></span>
                                                        </td>
                                                        <br>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td class="esd-structure es-p20 " align="left">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="550" class="esd-container-frame" align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <br>
                                                        <td align="center" class="esd-block-text">
                                                            <p>https://betraffle.com.br/login</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            </td>';


            if ($mail->Send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function paymentPending($user_data, $order_data)
    {

        try {

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            $mail->CharSet = "UTF-8";
            $mail->SMTPDebug = false; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "sh-pro112.hostgator.com.br";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = "contato@betraffle.com.br";
            $mail->Password = "6bamG$?X]uUm";
            $mail->SetFrom("contato@betraffle.com.br", "Betraffle");

            $mail->Subject = 'Pagamento Pendente';

            $mail->AddAddress($user_data['user_email'], $user_data['user_name']);

            $mail->Body    = '<td class="esd-stripe" align="center" bgcolor="#ffffff" style="background-color: #ffffff;">
                    <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="590">
                        <tbody>
                            <tr>
                                <td class="esd-structure es-p20t es-p20r es-p20l" align="left">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="550" class="esd-container-frame" align="center" valign="top">
                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://content.app-us1.com/RG0yM/2023/03/05/c8aa1248-c820-409e-9444-a824470d46b7.png" alt style="display: block;" data-cf-ir-is-resized="true" data-cf-ir-should-resize-image="true" width="333" data-cf-ir-no-srcset="true"></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="esd-structure" align="left">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="650" class="esd-container-frame" align="center" valign="top">
                                                    <table cellpadding="0" cellspacing="0" width="100%" style="border-radius: 5px; border-collapse: separate;">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" class="esd-block-text es-p20t">
                                                                    <p style="font-family: ' . 'open sans' . ', ' . 'helvetica neue' . ', helvetica, arial, sans-serif; font-size: 20px;"><strong>Pagamento Pendente</strong></p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" class="esd-block-text es-p20t es-p25b es-p25r es-p25l">
                                                                    <p style="font-family: ' . 'open sans' . ', ' . 'helvetica neue' . ', helvetica, arial, sans-serif;">Seu pagamento no valor de<strong> R$ ' . $order_data['order_amount'] . '</strong>&nbsp;está <strong>pendente</strong>.<br>Assim que ele for aprovado, sua compra será processada.<br><br>Qualquer dúvida entre em contato.</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="esd-structure es-p20t es-p30b es-p20r es-p20l" align="left">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="550" class="esd-container-frame" align="center" valign="top">
                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <br>
                                                                <td align="center" class="esd-block-button">
                                                        <span class="msohide es-button-border" style="border-width: 0px; background: #ffbd0a;padding:12px;margin:20px"><a href="https://betraffle.com.br/login" class="es-button es-button-1653515864223" target="_blank" style="color: #ffffff; font-family: &quot;open sans&quot;, &quot;helvetica neue&quot;, helvetica, arial, sans-serif; font-weight: bold; border-width: 10px 25px; background: #ffbd0a; border-color: #ffbd0a;text-decoration:none">ENTRAR NA PLATAFORMA</a></span>
        
                                                                </td>
                                                                <br>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
        
                            <tr>
                                <td class="esd-structure es-p20 " align="left">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="550" class="esd-container-frame" align="center" valign="top">
                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <br>
                                                                <td align="center" class="esd-block-text">
                                                                    <p>https://betraffle.com.br/login</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                     </td>';

            if ($mail->Send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        };
    }

    public function paymentRecused($user_data, $order_data)
    {

        try {

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            $mail->CharSet = "UTF-8";
            $mail->SMTPDebug = false; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "sh-pro112.hostgator.com.br";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = "contato@betraffle.com.br";
            $mail->Password = "6bamG$?X]uUm";
            $mail->SetFrom("contato@betraffle.com.br", "Betraffle");


            $mail->AddAddress($user_data['user_email'], $user_data['user_name']);

            $mail->Subject = 'Pagamento Recusado';

            $mail->Body    = '<td class="esd-stripe" align="center" bgcolor="#ffffff" style="background-color: #ffffff;">
                <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="590">
                <tbody>
                    <tr>
                        <td class="esd-structure es-p20t es-p20r es-p20l" align="left">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="550" class="esd-container-frame" align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://content.app-us1.com/RG0yM/2023/03/05/c8aa1248-c820-409e-9444-a824470d46b7.png" alt style="display: block;" data-cf-ir-is-resized="true" data-cf-ir-should-resize-image="true" width="333" data-cf-ir-no-srcset="true"></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure" align="left">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="650" class="esd-container-frame" align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%" style="border-radius: 5px; border-collapse: separate;">
                                                <tbody>
                                                    <tr>
                                                        <td align="center" class="esd-block-text es-p20t">
                                                            <p style="font-family: ' . 'open sans' . ', ' . 'helvetica neue' . ', helvetica, arial, sans-serif; font-size: 20px;"><strong>Pagamento Recusado</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="esd-block-text es-p20t es-p25b es-p25r es-p25l">
                                                            <p style="font-family: ' . 'open sans' . ', ' . 'helvetica neue' . ', helvetica, arial, sans-serif;">Seu pagamento no valor de<strong> R$ ' . $order_data['order_amount'] . '</strong>&nbsp;foi <strong>recusado</strong>.<br>Acesse seu provedor de pagamento para mais detalhes.<br><br>Qualquer dúvida entre em contato.</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure es-p20t es-p30b es-p20r es-p20l" align="left">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="550" class="esd-container-frame" align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <br>
                                                        <td align="center" class="esd-block-button">
                                                         <span class="msohide es-button-border" style="border-width: 0px; background: #ffbd0a;padding:12px;margin:20px"><a href="https://betraffle.com.br/login" class="es-button es-button-1653515864223" target="_blank" style="color: #ffffff; font-family: &quot;open sans&quot;, &quot;helvetica neue&quot;, helvetica, arial, sans-serif; font-weight: bold; border-width: 10px 25px; background: #ffbd0a; border-color: #ffbd0a;text-decoration:none">ENTRAR NA PLATAFORMA</a></span>
                                                        </td>
                                                        <br>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td class="esd-structure es-p20 " align="left">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="550" class="esd-container-frame" align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <br>
                                                        <td align="center" class="esd-block-text">
                                                            <p>https://betraffle.com.br/login</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            </td>';


            if ($mail->Send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function banUser($user_data)
    {

        try {

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            $mail->CharSet = "UTF-8";
            $mail->SMTPDebug = false; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "sh-pro112.hostgator.com.br";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = "contato@betraffle.com.br";
            $mail->Password = "6bamG$?X]uUm";
            $mail->SetFrom("contato@betraffle.com.br", "Betraffle");


            $mail->AddAddress($user_data['user_email'], $user_data['user_name']);

            $mail->Subject = 'Você foi banido';
            $mail->Body    = '
                            <td class="esd-stripe" align="center" bgcolor="#ffffff" style="background-color: #ffffff;">
                                <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="590">
                                    <tbody>
                                        <tr>
                                            <td class="esd-structure es-p20t es-p20r es-p20l" align="left">
                                                <table cellpadding="0" cellspacing="0" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td width="550" class="esd-container-frame" align="center" valign="top">
                                                                <table cellpadding="0" cellspacing="0" width="100%">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://content.app-us1.com/RG0yM/2023/03/05/c8aa1248-c820-409e-9444-a824470d46b7.png" alt style="display: block;" data-cf-ir-is-resized="true" data-cf-ir-should-resize-image="true" width="333" data-cf-ir-no-srcset="true"></a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="esd-structure" align="left">
                                                <table cellpadding="0" cellspacing="0" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td width="650" class="esd-container-frame" align="center" valign="top">
                                                                <table cellpadding="0" cellspacing="0" width="100%" style="border-radius: 5px; border-collapse: separate;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td align="center" class="esd-block-text es-p20t">
                                                                                <p style="font-family: ' . 'open sans' . ', ' . 'helvetica neue' . ', helvetica, arial, sans-serif; font-size: 20px;"><strong>Você foi Banido</strong></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center" class="esd-block-text es-p20t es-p25b es-p25r es-p25l">
                                                                                <p style="font-family: ' . 'open sans' . ', ' . 'helvetica neue' . ', helvetica, arial, sans-serif;">Constatamos que você infringiu nossos <strong>Termos e Condições</strong>&nbsp;<br> de uso da Rafflebet.<br><br>Qualquer dúvida entre em contato.</p>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                
                                    </tbody>
                                </table>
                            </td>';


            if ($mail->Send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    //Avisando que o sorteio começou
    public function startRaffle($user_data, $raffles_data)
    {

        try {

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            $mail->CharSet = "UTF-8";
            $mail->SMTPDebug = false; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "sh-pro112.hostgator.com.br";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = "contato@betraffle.com.br";
            $mail->Password = "6bamG$?X]uUm";
            $mail->SetFrom("contato@betraffle.com.br", "Betraffle");


            $mail->AddAddress($user_data['user_email'], $user_data['user_name']);

            $mail->Subject = 'Sorteio Começou - ' . $raffles_data['raffles_title'];
            $mail->Body    = '
            <td class="esd-stripe" align="center" bgcolor="#ffffff" style="background-color: #ffffff;">
            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="590">
                <tbody>
                    <tr>
                        <td class="esd-structure es-p20t es-p20r es-p20l" align="left">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="550" class="esd-container-frame" align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://content.app-us1.com/RG0yM/2023/03/05/c8aa1248-c820-409e-9444-a824470d46b7.png" alt style="display: block;" data-cf-ir-is-resized="true" data-cf-ir-should-resize-image="true" width="333" data-cf-ir-no-srcset="true"></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure" align="left">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="650" class="esd-container-frame" align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%" style="border-radius: 5px; border-collapse: separate;">
                                                <tbody>
                                                    <tr>
                                                        <td align="center" class="esd-block-text es-p20t">
                                                            <p style="font-family: ' . 'open sans' . ', ' . 'helvetica neue' . ', helvetica, arial, sans-serif; font-size: 20px;"><strong>' . $raffles_data['raffles_title'] . '</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="esd-block-text es-p20t es-p25b es-p25r es-p25l">
                                                            <p style="font-family: ' . 'open sans' . ', ' . 'helvetica neue' . ', helvetica, arial, sans-serif;">O sorteio começou, fique de olho e veja se o seu ticket será  <strong>sorteado</strong>.</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure es-p20t es-p30b es-p20r es-p20l" align="left">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="550" class="esd-container-frame" align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <br>
                                                        <td align="center" class="esd-block-button">
                                                  <span class="msohide es-button-border" style="border-width: 0px; background: #ffbd0a;padding:12px;margin:20px"><a href="https://betraffle.com.br/login" class="es-button es-button-1653515864223" target="_blank" style="color: #ffffff; font-family: &quot;open sans&quot;, &quot;helvetica neue&quot;, helvetica, arial, sans-serif; font-weight: bold; border-width: 10px 25px; background: #ffbd0a; border-color: #ffbd0a;text-decoration:none">ACOMPANHAR SORTEIO</a></span>

                                                        </td>
                                                        <br>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td class="esd-structure es-p20 " align="left">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="550" class="esd-container-frame" align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <br>
                                                        <td align="center" class="esd-block-text">
                                                            <p>https://betraffle.com.br/login</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>';


            if ($mail->Send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    //Avisando ganhador do sorteio
    public function winnerRaffle($user_data, $raffles_data)
    {


        try {

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            $mail->CharSet = "UTF-8";
            $mail->SMTPDebug = false; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "sh-pro112.hostgator.com.br";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = "contato@betraffle.com.br";
            $mail->Password = "6bamG$?X]uUm";
            $mail->SetFrom("contato@betraffle.com.br", "Betraffle");


            $mail->AddAddress($user_data['user_email'], $user_data['user_name']);

            $mail->Subject = 'Você foi sorteado - ' . $raffles_data['raffles_title'];
            $mail->Body    = '<td class="esd-stripe" align="center" bgcolor="#ffffff" style="background-color: #ffffff;">
            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="590">
                <tbody>
                    <tr>
                        <td class="esd-structure es-p20t es-p20r es-p20l" align="left">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="550" class="esd-container-frame" align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://content.app-us1.com/RG0yM/2023/03/05/c8aa1248-c820-409e-9444-a824470d46b7.png" alt style="display: block;" data-cf-ir-is-resized="true" data-cf-ir-should-resize-image="true" width="333" data-cf-ir-no-srcset="true"></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure" align="left">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="650" class="esd-container-frame" align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%" style="border-radius: 5px; border-collapse: separate;">
                                                <tbody>
                                                    <tr>
                                                        <td align="center" class="esd-block-text es-p20t">
                                                            <p style="font-family: ' . 'open sans' . ', ' . 'helvetica neue' . ', helvetica, arial, sans-serif; font-size: 20px;"><strong>Você ganhouu!</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="esd-block-text es-p20t es-p25b es-p25r es-p25l">
                                                            <p style="font-family: ' . 'open sans' . ', ' . 'helvetica neue' . ', helvetica, arial, sans-serif;">Você foi vencedor do sorteio <strong>' . $raffles_data['raffles_title'] . '</strong>. <br> Entraremos em contato em breve para solicitar suas informações para recebimento.</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure es-p20t es-p30b es-p20r es-p20l" align="left">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="550" class="esd-container-frame" align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <br>
                                                        <td align="center" class="esd-block-button">
                                                  <span class="msohide es-button-border" style="border-width: 0px; background: #ffbd0a;padding:12px;margin:20px"><a href="https://betraffle.com.br/login" class="es-button es-button-1653515864223" target="_blank" style="color: #ffffff; font-family: &quot;open sans&quot;, &quot;helvetica neue&quot;, helvetica, arial, sans-serif; font-weight: bold; border-width: 10px 25px; background: #ffbd0a; border-color: #ffbd0a;text-decoration:none">VER SORTEIO</a></span>

                                                        </td>
                                                        <br>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td class="esd-structure es-p20 " align="left">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="550" class="esd-container-frame" align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <br>
                                                        <td align="center" class="esd-block-text">
                                                            <p>https://betraffle.com.br/login</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>';



            if ($mail->Send()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }
}
