<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Services\SunatService;
use App\Traits\SunatTrait;
use Greenter\Report\XmlUtils;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $ruc = $body["company"]["ruc"];
        $company = Company::where("ruc", $ruc)->first();
        if (!$company)
            throw new NotFoundHttpException("No se encontró companía con el ruc $ruc");
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
    public function xml(Request $request)
    {
        $request->validate([
            "company" => "required|array",
            "company.address" => "required|array",
            "client" => "required|array",
            "details" => "required|array",
            "details.*" => "required|array"
        ]);
        $body = $request->all();
        $ruc = $body["company"]["ruc"];
        $company = Company::where("ruc", $ruc)->first();
        if (!$company)
            throw new NotFoundHttpException("No se encontró companía con el ruc $ruc");
        $this->setTotales($body);
        $this->setLegends($body);

        $sunat = new SunatService();
        $see = $sunat->getSee($company); // para xml
        $invoice = $sunat->getInvoice($body);
        // $response['xml'] = $see->getXmlSigned($invoice);
        // $response['hash'] = (new XmlUtils())->getHashSign($response['xml']);
        return $see->getXmlSigned($invoice);
    }
    public function pdf(Request $request)
    {
        $request->validate([
            "company" => "required|array",
            "company.address" => "required|array",
            "client" => "required|array",
            "details" => "required|array",
            "details.*" => "required|array"
        ]);
        $body = $request->all();
        $ruc = $body["company"]["ruc"];
        $company = Company::where("ruc", $ruc)->first();
        if (!$company)
            throw new NotFoundHttpException("No se encontró companía con el ruc $ruc");
        $this->setTotales($body);
        $this->setLegends($body);

        $sunat = new SunatService();
        $invoice = $sunat->getInvoice($body);
        // $response['xml'] = $see->getXmlSigned($invoice);
        // $response['hash'] = (new XmlUtils())->getHashSign($response['xml']);
        return $sunat->getHtmlReport($invoice);
    }



}