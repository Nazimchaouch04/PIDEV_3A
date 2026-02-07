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

/* security/login.html.twig */
class __TwigTemplate_ae314e71b8b02b3fbcd761ab7a03abd6 extends Template
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
        return "base_front.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $this->parent = $this->load("base_front.html.twig", 1);
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

        yield "Connexion - BioSync";
        
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
        yield "<div class=\"modern-auth-wrapper\">
    <div class=\"modern-auth-container\">
        ";
        // line 9
        yield "        <div class=\"modern-auth-header\">
            <div class=\"modern-auth-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <circle cx=\"12\" cy=\"8\" r=\"7\"/>
                    <polyline points=\"8.21 13.89 7 23 12 20 17 23 15.79 13.88\"/>
                </svg>
            </div>
            <h1 class=\"modern-auth-brand\">BioSync</h1>
            <p class=\"modern-auth-tagline\">Connectez-vous pour accéder à votre espace santé</p>
        </div>

        ";
        // line 21
        yield "        <div class=\"modern-auth-card\">
            <h2 class=\"modern-auth-form-title\">Connexion</h2>

            ";
        // line 24
        if ((($tmp = (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 24, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 25
            yield "                <div class=\"modern-error-alert\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                        <line x1=\"15\" y1=\"9\" x2=\"9\" y2=\"15\"/>
                        <line x1=\"9\" y1=\"9\" x2=\"15\" y2=\"15\"/>
                    </svg>
                    ";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 31, $this->source); })()), "messageKey", [], "any", false, false, false, 31), CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 31, $this->source); })()), "messageData", [], "any", false, false, false, 31), "security"), "html", null, true);
            yield "
                </div>
            ";
        }
        // line 34
        yield "
            <form method=\"post\" class=\"modern-auth-form\">
                ";
        // line 37
        yield "                <div class=\"modern-form-group\">
                    <label class=\"modern-form-label\">Adresse email</label>
                    <div class=\"modern-input-wrapper\">
                        <svg class=\"modern-input-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z\"/>
                            <polyline points=\"22,6 12,13 2,6\"/>
                        </svg>
                        <input type=\"email\" name=\"_username\" value=\"";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 44, $this->source); })()), "html", null, true);
        yield "\" class=\"modern-input\" placeholder=\"votre@email.com\" required autofocus>
                    </div>
                </div>

                ";
        // line 49
        yield "                <div class=\"modern-form-group\">
                    <label class=\"modern-form-label\">Mot de passe</label>
                    <div class=\"modern-input-wrapper\">
                        <svg class=\"modern-input-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <rect x=\"3\" y=\"11\" width=\"18\" height=\"11\" rx=\"2\" ry=\"2\"/>
                            <path d=\"M7 11V7a5 5 0 0 1 10 0v4\"/>
                        </svg>
                        <input type=\"password\" name=\"_password\" class=\"modern-input\" placeholder=\"••••••••\" required>
                    </div>
                </div>

                ";
        // line 61
        yield "                <div class=\"modern-checkbox-wrapper\" style=\"padding: 12px;\">
                    <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\">
                    <label for=\"remember_me\">Se souvenir de moi</label>
                </div>

                <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        yield "\">

                ";
        // line 69
        yield "                <button type=\"submit\" class=\"modern-btn-gradient\">
                    Se connecter
                </button>
            </form>

            ";
        // line 75
        yield "            <div class=\"modern-auth-footer\">
                Pas encore de compte? <a href=\"";
        // line 76
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\">S'inscrire</a>
            </div>
        </div>

        ";
        // line 81
        yield "        <div class=\"modern-auth-copyright\">
            © 2026 BioSync - Santé, Science & Bien-être
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
        return "security/login.html.twig";
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
        return array (  200 => 81,  193 => 76,  190 => 75,  183 => 69,  178 => 66,  171 => 61,  158 => 49,  151 => 44,  142 => 37,  138 => 34,  132 => 31,  124 => 25,  122 => 24,  117 => 21,  104 => 9,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_front.html.twig' %}

{% block title %}Connexion - BioSync{% endblock %}

{% block body %}
<div class=\"modern-auth-wrapper\">
    <div class=\"modern-auth-container\">
        {# Logo et titre #}
        <div class=\"modern-auth-header\">
            <div class=\"modern-auth-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <circle cx=\"12\" cy=\"8\" r=\"7\"/>
                    <polyline points=\"8.21 13.89 7 23 12 20 17 23 15.79 13.88\"/>
                </svg>
            </div>
            <h1 class=\"modern-auth-brand\">BioSync</h1>
            <p class=\"modern-auth-tagline\">Connectez-vous pour accéder à votre espace santé</p>
        </div>

        {# Carte formulaire #}
        <div class=\"modern-auth-card\">
            <h2 class=\"modern-auth-form-title\">Connexion</h2>

            {% if error %}
                <div class=\"modern-error-alert\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                        <line x1=\"15\" y1=\"9\" x2=\"9\" y2=\"15\"/>
                        <line x1=\"9\" y1=\"9\" x2=\"15\" y2=\"15\"/>
                    </svg>
                    {{ error.messageKey|trans(error.messageData, 'security') }}
                </div>
            {% endif %}

            <form method=\"post\" class=\"modern-auth-form\">
                {# Email #}
                <div class=\"modern-form-group\">
                    <label class=\"modern-form-label\">Adresse email</label>
                    <div class=\"modern-input-wrapper\">
                        <svg class=\"modern-input-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z\"/>
                            <polyline points=\"22,6 12,13 2,6\"/>
                        </svg>
                        <input type=\"email\" name=\"_username\" value=\"{{ last_username }}\" class=\"modern-input\" placeholder=\"votre@email.com\" required autofocus>
                    </div>
                </div>

                {# Mot de passe #}
                <div class=\"modern-form-group\">
                    <label class=\"modern-form-label\">Mot de passe</label>
                    <div class=\"modern-input-wrapper\">
                        <svg class=\"modern-input-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <rect x=\"3\" y=\"11\" width=\"18\" height=\"11\" rx=\"2\" ry=\"2\"/>
                            <path d=\"M7 11V7a5 5 0 0 1 10 0v4\"/>
                        </svg>
                        <input type=\"password\" name=\"_password\" class=\"modern-input\" placeholder=\"••••••••\" required>
                    </div>
                </div>

                {# Remember me #}
                <div class=\"modern-checkbox-wrapper\" style=\"padding: 12px;\">
                    <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\">
                    <label for=\"remember_me\">Se souvenir de moi</label>
                </div>

                <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\">

                {# Bouton submit avec gradient #}
                <button type=\"submit\" class=\"modern-btn-gradient\">
                    Se connecter
                </button>
            </form>

            {# Lien inscription #}
            <div class=\"modern-auth-footer\">
                Pas encore de compte? <a href=\"{{ path('app_register') }}\">S'inscrire</a>
            </div>
        </div>

        {# Copyright footer #}
        <div class=\"modern-auth-copyright\">
            © 2026 BioSync - Santé, Science & Bien-être
        </div>
    </div>
</div>
{% endblock %}
", "security/login.html.twig", "C:\\biosync_new\\templates\\security\\login.html.twig");
    }
}
