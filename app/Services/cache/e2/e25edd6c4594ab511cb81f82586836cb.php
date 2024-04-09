<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* factura.html.twig */
class __TwigTemplate_4b0cf974ef5fafb68a70a9f6423d3ca4 extends Template
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
        echo "<html>
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
    <style type=\"text/css\">
        ";
        // line 5
        $this->loadTemplate("assets/style.css", "factura.html.twig", 5)->display($context);
        // line 6
        echo "    </style>
</head>
<body class=\"white-bg \"  style=\"padding:10px; !important\">
";
        // line 9
        $context["cp"] = twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 9, $this->source); })()), "company", [], "any", false, false, false, 9);
        // line 10
        $context["isNota"] = twig_in_filter(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 10, $this->source); })()), "tipoDoc", [], "any", false, false, false, 10), ["07", "08"]);
        // line 11
        $context["isAnticipo"] = (twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "totalAnticipos", [], "any", true, true, false, 11) && (twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 11, $this->source); })()), "totalAnticipos", [], "any", false, false, false, 11) > 0));
        // line 12
        $context["name"] = $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 12, $this->source); })()), "tipoDoc", [], "any", false, false, false, 12), "01");
        // line 13
        echo "<table width=\"100%\">
    <tbody><tr>
        <td>
            <table width=\"100%\" height=\"200px\" border=\"0\" aling=\"center\" cellpadding=\"0\" cellspacing=\"0\">
                <tbody>
                <tr>
                    <td width=\"100%\" height=\"90\" align=\"center\">
                        <span><img src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\ImageFilter')->toBase64(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 20, $this->source); })()), "system", [], "any", false, false, false, 20), "logo", [], "any", false, false, false, 20)), "html", null, true);
        echo "\" height=\"80\" style=\"text-align:center\" border=\"0\"></span>
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
        echo twig_escape_filter($this->env, (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 29, $this->source); })()), "html", null, true);
        echo "</span>
                                        <br>
                                        <span style=\"font-family:Tahoma, Geneva, sans-serif; font-size:19px\" text-align=\"center\">E L E C T R Ó N I C A</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"center\">
                                        <span style=\"font-size:15px\" text-align=\"center\">R.U.C.: ";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["cp"]) || array_key_exists("cp", $context) ? $context["cp"] : (function () { throw new RuntimeError('Variable "cp" does not exist.', 36, $this->source); })()), "ruc", [], "any", false, false, false, 36), "html", null, true);
        echo "</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"center\">
                                        <span style=\"font-size:24px\">";
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 41, $this->source); })()), "serie", [], "any", false, false, false, 41), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 41, $this->source); })()), "correlativo", [], "any", false, false, false, 41), "html", null, true);
        echo "</span>
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
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["cp"]) || array_key_exists("cp", $context) ? $context["cp"] : (function () { throw new RuntimeError('Variable "cp" does not exist.', 55, $this->source); })()), "razonSocial", [], "any", false, false, false, 55), "html", null, true);
        echo "</span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"left\">
                                        <strong>Dirección: </strong>";
        // line 60
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["cp"]) || array_key_exists("cp", $context) ? $context["cp"] : (function () { throw new RuntimeError('Variable "cp" does not exist.', 60, $this->source); })()), "address", [], "any", false, false, false, 60), "direccion", [], "any", false, false, false, 60), "html", null, true);
        echo "
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"left\">
                                        ";
        // line 65
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 65, $this->source); })()), "user", [], "any", false, false, false, 65), "header", [], "any", false, false, false, 65);
        echo "
                                    </td>
                                </tr>
                                </tbody></table>
                        </div>
                    </td>
                </tr>
            <div class=\"tabla_borde\">
                ";
        // line 73
        $context["cl"] = twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 73, $this->source); })()), "client", [], "any", false, false, false, 73);
        // line 74
        echo "                <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                    <tbody><tr>
                        <td width=\"60%\" align=\"left\"><strong>Razón Social:</strong>  ";
        // line 76
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["cl"]) || array_key_exists("cl", $context) ? $context["cl"] : (function () { throw new RuntimeError('Variable "cl" does not exist.', 76, $this->source); })()), "rznSocial", [], "any", false, false, false, 76), "html", null, true);
        echo "</td>
                        <td width=\"40%\" align=\"left\"><strong>";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog(twig_get_attribute($this->env, $this->source, (isset($context["cl"]) || array_key_exists("cl", $context) ? $context["cl"] : (function () { throw new RuntimeError('Variable "cl" does not exist.', 77, $this->source); })()), "tipoDoc", [], "any", false, false, false, 77), "06"), "html", null, true);
        echo ":</strong>  ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["cl"]) || array_key_exists("cl", $context) ? $context["cl"] : (function () { throw new RuntimeError('Variable "cl" does not exist.', 77, $this->source); })()), "numDoc", [], "any", false, false, false, 77), "html", null, true);
        echo "</td>
                    </tr>
                    <tr>
                        <td width=\"60%\" align=\"left\">
                            <strong>Fecha Emisión: </strong>  ";
        // line 81
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 81, $this->source); })()), "fechaEmision", [], "any", false, false, false, 81), "d/m/Y"), "html", null, true);
        echo "
                            ";
        // line 82
        if ((twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 82, $this->source); })()), "fechaEmision", [], "any", false, false, false, 82), "H:i:s") != "00:00:00")) {
            echo " ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 82, $this->source); })()), "fechaEmision", [], "any", false, false, false, 82), "H:i:s"), "html", null, true);
            echo " ";
        }
        // line 83
        echo "                            ";
        if ((twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "fecVencimiento", [], "any", true, true, false, 83) && twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 83, $this->source); })()), "fecVencimiento", [], "any", false, false, false, 83))) {
            // line 84
            echo "                            <br><br><strong>Fecha Vencimiento: </strong>  ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 84, $this->source); })()), "fecVencimiento", [], "any", false, false, false, 84), "d/m/Y"), "html", null, true);
            echo "
                            ";
        }
        // line 86
        echo "                        </td>
                        <td width=\"40%\" align=\"left\"><strong>Dirección: </strong>  ";
        // line 87
        if (twig_get_attribute($this->env, $this->source, (isset($context["cl"]) || array_key_exists("cl", $context) ? $context["cl"] : (function () { throw new RuntimeError('Variable "cl" does not exist.', 87, $this->source); })()), "address", [], "any", false, false, false, 87)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["cl"]) || array_key_exists("cl", $context) ? $context["cl"] : (function () { throw new RuntimeError('Variable "cl" does not exist.', 87, $this->source); })()), "address", [], "any", false, false, false, 87), "direccion", [], "any", false, false, false, 87), "html", null, true);
        }
        echo "</td>
                    </tr>
                    ";
        // line 89
        if ((isset($context["isNota"]) || array_key_exists("isNota", $context) ? $context["isNota"] : (function () { throw new RuntimeError('Variable "isNota" does not exist.', 89, $this->source); })())) {
            // line 90
            echo "                    <tr>
                        <td width=\"60%\" align=\"left\"><strong>Tipo Doc. Ref.: </strong>  ";
            // line 91
            echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 91, $this->source); })()), "tipDocAfectado", [], "any", false, false, false, 91), "01"), "html", null, true);
            echo "</td>
                        <td width=\"40%\" align=\"left\"><strong>Documento Ref.: </strong>  ";
            // line 92
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 92, $this->source); })()), "numDocfectado", [], "any", false, false, false, 92), "html", null, true);
            echo "</td>
                    </tr>
                    ";
        }
        // line 95
        echo "                    <tr>
                        <td width=\"60%\" align=\"left\"><strong>Tipo Moneda: </strong>  ";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 96, $this->source); })()), "tipoMoneda", [], "any", false, false, false, 96), "021"), "html", null, true);
        echo " </td>
                        <td width=\"40%\" align=\"left\">";
        // line 97
        if ((twig_get_attribute($this->env, $this->source, ($context["doc"] ?? null), "compra", [], "any", true, true, false, 97) && twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 97, $this->source); })()), "compra", [], "any", false, false, false, 97))) {
            echo "<strong>O/C: </strong>  ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 97, $this->source); })()), "compra", [], "any", false, false, false, 97), "html", null, true);
        }
        echo "</td>
                    </tr>
                    ";
        // line 99
        if (twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 99, $this->source); })()), "guias", [], "any", false, false, false, 99)) {
            // line 100
            echo "                    <tr>
                        <td width=\"60%\" align=\"left\"><strong>Guias: </strong>
                        ";
            // line 102
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 102, $this->source); })()), "guias", [], "any", false, false, false, 102));
            foreach ($context['_seq'] as $context["_key"] => $context["guia"]) {
                // line 103
                echo "                            ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guia"], "nroDoc", [], "any", false, false, false, 103), "html", null, true);
                echo "&nbsp;&nbsp;
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['guia'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 104
            echo "</td>
                        <td width=\"40%\"></td>
                    </tr>
                    ";
        }
        // line 108
        echo "                    </tbody></table>
            </div><br>
            ";
        // line 110
        $context["moneda"] = $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 110, $this->source); })()), "tipoMoneda", [], "any", false, false, false, 110), "02");
        // line 111
        echo "            <div class=\"tabla_borde\">
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
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 121, $this->source); })()), "details", [], "any", false, false, false, 121));
        foreach ($context['_seq'] as $context["_key"] => $context["det"]) {
            // line 122
            echo "                        <tr class=\"border_top\">
                            <td align=\"center\">
                                ";
            // line 124
            echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(twig_get_attribute($this->env, $this->source, $context["det"], "cantidad", [], "any", false, false, false, 124)), "html", null, true);
            echo "
                                ";
            // line 125
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["det"], "unidad", [], "any", false, false, false, 125), "html", null, true);
            echo "
                            </td>
                            <td align=\"center\">
                                ";
            // line 128
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["det"], "codProducto", [], "any", false, false, false, 128), "html", null, true);
            echo "
                            </td>
                            <td align=\"center\" width=\"300px\">
                                <span>";
            // line 131
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["det"], "descripcion", [], "any", false, false, false, 131), "html", null, true);
            echo "</span><br>
                            </td>
                            <td align=\"center\">
                                ";
            // line 134
            echo twig_escape_filter($this->env, (isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 134, $this->source); })()), "html", null, true);
            echo "
                                ";
            // line 135
            echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(twig_get_attribute($this->env, $this->source, $context["det"], "mtoValorUnitario", [], "any", false, false, false, 135)), "html", null, true);
            echo "
                            </td>
                            <td align=\"center\">
                                ";
            // line 138
            echo twig_escape_filter($this->env, (isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 138, $this->source); })()), "html", null, true);
            echo "
                                ";
            // line 139
            echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(twig_get_attribute($this->env, $this->source, $context["det"], "mtoValorVenta", [], "any", false, false, false, 139)), "html", null, true);
            echo "
                            </td>
                        </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['det'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 143
        echo "                    </tbody>
                </table></div>
            <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                <tbody><tr>
                    <td width=\"50%\" valign=\"top\">
                        <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                            <tbody>
                            <tr>
                                <td colspan=\"4\">
                                    <br>
                                    <br>
                                    <span style=\"font-family:Tahoma, Geneva, sans-serif; font-size:12px\" text-align=\"center\"><strong>";
        // line 154
        echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\ResolveFilter')->getValueLegend(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 154, $this->source); })()), "legends", [], "any", false, false, false, 154), "1000"), "html", null, true);
        echo "</strong></span>
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
        // line 170
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 170, $this->source); })()), "legends", [], "any", false, false, false, 170));
        foreach ($context['_seq'] as $context["_key"] => $context["leg"]) {
            // line 171
            echo "                                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["leg"], "code", [], "any", false, false, false, 171) != "1000")) {
                // line 172
                echo "                                            ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["leg"], "value", [], "any", false, false, false, 172), "html", null, true);
                echo "<br>
                                        ";
            }
            // line 174
            echo "                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['leg'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 175
        echo "                                    </p>
                                </td>
                            </tr>
                            ";
        // line 178
        if ((isset($context["isNota"]) || array_key_exists("isNota", $context) ? $context["isNota"] : (function () { throw new RuntimeError('Variable "isNota" does not exist.', 178, $this->source); })())) {
            // line 179
            echo "                            <tr class=\"border_top\">
                                <td width=\"30%\" style=\"font-size: 10px;\">
                                    MOTIVO DE EMISIÓN:
                                </td>
                                <td width=\"70%\" style=\"font-size: 10px;\">
                                    ";
            // line 184
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 184, $this->source); })()), "desMotivo", [], "any", false, false, false, 184), "html", null, true);
            echo "
                                </td>
                            </tr>
                            ";
        }
        // line 188
        echo "                            ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "user", [], "any", false, true, false, 188), "extras", [], "any", true, true, false, 188)) {
            // line 189
            echo "                                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 189, $this->source); })()), "user", [], "any", false, false, false, 189), "extras", [], "any", false, false, false, 189));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 190
                echo "                                    <tr class=\"border_top\">
                                        <td width=\"30%\" style=\"font-size: 10px;\">
                                            ";
                // line 192
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 192)), "html", null, true);
                echo ":
                                        </td>
                                        <td width=\"70%\" style=\"font-size: 10px;\">
                                            ";
                // line 195
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "value", [], "any", false, false, false, 195), "html", null, true);
                echo "
                                        </td>
                                    </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 199
            echo "                            ";
        }
        // line 200
        echo "                            </tbody>
                        </table>
                        ";
        // line 202
        if ((isset($context["isAnticipo"]) || array_key_exists("isAnticipo", $context) ? $context["isAnticipo"] : (function () { throw new RuntimeError('Variable "isAnticipo" does not exist.', 202, $this->source); })())) {
            // line 203
            echo "                        <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
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
            // line 220
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 220, $this->source); })()), "anticipos", [], "any", false, false, false, 220));
            foreach ($context['_seq'] as $context["_key"] => $context["atp"]) {
                // line 221
                echo "                            <tr class=\"border_top\">
                                <td width=\"30%\">";
                // line 222
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["atp"], "nroDocRel", [], "any", false, false, false, 222), "html", null, true);
                echo "</td>
                                <td width=\"70%\">";
                // line 223
                echo twig_escape_filter($this->env, (isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 223, $this->source); })()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(twig_get_attribute($this->env, $this->source, $context["atp"], "total", [], "any", false, false, false, 223)), "html", null, true);
                echo "</td>
                            </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['atp'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 226
            echo "                            </tbody>
                        </table>
                        ";
        }
        // line 229
        echo "                    </td>
                    <td width=\"50%\" valign=\"top\">
                        <br>
                        <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"table table-valores-totales\">
                            <tbody>
                            ";
        // line 234
        if ((isset($context["isAnticipo"]) || array_key_exists("isAnticipo", $context) ? $context["isAnticipo"] : (function () { throw new RuntimeError('Variable "isAnticipo" does not exist.', 234, $this->source); })())) {
            // line 235
            echo "                                <tr class=\"border_bottom\">
                                    <td align=\"right\"><strong>Total Anticipo:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 237
            echo twig_escape_filter($this->env, (isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 237, $this->source); })()), "html", null, true);
            echo "  ";
            echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 237, $this->source); })()), "totalAnticipos", [], "any", false, false, false, 237)), "html", null, true);
            echo "</span></td>
                                </tr>
                            ";
        }
        // line 240
        echo "                            ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 240, $this->source); })()), "mtoOperGravadas", [], "any", false, false, false, 240)) {
            // line 241
            echo "                            <tr class=\"border_bottom\">
                                <td align=\"right\"><strong>Op. Gravadas:</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
            // line 243
            echo twig_escape_filter($this->env, (isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 243, $this->source); })()), "html", null, true);
            echo "  ";
            echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 243, $this->source); })()), "mtoOperGravadas", [], "any", false, false, false, 243)), "html", null, true);
            echo "</span></td>
                            </tr>
                            ";
        }
        // line 246
        echo "                            ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 246, $this->source); })()), "mtoOperInafectas", [], "any", false, false, false, 246)) {
            // line 247
            echo "                            <tr class=\"border_bottom\">
                                <td align=\"right\"><strong>Op. Inafectas:</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
            // line 249
            echo twig_escape_filter($this->env, (isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 249, $this->source); })()), "html", null, true);
            echo "  ";
            echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 249, $this->source); })()), "mtoOperInafectas", [], "any", false, false, false, 249)), "html", null, true);
            echo "</span></td>
                            </tr>
                            ";
        }
        // line 252
        echo "                            ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 252, $this->source); })()), "mtoOperExoneradas", [], "any", false, false, false, 252)) {
            // line 253
            echo "                            <tr class=\"border_bottom\">
                                <td align=\"right\"><strong>Op. Exoneradas:</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
            // line 255
            echo twig_escape_filter($this->env, (isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 255, $this->source); })()), "html", null, true);
            echo "  ";
            echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 255, $this->source); })()), "mtoOperExoneradas", [], "any", false, false, false, 255)), "html", null, true);
            echo "</span></td>
                            </tr>
                            ";
        }
        // line 258
        echo "                            <tr>
                                <td align=\"right\"><strong>I.G.V.";
        // line 259
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "user", [], "any", false, true, false, 259), "numIGV", [], "any", true, true, false, 259)) {
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 259, $this->source); })()), "user", [], "any", false, false, false, 259), "numIGV", [], "any", false, false, false, 259), "html", null, true);
            echo "%";
        }
        echo ":</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
        // line 260
        echo twig_escape_filter($this->env, (isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 260, $this->source); })()), "html", null, true);
        echo "  ";
        echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 260, $this->source); })()), "mtoIGV", [], "any", false, false, false, 260)), "html", null, true);
        echo "</span></td>
                            </tr>
                            ";
        // line 262
        if (twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 262, $this->source); })()), "mtoISC", [], "any", false, false, false, 262)) {
            // line 263
            echo "                            <tr>
                                <td align=\"right\"><strong>I.S.C.:</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
            // line 265
            echo twig_escape_filter($this->env, (isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 265, $this->source); })()), "html", null, true);
            echo "  ";
            echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 265, $this->source); })()), "mtoISC", [], "any", false, false, false, 265)), "html", null, true);
            echo "</span></td>
                            </tr>
                            ";
        }
        // line 268
        echo "                            ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 268, $this->source); })()), "sumOtrosCargos", [], "any", false, false, false, 268)) {
            // line 269
            echo "                                <tr>
                                    <td align=\"right\"><strong>Otros Cargos:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 271
            echo twig_escape_filter($this->env, (isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 271, $this->source); })()), "html", null, true);
            echo "  ";
            echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 271, $this->source); })()), "sumOtrosCargos", [], "any", false, false, false, 271)), "html", null, true);
            echo "</span></td>
                                </tr>
                            ";
        }
        // line 274
        echo "                            ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 274, $this->source); })()), "icbper", [], "any", false, false, false, 274)) {
            // line 275
            echo "                                <tr>
                                    <td align=\"right\"><strong>I.C.B.P.E.R.:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 277
            echo twig_escape_filter($this->env, (isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 277, $this->source); })()), "html", null, true);
            echo "  ";
            echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 277, $this->source); })()), "icbper", [], "any", false, false, false, 277)), "html", null, true);
            echo "</span></td>
                                </tr>
                            ";
        }
        // line 280
        echo "                            ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 280, $this->source); })()), "mtoOtrosTributos", [], "any", false, false, false, 280)) {
            // line 281
            echo "                                <tr>
                                    <td align=\"right\"><strong>Otros Tributos:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 283
            echo twig_escape_filter($this->env, (isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 283, $this->source); })()), "html", null, true);
            echo "  ";
            echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 283, $this->source); })()), "mtoOtrosTributos", [], "any", false, false, false, 283)), "html", null, true);
            echo "</span></td>
                                </tr>
                            ";
        }
        // line 286
        echo "                            <tr>
                                <td align=\"right\"><strong>Precio Venta:</strong></td>
                                <td width=\"120\" align=\"right\"><span id=\"ride-importeTotal\" class=\"ride-importeTotal\">";
        // line 288
        echo twig_escape_filter($this->env, (isset($context["moneda"]) || array_key_exists("moneda", $context) ? $context["moneda"] : (function () { throw new RuntimeError('Variable "moneda" does not exist.', 288, $this->source); })()), "html", null, true);
        echo "  ";
        echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 288, $this->source); })()), "mtoImpVenta", [], "any", false, false, false, 288)), "html", null, true);
        echo "</span></td>
                            </tr>
                            ";
        // line 290
        if ((twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 290, $this->source); })()), "perception", [], "any", false, false, false, 290) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 290, $this->source); })()), "perception", [], "any", false, false, false, 290), "mto", [], "any", false, false, false, 290))) {
            // line 291
            echo "                                ";
            $context["perc"] = twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 291, $this->source); })()), "perception", [], "any", false, false, false, 291);
            // line 292
            echo "                                ";
            $context["soles"] = $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog("PEN", "02");
            // line 293
            echo "                                <tr>
                                    <td align=\"right\"><strong>Percepción:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 295
            echo twig_escape_filter($this->env, (isset($context["soles"]) || array_key_exists("soles", $context) ? $context["soles"] : (function () { throw new RuntimeError('Variable "soles" does not exist.', 295, $this->source); })()), "html", null, true);
            echo "  ";
            echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(twig_get_attribute($this->env, $this->source, (isset($context["perc"]) || array_key_exists("perc", $context) ? $context["perc"] : (function () { throw new RuntimeError('Variable "perc" does not exist.', 295, $this->source); })()), "mto", [], "any", false, false, false, 295)), "html", null, true);
            echo "</span></td>
                                </tr>
                                <tr>
                                    <td align=\"right\"><strong>Total a Pagar:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 299
            echo twig_escape_filter($this->env, (isset($context["soles"]) || array_key_exists("soles", $context) ? $context["soles"] : (function () { throw new RuntimeError('Variable "soles" does not exist.', 299, $this->source); })()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number(twig_get_attribute($this->env, $this->source, (isset($context["perc"]) || array_key_exists("perc", $context) ? $context["perc"] : (function () { throw new RuntimeError('Variable "perc" does not exist.', 299, $this->source); })()), "mtoTotal", [], "any", false, false, false, 299)), "html", null, true);
            echo "</span></td>
                                </tr>
                            ";
        }
        // line 302
        echo "                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody></table>
            <br>
            <br>
            ";
        // line 309
        if ((array_key_exists("max_items", $context) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 309, $this->source); })()), "details", [], "any", false, false, false, 309)) > (isset($context["max_items"]) || array_key_exists("max_items", $context) ? $context["max_items"] : (function () { throw new RuntimeError('Variable "max_items" does not exist.', 309, $this->source); })())))) {
            // line 310
            echo "                <div style=\"page-break-after:always;\"></div>
            ";
        }
        // line 312
        echo "            <div>
                <hr style=\"display: block; height: 1px; border: 0; border-top: 1px solid #666; margin: 20px 0; padding: 0;\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                    <tbody><tr>
                        <td width=\"85%\">
                            <blockquote>
                                ";
        // line 317
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "user", [], "any", false, true, false, 317), "footer", [], "any", true, true, false, 317)) {
            // line 318
            echo "                                    ";
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 318, $this->source); })()), "user", [], "any", false, false, false, 318), "footer", [], "any", false, false, false, 318);
            echo "
                                ";
        }
        // line 320
        echo "                                ";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "system", [], "any", false, true, false, 320), "hash", [], "any", true, true, false, 320) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 320, $this->source); })()), "system", [], "any", false, false, false, 320), "hash", [], "any", false, false, false, 320))) {
            // line 321
            echo "                                    <strong>Resumen:</strong>   ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 321, $this->source); })()), "system", [], "any", false, false, false, 321), "hash", [], "any", false, false, false, 321), "html", null, true);
            echo "<br>
                                ";
        }
        // line 323
        echo "                                <span>Representación Impresa de la ";
        echo twig_escape_filter($this->env, (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 323, $this->source); })()), "html", null, true);
        echo " ELECTRÓNICA.</span>
                            </blockquote>
                        </td>
                        <td width=\"15%\" align=\"right\">
                            <img src=\"";
        // line 327
        echo twig_escape_filter($this->env, $this->env->getRuntime('Greenter\Report\Filter\ImageFilter')->toBase64($this->env->getRuntime('Greenter\Report\Render\QrRender')->getImage((isset($context["doc"]) || array_key_exists("doc", $context) ? $context["doc"] : (function () { throw new RuntimeError('Variable "doc" does not exist.', 327, $this->source); })())), "svg+xml"), "html", null, true);
        echo "\" alt=\"Qr Image\">
                        </td>
                    </tr>
                    </tbody></table>
            </div>
        </td>
    </tr>
    </tbody></table>
