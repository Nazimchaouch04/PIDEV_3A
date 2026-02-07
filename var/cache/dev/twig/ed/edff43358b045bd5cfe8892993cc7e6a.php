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

/* bo/mental/quiz/list.html.twig */
class __TwigTemplate_35889bb23bdc2a0395852a7236c5e476 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "bo/mental/quiz/list.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "bo/mental/quiz/list.html.twig"));

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

        yield "Liste des Quiz - Admin BioSync";
        
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
        <h1 class=\"page-title\">Gestion des Quiz Utilisateurs</h1>
        <p class=\"page-subtitle\">Consulter tous les quiz passés par les utilisateurs</p>
    </div>
    <div style=\"display: flex; gap: 12px;\">
        <a href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental_admin_quiz_new");
        yield "\" class=\"btn btn-primary\">
            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                <line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/>
                <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
            </svg>
            Créer un Quiz
        </a>
        <a href=\"";
        // line 19
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental_admin_dashboard");
        yield "\" class=\"btn btn-secondary\">
            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                <line x1=\"19\" y1=\"12\" x2=\"5\" y2=\"12\"/>
                <polyline points=\"12 19 5 12 12 5\"/>
            </svg>
            Retour Dashboard
        </a>
    </div>
</div>

<div class=\"card\">
    <div class=\"card-header\">
        <h4 class=\"card-title\">Tous les Quiz (";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["quizzes"]) || array_key_exists("quizzes", $context) ? $context["quizzes"] : (function () { throw new RuntimeError('Variable "quizzes" does not exist.', 31, $this->source); })())), "html", null, true);
        yield ")</h4>
    </div>
    
    ";
        // line 34
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["quizzes"]) || array_key_exists("quizzes", $context) ? $context["quizzes"] : (function () { throw new RuntimeError('Variable "quizzes" does not exist.', 34, $this->source); })())) > 0)) {
            // line 35
            yield "        <div class=\"table-container\">
            <table class=\"table\">
                <thead>
                    <tr>
                        <th style=\"width: 50px;\">ID</th>
                        <th>Utilisateur</th>
                        <th>Titre</th>
                        <th style=\"width: 120px;\">Date</th>
                        <th style=\"width: 100px;\">Score</th>
                        <th style=\"width: 150px;\">Médaille</th>
                        <th style=\"width: 100px;\">Stress</th>
                        <th style=\"width: 150px;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 50
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["quizzes"]) || array_key_exists("quizzes", $context) ? $context["quizzes"] : (function () { throw new RuntimeError('Variable "quizzes" does not exist.', 50, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["quiz"]) {
                // line 51
                yield "                        <tr>
                            <td><strong>#";
                // line 52
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 52), "html", null, true);
                yield "</strong></td>
                            <td>
                                <div class=\"user-cell\">
                                    <div class=\"user-avatar-small\">
                                        ";
                // line 56
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "utilisateur", [], "any", false, false, false, 56), "nomComplet", [], "any", false, false, false, 56), 0, 2)), "html", null, true);
                yield "
                                    </div>
                                    <div>
                                        <strong>";
                // line 59
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "utilisateur", [], "any", false, false, false, 59), "nomComplet", [], "any", false, false, false, 59), "html", null, true);
                yield "</strong><br>
                                        <small class=\"text-gray\">";
                // line 60
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "utilisateur", [], "any", false, false, false, 60), "email", [], "any", false, false, false, 60), "html", null, true);
                yield "</small>
                                    </div>
                                </div>
                            </td>
                            <td>";
                // line 64
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 64), "html", null, true);
                yield "</td>
                            <td>";
                // line 65
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "dateQuiz", [], "any", false, false, false, 65), "d/m/Y H:i"), "html", null, true);
                yield "</td>
                            <td>
                                <span class=\"badge badge-primary\">";
                // line 67
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreResultat", [], "any", false, false, false, 67), "html", null, true);
                yield " pts</span>
                            </td>
                            <td>
                                ";
                // line 70
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "medailleQuiz", [], "any", false, false, false, 70)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 71
                    yield "                                    <span class=\"badge badge-warning\">
                                        <svg width=\"14\" height=\"14\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" style=\"display: inline; vertical-align: middle; margin-right: 4px;\">
                                            <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                                        </svg>
                                        ";
                    // line 75
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "medailleQuiz", [], "any", false, false, false, 75), "html", null, true);
                    yield "
                                    </span>
                                ";
                } else {
                    // line 78
                    yield "                                    <span class=\"text-gray\">-</span>
                                ";
                }
                // line 80
                yield "                            </td>
                            <td>
                                <div class=\"stress-indicator stress-";
                // line 82
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "niveauStressCible", [], "any", false, false, false, 82), "html", null, true);
                yield "\">
                                    ";
                // line 83
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "niveauStressCible", [], "any", false, false, false, 83), "html", null, true);
                yield "/10
                                </div>
                            </td>
                            <td>
                                <div class=\"table-actions\">
                                    <a href=\"";
                // line 88
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental_admin_quiz_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 88)]), "html", null, true);
                yield "\" 
                                       class=\"icon-btn\" 
                                       title=\"Modifier\">
                                        <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                            <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                            <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                                        </svg>
                                    </a>
                                    <form action=\"";
                // line 96
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental_admin_quiz_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 96)]), "html", null, true);
                yield "\" 
                                          method=\"post\" 
                                          style=\"display: inline;\" 
                                          class=\"delete-form\">
                                        <input type=\"hidden\" name=\"_token\" value=\"";
                // line 100
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 100))), "html", null, true);
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
            unset($context['_seq'], $context['_key'], $context['quiz'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 112
            yield "                </tbody>
            </table>
        </div>
    ";
        } else {
            // line 116
            yield "        <div class=\"empty-state\">
            <svg width=\"64\" height=\"64\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--gray-300)\" stroke-width=\"2\">
                <path d=\"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z\"/>
                <polyline points=\"14 2 14 8 20 8\"/>
            </svg>
            <h4 class=\"empty-state-title\">Aucun quiz passé</h4>
            <p class=\"text-gray\">Aucun utilisateur n'a encore passé de quiz mental.</p>
        </div>
    ";
        }
        // line 125
        yield "</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 128
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

        // line 129
        yield "<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            if (!confirm('Êtes-vous sûr de vouloir supprimer ce quiz ?')) {
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
        return "bo/mental/quiz/list.html.twig";
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
        return array (  317 => 129,  304 => 128,  292 => 125,  281 => 116,  275 => 112,  257 => 100,  250 => 96,  239 => 88,  231 => 83,  227 => 82,  223 => 80,  219 => 78,  213 => 75,  207 => 71,  205 => 70,  199 => 67,  194 => 65,  190 => 64,  183 => 60,  179 => 59,  173 => 56,  166 => 52,  163 => 51,  159 => 50,  142 => 35,  140 => 34,  134 => 31,  119 => 19,  109 => 12,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Liste des Quiz - Admin BioSync{% endblock %}

{% block body %}
<div class=\"page-header flex-between\">
    <div>
        <h1 class=\"page-title\">Gestion des Quiz Utilisateurs</h1>
        <p class=\"page-subtitle\">Consulter tous les quiz passés par les utilisateurs</p>
    </div>
    <div style=\"display: flex; gap: 12px;\">
        <a href=\"{{ path('app_mental_admin_quiz_new') }}\" class=\"btn btn-primary\">
            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                <line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/>
                <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
            </svg>
            Créer un Quiz
        </a>
        <a href=\"{{ path('app_mental_admin_dashboard') }}\" class=\"btn btn-secondary\">
            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                <line x1=\"19\" y1=\"12\" x2=\"5\" y2=\"12\"/>
                <polyline points=\"12 19 5 12 12 5\"/>
            </svg>
            Retour Dashboard
        </a>
    </div>
</div>

<div class=\"card\">
    <div class=\"card-header\">
        <h4 class=\"card-title\">Tous les Quiz ({{ quizzes|length }})</h4>
    </div>
    
    {% if quizzes|length > 0 %}
        <div class=\"table-container\">
            <table class=\"table\">
                <thead>
                    <tr>
                        <th style=\"width: 50px;\">ID</th>
                        <th>Utilisateur</th>
                        <th>Titre</th>
                        <th style=\"width: 120px;\">Date</th>
                        <th style=\"width: 100px;\">Score</th>
                        <th style=\"width: 150px;\">Médaille</th>
                        <th style=\"width: 100px;\">Stress</th>
                        <th style=\"width: 150px;\">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {% for quiz in quizzes %}
                        <tr>
                            <td><strong>#{{ quiz.id }}</strong></td>
                            <td>
                                <div class=\"user-cell\">
                                    <div class=\"user-avatar-small\">
                                        {{ quiz.utilisateur.nomComplet|slice(0, 2)|upper }}
                                    </div>
                                    <div>
                                        <strong>{{ quiz.utilisateur.nomComplet }}</strong><br>
                                        <small class=\"text-gray\">{{ quiz.utilisateur.email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ quiz.titre }}</td>
                            <td>{{ quiz.dateQuiz|date('d/m/Y H:i') }}</td>
                            <td>
                                <span class=\"badge badge-primary\">{{ quiz.scoreResultat }} pts</span>
                            </td>
                            <td>
                                {% if quiz.medailleQuiz %}
                                    <span class=\"badge badge-warning\">
                                        <svg width=\"14\" height=\"14\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" style=\"display: inline; vertical-align: middle; margin-right: 4px;\">
                                            <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                                        </svg>
                                        {{ quiz.medailleQuiz }}
                                    </span>
                                {% else %}
                                    <span class=\"text-gray\">-</span>
                                {% endif %}
                            </td>
                            <td>
                                <div class=\"stress-indicator stress-{{ quiz.niveauStressCible }}\">
                                    {{ quiz.niveauStressCible }}/10
                                </div>
                            </td>
                            <td>
                                <div class=\"table-actions\">
                                    <a href=\"{{ path('app_mental_admin_quiz_edit', {id: quiz.id}) }}\" 
                                       class=\"icon-btn\" 
                                       title=\"Modifier\">
                                        <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                            <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                            <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                                        </svg>
                                    </a>
                                    <form action=\"{{ path('app_mental_admin_quiz_delete', {id: quiz.id}) }}\" 
                                          method=\"post\" 
                                          style=\"display: inline;\" 
                                          class=\"delete-form\">
                                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ quiz.id) }}\">
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
                <path d=\"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z\"/>
                <polyline points=\"14 2 14 8 20 8\"/>
            </svg>
            <h4 class=\"empty-state-title\">Aucun quiz passé</h4>
            <p class=\"text-gray\">Aucun utilisateur n'a encore passé de quiz mental.</p>
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
            if (!confirm('Êtes-vous sûr de vouloir supprimer ce quiz ?')) {
                e.preventDefault();
            }
        });
    });
});
</script>
{% endblock %}
", "bo/mental/quiz/list.html.twig", "C:\\biosync_new\\templates\\bo\\mental\\quiz\\list.html.twig");
    }
}
