<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* factura.html.twig */
class __TwigTemplate_eb40a60102c3232810a621a5bd27830e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        yield "<html>
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
    <style type=\"text/css\">
        ";
        // line 5
        yield from         $this->loadTemplate("assets/style.css", "factura.html.twig", 5)->unwrap()->yield($context);
        // line 6
        yield "    </style>
</head>
<body class=\"white-bg \"  style=\"padding:10px; !important\">
";
        // line 9
        $context["cp"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 9, $this->source); })()), "company", [], "any", false, false, false, 9);
        // line 10
        $context["isNota"] = CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 10, $this->source); })()), "tipoDoc", [], "any", false, false, false, 10), ["07", "08"]);
        // line 11
        $context["isAnticipo"] = (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "totalAnticipos", [], "any", true, true, false, 11) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 11, $this->source); })()), "totalAnticipos", [], "any", false, false, false, 11) > 0));
        // line 12
        $context["name"] = $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 12, $this->source); })()), "tipoDoc", [], "any", false, false, false, 12), "01");
        // line 13
        yield "<table width=\"100%\">
    <tbody><tr>
        <td>
            <table width=\"100%\" height=\"200px\" border=\"0\" aling=\"center\" cellpadding=\"0\" cellspacing=\"0\">
                <tbody>
                <tr>
                    <td width=\"100%\" height=\"90\" align=\"center\">
                        <span><img src=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\ImageFilter')->toBase64(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 20, $this->source); })()), "system", [], "any", false, false, false, 20), "logo", [], "any", false, false, false, 20)), "html", null, true);
        yield "\" height=\"80\" style=\"text-align:center\" border=\"0\"></span>
                    </td>                
                </tr>
                <tr>
                    <td width=\"100%\" rowspan=\"2\" valign=\"bottom\" style=\"padding-left:0\">
                        <div class=\"tabla_borde\">
                            <table width=\"100%\" border=\"0\"  cellpadding=\"0\" cellspacing=\"0\">
                                <tbody><tr>
                                    <td align=\"center\">
                                        <span style=\"font-family:Tahoma, Geneva, sans-serif; font-size:29px\" text-align=\"center\">";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 29, $this->source); })()), "html", null, true);
        yield "</span>
                                        <br>
                                        <span style=\"font-family:Tahoma, Geneva, sans-serif; font-size:19px\" text-align=\"center\">E L E C T R Ó N I C A</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"center\">
                                        <span style=\"font-size:15px\" text-align=\"center\">R.U.C.: ";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["cp"]) || array_key_exists("cp", $context) ? $context["cp"] : (function () { throw new RuntimeError('Variable "cp" does not exist.', 36, $this->source); })()), "ruc", [], "any", false, false, false, 36), "html", null, true);
        yield "</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"center\">
                                        <span style=\"font-size:24px\">";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 41, $this->source); })()), "serie", [], "any", false, false, false, 41), "html", null, true);
        yield "-";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 41, $this->source); })()), "correlativo", [], "any", false, false, false, 41), "html", null, true);
        yield "</span>
                                    </td>
                                </tr>
                                </tbody></table>
                        </div>
                    </td>
                </tr>      
                </tbody></table>
                <tr>
                    <td width=\"100%\" valign=\"bottom\" style=\"padding-left:0\">
                        <div class=\"tabla_borde\">
                            <table width=\"100%\" height=\"100%\" border=\"0\" border-radius=\"\" cellpadding=\"9\" cellspacing=\"0\">
                                <tbody><tr>
                                    <td align=\"center\">
                                        <strong><span style=\"font-size:15px\">";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["cp"]) || array_key_exists("cp", $context) ? $context["cp"] : (function () { throw new RuntimeError('Variable "cp" does not exist.', 55, $this->source); })()), "razonSocial", [], "any", false, false, false, 55), "html", null, true);
        yield "</span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"left\">
                                        <strong>Dirección: </strong>";
        // line 60
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["cp"]) || array_key_exists("cp", $context) ? $context["cp"] : (function () { throw new RuntimeError('Variable "cp" does not exist.', 60, $this->source); })()), "address", [], "any", false, false, false, 60), "direccion", [], "any", false, false, false, 60), "html", null, true);
        yield "
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"left\">
                                        ";
        // line 65
        yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 65, $this->source); })()), "user", [], "any", false, false, false, 65), "header", [], "any", false, false, false, 65);
        yield "
                                    </td>
                                </tr>
                                </tbody></table>
                        </div>
                    </td>
                </tr>
            <div class=\"tabla_borde\">
                ";
        // line 73
        $context["cl"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 73, $this->source); })()), "client", [], "any", false, false, false, 73);
        // line 74
        yield "                <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                    <tbody><tr>
                        <td width=\"60%\" align=\"left\"><strong>Razón Social:</strong>  ";
        // line 76
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["cl"]) || array_key_exists("cl", $context) ? $context["cl"] : (function () { throw new RuntimeError('Variable "cl" does not exist.', 76, $this->source); })()), "rznSocial", [], "any", false, false, false, 76), "html", null, true);
        yield "</td>
                        <td width=\"40%\" align=\"left\"><strong>";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog(CoreExtension::getAttribute($this->env, $this->source, (isset($context["cl"]) || array_key_exists("cl", $context) ? $context["cl"] : (function () { throw new RuntimeError('Variable "cl" does not exist.', 77, $this->source); })()), "tipoDoc", [], "any", false, false, false, 77), "06"), "html", null, true);
        yield ":</strong>  ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["cl"]) || array_key_exists("cl", $context) ? $context["cl"] : (function () { throw new RuntimeError('Variable "cl" does not exist.', 77, $this->source); })()), "numDoc", [], "any", false, false, false, 77), "html", null, true);
        yield "</td>
                    </tr>
                    <tr>
                        <td width=\"60%\" align=\"left\">
                            <strong>Fecha Emisión: </strong>  ";
        // line 81
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 81, $this->source); })()), "fechaEmision", [], "any", false, false, false, 81), "d/m/Y"), "html", null, true);
        yield "
                            ";
        // line 82
        if (($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 82, $this->source); })()), "fechaEmision", [], "any", false, false, false, 82), "H:i:s") != "00:00:00")) {
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 82, $this->source); })()), "fechaEmision", [], "any", false, false, false, 82), "H:i:s"), "html", null, true);
            yield " ";
        }
        // line 83
        yield "                            ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "fecVencimiento", [], "any", true, true, false, 83) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 83, $this->source); })()), "fecVencimiento", [], "any", false, false, false, 83))) {
            // line 84
            yield "                            <br><br><strong>Fecha Vencimiento: </strong>  ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 84, $this->source); })()), "fecVencimiento", [], "any", false, false, false, 84), "d/m/Y"), "html", null, true);
            yield "
                            ";
        }
        // line 86
        yield "                        </td>
                        <td width=\"40%\" align=\"left\"><strong>Dirección: </strong>  ";
        // line 87
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["cl"]) || array_key_exists("cl", $context) ? $context["cl"] : (function () { throw new RuntimeError('Variable "cl" does not exist.', 87, $this->source); })()), "address", [], "any", false, false, false, 87)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["cl"]) || array_key_exists("cl", $context) ? $context["cl"] : (function () { throw new RuntimeError('Variable "cl" does not exist.', 87, $this->source); })()), "address", [], "any", false, false, false, 87), "direccion", [], "any", false, false, false, 87), "html", null, true);
        }
        yield "</td>
                    </tr>
                    ";
        // line 89
        if ((isset($context["isNota"]) || array_key_exists("isNota", $context) ? $context["isNota"] : (function () { throw new RuntimeError('Variable "isNota" does not exist.', 89, $this->source); })())) {
            // line 90
            yield "                    <tr>
                        <td width=\"60%\" align=\"left\"><strong>Tipo Doc. Ref.: </strong>  ";
            // line 91
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 91, $this->source); })()), "tipDocAfectado", [], "any", false, false, false, 91), "01"), "html", null, true);
            yield "</td>
                        <td width=\"40%\" align=\"left\"><strong>Documento Ref.: </strong>  ";
            // line 92
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 92, $this->source); })()), "numDocfectado", [], "any", false, false, false, 92), "html", null, true);
            yield "</td>
                    </tr>
                    ";
        }
        // line 95
        yield "                    <tr>
                        <td width=\"60%\" align=\"left\"><strong>Tipo Moneda: </strong>  ";
        // line 96
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 96, $this->source); })()), "tipoMoneda", [], "any", false, false, false, 96), "021"), "html", null, true);
        yield " </td>
                        <td width=\"40%\" align=\"left\">";
        // line 97
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "compra", [], "any", true, true, false, 97) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 97, $this->source); })()), "compra", [], "any", false, false, false, 97))) {
            yield "<strong>O/C: </strong>  ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 97, $this->source); })()), "compra", [], "any", false, false, false, 97), "html", null, true);
        }
        yield "</td>
                    </tr>
                    ";
        // line 99
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 99, $this->source); })()), "guias", [], "any", false, false, false, 99)) {
            // line 100
            yield "                    <tr>
                        <td width=\"60%\" align=\"left\"><strong>Guias: </strong>
                        ";
            // line 102
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 102, $this->source); })()), "guias", [], "any", false, false, false, 102));
            foreach ($context['_seq'] as $context["_key"] => $context["guia"]) {
                // line 103
                yield "                            ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["guia"], "nroDoc", [], "any", false, false, false, 103), "html", null, true);
                yield "&nbsp;&nbsp;
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['guia'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 104
            yield "</td>
                        <td width=\"40%\"></td>
                    </tr>
                    ";
        }
        // line 108
        yield "                    </tbody></table>
            </div><br>
            ";
        // line 110
        $context["moneda"] = $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 110, $this->source); })()), "tipoMoneda", [], "any", false, false, false, 110), "02");
        // line 111
        yield "            <div class=\"tabla_borde\">
                <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                    <tbody>
                        <tr>
                            <td align=\"center\" class=\"bold\">Cantidad</td>
                            <td align=\"center\" class=\"bold\">Código</td>
                            <td align=\"center\" class=\"bold\">Descripción</td>
                            <td align=\"center\" class=\"bold\">Valor Unitario</td>
                            <td align=\"center\" class=\"bold\">Valor Total</td>
                        </tr>
                        ";
        // line 121
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 121, $this->source); })()), "details", [], "any", false, false, false, 121));
        foreach ($context['_seq'] as $context["_key"] => $context["det"]) {
            // line 122
            yield "                        <tr class=\"border_top\">
                            <td align=\"center\">
                                ";
            // line 124
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(CoreExtension::getAttribute($this->env, $this->source, $context["det"], "cantidad", [], "any", false, false, false, 124)), "html", null, true);
            yield "
                                ";
            // line 125
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["det"], "unidad", [], "any", false, false, false, 125), "html", null, true);
            yield "
                            </td>
                            <td align=\"center\">
                                ";
            // line 128
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["det"], "codProducto", [], "any", false, false, false, 128), "html", null, true);
            yield "
                            </td>
                            <td align=\"center\" width=\"300px\">
                                <span>";
            // line 131
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["det"], "descripcion", [], "any", false, false, false, 131), "html", null, true);
            yield "</span><br>
                            </td>
                            <td align=\"center\">
                                ";
            // line 134
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 134, $this->source); })()), "html", null, true);
            yield "
                                ";
            // line 135
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(CoreExtension::getAttribute($this->env, $this->source, $context["det"], "mtoValorUnitario", [], "any", false, false, false, 135)), "html", null, true);
            yield "
                            </td>
                            <td align=\"center\">
                                ";
            // line 138
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 138, $this->source); })()), "html", null, true);
            yield "
                                ";
            // line 139
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(CoreExtension::getAttribute($this->env, $this->source, $context["det"], "mtoValorVenta", [], "any", false, false, false, 139)), "html", null, true);
            yield "
                            </td>
                        </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['det'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 143
        yield "                    </tbody>
                </table></div>
            <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                <tbody>
                <tr>
                    <td width=\"1000%\" valign=\"top\">
                        <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                            <tbody>
                            <tr>
                                <td colspan=\"4\">
                                    <br>
                                    <br>
                                    <span style=\"font-family:Tahoma, Geneva, sans-serif; font-size:12px\" text-align=\"center\"><strong>";
        // line 155
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\ResolveFilter')->getValueLegend(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 155, $this->source); })()), "legends", [], "any", false, false, false, 155), "1000"), "html", null, true);
        yield "</strong></span>
                                    <br>
                                    <br>
                                    <strong>Información Adicional</strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                            <tbody>
                            <tr class=\"border_top\">
                                <td width=\"30%\" style=\"font-size: 10px;\">
                                    LEYENDA:
                                </td>
                                <td width=\"70%\" style=\"font-size: 10px;\">
                                    <p>
                                        ";
        // line 171
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 171, $this->source); })()), "legends", [], "any", false, false, false, 171));
        foreach ($context['_seq'] as $context["_key"] => $context["leg"]) {
            // line 172
            yield "                                        ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["leg"], "code", [], "any", false, false, false, 172) != "1000")) {
                // line 173
                yield "                                            ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["leg"], "value", [], "any", false, false, false, 173), "html", null, true);
                yield "<br>
                                        ";
            }
            // line 175
            yield "                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['leg'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 176
        yield "                                    </p>
                                </td>
                            </tr>
                            ";
        // line 179
        if ((isset($context["isNota"]) || array_key_exists("isNota", $context) ? $context["isNota"] : (function () { throw new RuntimeError('Variable "isNota" does not exist.', 179, $this->source); })())) {
            // line 180
            yield "                            <tr class=\"border_top\">
                                <td width=\"30%\" style=\"font-size: 10px;\">
                                    MOTIVO DE EMISIÓN:
                                </td>
                                <td width=\"70%\" style=\"font-size: 10px;\">
                                    ";
            // line 185
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 185, $this->source); })()), "desMotivo", [], "any", false, false, false, 185), "html", null, true);
            yield "
                                </td>
                            </tr>
                            ";
        }
        // line 189
        yield "                            ";
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "user", [], "any", false, true, false, 189), "extras", [], "any", true, true, false, 189)) {
            // line 190
            yield "                                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 190, $this->source); })()), "user", [], "any", false, false, false, 190), "extras", [], "any", false, false, false, 190));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 191
                yield "                                    <tr class=\"border_top\">
                                        <td width=\"30%\" style=\"font-size: 10px;\">
                                            ";
                // line 193
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 193)), "html", null, true);
                yield ":
                                        </td>
                                        <td width=\"70%\" style=\"font-size: 10px;\">
                                            ";
                // line 196
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "value", [], "any", false, false, false, 196), "html", null, true);
                yield "
                                        </td>
                                    </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 200
            yield "                            ";
        }
        // line 201
        yield "                            </tbody>
                        </table>
                        ";
        // line 203
        if ((isset($context["isAnticipo"]) || array_key_exists("isAnticipo", $context) ? $context["isAnticipo"] : (function () { throw new RuntimeError('Variable "isAnticipo" does not exist.', 203, $this->source); })())) {
            // line 204
            yield "                        <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                            <tbody>
                            <tr>
                                <td>
                                    <br>
                                    <strong>Anticipo</strong>
                                    <br>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"font-size: 10px;\">
                            <tbody>
                            <tr>
                                <td width=\"30%\"><b>Nro. Doc.</b></td>
                                <td width=\"70%\"><b>Total</b></td>
                            </tr>
                            ";
            // line 221
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 221, $this->source); })()), "anticipos", [], "any", false, false, false, 221));
            foreach ($context['_seq'] as $context["_key"] => $context["atp"]) {
                // line 222
                yield "                            <tr class=\"border_top\">
                                <td width=\"30%\">";
                // line 223
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["atp"], "nroDocRel", [], "any", false, false, false, 223), "html", null, true);
                yield "</td>
                                <td width=\"70%\">";
                // line 224
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 224, $this->source); })()), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(CoreExtension::getAttribute($this->env, $this->source, $context["atp"], "total", [], "any", false, false, false, 224)), "html", null, true);
                yield "</td>
                            </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['atp'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 227
            yield "                            </tbody>
                        </table>
                        ";
        }
        // line 230
        yield "                    </td>
                    
                </tr><tr>
                <td width=\"100%\" valign=\"top\">
                        <br>
                        <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"table table-valores-totales\">
                            <tbody>
                            ";
        // line 237
        if ((isset($context["isAnticipo"]) || array_key_exists("isAnticipo", $context) ? $context["isAnticipo"] : (function () { throw new RuntimeError('Variable "isAnticipo" does not exist.', 237, $this->source); })())) {
            // line 238
            yield "                                <tr class=\"border_bottom\">
                                    <td align=\"right\"><strong>Total Anticipo:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 240
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 240, $this->source); })()), "html", null, true);
            yield "  ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 240, $this->source); })()), "totalAnticipos", [], "any", false, false, false, 240)), "html", null, true);
            yield "</span></td>
                                </tr>
                            ";
        }
        // line 243
        yield "                            ";
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 243, $this->source); })()), "mtoOperGravadas", [], "any", false, false, false, 243)) {
            // line 244
            yield "                            <tr class=\"border_bottom\">
                                <td align=\"right\"><strong>Op. Gravadas:</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
            // line 246
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 246, $this->source); })()), "html", null, true);
            yield "  ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 246, $this->source); })()), "mtoOperGravadas", [], "any", false, false, false, 246)), "html", null, true);
            yield "</span></td>
                            </tr>
                            ";
        }
        // line 249
        yield "                            ";
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 249, $this->source); })()), "mtoOperInafectas", [], "any", false, false, false, 249)) {
            // line 250
            yield "                            <tr class=\"border_bottom\">
                                <td align=\"right\"><strong>Op. Inafectas:</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
            // line 252
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 252, $this->source); })()), "html", null, true);
            yield "  ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 252, $this->source); })()), "mtoOperInafectas", [], "any", false, false, false, 252)), "html", null, true);
            yield "</span></td>
                            </tr>
                            ";
        }
        // line 255
        yield "                            ";
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 255, $this->source); })()), "mtoOperExoneradas", [], "any", false, false, false, 255)) {
            // line 256
            yield "                            <tr class=\"border_bottom\">
                                <td align=\"right\"><strong>Op. Exoneradas:</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
            // line 258
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 258, $this->source); })()), "html", null, true);
            yield "  ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 258, $this->source); })()), "mtoOperExoneradas", [], "any", false, false, false, 258)), "html", null, true);
            yield "</span></td>
                            </tr>
                            ";
        }
        // line 261
        yield "                            <tr>
                                <td align=\"right\"><strong>I.G.V.";
        // line 262
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "user", [], "any", false, true, false, 262), "numIGV", [], "any", true, true, false, 262)) {
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 262, $this->source); })()), "user", [], "any", false, false, false, 262), "numIGV", [], "any", false, false, false, 262), "html", null, true);
            yield "%";
        }
        yield ":</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
        // line 263
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 263, $this->source); })()), "html", null, true);
        yield "  ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 263, $this->source); })()), "mtoIGV", [], "any", false, false, false, 263)), "html", null, true);
        yield "</span></td>
                            </tr>
                            ";
        // line 265
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 265, $this->source); })()), "mtoISC", [], "any", false, false, false, 265)) {
            // line 266
            yield "                            <tr>
                                <td align=\"right\"><strong>I.S.C.:</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
            // line 268
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 268, $this->source); })()), "html", null, true);
            yield "  ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 268, $this->source); })()), "mtoISC", [], "any", false, false, false, 268)), "html", null, true);
            yield "</span></td>
                            </tr>
                            ";
        }
        // line 271
        yield "                            ";
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 271, $this->source); })()), "sumOtrosCargos", [], "any", false, false, false, 271)) {
            // line 272
            yield "                                <tr>
                                    <td align=\"right\"><strong>Otros Cargos:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 274
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 274, $this->source); })()), "html", null, true);
            yield "  ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 274, $this->source); })()), "sumOtrosCargos", [], "any", false, false, false, 274)), "html", null, true);
            yield "</span></td>
                                </tr>
                            ";
        }
        // line 277
        yield "                            ";
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 277, $this->source); })()), "icbper", [], "any", false, false, false, 277)) {
            // line 278
            yield "                                <tr>
                                    <td align=\"right\"><strong>I.C.B.P.E.R.:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 280
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 280, $this->source); })()), "html", null, true);
            yield "  ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 280, $this->source); })()), "icbper", [], "any", false, false, false, 280)), "html", null, true);
            yield "</span></td>
                                </tr>
                            ";
        }
        // line 283
        yield "                            ";
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 283, $this->source); })()), "mtoOtrosTributos", [], "any", false, false, false, 283)) {
            // line 284
            yield "                                <tr>
                                    <td align=\"right\"><strong>Otros Tributos:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 286
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 286, $this->source); })()), "html", null, true);
            yield "  ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 286, $this->source); })()), "mtoOtrosTributos", [], "any", false, false, false, 286)), "html", null, true);
            yield "</span></td>
                                </tr>
                            ";
        }
        // line 289
        yield "                            <tr>
                                <td align=\"right\"><strong>Precio Venta:</strong></td>
                                <td width=\"120\" align=\"right\"><span id=\"ride-importeTotal\" class=\"ride-importeTotal\">";
        // line 291
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 291, $this->source); })()), "html", null, true);
        yield "  ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 291, $this->source); })()), "mtoImpVenta", [], "any", false, false, false, 291)), "html", null, true);
        yield "</span></td>
                            </tr>
                            ";
        // line 293
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 293, $this->source); })()), "perception", [], "any", false, false, false, 293) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 293, $this->source); })()), "perception", [], "any", false, false, false, 293), "mto", [], "any", false, false, false, 293))) {
            // line 294
            yield "                                ";
            $context["perc"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 294, $this->source); })()), "perception", [], "any", false, false, false, 294);
            // line 295
            yield "                                ";
            $context["soles"] = $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog("PEN", "02");
            // line 296
            yield "                                <tr>
                                    <td align=\"right\"><strong>Percepción:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 298
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["soles"]) || array_key_exists("soles", $context) ? $context["soles"] : (function () { throw new RuntimeError('Variable "soles" does not exist.', 298, $this->source); })()), "html", null, true);
            yield "  ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(CoreExtension::getAttribute($this->env, $this->source, (isset($context["perc"]) || array_key_exists("perc", $context) ? $context["perc"] : (function () { throw new RuntimeError('Variable "perc" does not exist.', 298, $this->source); })()), "mto", [], "any", false, false, false, 298)), "html", null, true);
            yield "</span></td>
                                </tr>
                                <tr>
                                    <td align=\"right\"><strong>Total a Pagar:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 302
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["soles"]) || array_key_exists("soles", $context) ? $context["soles"] : (function () { throw new RuntimeError('Variable "soles" does not exist.', 302, $this->source); })()), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(CoreExtension::getAttribute($this->env, $this->source, (isset($context["perc"]) || array_key_exists("perc", $context) ? $context["perc"] : (function () { throw new RuntimeError('Variable "perc" does not exist.', 302, $this->source); })()), "mtoTotal", [], "any", false, false, false, 302)), "html", null, true);
            yield "</span></td>
                                </tr>
                            ";
        }
        // line 305
        yield "                            </tbody>
                        </table>
                    </td></tr>
                </tbody></table>
            <br>
            <br>
            ";
        // line 311
        if ((array_key_exists("max_items", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 311, $this->source); })()), "details", [], "any", false, false, false, 311)) > (isset($context["max_items"]) || array_key_exists("max_items", $context) ? $context["max_items"] : (function () { throw new RuntimeError('Variable "max_items" does not exist.', 311, $this->source); })())))) {
            // line 312
            yield "                <div style=\"page-break-after:always;\"></div>
            ";
        }
        // line 314
        yield "            <div>
                <hr style=\"display: block; height: 1px; border: 0; border-top: 1px solid #666;  padding: 0;\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                    <tbody><tr>
                        <td width=\"100%\">
                            <blockquote>
                                ";
        // line 319
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "user", [], "any", false, true, false, 319), "footer", [], "any", true, true, false, 319)) {
            // line 320
            yield "                                    ";
            yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 320, $this->source); })()), "user", [], "any", false, false, false, 320), "footer", [], "any", false, false, false, 320);
            yield "
                                ";
        }
        // line 322
        yield "                                ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "system", [], "any", false, true, false, 322), "hash", [], "any", true, true, false, 322) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 322, $this->source); })()), "system", [], "any", false, false, false, 322), "hash", [], "any", false, false, false, 322))) {
            // line 323
            yield "                                    <strong>Resumen:</strong>   ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 323, $this->source); })()), "system", [], "any", false, false, false, 323), "hash", [], "any", false, false, false, 323), "html", null, true);
            yield "<br>
                                ";
        }
        // line 325
        yield "                                <span>Representación Impresa de la ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 325, $this->source); })()), "html", null, true);
        yield " ELECTRÓNICA.</span>
                            </blockquote>
                        </td>
                      
                    </tr>
                    <tr>
                      <td width=\"15%\" align=\"center\">
                            <img src=\"";
        // line 332
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Greenter\Report\Filter\ImageFilter')->toBase64($this->env->getRuntime('Greenter\Report\Render\QrRender')->getImage((isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 332, $this->source); })())), "svg+xml"), "html", null, true);
        yield "\" alt=\"Qr Image\">
                        </td>
                    </tr>
                    </tbody></table>
            </div>
        </td>
    </tr>
    </tbody></table>
