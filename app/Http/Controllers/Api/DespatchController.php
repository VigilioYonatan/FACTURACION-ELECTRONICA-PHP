<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Services\SunatService;
use Greenter\Report\XmlUtils;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DespatchController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            "company" => "required|array",
            "company.address" => "required|array",
            "destinatario" => "required|array",
            "envio" => "required|array",
            "details.*" => "required|array"
        ]);
        $sunat = new SunatService();
        $body = $request->all();
        $company = $body["company"];
        $despatch = $sunat->getDespatch($body);
        $api = $sunat->getSeeApi($company);
        $result = $api->send($despatch);
        $ticket = $result->getTicket();
        $result = $api->getStatus($ticket);
        $response["xml"] = $api->getLastXml();
        $response["hash"] = (new XmlUtils())->getHashSign($response["xml"]);
        $response["sunatResponse"] = $sunat->sunatResponse($result);
        return $response;

    }
    public function xml(Request $request)
    {
        $request->validate([
            "company" => "required|array",
            "company.address" => "required|array",
            "destinatario" => "required|array",
            "envio" => "required|array",
            "details.*" => "required|array"
        ]);
        $sunat = new SunatService();
        $body = $request->all();
        $company = $body["company"];
        $despatch = $sunat->getDespatch($body);
        $see = $sunat->getSee($company);
        $response["xml"] = $see->getXmlSigned($despatch);
        $response["hash"] = (new XmlUtils())->getHashSign($response["xml"]);
        return $response;
    }
    public function pdf(Request $request)
    {
        $request->validate([
            "company" => "required|array",
            "company.address" => "required|array",
            "destinatario" => "required|array",
            "envio" => "required|array",
            "details.*" => "required|array"
        ]);
        $body = $request->all();
        $type = $request->query("type", "invoice");
        // $company = Company::where("ruc", $ruc)->first();
        // if (!$company)
        //     throw new NotFoundHttpException("No se encontró companía con el ruc $ruc");
        $company = $body["company"];
        $sunat = new SunatService();
        $despatch = $sunat->getDespatch($body);
        // $response['xml'] = $see->getXmlSigned($invoice);
        // $response['hash'] = (new XmlUtils())->getHashSign($response['xml']);
        return $sunat->getHtmlReport($despatch, $company, $type, false);
    }
}