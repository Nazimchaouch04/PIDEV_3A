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
use Twig\TemplateWrapper;

/* aliment/pdf.html.twig */
class __TwigTemplate_6fa911fa4884f480e4173ab7600c17af extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "aliment/pdf.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "aliment/pdf.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <title>Aliments Report - BioSync</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f5f5f5;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #10b981;
            padding-bottom: 20px;
        }
        
        .header h1 {
            color: #047857;
            margin: 0;
            font-size: 28px;
        }
        
        .header p {
            color: #6b7280;
            margin: 5px 0 0 0;
            font-size: 14px;
        }
        
        .stats-summary {
            display: flex;
            justify-content: space-around;
            margin-bottom: 30px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #10b981;
        }
        
        .stat-label {
            font-size: 12px;
            color: #6b7280;
            margin-top: 5px;
        }
        
        .aliment-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .aliment-table th {
            background: #10b981;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: bold;
            font-size: 12px;
        }
        
        .aliment-table td {
            padding: 10px 12px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 11px;
        }
        
        .aliment-table tr:nth-child(even) {
            background: #f9fafb;
        }
        
        .aliment-table tr:hover {
            background: #f3f4f6;
        }
        
        .aliment-name {
            font-weight: bold;
            color: #1f2937;
        }
        
        .aliment-type {
            background: #d1fae5;
            color: #065f46;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 10px;
            display: inline-block;
        }
        
        .excitant-yes {
            background: #fef2f2;
            color: #dc2626;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 10px;
            display: inline-block;
        }
        
        .excitant-no {
            background: #f0fdf4;
            color: #16a34a;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 10px;
            display: inline-block;
        }
        
        .nutri-score {
            font-weight: bold;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 10px;
            display: inline-block;
        }
        
        .nutri-a { background: #22c55e; color: white; }
        .nutri-b { background: #84cc16; color: white; }
        .nutri-c { background: #eab308; color: white; }
        .nutri-d { background: #f97316; color: white; }
        .nutri-e { background: #ef4444; color: white; }
        
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #6b7280;
            font-size: 12px;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }
        
        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <div class=\"header\">
        <h1>🥗 BioSync - Aliments Report</h1>
        <p>Generated on ";
        // line 154
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate((isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 154, $this->source); })()), "d/m/Y H:i:s"), "html", null, true);
        yield "</p>
    </div>

    <div class=\"stats-summary\">
        <div class=\"stat-item\">
            <div class=\"stat-value\">";
        // line 159
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["aliments"]) || array_key_exists("aliments", $context) ? $context["aliments"] : (function () { throw new RuntimeError('Variable "aliments" does not exist.', 159, $this->source); })())), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Total Aliments</div>
        </div>
        <div class=\"stat-item\">
            <div class=\"stat-value\">";
        // line 163
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::reduce($this->env, (isset($context["aliments"]) || array_key_exists("aliments", $context) ? $context["aliments"] : (function () { throw new RuntimeError('Variable "aliments" does not exist.', 163, $this->source); })()), function ($__sum__, $__a__) use ($context, $macros) { $context["sum"] = $__sum__; $context["a"] = $__a__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 163, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["a"]) || array_key_exists("a", $context) ? $context["a"] : (function () { throw new RuntimeError('Variable "a" does not exist.', 163, $this->source); })()), "calories", [], "any", false, false, false, 163)); }, 0), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Total Calories</div>
        </div>
        <div class=\"stat-item\">
            <div class=\"stat-value\">";
        // line 167
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::reduce($this->env, (isset($context["aliments"]) || array_key_exists("aliments", $context) ? $context["aliments"] : (function () { throw new RuntimeError('Variable "aliments" does not exist.', 167, $this->source); })()), function ($__sum__, $__a__) use ($context, $macros) { $context["sum"] = $__sum__; $context["a"] = $__a__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 167, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["a"]) || array_key_exists("a", $context) ? $context["a"] : (function () { throw new RuntimeError('Variable "a" does not exist.', 167, $this->source); })()), "proteines", [], "any", false, false, false, 167)); }, 0), "html", null, true);
        yield "g</div>
            <div class=\"stat-label\">Total Proteins</div>
        </div>
        <div class=\"stat-item\">
            <div class=\"stat-value\">";
        // line 171
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::reduce($this->env, (isset($context["aliments"]) || array_key_exists("aliments", $context) ? $context["aliments"] : (function () { throw new RuntimeError('Variable "aliments" does not exist.', 171, $this->source); })()), function ($__sum__, $__a__) use ($context, $macros) { $context["sum"] = $__sum__; $context["a"] = $__a__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 171, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["a"]) || array_key_exists("a", $context) ? $context["a"] : (function () { throw new RuntimeError('Variable "a" does not exist.', 171, $this->source); })()), "glucides", [], "any", false, false, false, 171)); }, 0), "html", null, true);
        yield "g</div>
            <div class=\"stat-label\">Total Carbs</div>
        </div>
        <div class=\"stat-item\">
            <div class=\"stat-value\">";
        // line 175
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::reduce($this->env, (isset($context["aliments"]) || array_key_exists("aliments", $context) ? $context["aliments"] : (function () { throw new RuntimeError('Variable "aliments" does not exist.', 175, $this->source); })()), function ($__sum__, $__a__) use ($context, $macros) { $context["sum"] = $__sum__; $context["a"] = $__a__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 175, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["a"]) || array_key_exists("a", $context) ? $context["a"] : (function () { throw new RuntimeError('Variable "a" does not exist.', 175, $this->source); })()), "lipides", [], "any", false, false, false, 175)); }, 0), "html", null, true);
        yield "g</div>
            <div class=\"stat-label\">Total Fats</div>
        </div>
    </div>

    <table class=\"aliment-table\">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Calories</th>
                <th>Proteins</th>
                <th>Carbs</th>
                <th>Fats</th>
                <th>GI</th>
                <th>Excitant</th>
                <th>NutriScore</th>
                <th>MultiScore</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 196
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["aliments"]) || array_key_exists("aliments", $context) ? $context["aliments"] : (function () { throw new RuntimeError('Variable "aliments" does not exist.', 196, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["aliment"]) {
            // line 197
            yield "                <tr>
                    <td class=\"aliment-name\">";
            // line 198
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "nomAliment", [], "any", false, false, false, 198), "html", null, true);
            yield "</td>
                    <td>
                        <span class=\"aliment-type\">";
            // line 200
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "typeAliment", [], "any", true, true, false, 200)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "typeAliment", [], "any", false, false, false, 200), "N/A")) : ("N/A")), "html", null, true);
            yield "</span>
                    </td>
                    <td>";
            // line 202
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "calories", [], "any", true, true, false, 202)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "calories", [], "any", false, false, false, 202), 0)) : (0)), "html", null, true);
            yield "</td>
                    <td>";
            // line 203
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "proteines", [], "any", true, true, false, 203)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "proteines", [], "any", false, false, false, 203), 0)) : (0)), "html", null, true);
            yield "g</td>
                    <td>";
            // line 204
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "glucides", [], "any", true, true, false, 204)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "glucides", [], "any", false, false, false, 204), 0)) : (0)), "html", null, true);
            yield "g</td>
                    <td>";
            // line 205
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "lipides", [], "any", true, true, false, 205)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "lipides", [], "any", false, false, false, 205), 0)) : (0)), "html", null, true);
            yield "g</td>
                    <td>";
            // line 206
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "indexGlycemique", [], "any", true, true, false, 206)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "indexGlycemique", [], "any", false, false, false, 206), 0)) : (0)), "html", null, true);
            yield "</td>
                    <td>
                        ";
            // line 208
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "estExcitant", [], "any", false, false, false, 208)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 209
                yield "                            <span class=\"excitant-yes\">Yes</span>
                        ";
            } else {
                // line 211
                yield "                            <span class=\"excitant-no\">No</span>
                        ";
            }
            // line 213
            yield "                    </td>
                    <td>
                        ";
            // line 215
            $context["nutriClass"] = ("nutri-" . Twig\Extension\CoreExtension::lower($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "nutriScore", [], "any", true, true, false, 215)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "nutriScore", [], "any", false, false, false, 215), "c")) : ("c"))));
            // line 216
            yield "                        <span class=\"nutri-score ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nutriClass"]) || array_key_exists("nutriClass", $context) ? $context["nutriClass"] : (function () { throw new RuntimeError('Variable "nutriClass" does not exist.', 216, $this->source); })()), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "nutriScore", [], "any", true, true, false, 216)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "nutriScore", [], "any", false, false, false, 216), "N/A")) : ("N/A")), "html", null, true);
            yield "</span>
                    </td>
                    <td>";
            // line 218
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "multiScore", [], "any", true, true, false, 218)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "multiScore", [], "any", false, false, false, 218), 0)) : (0)), "html", null, true);
            yield "</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['aliment'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 221
        yield "        </tbody>
    </table>

    ";
        // line 224
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["aliments"]) || array_key_exists("aliments", $context) ? $context["aliments"] : (function () { throw new RuntimeError('Variable "aliments" does not exist.', 224, $this->source); })())) > 20)) {
            // line 225
            yield "        <div class=\"page-break\"></div>
        
        <div class=\"header\">
            <h1>📊 Detailed Analysis</h1>
            <p>Nutritional breakdown and insights</p>
        </div>

        <table class=\"aliment-table\">
            <thead>
                <tr>
                    <th>Food Details</th>
                    <th>Calorie Density</th>
                    <th>Protein Ratio</th>
                    <th>GI Classification</th>
                    <th>Health Score</th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 243
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["aliments"]) || array_key_exists("aliments", $context) ? $context["aliments"] : (function () { throw new RuntimeError('Variable "aliments" does not exist.', 243, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["aliment"]) {
                // line 244
                yield "                    <tr>
                        <td class=\"aliment-name\">";
                // line 245
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "nomAliment", [], "any", false, false, false, 245), "html", null, true);
                yield "</td>
                        <td>
                            ";
                // line 247
                $context["totalMacro"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "proteines", [], "any", false, false, false, 247) + CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "glucides", [], "any", false, false, false, 247)) + CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "lipides", [], "any", false, false, false, 247));
                // line 248
                yield "                            ";
                if (((isset($context["totalMacro"]) || array_key_exists("totalMacro", $context) ? $context["totalMacro"] : (function () { throw new RuntimeError('Variable "totalMacro" does not exist.', 248, $this->source); })()) > 0)) {
                    // line 249
                    yield "                                ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "calories", [], "any", false, false, false, 249) / (isset($context["totalMacro"]) || array_key_exists("totalMacro", $context) ? $context["totalMacro"] : (function () { throw new RuntimeError('Variable "totalMacro" does not exist.', 249, $this->source); })())), 1), "html", null, true);
                    yield " cal/g
                            ";
                } else {
                    // line 251
                    yield "                                N/A
                            ";
                }
                // line 253
                yield "                        </td>
                        <td>
                            ";
                // line 255
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "calories", [], "any", false, false, false, 255) > 0)) {
                    // line 256
                    yield "                                ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round((((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "proteines", [], "any", false, false, false, 256) * 4) / CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "calories", [], "any", false, false, false, 256)) * 100), 1), "html", null, true);
                    yield "%
                            ";
                } else {
                    // line 258
                    yield "                                0%
                            ";
                }
                // line 260
                yield "                        </td>
                        <td>
                            ";
                // line 262
                $context["gi"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "indexGlycemique", [], "any", true, true, false, 262)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "indexGlycemique", [], "any", false, false, false, 262), 0)) : (0));
                // line 263
                yield "                            ";
                if (((isset($context["gi"]) || array_key_exists("gi", $context) ? $context["gi"] : (function () { throw new RuntimeError('Variable "gi" does not exist.', 263, $this->source); })()) <= 55)) {
                    // line 264
                    yield "                                <span style=\"color: #16a34a;\">Low (";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["gi"]) || array_key_exists("gi", $context) ? $context["gi"] : (function () { throw new RuntimeError('Variable "gi" does not exist.', 264, $this->source); })()), "html", null, true);
                    yield ")</span>
                            ";
                } elseif ((                // line 265
(isset($context["gi"]) || array_key_exists("gi", $context) ? $context["gi"] : (function () { throw new RuntimeError('Variable "gi" does not exist.', 265, $this->source); })()) <= 69)) {
                    // line 266
                    yield "                                <span style=\"color: #eab308;\">Medium (";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["gi"]) || array_key_exists("gi", $context) ? $context["gi"] : (function () { throw new RuntimeError('Variable "gi" does not exist.', 266, $this->source); })()), "html", null, true);
                    yield ")</span>
                            ";
                } elseif ((                // line 267
(isset($context["gi"]) || array_key_exists("gi", $context) ? $context["gi"] : (function () { throw new RuntimeError('Variable "gi" does not exist.', 267, $this->source); })()) > 0)) {
                    // line 268
                    yield "                                <span style=\"color: #dc2626;\">High (";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["gi"]) || array_key_exists("gi", $context) ? $context["gi"] : (function () { throw new RuntimeError('Variable "gi" does not exist.', 268, $this->source); })()), "html", null, true);
                    yield ")</span>
                            ";
                } else {
                    // line 270
                    yield "                                <span style=\"color: #6b7280;\">N/A</span>
                            ";
                }
                // line 272
                yield "                        </td>
                        <td>
                            ";
                // line 274
                $context["healthScore"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "multiScore", [], "any", true, true, false, 274)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "multiScore", [], "any", false, false, false, 274), 0)) : (0));
                // line 275
                yield "                            ";
                if (((isset($context["healthScore"]) || array_key_exists("healthScore", $context) ? $context["healthScore"] : (function () { throw new RuntimeError('Variable "healthScore" does not exist.', 275, $this->source); })()) >= 80)) {
                    // line 276
                    yield "                                <span style=\"color: #16a34a;\">Excellent (";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["healthScore"]) || array_key_exists("healthScore", $context) ? $context["healthScore"] : (function () { throw new RuntimeError('Variable "healthScore" does not exist.', 276, $this->source); })()), "html", null, true);
                    yield ")</span>
                            ";
                } elseif ((                // line 277
(isset($context["healthScore"]) || array_key_exists("healthScore", $context) ? $context["healthScore"] : (function () { throw new RuntimeError('Variable "healthScore" does not exist.', 277, $this->source); })()) >= 60)) {
                    // line 278
                    yield "                                <span style=\"color: #84cc16;\">Good (";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["healthScore"]) || array_key_exists("healthScore", $context) ? $context["healthScore"] : (function () { throw new RuntimeError('Variable "healthScore" does not exist.', 278, $this->source); })()), "html", null, true);
                    yield ")</span>
                            ";
                } elseif ((                // line 279
(isset($context["healthScore"]) || array_key_exists("healthScore", $context) ? $context["healthScore"] : (function () { throw new RuntimeError('Variable "healthScore" does not exist.', 279, $this->source); })()) >= 40)) {
                    // line 280
                    yield "                                <span style=\"color: #eab308;\">Fair (";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["healthScore"]) || array_key_exists("healthScore", $context) ? $context["healthScore"] : (function () { throw new RuntimeError('Variable "healthScore" does not exist.', 280, $this->source); })()), "html", null, true);
                    yield ")</span>
                            ";
                } elseif ((                // line 281
(isset($context["healthScore"]) || array_key_exists("healthScore", $context) ? $context["healthScore"] : (function () { throw new RuntimeError('Variable "healthScore" does not exist.', 281, $this->source); })()) > 0)) {
                    // line 282
                    yield "                                <span style=\"color: #dc2626;\">Poor (";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["healthScore"]) || array_key_exists("healthScore", $context) ? $context["healthScore"] : (function () { throw new RuntimeError('Variable "healthScore" does not exist.', 282, $this->source); })()), "html", null, true);
                    yield ")</span>
                            ";
                } else {
                    // line 284
                    yield "                                <span style=\"color: #6b7280;\">N/A</span>
                            ";
                }
                // line 286
                yield "                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['aliment'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 289
            yield "            </tbody>
        </table>
    ";
        }
        // line 292
        yield "
    <div class=\"footer\">
        <p>© ";
        // line 294
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate((isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 294, $this->source); })()), "Y"), "html", null, true);
        yield " BioSync - Nutrition Tracking System</p>
        <p>This report was automatically generated. For questions, contact your nutritionist.</p>
    </div>