</body></html>";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "factura.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  709 => 332,  698 => 325,  692 => 323,  689 => 322,  683 => 320,  681 => 319,  674 => 314,  670 => 312,  668 => 311,  660 => 305,  652 => 302,  643 => 298,  639 => 296,  636 => 295,  633 => 294,  631 => 293,  624 => 291,  620 => 289,  612 => 286,  608 => 284,  605 => 283,  597 => 280,  593 => 278,  590 => 277,  582 => 274,  578 => 272,  575 => 271,  567 => 268,  563 => 266,  561 => 265,  554 => 263,  546 => 262,  543 => 261,  535 => 258,  531 => 256,  528 => 255,  520 => 252,  516 => 250,  513 => 249,  505 => 246,  501 => 244,  498 => 243,  490 => 240,  486 => 238,  484 => 237,  475 => 230,  470 => 227,  459 => 224,  455 => 223,  452 => 222,  448 => 221,  429 => 204,  427 => 203,  423 => 201,  420 => 200,  410 => 196,  404 => 193,  400 => 191,  395 => 190,  392 => 189,  385 => 185,  378 => 180,  376 => 179,  371 => 176,  365 => 175,  359 => 173,  356 => 172,  352 => 171,  333 => 155,  319 => 143,  309 => 139,  305 => 138,  299 => 135,  295 => 134,  289 => 131,  283 => 128,  277 => 125,  273 => 124,  269 => 122,  265 => 121,  253 => 111,  251 => 110,  247 => 108,  241 => 104,  232 => 103,  228 => 102,  224 => 100,  222 => 99,  214 => 97,  210 => 96,  207 => 95,  201 => 92,  197 => 91,  194 => 90,  192 => 89,  185 => 87,  182 => 86,  176 => 84,  173 => 83,  167 => 82,  163 => 81,  154 => 77,  150 => 76,  146 => 74,  144 => 73,  133 => 65,  125 => 60,  117 => 55,  98 => 41,  90 => 36,  80 => 29,  68 => 20,  59 => 13,  57 => 12,  55 => 11,  53 => 10,  51 => 9,  46 => 6,  44 => 5,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "factura.html.twig", "C:\\Users\\Vigilio\\Desktop\\bun\\facturacion_electronica\\app\\Services\\custom\\factura.html.twig");
    }
}
