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

/* bo/mental/quiz/form.html.twig */
class __TwigTemplate_76b1faaf61288ed54d884c46b540d084 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "bo/mental/quiz/form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "bo/mental/quiz/form.html.twig"));

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

        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 3, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier") : ("Créer"));
        yield " Quiz - Admin";
        
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
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 8, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier un quiz") : ("Créer un nouveau quiz"));
        yield "</h1>
        <p class=\"page-subtitle\">";
        // line 9
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 9, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier les détails du quiz") : ("Créer un quiz mental pour un utilisateur"));
        yield "</p>
    </div>
</div>

<div class=\"form-layout\">
    <div class=\"form-main\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h4 class=\"card-title\">Informations du quiz</h4>
            </div>
            <div class=\"card-body\">
                <form method=\"post\">
                    ";
        // line 22
        yield "                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"titre\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <path d=\"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z\"/>
                                <polyline points=\"14 2 14 8 20 8\"/>
                            </svg>
                            Titre du quiz *
                        </label>
                        <input type=\"text\" 
                               id=\"titre\" 
                               name=\"titre\" 
                               class=\"form-control\" 
                               value=\"";
        // line 34
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "titre", [], "any", true, true, false, 34) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 34, $this->source); })()), "titre", [], "any", false, false, false, 34)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 34, $this->source); })()), "titre", [], "any", false, false, false, 34), "html", null, true)) : (""));
        yield "\" 
                               required 
                               placeholder=\"Ex: Mental Health Assessment - 04/02/2026\">
                        <small class=\"form-hint\">Titre descriptif du quiz</small>
                    </div>

                    ";
        // line 41
        yield "                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"utilisateur_id\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <path d=\"M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2\"/>
                                <circle cx=\"12\" cy=\"7\" r=\"4\"/>
                            </svg>
                            Utilisateur *
                        </label>
                        <select id=\"utilisateur_id\" name=\"utilisateur_id\" class=\"form-control\" required>
                            <option value=\"\">Sélectionner un utilisateur</option>
                            ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["utilisateurs"]) || array_key_exists("utilisateurs", $context) ? $context["utilisateurs"] : (function () { throw new RuntimeError('Variable "utilisateurs" does not exist.', 51, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["utilisateur"]) {
            // line 52
            yield "                                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "id", [], "any", false, false, false, 52), "html", null, true);
            yield "\" 
                                        ";
            // line 53
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 53, $this->source); })()), "utilisateur", [], "any", false, false, false, 53) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 53, $this->source); })()), "utilisateur", [], "any", false, false, false, 53), "id", [], "any", false, false, false, 53) == CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "id", [], "any", false, false, false, 53)))) ? ("selected") : (""));
            yield ">
                                    ";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "nomComplet", [], "any", false, false, false, 54), "html", null, true);
            yield " (";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "email", [], "any", false, false, false, 54), "html", null, true);
            yield ")
                                </option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['utilisateur'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        yield "                        </select>
                        <small class=\"form-hint\">L'utilisateur qui a passé ce quiz</small>
                    </div>

                    ";
        // line 62
        yield "                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"niveau_stress\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <path d=\"M22 12h-4l-3 9L9 3l-3 9H2\"/>
                            </svg>
                            Niveau de stress cible *
                        </label>
                        <input type=\"number\" 
                               id=\"niveau_stress\" 
                               name=\"niveau_stress\" 
                               class=\"form-control\" 
                               value=\"";
        // line 73
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "niveauStressCible", [], "any", true, true, false, 73) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 73, $this->source); })()), "niveauStressCible", [], "any", false, false, false, 73)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 73, $this->source); })()), "niveauStressCible", [], "any", false, false, false, 73), "html", null, true)) : (5));
        yield "\" 
                               min=\"1\" 
                               max=\"10\" 
                               required>
                        <small class=\"form-hint\">Sur une échelle de 1 (faible) à 10 (élevé)</small>
                    </div>

                    ";
        // line 81
        yield "                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"score\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                            </svg>
                            Score obtenu *
                        </label>
                        <input type=\"number\" 
                               id=\"score\" 
                               name=\"score\" 
                               class=\"form-control\" 
                               value=\"";
        // line 92
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["quiz"] ?? null), "scoreResultat", [], "any", true, true, false, 92) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 92, $this->source); })()), "scoreResultat", [], "any", false, false, false, 92)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 92, $this->source); })()), "scoreResultat", [], "any", false, false, false, 92), "html", null, true)) : (0));
        yield "\" 
                               min=\"0\" 
                               required>
                        <small class=\"form-hint\">Total des points obtenus</small>
                    </div>

                    ";
        // line 99
        yield "                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"medaille\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <circle cx=\"12\" cy=\"8\" r=\"6\"/>
                                <path d=\"M15.477 12.89 17 22l-5-3-5 3 1.523-9.11\"/>
                            </svg>
                            Médaille obtenue
                        </label>
                        <select id=\"medaille\" name=\"medaille\" class=\"form-control\">
                            <option value=\"\">Aucune médaille</option>
                            <option value=\"Expert Santé\" ";
        // line 109
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 109, $this->source); })()), "medailleQuiz", [], "any", false, false, false, 109) == "Expert Santé")) ? ("selected") : (""));
        yield ">Expert Santé</option>
                            <option value=\"Connaisseur\" ";
        // line 110
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 110, $this->source); })()), "medailleQuiz", [], "any", false, false, false, 110) == "Connaisseur")) ? ("selected") : (""));
        yield ">Connaisseur</option>
                            <option value=\"Apprenti\" ";
        // line 111
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 111, $this->source); })()), "medailleQuiz", [], "any", false, false, false, 111) == "Apprenti")) ? ("selected") : (""));
        yield ">Apprenti</option>
                        </select>
                        <small class=\"form-hint\">Médaille en fonction du score (optionnel)</small>
                    </div>

                    ";
        // line 117
        yield "                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"date_quiz\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                                <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                                <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                                <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                            </svg>
                            Date du quiz *
                        </label>
                        <input type=\"datetime-local\" 
                               id=\"date_quiz\" 
                               name=\"date_quiz\" 
                               class=\"form-control\" 
                               value=\"";
        // line 131
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 131, $this->source); })()), "dateQuiz", [], "any", false, false, false, 131)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 131, $this->source); })()), "dateQuiz", [], "any", false, false, false, 131), "Y-m-d\\TH:i"), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y-m-d\\TH:i"), "html", null, true)));
        yield "\" 
                               required>
                        <small class=\"form-hint\">Date et heure du passage du quiz</small>
                    </div>

                    ";
        // line 137
        yield "                    <div class=\"form-actions\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <polyline points=\"20 6 9 17 4 12\"/>
                            </svg>
                            ";
        // line 142
        yield (((($tmp = (isset($context["isEdit"]) || array_key_exists("isEdit", $context) ? $context["isEdit"] : (function () { throw new RuntimeError('Variable "isEdit" does not exist.', 142, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Enregistrer les modifications") : ("Créer le quiz"));
        yield "
                        </button>
                        <a href=\"";
        // line 144
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental_admin_quiz_list");
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
                <h4 class=\"card-title\">Aide</h4>
            </div>
            <div class=\"card-body\">
                <div class=\"info-item\">
                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                        <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                        <line x1=\"12\" y1=\"16\" x2=\"12\" y2=\"12\"/>
                        <line x1=\"12\" y1=\"8\" x2=\"12.01\" y2=\"8\"/>
                    </svg>
                    <div>
                        <strong>Quiz Mental</strong>
                        <p>Un quiz représente une session d'évaluation passée par un utilisateur.</p>
                    </div>
                </div>
                <div class=\"info-item\">
                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                        <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                    </svg>
                    <div>
                        <strong>Médailles</strong>
                        <p>Expert Santé (80%+), Connaisseur (60%+), Apprenti (40%+)</p>
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
        return "bo/mental/quiz/form.html.twig";
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
        return array (  298 => 144,  293 => 142,  286 => 137,  278 => 131,  262 => 117,  254 => 111,  250 => 110,  246 => 109,  234 => 99,  225 => 92,  212 => 81,  202 => 73,  189 => 62,  183 => 57,  172 => 54,  168 => 53,  163 => 52,  159 => 51,  147 => 41,  138 => 34,  124 => 22,  109 => 9,  105 => 8,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}{{ isEdit ? 'Modifier' : 'Créer' }} Quiz - Admin{% endblock %}

{% block body %}
<div class=\"page-header\">
    <div>
        <h1 class=\"page-title\">{{ isEdit ? 'Modifier un quiz' : 'Créer un nouveau quiz' }}</h1>
        <p class=\"page-subtitle\">{{ isEdit ? 'Modifier les détails du quiz' : 'Créer un quiz mental pour un utilisateur' }}</p>
    </div>
</div>

<div class=\"form-layout\">
    <div class=\"form-main\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h4 class=\"card-title\">Informations du quiz</h4>
            </div>
            <div class=\"card-body\">
                <form method=\"post\">
                    {# Titre du quiz #}
                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"titre\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <path d=\"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z\"/>
                                <polyline points=\"14 2 14 8 20 8\"/>
                            </svg>
                            Titre du quiz *
                        </label>
                        <input type=\"text\" 
                               id=\"titre\" 
                               name=\"titre\" 
                               class=\"form-control\" 
                               value=\"{{ quiz.titre ?? '' }}\" 
                               required 
                               placeholder=\"Ex: Mental Health Assessment - 04/02/2026\">
                        <small class=\"form-hint\">Titre descriptif du quiz</small>
                    </div>

                    {# Utilisateur #}
                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"utilisateur_id\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <path d=\"M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2\"/>
                                <circle cx=\"12\" cy=\"7\" r=\"4\"/>
                            </svg>
                            Utilisateur *
                        </label>
                        <select id=\"utilisateur_id\" name=\"utilisateur_id\" class=\"form-control\" required>
                            <option value=\"\">Sélectionner un utilisateur</option>
                            {% for utilisateur in utilisateurs %}
                                <option value=\"{{ utilisateur.id }}\" 
                                        {{ quiz.utilisateur and quiz.utilisateur.id == utilisateur.id ? 'selected' : '' }}>
                                    {{ utilisateur.nomComplet }} ({{ utilisateur.email }})
                                </option>
                            {% endfor %}
                        </select>
                        <small class=\"form-hint\">L'utilisateur qui a passé ce quiz</small>
                    </div>

                    {# Niveau de stress #}
                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"niveau_stress\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <path d=\"M22 12h-4l-3 9L9 3l-3 9H2\"/>
                            </svg>
                            Niveau de stress cible *
                        </label>
                        <input type=\"number\" 
                               id=\"niveau_stress\" 
                               name=\"niveau_stress\" 
                               class=\"form-control\" 
                               value=\"{{ quiz.niveauStressCible ?? 5 }}\" 
                               min=\"1\" 
                               max=\"10\" 
                               required>
                        <small class=\"form-hint\">Sur une échelle de 1 (faible) à 10 (élevé)</small>
                    </div>

                    {# Score #}
                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"score\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                            </svg>
                            Score obtenu *
                        </label>
                        <input type=\"number\" 
                               id=\"score\" 
                               name=\"score\" 
                               class=\"form-control\" 
                               value=\"{{ quiz.scoreResultat ?? 0 }}\" 
                               min=\"0\" 
                               required>
                        <small class=\"form-hint\">Total des points obtenus</small>
                    </div>

                    {# Médaille #}
                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"medaille\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <circle cx=\"12\" cy=\"8\" r=\"6\"/>
                                <path d=\"M15.477 12.89 17 22l-5-3-5 3 1.523-9.11\"/>
                            </svg>
                            Médaille obtenue
                        </label>
                        <select id=\"medaille\" name=\"medaille\" class=\"form-control\">
                            <option value=\"\">Aucune médaille</option>
                            <option value=\"Expert Santé\" {{ quiz.medailleQuiz == 'Expert Santé' ? 'selected' : '' }}>Expert Santé</option>
                            <option value=\"Connaisseur\" {{ quiz.medailleQuiz == 'Connaisseur' ? 'selected' : '' }}>Connaisseur</option>
                            <option value=\"Apprenti\" {{ quiz.medailleQuiz == 'Apprenti' ? 'selected' : '' }}>Apprenti</option>
                        </select>
                        <small class=\"form-hint\">Médaille en fonction du score (optionnel)</small>
                    </div>

                    {# Date du quiz #}
                    <div class=\"form-group\">
                        <label class=\"form-label\" for=\"date_quiz\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                                <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                                <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                                <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                            </svg>
                            Date du quiz *
                        </label>
                        <input type=\"datetime-local\" 
                               id=\"date_quiz\" 
                               name=\"date_quiz\" 
                               class=\"form-control\" 
                               value=\"{{ quiz.dateQuiz ? quiz.dateQuiz|date('Y-m-d\\\\TH:i') : 'now'|date('Y-m-d\\\\TH:i') }}\" 
                               required>
                        <small class=\"form-hint\">Date et heure du passage du quiz</small>
                    </div>

                    {# Actions #}
                    <div class=\"form-actions\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                <polyline points=\"20 6 9 17 4 12\"/>
                            </svg>
                            {{ isEdit ? 'Enregistrer les modifications' : 'Créer le quiz' }}
                        </button>
                        <a href=\"{{ path('app_mental_admin_quiz_list') }}\" class=\"btn btn-secondary\">
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
                <h4 class=\"card-title\">Aide</h4>
            </div>
            <div class=\"card-body\">
                <div class=\"info-item\">
                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                        <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                        <line x1=\"12\" y1=\"16\" x2=\"12\" y2=\"12\"/>
                        <line x1=\"12\" y1=\"8\" x2=\"12.01\" y2=\"8\"/>
                    </svg>
                    <div>
                        <strong>Quiz Mental</strong>
                        <p>Un quiz représente une session d'évaluation passée par un utilisateur.</p>
                    </div>
                </div>
                <div class=\"info-item\">
                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                        <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                    </svg>
                    <div>
                        <strong>Médailles</strong>
                        <p>Expert Santé (80%+), Connaisseur (60%+), Apprenti (40%+)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "bo/mental/quiz/form.html.twig", "C:\\biosync_new\\templates\\bo\\mental\\quiz\\form.html.twig");
    }
}
