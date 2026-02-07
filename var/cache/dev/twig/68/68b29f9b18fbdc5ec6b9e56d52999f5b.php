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

/* medical/index.html.twig */
class __TwigTemplate_ad13a4dc8ea45b2cee8144f1dab85e78 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base_back.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "medical/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "medical/index.html.twig"));

        $this->parent = $this->load("base_back.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Medical Appointments - BioSync";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "        ";
        // line 7
        yield "        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">Medical Appointments</h1>
                <p class=\"page-subtitle\">Manage your healthcare appointments and find specialists</p>
            </div>
        </div>

        ";
        // line 15
        yield "        <div class=\"tabs\">
            <button class=\"tab-btn active\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                    <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                    <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                    <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                </svg>
                My Appointments
            </button>
            <button class=\"tab-btn\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                    <line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"16\"/>
                    <line x1=\"8\" y1=\"12\" x2=\"16\" y2=\"12\"/>
                </svg>
                Book Specialist
            </button>
        </div>

        <div class=\"grid grid-cols-2 gap-6\">
            ";
        // line 37
        yield "            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Rendez-vous a venir</h4>
                </div>
                ";
        // line 41
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["upcomingRdv"]) || array_key_exists("upcomingRdv", $context) ? $context["upcomingRdv"] : (function () { throw new RuntimeError('Variable "upcomingRdv" does not exist.', 41, $this->source); })())) > 0)) {
            // line 42
            yield "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["upcomingRdv"]) || array_key_exists("upcomingRdv", $context) ? $context["upcomingRdv"] : (function () { throw new RuntimeError('Variable "upcomingRdv" does not exist.', 42, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["rdv"]) {
                // line 43
                yield "                        <div class=\"list-item\">
                            <div class=\"list-item-icon\" style=\"background: rgba(239, 68, 68, 0.1); color: var(--danger);\">
                                <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                    <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                                    <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                                    <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                                </svg>
                            </div>
                            <div class=\"list-item-content\">
                                <div class=\"list-item-title\">Dr. ";
                // line 52
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "specialiste", [], "any", false, false, false, 52), "nomDocteur", [], "any", false, false, false, 52), "html", null, true);
                yield "</div>
                                <div class=\"list-item-subtitle\">";
                // line 53
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "dateHeureRdv", [], "any", false, false, false, 53), "d/m/Y H:i"), "html", null, true);
                yield "</div>
                            </div>
                            <a href=\"";
                // line 55
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_medical_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "id", [], "any", false, false, false, 55)]), "html", null, true);
                yield "\" class=\"icon-btn\">
                                <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                    <polyline points=\"9 18 15 12 9 6\"/>
                                </svg>
                            </a>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['rdv'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 62
            yield "                ";
        } else {
            // line 63
            yield "                    <div class=\"empty-state\">
                        <p class=\"text-gray\">Aucun rendez-vous a venir</p>
                    </div>
                ";
        }
        // line 67
        yield "            </div>

            ";
        // line 70
        yield "            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Specialistes disponibles</h4>
                </div>
                ";
        // line 74
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["specialistes"]) || array_key_exists("specialistes", $context) ? $context["specialistes"] : (function () { throw new RuntimeError('Variable "specialistes" does not exist.', 74, $this->source); })())) > 0)) {
            // line 75
            yield "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["specialistes"]) || array_key_exists("specialistes", $context) ? $context["specialistes"] : (function () { throw new RuntimeError('Variable "specialistes" does not exist.', 75, $this->source); })()), 0, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["spec"]) {
                // line 76
                yield "                        <div class=\"list-item\">
                            <div class=\"list-item-icon\" style=\"background: rgba(54, 124, 254, 0.1); color: var(--secondary);\">
                                <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                    <path d=\"M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2\"/>
                                    <circle cx=\"12\" cy=\"7\" r=\"4\"/>
                                </svg>
                            </div>
                            <div class=\"list-item-content\">
                                <div class=\"list-item-title\">Dr. ";
                // line 84
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["spec"], "nomDocteur", [], "any", false, false, false, 84), "html", null, true);
                yield "</div>
                                <div class=\"list-item-subtitle\">";
                // line 85
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["spec"], "specialite", [], "any", false, false, false, 85), "html", null, true);
                yield "</div>
                            </div>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['spec'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 89
            yield "                ";
        } else {
            // line 90
            yield "                    <div class=\"empty-state\">
                        <p class=\"text-gray\">Aucun specialiste disponible</p>
                    </div>
                ";
        }
        // line 94
        yield "            </div>
        </div>

        ";
        // line 98
        yield "        <div class=\"card mt-6\">
            <div class=\"card-header\">
                <h4 class=\"card-title\">Historique des rendez-vous</h4>
            </div>
            ";
        // line 102
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["rendezVous"]) || array_key_exists("rendezVous", $context) ? $context["rendezVous"] : (function () { throw new RuntimeError('Variable "rendezVous" does not exist.', 102, $this->source); })())) > 0)) {
            // line 103
            yield "                <div class=\"table-container\">
                    <table class=\"table\">
                        <thead>
                            <tr>
                                <th>Specialiste</th>
                                <th>Date</th>
                                <th>Motif</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
            // line 115
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["rendezVous"]) || array_key_exists("rendezVous", $context) ? $context["rendezVous"] : (function () { throw new RuntimeError('Variable "rendezVous" does not exist.', 115, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["rdv"]) {
                // line 116
                yield "                                <tr>
                                    <td><strong>Dr. ";
                // line 117
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "specialiste", [], "any", false, false, false, 117), "nomDocteur", [], "any", false, false, false, 117), "html", null, true);
                yield "</strong></td>
                                    <td>";
                // line 118
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "dateHeureRdv", [], "any", false, false, false, 118), "d/m/Y H:i"), "html", null, true);
                yield "</td>
                                    <td>";
                // line 119
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "motif", [], "any", false, false, false, 119), 0, 30), "html", null, true);
                yield "...</td>
                                    <td>
                                        ";
                // line 121
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "estHonore", [], "any", false, false, false, 121)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 122
                    yield "                                            <span class=\"badge badge-success\">Honore</span>
                                        ";
                } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,                 // line 123