</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "aliment/pdf.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  494 => 294,  490 => 292,  485 => 289,  477 => 286,  473 => 284,  467 => 282,  465 => 281,  460 => 280,  458 => 279,  453 => 278,  451 => 277,  446 => 276,  443 => 275,  441 => 274,  437 => 272,  433 => 270,  427 => 268,  425 => 267,  420 => 266,  418 => 265,  413 => 264,  410 => 263,  408 => 262,  404 => 260,  400 => 258,  394 => 256,  392 => 255,  388 => 253,  384 => 251,  378 => 249,  375 => 248,  373 => 247,  368 => 245,  365 => 244,  361 => 243,  341 => 225,  339 => 224,  334 => 221,  325 => 218,  317 => 216,  315 => 215,  311 => 213,  307 => 211,  303 => 209,  301 => 208,  296 => 206,  292 => 205,  288 => 204,  284 => 203,  280 => 202,  275 => 200,  270 => 198,  267 => 197,  263 => 196,  239 => 175,  232 => 171,  225 => 167,  218 => 163,  211 => 159,  203 => 154,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <title>Aliments Report - BioSync</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f5f5f5;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #10b981;
            padding-bottom: 20px;
        }
        
        .header h1 {
            color: #047857;
            margin: 0;
            font-size: 28px;
        }
        
        .header p {
            color: #6b7280;
            margin: 5px 0 0 0;
            font-size: 14px;
        }
        
        .stats-summary {
            display: flex;
            justify-content: space-around;
            margin-bottom: 30px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #10b981;
        }
        
        .stat-label {
            font-size: 12px;
            color: #6b7280;
            margin-top: 5px;
        }
        
        .aliment-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .aliment-table th {
            background: #10b981;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: bold;
            font-size: 12px;
        }
        
        .aliment-table td {
            padding: 10px 12px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 11px;
        }
        
        .aliment-table tr:nth-child(even) {
            background: #f9fafb;
        }
        
        .aliment-table tr:hover {
            background: #f3f4f6;
        }
        
        .aliment-name {
            font-weight: bold;
            color: #1f2937;
        }
        
        .aliment-type {
            background: #d1fae5;
            color: #065f46;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 10px;
            display: inline-block;
        }
        
        .excitant-yes {
            background: #fef2f2;
            color: #dc2626;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 10px;
            display: inline-block;
        }
        
        .excitant-no {
            background: #f0fdf4;
            color: #16a34a;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 10px;
            display: inline-block;
        }
        
        .nutri-score {
            font-weight: bold;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 10px;
            display: inline-block;
        }
        
        .nutri-a { background: #22c55e; color: white; }
        .nutri-b { background: #84cc16; color: white; }
        .nutri-c { background: #eab308; color: white; }
        .nutri-d { background: #f97316; color: white; }
        .nutri-e { background: #ef4444; color: white; }
        
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #6b7280;
            font-size: 12px;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }
        
        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <div class=\"header\">
        <h1>🥗 BioSync - Aliments Report</h1>
        <p>Generated on {{ date|date('d/m/Y H:i:s') }}</p>
    </div>

    <div class=\"stats-summary\">
        <div class=\"stat-item\">
            <div class=\"stat-value\">{{ aliments|length }}</div>
            <div class=\"stat-label\">Total Aliments</div>
        </div>
        <div class=\"stat-item\">
            <div class=\"stat-value\">{{ aliments|reduce((sum, a) => sum + a.calories, 0) }}</div>
            <div class=\"stat-label\">Total Calories</div>
        </div>
        <div class=\"stat-item\">
            <div class=\"stat-value\">{{ aliments|reduce((sum, a) => sum + a.proteines, 0) }}g</div>
            <div class=\"stat-label\">Total Proteins</div>
        </div>
        <div class=\"stat-item\">
            <div class=\"stat-value\">{{ aliments|reduce((sum, a) => sum + a.glucides, 0) }}g</div>
            <div class=\"stat-label\">Total Carbs</div>
        </div>
        <div class=\"stat-item\">
            <div class=\"stat-value\">{{ aliments|reduce((sum, a) => sum + a.lipides, 0) }}g</div>
            <div class=\"stat-label\">Total Fats</div>
        </div>
    </div>

    <table class=\"aliment-table\">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Calories</th>
                <th>Proteins</th>
                <th>Carbs</th>
                <th>Fats</th>
                <th>GI</th>
                <th>Excitant</th>
                <th>NutriScore</th>
                <th>MultiScore</th>
            </tr>
        </thead>
        <tbody>
            {% for aliment in aliments %}
                <tr>
                    <td class=\"aliment-name\">{{ aliment.nomAliment }}</td>
                    <td>
                        <span class=\"aliment-type\">{{ aliment.typeAliment|default('N/A') }}</span>
                    </td>
                    <td>{{ aliment.calories|default(0) }}</td>
                    <td>{{ aliment.proteines|default(0) }}g</td>
                    <td>{{ aliment.glucides|default(0) }}g</td>
                    <td>{{ aliment.lipides|default(0) }}g</td>
                    <td>{{ aliment.indexGlycemique|default(0) }}</td>
                    <td>
                        {% if aliment.estExcitant %}
                            <span class=\"excitant-yes\">Yes</span>
                        {% else %}
                            <span class=\"excitant-no\">No</span>
                        {% endif %}
                    </td>
                    <td>
                        {% set nutriClass = 'nutri-' ~ (aliment.nutriScore|default('c')|lower) %}
                        <span class=\"nutri-score {{ nutriClass }}\">{{ aliment.nutriScore|default('N/A') }}</span>
                    </td>
                    <td>{{ aliment.multiScore|default(0) }}</td>
                </tr>
            {% endfor %}
        </tbody>
    </table>

    {% if aliments|length > 20 %}
        <div class=\"page-break\"></div>
        
        <div class=\"header\">
            <h1>📊 Detailed Analysis</h1>
            <p>Nutritional breakdown and insights</p>
        </div>

        <table class=\"aliment-table\">
            <thead>
                <tr>
                    <th>Food Details</th>
                    <th>Calorie Density</th>
                    <th>Protein Ratio</th>
                    <th>GI Classification</th>
                    <th>Health Score</th>
                </tr>
            </thead>
            <tbody>
                {% for aliment in aliments %}
                    <tr>
                        <td class=\"aliment-name\">{{ aliment.nomAliment }}</td>
                        <td>
                            {% set totalMacro = (aliment.proteines + aliment.glucides + aliment.lipides) %}
                            {% if totalMacro > 0 %}
                                {{ (aliment.calories / totalMacro)|round(1) }} cal/g
                            {% else %}
                                N/A
                            {% endif %}
                        </td>
                        <td>
                            {% if aliment.calories > 0 %}
                                {{ ((aliment.proteines * 4) / aliment.calories * 100)|round(1) }}%
                            {% else %}
                                0%
                            {% endif %}
                        </td>
                        <td>
                            {% set gi = aliment.indexGlycemique|default(0) %}
                            {% if gi <= 55 %}
                                <span style=\"color: #16a34a;\">Low ({{ gi }})</span>
                            {% elseif gi <= 69 %}
                                <span style=\"color: #eab308;\">Medium ({{ gi }})</span>
                            {% elseif gi > 0 %}
                                <span style=\"color: #dc2626;\">High ({{ gi }})</span>
                            {% else %}
                                <span style=\"color: #6b7280;\">N/A</span>
                            {% endif %}
                        </td>
                        <td>
                            {% set healthScore = aliment.multiScore|default(0) %}
                            {% if healthScore >= 80 %}
                                <span style=\"color: #16a34a;\">Excellent ({{ healthScore }})</span>
                            {% elseif healthScore >= 60 %}
                                <span style=\"color: #84cc16;\">Good ({{ healthScore }})</span>
                            {% elseif healthScore >= 40 %}
                                <span style=\"color: #eab308;\">Fair ({{ healthScore }})</span>
                            {% elseif healthScore > 0 %}
                                <span style=\"color: #dc2626;\">Poor ({{ healthScore }})</span>
                            {% else %}
                                <span style=\"color: #6b7280;\">N/A</span>
                            {% endif %}
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    {% endif %}

    <div class=\"footer\">
        <p>© {{ date|date('Y') }} BioSync - Nutrition Tracking System</p>
        <p>This report was automatically generated. For questions, contact your nutritionist.</p>
    </div>
</body>
</html>", "aliment/pdf.html.twig", "C:\\biosync_new\\templates\\aliment\\pdf.html.twig");
    }
}
