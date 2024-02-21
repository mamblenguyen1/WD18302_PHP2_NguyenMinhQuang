<?


namespace app\Helpers;

use app\Model\UserModel;

class UserValidator
{

  private $data;
  private $errors = [];
  private static $fields = ['user_name', 'user_email', 'user_phone', 'user_password', 'role_id'];
  private static $fieldsUpdate = ['user_name',  'user_email', 'user_phone'];



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
    // $this->validateAddress();
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
    $this->validateNameUpdate();
    return $this->errors;
  }


  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
