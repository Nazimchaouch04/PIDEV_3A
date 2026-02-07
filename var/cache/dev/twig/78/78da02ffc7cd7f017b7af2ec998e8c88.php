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

/* sports/show.html.twig */
class __TwigTemplate_9005b8eb8b84dc2c2cba472c234a7971 extends Template
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
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sports/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sports/show.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["seance"]) || array_key_exists("seance", $context) ? $context["seance"] : (function () { throw new RuntimeError('Variable "seance" does not exist.', 3, $this->source); })()), "nomSeance", [], "any", false, false, false, 3), "html", null, true);
        yield " - BioSync";
        
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
        yield "<div class=\"app-layout\">
    ";
        // line 7
        yield from $this->load("partials/_sidebar.html.twig", 7)->unwrap()->yield(CoreExtension::merge($context, ["active" => "sports"]));
        // line 8
        yield "
    <main class=\"main-content\">
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["seance"]) || array_key_exists("seance", $context) ? $context["seance"] : (function () { throw new RuntimeError('Variable "seance" does not exist.', 12, $this->source); })()), "nomSeance", [], "any", false, false, false, 12), "html", null, true);
        yield "</h1>
                <p class=\"page-subtitle\">";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["seance"]) || array_key_exists("seance", $context) ? $context["seance"] : (function () { throw new RuntimeError('Variable "seance" does not exist.', 13, $this->source); })()), "dateSeance", [], "any", false, false, false, 13), "d/m/Y"), "html", null, true);
        yield " a ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["seance"]) || array_key_exists("seance", $context) ? $context["seance"] : (function () { throw new RuntimeError('Variable "seance" does not exist.', 13, $this->source); })()), "heureDebut", [], "any", false, false, false, 13), "H:i"), "html", null, true);
        yield "</p>
            </div>
            <div style=\"display: flex; gap: 0.5rem;\">
                <a href=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["seance"]) || array_key_exists("seance", $context) ? $context["seance"] : (function () { throw new RuntimeError('Variable "seance" does not exist.', 16, $this->source); })()), "id", [], "any", false, false, false, 16)]), "html", null, true);
        yield "\" class=\"btn btn-ghost\">Modifier</a>
                <a href=\"";
        // line 17
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports");
        yield "\" class=\"btn btn-secondary\">Retour</a>
            </div>
        </div>

        <div class=\"grid grid-cols-2 gap-6\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Details de la seance</h4>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Date</div>
                        <div class=\"list-item-title\">";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["seance"]) || array_key_exists("seance", $context) ? $context["seance"] : (function () { throw new RuntimeError('Variable "seance" does not exist.', 29, $this->source); })()), "dateSeance", [], "any", false, false, false, 29), "d/m/Y"), "html", null, true);
        yield "</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Heure de debut</div>
                        <div class=\"list-item-title\">";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["seance"]) || array_key_exists("seance", $context) ? $context["seance"] : (function () { throw new RuntimeError('Variable "seance" does not exist.', 35, $this->source); })()), "heureDebut", [], "any", false, false, false, 35), "H:i"), "html", null, true);
        yield "</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Duree</div>
                        <div class=\"list-item-title\">";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["seance"]) || array_key_exists("seance", $context) ? $context["seance"] : (function () { throw new RuntimeError('Variable "seance" does not exist.', 41, $this->source); })()), "dureeMinutes", [], "any", false, false, false, 41), "html", null, true);
        yield " minutes</div>
                    </div>
                </div>
                ";
        // line 44
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["seance"]) || array_key_exists("seance", $context) ? $context["seance"] : (function () { throw new RuntimeError('Variable "seance" does not exist.', 44, $this->source); })()), "medailleObtenue", [], "any", false, false, false, 44)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 45
            yield "                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Medaille</div>
                        <div class=\"list-item-title\">
                            <span class=\"badge badge-warning\">";
            // line 49
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["seance"]) || array_key_exists("seance", $context) ? $context["seance"] : (function () { throw new RuntimeError('Variable "seance" does not exist.', 49, $this->source); })()), "medailleObtenue", [], "any", false, false, false, 49), "html", null, true);
            yield "</span>
                        </div>
                    </div>
                </div>
                ";
        }
        // line 54
        yield "            </div>

            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Exercices (";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["seance"]) || array_key_exists("seance", $context) ? $context["seance"] : (function () { throw new RuntimeError('Variable "seance" does not exist.', 58, $this->source); })()), "exercices", [], "any", false, false, false, 58)), "html", null, true);
        yield ")</h4>
                </div>
                ";
        // line 60
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["seance"]) || array_key_exists("seance", $context) ? $context["seance"] : (function () { throw new RuntimeError('Variable "seance" does not exist.', 60, $this->source); })()), "exercices", [], "any", false, false, false, 60)) > 0)) {
            // line 61
            yield "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["seance"]) || array_key_exists("seance", $context) ? $context["seance"] : (function () { throw new RuntimeError('Variable "seance" does not exist.', 61, $this->source); })()), "exercices", [], "any", false, false, false, 61));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["exercice"]) {
                // line 62
                yield "                        <div class=\"list-item\">
                            <div class=\"list-item-icon\" style=\"background: rgba(54, 124, 254, 0.1); color: var(--secondary);\">
                                ";
                // line 64
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 64), "html", null, true);
                yield "
                            </div>
                            <div class=\"list-item-content\">
                                <div class=\"list-item-title\">";
                // line 67
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["exercice"], "nomExercice", [], "any", false, false, false, 67), "html", null, true);
                yield "</div>
                                <div class=\"list-item-subtitle\">";
                // line 68
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["exercice"], "intensite", [], "any", false, false, false, 68), "label", [], "any", false, false, false, 68), "html", null, true);
                yield " - ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["exercice"], "caloriesParMinute", [], "any", false, false, false, 68), "html", null, true);
                yield " cal/min</div>
                            </div>
                        </div>
                    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['exercice'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            yield "                ";
        } else {
            // line 73
            yield "                    <div class=\"empty-state\">
                        <p class=\"text-gray\">Aucun exercice enregistre pour cette seance</p>
                    </div>
                ";
        }
        // line 77
        yield "            </div>
        </div>
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
        return "sports/show.html.twig";
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
        return array (  257 => 77,  251 => 73,  248 => 72,  228 => 68,  224 => 67,  218 => 64,  214 => 62,  196 => 61,  194 => 60,  189 => 58,  183 => 54,  175 => 49,  169 => 45,  167 => 44,  161 => 41,  152 => 35,  143 => 29,  128 => 17,  124 => 16,  116 => 13,  112 => 12,  106 => 8,  104 => 7,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ seance.nomSeance }} - BioSync{% endblock %}

