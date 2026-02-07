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

/* mental/index.html.twig */
class __TwigTemplate_df6e638e6da7f7178710ba433e6686f2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mental/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mental/index.html.twig"));

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

        yield "Mental Wellness - BioSync";
        
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
        yield "<div class=\"mental-wellness-page\">
    ";
        // line 8
        yield "    <div class=\"page-header-mental\">
        <h1 class=\"page-title-mental\">Mental Wellness</h1>
        <p class=\"page-subtitle-mental\">Choisissez un quiz thématique pour évaluer votre bien-être mental</p>
    </div>

    ";
        // line 14
        yield "    ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["quizzesDisponibles"]) || array_key_exists("quizzesDisponibles", $context) ? $context["quizzesDisponibles"] : (function () { throw new RuntimeError('Variable "quizzesDisponibles" does not exist.', 14, $this->source); })())) > 0)) {
            // line 15
            yield "    <div class=\"quiz-available-section\">
        <h2 class=\"section-title\">Quiz Disponibles</h2>
        <p class=\"section-subtitle\">Quiz créés pour vous par votre coach</p>
        
        <div class=\"quiz-selection-grid\">
            ";
            // line 20
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["quizzesDisponibles"]) || array_key_exists("quizzesDisponibles", $context) ? $context["quizzesDisponibles"] : (function () { throw new RuntimeError('Variable "quizzesDisponibles" does not exist.', 20, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["quiz"]) {
                // line 21
                yield "            <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental_quiz_start", ["quizId" => CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "id", [], "any", false, false, false, 21)]), "html", null, true);
                yield "\" class=\"quiz-theme-card\">
                <div class=\"quiz-theme-icon\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z\"/>
                        <polyline points=\"14 2 14 8 20 8\"/>
                    </svg>
                </div>
                <h3 class=\"quiz-theme-title\">";
                // line 28
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 28), "html", null, true);
                yield "</h3>
                <p class=\"quiz-theme-desc\">Niveau de stress cible : ";
                // line 29
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "niveauStressCible", [], "any", false, false, false, 29), "html", null, true);
                yield "/10</p>
                <div class=\"quiz-theme-meta\">
                    <span class=\"quiz-duration\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                            <polyline points=\"12 6 12 12 16 14\"/>
                        </svg>
                        ";
                // line 36
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "questions", [], "any", false, false, false, 36)) > 0)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "questions", [], "any", false, false, false, 36)) * 2), "html", null, true)) : (5));
                yield " min
                    </span>
                    <span class=\"quiz-questions\">";
                // line 38
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "questions", [], "any", false, false, false, 38)) > 0)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "questions", [], "any", false, false, false, 38)), "html", null, true)) : ("5"));
                yield " questions</span>
                </div>
            </a>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['quiz'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            yield "        </div>
    </div>
    ";
        } else {
            // line 45
            yield "    <div class=\"empty-section\">
        <svg width=\"80\" height=\"80\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#CBD5E1\" stroke-width=\"2\">
            <circle cx=\"12\" cy=\"12\" r=\"10\"/>
            <line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"12\"/>
            <line x1=\"12\" y1=\"16\" x2=\"12.01\" y2=\"16\"/>
        </svg>
        <h3>Aucun quiz disponible</h3>
        <p>Votre coach n'a pas encore créé de quiz pour vous</p>
    </div>
    ";
        }
        // line 55
        yield "
    ";
        // line 57
        yield "    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["achievements"]) || array_key_exists("achievements", $context) ? $context["achievements"] : (function () { throw new RuntimeError('Variable "achievements" does not exist.', 57, $this->source); })()), "total_quiz", [], "any", false, false, false, 57) > 0)) {
            // line 58
            yield "    <div class=\"achievements-section\">
        <h2 class=\"achievements-title\">Vos Réussites</h2>
        
        <div class=\"achievements-grid\">
            ";
            // line 63
            yield "            <div class=\"achievement-badge ";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["achievements"]) || array_key_exists("achievements", $context) ? $context["achievements"] : (function () { throw new RuntimeError('Variable "achievements" does not exist.', 63, $this->source); })()), "has_expert", [], "any", false, false, false, 63)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("completed") : ("locked"));
            yield "\">
                <div class=\"achievement-icon zen\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M6 9H4.5a2.5 2.5 0 0 1 0-5H6\"/>
                        <path d=\"M18 9h1.5a2.5 2.5 0 0 0 0-5H18\"/>
                        <path d=\"M4 22h16\"/>
                        <path d=\"M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22\"/>
                        <path d=\"M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22\"/>
                        <path d=\"M18 2H6v7a6 6 0 0 0 12 0V2Z\"/>
                    </svg>
                </div>
                <div class=\"achievement-info\">
                    <h3 class=\"achievement-name\">Expert Santé ";
            // line 75
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["achievements"]) || array_key_exists("achievements", $context) ? $context["achievements"] : (function () { throw new RuntimeError('Variable "achievements" does not exist.', 75, $this->source); })()), "has_expert", [], "any", false, false, false, 75)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("✓") : (""));
            yield "</h3>
                    <p class=\"achievement-desc\">Obtenir 80% ou plus à un quiz</p>
                </div>
            </div>

            ";
            // line 81
            yield "            <div class=\"achievement-badge ";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["achievements"]) || array_key_exists("achievements", $context) ? $context["achievements"] : (function () { throw new RuntimeError('Variable "achievements" does not exist.', 81, $this->source); })()), "has_connaisseur", [], "any", false, false, false, 81)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("completed") : ("locked"));
            yield "\">
                <div class=\"achievement-icon mindful\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <circle cx=\"12\" cy=\"8\" r=\"6\"/>
                        <path d=\"M15.477 12.89 17 22l-5-3-5 3 1.523-9.11\"/>
                    </svg>
                </div>
                <div class=\"achievement-info\">
                    <h3 class=\"achievement-name\">Connaisseur ";
            // line 89
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["achievements"]) || array_key_exists("achievements", $context) ? $context["achievements"] : (function () { throw new RuntimeError('Variable "achievements" does not exist.', 89, $this->source); })()), "has_connaisseur", [], "any", false, false, false, 89)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("✓") : (""));
            yield "</h3>
                    <p class=\"achievement-desc\">Obtenir 60% ou plus à un quiz</p>
                </div>
            </div>

            ";
            // line 95
            yield "            <div class=\"achievement-badge ";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["achievements"]) || array_key_exists("achievements", $context) ? $context["achievements"] : (function () { throw new RuntimeError('Variable "achievements" does not exist.', 95, $this->source); })()), "has_apprenti", [], "any", false, false, false, 95)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("completed") : ("locked"));
            yield "\">
                <div class=\"achievement-icon stress\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                    </svg>
                </div>
                <div class=\"achievement-info\">
                    <h3 class=\"achievement-name\">Apprenti ";
            // line 102
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["achievements"]) || array_key_exists("achievements", $context) ? $context["achievements"] : (function () { throw new RuntimeError('Variable "achievements" does not exist.', 102, $this->source); })()), "has_apprenti", [], "any", false, false, false, 102)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("✓") : (""));
            yield "</h3>
                    <p class=\"achievement-desc\">Obtenir 40% ou plus à un quiz</p>
                </div>
            </div>

            ";
            // line 108
            yield "            <div class=\"achievement-badge ";
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["achievements"]) || array_key_exists("achievements", $context) ? $context["achievements"] : (function () { throw new RuntimeError('Variable "achievements" does not exist.', 108, $this->source); })()), "total_quiz", [], "any", false, false, false, 108) >= 5)) ? ("completed") : ("locked"));
            yield "\">
                <div class=\"achievement-icon selfcare\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z\"/>
                        <polyline points=\"14 2 14 8 20 8\"/>
                    </svg>
                </div>
                <div class=\"achievement-info\">
                    <h3 class=\"achievement-name\">Quiz Master ";
            // line 116
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["achievements"]) || array_key_exists("achievements", $context) ? $context["achievements"] : (function () { throw new RuntimeError('Variable "achievements" does not exist.', 116, $this->source); })()), "total_quiz", [], "any", false, false, false, 116) >= 5)) ? ("✓") : (""));
            yield "</h3>
                    <p class=\"achievement-desc\">Compléter 5 quiz (";
            // line 117
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["achievements"]) || array_key_exists("achievements", $context) ? $context["achievements"] : (function () { throw new RuntimeError('Variable "achievements" does not exist.', 117, $this->source); })()), "total_quiz", [], "any", false, false, false, 117), "html", null, true);
            yield "/5)</p>
                </div>
            </div>
        </div>
    </div>
    ";
        }
        // line 123
        yield "
    ";
        // line 125
        yield "    ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["quizzesPasses"]) || array_key_exists("quizzesPasses", $context) ? $context["quizzesPasses"] : (function () { throw new RuntimeError('Variable "quizzesPasses" does not exist.', 125, $this->source); })())) > 0)) {
            // line 126
            yield "    <div class=\"quiz-history-section\">
        <h2 class=\"quiz-history-title\">Historique de vos Quiz Passés</h2>
        
        <div class=\"quiz-history-list\">
            ";
            // line 130
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["quizzesPasses"]) || array_key_exists("quizzesPasses", $context) ? $context["quizzesPasses"] : (function () { throw new RuntimeError('Variable "quizzesPasses" does not exist.', 130, $this->source); })()), 0, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["quiz"]) {
                // line 131
                yield "            <div class=\"quiz-history-item\">
                <div class=\"quiz-history-icon\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                        <polyline points=\"12 6 12 12 16 14\"/>
                    </svg>
                </div>
                <div class=\"quiz-history-content\">
                    <h4 class=\"quiz-history-name\">";
                // line 139
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "titre", [], "any", false, false, false, 139), "html", null, true);
                yield "</h4>
                    <p class=\"quiz-history-date\">";
                // line 140
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "dateQuiz", [], "any", false, false, false, 140), "d/m/Y à H:i"), "html", null, true);
                yield "</p>
                </div>
                <div class=\"quiz-history-score\">
                    <span class=\"score-value\">";
                // line 143
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "scoreResultat", [], "any", false, false, false, 143), "html", null, true);
                yield " pts</span>
                    ";
                // line 144
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "medailleQuiz", [], "any", false, false, false, 144)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 145
                    yield "                        <span class=\"quiz-medaille\">🏆 ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["quiz"], "medailleQuiz", [], "any", false, false, false, 145), "html", null, true);
                    yield "</span>
                    ";
                }
                // line 147
                yield "                </div>
            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['quiz'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 150
            yield "        </div>

        ";
            // line 152
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["quizzesPasses"]) || array_key_exists("quizzesPasses", $context) ? $context["quizzesPasses"] : (function () { throw new RuntimeError('Variable "quizzesPasses" does not exist.', 152, $this->source); })())) > 5)) {
                // line 153
                yield "        <div class=\"quiz-history-footer\">
            <p class=\"text-gray\">";
                // line 154
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["quizzesPasses"]) || array_key_exists("quizzesPasses", $context) ? $context["quizzesPasses"] : (function () { throw new RuntimeError('Variable "quizzesPasses" does not exist.', 154, $this->source); })())) - 5), "html", null, true);
                yield " autre(s) quiz non affichés</p>
        </div>
        ";
            }
            // line 157
            yield "    </div>
    ";
        }
        // line 159
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
        return "mental/index.html.twig";
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
        return array (  356 => 159,  352 => 157,  346 => 154,  343 => 153,  341 => 152,  337 => 150,  329 => 147,  323 => 145,  321 => 144,  317 => 143,  311 => 140,  307 => 139,  297 => 131,  293 => 130,  287 => 126,  284 => 125,  281 => 123,  272 => 117,  268 => 116,  256 => 108,  248 => 102,  237 => 95,  229 => 89,  217 => 81,  209 => 75,  193 => 63,  187 => 58,  184 => 57,  181 => 55,  169 => 45,  164 => 42,  154 => 38,  149 => 36,  139 => 29,  135 => 28,  124 => 21,  120 => 20,  113 => 15,  110 => 14,  103 => 8,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Mental Wellness - BioSync{% endblock %}

{% block body %}
<div class=\"mental-wellness-page\">
    {# Page Header #}
    <div class=\"page-header-mental\">
        <h1 class=\"page-title-mental\">Mental Wellness</h1>
        <p class=\"page-subtitle-mental\">Choisissez un quiz thématique pour évaluer votre bien-être mental</p>
    </div>

    {# Quiz Disponibles créés par l'admin #}
    {% if quizzesDisponibles|length > 0 %}
    <div class=\"quiz-available-section\">
        <h2 class=\"section-title\">Quiz Disponibles</h2>
        <p class=\"section-subtitle\">Quiz créés pour vous par votre coach</p>
        
        <div class=\"quiz-selection-grid\">
            {% for quiz in quizzesDisponibles %}
            <a href=\"{{ path('app_mental_quiz_start', {quizId: quiz.id}) }}\" class=\"quiz-theme-card\">
                <div class=\"quiz-theme-icon\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z\"/>
                        <polyline points=\"14 2 14 8 20 8\"/>
                    </svg>
                </div>
                <h3 class=\"quiz-theme-title\">{{ quiz.titre }}</h3>
                <p class=\"quiz-theme-desc\">Niveau de stress cible : {{ quiz.niveauStressCible }}/10</p>
                <div class=\"quiz-theme-meta\">
                    <span class=\"quiz-duration\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                            <polyline points=\"12 6 12 12 16 14\"/>
                        </svg>
                        {{ quiz.questions|length > 0 ? (quiz.questions|length * 2) : 5 }} min
                    </span>
                    <span class=\"quiz-questions\">{{ quiz.questions|length > 0 ? quiz.questions|length : '5' }} questions</span>
                </div>
            </a>
            {% endfor %}
        </div>
    </div>
    {% else %}
    <div class=\"empty-section\">
        <svg width=\"80\" height=\"80\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#CBD5E1\" stroke-width=\"2\">
            <circle cx=\"12\" cy=\"12\" r=\"10\"/>
            <line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"12\"/>
            <line x1=\"12\" y1=\"16\" x2=\"12.01\" y2=\"16\"/>
        </svg>
        <h3>Aucun quiz disponible</h3>
        <p>Votre coach n'a pas encore créé de quiz pour vous</p>
    </div>
    {% endif %}

    {# Your Achievements #}
    {% if achievements.total_quiz > 0 %}
    <div class=\"achievements-section\">
        <h2 class=\"achievements-title\">Vos Réussites</h2>
        
        <div class=\"achievements-grid\">
            {# Achievement Badge - Expert Santé #}
            <div class=\"achievement-badge {{ achievements.has_expert ? 'completed' : 'locked' }}\">
                <div class=\"achievement-icon zen\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M6 9H4.5a2.5 2.5 0 0 1 0-5H6\"/>
                        <path d=\"M18 9h1.5a2.5 2.5 0 0 0 0-5H18\"/>
                        <path d=\"M4 22h16\"/>
                        <path d=\"M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22\"/>
                        <path d=\"M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22\"/>
                        <path d=\"M18 2H6v7a6 6 0 0 0 12 0V2Z\"/>
                    </svg>
                </div>
                <div class=\"achievement-info\">
                    <h3 class=\"achievement-name\">Expert Santé {{ achievements.has_expert ? '✓' : '' }}</h3>
                    <p class=\"achievement-desc\">Obtenir 80% ou plus à un quiz</p>
                </div>
            </div>

            {# Achievement Badge - Connaisseur #}
            <div class=\"achievement-badge {{ achievements.has_connaisseur ? 'completed' : 'locked' }}\">
                <div class=\"achievement-icon mindful\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <circle cx=\"12\" cy=\"8\" r=\"6\"/>
                        <path d=\"M15.477 12.89 17 22l-5-3-5 3 1.523-9.11\"/>
                    </svg>
                </div>
                <div class=\"achievement-info\">
                    <h3 class=\"achievement-name\">Connaisseur {{ achievements.has_connaisseur ? '✓' : '' }}</h3>
                    <p class=\"achievement-desc\">Obtenir 60% ou plus à un quiz</p>
                </div>
            </div>

            {# Achievement Badge - Apprenti #}
            <div class=\"achievement-badge {{ achievements.has_apprenti ? 'completed' : 'locked' }}\">
                <div class=\"achievement-icon stress\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                    </svg>
                </div>
                <div class=\"achievement-info\">
                    <h3 class=\"achievement-name\">Apprenti {{ achievements.has_apprenti ? '✓' : '' }}</h3>
                    <p class=\"achievement-desc\">Obtenir 40% ou plus à un quiz</p>
                </div>
            </div>

            {# Achievement Badge - Quiz Master #}
            <div class=\"achievement-badge {{ achievements.total_quiz >= 5 ? 'completed' : 'locked' }}\">
                <div class=\"achievement-icon selfcare\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z\"/>
                        <polyline points=\"14 2 14 8 20 8\"/>
                    </svg>
                </div>
                <div class=\"achievement-info\">
                    <h3 class=\"achievement-name\">Quiz Master {{ achievements.total_quiz >= 5 ? '✓' : '' }}</h3>
                    <p class=\"achievement-desc\">Compléter 5 quiz ({{ achievements.total_quiz }}/5)</p>
                </div>
            </div>
        </div>
    </div>
    {% endif %}

    {# Quiz History - Quiz passés uniquement #}
    {% if quizzesPasses|length > 0 %}
    <div class=\"quiz-history-section\">
        <h2 class=\"quiz-history-title\">Historique de vos Quiz Passés</h2>
        
        <div class=\"quiz-history-list\">
            {% for quiz in quizzesPasses|slice(0, 5) %}
            <div class=\"quiz-history-item\">
                <div class=\"quiz-history-icon\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                        <polyline points=\"12 6 12 12 16 14\"/>
                    </svg>
                </div>
                <div class=\"quiz-history-content\">
                    <h4 class=\"quiz-history-name\">{{ quiz.titre }}</h4>
                    <p class=\"quiz-history-date\">{{ quiz.dateQuiz|date('d/m/Y à H:i') }}</p>
                </div>
                <div class=\"quiz-history-score\">
                    <span class=\"score-value\">{{ quiz.scoreResultat }} pts</span>
                    {% if quiz.medailleQuiz %}
                        <span class=\"quiz-medaille\">🏆 {{ quiz.medailleQuiz }}</span>
                    {% endif %}
                </div>
            </div>
            {% endfor %}
        </div>

        {% if quizzesPasses|length > 5 %}
        <div class=\"quiz-history-footer\">
            <p class=\"text-gray\">{{ quizzesPasses|length - 5 }} autre(s) quiz non affichés</p>
        </div>
        {% endif %}
    </div>
    {% endif %}
</div>
{% endblock %}
", "mental/index.html.twig", "C:\\biosync_new\\templates\\mental\\index.html.twig");
    }
}
