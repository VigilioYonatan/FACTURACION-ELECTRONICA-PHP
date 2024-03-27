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
        $body = $request->all();
        $ruc = $body["company"]["ruc"];
        $company = Company::where("ruc", $ruc)->first();
        if (!$company)
            throw new NotFoundHttpException("No se encontró companía con el ruc $ruc");
        $sunat = new SunatService();
        $despatch = $sunat->getDespatch($body);
        $api = $sunat->getSeeApi($company);
        $result = $api->send($despatch);
        // $ticket = $result->getTicket();
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