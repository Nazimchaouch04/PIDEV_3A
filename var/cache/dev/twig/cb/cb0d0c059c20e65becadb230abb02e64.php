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

/* repas/edit.html.twig */
class __TwigTemplate_1a76503432c67eae1735999223ca586e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "repas/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "repas/edit.html.twig"));

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

        yield "Edit ";
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
        yield "        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">Modifier le Repas</h1>
                <p class=\"page-subtitle\">Modifier ";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 9, $this->source); })()), "titreRepas", [], "any", false, false, false, 9), "html", null, true);
        yield "</p>
            </div>
            <div style=\"display: flex; gap: 0.5rem;\">
                <a href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_repas_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 12, $this->source); })()), "id", [], "any", false, false, false, 12)]), "html", null, true);
        yield "\" class=\"btn btn-ghost\">Voir</a>
                <a href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_repas_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["repa"]) || array_key_exists("repa", $context) ? $context["repa"] : (function () { throw new RuntimeError('Variable "repa" does not exist.', 13, $this->source); })()), "id", [], "any", false, false, false, 13)]), "html", null, true);
        yield "\" class=\"btn btn-primary\">Retour</a>
            </div>
        </div>

        <div style=\"display: flex; justify-content: center; align-items: center; min-height: 70vh; padding: 20px;\">
            <div style=\"max-width: 800px; width: 100%;\">
                <div class=\"card\" style=\"box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-radius: 12px;\">
                    <div class=\"card-header\" style=\"padding: 24px 32px; border-bottom: 1px solid #e5e7eb;\">
                        <h3 class=\"card-title\" style=\"font-size: 1.5rem; font-weight: 600; color: #1f2937; margin: 0;\">Informations du Repas</h3>
                    </div>
                    <div class=\"card-content\" style=\"padding: 32px;\">
                        ";
        // line 24
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 24, $this->source); })()), 'form_start', ["attr" => ["class" => "form", "novalidate" => "novalidate"]]);
        yield "
                            <div class=\"grid grid-cols-2 gap-8\">
                                <div class=\"form-group\">
                                    ";
        // line 27
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 27, $this->source); })()), "titreRepas", [], "any", false, false, false, 27), 'label');
        yield "
                                    ";
        // line 28
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 28, $this->source); })()), "titreRepas", [], "any", false, false, false, 28), 'widget');
        yield "
                                    ";
        // line 29
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })()), "titreRepas", [], "any", false, false, false, 29), 'errors');
        yield "
                                </div>

                                <div class=\"form-group\">
                                    ";
        // line 33
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 33, $this->source); })()), "typeMoment", [], "any", false, false, false, 33), 'label');
        yield "
                                    ";
        // line 34
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 34, $this->source); })()), "typeMoment", [], "any", false, false, false, 34), 'widget');
        yield "
                                    ";
        // line 35
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 35, $this->source); })()), "typeMoment", [], "any", false, false, false, 35), 'errors');
        yield "
                                </div>

                                <div class=\"form-group\">
                                    ";
        // line 39
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), "dateConsommation", [], "any", false, false, false, 39), 'label');
        yield "
                                    ";
        // line 40
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 40, $this->source); })()), "dateConsommation", [], "any", false, false, false, 40), 'widget');
        yield "
                                    ";
        // line 41
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 41, $this->source); })()), "dateConsommation", [], "any", false, false, false, 41), 'errors');
        yield "
                                </div>
                            </div>

                            <div class=\"form-actions\" style=\"margin-top: 32px; display: flex; gap: 12px; justify-content: flex-end;\">
                                <button type=\"submit\" class=\"btn btn-primary\" style=\"padding: 12px 24px; font-size: 1rem; font-weight: 500;\">
                                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px; margin-right: 8px;\">
                                        <path d=\"M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z\"/>
                                        <polyline points=\"17 21 17 13 7 13 7 21\"/>
                                        <polyline points=\"7 3 7 8 15 8\"/>
                                    </svg>
                                    Enregistrer les modifications
                                </button>
                                ";
        // line 54
        if (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 54, $this->source); })()), "request", [], "any", false, false, false, 54), "query", [], "any", false, false, false, 54), "get", ["redirect_to"], "method", false, false, false, 54) == "admin_user_meals") && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 54, $this->source); })()), "request", [], "any", false, false, false, 54), "query", [], "any", false, false, false, 54), "get", ["user_id"], "method", false, false, false, 54))) {
            // line 55
            yield "                                    <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_user_meals", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 55, $this->source); })()), "request", [], "any", false, false, false, 55), "query", [], "any", false, false, false, 55), "get", ["user_id"], "method", false, false, false, 55)]), "html", null, true);
            yield "\" class=\"btn btn-secondary\" style=\"padding: 12px 24px; font-size: 1rem; font-weight: 500;\">Annuler</a>
                                ";
        } else {
            // line 57
            yield "                                    <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_repas_index");
            yield "\" class=\"btn btn-secondary\" style=\"padding: 12px 24px; font-size: 1rem; font-weight: 500;\">Annuler</a>
                                ";
        }
        // line 59
        yield "                            </div>
                        ";
        // line 60
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 60, $this->source); })()), 'form_end');
        yield "
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
        return "repas/edit.html.twig";
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
        return array (  208 => 60,  205 => 59,  199 => 57,  193 => 55,  191 => 54,  175 => 41,  171 => 40,  167 => 39,  160 => 35,  156 => 34,  152 => 33,  145 => 29,  141 => 28,  137 => 27,  131 => 24,  117 => 13,  113 => 12,  107 => 9,  102 => 6,  89 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Edit {{ repa.titreRepas }} - BioSync{% endblock %}

{% block body %}
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">Modifier le Repas</h1>
                <p class=\"page-subtitle\">Modifier {{ repa.titreRepas }}</p>
            </div>
            <div style=\"display: flex; gap: 0.5rem;\">
                <a href=\"{{ path('app_repas_show', {'id': repa.id}) }}\" class=\"btn btn-ghost\">Voir</a>
                <a href=\"{{ path('app_repas_show', {'id': repa.id}) }}\" class=\"btn btn-primary\">Retour</a>
            </div>
        </div>

        <div style=\"display: flex; justify-content: center; align-items: center; min-height: 70vh; padding: 20px;\">
            <div style=\"max-width: 800px; width: 100%;\">
                <div class=\"card\" style=\"box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-radius: 12px;\">
                    <div class=\"card-header\" style=\"padding: 24px 32px; border-bottom: 1px solid #e5e7eb;\">
                        <h3 class=\"card-title\" style=\"font-size: 1.5rem; font-weight: 600; color: #1f2937; margin: 0;\">Informations du Repas</h3>
                    </div>
                    <div class=\"card-content\" style=\"padding: 32px;\">
                        {{ form_start(form, {'attr': {'class': 'form', 'novalidate': 'novalidate'}}) }}
                            <div class=\"grid grid-cols-2 gap-8\">
                                <div class=\"form-group\">
                                    {{ form_label(form.titreRepas) }}
                                    {{ form_widget(form.titreRepas) }}
                                    {{ form_errors(form.titreRepas) }}
                                </div>

                                <div class=\"form-group\">
                                    {{ form_label(form.typeMoment) }}
                                    {{ form_widget(form.typeMoment) }}
                                    {{ form_errors(form.typeMoment) }}
                                </div>

                                <div class=\"form-group\">
                                    {{ form_label(form.dateConsommation) }}
                                    {{ form_widget(form.dateConsommation) }}
                                    {{ form_errors(form.dateConsommation) }}
                                </div>
                            </div>

                            <div class=\"form-actions\" style=\"margin-top: 32px; display: flex; gap: 12px; justify-content: flex-end;\">
                                <button type=\"submit\" class=\"btn btn-primary\" style=\"padding: 12px 24px; font-size: 1rem; font-weight: 500;\">
                                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px; margin-right: 8px;\">
                                        <path d=\"M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z\"/>
                                        <polyline points=\"17 21 17 13 7 13 7 21\"/>
                                        <polyline points=\"7 3 7 8 15 8\"/>
                                    </svg>
                                    Enregistrer les modifications
                                </button>
                                {% if app.request.query.get('redirect_to') == 'admin_user_meals' and app.request.query.get('user_id') %}
                                    <a href=\"{{ path('admin_user_meals', {'id': app.request.query.get('user_id')}) }}\" class=\"btn btn-secondary\" style=\"padding: 12px 24px; font-size: 1rem; font-weight: 500;\">Annuler</a>
                                {% else %}
                                    <a href=\"{{ path('app_repas_index') }}\" class=\"btn btn-secondary\" style=\"padding: 12px 24px; font-size: 1rem; font-weight: 500;\">Annuler</a>
                                {% endif %}
                            </div>
                        {{ form_end(form) }}
                    </div>
                </div>
            </div>
        </div>
{% endblock %}", "repas/edit.html.twig", "C:\\biosync_new\\templates\\repas\\edit.html.twig");
    }
}
