<?

namespace app\Helpers\mail;
use Exception;
use app\Helpers\mail\PHPMailer\src\PHPMailer;
use app\Helpers\mail\PHPMailer\src\SMTP;
new SMTP;
// require "PHPMailer/src/PHPMailer.php";
// require "PHPMailer/src/SMTP.php";
require 'PHPMailer/src/Exception.php';







class Mailer
{

  public function sendEmail($content, $addressMail)
  {
    $mail = new PHPMailer(true); //true:enables exceptions
    try {
      $mail->SMTPDebug = 0; //0,1,2: chế độ debug
      $mail->isSMTP();
      $mail->CharSet = "utf-8";
      $mail->Host = 'smtp.gmail.com'; //SMTP servers
      $mail->SMTPAuth = true; // Enable authentication
      $mail->Username = 'nmquang1997@gmail.com'; // SMTP username
      $mail->Password = 'znxczngepylfhjqh'; // SMTP password
      $mail->SMTPSecure = 'ssl'; // encryption TLS/SSL 
      $mail->Port = 465; // port to connect to                
      $mail->setFrom('nmquang1997@gmail.com', 'Minh Quang Electronics');
      $mail->addAddress($addressMail);
      $mail->isHTML(true);
      $mail->Subject = 'Quên Mật Khẩu';
      $noidungthu = 'Mật Khẩu Của Bạn Là:' . $content;
      $mail->Body = $noidungthu;
      $mail->smtpConnect(
        array(
          "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
          )
        )
      );
      $mail->send();
      // echo 'Đã gửi mail xong';
    } catch (Exception $e) {
      echo 'Error: ', $mail->ErrorInfo;
    }
  }

  public function Forgot($newPassword, $addressMail)
  {
    $mail = new PHPMailer(true); //true:enables exceptions
    try {
      $mail->SMTPDebug = 0; //0,1,2: chế độ debug
      $mail->isSMTP();
      $mail->CharSet = "utf-8";
      $mail->Host = 'smtp.gmail.com'; //SMTP servers
      $mail->SMTPAuth = true; // Enable authentication
      $mail->Username = 'nmquang1997@gmail.com'; // SMTP username
      $mail->Password = 'znxczngepylfhjqh'; // SMTP password
      $mail->SMTPSecure = 'ssl'; // encryption TLS/SSL 
      $mail->Port = 465; // port to connect to                
      $mail->setFrom('nmquang1997@gmail.com', 'Minh Quang Store');
      $mail->addAddress($addressMail);
      $mail->isHTML(true);
      $mail->Subject = 'Cập nhật mật khẩu mới';
      $noidungthu = '
            Mật khẩu của bạn là : ' . $newPassword . '
        ';
      $mail->Body = $noidungthu;
      $mail->smtpConnect(
        array(
          "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
          )
        )
      );
      $mail->send();
      // echo 'Đã gửi mail xong';
    } catch (Exception $e) {
      echo 'Error: ', $mail->ErrorInfo;
    }
  }
}
