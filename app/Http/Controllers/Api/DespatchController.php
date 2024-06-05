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
        return $ticket;
        $result = $api->getStatus($ticket);
        $response["xml"] = $api->getLastXml();
        $response["hash"] = (new XmlUtils())->getHashSign($response["xml"]);
        $response["sunatResponse"] = $sunat->sunatResponse($result);
        return "error";
        // $result = $api->getStatus($ticket);
        // $response['xml'] = $api->getLastXml();
        // $response['hash'] = (new XmlUtils())->getHashSign($response['xml']);
        // return $api->getLastXml();
    }
    public function xml(Request $request)
    {
    }
    public function pdf(Request $request)
    {
    }
}