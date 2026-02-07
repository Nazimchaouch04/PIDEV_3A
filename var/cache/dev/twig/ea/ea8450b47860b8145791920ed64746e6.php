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

/* bo/mental/dashboard.html.twig */
class __TwigTemplate_7beacf4c66c7f997b8bb16e5b13bda21 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "bo/mental/dashboard.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "bo/mental/dashboard.html.twig"));

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

        yield "Backoffice Mental - BioSync Admin";
        
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
        yield "<div class=\"bo-mental-dashboard\">
    ";
        // line 8
        yield "    <div class=\"page-header flex-between\">
        <div>
            <h1 class=\"page-title\">Backoffice Mental Wellness</h1>
            <p class=\"page-subtitle\">Gérer les quiz, questions et assessments</p>
        </div>
    </div>

    ";
        // line 16
        yield "    <div class=\"stats-grid\">
        <div class=\"stat-card\">
            <div class=\"stat-icon blue\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                    <line x1=\"12\" y1=\"16\" x2=\"12\" y2=\"12\"/>
                    <line x1=\"12\" y1=\"8\" x2=\"12.01\" y2=\"8\"/>
                </svg>
            </div>
            <div class=\"stat-content\">
                <div class=\"stat-value\">";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalQuestions"]) || array_key_exists("totalQuestions", $context) ? $context["totalQuestions"] : (function () { throw new RuntimeError('Variable "totalQuestions" does not exist.', 26, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Questions disponibles</div>
            </div>
        </div>

        <div class=\"stat-card\">
            <div class=\"stat-icon green\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z\"/>
                    <polyline points=\"14 2 14 8 20 8\"/>
                </svg>
            </div>
            <div class=\"stat-content\">
                <div class=\"stat-value\">";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalQuizzes"]) || array_key_exists("totalQuizzes", $context) ? $context["totalQuizzes"] : (function () { throw new RuntimeError('Variable "totalQuizzes" does not exist.', 39, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Quiz créés</div>
            </div>
        </div>

        <div class=\"stat-card\">
            <div class=\"stat-icon orange\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"/>
                    <circle cx=\"9\" cy=\"7\" r=\"4\"/>
                </svg>
            </div>
            <div class=\"stat-content\">
                <div class=\"stat-value\">";
        // line 52
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalUsers"]) || array_key_exists("totalUsers", $context) ? $context["totalUsers"] : (function () { throw new RuntimeError('Variable "totalUsers" does not exist.', 52, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Utilisateurs actifs</div>
            </div>
        </div>

        <div class=\"stat-card\">
            <div class=\"stat-icon purple\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                </svg>
            </div>
            <div class=\"stat-content\">
                <div class=\"stat-value\">";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalMedailles"]) || array_key_exists("totalMedailles", $context) ? $context["totalMedailles"] : (function () { throw new RuntimeError('Variable "totalMedailles" does not exist.', 64, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Médailles attribuées</div>
            </div>
        </div>
    </div>

    ";
        // line 71
        yield "    <div class=\"quick-actions-grid\">
        <a href=\"";
        // line 72
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental_admin_question_new");
        yield "\" class=\"action-card blue\">
            <div class=\"action-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/>
                    <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
                </svg>
            </div>
            <h3 class=\"action-title\">Créer une question</h3>
            <p class=\"action-desc\">Ajouter une nouvelle question au pool</p>
        </a>

        <a href=\"";
        // line 83
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental_admin_questions");
        yield "\" class=\"action-card green\">
            <div class=\"action-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <line x1=\"8\" y1=\"6\" x2=\"21\" y2=\"6\"/>
                    <line x1=\"8\" y1=\"12\" x2=\"21\" y2=\"12\"/>
                    <line x1=\"8\" y1=\"18\" x2=\"21\" y2=\"18\"/>
                    <line x1=\"3\" y1=\"6\" x2=\"3.01\" y2=\"6\"/>
                    <line x1=\"3\" y1=\"12\" x2=\"3.01\" y2=\"12\"/>
                    <line x1=\"3\" y1=\"18\" x2=\"3.01\" y2=\"18\"/>
                </svg>
            </div>
            <h3 class=\"action-title\">Gérer les questions</h3>
            <p class=\"action-desc\">Voir, modifier, supprimer les questions</p>
        </a>

        <a href=\"";
        // line 98
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental_admin_quiz_list");
        yield "\" class=\"action-card orange\">
            <div class=\"action-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z\"/>
                    <polyline points=\"14 2 14 8 20 8\"/>
                </svg>
            </div>
            <h3 class=\"action-title\">Gérer les quiz</h3>
            <p class=\"action-desc\">Voir tous les quiz utilisateurs</p>
        </a>

        <a href=\"";
        // line 109
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental");
        yield "\" class=\"action-card purple\">
            <div class=\"action-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z\"/>
                    <circle cx=\"12\" cy=\"12\" r=\"3\"/>
                </svg>
            </div>
            <h3 class=\"action-title\">Vue utilisateur</h3>
            <p class=\"action-desc\">Voir l'interface utilisateur</p>
        </a>
    </div>

    ";
        // line 122
        yield "    ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["recentQuestions"]) || array_key_exists("recentQuestions", $context) ? $context["recentQuestions"] : (function () { throw new RuntimeError('Variable "recentQuestions" does not exist.', 122, $this->source); })())) > 0)) {
            // line 123
            yield "    <div class=\"card mt-4\">
        <div class=\"card-header flex-between\">
            <h4 class=\"card-title\">Dernières questions ajoutées</h4>
            <a href=\"";
            // line 126
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental_admin_questions");
            yield "\" class=\"btn btn-sm btn-secondary\">Voir tout</a>
        </div>
        <div class=\"table-container\">
            <table class=\"table\">
                <thead>
                    <tr>
                        <th>Énoncé</th>
                        <th style=\"width: 150px;\">Points</th>
                        <th style=\"width: 150px;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 138
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recentQuestions"]) || array_key_exists("recentQuestions", $context) ? $context["recentQuestions"] : (function () { throw new RuntimeError('Variable "recentQuestions" does not exist.', 138, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
                // line 139
                yield "                    <tr>
                        <td>";
                // line 140
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["question"], "enonce", [], "any", false, false, false, 140), 0, 100), "html", null, true);
                yield "...</td>
                        <td><strong>";
                // line 141
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "pointsValeur", [], "any", false, false, false, 141), "html", null, true);
                yield "</strong></td>
                        <td>
                            <a href=\"";
                // line 143
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental_admin_question_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 143)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-secondary\">
                                Modifier
                            </a>
                        </td>
                    </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['question'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 149
            yield "                </tbody>
            </table>
        </div>
    </div>
    ";
        }
        // line 154
        yield "</div>
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
        return "bo/mental/dashboard.html.twig";
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
        return array (  302 => 154,  295 => 149,  283 => 143,  278 => 141,  274 => 140,  271 => 139,  267 => 138,  252 => 126,  247 => 123,  244 => 122,  229 => 109,  215 => 98,  197 => 83,  183 => 72,  180 => 71,  171 => 64,  156 => 52,  140 => 39,  124 => 26,  112 => 16,  103 => 8,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Backoffice Mental - BioSync Admin{% endblock %}

{% block body %}
<div class=\"bo-mental-dashboard\">
    {# Header #}
    <div class=\"page-header flex-between\">
        <div>
            <h1 class=\"page-title\">Backoffice Mental Wellness</h1>
            <p class=\"page-subtitle\">Gérer les quiz, questions et assessments</p>
        </div>
    </div>

    {# Stats Cards #}
    <div class=\"stats-grid\">
        <div class=\"stat-card\">
            <div class=\"stat-icon blue\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                    <line x1=\"12\" y1=\"16\" x2=\"12\" y2=\"12\"/>
                    <line x1=\"12\" y1=\"8\" x2=\"12.01\" y2=\"8\"/>
                </svg>
            </div>
            <div class=\"stat-content\">
                <div class=\"stat-value\">{{ totalQuestions }}</div>
                <div class=\"stat-label\">Questions disponibles</div>
            </div>
        </div>

        <div class=\"stat-card\">
            <div class=\"stat-icon green\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z\"/>
                    <polyline points=\"14 2 14 8 20 8\"/>
                </svg>
            </div>
            <div class=\"stat-content\">
                <div class=\"stat-value\">{{ totalQuizzes }}</div>
                <div class=\"stat-label\">Quiz créés</div>
            </div>
        </div>

        <div class=\"stat-card\">
            <div class=\"stat-icon orange\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"/>
                    <circle cx=\"9\" cy=\"7\" r=\"4\"/>
                </svg>
            </div>
            <div class=\"stat-content\">
                <div class=\"stat-value\">{{ totalUsers }}</div>
                <div class=\"stat-label\">Utilisateurs actifs</div>
            </div>
        </div>

        <div class=\"stat-card\">
            <div class=\"stat-icon purple\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                </svg>
            </div>
            <div class=\"stat-content\">
                <div class=\"stat-value\">{{ totalMedailles }}</div>
                <div class=\"stat-label\">Médailles attribuées</div>
            </div>
        </div>
    </div>

    {# Actions Rapides #}
    <div class=\"quick-actions-grid\">
        <a href=\"{{ path('app_mental_admin_question_new') }}\" class=\"action-card blue\">
            <div class=\"action-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/>
                    <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
                </svg>
            </div>
            <h3 class=\"action-title\">Créer une question</h3>
            <p class=\"action-desc\">Ajouter une nouvelle question au pool</p>
        </a>

        <a href=\"{{ path('app_mental_admin_questions') }}\" class=\"action-card green\">
            <div class=\"action-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <line x1=\"8\" y1=\"6\" x2=\"21\" y2=\"6\"/>
                    <line x1=\"8\" y1=\"12\" x2=\"21\" y2=\"12\"/>
                    <line x1=\"8\" y1=\"18\" x2=\"21\" y2=\"18\"/>
                    <line x1=\"3\" y1=\"6\" x2=\"3.01\" y2=\"6\"/>
                    <line x1=\"3\" y1=\"12\" x2=\"3.01\" y2=\"12\"/>
                    <line x1=\"3\" y1=\"18\" x2=\"3.01\" y2=\"18\"/>
                </svg>
            </div>
            <h3 class=\"action-title\">Gérer les questions</h3>
            <p class=\"action-desc\">Voir, modifier, supprimer les questions</p>
        </a>

        <a href=\"{{ path('app_mental_admin_quiz_list') }}\" class=\"action-card orange\">
            <div class=\"action-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z\"/>
                    <polyline points=\"14 2 14 8 20 8\"/>
                </svg>
            </div>
            <h3 class=\"action-title\">Gérer les quiz</h3>
            <p class=\"action-desc\">Voir tous les quiz utilisateurs</p>
        </a>

        <a href=\"{{ path('app_mental') }}\" class=\"action-card purple\">
            <div class=\"action-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z\"/>
                    <circle cx=\"12\" cy=\"12\" r=\"3\"/>
                </svg>
            </div>
            <h3 class=\"action-title\">Vue utilisateur</h3>
            <p class=\"action-desc\">Voir l'interface utilisateur</p>
        </a>
    </div>

    {# Dernières Questions #}
    {% if recentQuestions|length > 0 %}
    <div class=\"card mt-4\">
        <div class=\"card-header flex-between\">
            <h4 class=\"card-title\">Dernières questions ajoutées</h4>
            <a href=\"{{ path('app_mental_admin_questions') }}\" class=\"btn btn-sm btn-secondary\">Voir tout</a>
        </div>
        <div class=\"table-container\">
            <table class=\"table\">
                <thead>
                    <tr>
                        <th>Énoncé</th>
                        <th style=\"width: 150px;\">Points</th>
                        <th style=\"width: 150px;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {% for question in recentQuestions %}
                    <tr>
                        <td>{{ question.enonce|slice(0, 100) }}...</td>
                        <td><strong>{{ question.pointsValeur }}</strong></td>
                        <td>
                            <a href=\"{{ path('app_mental_admin_question_edit', {id: question.id}) }}\" class=\"btn btn-sm btn-secondary\">
                                Modifier
                            </a>
                        </td>
                    </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
    {% endif %}
</div>
{% endblock %}
", "bo/mental/dashboard.html.twig", "C:\\biosync_new\\templates\\bo\\mental\\dashboard.html.twig");
    }
}
