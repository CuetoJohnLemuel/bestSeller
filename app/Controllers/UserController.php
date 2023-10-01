<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\AdminModel;
class UserController extends BaseController
{

    private $productmodel;
    private $adminmodel;

    public function __construct()
    {
        
        $this->productmodel = new \App\Models\ProductModel();
        $this->adminmodel = new \App\Models\AdminModel();
    }


    public function logindex()
    {
        helper(['form']);
        echo view('Admin/login');
    } 

    public function regindex()
    {
        helper(['form']);
        $data = [];
        echo view('Admin/register', $data);
    }
  
    public function store()
    {
        helper(['form']);
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[admin.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];
          
        if($this->validate($rules)){
            
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => $this->request->getVar('password')
            ];
            $this->adminmodel->save($data);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
          
    }
  
    public function loginAuth()
{
    $session = session();
            
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');
            
    $data = $this->adminmodel->where('email', $email)->first();
            
    var_dump($email);
    var_dump($password);
    var_dump($data);
            
    if ($data) {
        $pass = $data['password'];
        if ($password === $pass) {
            $ses_data = [
                'id' => $data['id'],
                'name' => $data['name'],
                'email' => $data['email'],
                'isLoggedIn' => true
            ];
            $session->set($ses_data);
            return redirect()->to('/adminindex');
        } else {
            $session->setFlashdata('msg', 'Password is incorrect.');
            return redirect()->to('/login');
        }
    } else {
        $session->setFlashdata('msg', 'Email does not exist.');
        return redirect()->to('/login');
    }
}

public function logout()
{
    $session = session();
    $session->destroy();

    return redirect()->to('/login');
}

    
    public function adminindex()
    {
        $data = [
            'menu' => $this->productmodel->findAll(),
        ];
        return view('Admin/adminindex', $data);

    }

    public function tshirts()
    {
        $data = [
            'product' => $this->productmodel->where('productCategory', 'T-Shirts')->findAll(),
        ];
        return view('User/products', $data);
    }

    public function jeans()
    {
        $data = [
            'product' => $this->productmodel->where('productCategory', 'Jeans')->findAll(),
        ];
        return view('User/products', $data);
    }

    public function shoes()
    {
        $data = [
            'product' => $this->productmodel->where('productCategory', 'Shoes')->findAll(),
        ];
        return view('User/products', $data);
    }

    public function bags()
    {
        $data = [
            'product' => $this->productmodel->where('productCategory', 'Bags')->findAll(),
        ];
        return view('User/products', $data);
    }

    public function jackets()
    {
        $data = [
            'product' => $this->productmodel->where('productCategory', 'Jackets')->findAll(),
        ];
        return view('User/products', $data);
    }

    public function shorts()
    {
        $data = [
            'product' => $this->productmodel->where('productCategory', 'Shorts')->findAll(),
        ];
        return view('User/products', $data);
    }

    public function userindex()
    {
        return view('User/userindex');
    }

    
    public function saveProduct()
    {
    
        // Get the uploaded image file
        $productImage = $this->request->getFile('productImage');
        $myNewName = $productImage->getRandomName();
    
        // Validate the uploaded image
        if ($productImage->move("uploads", $myNewName)) {
            // Generate a unique filename for the uploaded image
    
            // Insert product data into the database, including the image file path
            $data = [
                'code' => $this->request->getVar('code'),
                'quantity' => $this->request->getVar('quantity'),
                'productName' => $this->request->getVar('productName'),
                'productPrice' => $this->request->getVar('productPrice'),
                'productDescription' => $this->request->getVar('productDescription'),
                'productImage' => "uploads/" . $myNewName,
                'productCategory' => $this->request->getVar('productCategory'),
            ];       
    
            if ($this->productmodel->insert($data)) {
                return redirect()->to('adminindex');
            }
        } else {
            // Handle the case where the image upload was not successful
            $error = $productImage->getError();
            return redirect()->to('error_page'); // Redirect to an error page or display an error message
        }
    }
    

    public function editProduct()
{
    $id = $this->request->getPost('id');
    $data = [
        'code' => $this->request->getPost('code'),
        'productName' => $this->request->getPost('productName'),
        'productDescription' => $this->request->getPost('productDescription'),
        'productPrice' => $this->request->getPost('productPrice'),
        'productCategory' => $this->request->getPost('productCategory'),
        'quantity' => $this->request->getPost('quantity'),
    ];

    if ($this->productmodel->update($id, $data)) {
        echo "Product updated successfully"; // Debugging message
        return redirect()->to('adminindex');
    } else {
        echo "Product update failed"; // Debugging message
    }
}

public function deleteProduct() {
    // Check if the request method is POST
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        // Get the product ID to delete from the form input
        $productId = $this->input->post('id');

        // Load the model (replace 'YourModelName' with your actual model name)
        $this->load->model('ProductModel');

        // Check if the product exists in the database
        $product = $this->ProductModel->getProductById($productId);

        if ($product) {
            // Delete the product
            $this->ProductModel->deleteProduct($productId);

            // Redirect to the product list or any other page after successful deletion
            redirect('/'); // Change 'productList' to the actual URL you want to redirect to
        } else {
            // Product not found, handle the error (e.g., show an error message)
            echo "Product not found or already deleted.";
        }
    } else {
        // Handle invalid request method (e.g., show an error message)
        echo "Invalid request method.";
    }
}

public function deletethistoo()
{
    $productModel = new ProductModel();
    $id = $this->request->getPost('id');
    
    if ($productModel->delete($id)) { // Remove the extra $ symbol here
        return redirect()->to('adminindex');
    }
}

}
