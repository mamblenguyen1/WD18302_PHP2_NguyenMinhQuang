<?


namespace app\Helpers;

use app\Model\ProductModel;

class ProductValidator
{

  private $data;
  private $errors = [];
  private static $fields = ['product_name', 'product_price', 'product_quantity', 'product_description', 'product_img'];



  public function __construct( $post_data)
  {
    $this->data = $post_data;
    // $this->data += $file_data;
    // var_dump($this->data);
    // die;
  }

//giá  sản phẩm

private function validateName()
  {

    $val = trim($this->data['product_name']);

    if (empty($val)) {
      $this->addError('product_name', 'Tên sản phẩm không được để trống');
    } else {
      $ProductModel = new ProductModel();
      if ($ProductModel->checkProductExist($_POST['product_name'])) {
        $this->addError('product_name', 'Tên sản phẩm bị trùng');
      }
    }
  }

  private function validatePrice()
  {
      $val = trim($this->data['product_price']);
      if (empty($val)) {
        $this->addError('product_price', 'Giá không được để trống');
    } elseif (!is_numeric($val)) {
        $this->addError('product_price', 'Giá phải là một số');
    } elseif (floatval($val) < 1000) {
        $this->addError('product_price', 'Giá không được nhỏ hơn 1000 VNĐ');
    }
  }

  private function validateDescription()
  {
      $val = trim($this->data['product_description']);
  
      if (empty($val)) {
          $this->addError('product_description', 'Giá không được để trống');
      }
  }
// số lượng
// private function validateQuantity()
// {
//     $val = trim($this->data['product_quantity']);

//     if (empty($val)) {
//         $this->addError('product_quantity', 'Số lượng không được để trống');
//     } else {
//         // Kiểm tra nếu giá nhỏ hơn 100
//         if (floatval($val) < 0) {
//             $this->addError('product_quantity', 'Giá không được nhỏ hơn 0');
//         }
//     }
// }

private function validateQuantity()
{
    $val = trim($this->data['product_quantity']);

    if (empty($val)) {
        $this->addError('product_quantity', 'Số lượng không được để trống');
    } elseif (!is_numeric($val)) {
        $this->addError('product_quantity', 'Số lượng phải là một số');
    } elseif (floatval($val) < 0) {
        $this->addError('product_quantity', 'Số lượng không được nhỏ hơn 0');
    }
}
private function validateImg()
{
    $val = trim($this->data['product_img']);

    if (empty($val)) {
        $this->addError('product_img', 'Ảnh không được để trống');
    } 
}


  public function validateAddProduct()
  {

    foreach (self::$fields as $field) {
      if (!array_key_exists($field, $this->data)) {
        trigger_error("'$field' is not present in the data");
        return;
      }
    }
    $this->validateName();
    $this->validatePrice();
    $this->validateQuantity();
    $this->validateDescription();
    $this->validateImg();


    return $this->errors;
  }



  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
