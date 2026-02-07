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

/* certification/index.html.twig */
class __TwigTemplate_a61b38e419cd0dd6f5692035369fa699 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "certification/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "certification/index.html.twig"));

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

        yield "Certification Professionnelle - BioSync Pro";
        
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
            <h1 class=\"modern-auth-brand\">BioSync Pro</h1>
            <p class=\"modern-auth-tagline\">Demande de certification professionnelle</p>
        </div>

        ";
        // line 21
        yield "        <div class=\"modern-auth-card\">
            <h2 class=\"modern-auth-form-title\">Certification Professionnelle</h2>
            <p class=\"cert-description\">
                Rejoignez notre réseau de professionnels de santé certifiés pour accompagner nos utilisateurs.
            </p>

            ";
        // line 28
        yield "            <div class=\"cert-benefits-box\">
                <div class=\"cert-benefits-title\">Avantages de la certification:</div>
                <div class=\"cert-benefit-item\">
                    <svg class=\"cert-check-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <polyline points=\"20 6 9 17 4 12\"/>
                    </svg>
                    <span>Accès aux outils d'analyse avancés</span>
                </div>
                <div class=\"cert-benefit-item\">
                    <svg class=\"cert-check-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <polyline points=\"20 6 9 17 4 12\"/>
                    </svg>
                    <span>Gestion de vos patients sur la plateforme</span>
                </div>
                <div class=\"cert-benefit-item\">
                    <svg class=\"cert-check-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <polyline points=\"20 6 9 17 4 12\"/>
                    </svg>
                    <span>Badge professionnel vérifié</span>
                </div>
                <div class=\"cert-benefit-item\">
                    <svg class=\"cert-check-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <polyline points=\"20 6 9 17 4 12\"/>
                    </svg>
                    <span>Visibilité auprès de notre communauté</span>
                </div>
            </div>

        ";
        // line 57
        yield "        <form method=\"post\" enctype=\"multipart/form-data\" class=\"modern-auth-form\">
            <div class=\"modern-form-group\">
                <label class=\"modern-form-label\">Spécialité</label>
                <input type=\"text\" name=\"specialite\" class=\"modern-input\" placeholder=\"Ex: Nutritionniste, Psychologue, Coach sportif...\" required>
            </div>

            <div class=\"modern-form-group\">
                <label class=\"modern-form-label\">Numéro d'enregistrement professionnel</label>
                <input type=\"text\" name=\"numero_enregistrement\" class=\"modern-input\" placeholder=\"Ex: RPPS, ADELI, Siret...\" required>
            </div>

            <div class=\"modern-form-group\">
                <label class=\"modern-form-label\">Motivation (optionnel)</label>
                <textarea name=\"motivation\" class=\"modern-input\" rows=\"3\" placeholder=\"Pourquoi souhaitez-vous rejoindre BioSync?\"></textarea>
            </div>

            <div class=\"modern-form-group\">
                <label class=\"modern-form-label\">Diplôme ou certificat professionnel</label>
                <div class=\"cert-upload-zone\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" class=\"cert-upload-icon\">
                        <path d=\"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4\"/>
                        <polyline points=\"17 8 12 3 7 8\"/>
                        <line x1=\"12\" y1=\"3\" x2=\"12\" y2=\"15\"/>
                    </svg>
                    <p class=\"cert-upload-text\">Cliquez pour télécharger</p>
                    <p class=\"cert-upload-hint\">PDF, JPG ou PNG (max. 10MB)</p>
                    <input type=\"file\" name=\"diplome\" accept=\".pdf,.jpg,.jpeg,.png\" class=\"cert-file-input\" required>
                </div>
            </div>

            <div class=\"cert-info-box\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                    <line x1=\"12\" y1=\"16\" x2=\"12\" y2=\"12\"/>
                    <line x1=\"12\" y1=\"8\" x2=\"12.01\" y2=\"8\"/>
                </svg>
                <div>
                    <strong>Vérification des documents</strong><br>
                    Votre demande sera examinée sous 48-72h par notre équipe. Vous recevrez un email de confirmation.
                </div>
            </div>

            <button type=\"submit\" class=\"modern-btn-gradient\">
                Soumettre ma demande
            </button>
        </form>

        <div class=\"modern-auth-footer\">
            Vous avez déjà un compte? <a href=\"";
        // line 105
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\">Se connecter</a>
        </div>
    </div>

    <div class=\"modern-auth-copyright\">
        © 2026 BioSync - Santé, Science & Bien-être
    </div>
</div>
</div>

<script>
const fileInput = document.querySelector('.cert-file-input');
const uploadZone = document.querySelector('.cert-upload-zone');

uploadZone.addEventListener('click', () => fileInput.click());

