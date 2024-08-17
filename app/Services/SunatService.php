<?php
namespace App\Services;

use DateTime;
use Greenter\Api;
use Greenter\Model\Client\Client;
use Greenter\Model\Company\Address;
use Greenter\Model\Company\Company;
use Greenter\Model\Despatch\Despatch;
use Greenter\Model\Despatch\DespatchDetail;
use Greenter\Model\Despatch\Direction;
use Greenter\Model\Despatch\Driver;
use Greenter\Model\Despatch\Shipment;
use Greenter\Model\Despatch\Transportist;
use Greenter\Model\Despatch\Vehicle;
use Greenter\Model\Sale\FormaPagos\FormaPagoContado;
use Greenter\Model\Sale\Invoice;
use Greenter\Model\Sale\Legend;
use Greenter\Model\Sale\Note;
use Greenter\Model\Sale\SaleDetail;
use Greenter\Model\Voided\Voided;
use Greenter\Report\HtmlReport;
use Greenter\Report\Resolver\DefaultTemplateResolver;
use Greenter\See;
use Greenter\Ws\Services\SunatEndpoints;
use Greenter\XMLSecLibs\Certificate\X509Certificate;
use Greenter\XMLSecLibs\Certificate\X509ContentType;

class SunatService
{
    //  const companySchema ={
    //     ruc,
    //     razonSocial,
    //     nombreComercial,
    //     sol_user,
    //     sol_pass,
    //     // only guia de remision
    //     // client_id: nullable(string()),
    //     // client_secret: nullable(string()),
    //     production,
    // address:address
    // }
    //  const addressSchem
    //     ubigeo,
    //     departamento,
    //     provincia,
    //     distrito,
    //     urbanizacion,
    //     direccion,
    //     codLocal,
    // };
    public function getSee($company)
    {
        $see = new See();
        // find and get certficate
        // obligado poner certifiaco en .pem
        if ($company["production"]) {

            $certificate = new X509Certificate(base64_decode($company["certificado"]), $company["certificado_password"]);
            $see->setCertificate($certificate->export(X509ContentType::PEM));
        } else {
            $see->setCertificate(base64_decode($company["certificado"]));

        }

        $see->setService($company["production"] ? SunatEndpoints::FE_PRODUCCION : SunatEndpoints::FE_BETA);
        $see->setClaveSOL($company["ruc"], $company["sol_user"], $company["sol_pass"]);
        return $see;
    }
    public function getSeeApi($company)
    {
        $api = new Api($company["production"] ? [
            "auth" => "https://api-seguridad.sunat.gob.pe/v1",
            "cpe" => "https://api-cpe.sunat.gob.pe/v1"
        ] : [
            "auth" => "https://gre-test.nubefact.com/v1",
            "cpe" => "https://gre-test.nubefact.com/v1"
        ]);
        $api->setBuilderOptions([
            "strict_variables" => true,
            "optimizations" => 0,
            "debug" => true,
            "cache" => false
        ])
            ->setApiCredentials(
                $company["production"] ? $company["client_id"] : "test-85e5b0ae-255c-4891-a595-0b98c65c9854",
                $company["production"] ? $company["client_secret"] : "test-Hty/M6QshYvPgItX2P0+Kw=="
            )->setClaveSOL(
                $company["ruc"],
                $company["production"] ? $company["sol_user"] : "MODDATOS",
                $company["production"] ? $company["sol_pass"] : "MODDATOS",
            )->setCertificate(base64_decode($company["certificado"]));
        return $api;
    }

