<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Repositories\Cms\Customer\CustomerRepository;
use App\Services\MailService;
use App\Services\StatusResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    use StatusResponse;

    protected $customerRepository;
    protected $mailService;

    public function __construct(CustomerRepository $customerRepository, MailService $mailService)
    {
        $this->customerRepository = $customerRepository;
        $this->mailService = $mailService;
    }

    public function index()
    {
        $customers = $this->customerRepository->paginate('*', 10, 'DESC');
        return view('cms.modules.customers.index', compact('customers'));
    }

    public function store(Request $request)
    {
        try {
            $customers = $this->customerRepository->createOrUpdateCustomer($request->all());
            return $this->responseStatus(201, 'Create Success', $customers);
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }

    public function destroy($id)
    {
        try {
            $ids = explode(",", $id);
            $this->customerRepository->delete($ids);
            $customer = $this->customerRepository->paginate('*', 10, 'DESC');
            $customer->setPath('admin/customers');
            return view('admins.modules.customers.list-customer', compact('customer'));
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }

    public function sendNotification(Request $request)
    {
        try {
            $emails = $request->email;
            $subject = '[CMS Shop] Send Notification!';
            $this->mailService->sendNotification($subject, 'cmm',  $emails);
            return $this->responseStatus(200, 'Send Mail Success');
        } catch (\Exception $e) {
            return $this->responseException(500, $e);
        }
    }
}
