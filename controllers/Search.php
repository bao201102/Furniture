<?php
class Search extends Controller
{
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
        $this->ImageModel = $this->model('ImageModel');
        $this->CategoryModel = $this->model('CategoryModel');
    }

    public function index()
    {
        $category = $this->CategoryModel->getCategoryList();
        $number = 1;
        $searchKeyword = '';
        if (isset($_POST['keyword'])) {
            $searchKeyword = $_POST['keyword'];
        }
        $this->view('search', ['cate' => $category, 'number' => $number, 'searchKeyword' => $searchKeyword]);
    }

    public function search($number)
    {
        //Cắt chuỗi cho $price
        $price = explode("-", $_POST['price']);

        //Từ khóa mặc định là trống nếu không được nhập vào
        $keyword = '';
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        }

        //Category mặc định là tất cả nếu người dùng không chọn cái nào
        $cateList = array();
        if (isset($_POST['category'])) {
            $cateList = $_POST['category'];
        } else {
            $cate = $this->CategoryModel->getCategoryList();
            foreach ($cate as $value) {
                array_push($cateList, $value['category_id']);
            }
        }

        $from = ($number - 1) * 6;
        $page = $this->ProductModel->countPage($price[0], $price[1], $cateList, $keyword);
        $prod = $this->ProductModel->searchProduct($price[0], $price[1], $cateList, $keyword, $from);

        //Thực hiện truy vấn hình ảnh tương ứng với sản phẩm
        $image = array();
        if (isset($prod)) {
            foreach ($prod as $value) {
                $img = $this->ImageModel->getImage($value['prod_image_id'])[0];
                array_push($image, $img);
            }
            $this->view('products_search', ['prod' => $prod, 'image' => $image, 'page' => $page, 'number' => $number]);
        } else {
            echo "Product is not exists";
        }
    }
}