    public function getInvoice($data)
    {
        // Venta
        return (new Invoice())
            ->setUblVersion($data["ublVersion"] ?? "2.1")
            ->setTipoOperacion($data["tipoOperacion"] ?? null) // Venta - Catalog. 51
            ->setTipoDoc($data["tipoDoc"] ?? null) // Factura - Catalog. 01 
            ->setSerie($data["serie"] ?? null) // factura F001 - boleta B001
            ->setCorrelativo($data["correlativo"] ?? null) // numero de factura 00001 - unico
            ->setFechaEmision(new DateTime($data["fechaEmision"]) ?? null) // Zona horaria: Lima
            ->setFormaPago(new FormaPagoContado()) // FormaPago: Contado
            ->setTipoMoneda($data["tipoMoneda"]) // Sol - Catalog. 02
            ->setCompany($this->getCompany($data["company"]))
            ->setClient($this->getClient($data["client"]))

            // MTOOper
            ->setMtoOperGravadas($data["mtoOperGravadas"])
            ->setMtoOperExoneradas($data["mtoOperExoneradas"])
            ->setMtoOperInafectas($data["mtoOperInafectas"])
            ->setMtoOperExportacion($data["mtoOperExportacion"])
            ->setMtoOperGratuitas($data["mtoOperGratuitas"])

            // IMPUESTOS
            ->setMtoIGV($data["mtoIGV"])
            ->setMtoIGVGratuitas($data["mtoIGVGratuitas"])
            ->setIcbper($data["icbper"])
            ->setTotalImpuestos($data["totalImpuestos"])

            // totales
            ->setValorVenta($data["valorVenta"])
            ->setSubTotal($data["subTotal"])
            ->setRedondeo($data["redondeo"])
            ->setMtoImpVenta($data["mtoImpVenta"])
            // details
            ->setDetails($this->getDetails($data["details"]))
            ->setLegends($this->getLegends($data["legends"]));
        ;
    }

    public function getNote($data)
    {
        return (new Note())
            ->setUblVersion($data["ublVersion"] ?? "2.1")
            ->setTipoDoc($data["tipoDoc"] ?? null) // Factura - Catalog. 01 
            ->setSerie($data["serie"] ?? null) // factura F001 - boleta B001
            ->setCorrelativo($data["correlativo"] ?? null) // numero de factura 00001 - unico
            ->setFechaEmision(new DateTime($data["fechaEmision"]) ?? null) // Zona horaria: Lima
            ->setTipDocAfectado($data["tipDocAfectado"] ?? null)
            ->setNumDocfectado($data["numDocfectado"])
            ->setCodMotivo($data["codMotivo"] ?? null)
            ->setDesMotivo($data["desMotivo"] ?? null)
            ->setTipoMoneda($data["tipoMoneda"])
            ->setCompany($this->getCompany($data["company"]))
            ->setClient($this->getClient($data["client"]))  // MTOOper
            ->setMtoOperGravadas($data["mtoOperGravadas"])
            ->setMtoOperExoneradas($data["mtoOperExoneradas"])
            ->setMtoOperInafectas($data["mtoOperInafectas"])
            ->setMtoOperExportacion($data["mtoOperExportacion"])
            ->setMtoOperGratuitas($data["mtoOperGratuitas"])

            // IMPUESTOS
            ->setMtoIGV($data["mtoIGV"])
            ->setMtoIGVGratuitas($data["mtoIGVGratuitas"])
            ->setIcbper($data["icbper"])
            ->setTotalImpuestos($data["totalImpuestos"])

            // totales
            ->setValorVenta($data["valorVenta"])
            ->setSubTotal($data["subTotal"])
            ->setRedondeo($data["redondeo"])
            ->setMtoImpVenta($data["mtoImpVenta"])
            // details
            ->setDetails($this->getDetails($data["details"]))
            ->setLegends($this->getLegends($data["legends"]));
        ;
    }

    public function getDespatch($data)
    {
        return (new Despatch())->setVersion($data["version"] ?? "2022")
            ->setTipoDoc($data["tipoDoc"] ?? "09")
            ->setSerie($data["serie"] ?? null)
            ->setCorrelativo($data["correlativo"] ?? null)
            ->setFechaEmision(new DateTime($data["fechaEmision"] ?? null))
            ->setCompany($this->getCompany($data["company"]))
            ->setDestinatario($this->getClient($data["destinatario"]))
            ->setEnvio($this->getEnvio($data["envio"]))
            ->setDetails($this->getDespatchDetails($data["details"]));

    }
    public function getCompany($company)
    {
        return (new Company())
            ->setRuc($company["ruc"] ?? null)
            ->setRazonSocial($company["razonSocial"] ?? null)
            ->setNombreComercial($company["nombreComercial"] ?? null)
            ->setAddress($this->getAddress($company["address"]) ?? null);
    }
    public function getClient($client)
    {
        return (new Client())
            ->setTipoDoc($client["tipoDoc"] ?? null)
            ->setNumDoc($client["numDoc"] ?? null)
            ->setRznSocial($client["rznSocial"] ?? null);
    }
    public function getAddress($address)
    {
        return (new Address())
            ->setUbigueo($address["ubigeo"] ?? null)
            ->setDepartamento($address["departamento"] ?? null)
            ->setProvincia($address["provincia"] ?? null)
            ->setDistrito($address["distrito"] ?? null)
            ->setUrbanizacion($address["urbanizacion"] ?? null)
            ->setDireccion($address["direccion"] ?? null)
            ->setCodLocal($address["codLocal"] ?? null); // Codigo de establecimiento asignado por SUNAT, 0000 por defecto.
    }

