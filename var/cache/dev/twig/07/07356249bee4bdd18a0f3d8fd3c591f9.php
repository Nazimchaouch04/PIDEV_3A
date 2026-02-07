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

/* repas/pdf.html.twig */
class __TwigTemplate_61747a5e18a16ef48749244180fbf338 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "repas/pdf.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "repas/pdf.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <title>Repas Report - BioSync</title>
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
            border-bottom: 3px solid #3b82f6;
            padding-bottom: 20px;
        }
        
        .header h1 {
            color: #1e40af;
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
            color: #3b82f6;
        }
        
        .stat-label {
            font-size: 12px;
            color: #6b7280;
            margin-top: 5px;
        }
        
        .meal-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .meal-table th {
            background: #3b82f6;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: bold;
        }
        
        .meal-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .meal-table tr:nth-child(even) {
            background: #f9fafb;
        }
        
        .meal-table tr:hover {
            background: #f3f4f6;
        }
        
        .meal-name {
            font-weight: bold;
            color: #1f2937;
        }
        
        .meal-type {
            background: #e0e7ff;
            color: #3730a3;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            display: inline-block;
        }
        
        .meal-macros {
            font-size: 12px;
            color: #6b7280;
        }
        
        .meal-time {
            color: #9ca3af;
            font-size: 12px;
        }
        
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
        <h1>🍽️ BioSync - Repas Report</h1>
        <p>Generated on ";
        // line 130
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate((isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 130, $this->source); })()), "d/m/Y H:i:s"), "html", null, true);
        yield "</p>
    </div>

    <div class=\"stats-summary\">
        <div class=\"stat-item\">
            <div class=\"stat-value\">";
        // line 135
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 135, $this->source); })())), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Total Meals</div>
        </div>
        <div class=\"stat-item\">
            <div class=\"stat-value\">";
        // line 139
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::reduce($this->env, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 139, $this->source); })()), function ($__sum__, $__r__) use ($context, $macros) { $context["sum"] = $__sum__; $context["r"] = $__r__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 139, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["r"]) || array_key_exists("r", $context) ? $context["r"] : (function () { throw new RuntimeError('Variable "r" does not exist.', 139, $this->source); })()), "totalCalories", [], "any", false, false, false, 139)); }, 0), "html", null, true);
        yield "</div>
            <div class=\"stat-label\">Total Calories</div>
        </div>
        <div class=\"stat-item\">
            <div class=\"stat-value\">";
        // line 143
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::reduce($this->env, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 143, $this->source); })()), function ($__sum__, $__r__) use ($context, $macros) { $context["sum"] = $__sum__; $context["r"] = $__r__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 143, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["r"]) || array_key_exists("r", $context) ? $context["r"] : (function () { throw new RuntimeError('Variable "r" does not exist.', 143, $this->source); })()), "totalProteines", [], "any", false, false, false, 143)); }, 0), "html", null, true);
        yield "g</div>
            <div class=\"stat-label\">Total Proteins</div>
        </div>
        <div class=\"stat-item\">
            <div class=\"stat-value\">";
        // line 147
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::reduce($this->env, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 147, $this->source); })()), function ($__sum__, $__r__) use ($context, $macros) { $context["sum"] = $__sum__; $context["r"] = $__r__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 147, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["r"]) || array_key_exists("r", $context) ? $context["r"] : (function () { throw new RuntimeError('Variable "r" does not exist.', 147, $this->source); })()), "totalGlucides", [], "any", false, false, false, 147)); }, 0), "html", null, true);
        yield "g</div>
            <div class=\"stat-label\">Total Carbs</div>
        </div>
        <div class=\"stat-item\">
            <div class=\"stat-value\">";
        // line 151
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::reduce($this->env, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 151, $this->source); })()), function ($__sum__, $__r__) use ($context, $macros) { $context["sum"] = $__sum__; $context["r"] = $__r__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 151, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["r"]) || array_key_exists("r", $context) ? $context["r"] : (function () { throw new RuntimeError('Variable "r" does not exist.', 151, $this->source); })()), "totalLipides", [], "any", false, false, false, 151)); }, 0), "html", null, true);
        yield "g</div>
            <div class=\"stat-label\">Total Fats</div>
        </div>
    </div>

    <table class=\"meal-table\">
        <thead>
            <tr>
                <th>Meal Name</th>
                <th>Type</th>
                <th>Date & Time</th>
                <th>Nutritional Info</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 167
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 167, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
            // line 168
            yield "                <tr>
                    <td class=\"meal-name\">";
            // line 169
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "titreRepas", [], "any", false, false, false, 169), "html", null, true);
            yield "</td>
                    <td>
                        <span class=\"meal-type\">";
            // line 171
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["r"], "typeMoment", [], "any", false, true, false, 171), "label", [], "any", true, true, false, 171)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["r"], "typeMoment", [], "any", false, false, false, 171), "label", [], "any", false, false, false, 171), "N/A")) : ("N/A")), "html", null, true);
            yield "</span>
                    </td>
                    <td>
                        <div>";
            // line 174
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "dateConsommation", [], "any", false, false, false, 174), "d/m/Y"), "html", null, true);
            yield "</div>
                        <div class=\"meal-time\">";
            // line 175
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "dateConsommation", [], "any", false, false, false, 175), "H:i"), "html", null, true);
            yield "</div>
                    </td>
                    <td class=\"meal-macros\">
                        ";
            // line 178
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalCalories", [], "any", true, true, false, 178)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalCalories", [], "any", false, false, false, 178), 0)) : (0)), "html", null, true);
            yield " cal | 
                        P: ";
            // line 179
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalProteines", [], "any", true, true, false, 179)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalProteines", [], "any", false, false, false, 179), 0)) : (0)), "html", null, true);
            yield "g | 
                        C: ";
            // line 180
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalGlucides", [], "any", true, true, false, 180)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalGlucides", [], "any", false, false, false, 180), 0)) : (0)), "html", null, true);
            yield "g | 
                        F: ";
            // line 181
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalLipides", [], "any", true, true, false, 181)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalLipides", [], "any", false, false, false, 181), 0)) : (0)), "html", null, true);
            yield "g
                    </td>
                    <td>
                        <strong>";
            // line 184
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "pointsGagnes", [], "any", false, false, false, 184), "html", null, true);
            yield "</strong> pts
                    </td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['r'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 188
        yield "        </tbody>
    </table>

    ";
        // line 191
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 191, $this->source); })())) > 20)) {
            // line 192
            yield "        <div class=\"page-break\"></div>
        
        <div class=\"header\">
            <h1>📊 Detailed Analysis</h1>
            <p>Nutritional breakdown and insights</p>
        </div>

        <table class=\"meal-table\">
            <thead>
                <tr>
                    <th>Meal Details</th>
                    <th>Aliments Count</th>
                    <th>Avg Calories</th>
                    <th>Efficiency</th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 209
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 209, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
                // line 210
                yield "                    <tr>
                        <td class=\"meal-name\">";
                // line 211
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "titreRepas", [], "any", false, false, false, 211), "html", null, true);
                yield "</td>
                        <td>";
                // line 212
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["r"], "aliments", [], "any", false, false, false, 212)), "html", null, true);
                yield " items</td>
                        <td>
                            ";
                // line 214
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["r"], "aliments", [], "any", false, false, false, 214)) > 0)) {
                    // line 215
                    yield "                                ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round((CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalCalories", [], "any", false, false, false, 215) / Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["r"], "aliments", [], "any", false, false, false, 215))), 1), "html", null, true);
                    yield " cal/item
                            ";
                } else {
                    // line 217
                    yield "                                0 cal/item
                            ";
                }
                // line 219
                yield "                        </td>
                        <td>
                            ";
                // line 221
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalCalories", [], "any", false, false, false, 221) > 0)) {
                    // line 222
                    yield "                                ";
                    $context["efficiency"] = Twig\Extension\CoreExtension::round(((CoreExtension::getAttribute($this->env, $this->source, $context["r"], "pointsGagnes", [], "any", false, false, false, 222) / CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalCalories", [], "any", false, false, false, 222)) * 100), 1);
                    // line 223
                    yield "                                <span style=\"color: ";
                    if (((isset($context["efficiency"]) || array_key_exists("efficiency", $context) ? $context["efficiency"] : (function () { throw new RuntimeError('Variable "efficiency" does not exist.', 223, $this->source); })()) > 50)) {
                        yield "#22c55e";
                    } elseif (((isset($context["efficiency"]) || array_key_exists("efficiency", $context) ? $context["efficiency"] : (function () { throw new RuntimeError('Variable "efficiency" does not exist.', 223, $this->source); })()) > 25)) {
                        yield "#f59e0b";
                    } else {
                        yield "#ef4444";
                    }
                    yield "\">
                                    ";
                    // line 224
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["efficiency"]) || array_key_exists("efficiency", $context) ? $context["efficiency"] : (function () { throw new RuntimeError('Variable "efficiency" does not exist.', 224, $this->source); })()), "html", null, true);
                    yield "%
                                </span>
                            ";
                } else {
                    // line 227
                    yield "                                <span style=\"color: #ef4444;\">N/A</span>
                            ";
                }
                // line 229
                yield "                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['r'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 232
            yield "            </tbody>
        </table>
    ";
        }
        // line 235
        yield "
    <div class=\"footer\">
        <p>© ";
        // line 237
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate((isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 237, $this->source); })()), "Y"), "html", null, true);
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
        return "repas/pdf.html.twig";
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
        return array (  391 => 237,  387 => 235,  382 => 232,  374 => 229,  370 => 227,  364 => 224,  353 => 223,  350 => 222,  348 => 221,  344 => 219,  340 => 217,  334 => 215,  332 => 214,  327 => 212,  323 => 211,  320 => 210,  316 => 209,  297 => 192,  295 => 191,  290 => 188,  280 => 184,  274 => 181,  270 => 180,  266 => 179,  262 => 178,  256 => 175,  252 => 174,  246 => 171,  241 => 169,  238 => 168,  234 => 167,  215 => 151,  208 => 147,  201 => 143,  194 => 139,  187 => 135,  179 => 130,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <title>Repas Report - BioSync</title>
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
            border-bottom: 3px solid #3b82f6;
            padding-bottom: 20px;
        }
        
        .header h1 {
            color: #1e40af;
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
            color: #3b82f6;
        }
        
        .stat-label {
            font-size: 12px;
            color: #6b7280;
            margin-top: 5px;
        }
        
        .meal-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .meal-table th {
            background: #3b82f6;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: bold;
        }
        
        .meal-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .meal-table tr:nth-child(even) {
            background: #f9fafb;
        }
        
        .meal-table tr:hover {
            background: #f3f4f6;
        }
        
        .meal-name {
            font-weight: bold;
            color: #1f2937;
        }
        
        .meal-type {
            background: #e0e7ff;
            color: #3730a3;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            display: inline-block;
        }
        
        .meal-macros {
            font-size: 12px;
            color: #6b7280;
        }
        
        .meal-time {
            color: #9ca3af;
            font-size: 12px;
        }
        
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
        <h1>🍽️ BioSync - Repas Report</h1>
        <p>Generated on {{ date|date('d/m/Y H:i:s') }}</p>
    </div>

    <div class=\"stats-summary\">
        <div class=\"stat-item\">
            <div class=\"stat-value\">{{ repas|length }}</div>
            <div class=\"stat-label\">Total Meals</div>
        </div>
        <div class=\"stat-item\">
            <div class=\"stat-value\">{{ repas|reduce((sum, r) => sum + r.totalCalories, 0) }}</div>
            <div class=\"stat-label\">Total Calories</div>
        </div>
        <div class=\"stat-item\">
            <div class=\"stat-value\">{{ repas|reduce((sum, r) => sum + r.totalProteines, 0) }}g</div>
            <div class=\"stat-label\">Total Proteins</div>
        </div>
        <div class=\"stat-item\">
            <div class=\"stat-value\">{{ repas|reduce((sum, r) => sum + r.totalGlucides, 0) }}g</div>
            <div class=\"stat-label\">Total Carbs</div>
        </div>
        <div class=\"stat-item\">
            <div class=\"stat-value\">{{ repas|reduce((sum, r) => sum + r.totalLipides, 0) }}g</div>
            <div class=\"stat-label\">Total Fats</div>
        </div>
    </div>

    <table class=\"meal-table\">
        <thead>
            <tr>
                <th>Meal Name</th>
                <th>Type</th>
                <th>Date & Time</th>
                <th>Nutritional Info</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            {% for r in repas %}
                <tr>
                    <td class=\"meal-name\">{{ r.titreRepas }}</td>
                    <td>
                        <span class=\"meal-type\">{{ r.typeMoment.label|default('N/A') }}</span>
                    </td>
                    <td>
                        <div>{{ r.dateConsommation|date('d/m/Y') }}</div>
                        <div class=\"meal-time\">{{ r.dateConsommation|date('H:i') }}</div>
                    </td>
                    <td class=\"meal-macros\">
                        {{ r.totalCalories|default(0) }} cal | 
                        P: {{ r.totalProteines|default(0) }}g | 
                        C: {{ r.totalGlucides|default(0) }}g | 
                        F: {{ r.totalLipides|default(0) }}g
                    </td>
                    <td>
                        <strong>{{ r.pointsGagnes }}</strong> pts
                    </td>
                </tr>
            {% endfor %}
        </tbody>
    </table>

    {% if repas|length > 20 %}
        <div class=\"page-break\"></div>
        
        <div class=\"header\">
            <h1>📊 Detailed Analysis</h1>
            <p>Nutritional breakdown and insights</p>
        </div>

        <table class=\"meal-table\">
            <thead>
                <tr>
                    <th>Meal Details</th>
                    <th>Aliments Count</th>
                    <th>Avg Calories</th>
                    <th>Efficiency</th>
                </tr>
            </thead>
            <tbody>
                {% for r in repas %}
                    <tr>
                        <td class=\"meal-name\">{{ r.titreRepas }}</td>
                        <td>{{ r.aliments|length }} items</td>
                        <td>
                            {% if r.aliments|length > 0 %}
                                {{ (r.totalCalories / r.aliments|length)|round(1) }} cal/item
                            {% else %}
                                0 cal/item
                            {% endif %}
                        </td>
                        <td>
                            {% if r.totalCalories > 0 %}
                                {% set efficiency = (r.pointsGagnes / r.totalCalories * 100)|round(1) %}
                                <span style=\"color: {% if efficiency > 50 %}#22c55e{% elseif efficiency > 25 %}#f59e0b{% else %}#ef4444{% endif %}\">
                                    {{ efficiency }}%
                                </span>
                            {% else %}
                                <span style=\"color: #ef4444;\">N/A</span>
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
</html>", "repas/pdf.html.twig", "C:\\biosync_new\\templates\\repas\\pdf.html.twig");
    }
}
