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
        $products = $this->productRepository->paginateBy('*', 'product_status', 1, 10, 'DESC');
        $totalProducts = $this->productRepository->all();
        return view('cms.modules.products.index', compact('products', 'totalProducts'));
    }

    public function showProductByRes(Request $request)
    {
        switch ($request->action) {
            case 1 :
                $products = $this->productRepository->paginateBy('*', 'product_status', 1, 10, 'DESC');
                break;
            case 2 :
                $products = $this->productRepository->paginateBy('*', 'product_status', 0, 10, 'DESC');
                break;
            case 3 :
                $products = Product::onlyTrashed()->paginate(10);
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

    public function store(Request $request)
    {
        $products = $this->productRepository->createOrUpdateProduct($request->all());
        return response()->json([
            'code' => 201,
            'products' => $products,
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

    public function update(Request $request, $id)
    {
        $product = $this->productRepository->createOrUpdateProduct($request->all(), $id);
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
}
