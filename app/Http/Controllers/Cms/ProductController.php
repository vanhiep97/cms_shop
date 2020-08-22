<?php

namespace App\Http\Controllers\Cms;

use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Cms\Manufacture\ManufactureRepository;
use App\Repositories\Cms\Product\ProductRepository;
use App\Repositories\Cms\ProductGroup\ProductGroupRepository;
use App\Services\StatusResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\products\CreateProductRequest;
use App\Http\Requests\products\UpdateProductRequest;
use App\Models\Inventory;

class ProductController extends Controller
{
    use StatusResponse;

    protected $productRepository;
    protected $productGroupRepository;
    protected $manufactureRepository;

    public function __construct(ProductRepository $productRepository, ProductGroupRepository $productGroupRepository
        , ManufactureRepository $manufactureRepository)
    {
        $this->productRepository = $productRepository;
        $this->productGroupRepository = $productGroupRepository;
        $this->manufactureRepository = $manufactureRepository;
    }

    public function index()
    {
        $groups = $this->productGroupRepository->all();
        $manufactures = $this->manufactureRepository->all();
        $products = $this->productRepository->paginateBy('*', 'product_status', 1, 8, 'DESC');
        $totalProducts = $this->productRepository->all();
        return view('cms.modules.products.index', compact('products', 'totalProducts', 'groups', 'manufactures'));
    }

    public function showProductByRes(Request $request)
    {
        switch ($request->action) {
            case 1 :
                $products = $this->productRepository->paginateBy('*', 'product_status', 1, 8, 'DESC');
                break;
            case 2 :
                $products = $this->productRepository->paginateBy('*', 'product_status', 0, 8, 'DESC');
                break;
            case 3 :
                $products = Product::onlyTrashed()->paginate(8);
                $totalProducts = $this->productRepository->all();
                return view('cms.modules.products.list-product-trash', compact('products', 'totalProducts'));
                break;
            default:
                break;
        }
        $totalProducts = $this->productRepository->all();
        return view('cms.modules.products.list-product', compact('products', 'totalProducts'));
    }

    public function restoreSoftDeleteProduct($id)
    {
        $product = Product::onlyTrashed()->find($id);
        $product->restore();
    }

    public function create()
    {
        $prodGroup = $this->productGroupRepository->all();
        $manufactures = $this->manufactureRepository->all();
        return view('cms.modules.products.create', compact('prodGroup', 'manufactures'));
    }

    public function store(CreateProductRequest $request)
    {
        $products = $this->productRepository->createOrUpdateProduct($request->all());
        if($products->product_inventory == 1) {
            $dataInventory = [
                'product_id' => $products->id,
                'quantity' => $products->product_amount_inventory,
                'user_practise' => $products->user_practise
            ];

            $inventory = Inventory::create($dataInventory);
        }

        $inventory = isset($inventory) ? $inventory : [];
        return response()->json([
            'code' => 201,
            'products' => $products,
            'inventory' => $inventory
        ], 201);
    }

    public function edit($id)
    {
        $product = $this->productRepository->findById($id);
        $prodGroup = $this->productGroupRepository->all();
        $manufactures = $this->manufactureRepository->all();
        return view('cms.modules.products.edit', compact('product', 'prodGroup', 'manufactures'));
    }

    public function copy($id)
    {
        $product = $this->productRepository->findById($id);
        $prodGroup = $this->productGroupRepository->all();
        $manufactures = $this->manufactureRepository->all();
        return view('cms.modules.products.copy', compact('product', 'prodGroup', 'manufactures'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = $this->productRepository->createOrUpdateProduct($request->all(), $id);
        if($product->product_inventory == 1) {
            $dataInventory = [
                'quantity' => $product->product_amount_inventory,
                'user_practise' => $product->user_practise
            ];

            Inventory::updateOrCreate(['product_id' => $product->id], $dataInventory);
        } else {
            if($product->id) {
                Inventory::where('product_id', $product->id)->delete();
            }
        }
        return response()->json([
            'code' => 200,
            'product' => $product,
        ], 200);
    }

    public function destroy($id)
    {
        try {
            $ids = explode(",", $id);
            $this->productRepository->delete($ids);
            return $this->responseStatus(200, 'Xóa thành công');
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }

    public function export(Request $request)
    {
        return Excel::download(new ProductsExport(), 'products.' . 'xlsx');
    }

    public function updateStatus(Request $request, $id)
    {
        $productStatus = $this->productRepository->findById($id)->product_status;
        if ($productStatus === 1) {
            $this->productRepository->save([
                'product_status' => 0
            ], $id);
        } else {
            $this->productRepository->save([
                'product_status' => 1
            ], $id);
        }
        return $this->responseStatus(200, 'Cập nhật trạng thái thành công');
    }

    public function searchProduct(Request $request)
    {
        $products = $this->productRepository->query();
        if($request->has('product_name')) {
            $products->where('product_code', 'LIKE', $request->product_name.'%')->orWhere('product_name', 'LIKE', $request->product_name.'%');
        }
        if($request->has('pro_group_id') && $request->pro_group_id) {
            $products->where('product_group_id', $request->pro_group_id);
        }
        if($request->has('manufacture_id') && $request->manufacture_id) {
            $products->where('product_manufacture_id', $request->manufacture_id);
        }
        $products = $products->where('product_status', 1)->orderBy('id', 'DESC')->paginate(8);
        $totalProducts = $this->productRepository->all();
        return view('cms.modules.products.list-product', compact('products', 'totalProducts'));
    }

    public function overProduct()
    {
        $products = $this->productRepository->query()->where('product_amount', '=', 0)->paginate(5);
        return view('cms.modules.product-overs.index', compact('products'));
    }

    public function thresholdProduct()
    {
        $products = $this->productRepository->query()->whereBetween('product_amount', array(1, 10))->paginate(5);
        return view('cms.modules.product-thresholds.index', compact('products'));
    }
}