    public function getDetails($details)
    {
        $green_details = [];
        foreach ($details as $detail) {
            $green_details[] = (new SaleDetail())
                ->setTipAfeIgv($detail["tipAfeIgv"] ?? null) // Gravado Op. Onerosa - Catalog. 07
                ->setCodProducto($detail["codProducto"] ?? null)
                ->setUnidad($detail["unidad"] ?? null) // Unidad - Catalog. 03
                ->setDescripcion($detail["descripcion"] ?? null)
                ->setCantidad($detail["cantidad"] ?? null)
                ->setMtoValorUnitario($detail["mtoValorUnitario"] ?? null)
                ->setMtoValorVenta($detail["mtoValorVenta"] ?? null)
                ->setMtoBaseIgv($detail["mtoBaseIgv"] ?? null)
                ->setPorcentajeIgv($detail["porcentajeIgv"] ?? null) // 18%
                ->setIgv($detail["igv"] ?? null)
                ->setFactorIcbper($detail["factorIcbper"] ?? null)
                ->setIcbper($detail["icbper"] ?? null)
                ->setTotalImpuestos($detail["totalImpuestos"] ?? null) // Suma de impuestos en el detalle
                ->setMtoPrecioUnitario($detail["mtoPrecioUnitario"] ?? null);
        }
        return $green_details;
    }
    public function getDespatchDetails($details)
    {
        $green_details = [];
        foreach ($details as $detail) {
            $green_details[] = (new DespatchDetail())
                ->setCodigo($detail["codigo"] ?? null)
                ->setUnidad($detail["unidad"] ?? null) // Unidad - Catalog. 03
                ->setDescripcion($detail["descripcion"] ?? null)
                ->setCantidad($detail["cantidad"] ?? null);

        }
        return $green_details;
    }

    public function getLegends($legends)
    {
        $green_legends = [];
        foreach ($legends as $legend) {
            $green_legends[] = (new Legend())
                ->setCode($legend["code"] ?? null) // Monto en letras - Catalog. 52
                ->setValue($legend["value"] ?? null);
        }
        return $green_legends;
    }
    public function getEnvio($data)
    {
        $shipment = (new Shipment())
            ->setCodTraslado($data["codTraslado"] ?? null) // catalogo 6 -sunat
            ->setModTraslado($data["modTraslado"] ?? null)
            ->setFecTraslado(new DateTime($data["fecTraslado"]))
            ->setPesoTotal($data["pesoTotal"] ?? null)
            ->setUndPesoTotal($data["undPesoTotal"] ?? null)
            ->setLlegada(new Direction($data["llegada"]["ubigeo"], $data["llegada"]["direccion"]))
            ->setPartida(new Direction($data["partida"]["ubigeo"], $data["partida"]["direccion"]));
        if ($data["modTraslado"] === "01") {
            $shipment->setTransportista($this->getTransportista($data["transportista"]));
        }
        if ($data["modTraslado"] === "02") {
            $shipment->setVehiculo($this->getVehiculo($data["vehiculos"]))
                ->setChoferes($this->getChoferes($data["choferes"]));
        }
        return $shipment;
    }

    public function getTransportista($data)
    {
        return (new Transportist())
            ->setTipoDoc($data["tipoDoc"] ?? null)
            ->setNumDoc($data["numDoc"] ?? null)
            ->setRznSocial($data["rznSocial"] ?? null)
            ->setNroMtc($data["nroMtc"] ?? null);

    }

