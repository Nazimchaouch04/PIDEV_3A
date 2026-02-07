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

/* mental/quiz/question.html.twig */
class __TwigTemplate_1e19d86e4e1692519f4c1b04c15b59d6 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mental/quiz/question.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mental/quiz/question.html.twig"));

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

        yield "Quiz Mental - Question ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((isset($context["currentIndex"]) || array_key_exists("currentIndex", $context) ? $context["currentIndex"] : (function () { throw new RuntimeError('Variable "currentIndex" does not exist.', 3, $this->source); })()) + 1), "html", null, true);
        yield "/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalQuestions"]) || array_key_exists("totalQuestions", $context) ? $context["totalQuestions"] : (function () { throw new RuntimeError('Variable "totalQuestions" does not exist.', 3, $this->source); })()), "html", null, true);
        
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
        yield "<div class=\"quiz-container\">
    ";
        // line 8
        yield "    <div class=\"quiz-progress-wrapper\">
        <div class=\"quiz-progress-info\">
            <span class=\"quiz-progress-text\">Question ";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((isset($context["currentIndex"]) || array_key_exists("currentIndex", $context) ? $context["currentIndex"] : (function () { throw new RuntimeError('Variable "currentIndex" does not exist.', 10, $this->source); })()) + 1), "html", null, true);
        yield " sur ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalQuestions"]) || array_key_exists("totalQuestions", $context) ? $context["totalQuestions"] : (function () { throw new RuntimeError('Variable "totalQuestions" does not exist.', 10, $this->source); })()), "html", null, true);
        yield "</span>
            <span class=\"quiz-progress-percent\">";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progress"]) || array_key_exists("progress", $context) ? $context["progress"] : (function () { throw new RuntimeError('Variable "progress" does not exist.', 11, $this->source); })()), "html", null, true);
        yield "%</span>
        </div>
        <div class=\"quiz-progress-bar\">
            <div class=\"quiz-progress-fill\" style=\"width: ";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progress"]) || array_key_exists("progress", $context) ? $context["progress"] : (function () { throw new RuntimeError('Variable "progress" does not exist.', 14, $this->source); })()), "html", null, true);
        yield "%\"></div>
        </div>
    </div>

    ";
        // line 19
        yield "    <div class=\"quiz-question-card\">
        <div class=\"quiz-question-header\">
            <div class=\"quiz-question-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                    <line x1=\"12\" y1=\"16\" x2=\"12\" y2=\"12\"/>
                    <line x1=\"12\" y1=\"8\" x2=\"12.01\" y2=\"8\"/>
                </svg>
            </div>
            <h2 class=\"quiz-question-title\">";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 28, $this->source); })()), "enonce", [], "any", false, false, false, 28), "html", null, true);
        yield "</h2>
        </div>

        <form method=\"post\" class=\"quiz-options-form\">
            ";
        // line 32
        $context["allOptions"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 32, $this->source); })()), "allOptions", [], "any", false, false, false, 32);
        // line 33
        yield "            <div class=\"quiz-options\">
                ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["allOptions"]) || array_key_exists("allOptions", $context) ? $context["allOptions"] : (function () { throw new RuntimeError('Variable "allOptions" does not exist.', 34, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 35
            yield "                    <label class=\"quiz-option\">
                        <input type=\"radio\" name=\"answer\" value=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["option"], "html", null, true);
            yield "\" required>
                        <div class=\"quiz-option-content\">
                            <div class=\"quiz-option-radio\"></div>
                            <span class=\"quiz-option-text\">";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["option"], "html", null, true);
            yield "</span>
                        </div>
                    </label>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['option'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        yield "            </div>

            <div class=\"quiz-actions\">
                <button type=\"submit\" class=\"btn btn-primary btn-lg\">
                    ";
        // line 47
        if ((((isset($context["currentIndex"]) || array_key_exists("currentIndex", $context) ? $context["currentIndex"] : (function () { throw new RuntimeError('Variable "currentIndex" does not exist.', 47, $this->source); })()) + 1) < (isset($context["totalQuestions"]) || array_key_exists("totalQuestions", $context) ? $context["totalQuestions"] : (function () { throw new RuntimeError('Variable "totalQuestions" does not exist.', 47, $this->source); })()))) {
            // line 48
            yield "                        Question suivante
                    ";
        } else {
            // line 50
            yield "                        Voir les résultats
                    ";
        }
        // line 52
        yield "                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                        <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
                        <polyline points=\"12 5 19 12 12 19\"/>
                    </svg>
                </button>
            </div>
        </form>
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
        return "mental/quiz/question.html.twig";
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
        return array (  191 => 52,  187 => 50,  183 => 48,  181 => 47,  175 => 43,  165 => 39,  159 => 36,  156 => 35,  152 => 34,  149 => 33,  147 => 32,  140 => 28,  129 => 19,  122 => 14,  116 => 11,  110 => 10,  106 => 8,  103 => 6,  90 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Quiz Mental - Question {{ currentIndex + 1 }}/{{ totalQuestions }}{% endblock %}

{% block body %}
<div class=\"quiz-container\">
    {# Progress Bar #}
    <div class=\"quiz-progress-wrapper\">
        <div class=\"quiz-progress-info\">
            <span class=\"quiz-progress-text\">Question {{ currentIndex + 1 }} sur {{ totalQuestions }}</span>
            <span class=\"quiz-progress-percent\">{{ progress }}%</span>
        </div>
        <div class=\"quiz-progress-bar\">
            <div class=\"quiz-progress-fill\" style=\"width: {{ progress }}%\"></div>
        </div>
    </div>

    {# Question Card #}
    <div class=\"quiz-question-card\">
        <div class=\"quiz-question-header\">
            <div class=\"quiz-question-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                    <line x1=\"12\" y1=\"16\" x2=\"12\" y2=\"12\"/>
                    <line x1=\"12\" y1=\"8\" x2=\"12.01\" y2=\"8\"/>
                </svg>
            </div>
            <h2 class=\"quiz-question-title\">{{ question.enonce }}</h2>
        </div>

        <form method=\"post\" class=\"quiz-options-form\">
            {% set allOptions = question.allOptions %}
            <div class=\"quiz-options\">
                {% for option in allOptions %}
                    <label class=\"quiz-option\">
                        <input type=\"radio\" name=\"answer\" value=\"{{ option }}\" required>
                        <div class=\"quiz-option-content\">
                            <div class=\"quiz-option-radio\"></div>
                            <span class=\"quiz-option-text\">{{ option }}</span>
                        </div>
                    </label>
                {% endfor %}
            </div>

            <div class=\"quiz-actions\">
                <button type=\"submit\" class=\"btn btn-primary btn-lg\">
                    {% if currentIndex + 1 < totalQuestions %}
                        Question suivante
                    {% else %}
                        Voir les résultats
                    {% endif %}
                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                        <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
                        <polyline points=\"12 5 19 12 12 19\"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>
{% endblock %}
", "mental/quiz/question.html.twig", "C:\\biosync_new\\templates\\mental\\quiz\\question.html.twig");
    }
}
