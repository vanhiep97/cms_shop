<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Repositories\Cms\Manufacture\ManufactureRepository;
use App\Services\StatusResponse;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    use StatusResponse;
    protected $manufactureRepository;
    public function __construct(ManufactureRepository $manufactureRepository)
    {
        $this->manufactureRepository = $manufactureRepository;
    }

    public function index()
    {
        $manufactures = $this->manufactureRepository->paginate('*', 5, 'DESC');
        $totalManufactures = $this->manufactureRepository->all();
        return view('cms.modules.manufactures.index', compact('manufactures', 'totalManufactures'));
    }

    public function store(Request $request)
    {
        try {
            $manufactures = $this->manufactureRepository->createOrUpdateManufacture($request->all());
            return $this->responseStatus(201, 'Thêm nhà sản xuất thành công', $manufactures);
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }

    public function edit($id)
    {
        try {
            $manufacture = $this->manufactureRepository->findById($id);
            return $this->responseStatus(200, 'Success', $manufacture);
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $manufacture = $this->manufactureRepository->createOrUpdateManufacture($request->all(), $id);
            return $this->responseStatus(200, 'Cập nhật nhà sản xuất thành công', $manufacture);
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }

    public function destroy($id)
    {
        try {
            $ids = explode(",", $id);
            $this->manufactureRepository->delete($ids);
            return $this->responseStatus(200, 'Xóa thành công');
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }
}