    public function getVehiculo($vehiculos)
    {
        $vehiculos = collect($vehiculos);
        $secundarios = [];
        foreach ($vehiculos->slice(1) as $item) {
            $secundarios[] = (new Vehicle())->setPlaca($item["placa"] ?? null);
        }
        return (new Vehicle())->setPlaca($vehiculos->first()["placa"] ?? null)->setSecundarios($secundarios);
    }
    public function getChoferes($choferes)
    {
        $choferes = collect($choferes);
        $drivers = [];

        $drivers[] = (new Driver())->setTipo("Principal")
            ->setTipoDoc($choferes->first()["tipoDoc"] ?? null)
            ->setNroDoc($choferes->first()["nroDoc"] ?? null)
            ->setLicencia($choferes->first()["licencia"] ?? null)
            ->setNombres($choferes->first()["nombres"] ?? null)
            ->setApellidos($choferes->first()["apellidos"] ?? null);
        foreach ($choferes->slice(1) as $item) {
            $drivers[] = (new Driver())->setTipo("Secundario")
                ->setTipoDoc($item->first()["tipoDoc"] ?? null)
                ->setNroDoc($item->first()["nroDoc"] ?? null)
                ->setLicencia($item->first()["licencia"] ?? null)
                ->setNombres($item->first()["nombres"] ?? null)
                ->setApellidos($item->first()["apellidos"] ?? null);
        }
        return $drivers;
    }


    public function sunatResponse($result)
    {

        $response["success"] = $result->isSuccess();
        // Verificamos que la conexión con SUNAT fue exitosa.
        if (!$response["success"]) {
            // Mostrar error al conectarse a SUNAT.
            $response["error"] = [
                "code" => $result->getError()->getCode(),
                "message" => $result->getError()->getMessage(),
            ];
            return $response;
        }

        $cdr = $result->getCdrResponse();
        $response["cdrZip"] = base64_encode($result->getCdrZip());

        $response["cdrResponse"] = [
            "code" => (int) $cdr->getCode(), // 0 = aceptado a sunat, >= 2000 o <= 3999 error de de sunat
            "description" => $cdr->getDescription(),
            "notes" => $cdr->getNotes()
        ];
        return $response;
    }


    public function getHtmlReport($invoice, $company, $type, $isInvoice = true)
    {
        $report = null;
        if ($type === "ticket" && $isInvoice) {
            $twigOptions = [
                'cache' => __DIR__ . '/cache',
                'strict_variables' => true,
            ];
            $report = new HtmlReport(__DIR__ . '/custom', $twigOptions);
            $report->setTemplate('factura.html.twig');
        } else {
            $report = new HtmlReport();
            $resolver = new DefaultTemplateResolver();
            $report->setTemplate($resolver->getTemplate($invoice));
        }

        $params = [
            'system' => [
                'logo' => base64_decode($company["logo"])
                , // Logo de Empresa
                'hash' => 'qqnr2dN4p/HmaEA/CJuVGo7dv5g=', // Valor Resumen 
            ],
            'user' => [
                'header' => "Telf: $company[telephone]", // Texto que se ubica debajo de la dirección de empresa
                'extras' => [
                    // Leyendas adicionales
                    ['name' => 'CONDICION DE PAGO', 'value' => $company["condicion_pago"]], // efectivo
                    ['name' => 'VENDEDOR', 'value' => $company["vendedor"]],
                ],
                'footer' => '<p>Nro Resolucion: <b>3232323</b></p>'
            ]
        ];

        return $report->render($invoice, $params);
    }


    public function getCancel($data)
    {
        $voided = new Voided();
        $voided->setCorrelativo($data["correlativo"])
            ->setFecGeneracion(new DateTime())
            ->setFecComunicacion(new DateTime())
            ->setCompany($this->getCompany($data["company"]))
            ->setDetails([
                [
                    'tipoDoc' => $data["tipoDoc"], // Tipo de documento (boleta)
                    'serie' => $data["serie"],
                    'correlativo' => $data["correlativo"] // Número de la boleta a anular
                ]
            ]);
        return $voided;

    }
}