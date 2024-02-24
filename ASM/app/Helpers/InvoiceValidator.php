<?


namespace app\Helpers;

use app\Model\InvoiceModel;

class InvoiceValidator
{

    private $data;
    private $errors = [];
    private static $fields = ['user_name', 'user_adress', 'user_phone'];

    //   private static $fields = ['product_name', 'product_price', 'product_quantity', 'product_description', 'product_img'];



    public function __construct($post_data)
    {
        $this->data = $post_data;
        // $this->data += $file_data;
        // var_dump($this->data);
        // die;
    }

    //giá  sản phẩm

    private function validateName()
    {

        $val = trim($this->data['user_name']);

        if (empty($val)) {
            $this->addError('user_name', 'Tên khách hàng không được để trống');
        }
    }

    private function validateAddress()
    {

        $val = trim($this->data['user_adress']);

        if (empty($val)) {
            $this->addError('user_adress', 'Địa chỉ khách hàng không được để trống');
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
    public function validateEditInvoice()
    {

        foreach (self::$fields as $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("'$field' is not present in the data");
                return;
            }
        }
        $this->validateName();
        $this->validatePhone();
        $this->validateAddress();
        return $this->errors;
    }



    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
}
