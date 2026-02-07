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

/* dashboard/users_pdf.html.twig */
class __TwigTemplate_c80276b65ca5dc553af035c3c60bdda8 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/users_pdf.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/users_pdf.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <title>Rapport des Utilisateurs et leurs Repas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #3b82f6;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #3b82f6;
            margin: 0;
            font-size: 24px;
        }
        .header p {
            color: #666;
            margin: 5px 0 0 0;
            font-size: 14px;
        }
        .user-section {
            margin-bottom: 30px;
            page-break-inside: avoid;
        }
        .user-header {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .user-name {
            font-weight: bold;
            font-size: 16px;
            color: #1f2937;
            margin: 0 0 5px 0;
        }
        .user-email {
            color: #6b7280;
            font-size: 12px;
            margin: 0;
        }
        .meals-table {
            width: 100%;
            border-collapse: collapse;
            margin-left: 20px;
        }
        .meals-table th {
            background: #3b82f6;
            color: white;
            padding: 8px;
            text-align: left;
            font-size: 11px;
            border: 1px solid #2563eb;
        }
        .meals-table td {
            padding: 8px;
            border: 1px solid #e5e7eb;
            font-size: 11px;
        }
        .meals-table tr:nth-child(even) {
            background: #f9fafb;
        }
        .no-meals {
            color: #6b7280;
            font-style: italic;
            margin-left: 20px;
        }
        .summary {
            background: #f0f9ff;
            border: 1px solid #bae6fd;
            border-radius: 8px;
            padding: 15px;
            margin-top: 30px;
        }
        .summary h3 {
            color: #0369a1;
            margin: 0 0 10px 0;
            font-size: 14px;
        }
        .summary p {
            margin: 5px 0;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class=\"header\">
        <h1>Rapport des Utilisateurs et leurs Repas</h1>
        <p>Généré le ";
        // line 98
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate((isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 98, $this->source); })()), "d/m/Y H:i"), "html", null, true);
        yield "</p>
    </div>

    ";
        // line 101
        $context["totalUsers"] = 0;
        // line 102
        yield "    ";
        $context["totalMeals"] = 0;
        // line 103
        yield "    
    ";
        // line 104
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 104, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 105
            yield "        ";
            $context["totalUsers"] = ((isset($context["totalUsers"]) || array_key_exists("totalUsers", $context) ? $context["totalUsers"] : (function () { throw new RuntimeError('Variable "totalUsers" does not exist.', 105, $this->source); })()) + 1);
            // line 106
            yield "        ";
            $context["userMeals"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "repas", [], "any", false, false, false, 106));
            // line 107
            yield "        ";
            $context["totalMeals"] = ((isset($context["totalMeals"]) || array_key_exists("totalMeals", $context) ? $context["totalMeals"] : (function () { throw new RuntimeError('Variable "totalMeals" does not exist.', 107, $this->source); })()) + (isset($context["userMeals"]) || array_key_exists("userMeals", $context) ? $context["userMeals"] : (function () { throw new RuntimeError('Variable "userMeals" does not exist.', 107, $this->source); })()));
            // line 108
            yield "        
        <div class=\"user-section\">
            <div class=\"user-header\">
                <div class=\"user-name\">";
            // line 111
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "nomComplet", [], "any", true, true, false, 111)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "nomComplet", [], "any", false, false, false, 111), "N/A")) : ("N/A")), "html", null, true);
            yield "</div>
                <div class=\"user-email\">";
            // line 112
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 112), "html", null, true);
            yield "</div>
            </div>
            
            ";
            // line 115
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "repas", [], "any", false, false, false, 115)) > 0)) {
                // line 116
                yield "                <table class=\"meals-table\">
                    <thead>
                        <tr>
                            <th>Titre du repas</th>
                            <th>Moment</th>
                            <th>Date</th>
                            <th>Calories</th>
                            <th>Protéines</th>
                            <th>Glucides</th>
                            <th>Lipides</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
                // line 129
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "repas", [], "any", false, false, false, 129));
                foreach ($context['_seq'] as $context["_key"] => $context["repas"]) {
                    // line 130
                    yield "                            <tr>
                                <td>";
                    // line 131
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["repas"], "titreRepas", [], "any", false, false, false, 131), "html", null, true);
                    yield "</td>
                                <td>";
                    // line 132
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["repas"], "typeMoment", [], "any", false, false, false, 132)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["repas"], "typeMoment", [], "any", false, false, false, 132), "label", [], "method", false, false, false, 132), "html", null, true)) : (""));
                    yield "</td>
                                <td>";
                    // line 133
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["repas"], "dateConsommation", [], "any", false, false, false, 133)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["repas"], "dateConsommation", [], "any", false, false, false, 133), "d/m/Y H:i"), "html", null, true)) : (""));
                    yield "</td>
                                <td>";
                    // line 134
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["repas"], "totalCalories", [], "any", false, false, false, 134), 1), "html", null, true);
                    yield " cal</td>
                                <td>";
                    // line 135
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["repas"], "totalProteines", [], "any", false, false, false, 135), 1), "html", null, true);
                    yield " g</td>
                                <td>";
                    // line 136
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["repas"], "totalGlucides", [], "any", false, false, false, 136), 1), "html", null, true);
                    yield " g</td>
                                <td>";
                    // line 137
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["repas"], "totalLipides", [], "any", false, false, false, 137), 1), "html", null, true);
                    yield " g</td>
                            </tr>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['repas'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 140
                yield "                    </tbody>
                </table>
            ";
            } else {
                // line 143
                yield "                <div class=\"no-meals\">Aucun repas enregistré pour cet utilisateur</div>
            ";
            }
            // line 145
            yield "        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['user'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 147
        yield "
    <div class=\"summary\">
        <h3>Résumé</h3>
        <p><strong>Total utilisateurs :</strong> ";
        // line 150
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalUsers"]) || array_key_exists("totalUsers", $context) ? $context["totalUsers"] : (function () { throw new RuntimeError('Variable "totalUsers" does not exist.', 150, $this->source); })()), "html", null, true);
        yield "</p>
        <p><strong>Total repas :</strong> ";
        // line 151
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalMeals"]) || array_key_exists("totalMeals", $context) ? $context["totalMeals"] : (function () { throw new RuntimeError('Variable "totalMeals" does not exist.', 151, $this->source); })()), "html", null, true);
        yield "</p>
        <p><strong>Moyenne de repas par utilisateur :</strong> ";
        // line 152
        if (((isset($context["totalUsers"]) || array_key_exists("totalUsers", $context) ? $context["totalUsers"] : (function () { throw new RuntimeError('Variable "totalUsers" does not exist.', 152, $this->source); })()) > 0)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(((isset($context["totalMeals"]) || array_key_exists("totalMeals", $context) ? $context["totalMeals"] : (function () { throw new RuntimeError('Variable "totalMeals" does not exist.', 152, $this->source); })()) / (isset($context["totalUsers"]) || array_key_exists("totalUsers", $context) ? $context["totalUsers"] : (function () { throw new RuntimeError('Variable "totalUsers" does not exist.', 152, $this->source); })())), 1), "html", null, true);
        } else {
            yield "0";
        }
        yield "</p>
    </div>
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "dashboard/users_pdf.html.twig";
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
        return array (  275 => 152,  271 => 151,  267 => 150,  262 => 147,  255 => 145,  251 => 143,  246 => 140,  237 => 137,  233 => 136,  229 => 135,  225 => 134,  221 => 133,  217 => 132,  213 => 131,  210 => 130,  206 => 129,  191 => 116,  189 => 115,  183 => 112,  179 => 111,  174 => 108,  171 => 107,  168 => 106,  165 => 105,  161 => 104,  158 => 103,  155 => 102,  153 => 101,  147 => 98,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <title>Rapport des Utilisateurs et leurs Repas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #3b82f6;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #3b82f6;
            margin: 0;
            font-size: 24px;
        }
        .header p {
            color: #666;
            margin: 5px 0 0 0;
            font-size: 14px;
        }
        .user-section {
            margin-bottom: 30px;
            page-break-inside: avoid;
        }
        .user-header {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .user-name {
            font-weight: bold;
            font-size: 16px;
            color: #1f2937;
            margin: 0 0 5px 0;
        }
        .user-email {
            color: #6b7280;
            font-size: 12px;
            margin: 0;
        }
        .meals-table {
            width: 100%;
            border-collapse: collapse;
            margin-left: 20px;
        }
        .meals-table th {
            background: #3b82f6;
            color: white;
            padding: 8px;
            text-align: left;
            font-size: 11px;
            border: 1px solid #2563eb;
        }
        .meals-table td {
            padding: 8px;
            border: 1px solid #e5e7eb;
            font-size: 11px;
        }
        .meals-table tr:nth-child(even) {
            background: #f9fafb;
        }
        .no-meals {
            color: #6b7280;
            font-style: italic;
            margin-left: 20px;
        }
        .summary {
            background: #f0f9ff;
            border: 1px solid #bae6fd;
            border-radius: 8px;
            padding: 15px;
            margin-top: 30px;
        }
        .summary h3 {
            color: #0369a1;
            margin: 0 0 10px 0;
            font-size: 14px;
        }
        .summary p {
            margin: 5px 0;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class=\"header\">
        <h1>Rapport des Utilisateurs et leurs Repas</h1>
        <p>Généré le {{ date|date('d/m/Y H:i') }}</p>
    </div>

    {% set totalUsers = 0 %}
    {% set totalMeals = 0 %}
    
    {% for user in users %}
        {% set totalUsers = totalUsers + 1 %}
        {% set userMeals = user.repas|length %}
        {% set totalMeals = totalMeals + userMeals %}
        
        <div class=\"user-section\">
            <div class=\"user-header\">
                <div class=\"user-name\">{{ user.nomComplet|default('N/A') }}</div>
                <div class=\"user-email\">{{ user.email }}</div>
            </div>
            
            {% if user.repas|length > 0 %}
                <table class=\"meals-table\">
                    <thead>
                        <tr>
                            <th>Titre du repas</th>
                            <th>Moment</th>
                            <th>Date</th>
                            <th>Calories</th>
                            <th>Protéines</th>
                            <th>Glucides</th>
                            <th>Lipides</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for repas in user.repas %}
                            <tr>
                                <td>{{ repas.titreRepas }}</td>
                                <td>{{ repas.typeMoment ? repas.typeMoment.label() : '' }}</td>
                                <td>{{ repas.dateConsommation ? repas.dateConsommation|date('d/m/Y H:i') : '' }}</td>
                                <td>{{ repas.totalCalories|number_format(1) }} cal</td>
                                <td>{{ repas.totalProteines|number_format(1) }} g</td>
                                <td>{{ repas.totalGlucides|number_format(1) }} g</td>
                                <td>{{ repas.totalLipides|number_format(1) }} g</td>
                            </tr>
                        {% endfor %}
                    </tbody>
                </table>
            {% else %}
                <div class=\"no-meals\">Aucun repas enregistré pour cet utilisateur</div>
            {% endif %}
        </div>
    {% endfor %}

    <div class=\"summary\">
        <h3>Résumé</h3>
        <p><strong>Total utilisateurs :</strong> {{ totalUsers }}</p>
        <p><strong>Total repas :</strong> {{ totalMeals }}</p>
        <p><strong>Moyenne de repas par utilisateur :</strong> {% if totalUsers > 0 %}{{ (totalMeals / totalUsers)|number_format(1) }}{% else %}0{% endif %}</p>
    </div>
</body>
</html>
", "dashboard/users_pdf.html.twig", "C:\\biosync_new\\templates\\dashboard\\users_pdf.html.twig");
    }
}
