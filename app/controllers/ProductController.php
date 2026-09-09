<?php
class ProductController extends Controller
{
    private function require_login()
    {
        $session = load_class('session', 'libraries');
        $response = load_class('response', 'kernel');

        if (!$session->has_userdata('is_logged_in') || !$session->userdata('is_logged_in')) {
            $response->redirect('/login');
        }
    }

    public function index()
    {
        $this->require_login();
        $this->call->database();
        $this->call->model('ProductModel');
        $session = load_class('session', 'libraries');

        $products = $this->ProductModel->all();

        $this->call->view('products/index', [
            'products' => $products,
            'user' => $session->userdata('username') ?? 'User',
            'success' => $session->flashdata('success') ?? '',
            'error' => $session->flashdata('error') ?? '',
        ]);
    }

    public function create()
    {
        $this->require_login();
        $this->call->view('products/create');
    }

    public function store()
    {
        $this->require_login();
        $this->call->database();
        $this->call->model('ProductModel');
        $session = load_class('session', 'libraries');
        $response = load_class('response', 'kernel');

        $request = load_class('request', 'kernel');
        $product_name = trim($request->post('product_name') ?? '');
        $description = trim($request->post('description') ?? '');
        $price = trim($request->post('price') ?? '0');
        $quantity = (int) ($request->post('quantity') ?? 0);

        if ($product_name === '') {
            $session->set_flashdata('error', 'Product name is required.');
            $response->redirect('/products/create');
        }

        $inserted = $this->ProductModel->insert([
            'product_name' => $product_name,
            'description' => $description,
            'price' => number_format((float) $price, 2, '.', ''),
            'quantity' => $quantity,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if ($inserted) {
            $session->set_flashdata('success', 'Product created successfully.');
        } else {
            $session->set_flashdata('error', 'Could not create the product.');
        }

        $response->redirect('/products');
    }

    public function edit($id)
    {
        $this->require_login();
        $this->call->database();
        $this->call->model('ProductModel');
        $session = load_class('session', 'libraries');
        $response = load_class('response', 'kernel');

        $product = $this->ProductModel->find($id);
        if (!$product) {
            $session->set_flashdata('error', 'Product not found.');
            $response->redirect('/products');
        }

        $this->call->view('products/edit', [
            'product' => $product,
        ]);
    }

    public function update($id)
    {
        $this->require_login();
        $this->call->database();
        $this->call->model('ProductModel');
        $session = load_class('session', 'libraries');
        $response = load_class('response', 'kernel');
        $request = load_class('request', 'kernel');

        $product_name = trim($request->post('product_name') ?? '');
        $description = trim($request->post('description') ?? '');
        $price = trim($request->post('price') ?? '0');
        $quantity = (int) ($request->post('quantity') ?? 0);

        if ($product_name === '') {
            $session->set_flashdata('error', 'Product name is required.');
            $response->redirect('/products/edit/' . $id);
        }

        $updated = $this->ProductModel->update($id, [
            'product_name' => $product_name,
            'description' => $description,
            'price' => number_format((float) $price, 2, '.', ''),
            'quantity' => $quantity,
        ]);

        if ($updated !== false) {
            $session->set_flashdata('success', 'Product updated successfully.');
        } else {
            $session->set_flashdata('error', 'Could not update the product.');
        }

        $response->redirect('/products');
    }

    public function delete($id)
    {
        $this->require_login();
        $this->call->database();
        $this->call->model('ProductModel');
        $session = load_class('session', 'libraries');
        $response = load_class('response', 'kernel');

        $deleted = $this->ProductModel->delete($id);

        if ($deleted) {
            $session->set_flashdata('success', 'Product deleted successfully.');
        } else {
            $session->set_flashdata('error', 'Could not delete the product.');
        }

        $response->redirect('/products');
    }
}
