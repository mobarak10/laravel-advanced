<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        $customers = $this->customerRepository->all();

        return $customers;
    }

    public function show(string $id)
    {
        return $this->customerRepository->findById($id);
    }

    public function update(string $id)
    {
        $this->customerRepository->update($id);

        return redirect('customer/show/'. $id);
    }

    public function destroy(string $id)
    {
        $this->customerRepository->delete($id);

        return redirect('customer');
    }
}
