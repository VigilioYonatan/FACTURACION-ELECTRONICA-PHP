<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SunatService;
use App\Traits\SunatTrait;
use Greenter\Report\XmlUtils;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    use SunatTrait;
    public function send(Request $request)
    {
        $request->validate([
            "company" => "required|array",
            "company.address" => "required|array",
            "client" => "required|array",
            "details" => "required|array",
            "details.*" => "required|array"
        ]);
        $body = $request->all();
        $company = $body["company"];
        $this->setTotales($body);
        $this->setLegends($body);

        $sunat = new SunatService();
        $see = $sunat->getSee($company);
        $invoice = $sunat->getInvoice($body);
        $result = $see->send($invoice);

        $response["xml"] = $see->getFactory()->getLastXml();
        $response["hash"] = (new XmlUtils())->getHashSign($response["xml"]);
        $response["sunatResponse"] = $sunat->sunatResponse($result);
        return $response;

    }


}