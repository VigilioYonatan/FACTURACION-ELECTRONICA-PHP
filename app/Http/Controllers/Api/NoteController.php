<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Services\SunatService;
use App\Traits\SunatTrait;
use Greenter\Report\XmlUtils;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NoteController extends Controller
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
        $note = $sunat->getNote($body);
        $result = $see->send($note);

        // $response["xml"] = $see->getFactory()->getLastXml();
        // $response["hash"] = (new XmlUtils())->getHashSign($response["xml"]);
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
        $see = $sunat->getSee($company);
        $note = $sunat->getNote($body);
        $response['xml'] = $see->getXmlSigned($note);
        $response['hash'] = (new XmlUtils())->getHashSign($response['xml']);
        return $see->getXmlSigned($note);
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
        $note = $sunat->getNote($body);

        // $response['xml'] = $see->getXmlSigned($invoice);
        // $response['hash'] = (new XmlUtils())->getHashSign($response['xml']);
        return $sunat->getHtmlReport($note);
    }


    public function setTotales(&$body)
    {
        $details = collect($body["details"]);
        $body["mtoOperGravadas"] = $details->where("tipAfeIgv", 10)->sum("mtoValorVenta");
        $body["mtoOperExoneradas"] = $details->where("tipAfeIgv", 20)->sum("mtoValorVenta");
        $body["mtoOperInafectas"] = $details->where("tipAfeIgv", 30)->sum("mtoValorVenta");
        $body["mtoOperExportacion"] = $details->where("tipAfeIgv", 40)->sum("mtoValorVenta");
        $body["mtoOperGratuitas"] = $details->whereNotIn("tipAfeIgv", [10, 20, 30, 40])->sum("mtoValorVenta");

        $body["mtoIGV"] = $details->whereIn("tipAfeIgv", [10, 20, 30, 40])->sum("igv");
        $body["mtoIGVGratuitas"] = $details->whereNotIn("tipAfeIgv", [10, 20, 30, 40])->sum("igv");
        $body["icbper"] = $details->sum("icbper");
        $body["totalImpuestos"] = $body["mtoIGV"] + $body["icbper"];

        $body["valorVenta"] = $details->whereIn("tipAfeIgv", [10, 20, 30, 40])->sum("mtoValorVenta");
        $body["subTotal"] = $body["valorVenta"] + $body["mtoIGV"];
        $body["mtoImpVenta"] = floor($body["subTotal"] * 10) / 10;//redondea moneda
        $body["redondeo"] = $body["mtoImpVenta"] - $body["subTotal"];

    }
}