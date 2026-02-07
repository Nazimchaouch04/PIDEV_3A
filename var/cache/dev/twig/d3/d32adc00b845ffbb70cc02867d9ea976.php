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

/* aliment/index.html.twig */
class __TwigTemplate_323a687c14d8826299ab313294100b7c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "aliment/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "aliment/index.html.twig"));

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

        yield "Aliments Management - BioSync";
        
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
            <h1 class=\"page-title\">Aliments Management</h1>
            <p class=\"page-subtitle\">Manage your nutrition database</p>
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
                <div class=\"stat-value\">";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["aliments"]) || array_key_exists("aliments", $context) ? $context["aliments"] : (function () { throw new RuntimeError('Variable "aliments" does not exist.', 23, $this->source); })())), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Total Aliments</div>
                <div class=\"stat-progress\">
                    <div class=\"stat-progress-bar progress-green\" style=\"width: 100%;\"></div>
                </div>
            </div>

            ";
        // line 31
        yield "            <div class=\"stats-card\">
                <div class=\"stat-value\">";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::reduce($this->env, (isset($context["aliments"]) || array_key_exists("aliments", $context) ? $context["aliments"] : (function () { throw new RuntimeError('Variable "aliments" does not exist.', 32, $this->source); })()), function ($__sum__, $__a__) use ($context, $macros) { $context["sum"] = $__sum__; $context["a"] = $__a__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 32, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["a"]) || array_key_exists("a", $context) ? $context["a"] : (function () { throw new RuntimeError('Variable "a" does not exist.', 32, $this->source); })()), "calories", [], "any", false, false, false, 32)); }, 0), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Total Calories</div>
                <div class=\"stat-progress\">
                    <div class=\"stat-progress-bar progress-orange\" style=\"width: 75%;\"></div>
                </div>
            </div>

            ";
        // line 40
        yield "            <div class=\"stats-card\">
                <div class=\"stat-value\">
                    ";
        // line 42
        $context["totalGI"] = Twig\Extension\CoreExtension::reduce($this->env, (isset($context["aliments"]) || array_key_exists("aliments", $context) ? $context["aliments"] : (function () { throw new RuntimeError('Variable "aliments" does not exist.', 42, $this->source); })()), function ($__sum__, $__a__) use ($context, $macros) { $context["sum"] = $__sum__; $context["a"] = $__a__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 42, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["a"]) || array_key_exists("a", $context) ? $context["a"] : (function () { throw new RuntimeError('Variable "a" does not exist.', 42, $this->source); })()), "indexGlycemique", [], "any", false, false, false, 42)); }, 0);
        // line 43
        yield "                    ";
        $context["countGI"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, (isset($context["aliments"]) || array_key_exists("aliments", $context) ? $context["aliments"] : (function () { throw new RuntimeError('Variable "aliments" does not exist.', 43, $this->source); })()), function ($__a__) use ($context, $macros) { $context["a"] = $__a__; return (CoreExtension::getAttribute($this->env, $this->source, (isset($context["a"]) || array_key_exists("a", $context) ? $context["a"] : (function () { throw new RuntimeError('Variable "a" does not exist.', 43, $this->source); })()), "indexGlycemique", [], "any", false, false, false, 43) > 0); }));
        // line 44
        yield "                    ";
        if (((isset($context["countGI"]) || array_key_exists("countGI", $context) ? $context["countGI"] : (function () { throw new RuntimeError('Variable "countGI" does not exist.', 44, $this->source); })()) > 0)) {
            // line 45
            yield "                        ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round(((isset($context["totalGI"]) || array_key_exists("totalGI", $context) ? $context["totalGI"] : (function () { throw new RuntimeError('Variable "totalGI" does not exist.', 45, $this->source); })()) / (isset($context["countGI"]) || array_key_exists("countGI", $context) ? $context["countGI"] : (function () { throw new RuntimeError('Variable "countGI" does not exist.', 45, $this->source); })())), 0), "html", null, true);
            yield "
                    ";
        } else {
            // line 47
            yield "                        0
                    ";
        }
        // line 49
        yield "                </div>
                <div class=\"stat-label\">Average GI</div>
                <div class=\"stat-progress\">
                    <div class=\"stat-progress-bar progress-blue\" style=\"width: 60%;\"></div>
                </div>
            </div>

            ";
        // line 57
        yield "            <div class=\"stats-card\">
                <div class=\"stat-value\">";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, (isset($context["aliments"]) || array_key_exists("aliments", $context) ? $context["aliments"] : (function () { throw new RuntimeError('Variable "aliments" does not exist.', 58, $this->source); })()), function ($__a__) use ($context, $macros) { $context["a"] = $__a__; return CoreExtension::getAttribute($this->env, $this->source, (isset($context["a"]) || array_key_exists("a", $context) ? $context["a"] : (function () { throw new RuntimeError('Variable "a" does not exist.', 58, $this->source); })()), "estExcitant", [], "any", false, false, false, 58); })), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Excitants</div>
                <div class=\"stat-progress\">
                    <div class=\"stat-progress-bar progress-red\" style=\"width: 25%;\"></div>
                </div>
            </div>
        </div>

        ";
        // line 67
        yield "        <div style=\"display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;\">
            <h2 style=\"font-size: 20px; font-weight: 700; color: var(--text-primary);\">All Aliments</h2>
            <div style=\"display: flex; gap: 12px; align-items: center;\">
                <a href=\"";
        // line 70
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_pdf");
        yield "\" class=\"btn btn-outline\" style=\"display: flex; align-items: center; gap: 8px; padding: 10px 16px; border: 2px solid #e5e7eb; border-radius: 8px; text-decoration: none; color: #6b7280; transition: all 0.3s ease;\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px;\">
                        <path d=\"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4\"/>
                        <polyline points=\"7 10 12 15 17 10\"/>
                        <line x1=\"12\" y1=\"15\" x2=\"12\" y2=\"3\"/>
                    </svg>
                    Export PDF
                </a>
                <a href=\"";
        // line 78
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_new");
        yield "\" class=\"btn btn-success\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/>
                        <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
                    </svg>
                    Add Aliment
                </a>
            </div>
        </div>

        ";
        // line 89
        yield "        <div style=\"background: white; padding: 20px; border-radius: 12px; border: 1px solid #e5e7eb; margin-bottom: 24px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);\">
            <div style=\"display: flex; gap: 16px; align-items: center; flex-wrap: wrap;\">
                ";
        // line 92
        yield "                <div style=\"flex: 1; min-width: 300px; position: relative;\">
                    <input type=\"text\" id=\"searchInput\" placeholder=\"Search aliments...\" style=\"width: 100%; padding: 12px 16px 12px 44px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.95rem; transition: all 0.3s ease;\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#9ca3af\" style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px;\">
                        <circle cx=\"11\" cy=\"11\" r=\"8\"/>
                        <path d=\"m21 21-4.35-4.35\"/>
                    </svg>
                </div>

                ";
        // line 101
        yield "                <div style=\"display: flex; gap: 8px;\">
                    <button id=\"sortAsc\" class=\"btn btn-outline\" style=\"display: flex; align-items: center; gap: 8px; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; background: white; color: #6b7280; cursor: pointer; transition: all 0.3s ease;\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px;\">
                            <path d=\"M3 7h18M3 12h18M3 17h18\"/>
                            <path d=\"M7 3v18M17 3v18\"/>
                        </svg>
                        Sort A-Z
                    </button>
                    <button id=\"sortDesc\" class=\"btn btn-outline\" style=\"display: flex; align-items: center; gap: 8px; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; background: white; color: #6b7280; cursor: pointer; transition: all 0.3s ease;\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px;\">
                            <path d=\"M3 7h18M3 12h18M3 17h18\"/>
                            <path d=\"M7 3v18M17 3v18\"/>
                        </svg>
                        Sort Z-A
                    </button>
                </div>

                ";
        // line 119
        yield "                <button id=\"sortCalories\" class=\"btn btn-outline\" style=\"display: flex; align-items: center; gap: 8px; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; background: white; color: #6b7280; cursor: pointer; transition: all 0.3s ease;\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px;\">
                        <path d=\"M13 2L3 14h9l-1 8 10-12h-9l1-8z\"/>
                    </svg>
                    Sort by Calories
                </button>
            </div>
        </div>

        ";
        // line 129
        yield "        <div class=\"aliment-list\">
            ";
        // line 130
        if ((array_key_exists("aliments", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["aliments"]) || array_key_exists("aliments", $context) ? $context["aliments"] : (function () { throw new RuntimeError('Variable "aliments" does not exist.', 130, $this->source); })())) > 0))) {
            // line 131
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["aliments"]) || array_key_exists("aliments", $context) ? $context["aliments"] : (function () { throw new RuntimeError('Variable "aliments" does not exist.', 131, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
                // line 132
                yield "                    <div class=\"aliment-card\" data-id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "id", [], "any", false, false, false, 132), "html", null, true);
                yield "\">
                        <div class=\"aliment-icon\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z\"/>
                            </svg>
                        </div>
                        <div class=\"aliment-info\">
                            <div class=\"aliment-name\">";
                // line 139
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "nomAliment", [], "any", false, false, false, 139), "html", null, true);
                yield "</div>
                            <div class=\"aliment-macros\">";
                // line 140
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["a"], "calories", [], "any", true, true, false, 140)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "calories", [], "any", false, false, false, 140), 0)) : (0)), "html", null, true);
                yield " cal  P: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["a"], "proteines", [], "any", true, true, false, 140)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "proteines", [], "any", false, false, false, 140), 0)) : (0)), "html", null, true);
                yield "g  C: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["a"], "glucides", [], "any", true, true, false, 140)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "glucides", [], "any", false, false, false, 140), 0)) : (0)), "html", null, true);
                yield "g  F: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["a"], "lipides", [], "any", true, true, false, 140)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "lipides", [], "any", false, false, false, 140), 0)) : (0)), "html", null, true);
                yield "g</div>
                            <div class=\"aliment-details\">
                                <span class=\"aliment-type\">";
                // line 142
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["a"], "typeAliment", [], "any", true, true, false, 142)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "typeAliment", [], "any", false, false, false, 142), "N/A")) : ("N/A")), "html", null, true);
                yield "</span>
                                <span class=\"gi-badge\">GI: ";
                // line 143
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["a"], "indexGlycemique", [], "any", true, true, false, 143)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "indexGlycemique", [], "any", false, false, false, 143), 0)) : (0)), "html", null, true);
                yield "</span>
                                ";
                // line 144
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["a"], "estExcitant", [], "any", false, false, false, 144)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 145
                    yield "                                    <span class=\"excitant-badge\">Excitant</span>
                                ";
                }
                // line 147
                yield "                            </div>
                        </div>
                        <div class=\"aliment-scores\">
                            ";
                // line 150
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["a"], "nutriScore", [], "any", false, false, false, 150)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 151
                    yield "                                <span class=\"nutri-score nutri-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["a"], "nutriScore", [], "any", false, false, false, 151)), "html", null, true);
                    yield "\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "nutriScore", [], "any", false, false, false, 151), "html", null, true);
                    yield "</span>
                            ";
                }
                // line 153
                yield "                            ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["a"], "multiScore", [], "any", false, false, false, 153)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 154
                    yield "                                <span class=\"multi-score\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "multiScore", [], "any", false, false, false, 154), "html", null, true);
                    yield "</span>
                            ";
                }
                // line 156
                yield "                        </div>
                        <div class=\"aliment-actions\">
                            <a href=\"";
                // line 158
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["a"], "id", [], "any", false, false, false, 158)]), "html", null, true);
                yield "\" class=\"icon-btn icon-btn-view\" style=\"text-decoration: none; display: inline-flex; align-items: center; justify-content: center;\" title=\"View aliment details\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                    <path d=\"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z\"/>
                                    <circle cx=\"12\" cy=\"12\" r=\"3\"/>
                                </svg>
                            </a>
                            <a href=\"";
                // line 164
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["a"], "id", [], "any", false, false, false, 164)]), "html", null, true);
                yield "\" class=\"icon-btn icon-btn-edit\" style=\"text-decoration: none; display: inline-flex; align-items: center; justify-content: center; margin-left: 8px;\" title=\"Edit aliment\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                    <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                    <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                                </svg>
                            </a>
                            <form method=\"post\" action=\"";
                // line 170
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["a"], "id", [], "any", false, false, false, 170)]), "html", null, true);
                yield "\" style=\"display: inline-block; margin-left: 8px;\" onsubmit=\"return confirm('Are you sure you want to delete this aliment?');\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
                // line 171
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["a"], "id", [], "any", false, false, false, 171))), "html", null, true);
                yield "\">
                                <button type=\"submit\" class=\"icon-btn icon-btn-delete\" style=\"border: none; background: none; cursor: pointer; display: inline-flex; align-items: center; justify-content: center;\" title=\"Delete aliment\">
                                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                        <polyline points=\"3 6 5 6 21 6\"/>
                                        <path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['a'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 182
            yield "            ";
        } else {
            // line 183
            yield "                <div class=\"aliment-card\">
                    <div class=\"aliment-info\">
                        <div class=\"aliment-name\">No aliments found</div>
                        <div class=\"aliment-macros\">Start by adding your first aliment</div>
                    </div>
                </div>
            ";
        }
        // line 190
        yield "        </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 193
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

        // line 194
        yield "<style>