{% block body %}
<div class=\"app-layout\">
    {% include 'partials/_sidebar.html.twig' with {'active': 'sports'} %}

    <main class=\"main-content\">
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">{{ seance.nomSeance }}</h1>
                <p class=\"page-subtitle\">{{ seance.dateSeance|date('d/m/Y') }} a {{ seance.heureDebut|date('H:i') }}</p>
            </div>
            <div style=\"display: flex; gap: 0.5rem;\">
                <a href=\"{{ path('app_sports_edit', {id: seance.id}) }}\" class=\"btn btn-ghost\">Modifier</a>
                <a href=\"{{ path('app_sports') }}\" class=\"btn btn-secondary\">Retour</a>
            </div>
        </div>

        <div class=\"grid grid-cols-2 gap-6\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Details de la seance</h4>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Date</div>
                        <div class=\"list-item-title\">{{ seance.dateSeance|date('d/m/Y') }}</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Heure de debut</div>
                        <div class=\"list-item-title\">{{ seance.heureDebut|date('H:i') }}</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Duree</div>
                        <div class=\"list-item-title\">{{ seance.dureeMinutes }} minutes</div>
                    </div>
                </div>
                {% if seance.medailleObtenue %}
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Medaille</div>
                        <div class=\"list-item-title\">
                            <span class=\"badge badge-warning\">{{ seance.medailleObtenue }}</span>
                        </div>
                    </div>
                </div>
                {% endif %}
            </div>

            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Exercices ({{ seance.exercices|length }})</h4>
                </div>
                {% if seance.exercices|length > 0 %}
                    {% for exercice in seance.exercices %}
                        <div class=\"list-item\">
                            <div class=\"list-item-icon\" style=\"background: rgba(54, 124, 254, 0.1); color: var(--secondary);\">
                                {{ loop.index }}
                            </div>
                            <div class=\"list-item-content\">
                                <div class=\"list-item-title\">{{ exercice.nomExercice }}</div>
                                <div class=\"list-item-subtitle\">{{ exercice.intensite.label }} - {{ exercice.caloriesParMinute }} cal/min</div>
                            </div>
                        </div>
                    {% endfor %}
                {% else %}
                    <div class=\"empty-state\">
                        <p class=\"text-gray\">Aucun exercice enregistre pour cette seance</p>
                    </div>
                {% endif %}
            </div>
        </div>
    </main>
</div>
{% endblock %}
", "sports/show.html.twig", "C:\\biosync_new\\templates\\sports\\show.html.twig");
    }
}