</body></html>";
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
        return array (  703 => 327,  695 => 323,  689 => 321,  686 => 320,  680 => 318,  678 => 317,  671 => 312,  667 => 310,  665 => 309,  656 => 302,  648 => 299,  639 => 295,  635 => 293,  632 => 292,  629 => 291,  627 => 290,  620 => 288,  616 => 286,  608 => 283,  604 => 281,  601 => 280,  593 => 277,  589 => 275,  586 => 274,  578 => 271,  574 => 269,  571 => 268,  563 => 265,  559 => 263,  557 => 262,  550 => 260,  542 => 259,  539 => 258,  531 => 255,  527 => 253,  524 => 252,  516 => 249,  512 => 247,  509 => 246,  501 => 243,  497 => 241,  494 => 240,  486 => 237,  482 => 235,  480 => 234,  473 => 229,  468 => 226,  457 => 223,  453 => 222,  450 => 221,  446 => 220,  427 => 203,  425 => 202,  421 => 200,  418 => 199,  408 => 195,  402 => 192,  398 => 190,  393 => 189,  390 => 188,  383 => 184,  376 => 179,  374 => 178,  369 => 175,  363 => 174,  357 => 172,  354 => 171,  350 => 170,  331 => 154,  318 => 143,  308 => 139,  304 => 138,  298 => 135,  294 => 134,  288 => 131,  282 => 128,  276 => 125,  272 => 124,  268 => 122,  264 => 121,  252 => 111,  250 => 110,  246 => 108,  240 => 104,  231 => 103,  227 => 102,  223 => 100,  221 => 99,  213 => 97,  209 => 96,  206 => 95,  200 => 92,  196 => 91,  193 => 90,  191 => 89,  184 => 87,  181 => 86,  175 => 84,  172 => 83,  166 => 82,  162 => 81,  153 => 77,  149 => 76,  145 => 74,  143 => 73,  132 => 65,  124 => 60,  116 => 55,  97 => 41,  89 => 36,  79 => 29,  67 => 20,  58 => 13,  56 => 12,  54 => 11,  52 => 10,  50 => 9,  45 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "factura.html.twig", "/var/www/app/Services/custom/factura.html.twig");
    }
}
