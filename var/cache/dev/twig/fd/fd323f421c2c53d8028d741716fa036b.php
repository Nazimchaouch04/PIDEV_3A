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

/* nutrition/index.html.twig */
class __TwigTemplate_7d02193e59c61d034584efef6047514a extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "nutrition/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "nutrition/index.html.twig"));

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

        yield "Nutrition Tracking - BioSync";
        
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
        yield "        ";
        // line 7
        yield "        <div class=\"page-header\">
            <h1 class=\"page-title\">Nutrition Tracking</h1>
            <p class=\"page-subtitle\">Monitor your daily meals and nutritional intake</p>
        </div>

        ";
        // line 13
        yield "        <div class=\"grid-4\" style=\"margin-bottom: 32px;\">
            ";
        // line 15
        yield "            <div class=\"stats-card\">
                <div class=\"stat-icon calories\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                        <path d=\"M7 2v20\"/>
                        <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                    </svg>
                </div>
                <div class=\"stat-value\">1600</div>
                <div class=\"stat-label\">of 2450 cal</div>
                <div class=\"stat-progress\">
                    <div class=\"stat-progress-bar progress-green\" style=\"width: 65%;\"></div>
                </div>
            </div>

            ";
        // line 31
        yield "            <div class=\"stats-card\">
                <div class=\"stat-value\">107g</div>
                <div class=\"stat-label\">Target: 150g</div>
                <div class=\"stat-progress\">
                    <div class=\"stat-progress-bar progress-blue\" style=\"width: 71%;\"></div>
                </div>
            </div>

            ";
        // line 40
        yield "            <div class=\"stats-card\">
                <div class=\"stat-value\">145g</div>
                <div class=\"stat-label\">Target: 250g</div>
                <div class=\"stat-progress\">
                    <div class=\"stat-progress-bar progress-green\" style=\"width: 58%;\"></div>
                </div>
            </div>

            ";
        // line 49
        yield "            <div class=\"stats-card\">
                <div class=\"stat-value\">60g</div>
                <div class=\"stat-label\">Target: 80g</div>
                <div class=\"stat-progress\">
                    <div class=\"stat-progress-bar progress-orange\" style=\"width: 75%;\"></div>
                </div>
            </div>
        </div>

        ";
        // line 59
        yield "        <div style=\"display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;\">
            <h2 style=\"font-size: 20px; font-weight: 700; color: var(--text-primary);\">Today's Meals</h2>
            <a href=\"";
        // line 61
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_nutrition_new");
        yield "\" class=\"btn btn-success\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/>
                    <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
                </svg>
                Add Meal
            </a>
        </div>

        ";
        // line 71
        yield "        <div class=\"meal-list\">
            ";
        // line 72
        if ((array_key_exists("repas", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 72, $this->source); })())) > 0))) {
            // line 73
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 73, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
                // line 74
                yield "                    <div class=\"meal-card\">
                        <div class=\"meal-icon\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                                <path d=\"M7 2v20\"/>
                                <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                            </svg>
                        </div>
                        <div class=\"meal-info\">
                            <div class=\"meal-name\">";
                // line 83
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "titreRepas", [], "any", false, false, false, 83), "html", null, true);
                yield "</div>
                            <div class=\"meal-macros\">350 cal  P: 12g  C: 58g  F: 8g</div>
                        </div>
                        <div class=\"meal-time\">";
                // line 86
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "dateConsommation", [], "any", false, false, false, 86), "H:i"), "html", null, true);
                yield "</div>
                        <div class=\"meal-actions\">
                            <button class=\"icon-btn icon-btn-edit\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                    <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                    <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                                </svg>
                            </button>
                            <button class=\"icon-btn icon-btn-delete\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                    <polyline points=\"3 6 5 6 21 6\"/>
                                    <path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['r'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 103
            yield "            ";
        } else {
            // line 104
            yield "                <div class=\"meal-card\">
                    <div class=\"meal-icon\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                            <path d=\"M7 2v20\"/>
                            <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                        </svg>
                    </div>
                    <div class=\"meal-info\">
                        <div class=\"meal-name\">Oatmeal with Berries</div>
                        <div class=\"meal-macros\">350 cal  P: 12g  C: 58g  F: 8g</div>
                    </div>
                    <div class=\"meal-time\">08:00</div>
                    <div class=\"meal-actions\">
                        <button class=\"icon-btn icon-btn-edit\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                            </svg>
                        </button>
                        <button class=\"icon-btn icon-btn-delete\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <polyline points=\"3 6 5 6 21 6\"/>
                                <path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class=\"meal-card\">
                    <div class=\"meal-icon\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                            <path d=\"M7 2v20\"/>
                            <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                        </svg>
                    </div>
                    <div class=\"meal-info\">
                        <div class=\"meal-name\">Grilled Chicken Salad</div>
                        <div class=\"meal-macros\">420 cal  P: 35g  C: 22g  F: 18g</div>
                    </div>
                    <div class=\"meal-time\">13:00</div>
                    <div class=\"meal-actions\">
                        <button class=\"icon-btn icon-btn-edit\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                            </svg>
                        </button>
                        <button class=\"icon-btn icon-btn-delete\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <polyline points=\"3 6 5 6 21 6\"/>
                                <path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"/>
                            </svg>
                        </button>
                    </div>
                </div>
            ";
        }
        // line 162
        yield "        </div>
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
        return "nutrition/index.html.twig";
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
        return array (  289 => 162,  229 => 104,  226 => 103,  203 => 86,  197 => 83,  186 => 74,  181 => 73,  179 => 72,  176 => 71,  164 => 61,  160 => 59,  149 => 49,  139 => 40,  129 => 31,  112 => 15,  109 => 13,  102 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Nutrition Tracking - BioSync{% endblock %}

{% block body %}
        {# Page Header #}
        <div class=\"page-header\">
            <h1 class=\"page-title\">Nutrition Tracking</h1>
            <p class=\"page-subtitle\">Monitor your daily meals and nutritional intake</p>
        </div>

        {# Nutrition Stats Grid #}
        <div class=\"grid-4\" style=\"margin-bottom: 32px;\">
            {# Calories Card #}
            <div class=\"stats-card\">
                <div class=\"stat-icon calories\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                        <path d=\"M7 2v20\"/>
                        <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                    </svg>
                </div>
                <div class=\"stat-value\">1600</div>
                <div class=\"stat-label\">of 2450 cal</div>
                <div class=\"stat-progress\">
                    <div class=\"stat-progress-bar progress-green\" style=\"width: 65%;\"></div>
                </div>
            </div>

            {# Protein Card #}
            <div class=\"stats-card\">
                <div class=\"stat-value\">107g</div>
                <div class=\"stat-label\">Target: 150g</div>
                <div class=\"stat-progress\">
                    <div class=\"stat-progress-bar progress-blue\" style=\"width: 71%;\"></div>
                </div>
            </div>

            {# Carbs Card #}
            <div class=\"stats-card\">
                <div class=\"stat-value\">145g</div>
                <div class=\"stat-label\">Target: 250g</div>
                <div class=\"stat-progress\">
                    <div class=\"stat-progress-bar progress-green\" style=\"width: 58%;\"></div>
                </div>
            </div>

            {# Fats Card #}
            <div class=\"stats-card\">
                <div class=\"stat-value\">60g</div>
                <div class=\"stat-label\">Target: 80g</div>
                <div class=\"stat-progress\">
                    <div class=\"stat-progress-bar progress-orange\" style=\"width: 75%;\"></div>
                </div>
            </div>
        </div>

        {# Today's Meals Section #}
        <div style=\"display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;\">
            <h2 style=\"font-size: 20px; font-weight: 700; color: var(--text-primary);\">Today's Meals</h2>
            <a href=\"{{ path('app_nutrition_new') }}\" class=\"btn btn-success\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/>
                    <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
                </svg>
                Add Meal
            </a>
        </div>

        {# Meals List #}
        <div class=\"meal-list\">
            {% if repas is defined and repas|length > 0 %}
                {% for r in repas %}
                    <div class=\"meal-card\">
                        <div class=\"meal-icon\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                                <path d=\"M7 2v20\"/>
                                <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                            </svg>
                        </div>
                        <div class=\"meal-info\">
                            <div class=\"meal-name\">{{ r.titreRepas }}</div>
                            <div class=\"meal-macros\">350 cal  P: 12g  C: 58g  F: 8g</div>
                        </div>
                        <div class=\"meal-time\">{{ r.dateConsommation|date('H:i') }}</div>
                        <div class=\"meal-actions\">
                            <button class=\"icon-btn icon-btn-edit\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                    <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                    <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                                </svg>
                            </button>
                            <button class=\"icon-btn icon-btn-delete\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                    <polyline points=\"3 6 5 6 21 6\"/>
                                    <path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                {% endfor %}
            {% else %}
                <div class=\"meal-card\">
                    <div class=\"meal-icon\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                            <path d=\"M7 2v20\"/>
                            <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                        </svg>
                    </div>
                    <div class=\"meal-info\">
                        <div class=\"meal-name\">Oatmeal with Berries</div>
                        <div class=\"meal-macros\">350 cal  P: 12g  C: 58g  F: 8g</div>
                    </div>
                    <div class=\"meal-time\">08:00</div>
                    <div class=\"meal-actions\">
                        <button class=\"icon-btn icon-btn-edit\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                            </svg>
                        </button>
                        <button class=\"icon-btn icon-btn-delete\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <polyline points=\"3 6 5 6 21 6\"/>
                                <path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class=\"meal-card\">
                    <div class=\"meal-icon\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                            <path d=\"M7 2v20\"/>
                            <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                        </svg>
                    </div>
                    <div class=\"meal-info\">
                        <div class=\"meal-name\">Grilled Chicken Salad</div>
                        <div class=\"meal-macros\">420 cal  P: 35g  C: 22g  F: 18g</div>
                    </div>
                    <div class=\"meal-time\">13:00</div>
                    <div class=\"meal-actions\">
                        <button class=\"icon-btn icon-btn-edit\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                            </svg>
                        </button>
                        <button class=\"icon-btn icon-btn-delete\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <polyline points=\"3 6 5 6 21 6\"/>
                                <path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"/>
                            </svg>
                        </button>
                    </div>
                </div>
            {% endif %}
        </div>
{% endblock %}
", "nutrition/index.html.twig", "C:\\biosync_new\\templates\\nutrition\\index.html.twig");
    }
}