fileInput.addEventListener('change', function(e) {
    const fileName = e.target.files[0]?.name;
    if (fileName) {
        uploadZone.querySelector('.cert-upload-text').textContent = fileName;
    }
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
        return "certification/index.html.twig";
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
        return array (  205 => 105,  155 => 57,  125 => 28,  117 => 21,  104 => 9,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_front.html.twig' %}

{% block title %}Certification Professionnelle - BioSync Pro{% endblock %}

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
            <h1 class=\"modern-auth-brand\">BioSync Pro</h1>
            <p class=\"modern-auth-tagline\">Demande de certification professionnelle</p>
        </div>

        {# Carte formulaire #}
        <div class=\"modern-auth-card\">
            <h2 class=\"modern-auth-form-title\">Certification Professionnelle</h2>
            <p class=\"cert-description\">
                Rejoignez notre réseau de professionnels de santé certifiés pour accompagner nos utilisateurs.
            </p>

            {# Benefits Box #}
            <div class=\"cert-benefits-box\">
                <div class=\"cert-benefits-title\">Avantages de la certification:</div>
                <div class=\"cert-benefit-item\">
                    <svg class=\"cert-check-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <polyline points=\"20 6 9 17 4 12\"/>
                    </svg>
                    <span>Accès aux outils d'analyse avancés</span>
                </div>
                <div class=\"cert-benefit-item\">
                    <svg class=\"cert-check-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <polyline points=\"20 6 9 17 4 12\"/>
                    </svg>
                    <span>Gestion de vos patients sur la plateforme</span>
                </div>
                <div class=\"cert-benefit-item\">
                    <svg class=\"cert-check-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <polyline points=\"20 6 9 17 4 12\"/>
                    </svg>
                    <span>Badge professionnel vérifié</span>
                </div>
                <div class=\"cert-benefit-item\">
                    <svg class=\"cert-check-icon\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <polyline points=\"20 6 9 17 4 12\"/>
                    </svg>
                    <span>Visibilité auprès de notre communauté</span>
                </div>
            </div>

        {# Formulaire #}
        <form method=\"post\" enctype=\"multipart/form-data\" class=\"modern-auth-form\">
            <div class=\"modern-form-group\">
                <label class=\"modern-form-label\">Spécialité</label>
                <input type=\"text\" name=\"specialite\" class=\"modern-input\" placeholder=\"Ex: Nutritionniste, Psychologue, Coach sportif...\" required>
            </div>

            <div class=\"modern-form-group\">
                <label class=\"modern-form-label\">Numéro d'enregistrement professionnel</label>
                <input type=\"text\" name=\"numero_enregistrement\" class=\"modern-input\" placeholder=\"Ex: RPPS, ADELI, Siret...\" required>
            </div>

            <div class=\"modern-form-group\">
                <label class=\"modern-form-label\">Motivation (optionnel)</label>
                <textarea name=\"motivation\" class=\"modern-input\" rows=\"3\" placeholder=\"Pourquoi souhaitez-vous rejoindre BioSync?\"></textarea>
            </div>

            <div class=\"modern-form-group\">
                <label class=\"modern-form-label\">Diplôme ou certificat professionnel</label>
                <div class=\"cert-upload-zone\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" class=\"cert-upload-icon\">
                        <path d=\"M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4\"/>
                        <polyline points=\"17 8 12 3 7 8\"/>
                        <line x1=\"12\" y1=\"3\" x2=\"12\" y2=\"15\"/>
                    </svg>
                    <p class=\"cert-upload-text\">Cliquez pour télécharger</p>
                    <p class=\"cert-upload-hint\">PDF, JPG ou PNG (max. 10MB)</p>
                    <input type=\"file\" name=\"diplome\" accept=\".pdf,.jpg,.jpeg,.png\" class=\"cert-file-input\" required>
                </div>
            </div>

            <div class=\"cert-info-box\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                    <line x1=\"12\" y1=\"16\" x2=\"12\" y2=\"12\"/>
                    <line x1=\"12\" y1=\"8\" x2=\"12.01\" y2=\"8\"/>
                </svg>
                <div>
                    <strong>Vérification des documents</strong><br>
                    Votre demande sera examinée sous 48-72h par notre équipe. Vous recevrez un email de confirmation.
                </div>
            </div>

            <button type=\"submit\" class=\"modern-btn-gradient\">
                Soumettre ma demande
            </button>
        </form>

        <div class=\"modern-auth-footer\">
            Vous avez déjà un compte? <a href=\"{{ path('app_login') }}\">Se connecter</a>
        </div>
    </div>

    <div class=\"modern-auth-copyright\">
        © 2026 BioSync - Santé, Science & Bien-être
    </div>
</div>
</div>

<script>
const fileInput = document.querySelector('.cert-file-input');
const uploadZone = document.querySelector('.cert-upload-zone');

uploadZone.addEventListener('click', () => fileInput.click());

fileInput.addEventListener('change', function(e) {
    const fileName = e.target.files[0]?.name;
    if (fileName) {
        uploadZone.querySelector('.cert-upload-text').textContent = fileName;
    }
});
</script>
{% endblock %}
", "certification/index.html.twig", "C:\\biosync_new\\templates\\certification\\index.html.twig");
    }
}
