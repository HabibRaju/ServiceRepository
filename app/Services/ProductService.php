<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Log;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function all()
    {
        try 
        {
            return $this->productRepository->getAll();
        } 
        catch (\Exception $exception) 
        {
            Log::error("message: " . $exception->getMessage() . "code: " . $exception->getCode());

            return back()->withError("Server did not respond, Please try again later.");
        }
    }

    public function create($data)
    {
        try 
        {
            return $this->productRepository->save($data);
        } 
        catch (\Exception $exception) 
        {
            Log::error("message: " . $exception->getMessage() . "code: " . $exception->getCode());
            
            return back()->withError("Server did not respond, Please try again later.");
        }
    }

    public function update($id, $data)
    {
        try 
        {
            return $this->productRepository->update($id, $data);
        } 
        catch (\Exception $exception) 
        {
            Log::error("message: " . $exception->getMessage() . "code: " . $exception->getCode());

            return back()->withError("Server did not respond, Please try again later.");
        }
    }

    public function delete($id)
    {
        try 
        {
            return $this->productRepository->delete($id);
        } 
        catch (\Exception $exception) 
        {
            Log::error("message: " . $exception->getMessage() . "code: " . $exception->getCode());

            return back()->withError("Server did not respond, Please try again later.");
        }
       
    }
}
