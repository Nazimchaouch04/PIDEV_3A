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

/* bo/mental/questions/form.html.twig */
class __TwigTemplate_230f135cf1f3d3f8e3c7568e2421804f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "bo/mental/questions/form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "bo/mental/questions/form.html.twig"));

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

        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 3, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier") : ("Nouvelle"));
        yield " Question - Admin";
        
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
        yield "<div class=\"page-header\">
    <div>
        <h1 class=\"page-title\">";
        // line 8
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 8, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier une question") : ("Nouvelle question"));
        yield "</h1>
        <p class=\"page-subtitle\">";
        // line 9
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 9, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier les détails de la question") : ("Créer une nouvelle question de quiz"));
        yield "</p>
    </div>
</div>

<div class=\"form-layout\">
    <div class=\"form-main\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h4 class=\"card-title\">Détails de la question</h4>
            </div>
            <div class=\"card-body\">
                <form method=\"post\">
                    ";
        // line 22
        yield "                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"enonce\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                                <line x1=\"12\" y1=\"16\" x2=\"12\" y2=\"12\"/>
                                <line x1=\"12\" y1=\"8\" x2=\"12.01\" y2=\"8\"/>
                            </svg>
                            Énoncé de la question *
                        </label>
                        <textarea id=\"enonce\" 
                                  name=\"enonce\" 
                                  class=\"form-control\" 
                                  rows=\"4\" 
                                  required 
                                  placeholder=\"Ex: Comment gérez-vous le stress quotidien?\"
                        >";
        // line 37
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["question"] ?? null), "enonce", [], "any", true, true, false, 37) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 37, $this->source); })()), "enonce", [], "any", false, false, false, 37)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 37, $this->source); })()), "enonce", [], "any", false, false, false, 37), "html", null, true)) : (""));
        yield "</textarea>
                        <small class=\"form-hint\">Formulez une question claire et concise</small>
                    </div>

                    ";
        // line 42
        yield "                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"reponse_correcte\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <polyline points=\"20 6 9 17 4 12\"/>
                            </svg>
                            Réponse correcte *
                        </label>
                        <input type=\"text\" 
                               id=\"reponse_correcte\" 
                               name=\"reponse_correcte\" 
                               class=\"form-control\" 
                               value=\"";
        // line 53
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["question"] ?? null), "reponseCorrecte", [], "any", true, true, false, 53) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 53, $this->source); })()), "reponseCorrecte", [], "any", false, false, false, 53)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 53, $this->source); })()), "reponseCorrecte", [], "any", false, false, false, 53), "html", null, true)) : (""));
        yield "\" 
                               required 
                               placeholder=\"Ex: Je pratique la méditation\">
                        <small class=\"form-hint\">La bonne réponse à la question</small>
                    </div>

                    ";
        // line 60
        yield "                    <div class=\"form-group\">
                        <label class=\"form-label\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <line x1=\"18\" y1=\"6\" x2=\"6\" y2=\"18\"/>
                                <line x1=\"6\" y1=\"6\" x2=\"18\" y2=\"18\"/>
                            </svg>
                            Options incorrectes *
                        </label>
                        ";
        // line 68
        $context["options"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["question"] ?? null), "optionsFaussesArray", [], "any", true, true, false, 68) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 68, $this->source); })()), "optionsFaussesArray", [], "any", false, false, false, 68)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 68, $this->source); })()), "optionsFaussesArray", [], "any", false, false, false, 68)) : (["", "", ""]));
        // line 69
        yield "                        <input type=\"text\" 
                               name=\"option_1\" 
                               class=\"form-control mb-2\" 
                               value=\"";
        // line 72
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), 0, [], "array", true, true, false, 72) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 72, $this->source); })()), 0, [], "array", false, false, false, 72)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 72, $this->source); })()), 0, [], "array", false, false, false, 72), "html", null, true)) : (""));
        yield "\" 
                               placeholder=\"Option incorrecte 1\">
                        <input type=\"text\" 
                               name=\"option_2\" 
                               class=\"form-control mb-2\" 
                               value=\"";
        // line 77
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), 1, [], "array", true, true, false, 77) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 77, $this->source); })()), 1, [], "array", false, false, false, 77)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 77, $this->source); })()), 1, [], "array", false, false, false, 77), "html", null, true)) : (""));
        yield "\" 
                               placeholder=\"Option incorrecte 2\">
                        <input type=\"text\" 
                               name=\"option_3\" 
                               class=\"form-control\" 
                               value=\"";
        // line 82
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), 2, [], "array", true, true, false, 82) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 82, $this->source); })()), 2, [], "array", false, false, false, 82)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 82, $this->source); })()), 2, [], "array", false, false, false, 82), "html", null, true)) : (""));
        yield "\" 
                               placeholder=\"Option incorrecte 3\">
                        <small class=\"form-hint\">Fournissez 2 à 3 options incorrectes</small>
                    </div>

                    ";
        // line 88
        yield "                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"points_valeur\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                            </svg>
                            Points *
                        </label>
                        <input type=\"number\" 
                               id=\"points_valeur\" 
                               name=\"points_valeur\" 
                               class=\"form-control\" 
                               value=\"";
        // line 99
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["question"] ?? null), "pointsValeur", [], "any", true, true, false, 99) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 99, $this->source); })()), "pointsValeur", [], "any", false, false, false, 99)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 99, $this->source); })()), "pointsValeur", [], "any", false, false, false, 99), "html", null, true)) : (10));
        yield "\" 
                               min=\"1\" 
                               max=\"100\" 
                               required>
                        <small class=\"form-hint\">Points attribués pour une bonne réponse</small>
                    </div>

                    ";
        // line 107
        yield "                    <div class=\"form-actions\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <polyline points=\"20 6 9 17 4 12\"/>
                            </svg>
                            ";
        // line 112
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 112, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Enregistrer les modifications") : ("Créer la question"));
        yield "
                        </button>
                        <a href=\"";
        // line 114
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental_admin_questions");
        yield "\" class=\"btn btn-secondary\">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class=\"form-sidebar\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h4 class=\"card-title\">Informations</h4>
            </div>
            <div class=\"card-body\">
                <div class=\"info-item\">
                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                        <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                        <line x1=\"12\" y1=\"16\" x2=\"12\" y2=\"12\"/>
                        <line x1=\"12\" y1=\"8\" x2=\"12.01\" y2=\"8\"/>
                    </svg>
                    <div>
                        <strong>Structure du quiz</strong>
                        <p>Chaque question est composée d'un énoncé, d'une réponse correcte et de 2-3 options incorrectes.</p>
                    </div>
                </div>
                <div class=\"info-item\">
                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                        <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                    </svg>
                    <div>
                        <strong>Système de points</strong>
                        <p>Attribuez plus de points aux questions plus difficiles ou importantes.</p>
                    </div>
                </div>
            </div>
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
        return "bo/mental/questions/form.html.twig";
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
        return array (  246 => 114,  241 => 112,  234 => 107,  224 => 99,  211 => 88,  203 => 82,  195 => 77,  187 => 72,  182 => 69,  180 => 68,  170 => 60,  161 => 53,  148 => 42,  141 => 37,  124 => 22,  109 => 9,  105 => 8,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}{{ isEdit ? 'Modifier' : 'Nouvelle' }} Question - Admin{% endblock %}

