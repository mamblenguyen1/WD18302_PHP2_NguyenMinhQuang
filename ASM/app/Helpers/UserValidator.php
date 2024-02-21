<?


namespace app\Helpers;

use app\Model\UserModel;

class UserValidator
{

  private $data;
  private $errors = [];
  private static $fields = ['user_name', 'user_adress', 'user_email', 'user_phone', 'user_password'];
  private static $fieldsUpdate = ['user_name', 'user_adress', 'user_email', 'user_phone', 'user_password'];
  private static $fieldsRegister = ['user_name', 'user_email', 'user_password', 'confirmPass'];
  private static $fieldsLogin = ['user_name', 'user_password'];



  public function __construct($post_data)
  {
    $this->data = $post_data;
  }



  private function validateName()
  {

    $val = trim($this->data['user_name']);

    if (empty($val)) {
      $this->addError('user_name', 'Tên đăng nhập không được để trống');
    } else {
      $UserModel = new UserModel();
      if ($UserModel->checkDuplicateUserName($_POST['user_name'])) {
        $this->addError('user_name', 'Tên đăng nhập đã được đăng ký');
      }
    }
  }

  private function validateNameLogin()
  {

    $val = trim($this->data['user_name']);

    if (empty($val)) {
      $this->addError('user_name', 'Tên đăng nhập không được để trống');
    } else {
      $UserModel = new UserModel();
      $user = $UserModel->checkDuplicateUserName($_POST["user_name"]);
      if (!$user) {
        $this->addError('user_name', 'Sai tên tài khoản');
      } else {
        if ($UserModel->checkActive($_POST['user_name'])) {
        } else {
          $this->addError('user_name', 'Tài khoản đã bị vô hiệu hóa');
        }
      }
    }
  }

  private function validateConfirm()
  {

    $val = trim($this->data['confirmPass']);

    if (empty($val)) {
      $this->addError('confirmPass', 'Số điện thoại không được để trống');
    } else {
      if ($_POST['user_password'] !== $_POST['confirmPass']) {
        $this->addError('confirmPass', 'Nhập lại mật khẩu không giống nhau');
      }
    }
  }



  private function validatePhone()
  {

    $val = trim($this->data['user_phone']);

    if (empty($val)) {
      $this->addError('user_phone', 'Số điện thoại không được để trống');
    } else {
      if (!preg_match('/^[0-9]{10}$/', $val)) {
        $this->addError('user_phone', 'Định dạng số điện thoại không đúng');
      }
    }
  }
  private function validateAddress()
  {

    $val = trim($this->data['user_adress']);

    if (empty($val)) {
      $this->addError('user_adress', 'Địa chỉ không được để trống');
    }
  }
  private function validatePass()
  {
    $val = trim($this->data['user_password']);
    if (empty($val)) {
      $this->addError('user_password', 'Mật khẩu không đc để trống');
    } else {
      if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])[A-Za-z\d@$!%*?&]{8,}$/', $val)) {
        $this->addError('user_password', 'Định dạng mật khẩu không đúng , ít nhất 8 kí tự và phải có chữ hoa chữ thường và s');
      }
    }
  }

  private function validatePassLogin()
  {
    $val = trim($this->data['user_password']);
    if (empty($val)) {
      $this->addError('user_password', 'Mật khẩu không đc để trống');
    } else {
      $UserModel = new UserModel();
      $username = $UserModel->checkDuplicateUserName($_POST["user_name"]);
      if (!$username) {
      }else{
        if ($username['user_password'] != $_POST['user_password']) {
          $this->addError('user_password', 'Sai mật khẩu');
        }
      }
    }
  }

  private function validateEmail()
  {

    $val = trim($this->data['user_email']);

    if (empty($val)) {
      $this->addError('user_email', 'Email không được để trống');
    } else {
      if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
        $this->addError('user_email', 'Email không đúng định dạng');
      } else {
        $UserModel = new UserModel();
        if ($UserModel->checkDuplicateUserEmail($_POST['user_email'])) {
          $this->addError('user_email', 'Email này đc đc đăng kí');
        }
      }
    }
  }
  private function validateNameUpdate()
  {

    $val = trim($this->data['user_name']);

    if (empty($val)) {
      $this->addError('user_name', 'Tên đăng nhập không được để trống');
    } else {
      $UserModel = new UserModel();
      $user = ($UserModel->checkDuplicateUserName($_POST['user_name']));
      if ($user) {
        if ($user['user_name'] === $_POST['user_name']) {
        } else {
          $this->addError('user_name', 'Tên đăng nhập đã được đăng ký');
        }
      }
    }
  }



  private function validateEmailUpdate()
  {

    $val = trim($this->data['user_email']);

    if (empty($val)) {
      $this->addError('user_email', 'Email không được để trống');
    } else {
      if (filter_var($val, FILTER_VALIDATE_EMAIL)) {
        $UserModel = new UserModel();
        $email = ($UserModel->checkDuplicateUserEmail($_POST['user_email']));
        if ($email) {
          if ($email['user_email'] === $_POST['user_email']) {
          } else {
            $this->addError('user_email', 'Email này đã đc đăng kí');
          }
        }
      } else {
        $this->addError('user_email', 'Email không đúng định dạng');
      }
    }
  }

  public function validateRegister()
  {

    foreach (self::$fieldsRegister as $field) {
      if (!array_key_exists($field, $this->data)) {
        trigger_error("'$field' is not present in the data");
        return;
      }
    }
    $this->validateEmail();
    $this->validatePass();
    $this->validateName();
    $this->validateConfirm();

    return $this->errors;
  }

  public function validateLogin()
  {

    foreach (self::$fieldsLogin as $field) {
      if (!array_key_exists($field, $this->data)) {
        trigger_error("'$field' is not present in the data");
        return;
      }
    }
    $this->validatePassLogin();
    $this->validateNameLogin();

    return $this->errors;
  }

  public function validateForm()
  {

    foreach (self::$fields as $field) {
      if (!array_key_exists($field, $this->data)) {
        trigger_error("'$field' is not present in the data");
        return;
      }
    }
    $this->validatePhone();
    $this->validateEmail();
    $this->validatePass();
    $this->validateName();
    $this->validateAddress();
    return $this->errors;
  }

  public function validateFormUpdate()
  {

    foreach (self::$fieldsUpdate as $field) {
      if (!array_key_exists($field, $this->data)) {
        trigger_error("'$field' is not present in the data");
        return;
      }
    }
    $this->validatePhone();
    $this->validateEmailUpdate();
    $this->validatePass();
    $this->validateNameUpdate();
    $this->validateAddress();
    return $this->errors;
  }


  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