.aliment-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.aliment-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    border: 1px solid #e5e7eb;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    display: flex;
    align-items: center;
    gap: 16px;
    transition: all 0.3s ease;
}

.aliment-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

.aliment-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #10b981, #34d399);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
}

.aliment-info {
    flex: 1;
    min-width: 0;
}

.aliment-name {
    font-size: 1.125rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 4px;
}

.aliment-macros {
    font-size: 0.875rem;
    color: #6b7280;
    margin-bottom: 8px;
}

.aliment-details {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.aliment-type {
    background: #d1fae5;
    color: #065f46;
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 500;
}

.gi-badge {
    background: #dbeafe;
    color: #1e40af;
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 500;
}

.excitant-badge {
    background: #fef2f2;
    color: #dc2626;
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 500;
}

.aliment-scores {
    display: flex;
    flex-direction: column;
    gap: 8px;
    align-items: center;
}

.nutri-score {
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 600;
    color: white;
}

.nutri-a { background: #22c55e; }
.nutri-b { background: #84cc16; }
.nutri-c { background: #eab308; }
.nutri-d { background: #f97316; }
.nutri-e { background: #ef4444; }

.multi-score {
    background: #f3f4f6;
    color: #374151;
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 600;
}

.aliment-actions {
    display: flex;
    align-items: center;
}

.icon-btn {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    transition: all 0.3s ease;
    color: #6b7280;
}

.icon-btn:hover {
    background: #f3f4f6;
    color: #374151;
}

.icon-btn-view:hover {
    background: #dbeafe;
    color: #1e40af;
}

.icon-btn-edit:hover {
    background: #fef3c7;
    color: #d97706;
}

.icon-btn-delete:hover {
    background: #fef2f2;
    color: #dc2626;
}

.icon-btn svg {
    width: 18px;
    height: 18px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const sortAscBtn = document.getElementById('sortAsc');
    const sortDescBtn = document.getElementById('sortDesc');
    const sortCaloriesBtn = document.getElementById('sortCalories');
    const alimentList = document.querySelector('.aliment-list');
    let currentSort = 'none';
    
    // Données des aliments
    let alimentsData = [
        ";
        // line 361
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["aliments"]) || array_key_exists("aliments", $context) ? $context["aliments"] : (function () { throw new RuntimeError('Variable "aliments" does not exist.', 361, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["a"]) {
            // line 362
            yield "        {
            id: ";
            // line 363
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "id", [], "any", false, false, false, 363), "html", null, true);
            yield ",
            nom: \"";
            // line 364
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "nomAliment", [], "any", false, false, false, 364), "js"), "html", null, true);
            yield "\",
            type: \"";
            // line 365
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["a"], "typeAliment", [], "any", true, true, false, 365)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "typeAliment", [], "any", false, false, false, 365), "")) : ("")), "js"), "html", null, true);
            yield "\",
            calories: ";
            // line 366
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["a"], "calories", [], "any", true, true, false, 366)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "calories", [], "any", false, false, false, 366), 0)) : (0)), "html", null, true);
            yield ",
            proteines: ";
            // line 367
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["a"], "proteines", [], "any", true, true, false, 367)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "proteines", [], "any", false, false, false, 367), 0)) : (0)), "html", null, true);
            yield ",
            glucides: ";
            // line 368
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["a"], "glucides", [], "any", true, true, false, 368)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "glucides", [], "any", false, false, false, 368), 0)) : (0)), "html", null, true);
            yield ",
            lipides: ";
            // line 369
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["a"], "lipides", [], "any", true, true, false, 369)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "lipides", [], "any", false, false, false, 369), 0)) : (0)), "html", null, true);
            yield ",
            indexGlycemique: ";
            // line 370
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["a"], "indexGlycemique", [], "any", true, true, false, 370)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "indexGlycemique", [], "any", false, false, false, 370), 0)) : (0)), "html", null, true);
            yield ",
            estExcitant: ";
            // line 371
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["a"], "estExcitant", [], "any", false, false, false, 371)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("true") : ("false"));
            yield ",
            nutriScore: \"";
            // line 372
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["a"], "nutriScore", [], "any", true, true, false, 372)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "nutriScore", [], "any", false, false, false, 372), "")) : ("")), "js"), "html", null, true);
            yield "\",
            multiScore: ";
            // line 373
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["a"], "multiScore", [], "any", true, true, false, 373)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["a"], "multiScore", [], "any", false, false, false, 373), 0)) : (0)), "html", null, true);
            yield ",
            showUrl: \"";
            // line 374
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["a"], "id", [], "any", false, false, false, 374)]), "html", null, true);
            yield "\",
            editUrl: \"";
            // line 375
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["a"], "id", [], "any", false, false, false, 375)]), "html", null, true);
            yield "\",
            deleteUrl: \"";
            // line 376
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["a"], "id", [], "any", false, false, false, 376)]), "html", null, true);
            yield "\",
            deleteToken: \"";
            // line 377
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["a"], "id", [], "any", false, false, false, 377))), "html", null, true);
            yield "\"
        },
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['a'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 380
        yield "    ];

    // Fonction pour afficher les aliments
    function displayAliments(aliments) {
        if (aliments.length === 0) {
            alimentList.innerHTML = `
                <div class=\"aliment-card\">
                    <div class=\"aliment-info\">
                        <div class=\"aliment-name\">No aliments found</div>
                        <div class=\"aliment-macros\">Try adjusting your search or filters</div>
                    </div>
                </div>
            `;
            return;
        }

        alimentList.innerHTML = aliments.map(a => `
            <div class=\"aliment-card\" data-id=\"\${a.id}\">
                <div class=\"aliment-icon\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z\"/>
                    </svg>
                </div>
                <div class=\"aliment-info\">
                    <div class=\"aliment-name\">\${a.nom}</div>
                    <div class=\"aliment-macros\">\${a.calories} cal  P: \${a.proteines}g  C: \${a.glucides}g  F: \${a.lipides}g</div>
                    <div class=\"aliment-details\">
                        <span class=\"aliment-type\">\${a.type || 'N/A'}</span>
                        <span class=\"gi-badge\">GI: \${a.indexGlycemique}</span>
                        \${a.estExcitant ? '<span class=\"excitant-badge\">Excitant</span>' : ''}
                    </div>
                </div>
                <div class=\"aliment-scores\">
                    \${a.nutriScore ? <span class=\"nutri-score nutri-\${a.nutriScore.toLowerCase()}\">\${a.nutriScore}</span> : ''}
                    \${a.multiScore ? <span class=\"multi-score\">\${a.multiScore}</span> : ''}
                </div>
                <div class=\"aliment-actions\">
                    <a href=\"\${a.showUrl}\" class=\"icon-btn icon-btn-view\" title=\"View aliment details\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z\"/>
                            <circle cx=\"12\" cy=\"12\" r=\"3\"/>
                        </svg>
                    </a>
                    <a href=\"\${a.editUrl}\" class=\"icon-btn icon-btn-edit\" title=\"Edit aliment\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                            <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                        </svg>
                    </a>
                    <form method=\"post\" action=\"\${a.deleteUrl}\" style=\"display: inline-block;\" onsubmit=\"return confirm('Are you sure you want to delete this aliment?');\">
                        <input type=\"hidden\" name=\"_token\" value=\"\${a.deleteToken}\">
                        <button type=\"submit\" class=\"icon-btn icon-btn-delete\" title=\"Delete aliment\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <polyline points=\"3 6 5 6 21 6\"/>
                                <path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        `).join('');
    }

    // Fonction de recherche
    function searchAliments(query) {
        if (!query) {
            return alimentsData;
        }
        
        const lowerQuery = query.toLowerCase();
        return alimentsData.filter(a => 
            a.nom.toLowerCase().includes(lowerQuery) ||
            a.type.toLowerCase().includes(lowerQuery) ||
            a.calories.toString().includes(lowerQuery) ||
            a.indexGlycemique.toString().includes(lowerQuery)
        );
    }

    // Fonctions de tri
    function sortAliments(aliments, type) {
        const sorted = [...aliments];
        
        switch(type) {
            case 'asc':
                return sorted.sort((a, b) => a.nom.localeCompare(b.nom));
            case 'desc':
                return sorted.sort((a, b) => b.nom.localeCompare(a.nom));
            case 'calories':
                return sorted.sort((a, b) => b.calories - a.calories);
            default:
                return sorted;
        }
    }

    // Gestionnaire de recherche
    searchInput.addEventListener('input', function() {
        const query = this.value;
        const filtered = searchAliments(query);
        const sorted = sortAliments(filtered, currentSort);
        displayAliments(sorted);
    });

    // Gestionnaires de tri
    sortAscBtn.addEventListener('click', function() {
        currentSort = 'asc';
        updateButtonStyles(this);
        const filtered = searchAliments(searchInput.value);
        const sorted = sortAliments(filtered, 'asc');
        displayAliments(sorted);
    });

    sortDescBtn.addEventListener('click', function() {
        currentSort = 'desc';
        updateButtonStyles(this);
        const filtered = searchAliments(searchInput.value);
        const sorted = sortAliments(filtered, 'desc');
        displayAliments(sorted);
    });

    sortCaloriesBtn.addEventListener('click', function() {
        currentSort = 'calories';
        updateButtonStyles(this);
        const filtered = searchAliments(searchInput.value);
        const sorted = sortAliments(filtered, 'calories');
        displayAliments(sorted);
    });

    // Mettre à jour les styles des boutons
    function updateButtonStyles(activeBtn) {
        [sortAscBtn, sortDescBtn, sortCaloriesBtn].forEach(btn => {
            if (btn === activeBtn) {
                btn.style.background = '#10b981';
                btn.style.color = 'white';
                btn.style.borderColor = '#10b981';
            } else {
                btn.style.background = 'white';
                btn.style.color = '#6b7280';
                btn.style.borderColor = '#e5e7eb';
            }
        });
    }

    // Effets de survol pour les boutons
    [sortAscBtn, sortDescBtn, sortCaloriesBtn].forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            if (this.style.background !== 'rgb(16, 185, 129)') {
                this.style.borderColor = '#9ca3af';
                this.style.transform = 'translateY(-1px)';
            }
        });
        
        btn.addEventListener('mouseleave', function() {
            if (this.style.background !== 'rgb(16, 185, 129)') {
                this.style.borderColor = '#e5e7eb';
                this.style.transform = 'translateY(0)';
            }
        });
    });

    // Effet de survol pour le champ de recherche
    searchInput.addEventListener('focus', function() {
        this.style.borderColor = '#10b981';
        this.style.boxShadow = '0 0 0 3px rgba(16, 185, 129, 0.1)';
    });

    searchInput.addEventListener('blur', function() {
        this.style.borderColor = '#e5e7eb';
        this.style.boxShadow = 'none';
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
        return "aliment/index.html.twig";
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
        return array (  659 => 380,  650 => 377,  646 => 376,  642 => 375,  638 => 374,  634 => 373,  630 => 372,  626 => 371,  622 => 370,  618 => 369,  614 => 368,  610 => 367,  606 => 366,  602 => 365,  598 => 364,  594 => 363,  591 => 362,  587 => 361,  418 => 194,  405 => 193,  393 => 190,  384 => 183,  381 => 182,  364 => 171,  360 => 170,  351 => 164,  342 => 158,  338 => 156,  332 => 154,  329 => 153,  321 => 151,  319 => 150,  314 => 147,  310 => 145,  308 => 144,  304 => 143,  300 => 142,  289 => 140,  285 => 139,  274 => 132,  269 => 131,  267 => 130,  264 => 129,  253 => 119,  234 => 101,  224 => 92,  220 => 89,  207 => 78,  196 => 70,  191 => 67,  180 => 58,  177 => 57,  168 => 49,  164 => 47,  158 => 45,  155 => 44,  152 => 43,  150 => 42,  146 => 40,  136 => 32,  133 => 31,  123 => 23,  113 => 15,  110 => 13,  103 => 7,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Aliments Management - BioSync{% endblock %}

{% block body %}
        {# Page Header #}
        <div class=\"page-header\">
            <h1 class=\"page-title\">Aliments Management</h1>
            <p class=\"page-subtitle\">Manage your nutrition database</p>
        </div>

        {# Stats Grid #}
        <div class=\"grid-4\" style=\"margin-bottom: 32px;\">
            {# Total Aliments Card #}
            <div class=\"stats-card\">
                <div class=\"stat-icon calories\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                        <path d=\"M7 2v20\"/>
                        <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                    </svg>
                </div>
                <div class=\"stat-value\">{{ aliments|length }}</div>
                <div class=\"stat-label\">Total Aliments</div>
                <div class=\"stat-progress\">
                    <div class=\"stat-progress-bar progress-green\" style=\"width: 100%;\"></div>
                </div>
            </div>

            {# Total Calories Card #}
            <div class=\"stats-card\">
                <div class=\"stat-value\">{{ aliments|reduce((sum, a) => sum + a.calories, 0) }}</div>
                <div class=\"stat-label\">Total Calories</div>
                <div class=\"stat-progress\">
                    <div class=\"stat-progress-bar progress-orange\" style=\"width: 75%;\"></div>
                </div>
            </div>

            {# Average GI Card #}
            <div class=\"stats-card\">
                <div class=\"stat-value\">
                    {% set totalGI = aliments|reduce((sum, a) => sum + a.indexGlycemique, 0) %}
                    {% set countGI = aliments|filter(a => a.indexGlycemique > 0)|length %}
                    {% if countGI > 0 %}
                        {{ (totalGI / countGI)|round(0) }}
                    {% else %}
                        0
                    {% endif %}
                </div>
                <div class=\"stat-label\">Average GI</div>
                <div class=\"stat-progress\">
                    <div class=\"stat-progress-bar progress-blue\" style=\"width: 60%;\"></div>
                </div>
            </div>

            {# Excitants Card #}
            <div class=\"stats-card\">
                <div class=\"stat-value\">{{ aliments|filter(a => a.estExcitant)|length }}</div>
                <div class=\"stat-label\">Excitants</div>
                <div class=\"stat-progress\">
                    <div class=\"stat-progress-bar progress-red\" style=\"width: 25%;\"></div>
                </div>
            </div>
        </div>

        {# Aliments Section #}
        <div style=\"display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;\">
            <h2 style=\"font-size: 20px; font-weight: 700; color: var(--text-primary);\">All Aliments</h2>
            <div style=\"display: flex; gap: 12px; align-items: center;\">
                <a href=\"{{ path('app_aliment_pdf') }}\" class=\"btn btn-outline\" style=\"display: flex; align-items: center; gap: 8px; padding: 10px 16px; border: 2px solid #e5e7eb; border-radius: 8px; text-decoration: none; color: #6b7280; transition: all 0.3s ease;\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px;\">
                        <path d=\"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4\"/>
                        <polyline points=\"7 10 12 15 17 10\"/>
                        <line x1=\"12\" y1=\"15\" x2=\"12\" y2=\"3\"/>
                    </svg>
                    Export PDF
                </a>
                <a href=\"{{ path('app_aliment_new') }}\" class=\"btn btn-success\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/>
                        <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
                    </svg>
                    Add Aliment
                </a>
            </div>
        </div>

        {# Search and Filters Bar #}
        <div style=\"background: white; padding: 20px; border-radius: 12px; border: 1px solid #e5e7eb; margin-bottom: 24px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);\">
            <div style=\"display: flex; gap: 16px; align-items: center; flex-wrap: wrap;\">
                {# Search Input #}
                <div style=\"flex: 1; min-width: 300px; position: relative;\">
                    <input type=\"text\" id=\"searchInput\" placeholder=\"Search aliments...\" style=\"width: 100%; padding: 12px 16px 12px 44px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.95rem; transition: all 0.3s ease;\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#9ca3af\" style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px;\">
                        <circle cx=\"11\" cy=\"11\" r=\"8\"/>
                        <path d=\"m21 21-4.35-4.35\"/>
                    </svg>
                </div>

                {# Sort Buttons #}
                <div style=\"display: flex; gap: 8px;\">
                    <button id=\"sortAsc\" class=\"btn btn-outline\" style=\"display: flex; align-items: center; gap: 8px; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; background: white; color: #6b7280; cursor: pointer; transition: all 0.3s ease;\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px;\">
                            <path d=\"M3 7h18M3 12h18M3 17h18\"/>
                            <path d=\"M7 3v18M17 3v18\"/>
                        </svg>
                        Sort A-Z
                    </button>
                    <button id=\"sortDesc\" class=\"btn btn-outline\" style=\"display: flex; align-items: center; gap: 8px; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; background: white; color: #6b7280; cursor: pointer; transition: all 0.3s ease;\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px;\">
                            <path d=\"M3 7h18M3 12h18M3 17h18\"/>
                            <path d=\"M7 3v18M17 3v18\"/>
                        </svg>
                        Sort Z-A
                    </button>
                </div>

                {# Calories Sort #}
                <button id=\"sortCalories\" class=\"btn btn-outline\" style=\"display: flex; align-items: center; gap: 8px; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; background: white; color: #6b7280; cursor: pointer; transition: all 0.3s ease;\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px;\">
                        <path d=\"M13 2L3 14h9l-1 8 10-12h-9l1-8z\"/>
                    </svg>
                    Sort by Calories
                </button>
            </div>
        </div>

        {# Aliments List #}
        <div class=\"aliment-list\">
            {% if aliments is defined and aliments|length > 0 %}
                {% for a in aliments %}
                    <div class=\"aliment-card\" data-id=\"{{ a.id }}\">
                        <div class=\"aliment-icon\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z\"/>
                            </svg>
                        </div>
                        <div class=\"aliment-info\">
                            <div class=\"aliment-name\">{{ a.nomAliment }}</div>
                            <div class=\"aliment-macros\">{{ a.calories|default(0) }} cal  P: {{ a.proteines|default(0) }}g  C: {{ a.glucides|default(0) }}g  F: {{ a.lipides|default(0) }}g</div>
                            <div class=\"aliment-details\">
                                <span class=\"aliment-type\">{{ a.typeAliment|default('N/A') }}</span>
                                <span class=\"gi-badge\">GI: {{ a.indexGlycemique|default(0) }}</span>
                                {% if a.estExcitant %}
                                    <span class=\"excitant-badge\">Excitant</span>
                                {% endif %}
                            </div>
                        </div>
                        <div class=\"aliment-scores\">
                            {% if a.nutriScore %}
                                <span class=\"nutri-score nutri-{{ a.nutriScore|lower }}\">{{ a.nutriScore }}</span>
                            {% endif %}
                            {% if a.multiScore %}
                                <span class=\"multi-score\">{{ a.multiScore }}</span>
                            {% endif %}
                        </div>
                        <div class=\"aliment-actions\">
                            <a href=\"{{ path('app_aliment_show', {'id': a.id}) }}\" class=\"icon-btn icon-btn-view\" style=\"text-decoration: none; display: inline-flex; align-items: center; justify-content: center;\" title=\"View aliment details\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                    <path d=\"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z\"/>
                                    <circle cx=\"12\" cy=\"12\" r=\"3\"/>
                                </svg>
                            </a>
                            <a href=\"{{ path('app_aliment_edit', {'id': a.id}) }}\" class=\"icon-btn icon-btn-edit\" style=\"text-decoration: none; display: inline-flex; align-items: center; justify-content: center; margin-left: 8px;\" title=\"Edit aliment\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                    <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                    <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                                </svg>
                            </a>
                            <form method=\"post\" action=\"{{ path('app_aliment_delete', {'id': a.id}) }}\" style=\"display: inline-block; margin-left: 8px;\" onsubmit=\"return confirm('Are you sure you want to delete this aliment?');\">
                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ a.id) }}\">
                                <button type=\"submit\" class=\"icon-btn icon-btn-delete\" style=\"border: none; background: none; cursor: pointer; display: inline-flex; align-items: center; justify-content: center;\" title=\"Delete aliment\">
                                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                        <polyline points=\"3 6 5 6 21 6\"/>
                                        <path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                {% endfor %}
            {% else %}
                <div class=\"aliment-card\">
                    <div class=\"aliment-info\">
                        <div class=\"aliment-name\">No aliments found</div>
                        <div class=\"aliment-macros\">Start by adding your first aliment</div>
                    </div>
                </div>
            {% endif %}
        </div>
{% endblock %}

{% block javascripts %}
<style>
.aliment-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.aliment-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    border: 1px solid #e5e7eb;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    display: flex;
    align-items: center;
    gap: 16px;
    transition: all 0.3s ease;
}

.aliment-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

.aliment-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #10b981, #34d399);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
}

.aliment-info {
    flex: 1;
    min-width: 0;
}

.aliment-name {
    font-size: 1.125rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 4px;
}

.aliment-macros {
    font-size: 0.875rem;
    color: #6b7280;
    margin-bottom: 8px;
}

.aliment-details {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.aliment-type {
    background: #d1fae5;
    color: #065f46;
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 500;
}

.gi-badge {
    background: #dbeafe;
    color: #1e40af;
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 500;
}

.excitant-badge {
    background: #fef2f2;
    color: #dc2626;
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 500;
}

.aliment-scores {
    display: flex;
    flex-direction: column;
    gap: 8px;
    align-items: center;
}

.nutri-score {
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 600;
    color: white;
}

.nutri-a { background: #22c55e; }
.nutri-b { background: #84cc16; }
.nutri-c { background: #eab308; }
.nutri-d { background: #f97316; }
.nutri-e { background: #ef4444; }

.multi-score {
    background: #f3f4f6;
    color: #374151;
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 600;
}

.aliment-actions {
    display: flex;
    align-items: center;
}

.icon-btn {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    transition: all 0.3s ease;
    color: #6b7280;
}

.icon-btn:hover {
    background: #f3f4f6;
    color: #374151;
}

.icon-btn-view:hover {
    background: #dbeafe;
    color: #1e40af;
}

.icon-btn-edit:hover {
    background: #fef3c7;
    color: #d97706;
}

.icon-btn-delete:hover {
    background: #fef2f2;
    color: #dc2626;
}

.icon-btn svg {
    width: 18px;
    height: 18px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const sortAscBtn = document.getElementById('sortAsc');
    const sortDescBtn = document.getElementById('sortDesc');
    const sortCaloriesBtn = document.getElementById('sortCalories');
    const alimentList = document.querySelector('.aliment-list');
    let currentSort = 'none';
    
    // Données des aliments
    let alimentsData = [
        {% for a in aliments %}
        {
            id: {{ a.id }},
            nom: \"{{ a.nomAliment|e('js') }}\",
            type: \"{{ a.typeAliment|default('')|e('js') }}\",
            calories: {{ a.calories|default(0) }},
            proteines: {{ a.proteines|default(0) }},
            glucides: {{ a.glucides|default(0) }},
            lipides: {{ a.lipides|default(0) }},
            indexGlycemique: {{ a.indexGlycemique|default(0) }},
            estExcitant: {{ a.estExcitant ? 'true' : 'false' }},
            nutriScore: \"{{ a.nutriScore|default('')|e('js') }}\",
            multiScore: {{ a.multiScore|default(0) }},
            showUrl: \"{{ path('app_aliment_show', {'id': a.id}) }}\",
            editUrl: \"{{ path('app_aliment_edit', {'id': a.id}) }}\",
            deleteUrl: \"{{ path('app_aliment_delete', {'id': a.id}) }}\",
            deleteToken: \"{{ csrf_token('delete' ~ a.id) }}\"
        },
        {% endfor %}
    ];

    // Fonction pour afficher les aliments
    function displayAliments(aliments) {
        if (aliments.length === 0) {
            alimentList.innerHTML = `
                <div class=\"aliment-card\">
                    <div class=\"aliment-info\">
                        <div class=\"aliment-name\">No aliments found</div>
                        <div class=\"aliment-macros\">Try adjusting your search or filters</div>
                    </div>
                </div>
            `;
            return;
        }

        alimentList.innerHTML = aliments.map(a => `
            <div class=\"aliment-card\" data-id=\"\${a.id}\">
                <div class=\"aliment-icon\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z\"/>
                    </svg>
                </div>
                <div class=\"aliment-info\">
                    <div class=\"aliment-name\">\${a.nom}</div>
                    <div class=\"aliment-macros\">\${a.calories} cal  P: \${a.proteines}g  C: \${a.glucides}g  F: \${a.lipides}g</div>
                    <div class=\"aliment-details\">
                        <span class=\"aliment-type\">\${a.type || 'N/A'}</span>
                        <span class=\"gi-badge\">GI: \${a.indexGlycemique}</span>
                        \${a.estExcitant ? '<span class=\"excitant-badge\">Excitant</span>' : ''}
                    </div>
                </div>
                <div class=\"aliment-scores\">
                    \${a.nutriScore ? <span class=\"nutri-score nutri-\${a.nutriScore.toLowerCase()}\">\${a.nutriScore}</span> : ''}
                    \${a.multiScore ? <span class=\"multi-score\">\${a.multiScore}</span> : ''}
                </div>
                <div class=\"aliment-actions\">
                    <a href=\"\${a.showUrl}\" class=\"icon-btn icon-btn-view\" title=\"View aliment details\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z\"/>
                            <circle cx=\"12\" cy=\"12\" r=\"3\"/>
                        </svg>
                    </a>
                    <a href=\"\${a.editUrl}\" class=\"icon-btn icon-btn-edit\" title=\"Edit aliment\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                            <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                        </svg>
                    </a>
                    <form method=\"post\" action=\"\${a.deleteUrl}\" style=\"display: inline-block;\" onsubmit=\"return confirm('Are you sure you want to delete this aliment?');\">
                        <input type=\"hidden\" name=\"_token\" value=\"\${a.deleteToken}\">
                        <button type=\"submit\" class=\"icon-btn icon-btn-delete\" title=\"Delete aliment\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <polyline points=\"3 6 5 6 21 6\"/>
                                <path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        `).join('');
    }

    // Fonction de recherche
    function searchAliments(query) {
        if (!query) {
            return alimentsData;
        }
        
        const lowerQuery = query.toLowerCase();
        return alimentsData.filter(a => 
            a.nom.toLowerCase().includes(lowerQuery) ||
            a.type.toLowerCase().includes(lowerQuery) ||
            a.calories.toString().includes(lowerQuery) ||
            a.indexGlycemique.toString().includes(lowerQuery)
        );
    }

    // Fonctions de tri
    function sortAliments(aliments, type) {
        const sorted = [...aliments];
        
        switch(type) {
            case 'asc':
                return sorted.sort((a, b) => a.nom.localeCompare(b.nom));
            case 'desc':
                return sorted.sort((a, b) => b.nom.localeCompare(a.nom));
            case 'calories':
                return sorted.sort((a, b) => b.calories - a.calories);
            default:
                return sorted;
        }
    }

    // Gestionnaire de recherche
    searchInput.addEventListener('input', function() {
        const query = this.value;
        const filtered = searchAliments(query);
        const sorted = sortAliments(filtered, currentSort);
        displayAliments(sorted);
    });

    // Gestionnaires de tri
    sortAscBtn.addEventListener('click', function() {
        currentSort = 'asc';
        updateButtonStyles(this);
        const filtered = searchAliments(searchInput.value);
        const sorted = sortAliments(filtered, 'asc');
        displayAliments(sorted);
    });

    sortDescBtn.addEventListener('click', function() {
        currentSort = 'desc';
        updateButtonStyles(this);
        const filtered = searchAliments(searchInput.value);
        const sorted = sortAliments(filtered, 'desc');
        displayAliments(sorted);
    });

    sortCaloriesBtn.addEventListener('click', function() {
        currentSort = 'calories';
        updateButtonStyles(this);
        const filtered = searchAliments(searchInput.value);
        const sorted = sortAliments(filtered, 'calories');
        displayAliments(sorted);
    });

    // Mettre à jour les styles des boutons
    function updateButtonStyles(activeBtn) {
        [sortAscBtn, sortDescBtn, sortCaloriesBtn].forEach(btn => {
            if (btn === activeBtn) {
                btn.style.background = '#10b981';
                btn.style.color = 'white';
                btn.style.borderColor = '#10b981';
            } else {
                btn.style.background = 'white';
                btn.style.color = '#6b7280';
                btn.style.borderColor = '#e5e7eb';
            }
        });
    }

    // Effets de survol pour les boutons
    [sortAscBtn, sortDescBtn, sortCaloriesBtn].forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            if (this.style.background !== 'rgb(16, 185, 129)') {
                this.style.borderColor = '#9ca3af';
                this.style.transform = 'translateY(-1px)';
            }
        });
        
        btn.addEventListener('mouseleave', function() {
            if (this.style.background !== 'rgb(16, 185, 129)') {
                this.style.borderColor = '#e5e7eb';
                this.style.transform = 'translateY(0)';
            }
        });
    });

    // Effet de survol pour le champ de recherche
    searchInput.addEventListener('focus', function() {
        this.style.borderColor = '#10b981';
        this.style.boxShadow = '0 0 0 3px rgba(16, 185, 129, 0.1)';
    });

    searchInput.addEventListener('blur', function() {
        this.style.borderColor = '#e5e7eb';
        this.style.boxShadow = 'none';
    });
});
</script>
{% endblock %}", "aliment/index.html.twig", "C:\\biosync_new\\templates\\aliment\\index.html.twig");
    }
}