{% block body %}
<div class=\"page-header\">
    <div>
        <h1 class=\"page-title\">{{ isEdit ? 'Modifier une question' : 'Nouvelle question' }}</h1>
        <p class=\"page-subtitle\">{{ isEdit ? 'Modifier les détails de la question' : 'Créer une nouvelle question de quiz' }}</p>
    </div>
</div>

<div class=\"form-layout\">
    <div class=\"form-main\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h4 class=\"card-title\">Détails de la question</h4>
            </div>
            <div class=\"card-body\">
                <form method=\"post\">
                    {# Énoncé de la question #}
                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"enonce\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                                <line x1=\"12\" y1=\"16\" x2=\"12\" y2=\"12\"/>
                                <line x1=\"12\" y1=\"8\" x2=\"12.01\" y2=\"8\"/>
                            </svg>
                            Énoncé de la question *
                        </label>
                        <textarea id=\"enonce\" 
                                  name=\"enonce\" 
                                  class=\"form-control\" 
                                  rows=\"4\" 
                                  required 
                                  placeholder=\"Ex: Comment gérez-vous le stress quotidien?\"
                        >{{ question.enonce ?? '' }}</textarea>
                        <small class=\"form-hint\">Formulez une question claire et concise</small>
                    </div>

                    {# Réponse correcte #}
                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"reponse_correcte\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <polyline points=\"20 6 9 17 4 12\"/>
                            </svg>
                            Réponse correcte *
                        </label>
                        <input type=\"text\" 
                               id=\"reponse_correcte\" 
                               name=\"reponse_correcte\" 
                               class=\"form-control\" 
                               value=\"{{ question.reponseCorrecte ?? '' }}\" 
                               required 
                               placeholder=\"Ex: Je pratique la méditation\">
                        <small class=\"form-hint\">La bonne réponse à la question</small>
                    </div>

                    {# Options fausses #}
                    <div class=\"form-group\">
                        <label class=\"form-label\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <line x1=\"18\" y1=\"6\" x2=\"6\" y2=\"18\"/>
                                <line x1=\"6\" y1=\"6\" x2=\"18\" y2=\"18\"/>
                            </svg>
                            Options incorrectes *
                        </label>
                        {% set options = question.optionsFaussesArray ?? ['', '', ''] %}
                        <input type=\"text\" 
                               name=\"option_1\" 
                               class=\"form-control mb-2\" 
                               value=\"{{ options[0] ?? '' }}\" 
                               placeholder=\"Option incorrecte 1\">
                        <input type=\"text\" 
                               name=\"option_2\" 
                               class=\"form-control mb-2\" 
                               value=\"{{ options[1] ?? '' }}\" 
                               placeholder=\"Option incorrecte 2\">
                        <input type=\"text\" 
                               name=\"option_3\" 
                               class=\"form-control\" 
                               value=\"{{ options[2] ?? '' }}\" 
                               placeholder=\"Option incorrecte 3\">
                        <small class=\"form-hint\">Fournissez 2 à 3 options incorrectes</small>
                    </div>

                    {# Points #}
                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"points_valeur\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                            </svg>
                            Points *
                        </label>
                        <input type=\"number\" 
                               id=\"points_valeur\" 
                               name=\"points_valeur\" 
                               class=\"form-control\" 
                               value=\"{{ question.pointsValeur ?? 10 }}\" 
                               min=\"1\" 
                               max=\"100\" 
                               required>
                        <small class=\"form-hint\">Points attribués pour une bonne réponse</small>
                    </div>

                    {# Actions #}
                    <div class=\"form-actions\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <polyline points=\"20 6 9 17 4 12\"/>
                            </svg>
                            {{ isEdit ? 'Enregistrer les modifications' : 'Créer la question' }}
                        </button>
                        <a href=\"{{ path('app_mental_admin_questions') }}\" class=\"btn btn-secondary\">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class=\"form-sidebar\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h4 class=\"card-title\">Informations</h4>
            </div>
            <div class=\"card-body\">
                <div class=\"info-item\">
                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                        <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                        <line x1=\"12\" y1=\"16\" x2=\"12\" y2=\"12\"/>
                        <line x1=\"12\" y1=\"8\" x2=\"12.01\" y2=\"8\"/>
                    </svg>
                    <div>
                        <strong>Structure du quiz</strong>
                        <p>Chaque question est composée d'un énoncé, d'une réponse correcte et de 2-3 options incorrectes.</p>
                    </div>
                </div>
                <div class=\"info-item\">
                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                        <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                    </svg>
                    <div>
                        <strong>Système de points</strong>
                        <p>Attribuez plus de points aux questions plus difficiles ou importantes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "bo/mental/questions/form.html.twig", "C:\\biosync_new\\templates\\bo\\mental\\questions\\form.html.twig");
    }
}
