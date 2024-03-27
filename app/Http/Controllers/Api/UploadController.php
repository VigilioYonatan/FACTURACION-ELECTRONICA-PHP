<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class UploadController extends Controller
{
    public function store(Request $request, $model, $property)
    {

        if (!$request->file("file")) {
            throw new BadRequestException("Este campo es obligatorio:file");
        }
        switch ($model) {
            case 'companies':
                if ($property === "cert_path") {
                    $this->uploadFile($request->file("file"), ["extensions" => ["txt"]]);
                }
                break;

            default:
                throw new BadRequestException("Compania o propiedad no válida.:file");
        }
        $file = $request->file("file")->store($model);
        return ["success" => true, "file" => $file];
    }

    private function uploadFile($file, $options)
    {
        $extension = $file->extension();

        $size = $file->getSize() / (1024 * 1024); //
        if (!in_array($extension, $options["extensions"])) {
            throw new BadRequestException("Extensión no válido.:file");
        }
        $maxSize = $options["max_size"] ?? 2;
        $minSize = $options["min_size"] ?? 0.001;
        if ($size > $maxSize) {
            throw new BadRequestException("Archivo muy pesado, max $maxSize mb.:file");
        }
        if ($size < $minSize ?? 0.001) {
            throw new BadRequestException("Archivo muy ligero, max $minSize mb.:file");
        }
    }
}