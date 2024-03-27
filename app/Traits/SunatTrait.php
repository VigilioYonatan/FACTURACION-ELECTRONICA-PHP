<?php

namespace App\Traits;

use Luecano\NumeroALetras\NumeroALetras;

trait SunatTrait
{
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

    public function setLegends(&$body)
    {
        $formatter = new NumeroALetras();
        $body["legends"] = [
            [
                "code" => "1000",
                "value" => $formatter->toInvoice($body["mtoImpVenta"], 2, "SOLES")
            ]
        ];
    }
}