$context["rdv"], "isPassed", [], "any", false, false, false, 123)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 124
                    yield "                                            <span class=\"badge badge-danger\">Manque</span>
                                        ";
                } else {
                    // line 126
                    yield "                                            <span class=\"badge badge-warning\">A venir</span>
                                        ";
                }
                // line 128
                yield "                                    </td>
                                    <td>
                                        <div class=\"table-actions\">
                                            <a href=\"";
                // line 131
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_medical_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "id", [], "any", false, false, false, 131)]), "html", null, true);
                yield "\" class=\"icon-btn\" title=\"Voir\">
                                                <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                                    <path d=\"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z\"/>
                                                    <circle cx=\"12\" cy=\"12\" r=\"3\"/>
                                                </svg>
                                            </a>
                                            ";
                // line 137
                if (( !CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "isPassed", [], "any", false, false, false, 137) &&  !CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "estHonore", [], "any", false, false, false, 137))) {
                    // line 138
                    yield "                                                <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_medical_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "id", [], "any", false, false, false, 138)]), "html", null, true);
                    yield "\" class=\"icon-btn\" title=\"Modifier\">
                                                    <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                                        <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                                        <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                                                    </svg>
                                                </a>
                                            ";
                }
                // line 145
                yield "                                            <form action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_medical_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "id", [], "any", false, false, false, 145)]), "html", null, true);
                yield "\" method=\"post\" style=\"display: inline;\" id=\"delete-form-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "id", [], "any", false, false, false, 145), "html", null, true);
                yield "\">
                                                <input type=\"hidden\" name=\"_token\" value=\"";
                // line 146
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "id", [], "any", false, false, false, 146))), "html", null, true);
                yield "\">
                                                <button type=\"button\" class=\"icon-btn danger\" title=\"Supprimer\" onclick=\"confirmDelete('delete-form-";
                // line 147
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "id", [], "any", false, false, false, 147), "html", null, true);
                yield "')\">
                                                    <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                                        <polyline points=\"3 6 5 6 21 6\"/>
                                                        <path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['rdv'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 158
            yield "                        </tbody>
                    </table>
                </div>
            ";
        } else {
            // line 162
            yield "                <div class=\"empty-state\">
                    <svg width=\"64\" height=\"64\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--gray-300)\" stroke-width=\"2\">
                        <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                        <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                        <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                        <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                    </svg>
                    <h4 class=\"empty-state-title\">Aucun rendez-vous</h4>
                    <p class=\"text-gray\">Planifiez votre premier rendez-vous medical.</p>
                    <a href=\"";
            // line 171
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_medical_new");
            yield "\" class=\"btn btn-primary mt-4\">Prendre un RDV</a>
                </div>
            ";
        }
        // line 174
        yield "        </div>
    </main>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "medical/index.html.twig";
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
        return array (  379 => 174,  373 => 171,  362 => 162,  356 => 158,  339 => 147,  335 => 146,  328 => 145,  317 => 138,  315 => 137,  306 => 131,  301 => 128,  297 => 126,  293 => 124,  291 => 123,  288 => 122,  286 => 121,  281 => 119,  277 => 118,  273 => 117,  270 => 116,  266 => 115,  252 => 103,  250 => 102,  244 => 98,  239 => 94,  233 => 90,  230 => 89,  220 => 85,  216 => 84,  206 => 76,  201 => 75,  199 => 74,  193 => 70,  189 => 67,  183 => 63,  180 => 62,  167 => 55,  162 => 53,  158 => 52,  147 => 43,  142 => 42,  140 => 41,  134 => 37,  111 => 15,  102 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Medical Appointments - BioSync{% endblock %}

{% block body %}
        {# Page Header #}
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">Medical Appointments</h1>
                <p class=\"page-subtitle\">Manage your healthcare appointments and find specialists</p>
            </div>
        </div>

        {# Tabs Navigation #}
        <div class=\"tabs\">
            <button class=\"tab-btn active\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                    <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                    <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                    <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                </svg>
                My Appointments
            </button>
            <button class=\"tab-btn\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                    <line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"16\"/>
                    <line x1=\"8\" y1=\"12\" x2=\"16\" y2=\"12\"/>
                </svg>
                Book Specialist
            </button>
        </div>

        <div class=\"grid grid-cols-2 gap-6\">
            {# RDV a venir #}
            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Rendez-vous a venir</h4>
                </div>
                {% if upcomingRdv|length > 0 %}
                    {% for rdv in upcomingRdv %}
                        <div class=\"list-item\">
                            <div class=\"list-item-icon\" style=\"background: rgba(239, 68, 68, 0.1); color: var(--danger);\">
                                <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                    <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                                    <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                                    <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                                </svg>
                            </div>
                            <div class=\"list-item-content\">
                                <div class=\"list-item-title\">Dr. {{ rdv.specialiste.nomDocteur }}</div>
                                <div class=\"list-item-subtitle\">{{ rdv.dateHeureRdv|date('d/m/Y H:i') }}</div>
                            </div>
                            <a href=\"{{ path('app_medical_show', {id: rdv.id}) }}\" class=\"icon-btn\">
                                <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                    <polyline points=\"9 18 15 12 9 6\"/>
                                </svg>
                            </a>
                        </div>
                    {% endfor %}
                {% else %}
                    <div class=\"empty-state\">
                        <p class=\"text-gray\">Aucun rendez-vous a venir</p>
                    </div>
                {% endif %}
            </div>

            {# Specialistes #}
            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Specialistes disponibles</h4>
                </div>
                {% if specialistes|length > 0 %}
                    {% for spec in specialistes|slice(0, 5) %}
                        <div class=\"list-item\">
                            <div class=\"list-item-icon\" style=\"background: rgba(54, 124, 254, 0.1); color: var(--secondary);\">
                                <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                    <path d=\"M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2\"/>
                                    <circle cx=\"12\" cy=\"7\" r=\"4\"/>
                                </svg>
                            </div>
                            <div class=\"list-item-content\">
                                <div class=\"list-item-title\">Dr. {{ spec.nomDocteur }}</div>
                                <div class=\"list-item-subtitle\">{{ spec.specialite }}</div>
                            </div>
                        </div>
                    {% endfor %}
                {% else %}
                    <div class=\"empty-state\">
                        <p class=\"text-gray\">Aucun specialiste disponible</p>
                    </div>
                {% endif %}
            </div>
        </div>

        {# Historique #}
        <div class=\"card mt-6\">
            <div class=\"card-header\">
                <h4 class=\"card-title\">Historique des rendez-vous</h4>
            </div>
            {% if rendezVous|length > 0 %}
                <div class=\"table-container\">
                    <table class=\"table\">
                        <thead>
                            <tr>
                                <th>Specialiste</th>
                                <th>Date</th>
                                <th>Motif</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {% for rdv in rendezVous %}
                                <tr>
                                    <td><strong>Dr. {{ rdv.specialiste.nomDocteur }}</strong></td>
                                    <td>{{ rdv.dateHeureRdv|date('d/m/Y H:i') }}</td>
                                    <td>{{ rdv.motif|slice(0, 30) }}...</td>
                                    <td>
                                        {% if rdv.estHonore %}
                                            <span class=\"badge badge-success\">Honore</span>
                                        {% elseif rdv.isPassed %}
                                            <span class=\"badge badge-danger\">Manque</span>
                                        {% else %}
                                            <span class=\"badge badge-warning\">A venir</span>
                                        {% endif %}
                                    </td>
                                    <td>
                                        <div class=\"table-actions\">
                                            <a href=\"{{ path('app_medical_show', {id: rdv.id}) }}\" class=\"icon-btn\" title=\"Voir\">
                                                <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                                    <path d=\"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z\"/>
                                                    <circle cx=\"12\" cy=\"12\" r=\"3\"/>
                                                </svg>
                                            </a>
                                            {% if not rdv.isPassed and not rdv.estHonore %}
                                                <a href=\"{{ path('app_medical_edit', {id: rdv.id}) }}\" class=\"icon-btn\" title=\"Modifier\">
                                                    <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                                        <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                                        <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                                                    </svg>
                                                </a>
                                            {% endif %}
                                            <form action=\"{{ path('app_medical_delete', {id: rdv.id}) }}\" method=\"post\" style=\"display: inline;\" id=\"delete-form-{{ rdv.id }}\">
                                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ rdv.id) }}\">
                                                <button type=\"button\" class=\"icon-btn danger\" title=\"Supprimer\" onclick=\"confirmDelete('delete-form-{{ rdv.id }}')\">
                                                    <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                                        <polyline points=\"3 6 5 6 21 6\"/>
                                                        <path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            {% endfor %}
                        </tbody>
                    </table>
                </div>
            {% else %}
                <div class=\"empty-state\">
                    <svg width=\"64\" height=\"64\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--gray-300)\" stroke-width=\"2\">
                        <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                        <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                        <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                        <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                    </svg>
                    <h4 class=\"empty-state-title\">Aucun rendez-vous</h4>
                    <p class=\"text-gray\">Planifiez votre premier rendez-vous medical.</p>
                    <a href=\"{{ path('app_medical_new') }}\" class=\"btn btn-primary mt-4\">Prendre un RDV</a>
                </div>
            {% endif %}
        </div>
    </main>
</div>
{% endblock %}
", "medical/index.html.twig", "C:\\biosync_new\\templates\\medical\\index.html.twig");
    }
}
