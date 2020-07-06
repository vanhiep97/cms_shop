<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\categories\CreateCategoryRequest;
use App\Http\Requests\categories\UpdateCategoryRequest;
use App\Repositories\Cms\ProductGroup\ProductGroupRepository;
use App\Services\StatusResponse;
use Illuminate\Http\Request;

class ProductGroupController extends Controller
{
    use StatusResponse;
    protected $productGroupRepository;
    public function __construct(ProductGroupRepository $productGroupRepository)
    {
        $this->productGroupRepository = $productGroupRepository;
    }

    public function index()
    {
        $productGroups = $this->productGroupRepository->paginate('*', 5, 'DESC');
        $totalProGroups = $this->productGroupRepository->all();
        return view('cms.modules.group-products.index', compact('productGroups', 'totalProGroups'));
    }

    public function store(Request $request)
    {
        try {
            $productGroups = $this->productGroupRepository->createOrUpdateGroupProduct($request->all());
            return $this->responseStatus(201, 'Thêm nhóm sản phẩm thành công', $productGroups);
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }

    public function edit($id)
    {
        try {
            $productGroup = $this->productGroupRepository->findById($id);
            return $this->responseStatus(200, 'Success', $productGroup);
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $productGroup = $this->productGroupRepository->createOrUpdateGroupProduct($request->all(), $id);
            return $this->responseStatus(200, 'Update Category Success', $productGroup);
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }

    public function destroy($id)
    {
        try {
            $ids = explode(",", $id);
            $this->productGroupRepository->delete($ids);
            return $this->responseStatus(200, 'Xóa thành công');
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }

    public function search($query)
    {
        $categories = $this->categoryRepository->searchCategory($query);
        return view('admins.modules.categories.table', compact('categories'));
    }
}
