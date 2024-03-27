<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Rules\UniqueCompanyRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\FlareClient\Http\Exceptions\NotFound;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tymon\JWTAuth\Facades\JWTAuth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return ["success" => true, "data" => $companies];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // https://llama.pe/certificado-digital-de-prueba-sunat certificado digital de prueba
        // https://www.leaderssl.es/tools/ssl_converter pfx to pem
        $request->validate([
            "razon_social" => "required|string",
            "ruc" => ["required", "string", "regex:/^(10|20)\d{9}$/", "unique:companies,ruc"],
            "direccion" => "required|string",
            "logo_path" => "string",
            "sol_user" => "required|string",
            "sol_pass" => "required|string",
            "cert_path" => "required|string",
            "client_id" => "nullable|string",
            "client_secret" => "nullable|string",
            "production" => "required|boolean"
        ]);
        $body = $request->all();
        $body["user_id"] = JWTAuth::user()->id;
        $user = new Company($body);
        $user->save();
        return ["success" => true, "data" => $body];
    }

    /**
     * Display the specified resource.
     */
    public function show($param)
    {
        $company = Company::where("ruc", $param)->first();
        if (!$company) {
            $company = Company::find($param);
        }
        if (!$company) {
            throw new NotFoundHttpException("No se encontró companía con el ruc $param");
        }
        return ["success" => true, "company" => $company];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ruc)
    {
        $company = $this->show($ruc);
        $request->validate([
            "razon_social" => "required|string",
            "ruc" => ["required", "string", "regex:/^(10|20)\d{9}$/", new UniqueCompanyRule($company["company"]->id)],
            "direccion" => "required|string",
            "sol_user" => "required|string",
            "sol_pass" => "required|string",
            "client_id" => "nullable|string",
            "client_secret" => "nullable|string",
            "production" => "required|boolean"
        ]);
        $body = $request->all();
        $body["user_id"] = JWTAuth::user()->id;
        $company["company"]->update($body);
        return [
            "success" => true,
            "company" => $company["company"]
        ];

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ruc)
    {
        $company = $this->show($ruc);
        if ($company["company"]->logo_path) {
            Storage::delete($company["company"]->logo_path);
        }
        if ($company["company"]->cert_path) {
            Storage::delete($company["company"]->cert_path);
        }
        $company["company"]->delete();
        return ["success" => true, "message" => "Se eliminó correctamente la compañía $ruc"];
    }
}