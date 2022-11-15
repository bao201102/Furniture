<?php
class Checkout extends Controller
{
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
        $this->UserModel = $this->model('UserModel');
        $this->CustomerModel = $this->model('CustomerModel');
        $this->OrderModel = $this->model('OrderModel');
        $this->OrderDetailModel = $this->model('OrderDetailModel');
    }

    public function index()
    {
        if (!empty($_SESSION['user_id'])) {
            if ($_SESSION['user_type'] == 1) {
                $cus = $this->CustomerModel->getCustomerByUserId($_SESSION['user_id']);
                $this->view('checkout', ['cus' => $cus]);
            }
        } else {
            $this->view('checkout', []);
        }
    }

    public function refreshOrderDetails()
    {
        $this->view('order_details');
    }

    public function addOrder()
    {
        if (isset($_POST['order'])) {
            $cus_id = $_POST['cus_id'];
            $firstname = $_POST['firstNameInput'];
            $lastname = $_POST['lastNameInput'];
            $street = $_POST['streetInput'];
            $town = $_POST['townInput'];
            $phone = $_POST['phoneInput'];
            $email = $_POST['emailInput'];
            $notes = $_POST['notesInput'];

            $prod_id = $_POST['prod_id'];
            $quantity = $_POST['quantity'];
            $prod_price = $_POST['prod_price'];

            if ($cus_id == "null") {
                $order_result = $this->OrderModel->addOrderNoCus($firstname, $lastname, $street, $town, $phone, $email, $notes);
            } else {
                $order_result = $this->OrderModel->addOrderHaveCus($cus_id, $firstname, $lastname, $street, $town, $phone, $email, $notes);
            }

            if ($order_result) {
                $order_id = $this->OrderModel->getOrderId();
                for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                    $prod_quantity = $this->ProductModel->getQuantity($prod_id[$i]);
                    $prod_quantity_new = $prod_quantity - $quantity[$i];
                    $this->ProductModel->reduceQuantity($prod_id[$i], $prod_quantity_new);
                    $this->OrderDetailModel->addOrderDetail($order_id[0]['order_id'], $prod_id[$i], $quantity[$i], $prod_price[$i]);
                }

                if (isset($_SESSION['cart'])) {
                    unset($_SESSION['cart']);
                }

                header('location:' . URLROOT . '/Home');
            }
        }
    }
}
