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

/* mental/quiz/result.html.twig */
class __TwigTemplate_271d56c55bc2c46a869eb59ae3a083fe extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mental/quiz/result.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mental/quiz/result.html.twig"));

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

        yield "Résultats du Quiz - BioSync";
        
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
        yield "<div class=\"quiz-result-container\">
    ";
        // line 8
        yield "    <div class=\"quiz-result-card\">
        ";
        // line 10
        yield "        <div class=\"quiz-result-icon\">
            ";
        // line 11
        if (((isset($context["percentage"]) || array_key_exists("percentage", $context) ? $context["percentage"] : (function () { throw new RuntimeError('Variable "percentage" does not exist.', 11, $this->source); })()) >= 80)) {
            // line 12
            yield "                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" class=\"icon-trophy\">
                    <path d=\"M6 9H4.5a2.5 2.5 0 0 1 0-5H6\"/>
                    <path d=\"M18 9h1.5a2.5 2.5 0 0 0 0-5H18\"/>
                    <path d=\"M4 22h16\"/>
                    <path d=\"M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22\"/>
                    <path d=\"M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22\"/>
                    <path d=\"M18 2H6v7a6 6 0 0 0 12 0V2Z\"/>
                </svg>
            ";
        } elseif ((        // line 20
(isset($context["percentage"]) || array_key_exists("percentage", $context) ? $context["percentage"] : (function () { throw new RuntimeError('Variable "percentage" does not exist.', 20, $this->source); })()) >= 60)) {
            // line 21
            yield "                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" class=\"icon-medal\">
                    <circle cx=\"12\" cy=\"8\" r=\"6\"/>
                    <path d=\"M15.477 12.89 17 22l-5-3-5 3 1.523-9.11\"/>
                </svg>
            ";
        } else {
            // line 26
            yield "                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" class=\"icon-check\">
                    <path d=\"M22 11.08V12a10 10 0 1 1-5.93-9.14\"/>
                    <polyline points=\"22 4 12 14.01 9 11.01\"/>
                </svg>
            ";
        }
        // line 31
        yield "        </div>

        ";
        // line 34
        yield "        <h1 class=\"quiz-result-title\">Quiz Terminé !</h1>
        <p class=\"quiz-result-subtitle\">Voici vos résultats</p>

        ";
        // line 38
        yield "        <div class=\"quiz-score-display\">
            <div class=\"quiz-score-circle\">
                <svg class=\"quiz-score-svg\" viewBox=\"0 0 100 100\">
                    <circle cx=\"50\" cy=\"50\" r=\"45\" class=\"quiz-score-bg\"/>
                    <circle cx=\"50\" cy=\"50\" r=\"45\" class=\"quiz-score-progress\" 
                            style=\"stroke-dasharray: ";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((isset($context["percentage"]) || array_key_exists("percentage", $context) ? $context["percentage"] : (function () { throw new RuntimeError('Variable "percentage" does not exist.', 43, $this->source); })()) * 2.827), "html", null, true);
        yield " 283; transform: rotate(-90deg); transform-origin: center;\"/>
                </svg>
                <div class=\"quiz-score-text\">
                    <span class=\"quiz-score-number\">";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["percentage"]) || array_key_exists("percentage", $context) ? $context["percentage"] : (function () { throw new RuntimeError('Variable "percentage" does not exist.', 46, $this->source); })()), "html", null, true);
        yield "%</span>
                    <span class=\"quiz-score-label\">Réussite</span>
                </div>
            </div>
        </div>

        ";
        // line 53
        yield "        <div class=\"quiz-stats-grid\">
            <div class=\"quiz-stat-item\">
                <div class=\"quiz-stat-value\">";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["correctAnswers"]) || array_key_exists("correctAnswers", $context) ? $context["correctAnswers"] : (function () { throw new RuntimeError('Variable "correctAnswers" does not exist.', 55, $this->source); })()), "html", null, true);
        yield "/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalQuestions"]) || array_key_exists("totalQuestions", $context) ? $context["totalQuestions"] : (function () { throw new RuntimeError('Variable "totalQuestions" does not exist.', 55, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"quiz-stat-label\">Bonnes réponses</div>
            </div>
            <div class=\"quiz-stat-item\">
                <div class=\"quiz-stat-value\">";
        // line 59
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalScore"]) || array_key_exists("totalScore", $context) ? $context["totalScore"] : (function () { throw new RuntimeError('Variable "totalScore" does not exist.', 59, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"quiz-stat-label\">Points totaux</div>
            </div>
        </div>

        ";
        // line 65
        yield "        ";
        if ((($tmp = (isset($context["medaille"]) || array_key_exists("medaille", $context) ? $context["medaille"] : (function () { throw new RuntimeError('Variable "medaille" does not exist.', 65, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 66
            yield "            <div class=\"quiz-medal-badge\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                </svg>
                <div>
                    <div class=\"quiz-medal-title\">Médaille obtenue</div>
                    <div class=\"quiz-medal-name\">";
            // line 72
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["medaille"]) || array_key_exists("medaille", $context) ? $context["medaille"] : (function () { throw new RuntimeError('Variable "medaille" does not exist.', 72, $this->source); })()), "html", null, true);
            yield "</div>
                </div>
            </div>
        ";
        }
        // line 76
        yield "
        ";
        // line 78
        yield "        <div class=\"quiz-performance-message\">
            ";
        // line 79
        if (((isset($context["percentage"]) || array_key_exists("percentage", $context) ? $context["percentage"] : (function () { throw new RuntimeError('Variable "percentage" does not exist.', 79, $this->source); })()) >= 80)) {
            // line 80
            yield "                <strong>Excellent !</strong> Vous maîtrisez très bien le sujet.
            ";
        } elseif ((        // line 81
(isset($context["percentage"]) || array_key_exists("percentage", $context) ? $context["percentage"] : (function () { throw new RuntimeError('Variable "percentage" does not exist.', 81, $this->source); })()) >= 60)) {
            // line 82
            yield "                <strong>Très bien !</strong> Vous avez de bonnes connaissances.
            ";
        } elseif ((        // line 83
(isset($context["percentage"]) || array_key_exists("percentage", $context) ? $context["percentage"] : (function () { throw new RuntimeError('Variable "percentage" does not exist.', 83, $this->source); })()) >= 40)) {
            // line 84
            yield "                <strong>Bien !</strong> Continuez à progresser.
            ";
        } else {
            // line 86
            yield "                <strong>Continuez !</strong> La pratique mène à la perfection.
            ";
        }
        // line 88
        yield "        </div>

        ";
        // line 91
        yield "        <div class=\"quiz-result-actions\">
            <a href=\"";
        // line 92
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental");
        yield "\" class=\"btn btn-primary\">
                <svg width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                    <polyline points=\"1 4 1 10 7 10\"/>
                    <path d=\"M3.51 15a9 9 0 1 0 2.13-9.36L1 10\"/>
                </svg>
                Choisir un autre quiz
            </a>
            <a href=\"";
        // line 99
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
        yield "\" class=\"btn btn-secondary\">
                Retour au dashboard
            </a>
        </div>
    </div>
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
        return "mental/quiz/result.html.twig";
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
        return array (  250 => 99,  240 => 92,  237 => 91,  233 => 88,  229 => 86,  225 => 84,  223 => 83,  220 => 82,  218 => 81,  215 => 80,  213 => 79,  210 => 78,  207 => 76,  200 => 72,  192 => 66,  189 => 65,  181 => 59,  172 => 55,  168 => 53,  159 => 46,  153 => 43,  146 => 38,  141 => 34,  137 => 31,  130 => 26,  123 => 21,  121 => 20,  111 => 12,  109 => 11,  106 => 10,  103 => 8,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Résultats du Quiz - BioSync{% endblock %}

{% block body %}
<div class=\"quiz-result-container\">
    {# Success Card #}
    <div class=\"quiz-result-card\">
        {# Icon celebration #}
        <div class=\"quiz-result-icon\">
            {% if percentage >= 80 %}
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" class=\"icon-trophy\">
                    <path d=\"M6 9H4.5a2.5 2.5 0 0 1 0-5H6\"/>
                    <path d=\"M18 9h1.5a2.5 2.5 0 0 0 0-5H18\"/>
                    <path d=\"M4 22h16\"/>
                    <path d=\"M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22\"/>
                    <path d=\"M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22\"/>
                    <path d=\"M18 2H6v7a6 6 0 0 0 12 0V2Z\"/>
                </svg>
            {% elseif percentage >= 60 %}
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" class=\"icon-medal\">
                    <circle cx=\"12\" cy=\"8\" r=\"6\"/>
                    <path d=\"M15.477 12.89 17 22l-5-3-5 3 1.523-9.11\"/>
                </svg>
            {% else %}
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" class=\"icon-check\">
                    <path d=\"M22 11.08V12a10 10 0 1 1-5.93-9.14\"/>
                    <polyline points=\"22 4 12 14.01 9 11.01\"/>
                </svg>
            {% endif %}
        </div>

        {# Title and score #}
        <h1 class=\"quiz-result-title\">Quiz Terminé !</h1>
        <p class=\"quiz-result-subtitle\">Voici vos résultats</p>

        {# Score Display #}
        <div class=\"quiz-score-display\">
            <div class=\"quiz-score-circle\">
                <svg class=\"quiz-score-svg\" viewBox=\"0 0 100 100\">
                    <circle cx=\"50\" cy=\"50\" r=\"45\" class=\"quiz-score-bg\"/>
                    <circle cx=\"50\" cy=\"50\" r=\"45\" class=\"quiz-score-progress\" 
                            style=\"stroke-dasharray: {{ percentage * 2.827 }} 283; transform: rotate(-90deg); transform-origin: center;\"/>
                </svg>
                <div class=\"quiz-score-text\">
                    <span class=\"quiz-score-number\">{{ percentage }}%</span>
                    <span class=\"quiz-score-label\">Réussite</span>
                </div>
            </div>
        </div>

        {# Stats Grid #}
        <div class=\"quiz-stats-grid\">
            <div class=\"quiz-stat-item\">
                <div class=\"quiz-stat-value\">{{ correctAnswers }}/{{ totalQuestions }}</div>
                <div class=\"quiz-stat-label\">Bonnes réponses</div>
            </div>
            <div class=\"quiz-stat-item\">
                <div class=\"quiz-stat-value\">{{ totalScore }}</div>
                <div class=\"quiz-stat-label\">Points totaux</div>
            </div>
        </div>

        {# Médaille #}
        {% if medaille %}
            <div class=\"quiz-medal-badge\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                </svg>
                <div>
                    <div class=\"quiz-medal-title\">Médaille obtenue</div>
                    <div class=\"quiz-medal-name\">{{ medaille }}</div>
                </div>
            </div>
        {% endif %}

        {# Performance Message #}
        <div class=\"quiz-performance-message\">
            {% if percentage >= 80 %}
                <strong>Excellent !</strong> Vous maîtrisez très bien le sujet.
            {% elseif percentage >= 60 %}
                <strong>Très bien !</strong> Vous avez de bonnes connaissances.
            {% elseif percentage >= 40 %}
                <strong>Bien !</strong> Continuez à progresser.
            {% else %}
                <strong>Continuez !</strong> La pratique mène à la perfection.
            {% endif %}
        </div>

        {# Actions #}
        <div class=\"quiz-result-actions\">
            <a href=\"{{ path('app_mental') }}\" class=\"btn btn-primary\">
                <svg width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                    <polyline points=\"1 4 1 10 7 10\"/>
                    <path d=\"M3.51 15a9 9 0 1 0 2.13-9.36L1 10\"/>
                </svg>
                Choisir un autre quiz
            </a>
            <a href=\"{{ path('app_dashboard') }}\" class=\"btn btn-secondary\">
                Retour au dashboard
            </a>
        </div>
    </div>
</div>
{% endblock %}
", "mental/quiz/result.html.twig", "C:\\biosync_new\\templates\\mental\\quiz\\result.html.twig");
    }
}
