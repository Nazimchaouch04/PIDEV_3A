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

/* nutrition/show.html.twig */
class __TwigTemplate_8616cbfdb9c43bb10d8840fe6ed2fe7c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "nutrition/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "nutrition/show.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 3, $this->source); })()), "titreRepas", [], "any", false, false, false, 3), "html", null, true);
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
        yield from $this->load("partials/_sidebar.html.twig", 7)->unwrap()->yield(CoreExtension::merge($context, ["active" => "nutrition"]));
        // line 8
        yield "
    <main class=\"main-content\">
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 12, $this->source); })()), "titreRepas", [], "any", false, false, false, 12), "html", null, true);
        yield "</h1>
                <p class=\"page-subtitle\">";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 13, $this->source); })()), "typeMoment", [], "any", false, false, false, 13), "label", [], "any", false, false, false, 13), "html", null, true);
        yield " - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 13, $this->source); })()), "dateConsommation", [], "any", false, false, false, 13), "d/m/Y H:i"), "html", null, true);
        yield "</p>
            </div>
            <div style=\"display: flex; gap: 0.5rem;\">
                <a href=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_nutrition_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 16, $this->source); })()), "id", [], "any", false, false, false, 16)]), "html", null, true);
        yield "\" class=\"btn btn-ghost\">Modifier</a>
                <a href=\"";
        // line 17
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_nutrition");
        yield "\" class=\"btn btn-primary\">Retour</a>
            </div>
        </div>

        <div class=\"grid grid-cols-2 gap-6\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Details du repas</h4>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Moment</div>
                        <div class=\"list-item-title\">";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 29, $this->source); })()), "typeMoment", [], "any", false, false, false, 29), "label", [], "any", false, false, false, 29), "html", null, true);
        yield "</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Date</div>
                        <div class=\"list-item-title\">";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 35, $this->source); })()), "dateConsommation", [], "any", false, false, false, 35), "d/m/Y H:i"), "html", null, true);
        yield "</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Total Calories</div>
                        <div class=\"list-item-title\">";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 41, $this->source); })()), "totalCalories", [], "any", false, false, false, 41), "html", null, true);
        yield " cal</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Points gagnes</div>
                        <div class=\"list-item-title\">";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 47, $this->source); })()), "pointsGagnes", [], "any", false, false, false, 47), "html", null, true);
        yield " points</div>
                    </div>
                </div>
            </div>

            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Aliments (";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 54, $this->source); })()), "aliments", [], "any", false, false, false, 54)), "html", null, true);
        yield ")</h4>
                </div>
                ";
        // line 56
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 56, $this->source); })()), "aliments", [], "any", false, false, false, 56)) > 0)) {
            // line 57
            yield "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 57, $this->source); })()), "aliments", [], "any", false, false, false, 57));
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
            foreach ($context['_seq'] as $context["_key"] => $context["aliment"]) {
                // line 58
                yield "                        <div class=\"list-item\">
                            <div class=\"list-item-icon\" style=\"background: rgba(110, 197, 166, 0.1); color: var(--primary);\">
                                ";
                // line 60
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 60), "html", null, true);
                yield "
                            </div>
                            <div class=\"list-item-content\">
                                <div class=\"list-item-title\">";
                // line 63
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "nomAliment", [], "any", false, false, false, 63), "html", null, true);
                yield "</div>
                                <div class=\"list-item-subtitle\">";
                // line 64
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "calories", [], "any", false, false, false, 64), "html", null, true);
                yield " cal - IG: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "indexGlycemique", [], "any", false, false, false, 64), "html", null, true);
                yield "</div>
                            </div>
                            ";
                // line 66
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "estExcitant", [], "any", false, false, false, 66)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 67
                    yield "                                <span class=\"badge badge-warning\">Excitant</span>
                            ";
                }
                // line 69
                yield "                        </div>
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
            unset($context['_seq'], $context['_key'], $context['aliment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 71
            yield "                ";
        } else {
            // line 72
            yield "                    <div class=\"empty-state\">
                        <p class=\"text-gray\">Aucun aliment enregistre pour ce repas</p>
                    </div>
                ";
        }
        // line 76
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
        return "nutrition/show.html.twig";
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
        return array (  256 => 76,  250 => 72,  247 => 71,  232 => 69,  228 => 67,  226 => 66,  219 => 64,  215 => 63,  209 => 60,  205 => 58,  187 => 57,  185 => 56,  180 => 54,  170 => 47,  161 => 41,  152 => 35,  143 => 29,  128 => 17,  124 => 16,  116 => 13,  112 => 12,  106 => 8,  104 => 7,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ repas.titreRepas }} - BioSync{% endblock %}

{% block body %}
<div class=\"app-layout\">
    {% include 'partials/_sidebar.html.twig' with {'active': 'nutrition'} %}

    <main class=\"main-content\">
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">{{ repas.titreRepas }}</h1>
                <p class=\"page-subtitle\">{{ repas.typeMoment.label }} - {{ repas.dateConsommation|date('d/m/Y H:i') }}</p>
            </div>
            <div style=\"display: flex; gap: 0.5rem;\">
                <a href=\"{{ path('app_nutrition_edit', {id: repas.id}) }}\" class=\"btn btn-ghost\">Modifier</a>
                <a href=\"{{ path('app_nutrition') }}\" class=\"btn btn-primary\">Retour</a>
            </div>
        </div>

        <div class=\"grid grid-cols-2 gap-6\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Details du repas</h4>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Moment</div>
                        <div class=\"list-item-title\">{{ repas.typeMoment.label }}</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Date</div>
                        <div class=\"list-item-title\">{{ repas.dateConsommation|date('d/m/Y H:i') }}</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Total Calories</div>
                        <div class=\"list-item-title\">{{ repas.totalCalories }} cal</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Points gagnes</div>
                        <div class=\"list-item-title\">{{ repas.pointsGagnes }} points</div>
                    </div>
                </div>
            </div>

            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Aliments ({{ repas.aliments|length }})</h4>
                </div>
                {% if repas.aliments|length > 0 %}
                    {% for aliment in repas.aliments %}
                        <div class=\"list-item\">
                            <div class=\"list-item-icon\" style=\"background: rgba(110, 197, 166, 0.1); color: var(--primary);\">
                                {{ loop.index }}
                            </div>
                            <div class=\"list-item-content\">
                                <div class=\"list-item-title\">{{ aliment.nomAliment }}</div>
                                <div class=\"list-item-subtitle\">{{ aliment.calories }} cal - IG: {{ aliment.indexGlycemique }}</div>
                            </div>
                            {% if aliment.estExcitant %}
                                <span class=\"badge badge-warning\">Excitant</span>
                            {% endif %}
                        </div>
                    {% endfor %}
                {% else %}
                    <div class=\"empty-state\">
                        <p class=\"text-gray\">Aucun aliment enregistre pour ce repas</p>
                    </div>
                {% endif %}
            </div>
        </div>
    </main>
</div>
{% endblock %}
", "nutrition/show.html.twig", "C:\\biosync_new\\templates\\nutrition\\show.html.twig");
    }
}
