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

/* repas/show.html.twig */
class __TwigTemplate_1183b870bba1a2ca56adb477ade20cd3 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "repas/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "repas/show.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 3, $this->source); })()), "titreRepas", [], "any", false, false, false, 3), "html", null, true);
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
        yield from $this->load("partials/_sidebar.html.twig", 7)->unwrap()->yield(CoreExtension::merge($context, ["active" => "repas"]));
        // line 8
        yield "
    <main class=\"main-content\">
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 12, $this->source); })()), "titreRepas", [], "any", false, false, false, 12), "html", null, true);
        yield "</h1>
                <p class=\"page-subtitle\">";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 13, $this->source); })()), "typeMoment", [], "any", false, false, false, 13), "label", [], "any", false, false, false, 13), "html", null, true);
        yield " - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 13, $this->source); })()), "dateConsommation", [], "any", false, false, false, 13), "d/m/Y H:i"), "html", null, true);
        yield "</p>
            </div>
            <div style=\"display: flex; gap: 0.5rem;\">
                <a href=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_meal_foods", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 16, $this->source); })()), "id", [], "any", false, false, false, 16)]), "html", null, true);
        yield "\" class=\"btn btn-primary\">Retour</a>
            </div>
        </div>

        <div style=\"display: flex; flex-direction: column; align-items: center; gap: 40px; padding: 20px;\">
            <div style=\"max-width: 1200px; width: 100%;\">
                <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 32px;\">
                    ";
        // line 24
        yield "                    <div class=\"card card-hover\">
                        <div class=\"card-header\" style=\"padding-bottom: 16px; border-bottom: 1px solid var(--border-color);\">
                            <div style=\"display: flex; align-items: center; gap: 16px;\">
                                <div style=\"width: 56px; height: 56px; background: var(--bg-blue-light); border-radius: 16px; display: flex; align-items: center; justify-content: center;\">
                                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--primary-blue)\" style=\"width: 28px; height: 28px;\">
                                        <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                                        <path d=\"M7 2v20\"/>
                                        <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class=\"card-title\" style=\"font-size: 1.5rem; font-weight: 700; color: var(--text-primary); margin: 0;\">Détails du Repas</h3>
                                    <p style=\"color: var(--text-secondary); font-size: 0.875rem; margin: 4px 0 0 0;\">Informations complètes du repas</p>
                                </div>
                            </div>
                        </div>

                        <div class=\"card-content\" style=\"padding-top: 16px;\">
                            <div style=\"display: flex; flex-direction: column; gap: 16px;\">
                                <div style=\"display: flex; align-items: center; gap: 16px; padding: 16px; background: #F8FAFC; border-radius: 12px; border-left: 3px solid var(--primary-blue);\">
                                    <div style=\"width: 44px; height: 44px; background: var(--bg-blue-light); border-radius: 12px; display: flex; align-items: center; justify-content: center;\">
                                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--primary-blue)\" style=\"width: 22px; height: 22px;\">
                                            <path d=\"M12 2L2 7l10 5 10-5-10-5z\"/>
                                            <path d=\"M2 17l10 5 10-5\"/>
                                            <path d=\"M2 12l10 5 10-5\"/>
                                        </svg>
                                    </div>
                                    <div style=\"flex: 1;\">
                                        <div style=\"font-size: 0.875rem; color: var(--text-secondary); margin-bottom: 4px; font-weight: 500;\">Nom du Repas</div>
                                        <div style=\"font-size: 1.125rem; font-weight: 600; color: var(--text-primary);\">";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 53, $this->source); })()), "titreRepas", [], "any", false, false, false, 53), "html", null, true);
        yield "</div>
                                    </div>
                                </div>

                                <div style=\"display: flex; align-items: center; gap: 16px; padding: 16px; background: #F8FAFC; border-radius: 12px; border-left: 3px solid var(--primary-blue);\">
                                    <div style=\"width: 44px; height: 44px; background: var(--bg-blue-light); border-radius: 12px; display: flex; align-items: center; justify-content: center;\">
                                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--primary-blue)\" style=\"width: 22px; height: 22px;\">
                                            <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                                            <polyline points=\"12 6 12 12 16 14\"/>
                                        </svg>
                                    </div>
                                    <div style=\"flex: 1;\">
                                        <div style=\"font-size: 0.875rem; color: var(--text-secondary); margin-bottom: 4px; font-weight: 500;\">Moment</div>
                                        <div style=\"font-size: 1.125rem; font-weight: 600; color: var(--text-primary);\">";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 66, $this->source); })()), "typeMoment", [], "any", false, false, false, 66), "label", [], "any", false, false, false, 66), "html", null, true);
        yield "</div>
                                    </div>
                                </div>

                                <div style=\"display: flex; align-items: center; gap: 16px; padding: 16px; background: #F8FAFC; border-radius: 12px; border-left: 3px solid var(--primary-blue);\">
                                    <div style=\"width: 44px; height: 44px; background: var(--bg-blue-light); border-radius: 12px; display: flex; align-items: center; justify-content: center;\">
                                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--primary-blue)\" style=\"width: 22px; height: 22px;\">
                                            <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                                            <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                                            <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                                            <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                                        </svg>
                                    </div>
                                    <div style=\"flex: 1;\">
                                        <div style=\"font-size: 0.875rem; color: var(--text-secondary); margin-bottom: 4px; font-weight: 500;\">Date et Heure</div>
                                        <div style=\"font-size: 1.125rem; font-weight: 600; color: var(--text-primary);\">";
        // line 81
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 81, $this->source); })()), "dateConsommation", [], "any", false, false, false, 81), "d/m/Y H:i"), "html", null, true);
        yield "</div>
                                    </div>
                                </div>

                                <div style=\"display: flex; align-items: center; gap: 16px; padding: 16px; background: #F8FAFC; border-radius: 12px; border-left: 3px solid var(--primary-blue);\">
                                    <div style=\"width: 44px; height: 44px; background: var(--bg-blue-light); border-radius: 12px; display: flex; align-items: center; justify-content: center;\">
                                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--primary-blue)\" style=\"width: 22px; height: 22px;\">
                                            <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                                        </svg>
                                    </div>
                                    <div style=\"flex: 1;\">
                                        <div style=\"font-size: 0.875rem; color: var(--text-secondary); margin-bottom: 4px; font-weight: 500;\">Points Gagnés</div>
                                        <div style=\"font-size: 1.125rem; font-weight: 600; color: var(--text-primary);\">";
        // line 93
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 93, $this->source); })()), "pointsGagnes", [], "any", false, false, false, 93), "html", null, true);
        yield " points</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    ";
        // line 101
        yield "                    <div class=\"card card-hover\">
                        <div class=\"card-header\" style=\"padding-bottom: 16px; border-bottom: 1px solid var(--border-color);\">
                            <div style=\"display: flex; align-items: center; gap: 16px;\">
                                <div style=\"width: 56px; height: 56px; background: var(--bg-green-light); border-radius: 16px; display: flex; align-items: center; justify-content: center;\">
                                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#10B981\" style=\"width: 28px; height: 28px;\">
                                        <path d=\"M3 3v18h18\"/>
                                        <path d=\"M18 17V9\"/>
                                        <path d=\"M13 17V5\"/>
                                        <path d=\"M8 17v-3\"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class=\"card-title\" style=\"font-size: 1.5rem; font-weight: 700; color: var(--text-primary); margin: 0;\">Résumé Nutritionnel</h3>
                                    <p style=\"color: var(--text-secondary); font-size: 0.875rem; margin: 4px 0 0 0;\">Répartition des macronutriments</p>
                                </div>
                            </div>
                        </div>

                        <div class=\"card-content\" style=\"padding-top: 16px;\">
                            <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 16px;\">
                                <div style=\"text-align: center; padding: 24px; background: #F9FAFB; border-radius: 16px; border: 1px solid var(--border-color);\">
                                    <div style=\"font-size: 0.875rem; color: #991b1b; margin-bottom: 8px; font-weight: 600; letter-spacing: 0.5px;\">CALORIES</div>
                                    <div style=\"font-size: 2rem; font-weight: 800; color: #dc2626; margin-bottom: 12px; line-height: 1;\">";
        // line 123
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 123, $this->source); })()), "totalCalories", [], "any", false, false, false, 123), "html", null, true);
        yield "</div>
                                    <div style=\"width: 100%; height: 6px; background: var(--border-light); border-radius: 3px; overflow: hidden; margin-bottom: 6px;\">
                                        <div class=\"stat-progress-bar\" style=\"width: 65%; background: #EF4444;\"></div>
                                    </div>
                                    <div style=\"font-size: 0.75rem; color: #7f1d1d; font-weight: 500;\">65% de l'objectif quotidien</div>
                                </div>

                                <div style=\"text-align: center; padding: 24px; background: #F9FAFB; border-radius: 16px; border: 1px solid var(--border-color);\">
                                    <div style=\"font-size: 0.875rem; color: #1e3a8a; margin-bottom: 8px; font-weight: 600; letter-spacing: 0.5px;\">PROTÉINES</div>
                                    <div style=\"font-size: 2rem; font-weight: 800; color: #2563eb; margin-bottom: 12px; line-height: 1;\">";
        // line 132
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 132, $this->source); })()), "totalProteines", [], "any", false, false, false, 132), "html", null, true);
        yield "g</div>
                                    <div style=\"width: 100%; height: 6px; background: var(--border-light); border-radius: 3px; overflow: hidden; margin-bottom: 6px;\">
                                        <div class=\"stat-progress-bar progress-blue\" style=\"width: 75%;\"></div>
                                    </div>
                                    <div style=\"font-size: 0.75rem; color: #1e3a8a; font-weight: 500;\">75% de l'objectif quotidien</div>
                                </div>

                                <div style=\"text-align: center; padding: 24px; background: #F9FAFB; border-radius: 16px; border: 1px solid var(--border-color);\">
                                    <div style=\"font-size: 0.875rem; color: #14532d; margin-bottom: 8px; font-weight: 600; letter-spacing: 0.5px;\">GLUCIDES</div>
                                    <div style=\"font-size: 2rem; font-weight: 800; color: #16a34a; margin-bottom: 12px; line-height: 1;\">";
        // line 141
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 141, $this->source); })()), "totalGlucides", [], "any", false, false, false, 141), "html", null, true);
        yield "g</div>
                                    <div style=\"width: 100%; height: 6px; background: var(--border-light); border-radius: 3px; overflow: hidden; margin-bottom: 6px;\">
                                        <div class=\"stat-progress-bar progress-green\" style=\"width: 60%;\"></div>
                                    </div>
                                    <div style=\"font-size: 0.75rem; color: #14532d; font-weight: 500;\">60% de l'objectif quotidien</div>
                                </div>

                                <div style=\"text-align: center; padding: 24px; background: #F9FAFB; border-radius: 16px; border: 1px solid var(--border-color);\">
                                    <div style=\"font-size: 0.875rem; color: #7c2d12; margin-bottom: 8px; font-weight: 600; letter-spacing: 0.5px;\">LIPIDES</div>
                                    <div style=\"font-size: 2rem; font-weight: 800; color: #ea580c; margin-bottom: 12px; line-height: 1;\">";
        // line 150
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 150, $this->source); })()), "totalLipides", [], "any", false, false, false, 150), "html", null, true);
        yield "g</div>
                                    <div style=\"width: 100%; height: 6px; background: var(--border-light); border-radius: 3px; overflow: hidden; margin-bottom: 6px;\">
                                        <div class=\"stat-progress-bar progress-orange\" style=\"width: 45%;\"></div>
                                    </div>
                                    <div style=\"font-size: 0.75rem; color: #7c2d12; font-weight: 500;\">45% de l'objectif quotidien</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                ";
        // line 162
        yield "                <div style=\"max-width: 1200px; width: 100%;\">
                    <div class=\"card\" style=\"margin-top: 32px; border-radius: 12px;\">
                        <div class=\"card-header\" style=\"padding: 24px 32px; border-bottom: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center;\">
                            <h3 class=\"card-title\" style=\"font-size: 1.5rem; font-weight: 600; color: var(--text-primary); margin: 0;\">Aliments dans ce repas</h3>
                            <div style=\"display: flex; gap: 8px;\">
                                <a href=\"";
        // line 167
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_pdf", ["repas_id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 167, $this->source); })()), "id", [], "any", false, false, false, 167)]), "html", null, true);
        yield "\" class=\"btn btn-sm btn-outline\" style=\"display: flex; align-items: center; gap: 6px; padding: 8px 16px; border: 2px solid #e5e7eb; border-radius: 8px; background: white; color: #6b7280; text-decoration: none; transition: all 0.3s ease;\">
                                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 16px; height: 16px;\">
                                        <path d=\"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4\"/>
                                        <polyline points=\"7 10 12 15 17 10\"/>
                                        <line x1=\"12\" y1=\"15\" x2=\"12\" y2=\"3\"/>
                                    </svg>
                                    Exporter PDF
                                </a>
                                <a href=\"";
        // line 175
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_new", ["repas_id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 175, $this->source); })()), "id", [], "any", false, false, false, 175)]), "html", null, true);
        yield "\" class=\"btn btn-sm btn-primary\">Ajouter un Aliment</a>
                            </div>
                        </div>
                        
                        ";
        // line 180
        yield "                        <div style=\"background: white; padding: 20px 32px; border-bottom: 1px solid #e5e7eb;\">
                            <div style=\"display: flex; gap: 16px; align-items: center; flex-wrap: wrap;\">
                                ";
        // line 183
        yield "                                <div style=\"flex: 1; min-width: 300px; position: relative;\">
                                    <input type=\"text\" id=\"searchInput\" placeholder=\"Rechercher des aliments...\" style=\"width: 100%; padding: 12px 16px 12px 44px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.95rem; transition: all 0.3s ease;\">
                                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#9ca3af\" style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px;\">
                                        <circle cx=\"11\" cy=\"11\" r=\"8\"/>
                                        <path d=\"m21 21-4.35-4.35\"/>
                                    </svg>
                                </div>

                                ";
        // line 192
        yield "                                <div style=\"display: flex; gap: 8px;\">
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
                                    <button id=\"sortCalories\" class=\"btn btn-outline\" style=\"display: flex; align-items: center; gap: 8px; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; background: white; color: #6b7280; cursor: pointer; transition: all 0.3s ease;\">
                                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px;\">
                                            <path d=\"M13 2L3 14h9l-1 8 10-12h-9l1-8z\"/>
                                        </svg>
                                        Trier par Calories
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class=\"card-content\" style=\"padding: 32px;\">
                            ";
        // line 218
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["repa"] ?? null), "aliments", [], "any", true, true, false, 218) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 218, $this->source); })()), "aliments", [], "any", false, false, false, 218)) > 0))) {
            // line 219
            yield "                                <div class=\"meal-list\" id=\"alimentList\">
                                    ";
            // line 220
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 220, $this->source); })()), "aliments", [], "any", false, false, false, 220));
            foreach ($context['_seq'] as $context["_key"] => $context["aliment"]) {
                // line 221
                yield "                                        <div class=\"meal-card\" data-id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "id", [], "any", false, false, false, 221), "html", null, true);
                yield "\" data-name=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "nomAliment", [], "any", false, false, false, 221), "html", null, true);
                yield "\" data-calories=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "calories", [], "any", false, false, false, 221), "html", null, true);
                yield "\">
                                            <div class=\"meal-icon\">
                                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 24px; height: 24px; color: white;\">
                                                    <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                                                    <path d=\"M7 2v20\"/>
                                                    <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                                                </svg>
                                            </div>
                                            <div class=\"meal-info\">
                                                <div class=\"meal-name\">";
                // line 230
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "nomAliment", [], "any", false, false, false, 230), "html", null, true);
                yield "</div>
                                                <div class=\"meal-macros\">";
                // line 231
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "calories", [], "any", false, false, false, 231), "html", null, true);
                yield " cal  P: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "proteines", [], "any", true, true, false, 231)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "proteines", [], "any", false, false, false, 231), 0)) : (0)), "html", null, true);
                yield "g  C: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "glucides", [], "any", true, true, false, 231)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "glucides", [], "any", false, false, false, 231), 0)) : (0)), "html", null, true);
                yield "g  F: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "lipides", [], "any", true, true, false, 231)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "lipides", [], "any", false, false, false, 231), 0)) : (0)), "html", null, true);
                yield "g</div>
                                            </div>
                                            <div class=\"meal-actions\">
                                                <a href=\"";
                // line 234
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "id", [], "any", false, false, false, 234), "repas_id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 234, $this->source); })()), "id", [], "any", false, false, false, 234)]), "html", null, true);
                yield "\" class=\"icon-btn icon-btn-edit\" title=\"Edit\">
                                                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                                        <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                                        <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                                                    </svg>
                                                </a>
                                                <form method=\"post\" action=\"";
                // line 240
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "id", [], "any", false, false, false, 240)]), "html", null, true);
                yield "\" style=\"display: inline;\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cet aliment ?');\">
                                                    <input type=\"hidden\" name=\"_token\" value=\"";
                // line 241
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "id", [], "any", false, false, false, 241))), "html", null, true);
                yield "\">
                                                    <button type=\"submit\" class=\"icon-btn icon-btn-delete\" title=\"Supprimer\">
                                                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                                            <polyline points=\"3,6 5,6 21,6\"/>
                                                            <path d=\"m19,6v14a2,2 0 0,1 -2,2H7a2,2 0 0,1 -2,-2V6m3,0V4a2,2 0 0,1 2,-2h4a2,2 0 0,1 2,2v2\"/>
                                                            <line x1=\"10\" y1=\"11\" x2=\"10\" y2=\"17\"/>
                                                            <line x1=\"14\" y1=\"11\" x2=\"14\" y2=\"17\"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['aliment'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 254
            yield "                                </div>
                            ";
        } else {
            // line 256
            yield "                                <div class=\"empty-state\" style=\"text-align: center; padding: 40px;\">
                                    <p style=\"color: var(--text-secondary); margin-bottom: 16px;\">Aucun aliment ajouté à ce repas pour le moment.</p>
                                </div>
                            ";
        }
        // line 260
        yield "                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 269
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

        // line 270
        yield "<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const sortAscBtn = document.getElementById('sortAsc');
    const sortDescBtn = document.getElementById('sortDesc');
    const sortCaloriesBtn = document.getElementById('sortCalories');
    const alimentList = document.getElementById('alimentList');
    let currentSort = 'none';
    
    // Données des aliments
    let alimentsData = [
        ";
        // line 281
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 281, $this->source); })()), "aliments", [], "any", false, false, false, 281));
        foreach ($context['_seq'] as $context["_key"] => $context["aliment"]) {
            // line 282
            yield "        {
            id: ";
            // line 283
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "id", [], "any", false, false, false, 283), "html", null, true);
            yield ",
            nom: \"";
            // line 284
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "nomAliment", [], "any", false, false, false, 284), "js"), "html", null, true);
            yield "\",
            calories: ";
            // line 285
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "calories", [], "any", false, false, false, 285), "html", null, true);
            yield ",
            proteines: ";
            // line 286
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "proteines", [], "any", true, true, false, 286)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "proteines", [], "any", false, false, false, 286), 0)) : (0)), "html", null, true);
            yield ",
            glucides: ";
            // line 287
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "glucides", [], "any", true, true, false, 287)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "glucides", [], "any", false, false, false, 287), 0)) : (0)), "html", null, true);
            yield ",
            lipides: ";
            // line 288
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "lipides", [], "any", true, true, false, 288)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "lipides", [], "any", false, false, false, 288), 0)) : (0)), "html", null, true);
            yield ",
            csrfToken: \"";
            // line 289
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "id", [], "any", false, false, false, 289))), "html", null, true);
            yield "\"
        },
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['aliment'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 292
        yield "    ];

    // Fonction pour afficher les aliments
    function displayAliments(aliments) {
        if (aliments.length === 0) {
            alimentList.innerHTML = `
                <div class=\"empty-state\" style=\"text-align: center; padding: 40px;\">
                    <p style=\"color: var(--text-secondary); margin-bottom: 16px;\">Aucun aliment trouvé</p>
                    <p style=\"color: var(--text-secondary);\">Essayez d'ajuster votre recherche ou vos filtres</p>
                </div>
            `;
            return;
        }

        alimentList.innerHTML = aliments.map(a => `
            <div class=\"meal-card\" data-id=\"\${a.id}\">
                <div class=\"meal-icon\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 24px; height: 24px; color: white;\">
                        <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                        <path d=\"M7 2v20\"/>
                        <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                    </svg>
                </div>
                <div class=\"meal-info\">
                    <div class=\"meal-name\">\${a.nom}</div>
                    <div class=\"meal-macros\">\${a.calories} cal  P: \${a.proteines}g  C: \${a.glucides}g  F: \${a.lipides}g</div>
                </div>
                <div class=\"meal-actions\">
                    <a href=\"/aliment/\${a.id}/edit?repas_id=";
        // line 320
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 320, $this->source); })()), "id", [], "any", false, false, false, 320), "html", null, true);
        yield "\" class=\"icon-btn icon-btn-edit\" title=\"Modifier\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                            <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                        </svg>
                    </a>
                    <form method=\"post\" action=\"/aliment/\${a.id}\" style=\"display: inline;\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cet aliment ?');\">
                        <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                        <input type=\"hidden\" name=\"_token\" value=\"\${a.csrfToken}\">
                        <button type=\"submit\" class=\"icon-btn icon-btn-delete\" title=\"Supprimer\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <polyline points=\"3,6 5,6 21,6\"/>
                                <path d=\"m19,6v14a2,2 0 0,1 -2,2H7a2,2 0 0,1 -2,-2V6m3,0V4a2,2 0 0,1 2,-2h4a2,2 0 0,1 2,2v2\"/>
                                <line x1=\"10\" y1=\"11\" x2=\"10\" y2=\"17\"/>
                                <line x1=\"14\" y1=\"11\" x2=\"14\" y2=\"17\"/>
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
            a.calories.toString().includes(lowerQuery) ||
            a.proteines.toString().includes(lowerQuery) ||
            a.glucides.toString().includes(lowerQuery) ||
            a.lipides.toString().includes(lowerQuery)
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

    // Effets de survol pour le champ de recherche
    searchInput.addEventListener('focus', function() {
        this.style.borderColor = '#3b82f6';
        this.style.boxShadow = '0 0 0 3px rgba(59, 130, 246, 0.1)';
    });

    searchInput.addEventListener('blur', function() {
        this.style.borderColor = '#e5e7eb';
        this.style.boxShadow = 'none';
    });

    // Effets de survol pour les boutons
    [sortAscBtn, sortDescBtn, sortCaloriesBtn].forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            if (this.style.background !== 'rgb(59, 130, 246)') {
                this.style.borderColor = '#9ca3af';
                this.style.color = '#374151';
            }
        });
        
        btn.addEventListener('mouseleave', function() {
            if (this.style.background !== 'rgb(59, 130, 246)') {
                this.style.borderColor = '#e5e7eb';
                this.style.color = '#6b7280';
            }
        });
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
        return "repas/show.html.twig";
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
        return array (  564 => 320,  534 => 292,  525 => 289,  521 => 288,  517 => 287,  513 => 286,  509 => 285,  505 => 284,  501 => 283,  498 => 282,  494 => 281,  481 => 270,  468 => 269,  450 => 260,  444 => 256,  440 => 254,  421 => 241,  417 => 240,  408 => 234,  396 => 231,  392 => 230,  375 => 221,  371 => 220,  368 => 219,  366 => 218,  338 => 192,  328 => 183,  324 => 180,  317 => 175,  306 => 167,  299 => 162,  285 => 150,  273 => 141,  261 => 132,  249 => 123,  225 => 101,  215 => 93,  200 => 81,  182 => 66,  166 => 53,  135 => 24,  125 => 16,  117 => 13,  113 => 12,  107 => 8,  105 => 7,  102 => 6,  89 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}{{ repa.titreRepas }} - BioSync{% endblock %}

{% block body %}
<div class=\"app-layout\">
    {% include 'partials/_sidebar.html.twig' with {'active': 'repas'} %}

    <main class=\"main-content\">
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">{{ repa.titreRepas }}</h1>
                <p class=\"page-subtitle\">{{ repa.typeMoment.label }} - {{ repa.dateConsommation|date('d/m/Y H:i') }}</p>
            </div>
            <div style=\"display: flex; gap: 0.5rem;\">
                <a href=\"{{ path('admin_meal_foods', {'id': repa.id}) }}\" class=\"btn btn-primary\">Retour</a>
            </div>
        </div>

        <div style=\"display: flex; flex-direction: column; align-items: center; gap: 40px; padding: 20px;\">
            <div style=\"max-width: 1200px; width: 100%;\">
                <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 32px;\">
                    {# Meal Details Card - Unified with Medical palette #}
                    <div class=\"card card-hover\">
                        <div class=\"card-header\" style=\"padding-bottom: 16px; border-bottom: 1px solid var(--border-color);\">
                            <div style=\"display: flex; align-items: center; gap: 16px;\">
                                <div style=\"width: 56px; height: 56px; background: var(--bg-blue-light); border-radius: 16px; display: flex; align-items: center; justify-content: center;\">
                                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--primary-blue)\" style=\"width: 28px; height: 28px;\">
                                        <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                                        <path d=\"M7 2v20\"/>
                                        <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class=\"card-title\" style=\"font-size: 1.5rem; font-weight: 700; color: var(--text-primary); margin: 0;\">Détails du Repas</h3>
                                    <p style=\"color: var(--text-secondary); font-size: 0.875rem; margin: 4px 0 0 0;\">Informations complètes du repas</p>
                                </div>
                            </div>
                        </div>

                        <div class=\"card-content\" style=\"padding-top: 16px;\">
                            <div style=\"display: flex; flex-direction: column; gap: 16px;\">
                                <div style=\"display: flex; align-items: center; gap: 16px; padding: 16px; background: #F8FAFC; border-radius: 12px; border-left: 3px solid var(--primary-blue);\">
                                    <div style=\"width: 44px; height: 44px; background: var(--bg-blue-light); border-radius: 12px; display: flex; align-items: center; justify-content: center;\">
                                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--primary-blue)\" style=\"width: 22px; height: 22px;\">
                                            <path d=\"M12 2L2 7l10 5 10-5-10-5z\"/>
                                            <path d=\"M2 17l10 5 10-5\"/>
                                            <path d=\"M2 12l10 5 10-5\"/>
                                        </svg>
                                    </div>
                                    <div style=\"flex: 1;\">
                                        <div style=\"font-size: 0.875rem; color: var(--text-secondary); margin-bottom: 4px; font-weight: 500;\">Nom du Repas</div>
                                        <div style=\"font-size: 1.125rem; font-weight: 600; color: var(--text-primary);\">{{ repa.titreRepas }}</div>
                                    </div>
                                </div>

                                <div style=\"display: flex; align-items: center; gap: 16px; padding: 16px; background: #F8FAFC; border-radius: 12px; border-left: 3px solid var(--primary-blue);\">
                                    <div style=\"width: 44px; height: 44px; background: var(--bg-blue-light); border-radius: 12px; display: flex; align-items: center; justify-content: center;\">
                                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--primary-blue)\" style=\"width: 22px; height: 22px;\">
                                            <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                                            <polyline points=\"12 6 12 12 16 14\"/>
                                        </svg>
                                    </div>
                                    <div style=\"flex: 1;\">
                                        <div style=\"font-size: 0.875rem; color: var(--text-secondary); margin-bottom: 4px; font-weight: 500;\">Moment</div>
                                        <div style=\"font-size: 1.125rem; font-weight: 600; color: var(--text-primary);\">{{ repa.typeMoment.label }}</div>
                                    </div>
                                </div>

                                <div style=\"display: flex; align-items: center; gap: 16px; padding: 16px; background: #F8FAFC; border-radius: 12px; border-left: 3px solid var(--primary-blue);\">
                                    <div style=\"width: 44px; height: 44px; background: var(--bg-blue-light); border-radius: 12px; display: flex; align-items: center; justify-content: center;\">
                                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--primary-blue)\" style=\"width: 22px; height: 22px;\">
                                            <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                                            <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                                            <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                                            <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                                        </svg>
                                    </div>
                                    <div style=\"flex: 1;\">
                                        <div style=\"font-size: 0.875rem; color: var(--text-secondary); margin-bottom: 4px; font-weight: 500;\">Date et Heure</div>
                                        <div style=\"font-size: 1.125rem; font-weight: 600; color: var(--text-primary);\">{{ repa.dateConsommation|date('d/m/Y H:i') }}</div>
                                    </div>
                                </div>

                                <div style=\"display: flex; align-items: center; gap: 16px; padding: 16px; background: #F8FAFC; border-radius: 12px; border-left: 3px solid var(--primary-blue);\">
                                    <div style=\"width: 44px; height: 44px; background: var(--bg-blue-light); border-radius: 12px; display: flex; align-items: center; justify-content: center;\">
                                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--primary-blue)\" style=\"width: 22px; height: 22px;\">
                                            <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                                        </svg>
                                    </div>
                                    <div style=\"flex: 1;\">
                                        <div style=\"font-size: 0.875rem; color: var(--text-secondary); margin-bottom: 4px; font-weight: 500;\">Points Gagnés</div>
                                        <div style=\"font-size: 1.125rem; font-weight: 600; color: var(--text-primary);\">{{ repa.pointsGagnes }} points</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {# Nutrition Summary Card - Unified with Medical palette #}
                    <div class=\"card card-hover\">
                        <div class=\"card-header\" style=\"padding-bottom: 16px; border-bottom: 1px solid var(--border-color);\">
                            <div style=\"display: flex; align-items: center; gap: 16px;\">
                                <div style=\"width: 56px; height: 56px; background: var(--bg-green-light); border-radius: 16px; display: flex; align-items: center; justify-content: center;\">
                                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#10B981\" style=\"width: 28px; height: 28px;\">
                                        <path d=\"M3 3v18h18\"/>
                                        <path d=\"M18 17V9\"/>
                                        <path d=\"M13 17V5\"/>
                                        <path d=\"M8 17v-3\"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class=\"card-title\" style=\"font-size: 1.5rem; font-weight: 700; color: var(--text-primary); margin: 0;\">Résumé Nutritionnel</h3>
                                    <p style=\"color: var(--text-secondary); font-size: 0.875rem; margin: 4px 0 0 0;\">Répartition des macronutriments</p>
                                </div>
                            </div>
                        </div>

                        <div class=\"card-content\" style=\"padding-top: 16px;\">
                            <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 16px;\">
                                <div style=\"text-align: center; padding: 24px; background: #F9FAFB; border-radius: 16px; border: 1px solid var(--border-color);\">
                                    <div style=\"font-size: 0.875rem; color: #991b1b; margin-bottom: 8px; font-weight: 600; letter-spacing: 0.5px;\">CALORIES</div>
                                    <div style=\"font-size: 2rem; font-weight: 800; color: #dc2626; margin-bottom: 12px; line-height: 1;\">{{ repa.totalCalories }}</div>
                                    <div style=\"width: 100%; height: 6px; background: var(--border-light); border-radius: 3px; overflow: hidden; margin-bottom: 6px;\">
                                        <div class=\"stat-progress-bar\" style=\"width: 65%; background: #EF4444;\"></div>
                                    </div>
                                    <div style=\"font-size: 0.75rem; color: #7f1d1d; font-weight: 500;\">65% de l'objectif quotidien</div>
                                </div>

                                <div style=\"text-align: center; padding: 24px; background: #F9FAFB; border-radius: 16px; border: 1px solid var(--border-color);\">
                                    <div style=\"font-size: 0.875rem; color: #1e3a8a; margin-bottom: 8px; font-weight: 600; letter-spacing: 0.5px;\">PROTÉINES</div>
                                    <div style=\"font-size: 2rem; font-weight: 800; color: #2563eb; margin-bottom: 12px; line-height: 1;\">{{ repa.totalProteines }}g</div>
                                    <div style=\"width: 100%; height: 6px; background: var(--border-light); border-radius: 3px; overflow: hidden; margin-bottom: 6px;\">
                                        <div class=\"stat-progress-bar progress-blue\" style=\"width: 75%;\"></div>
                                    </div>
                                    <div style=\"font-size: 0.75rem; color: #1e3a8a; font-weight: 500;\">75% de l'objectif quotidien</div>
                                </div>

                                <div style=\"text-align: center; padding: 24px; background: #F9FAFB; border-radius: 16px; border: 1px solid var(--border-color);\">
                                    <div style=\"font-size: 0.875rem; color: #14532d; margin-bottom: 8px; font-weight: 600; letter-spacing: 0.5px;\">GLUCIDES</div>
                                    <div style=\"font-size: 2rem; font-weight: 800; color: #16a34a; margin-bottom: 12px; line-height: 1;\">{{ repa.totalGlucides }}g</div>
                                    <div style=\"width: 100%; height: 6px; background: var(--border-light); border-radius: 3px; overflow: hidden; margin-bottom: 6px;\">
                                        <div class=\"stat-progress-bar progress-green\" style=\"width: 60%;\"></div>
                                    </div>
                                    <div style=\"font-size: 0.75rem; color: #14532d; font-weight: 500;\">60% de l'objectif quotidien</div>
                                </div>

                                <div style=\"text-align: center; padding: 24px; background: #F9FAFB; border-radius: 16px; border: 1px solid var(--border-color);\">
                                    <div style=\"font-size: 0.875rem; color: #7c2d12; margin-bottom: 8px; font-weight: 600; letter-spacing: 0.5px;\">LIPIDES</div>
                                    <div style=\"font-size: 2rem; font-weight: 800; color: #ea580c; margin-bottom: 12px; line-height: 1;\">{{ repa.totalLipides }}g</div>
                                    <div style=\"width: 100%; height: 6px; background: var(--border-light); border-radius: 3px; overflow: hidden; margin-bottom: 6px;\">
                                        <div class=\"stat-progress-bar progress-orange\" style=\"width: 45%;\"></div>
                                    </div>
                                    <div style=\"font-size: 0.75rem; color: #7c2d12; font-weight: 500;\">45% de l'objectif quotidien</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {# Aliments Section - Palette aligned #}
                <div style=\"max-width: 1200px; width: 100%;\">
                    <div class=\"card\" style=\"margin-top: 32px; border-radius: 12px;\">
                        <div class=\"card-header\" style=\"padding: 24px 32px; border-bottom: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center;\">
                            <h3 class=\"card-title\" style=\"font-size: 1.5rem; font-weight: 600; color: var(--text-primary); margin: 0;\">Aliments dans ce repas</h3>
                            <div style=\"display: flex; gap: 8px;\">
                                <a href=\"{{ path('app_aliment_pdf', {'repas_id': repa.id}) }}\" class=\"btn btn-sm btn-outline\" style=\"display: flex; align-items: center; gap: 6px; padding: 8px 16px; border: 2px solid #e5e7eb; border-radius: 8px; background: white; color: #6b7280; text-decoration: none; transition: all 0.3s ease;\">
                                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 16px; height: 16px;\">
                                        <path d=\"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4\"/>
                                        <polyline points=\"7 10 12 15 17 10\"/>
                                        <line x1=\"12\" y1=\"15\" x2=\"12\" y2=\"3\"/>
                                    </svg>
                                    Exporter PDF
                                </a>
                                <a href=\"{{ path('app_aliment_new', {'repas_id': repa.id}) }}\" class=\"btn btn-sm btn-primary\">Ajouter un Aliment</a>
                            </div>
                        </div>
                        
                        {# Search and Filters Bar #}
                        <div style=\"background: white; padding: 20px 32px; border-bottom: 1px solid #e5e7eb;\">
                            <div style=\"display: flex; gap: 16px; align-items: center; flex-wrap: wrap;\">
                                {# Search Input #}
                                <div style=\"flex: 1; min-width: 300px; position: relative;\">
                                    <input type=\"text\" id=\"searchInput\" placeholder=\"Rechercher des aliments...\" style=\"width: 100%; padding: 12px 16px 12px 44px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 0.95rem; transition: all 0.3s ease;\">
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
                                    <button id=\"sortCalories\" class=\"btn btn-outline\" style=\"display: flex; align-items: center; gap: 8px; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 8px; background: white; color: #6b7280; cursor: pointer; transition: all 0.3s ease;\">
                                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px;\">
                                            <path d=\"M13 2L3 14h9l-1 8 10-12h-9l1-8z\"/>
                                        </svg>
                                        Trier par Calories
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class=\"card-content\" style=\"padding: 32px;\">
                            {% if repa.aliments is defined and repa.aliments|length > 0 %}
                                <div class=\"meal-list\" id=\"alimentList\">
                                    {% for aliment in repa.aliments %}
                                        <div class=\"meal-card\" data-id=\"{{ aliment.id }}\" data-name=\"{{ aliment.nomAliment }}\" data-calories=\"{{ aliment.calories }}\">
                                            <div class=\"meal-icon\">
                                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 24px; height: 24px; color: white;\">
                                                    <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                                                    <path d=\"M7 2v20\"/>
                                                    <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                                                </svg>
                                            </div>
                                            <div class=\"meal-info\">
                                                <div class=\"meal-name\">{{ aliment.nomAliment }}</div>
                                                <div class=\"meal-macros\">{{ aliment.calories }} cal  P: {{ aliment.proteines|default(0) }}g  C: {{ aliment.glucides|default(0) }}g  F: {{ aliment.lipides|default(0) }}g</div>
                                            </div>
                                            <div class=\"meal-actions\">
                                                <a href=\"{{ path('app_aliment_edit', {'id': aliment.id, 'repas_id': repa.id}) }}\" class=\"icon-btn icon-btn-edit\" title=\"Edit\">
                                                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                                        <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                                        <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                                                    </svg>
                                                </a>
                                                <form method=\"post\" action=\"{{ path('app_aliment_delete', {'id': aliment.id}) }}\" style=\"display: inline;\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cet aliment ?');\">
                                                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ aliment.id) }}\">
                                                    <button type=\"submit\" class=\"icon-btn icon-btn-delete\" title=\"Supprimer\">
                                                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                                            <polyline points=\"3,6 5,6 21,6\"/>
                                                            <path d=\"m19,6v14a2,2 0 0,1 -2,2H7a2,2 0 0,1 -2,-2V6m3,0V4a2,2 0 0,1 2,-2h4a2,2 0 0,1 2,2v2\"/>
                                                            <line x1=\"10\" y1=\"11\" x2=\"10\" y2=\"17\"/>
                                                            <line x1=\"14\" y1=\"11\" x2=\"14\" y2=\"17\"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    {% endfor %}
                                </div>
                            {% else %}
                                <div class=\"empty-state\" style=\"text-align: center; padding: 40px;\">
                                    <p style=\"color: var(--text-secondary); margin-bottom: 16px;\">Aucun aliment ajouté à ce repas pour le moment.</p>
                                </div>
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
{% endblock %}

{% block javascripts %}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const sortAscBtn = document.getElementById('sortAsc');
    const sortDescBtn = document.getElementById('sortDesc');
    const sortCaloriesBtn = document.getElementById('sortCalories');
    const alimentList = document.getElementById('alimentList');
    let currentSort = 'none';
    
    // Données des aliments
    let alimentsData = [
        {% for aliment in repa.aliments %}
        {
            id: {{ aliment.id }},
            nom: \"{{ aliment.nomAliment|e('js') }}\",
            calories: {{ aliment.calories }},
            proteines: {{ aliment.proteines|default(0) }},
            glucides: {{ aliment.glucides|default(0) }},
            lipides: {{ aliment.lipides|default(0) }},
            csrfToken: \"{{ csrf_token('delete' ~ aliment.id) }}\"
        },
        {% endfor %}
    ];

    // Fonction pour afficher les aliments
    function displayAliments(aliments) {
        if (aliments.length === 0) {
            alimentList.innerHTML = `
                <div class=\"empty-state\" style=\"text-align: center; padding: 40px;\">
                    <p style=\"color: var(--text-secondary); margin-bottom: 16px;\">Aucun aliment trouvé</p>
                    <p style=\"color: var(--text-secondary);\">Essayez d'ajuster votre recherche ou vos filtres</p>
                </div>
            `;
            return;
        }

        alimentList.innerHTML = aliments.map(a => `
            <div class=\"meal-card\" data-id=\"\${a.id}\">
                <div class=\"meal-icon\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 24px; height: 24px; color: white;\">
                        <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                        <path d=\"M7 2v20\"/>
                        <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                    </svg>
                </div>
                <div class=\"meal-info\">
                    <div class=\"meal-name\">\${a.nom}</div>
                    <div class=\"meal-macros\">\${a.calories} cal  P: \${a.proteines}g  C: \${a.glucides}g  F: \${a.lipides}g</div>
                </div>
                <div class=\"meal-actions\">
                    <a href=\"/aliment/\${a.id}/edit?repas_id={{ repa.id }}\" class=\"icon-btn icon-btn-edit\" title=\"Modifier\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                            <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                        </svg>
                    </a>
                    <form method=\"post\" action=\"/aliment/\${a.id}\" style=\"display: inline;\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cet aliment ?');\">
                        <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                        <input type=\"hidden\" name=\"_token\" value=\"\${a.csrfToken}\">
                        <button type=\"submit\" class=\"icon-btn icon-btn-delete\" title=\"Supprimer\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <polyline points=\"3,6 5,6 21,6\"/>
                                <path d=\"m19,6v14a2,2 0 0,1 -2,2H7a2,2 0 0,1 -2,-2V6m3,0V4a2,2 0 0,1 2,-2h4a2,2 0 0,1 2,2v2\"/>
                                <line x1=\"10\" y1=\"11\" x2=\"10\" y2=\"17\"/>
                                <line x1=\"14\" y1=\"11\" x2=\"14\" y2=\"17\"/>
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
            a.calories.toString().includes(lowerQuery) ||
            a.proteines.toString().includes(lowerQuery) ||
            a.glucides.toString().includes(lowerQuery) ||
            a.lipides.toString().includes(lowerQuery)
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

    // Effets de survol pour le champ de recherche
    searchInput.addEventListener('focus', function() {
        this.style.borderColor = '#3b82f6';
        this.style.boxShadow = '0 0 0 3px rgba(59, 130, 246, 0.1)';
    });

    searchInput.addEventListener('blur', function() {
        this.style.borderColor = '#e5e7eb';
        this.style.boxShadow = 'none';
    });

    // Effets de survol pour les boutons
    [sortAscBtn, sortDescBtn, sortCaloriesBtn].forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            if (this.style.background !== 'rgb(59, 130, 246)') {
                this.style.borderColor = '#9ca3af';
                this.style.color = '#374151';
            }
        });
        
        btn.addEventListener('mouseleave', function() {
            if (this.style.background !== 'rgb(59, 130, 246)') {
                this.style.borderColor = '#e5e7eb';
                this.style.color = '#6b7280';
            }
        });
    });
});
</script>
{% endblock %}", "repas/show.html.twig", "C:\\biosync_new\\templates\\repas\\show.html.twig");
    }
}
