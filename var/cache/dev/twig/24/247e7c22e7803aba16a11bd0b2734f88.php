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

/* bo/mental/questions/list.html.twig */
class __TwigTemplate_2ef318f97748d498217800d41ff3fc58 extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "bo/mental/questions/list.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "bo/mental/questions/list.html.twig"));

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

        yield "Gestion Questions Quiz - Admin";
        
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
        yield "<div class=\"page-header flex-between\">
    <div>
        <h1 class=\"page-title\">Gestion des Questions Quiz</h1>
        <p class=\"page-subtitle\">Créer et gérer les questions pour les assessments mentaux</p>
    </div>
    <a href=\"";
        // line 11
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental_admin_question_new");
        yield "\" class=\"btn btn-primary\">
        <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
            <line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/>
            <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
        </svg>
        Nouvelle Question
    </a>
</div>

";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 20, $this->source); })()), "flashes", ["success"], "method", false, false, false, 20));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 21
            yield "    <div class=\"alert alert-success\">
        <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
            <path d=\"M22 11.08V12a10 10 0 1 1-5.93-9.14\"/>
            <polyline points=\"22 4 12 14.01 9 11.01\"/>
        </svg>
        ";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        yield "
<div class=\"card\">
    <div class=\"card-header\">
        <h4 class=\"card-title\">Liste des Questions (";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 32, $this->source); })())), "html", null, true);
        yield ")</h4>
    </div>
    
    ";
        // line 35
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 35, $this->source); })())) > 0)) {
            // line 36
            yield "        <div class=\"table-container\">
            <table class=\"table\">
                <thead>
                    <tr>
                        <th style=\"width: 50px;\">ID</th>
                        <th>Énoncé</th>
                        <th style=\"width: 200px;\">Réponse Correcte</th>
                        <th style=\"width: 100px;\">Points</th>
                        <th style=\"width: 150px;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 48
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 48, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
                // line 49
                yield "                        <tr>
                            <td><strong>#";
                // line 50
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 50), "html", null, true);
                yield "</strong></td>
                            <td>
                                <div style=\"max-width: 400px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;\">
                                    ";
                // line 53
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "enonce", [], "any", false, false, false, 53), "html", null, true);
                yield "
                                </div>
                            </td>
                            <td>
                                <span class=\"badge badge-success\">";
                // line 57
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "reponseCorrecte", [], "any", false, false, false, 57), "html", null, true);
                yield "</span>
                            </td>
                            <td><strong>";
                // line 59
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "pointsValeur", [], "any", false, false, false, 59), "html", null, true);
                yield "</strong></td>
                            <td>
                                <div class=\"table-actions\">
                                    <a href=\"";
                // line 62
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental_admin_question_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 62)]), "html", null, true);
                yield "\" 
                                       class=\"icon-btn\" 
                                       title=\"Modifier\">
                                        <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                            <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                            <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                                        </svg>
                                    </a>
                                    <form action=\"";
                // line 70
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental_admin_question_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 70)]), "html", null, true);
                yield "\" 
                                          method=\"post\" 
                                          style=\"display: inline;\" 
                                          class=\"delete-form\">
                                        <input type=\"hidden\" name=\"_token\" value=\"";
                // line 74
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 74))), "html", null, true);
                yield "\">
                                        <button type=\"submit\" class=\"icon-btn danger\" title=\"Supprimer\">
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
            unset($context['_seq'], $context['_key'], $context['question'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 86
            yield "                </tbody>
            </table>
        </div>
    ";
        } else {
            // line 90
            yield "        <div class=\"empty-state\">
            <svg width=\"64\" height=\"64\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--gray-300)\" stroke-width=\"2\">
                <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                <line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"12\"/>
                <line x1=\"12\" y1=\"16\" x2=\"12.01\" y2=\"16\"/>
            </svg>
            <h4 class=\"empty-state-title\">Aucune question</h4>
            <p class=\"text-gray\">Commencez par créer votre première question de quiz.</p>
            <a href=\"";
            // line 98
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental_admin_question_new");
            yield "\" class=\"btn btn-primary mt-4\">
                Créer une question
            </a>
        </div>
    ";
        }
        // line 103
        yield "</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 106
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 107
        yield "<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            if (!confirm('Êtes-vous sûr de vouloir supprimer cette question ?')) {
                e.preventDefault();
            }
        });
    });
});
</script>
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
        return "bo/mental/questions/list.html.twig";
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
        return array (  283 => 107,  270 => 106,  258 => 103,  250 => 98,  240 => 90,  234 => 86,  216 => 74,  209 => 70,  198 => 62,  192 => 59,  187 => 57,  180 => 53,  174 => 50,  171 => 49,  167 => 48,  153 => 36,  151 => 35,  145 => 32,  140 => 29,  131 => 26,  124 => 21,  120 => 20,  108 => 11,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Gestion Questions Quiz - Admin{% endblock %}

{% block body %}
<div class=\"page-header flex-between\">
    <div>
        <h1 class=\"page-title\">Gestion des Questions Quiz</h1>
        <p class=\"page-subtitle\">Créer et gérer les questions pour les assessments mentaux</p>
    </div>
    <a href=\"{{ path('app_mental_admin_question_new') }}\" class=\"btn btn-primary\">
        <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
            <line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/>
            <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
        </svg>
        Nouvelle Question
    </a>
</div>

{% for message in app.flashes('success') %}
    <div class=\"alert alert-success\">
        <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
            <path d=\"M22 11.08V12a10 10 0 1 1-5.93-9.14\"/>
            <polyline points=\"22 4 12 14.01 9 11.01\"/>
        </svg>
        {{ message }}
    </div>
{% endfor %}

<div class=\"card\">
    <div class=\"card-header\">
        <h4 class=\"card-title\">Liste des Questions ({{ questions|length }})</h4>
    </div>
    
    {% if questions|length > 0 %}
        <div class=\"table-container\">
            <table class=\"table\">
                <thead>
                    <tr>
                        <th style=\"width: 50px;\">ID</th>
                        <th>Énoncé</th>
                        <th style=\"width: 200px;\">Réponse Correcte</th>
                        <th style=\"width: 100px;\">Points</th>
                        <th style=\"width: 150px;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {% for question in questions %}
                        <tr>
                            <td><strong>#{{ question.id }}</strong></td>
                            <td>
                                <div style=\"max-width: 400px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;\">
                                    {{ question.enonce }}
                                </div>
                            </td>
                            <td>
                                <span class=\"badge badge-success\">{{ question.reponseCorrecte }}</span>
                            </td>
                            <td><strong>{{ question.pointsValeur }}</strong></td>
                            <td>
                                <div class=\"table-actions\">
                                    <a href=\"{{ path('app_mental_admin_question_edit', {id: question.id}) }}\" 
                                       class=\"icon-btn\" 
                                       title=\"Modifier\">
                                        <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                            <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                            <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                                        </svg>
                                    </a>
                                    <form action=\"{{ path('app_mental_admin_question_delete', {id: question.id}) }}\" 
                                          method=\"post\" 
                                          style=\"display: inline;\" 
                                          class=\"delete-form\">
                                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ question.id) }}\">
                                        <button type=\"submit\" class=\"icon-btn danger\" title=\"Supprimer\">
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
                <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                <line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"12\"/>
                <line x1=\"12\" y1=\"16\" x2=\"12.01\" y2=\"16\"/>
            </svg>
            <h4 class=\"empty-state-title\">Aucune question</h4>
            <p class=\"text-gray\">Commencez par créer votre première question de quiz.</p>
            <a href=\"{{ path('app_mental_admin_question_new') }}\" class=\"btn btn-primary mt-4\">
                Créer une question
            </a>
        </div>
    {% endif %}
</div>
{% endblock %}

{% block javascripts %}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            if (!confirm('Êtes-vous sûr de vouloir supprimer cette question ?')) {
                e.preventDefault();
            }
        });
    });
});
</script>
{% endblock %}
", "bo/mental/questions/list.html.twig", "C:\\biosync_new\\templates\\bo\\mental\\questions\\list.html.twig");
    }
}
