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

/* security/register.html.twig */
class __TwigTemplate_46dbab07da0365f450298f99c3be5321 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/register.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/register.html.twig"));

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

        yield "Inscription - BioSync";
        
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
            <p class=\"modern-auth-tagline\">Créez votre compte et commencez votre parcours bien-être</p>
        </div>

        ";
        // line 21
        yield "        <div class=\"modern-auth-card\">
            <h2 class=\"modern-auth-form-title\">Inscription</h2>

            ";
        // line 24
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 24, $this->source); })()), 'form_start', ["attr" => ["class" => "modern-auth-form"]]);
        yield "
                ";
        // line 26
        yield "                <div class=\"modern-form-row\">
                    <div class=\"modern-form-group\">
                        <label class=\"modern-form-label\">Prénom</label>
                        <div class=\"modern-input-wrapper\">
                            <svg class=\"modern-input-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2\"/>
                                <circle cx=\"12\" cy=\"7\" r=\"4\"/>
                            </svg>
                            <input type=\"text\" placeholder=\"Marie\" class=\"modern-input\">
                        </div>
                    </div>
                    <div class=\"modern-form-group\">
                        <label class=\"modern-form-label\">Nom</label>
                        <div class=\"modern-input-wrapper\">
                            <svg class=\"modern-input-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2\"/>
                                <circle cx=\"12\" cy=\"7\" r=\"4\"/>
                            </svg>
                            <input type=\"text\" placeholder=\"Dupont\" class=\"modern-input\">
                        </div>
                    </div>
                </div>

                ";
        // line 50
        yield "                <div class=\"modern-form-group\">
                    <label class=\"modern-form-label\">Adresse email</label>
                    <div class=\"modern-input-wrapper\">
                        <svg class=\"modern-input-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z\"/>
                            <polyline points=\"22,6 12,13 2,6\"/>
                        </svg>
                        ";
        // line 57
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 57, $this->source); })()), "email", [], "any", false, false, false, 57), 'widget', ["attr" => ["class" => "modern-input", "placeholder" => "votre@email.com"]]);
        yield "
                    </div>
                    ";
        // line 59
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 59, $this->source); })()), "email", [], "any", false, false, false, 59), 'errors');
        yield "
                </div>

                ";
        // line 63
        yield "                <div class=\"modern-form-group\">
                    <label class=\"modern-form-label\">Date de naissance</label>
                    <div class=\"modern-input-wrapper\">
                        <svg class=\"modern-input-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                            <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                            <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                            <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                        </svg>
                        <input type=\"text\" placeholder=\"jj/mm/aaaa\" class=\"modern-input\">
                    </div>
                </div>

                ";
        // line 77
        yield "                <div class=\"modern-form-row\">
                    <div class=\"modern-form-group\">
                        <label class=\"modern-form-label\">Mot de passe</label>
                        <div class=\"modern-input-wrapper\">
                            <svg class=\"modern-input-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <rect x=\"3\" y=\"11\" width=\"18\" height=\"11\" rx=\"2\" ry=\"2\"/>
                                <path d=\"M7 11V7a5 5 0 0 1 10 0v4\"/>
                            </svg>
                            ";
        // line 85
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 85, $this->source); })()), "plainPassword", [], "any", false, false, false, 85), "first", [], "any", false, false, false, 85), 'widget', ["attr" => ["class" => "modern-input", "placeholder" => "••••••••"]]);
        yield "
                        </div>
                    </div>
                    <div class=\"modern-form-group\">
                        <label class=\"modern-form-label\">Confirmer le mot de passe</label>
                        <div class=\"modern-input-wrapper\">
                            <svg class=\"modern-input-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <rect x=\"3\" y=\"11\" width=\"18\" height=\"11\" rx=\"2\" ry=\"2\"/>
                                <path d=\"M7 11V7a5 5 0 0 1 10 0v4\"/>
                            </svg>
                            ";
        // line 95
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 95, $this->source); })()), "plainPassword", [], "any", false, false, false, 95), "second", [], "any", false, false, false, 95), 'widget', ["attr" => ["class" => "modern-input", "placeholder" => "••••••••"]]);
        yield "
                        </div>
                    </div>
                </div>

                ";
        // line 101
        yield "                <div class=\"modern-checkbox-wrapper\">
                    <input type=\"checkbox\" id=\"terms\" required>
                    <label for=\"terms\">
                        J'accepte les <a href=\"#\">conditions d'utilisation</a> et la <a href=\"#\">politique de confidentialité</a>
                    </label>
                </div>

                ";
        // line 109
        yield "                <button type=\"submit\" class=\"modern-btn-gradient\">
                    Créer mon compte
                </button>
            ";
        // line 112
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 112, $this->source); })()), 'form_end');
        yield "

            ";
        // line 115
        yield "            <div class=\"modern-auth-footer\">
                Vous avez déjà un compte? <a href=\"";
        // line 116
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\">Se connecter</a>
            </div>
        </div>

        ";
        // line 121
        yield "        <div class=\"modern-cert-link\">
            Vous êtes un professionnel de santé? <a href=\"";
        // line 122
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_certification");
        yield "\">Demander une certification</a>
        </div>

        ";
        // line 126
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
        return "security/register.html.twig";
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
        return array (  255 => 126,  249 => 122,  246 => 121,  239 => 116,  236 => 115,  231 => 112,  226 => 109,  217 => 101,  209 => 95,  196 => 85,  186 => 77,  171 => 63,  165 => 59,  160 => 57,  151 => 50,  126 => 26,  122 => 24,  117 => 21,  104 => 9,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_front.html.twig' %}

{% block title %}Inscription - BioSync{% endblock %}

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
            <p class=\"modern-auth-tagline\">Créez votre compte et commencez votre parcours bien-être</p>
        </div>

        {# Carte formulaire #}
        <div class=\"modern-auth-card\">
            <h2 class=\"modern-auth-form-title\">Inscription</h2>

            {{ form_start(registrationForm, {'attr': {'class': 'modern-auth-form'}}) }}
                {# Grid 2 colonnes pour Prénom/Nom #}
                <div class=\"modern-form-row\">
                    <div class=\"modern-form-group\">
                        <label class=\"modern-form-label\">Prénom</label>
                        <div class=\"modern-input-wrapper\">
                            <svg class=\"modern-input-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2\"/>
                                <circle cx=\"12\" cy=\"7\" r=\"4\"/>
                            </svg>
                            <input type=\"text\" placeholder=\"Marie\" class=\"modern-input\">
                        </div>
                    </div>
                    <div class=\"modern-form-group\">
                        <label class=\"modern-form-label\">Nom</label>
                        <div class=\"modern-input-wrapper\">
                            <svg class=\"modern-input-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2\"/>
                                <circle cx=\"12\" cy=\"7\" r=\"4\"/>
                            </svg>
                            <input type=\"text\" placeholder=\"Dupont\" class=\"modern-input\">
                        </div>
                    </div>
                </div>

                {# Email #}
                <div class=\"modern-form-group\">
                    <label class=\"modern-form-label\">Adresse email</label>
                    <div class=\"modern-input-wrapper\">
                        <svg class=\"modern-input-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <path d=\"M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z\"/>
                            <polyline points=\"22,6 12,13 2,6\"/>
                        </svg>
                        {{ form_widget(registrationForm.email, {'attr': {'class': 'modern-input', 'placeholder': 'votre@email.com'}}) }}
                    </div>
                    {{ form_errors(registrationForm.email) }}
                </div>

                {# Date de naissance #}
                <div class=\"modern-form-group\">
                    <label class=\"modern-form-label\">Date de naissance</label>
                    <div class=\"modern-input-wrapper\">
                        <svg class=\"modern-input-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                            <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                            <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                            <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                            <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                        </svg>
                        <input type=\"text\" placeholder=\"jj/mm/aaaa\" class=\"modern-input\">
                    </div>
                </div>

                {# Grid 2 colonnes pour mots de passe #}
                <div class=\"modern-form-row\">
                    <div class=\"modern-form-group\">
                        <label class=\"modern-form-label\">Mot de passe</label>
                        <div class=\"modern-input-wrapper\">
                            <svg class=\"modern-input-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <rect x=\"3\" y=\"11\" width=\"18\" height=\"11\" rx=\"2\" ry=\"2\"/>
                                <path d=\"M7 11V7a5 5 0 0 1 10 0v4\"/>
                            </svg>
                            {{ form_widget(registrationForm.plainPassword.first, {'attr': {'class': 'modern-input', 'placeholder': '••••••••'}}) }}
                        </div>
                    </div>
                    <div class=\"modern-form-group\">
                        <label class=\"modern-form-label\">Confirmer le mot de passe</label>
                        <div class=\"modern-input-wrapper\">
                            <svg class=\"modern-input-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <rect x=\"3\" y=\"11\" width=\"18\" height=\"11\" rx=\"2\" ry=\"2\"/>
                                <path d=\"M7 11V7a5 5 0 0 1 10 0v4\"/>
                            </svg>
                            {{ form_widget(registrationForm.plainPassword.second, {'attr': {'class': 'modern-input', 'placeholder': '••••••••'}}) }}
                        </div>
                    </div>
                </div>

                {# Checkbox conditions #}
                <div class=\"modern-checkbox-wrapper\">
                    <input type=\"checkbox\" id=\"terms\" required>
                    <label for=\"terms\">
                        J'accepte les <a href=\"#\">conditions d'utilisation</a> et la <a href=\"#\">politique de confidentialité</a>
                    </label>
                </div>

                {# Bouton submit avec gradient #}
                <button type=\"submit\" class=\"modern-btn-gradient\">
                    Créer mon compte
                </button>
            {{ form_end(registrationForm) }}

            {# Lien connexion #}
            <div class=\"modern-auth-footer\">
                Vous avez déjà un compte? <a href=\"{{ path('app_login') }}\">Se connecter</a>
            </div>
        </div>

        {# Lien certification professionnel #}
        <div class=\"modern-cert-link\">
            Vous êtes un professionnel de santé? <a href=\"{{ path('app_certification') }}\">Demander une certification</a>
        </div>

        {# Copyright footer #}
        <div class=\"modern-auth-copyright\">
            © 2026 BioSync - Santé, Science & Bien-être
        </div>
    </div>
</div>
{% endblock %}
", "security/register.html.twig", "C:\\biosync_new\\templates\\security\\register.html.twig");
    }
}
