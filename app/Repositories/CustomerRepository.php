<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function all()
    {
        return Customer::orderBy('name')
            ->where('active', 1)
            ->with('user')
            ->get()
            ->map
            ->format();

//        return Customer::orderBy('name')
//            ->where('active', 1)
//            ->with('user')
//            ->get()
//            ->map(function ($customer) {
//                return $customer->format();
//            });
    }

    public function findById(string $id)
    {
        return Customer::where('id', $id)
            ->where('active', 1)
            ->with('user')
            ->firstOrFail()
            ->format();

    }

    public function update(string $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->update(request()->only('name'));
    }

    public function delete(string $id)
    {
        Customer::findOrFail($id)->delete();
    }

//    public function findByUserName(string $name)
//    {
//
//    }

//    protected function format($customer)
//    {
//        return [
//            'customer_id' => $customer->id,
//            'name' => $customer?->name,
//            'created_by' => $customer?->user?->name,
//            'updated_at' => $customer->updated_at->diffForHumans(),
//        ];
//    }
}
