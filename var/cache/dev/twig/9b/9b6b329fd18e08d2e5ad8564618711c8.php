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

/* repas/index.html.twig */
class __TwigTemplate_c804d04b6f18ac465c8f69c3f95ac6ac extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "repas/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "repas/index.html.twig"));

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

        yield "Gérer Les Repas - BioSync";
        
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
            <h1 class=\"page-title\">Gérer Les Repas</h1>
            <p class=\"page-subtitle\">Gérez vos repas et votre suivi nutritionnel</p>
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::reduce($this->env, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 23, $this->source); })()), function ($__sum__, $__r__) use ($context, $macros) { $context["sum"] = $__sum__; $context["r"] = $__r__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 23, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["r"]) || array_key_exists("r", $context) ? $context["r"] : (function () { throw new RuntimeError('Variable "r" does not exist.', 23, $this->source); })()), "totalCalories", [], "any", false, false, false, 23)); }, 0), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">sur 2450 cal</div>
                <div class=\"stat-progress\">
                    ";
        // line 26
        $context["caloriesPercent"] = Twig\Extension\CoreExtension::round(((Twig\Extension\CoreExtension::reduce($this->env, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 26, $this->source); })()), function ($__sum__, $__r__) use ($context, $macros) { $context["sum"] = $__sum__; $context["r"] = $__r__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 26, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["r"]) || array_key_exists("r", $context) ? $context["r"] : (function () { throw new RuntimeError('Variable "r" does not exist.', 26, $this->source); })()), "totalCalories", [], "any", false, false, false, 26)); }, 0) / 2450) * 100), 0);
        // line 27
        yield "                    <div class=\"stat-progress-bar progress-green\" style=\"width: ";
        yield ((((isset($context["caloriesPercent"]) || array_key_exists("caloriesPercent", $context) ? $context["caloriesPercent"] : (function () { throw new RuntimeError('Variable "caloriesPercent" does not exist.', 27, $this->source); })()) > 100)) ? (100) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["caloriesPercent"]) || array_key_exists("caloriesPercent", $context) ? $context["caloriesPercent"] : (function () { throw new RuntimeError('Variable "caloriesPercent" does not exist.', 27, $this->source); })()), "html", null, true)));
        yield "%;\"></div>
                </div>
            </div>

            ";
        // line 32
        yield "            <div class=\"stats-card\">
                <div class=\"stat-value\">";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::reduce($this->env, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 33, $this->source); })()), function ($__sum__, $__r__) use ($context, $macros) { $context["sum"] = $__sum__; $context["r"] = $__r__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 33, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["r"]) || array_key_exists("r", $context) ? $context["r"] : (function () { throw new RuntimeError('Variable "r" does not exist.', 33, $this->source); })()), "totalProteines", [], "any", false, false, false, 33)); }, 0), "html", null, true);
        yield "g</div>
                <div class=\"stat-label\">Objectif: 150g</div>
                <div class=\"stat-progress\">
                    ";
        // line 36
        $context["proteinPercent"] = Twig\Extension\CoreExtension::round(((Twig\Extension\CoreExtension::reduce($this->env, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 36, $this->source); })()), function ($__sum__, $__r__) use ($context, $macros) { $context["sum"] = $__sum__; $context["r"] = $__r__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 36, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["r"]) || array_key_exists("r", $context) ? $context["r"] : (function () { throw new RuntimeError('Variable "r" does not exist.', 36, $this->source); })()), "totalProteines", [], "any", false, false, false, 36)); }, 0) / 150) * 100), 0);
        // line 37
        yield "                    <div class=\"stat-progress-bar progress-blue\" style=\"width: ";
        yield ((((isset($context["proteinPercent"]) || array_key_exists("proteinPercent", $context) ? $context["proteinPercent"] : (function () { throw new RuntimeError('Variable "proteinPercent" does not exist.', 37, $this->source); })()) > 100)) ? (100) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["proteinPercent"]) || array_key_exists("proteinPercent", $context) ? $context["proteinPercent"] : (function () { throw new RuntimeError('Variable "proteinPercent" does not exist.', 37, $this->source); })()), "html", null, true)));
        yield "%;\"></div>
                </div>
            </div>

            ";
        // line 42
        yield "            <div class=\"stats-card\">
                <div class=\"stat-value\">";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::reduce($this->env, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 43, $this->source); })()), function ($__sum__, $__r__) use ($context, $macros) { $context["sum"] = $__sum__; $context["r"] = $__r__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 43, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["r"]) || array_key_exists("r", $context) ? $context["r"] : (function () { throw new RuntimeError('Variable "r" does not exist.', 43, $this->source); })()), "totalGlucides", [], "any", false, false, false, 43)); }, 0), "html", null, true);
        yield "g</div>
                <div class=\"stat-label\">Objectif: 250g</div>
                <div class=\"stat-progress\">
                    ";
        // line 46
        $context["carbsPercent"] = Twig\Extension\CoreExtension::round(((Twig\Extension\CoreExtension::reduce($this->env, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 46, $this->source); })()), function ($__sum__, $__r__) use ($context, $macros) { $context["sum"] = $__sum__; $context["r"] = $__r__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 46, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["r"]) || array_key_exists("r", $context) ? $context["r"] : (function () { throw new RuntimeError('Variable "r" does not exist.', 46, $this->source); })()), "totalGlucides", [], "any", false, false, false, 46)); }, 0) / 250) * 100), 0);
        // line 47
        yield "                    <div class=\"stat-progress-bar progress-green\" style=\"width: ";
        yield ((((isset($context["carbsPercent"]) || array_key_exists("carbsPercent", $context) ? $context["carbsPercent"] : (function () { throw new RuntimeError('Variable "carbsPercent" does not exist.', 47, $this->source); })()) > 100)) ? (100) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["carbsPercent"]) || array_key_exists("carbsPercent", $context) ? $context["carbsPercent"] : (function () { throw new RuntimeError('Variable "carbsPercent" does not exist.', 47, $this->source); })()), "html", null, true)));
        yield "%;\"></div>
                </div>
            </div>

            ";
        // line 52
        yield "            <div class=\"stats-card\">
                <div class=\"stat-value\">";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::reduce($this->env, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 53, $this->source); })()), function ($__sum__, $__r__) use ($context, $macros) { $context["sum"] = $__sum__; $context["r"] = $__r__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 53, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["r"]) || array_key_exists("r", $context) ? $context["r"] : (function () { throw new RuntimeError('Variable "r" does not exist.', 53, $this->source); })()), "totalLipides", [], "any", false, false, false, 53)); }, 0), "html", null, true);
        yield "g</div>
                <div class=\"stat-label\">Objectif: 80g</div>
                <div class=\"stat-progress\">
                    ";
        // line 56
        $context["fatsPercent"] = Twig\Extension\CoreExtension::round(((Twig\Extension\CoreExtension::reduce($this->env, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 56, $this->source); })()), function ($__sum__, $__r__) use ($context, $macros) { $context["sum"] = $__sum__; $context["r"] = $__r__; return ((isset($context["sum"]) || array_key_exists("sum", $context) ? $context["sum"] : (function () { throw new RuntimeError('Variable "sum" does not exist.', 56, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["r"]) || array_key_exists("r", $context) ? $context["r"] : (function () { throw new RuntimeError('Variable "r" does not exist.', 56, $this->source); })()), "totalLipides", [], "any", false, false, false, 56)); }, 0) / 80) * 100), 0);
        // line 57
        yield "                    <div class=\"stat-progress-bar progress-orange\" style=\"width: ";
        yield ((((isset($context["fatsPercent"]) || array_key_exists("fatsPercent", $context) ? $context["fatsPercent"] : (function () { throw new RuntimeError('Variable "fatsPercent" does not exist.', 57, $this->source); })()) > 100)) ? (100) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["fatsPercent"]) || array_key_exists("fatsPercent", $context) ? $context["fatsPercent"] : (function () { throw new RuntimeError('Variable "fatsPercent" does not exist.', 57, $this->source); })()), "html", null, true)));
        yield "%;\"></div>
                </div>
            </div>
        </div>

        ";
        // line 63
        yield "        <div style=\"display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;\">
            <h2 style=\"font-size: 20px; font-weight: 700; color: var(--text-primary);\">Tous les Repas</h2>
            <div style=\"display: flex; gap: 12px; align-items: center;\">
                <a href=\"";
        // line 66
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_repas_pdf");
        yield "\" class=\"btn btn-outline\" style=\"display: flex; align-items: center; gap: 8px; padding: 10px 16px; border: 2px solid #e5e7eb; border-radius: 8px; text-decoration: none; color: #6b7280; transition: all 0.3s ease;\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px;\">
                        <path d=\"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4\"/>
                        <polyline points=\"7 10 12 15 17 10\"/>
                        <line x1=\"12\" y1=\"15\" x2=\"12\" y2=\"3\"/>
                    </svg>
                    Exporter PDF
                </a>
                <a href=\"";
        // line 74
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_repas_new");
        yield "\" class=\"btn btn-success\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/>
                        <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
                    </svg>
                    Ajouter un Repas
                </a>
            </div>
        </div>

        ";
        // line 85
        yield "        <div style=\"background: white; padding: 20px; border-radius: 12px; border: 1px solid #e5e7eb; margin-bottom: 24px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);\">
            <div style=\"display: flex; gap: 16px; align-items: center; flex-wrap: wrap;\">
                ";
        // line 88
        yield "                <div style=\"flex: 1; min-width: 300px; position: relative;\">
                    <input type=\"text\" id=\"searchInput\" placeholder=\"Rechercher des repas...\" style=\"width: 100%; padding: 12px 16px 12px 44px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.95rem; transition: all 0.3s ease;\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#9ca3af\" style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px;\">
                        <circle cx=\"11\" cy=\"11\" r=\"8\"/>
                        <path d=\"m21 21-4.35-4.35\"/>
                    </svg>
                </div>

                ";
        // line 97
        yield "                <div style=\"display: flex; gap: 8px;\">
                    <button id=\"sortAsc\" class=\"btn btn-outline\" style=\"display: flex; align-items: center; gap: 8px; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; background: white; color: #6b7280; cursor: pointer; transition: all 0.3s ease;\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px;\">
                            <path d=\"M3 7h18M3 12h18M3 17h18\"/>
                            <path d=\"M7 3v18M17 3v18\"/>
                        </svg>
                        Trier A-Z
                    </button>
                    <button id=\"sortDesc\" class=\"btn btn-outline\" style=\"display: flex; align-items: center; gap: 8px; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; background: white; color: #6b7280; cursor: pointer; transition: all 0.3s ease;\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px;\">
                            <path d=\"M3 7h18M3 12h18M3 17h18\"/>
                            <path d=\"M7 3v18M17 3v18\"/>
                        </svg>
                        Trier Z-A
                    </button>
                </div>

                ";
        // line 115
        yield "                <button id=\"sortDate\" class=\"btn btn-outline\" style=\"display: flex; align-items: center; gap: 8px; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; background: white; color: #6b7280; cursor: pointer; transition: all 0.3s ease;\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px;\">
                        <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                        <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                        <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                        <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                    </svg>
                    Trier par Date
                </button>
            </div>
        </div>

        ";
        // line 128
        yield "        <div class=\"meal-list\">
            ";
        // line 129
        if ((array_key_exists("repas", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 129, $this->source); })())) > 0))) {
            // line 130
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 130, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
                // line 131
                yield "                    <div class=\"meal-card\" data-id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "id", [], "any", false, false, false, 131), "html", null, true);
                yield "\">
                        <div class=\"meal-icon\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                                <path d=\"M7 2v20\"/>
                                <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                            </svg>
                        </div>
                        <div class=\"meal-info\">
                            <div class=\"meal-name\" title=\"Voir les détails du repas\">";
                // line 140
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "titreRepas", [], "any", false, false, false, 140), "html", null, true);
                yield "</div>
                            <div class=\"meal-macros\">";
                // line 141
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalCalories", [], "any", true, true, false, 141)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalCalories", [], "any", false, false, false, 141), 0)) : (0)), "html", null, true);
                yield " cal  P: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalProteines", [], "any", true, true, false, 141)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalProteines", [], "any", false, false, false, 141), 0)) : (0)), "html", null, true);
                yield "g  C: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalGlucides", [], "any", true, true, false, 141)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalGlucides", [], "any", false, false, false, 141), 0)) : (0)), "html", null, true);
                yield "g  F: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalLipides", [], "any", true, true, false, 141)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalLipides", [], "any", false, false, false, 141), 0)) : (0)), "html", null, true);
                yield "g</div>
                        </div>
                        <div class=\"meal-time\" title=\"Voir les détails du repas\">";
                // line 143
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "dateConsommation", [], "any", false, false, false, 143), "H:i"), "html", null, true);
                yield "</div>
                        <div class=\"meal-actions\">
                            <a href=\"";
                // line 145
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_repas_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["r"], "id", [], "any", false, false, false, 145)]), "html", null, true);
                yield "\" class=\"icon-btn icon-btn-edit\" style=\"text-decoration: none; display: inline-flex; align-items: center; justify-content: center;\" title=\"Voir les détails du repas\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                    <path d=\"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z\"/>
                                    <circle cx=\"12\" cy=\"12\" r=\"3\"/>
                                </svg>
                            </a>
                            <a href=\"";
                // line 151
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_repas_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["r"], "id", [], "any", false, false, false, 151)]), "html", null, true);
                yield "\" class=\"icon-btn icon-btn-edit\" style=\"text-decoration: none; display: inline-flex; align-items: center; justify-content: center; margin-left: 8px;\" title=\"Modifier le repas\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                    <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                    <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                                </svg>
                            </a>
                            <form method=\"post\" action=\"";
                // line 157
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_repas_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["r"], "id", [], "any", false, false, false, 157)]), "html", null, true);
                yield "\" style=\"display: inline-block; margin-left: 8px;\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer ce repas ?');\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
                // line 158
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["r"], "id", [], "any", false, false, false, 158))), "html", null, true);
                yield "\">
                                <button type=\"submit\" class=\"icon-btn icon-btn-delete\" style=\"border: none; background: none; cursor: pointer; display: inline-flex; align-items: center; justify-content: center;\" title=\"Supprimer le repas\">
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
            unset($context['_seq'], $context['_key'], $context['r'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 169
            yield "            ";
        } else {
            // line 170
            yield "                <div class=\"meal-card\">
                    <div class=\"meal-info\">
                        <div class=\"meal-name\">Aucun repas trouvé</div>
                        <div class=\"meal-macros\">Commencez par ajouter votre premier repas</div>
                    </div>
                </div>
            ";
        }
        // line 177
        yield "        </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 180
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

        // line 181
        yield "<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const sortAscBtn = document.getElementById('sortAsc');
    const sortDescBtn = document.getElementById('sortDesc');
    const sortDateBtn = document.getElementById('sortDate');
    const mealList = document.querySelector('.meal-list');
    let currentSort = 'none';
    
    // Données des repas (uniquement les repas valides)
    let repasData = [
        ";
        // line 192
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 192, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
            // line 193
            yield "        {
            id: ";
            // line 194
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "id", [], "any", false, false, false, 194), "html", null, true);
            yield ",
            titre: \"";
            // line 195
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "titreRepas", [], "any", false, false, false, 195), "js"), "html", null, true);
            yield "\",
            date: \"";
            // line 196
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "dateConsommation", [], "any", false, false, false, 196), "Y-m-d H:i:s"), "html", null, true);
            yield "\",
            calories: ";
            // line 197
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalCalories", [], "any", true, true, false, 197)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalCalories", [], "any", false, false, false, 197), 0)) : (0)), "html", null, true);
            yield ",
            proteines: ";
            // line 198
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalProteines", [], "any", true, true, false, 198)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalProteines", [], "any", false, false, false, 198), 0)) : (0)), "html", null, true);
            yield ",
            glucides: ";
            // line 199
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalGlucides", [], "any", true, true, false, 199)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalGlucides", [], "any", false, false, false, 199), 0)) : (0)), "html", null, true);
            yield ",
            lipides: ";
            // line 200
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalLipides", [], "any", true, true, false, 200)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "totalLipides", [], "any", false, false, false, 200), 0)) : (0)), "html", null, true);
            yield ",
            typeMoment: \"";
            // line 201
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["r"], "typeMoment", [], "any", false, true, false, 201), "label", [], "any", true, true, false, 201)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["r"], "typeMoment", [], "any", false, false, false, 201), "label", [], "any", false, false, false, 201), "")) : ("")), "js"), "html", null, true);
            yield "\"
        },
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['r'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 204
        yield "    ];

    // Fonction pour afficher les repas (sans liens pour éviter les erreurs)
    function displayRepas(repas) {
        if (repas.length === 0) {
            mealList.innerHTML = `
                <div class=\"meal-card\">
                    <div class=\"meal-info\">
                        <div class=\"meal-name\">Aucun repas trouvé</div>
                        <div class=\"meal-macros\">Essayez d'ajuster votre recherche ou vos filtres</div>
                    </div>
                </div>
            `;
            return;
        }

        mealList.innerHTML = repas.map(r => `
            <div class=\"meal-card\" data-id=\"\${r.id}\">
                <div class=\"meal-icon\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                        <path d=\"M7 2v20\"/>
                        <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                    </svg>
                </div>
                <div class=\"meal-info\">
                    <div class=\"meal-name\">\${r.titre}</div>
                    <div class=\"meal-macros\">\${r.calories} cal  P: \${r.proteines}g  C: \${r.glucides}g  F: \${r.lipides}g</div>
                </div>
                <div class=\"meal-time\">\${new Date(r.date).toLocaleTimeString('fr-FR', {hour: '2-digit', minute: '2-digit'})}</div>
                <div class=\"meal-actions\">
                    <a href=\"/repas/\${r.id}/show\" class=\"icon-btn icon-btn-edit\" style=\"text-decoration: none; display: inline-flex; align-items: center; justify-content: center;\" title=\"Voir les détails du repas\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z\"/>
                            <circle cx=\"12\" cy=\"12\" r=\"3\"/>
                        </svg>
                    </a>
                    <a href=\"/repas/\${r.id}/edit\" class=\"icon-btn icon-btn-edit\" style=\"text-decoration: none; display: inline-flex; align-items: center; justify-content: center; margin-left: 8px;\" title=\"Modifier le repas\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                            <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                        </svg>
                    </a>
                    <form method=\"post\" action=\"/repas/\${r.id}\" style=\"display: inline-block; margin-left: 8px;\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer ce repas ?');\">
                        <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
        // line 249
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("delete"), "html", null, true);
        yield "\">
                        <button type=\"submit\" class=\"icon-btn icon-btn-delete\" style=\"border: none; background: none; cursor: pointer; display: inline-flex; align-items: center; justify-content: center;\" title=\"Supprimer le repas\">
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
    function searchRepas(query) {
        if (!query) {
            return repasData;
        }
        
        const lowerQuery = query.toLowerCase();
        return repasData.filter(r => 
            r.titre.toLowerCase().includes(lowerQuery) ||
            r.typeMoment.toLowerCase().includes(lowerQuery) ||
            r.calories.toString().includes(lowerQuery)
        );
    }

    // Fonctions de tri
    function sortRepas(repas, type) {
        const sorted = [...repas];
        
        switch(type) {
            case 'asc':
                return sorted.sort((a, b) => a.titre.localeCompare(b.titre));
            case 'desc':
                return sorted.sort((a, b) => b.titre.localeCompare(a.titre));
            case 'date':
                return sorted.sort((a, b) => new Date(b.date) - new Date(a.date));
            default:
                return sorted;
        }
    }

    // Gestionnaire de recherche
    searchInput.addEventListener('input', function() {
        const query = this.value;
        const filtered = searchRepas(query);
        const sorted = sortRepas(filtered, currentSort);
        displayRepas(sorted);
    });

    // Gestionnaires de tri
    sortAscBtn.addEventListener('click', function() {
        currentSort = 'asc';
        updateButtonStyles(this);
        const filtered = searchRepas(searchInput.value);
        const sorted = sortRepas(filtered, 'asc');
        displayRepas(sorted);
    });

    sortDescBtn.addEventListener('click', function() {
        currentSort = 'desc';
        updateButtonStyles(this);
        const filtered = searchRepas(searchInput.value);
        const sorted = sortRepas(filtered, 'desc');
        displayRepas(sorted);
    });

    sortDateBtn.addEventListener('click', function() {
        currentSort = 'date';
        updateButtonStyles(this);
        const filtered = searchRepas(searchInput.value);
        const sorted = sortRepas(filtered, 'date');
        displayRepas(sorted);
    });

    // Mettre à jour les styles des boutons
    function updateButtonStyles(activeBtn) {
        [sortAscBtn, sortDescBtn, sortDateBtn].forEach(btn => {
            if (btn === activeBtn) {
                btn.style.background = '#3b82f6';
                btn.style.color = 'white';
                btn.style.borderColor = '#3b82f6';
            } else {
                btn.style.background = 'white';
                btn.style.color = '#6b7280';
                btn.style.borderColor = '#e5e7eb';
            }
        });
    }

    // Effets de survol pour les boutons
    [sortAscBtn, sortDescBtn, sortDateBtn].forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            if (this.style.background !== 'rgb(59, 130, 246)') {
                this.style.borderColor = '#9ca3af';
                this.style.transform = 'translateY(-1px)';
            }
        });
        
        btn.addEventListener('mouseleave', function() {
            if (this.style.background !== 'rgb(59, 130, 246)') {
                this.style.borderColor = '#e5e7eb';
                this.style.transform = 'translateY(0)';
            }
        });
    });

    // Effet de survol pour le champ de recherche
    searchInput.addEventListener('focus', function() {
        this.style.borderColor = '#3b82f6';
        this.style.boxShadow = '0 0 0 3px rgba(59, 130, 246, 0.1)';
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
        return "repas/index.html.twig";
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
        return array (  496 => 249,  449 => 204,  440 => 201,  436 => 200,  432 => 199,  428 => 198,  424 => 197,  420 => 196,  416 => 195,  412 => 194,  409 => 193,  405 => 192,  392 => 181,  379 => 180,  367 => 177,  358 => 170,  355 => 169,  338 => 158,  334 => 157,  325 => 151,  316 => 145,  311 => 143,  300 => 141,  296 => 140,  283 => 131,  278 => 130,  276 => 129,  273 => 128,  259 => 115,  240 => 97,  230 => 88,  226 => 85,  213 => 74,  202 => 66,  197 => 63,  188 => 57,  186 => 56,  180 => 53,  177 => 52,  169 => 47,  167 => 46,  161 => 43,  158 => 42,  150 => 37,  148 => 36,  142 => 33,  139 => 32,  131 => 27,  129 => 26,  123 => 23,  113 => 15,  110 => 13,  103 => 7,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Gérer Les Repas - BioSync{% endblock %}

{% block body %}
        {# Page Header #}
        <div class=\"page-header\">
            <h1 class=\"page-title\">Gérer Les Repas</h1>
            <p class=\"page-subtitle\">Gérez vos repas et votre suivi nutritionnel</p>
        </div>

        {# Stats Grid #}
        <div class=\"grid-4\" style=\"margin-bottom: 32px;\">
            {# Calories Card with Daily Target #}
            <div class=\"stats-card\">
                <div class=\"stat-icon calories\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                        <path d=\"M7 2v20\"/>
                        <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                    </svg>
                </div>
                <div class=\"stat-value\">{{ repas|reduce((sum, r) => sum + r.totalCalories, 0) }}</div>
                <div class=\"stat-label\">sur 2450 cal</div>
                <div class=\"stat-progress\">
                    {% set caloriesPercent = (repas|reduce((sum, r) => sum + r.totalCalories, 0) / 2450 * 100)|round(0) %}
                    <div class=\"stat-progress-bar progress-green\" style=\"width: {{ caloriesPercent > 100 ? 100 : caloriesPercent }}%;\"></div>
                </div>
            </div>

            {# Protein Card with Target #}
            <div class=\"stats-card\">
                <div class=\"stat-value\">{{ repas|reduce((sum, r) => sum + r.totalProteines, 0) }}g</div>
                <div class=\"stat-label\">Objectif: 150g</div>
                <div class=\"stat-progress\">
                    {% set proteinPercent = (repas|reduce((sum, r) => sum + r.totalProteines, 0) / 150 * 100)|round(0) %}
                    <div class=\"stat-progress-bar progress-blue\" style=\"width: {{ proteinPercent > 100 ? 100 : proteinPercent }}%;\"></div>
                </div>
            </div>

            {# Carbs Card with Target #}
            <div class=\"stats-card\">
                <div class=\"stat-value\">{{ repas|reduce((sum, r) => sum + r.totalGlucides, 0) }}g</div>
                <div class=\"stat-label\">Objectif: 250g</div>
                <div class=\"stat-progress\">
                    {% set carbsPercent = (repas|reduce((sum, r) => sum + r.totalGlucides, 0) / 250 * 100)|round(0) %}
                    <div class=\"stat-progress-bar progress-green\" style=\"width: {{ carbsPercent > 100 ? 100 : carbsPercent }}%;\"></div>
                </div>
            </div>

            {# Fats Card with Target #}
            <div class=\"stats-card\">
                <div class=\"stat-value\">{{ repas|reduce((sum, r) => sum + r.totalLipides, 0) }}g</div>
                <div class=\"stat-label\">Objectif: 80g</div>
                <div class=\"stat-progress\">
                    {% set fatsPercent = (repas|reduce((sum, r) => sum + r.totalLipides, 0) / 80 * 100)|round(0) %}
                    <div class=\"stat-progress-bar progress-orange\" style=\"width: {{ fatsPercent > 100 ? 100 : fatsPercent }}%;\"></div>
                </div>
            </div>
        </div>

        {# Meals Section #}
        <div style=\"display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;\">
            <h2 style=\"font-size: 20px; font-weight: 700; color: var(--text-primary);\">Tous les Repas</h2>
            <div style=\"display: flex; gap: 12px; align-items: center;\">
                <a href=\"{{ path('app_repas_pdf') }}\" class=\"btn btn-outline\" style=\"display: flex; align-items: center; gap: 8px; padding: 10px 16px; border: 2px solid #e5e7eb; border-radius: 8px; text-decoration: none; color: #6b7280; transition: all 0.3s ease;\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px;\">
                        <path d=\"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4\"/>
                        <polyline points=\"7 10 12 15 17 10\"/>
                        <line x1=\"12\" y1=\"15\" x2=\"12\" y2=\"3\"/>
                    </svg>
                    Exporter PDF
                </a>
                <a href=\"{{ path('app_repas_new') }}\" class=\"btn btn-success\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/>
                        <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
                    </svg>
                    Ajouter un Repas
                </a>
            </div>
        </div>

        {# Search and Filters Bar #}
        <div style=\"background: white; padding: 20px; border-radius: 12px; border: 1px solid #e5e7eb; margin-bottom: 24px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);\">
            <div style=\"display: flex; gap: 16px; align-items: center; flex-wrap: wrap;\">
                {# Search Input #}
                <div style=\"flex: 1; min-width: 300px; position: relative;\">
                    <input type=\"text\" id=\"searchInput\" placeholder=\"Rechercher des repas...\" style=\"width: 100%; padding: 12px 16px 12px 44px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.95rem; transition: all 0.3s ease;\">
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
                        Trier A-Z
                    </button>
                    <button id=\"sortDesc\" class=\"btn btn-outline\" style=\"display: flex; align-items: center; gap: 8px; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; background: white; color: #6b7280; cursor: pointer; transition: all 0.3s ease;\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px;\">
                            <path d=\"M3 7h18M3 12h18M3 17h18\"/>
                            <path d=\"M7 3v18M17 3v18\"/>
                        </svg>
                        Trier Z-A
                    </button>
                </div>

                {# Date Sort #}
                <button id=\"sortDate\" class=\"btn btn-outline\" style=\"display: flex; align-items: center; gap: 8px; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; background: white; color: #6b7280; cursor: pointer; transition: all 0.3s ease;\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px;\">
                        <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                        <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                        <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                        <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                    </svg>
                    Trier par Date
                </button>
            </div>
        </div>

        {# Meals List #}
        <div class=\"meal-list\">
            {% if repas is defined and repas|length > 0 %}
                {% for r in repas %}
                    <div class=\"meal-card\" data-id=\"{{ r.id }}\">
                        <div class=\"meal-icon\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                                <path d=\"M7 2v20\"/>
                                <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                            </svg>
                        </div>
                        <div class=\"meal-info\">
                            <div class=\"meal-name\" title=\"Voir les détails du repas\">{{ r.titreRepas }}</div>
                            <div class=\"meal-macros\">{{ r.totalCalories|default(0) }} cal  P: {{ r.totalProteines|default(0) }}g  C: {{ r.totalGlucides|default(0) }}g  F: {{ r.totalLipides|default(0) }}g</div>
                        </div>
                        <div class=\"meal-time\" title=\"Voir les détails du repas\">{{ r.dateConsommation|date('H:i') }}</div>
                        <div class=\"meal-actions\">
                            <a href=\"{{ path('app_repas_show', {'id': r.id}) }}\" class=\"icon-btn icon-btn-edit\" style=\"text-decoration: none; display: inline-flex; align-items: center; justify-content: center;\" title=\"Voir les détails du repas\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                    <path d=\"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z\"/>
                                    <circle cx=\"12\" cy=\"12\" r=\"3\"/>
                                </svg>
                            </a>
                            <a href=\"{{ path('app_repas_edit', {'id': r.id}) }}\" class=\"icon-btn icon-btn-edit\" style=\"text-decoration: none; display: inline-flex; align-items: center; justify-content: center; margin-left: 8px;\" title=\"Modifier le repas\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                    <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                    <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                                </svg>
                            </a>
                            <form method=\"post\" action=\"{{ path('app_repas_delete', {'id': r.id}) }}\" style=\"display: inline-block; margin-left: 8px;\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer ce repas ?');\">
                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ r.id) }}\">
                                <button type=\"submit\" class=\"icon-btn icon-btn-delete\" style=\"border: none; background: none; cursor: pointer; display: inline-flex; align-items: center; justify-content: center;\" title=\"Supprimer le repas\">
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
                <div class=\"meal-card\">
                    <div class=\"meal-info\">
                        <div class=\"meal-name\">Aucun repas trouvé</div>
                        <div class=\"meal-macros\">Commencez par ajouter votre premier repas</div>
                    </div>
                </div>
            {% endif %}
        </div>
{% endblock %}

{% block javascripts %}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const sortAscBtn = document.getElementById('sortAsc');
    const sortDescBtn = document.getElementById('sortDesc');
    const sortDateBtn = document.getElementById('sortDate');
    const mealList = document.querySelector('.meal-list');
    let currentSort = 'none';
    
    // Données des repas (uniquement les repas valides)
    let repasData = [
        {% for r in repas %}
        {
            id: {{ r.id }},
            titre: \"{{ r.titreRepas|e('js') }}\",
            date: \"{{ r.dateConsommation|date('Y-m-d H:i:s') }}\",
            calories: {{ r.totalCalories|default(0) }},
            proteines: {{ r.totalProteines|default(0) }},
            glucides: {{ r.totalGlucides|default(0) }},
            lipides: {{ r.totalLipides|default(0) }},
            typeMoment: \"{{ r.typeMoment.label|default('')|e('js') }}\"
        },
        {% endfor %}
    ];

    // Fonction pour afficher les repas (sans liens pour éviter les erreurs)
    function displayRepas(repas) {
        if (repas.length === 0) {
            mealList.innerHTML = `
                <div class=\"meal-card\">
                    <div class=\"meal-info\">
                        <div class=\"meal-name\">Aucun repas trouvé</div>
                        <div class=\"meal-macros\">Essayez d'ajuster votre recherche ou vos filtres</div>
                    </div>
                </div>
            `;
            return;
        }

        mealList.innerHTML = repas.map(r => `
            <div class=\"meal-card\" data-id=\"\${r.id}\">
                <div class=\"meal-icon\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                        <path d=\"M7 2v20\"/>
                        <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                    </svg>
                </div>
                <div class=\"meal-info\">
                    <div class=\"meal-name\">\${r.titre}</div>
                    <div class=\"meal-macros\">\${r.calories} cal  P: \${r.proteines}g  C: \${r.glucides}g  F: \${r.lipides}g</div>
                </div>
                <div class=\"meal-time\">\${new Date(r.date).toLocaleTimeString('fr-FR', {hour: '2-digit', minute: '2-digit'})}</div>
                <div class=\"meal-actions\">
                    <a href=\"/repas/\${r.id}/show\" class=\"icon-btn icon-btn-edit\" style=\"text-decoration: none; display: inline-flex; align-items: center; justify-content: center;\" title=\"Voir les détails du repas\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z\"/>
                            <circle cx=\"12\" cy=\"12\" r=\"3\"/>
                        </svg>
                    </a>
                    <a href=\"/repas/\${r.id}/edit\" class=\"icon-btn icon-btn-edit\" style=\"text-decoration: none; display: inline-flex; align-items: center; justify-content: center; margin-left: 8px;\" title=\"Modifier le repas\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                            <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                        </svg>
                    </a>
                    <form method=\"post\" action=\"/repas/\${r.id}\" style=\"display: inline-block; margin-left: 8px;\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer ce repas ?');\">
                        <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete') }}\">
                        <button type=\"submit\" class=\"icon-btn icon-btn-delete\" style=\"border: none; background: none; cursor: pointer; display: inline-flex; align-items: center; justify-content: center;\" title=\"Supprimer le repas\">
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
    function searchRepas(query) {
        if (!query) {
            return repasData;
        }
        
        const lowerQuery = query.toLowerCase();
        return repasData.filter(r => 
            r.titre.toLowerCase().includes(lowerQuery) ||
            r.typeMoment.toLowerCase().includes(lowerQuery) ||
            r.calories.toString().includes(lowerQuery)
        );
    }

    // Fonctions de tri
    function sortRepas(repas, type) {
        const sorted = [...repas];
        
        switch(type) {
            case 'asc':
                return sorted.sort((a, b) => a.titre.localeCompare(b.titre));
            case 'desc':
                return sorted.sort((a, b) => b.titre.localeCompare(a.titre));
            case 'date':
                return sorted.sort((a, b) => new Date(b.date) - new Date(a.date));
            default:
                return sorted;
        }
    }

    // Gestionnaire de recherche
    searchInput.addEventListener('input', function() {
        const query = this.value;
        const filtered = searchRepas(query);
        const sorted = sortRepas(filtered, currentSort);
        displayRepas(sorted);
    });

    // Gestionnaires de tri
    sortAscBtn.addEventListener('click', function() {
        currentSort = 'asc';
        updateButtonStyles(this);
        const filtered = searchRepas(searchInput.value);
        const sorted = sortRepas(filtered, 'asc');
        displayRepas(sorted);
    });

    sortDescBtn.addEventListener('click', function() {
        currentSort = 'desc';
        updateButtonStyles(this);
        const filtered = searchRepas(searchInput.value);
        const sorted = sortRepas(filtered, 'desc');
        displayRepas(sorted);
    });

    sortDateBtn.addEventListener('click', function() {
        currentSort = 'date';
        updateButtonStyles(this);
        const filtered = searchRepas(searchInput.value);
        const sorted = sortRepas(filtered, 'date');
        displayRepas(sorted);
    });

    // Mettre à jour les styles des boutons
    function updateButtonStyles(activeBtn) {
        [sortAscBtn, sortDescBtn, sortDateBtn].forEach(btn => {
            if (btn === activeBtn) {
                btn.style.background = '#3b82f6';
                btn.style.color = 'white';
                btn.style.borderColor = '#3b82f6';
            } else {
                btn.style.background = 'white';
                btn.style.color = '#6b7280';
                btn.style.borderColor = '#e5e7eb';
            }
        });
    }

    // Effets de survol pour les boutons
    [sortAscBtn, sortDescBtn, sortDateBtn].forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            if (this.style.background !== 'rgb(59, 130, 246)') {
                this.style.borderColor = '#9ca3af';
                this.style.transform = 'translateY(-1px)';
            }
        });
        
        btn.addEventListener('mouseleave', function() {
            if (this.style.background !== 'rgb(59, 130, 246)') {
                this.style.borderColor = '#e5e7eb';
                this.style.transform = 'translateY(0)';
            }
        });
    });

    // Effet de survol pour le champ de recherche
    searchInput.addEventListener('focus', function() {
        this.style.borderColor = '#3b82f6';
        this.style.boxShadow = '0 0 0 3px rgba(59, 130, 246, 0.1)';
    });

    searchInput.addEventListener('blur', function() {
        this.style.borderColor = '#e5e7eb';
        this.style.boxShadow = 'none';
    });
});
</script>
{% endblock %}", "repas/index.html.twig", "C:\\biosync_new\\templates\\repas\\index.html.twig");
    }
}
