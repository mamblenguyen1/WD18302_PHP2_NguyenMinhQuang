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

  public function Forgot($code,$link ,  $addressMail)
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
      $mail->Subject = 'Xác nhận  tài khoản';
      $noidungthu = '
      <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; background-color: #f4f4f4; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
          <h2 style="color: #007BFF; text-align: center;">Xác Nhận Tài Khoản</h2>
          <div style="border: 2px solid #007BFF; padding: 15px; border-radius: 8px; background-color: #fff;">
              <p style="font-size: 16px; color: #333; line-height: 1.5;">Chào mừng bạn đã đăng ký tài khoản!</p>
              <p style="font-size: 18px; color: #007BFF; line-height: 1.5;">Mã xác nhận của bạn: <strong>'.$code.'</strong></p>
              <p style="font-size: 16px; color: #333; line-height: 1.5;">Vui lòng xác nhận bằng cách nhấp vào đường link dưới đây:</p>
              <p style="font-size: 16px; color: #007BFF; line-height: 1.5;"><a href="'.$link.'" style="color: #007BFF; text-decoration: none;">Xác nhận ngay</a></p>
              <p style="font-size: 16px; color: #333; line-height: 1.5;">Nếu bạn không thực hiện đăng ký này, vui lòng bỏ qua email này.</p>
          </div>
      </div>
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
