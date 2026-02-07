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

/* repas/new.html.twig */
class __TwigTemplate_fcb88ab71fff339968fcc72720a01e5c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "repas/new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "repas/new.html.twig"));

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

        yield "New Meal - BioSync";
        
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
                <h1 class=\"page-title\">New Meal</h1>
                <p class=\"page-subtitle\">Add a new meal to your nutrition tracking</p>
            </div>
            <div style=\"display: flex; gap: 0.5rem;\">
                <a href=\"";
        // line 16
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_repas_index");
        yield "\" class=\"btn btn-primary\">Back to List</a>
            </div>
        </div>

        <div style=\"display: flex; justify-content: center; align-items: center; min-height: 70vh; padding: 20px;\">
            <div style=\"max-width: 800px; width: 100%;\">
                <div class=\"card\" style=\"box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-radius: 12px;\">
                    <div class=\"card-header\" style=\"padding: 24px 32px; border-bottom: 1px solid #e5e7eb;\">
                        <h3 class=\"card-title\" style=\"font-size: 1.5rem; font-weight: 600; color: #1f2937; margin: 0;\">Meal Information</h3>
                    </div>
                    <div class=\"card-content\" style=\"padding: 32px;\">
                        ";
        // line 27
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 27, $this->source); })()), 'form_start', ["attr" => ["class" => "form", "novalidate" => "novalidate"]]);
        yield "
                            <div class=\"grid grid-cols-2 gap-8\">
                                <div class=\"form-group\">
                                    ";
        // line 30
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 30, $this->source); })()), "titreRepas", [], "any", false, false, false, 30), 'label');
        yield "
                                    ";
        // line 31
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 31, $this->source); })()), "titreRepas", [], "any", false, false, false, 31), 'widget', ["attr" => ["id" => "titreRepas", "class" => "form-control"]]);
        yield "
                                    ";
        // line 32
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 32, $this->source); })()), "titreRepas", [], "any", false, false, false, 32), 'errors');
        yield "
                                </div>

                                <div class=\"form-group\">
                                    ";
        // line 36
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 36, $this->source); })()), "typeMoment", [], "any", false, false, false, 36), 'label');
        yield "
                                    ";
        // line 37
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 37, $this->source); })()), "typeMoment", [], "any", false, false, false, 37), 'widget', ["attr" => ["id" => "typeMoment", "class" => "form-control"]]);
        yield "
                                    ";
        // line 38
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 38, $this->source); })()), "typeMoment", [], "any", false, false, false, 38), 'errors');
        yield "
                                </div>

                                <div class=\"form-group\">
                                    ";
        // line 42
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 42, $this->source); })()), "dateConsommation", [], "any", false, false, false, 42), 'label');
        yield "
                                    ";
        // line 43
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 43, $this->source); })()), "dateConsommation", [], "any", false, false, false, 43), 'widget', ["attr" => ["id" => "dateConsommation", "class" => "form-control"]]);
        yield "
                                    ";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "dateConsommation", [], "any", false, false, false, 44), 'errors');
        yield "
                                </div>
                            </div>

                            <div class=\"form-actions\" style=\"margin-top: 32px; display: flex; gap: 12px; justify-content: flex-end;\">
                                <button type=\"submit\" class=\"btn btn-success\" style=\"padding: 12px 24px; font-size: 1rem; font-weight: 500;\">
                                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px; margin-right: 8px;\">
                                        <path d=\"M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z\"/>
                                        <polyline points=\"17 21 17 13 7 13 7 21\"/>
                                        <polyline points=\"7 3 7 8 15 8\"/>
                                    </svg>
                                    Create Meal
                                </button>
                                <a href=\"";
        // line 57
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_repas_index");
        yield "\" class=\"btn btn-secondary\" style=\"padding: 12px 24px; font-size: 1rem; font-weight: 500;\">Cancel</a>
                            </div>
                        ";
        // line 59
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 59, $this->source); })()), 'form_end');
        yield "

                        <script>
console.log('🚀 Script chargé');

document.addEventListener('DOMContentLoaded', function() {
    console.log('✅ DOM prêt');
    
    const titreField = document.getElementById('titreRepas');
    const typeMomentField = document.getElementById('typeMoment');
    const dateField = document.getElementById('dateConsommation');
    
    console.log('Champs trouvés:', titreField, typeMomentField, dateField);
    
    // Créer les conteneurs d'erreurs
    function createErrorContainer(fieldId) {
        const errorDiv = document.createElement('div');
        errorDiv.id = 'error-' + fieldId;
        errorDiv.className = 'field-error';
        errorDiv.style.cssText = `
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 4px;
            display: none;
            font-weight: 500;
            line-height: 1.4;
            padding: 8px 12px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 6px;
        `;
        
        const field = document.getElementById(fieldId);
        if (field && field.parentNode) {
            field.parentNode.appendChild(errorDiv);
        }
        return errorDiv;
    }
    
    // Créer les conteneurs d'erreurs
    const titreError = createErrorContainer('titreRepas');
    const typeMomentError = createErrorContainer('typeMoment');
    const dateError = createErrorContainer('dateConsommation');
    
    // Fonctions pour afficher/masquer les erreurs
    function showError(field, message) {
        const errorContainer = document.getElementById('error-' + field.id);
        if (errorContainer) {
            errorContainer.textContent = message;
            errorContainer.style.display = 'block';
        }
        field.style.borderColor = '#dc2626';
        field.style.boxShadow = '0 0 0 3px rgba(220, 38, 38, 0.1)';
    }
    
    function hideError(field) {
        const errorContainer = document.getElementById('error-' + field.id);
        if (errorContainer) {
            errorContainer.style.display = 'none';
        }
        field.style.borderColor = '#e5e7eb';
        field.style.boxShadow = 'none';
    }
    
    // Validation du titre
    function validateTitre(value) {
        if (!value || value.trim().length < 2) {
            return '❌ Le titre doit contenir au moins 2 caractères';
        }
        if (value.trim().length > 100) {
            return '❌ Le titre ne peut pas dépasser 100 caractères';
        }
        return null;
    }
    
    // Validation du type de moment
    function validateTypeMoment(value) {
        if (!value) {
            return '❌ Veuillez sélectionner un type de repas';
        }
        return null;
    }
    
    // Validation de la date
    function validateDate(value) {
        if (!value) {
            return '❌ Veuillez sélectionner une date';
        }
        return null;
    }
    
    // Validation complète
    function validateField(field) {
        const value = field.value;
        let error = null;
        
        if (field.id === 'titreRepas') {
            error = validateTitre(value);
        } else if (field.id === 'typeMoment') {
            error = validateTypeMoment(value);
        } else if (field.id === 'dateConsommation') {
            error = validateDate(value);
        }
        
        if (error) {
            showError(field, error);
            return false;
        } else {
            hideError(field);
            return true;
        }
    }
    
    // Ajouter les écouteurs d'événements
    [titreField, typeMomentField, dateField].forEach(field => {
        if (!field) return;
        
        // Validation en temps réel pendant la saisie
        let timeout;
        field.addEventListener('input', function() {
            clearTimeout(timeout);
            hideError(this);
            
            timeout = setTimeout(() => {
                validateField(this);
            }, 500);
        });
        
        // Validation immédiate à la perte de focus
        field.addEventListener('blur', function() {
            clearTimeout(timeout);
            validateField(this);
        });
        
        // Validation finale au changement
        field.addEventListener('change', function() {
            validateField(this);
        });
    });
    
    // Validation du formulaire complet avant soumission
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            let isValid = true;
            const fields = [titreField, typeMomentField, dateField];
            
            // Valider chaque champ
            fields.forEach(field => {
                if (field && !validateField(field)) {
                    isValid = false;
                }
            });
            
            // BLOQUER la soumission si erreurs, sinon autoriser
            if (isValid) {
                // Afficher un message de succès
                const successMessage = document.createElement('div');
                successMessage.textContent = '✅ Formulaire validé avec succès !';
                successMessage.style.cssText = `
                    background: #10b981;
                    color: white;
                    padding: 12px 20px;
                    border-radius: 8px;
                    margin-bottom: 16px;
                    font-weight: 600;
                    text-align: center;
                `;
                
                const submitBtn = form.querySelector('button[type=\"submit\"]');
                submitBtn.parentNode.insertBefore(successMessage, submitBtn);
                
                // Soumettre le formulaire après 1 seconde
                setTimeout(() => {
                    form.submit();
                }, 1000);
            } else {
                // Afficher un message d'erreur général
                const errorMessage = document.createElement('div');
                errorMessage.textContent = '❌ Veuillez corriger les erreurs avant de soumettre le formulaire';
                errorMessage.style.cssText = `
                    background: #dc2626;
                    color: white;
                    padding: 12px 20px;
                    border-radius: 8px;
                    margin-bottom: 16px;
                    font-weight: 600;
                    text-align: center;
                `;
                
                const submitBtn = form.querySelector('button[type=\"submit\"]');
                submitBtn.parentNode.insertBefore(errorMessage, submitBtn);
            }
        });
    }
});
</script>
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

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "repas/new.html.twig";
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
        return array (  194 => 59,  189 => 57,  173 => 44,  169 => 43,  165 => 42,  158 => 38,  154 => 37,  150 => 36,  143 => 32,  139 => 31,  135 => 30,  129 => 27,  115 => 16,  105 => 8,  103 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}New Meal - BioSync{% endblock %}

{% block body %}
<div class=\"app-layout\">
    {% include 'partials/_sidebar.html.twig' with {'active': 'repas'} %}

    <main class=\"main-content\">
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">New Meal</h1>
                <p class=\"page-subtitle\">Add a new meal to your nutrition tracking</p>
            </div>
            <div style=\"display: flex; gap: 0.5rem;\">
                <a href=\"{{ path('app_repas_index') }}\" class=\"btn btn-primary\">Back to List</a>
            </div>
        </div>

        <div style=\"display: flex; justify-content: center; align-items: center; min-height: 70vh; padding: 20px;\">
            <div style=\"max-width: 800px; width: 100%;\">
                <div class=\"card\" style=\"box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-radius: 12px;\">
                    <div class=\"card-header\" style=\"padding: 24px 32px; border-bottom: 1px solid #e5e7eb;\">
                        <h3 class=\"card-title\" style=\"font-size: 1.5rem; font-weight: 600; color: #1f2937; margin: 0;\">Meal Information</h3>
                    </div>
                    <div class=\"card-content\" style=\"padding: 32px;\">
                        {{ form_start(form, {'attr': {'class': 'form', 'novalidate': 'novalidate'}}) }}
                            <div class=\"grid grid-cols-2 gap-8\">
                                <div class=\"form-group\">
                                    {{ form_label(form.titreRepas) }}
                                    {{ form_widget(form.titreRepas, {'attr': {'id': 'titreRepas', 'class': 'form-control'}}) }}
                                    {{ form_errors(form.titreRepas) }}
                                </div>

                                <div class=\"form-group\">
                                    {{ form_label(form.typeMoment) }}
                                    {{ form_widget(form.typeMoment, {'attr': {'id': 'typeMoment', 'class': 'form-control'}}) }}
                                    {{ form_errors(form.typeMoment) }}
                                </div>

                                <div class=\"form-group\">
                                    {{ form_label(form.dateConsommation) }}
                                    {{ form_widget(form.dateConsommation, {'attr': {'id': 'dateConsommation', 'class': 'form-control'}}) }}
                                    {{ form_errors(form.dateConsommation) }}
                                </div>
                            </div>

                            <div class=\"form-actions\" style=\"margin-top: 32px; display: flex; gap: 12px; justify-content: flex-end;\">
                                <button type=\"submit\" class=\"btn btn-success\" style=\"padding: 12px 24px; font-size: 1rem; font-weight: 500;\">
                                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 18px; height: 18px; margin-right: 8px;\">
                                        <path d=\"M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z\"/>
                                        <polyline points=\"17 21 17 13 7 13 7 21\"/>
                                        <polyline points=\"7 3 7 8 15 8\"/>
                                    </svg>
                                    Create Meal
                                </button>
                                <a href=\"{{ path('app_repas_index') }}\" class=\"btn btn-secondary\" style=\"padding: 12px 24px; font-size: 1rem; font-weight: 500;\">Cancel</a>
                            </div>
                        {{ form_end(form) }}

                        <script>
console.log('🚀 Script chargé');

document.addEventListener('DOMContentLoaded', function() {
    console.log('✅ DOM prêt');
    
    const titreField = document.getElementById('titreRepas');
    const typeMomentField = document.getElementById('typeMoment');
    const dateField = document.getElementById('dateConsommation');
    
    console.log('Champs trouvés:', titreField, typeMomentField, dateField);
    
    // Créer les conteneurs d'erreurs
    function createErrorContainer(fieldId) {
        const errorDiv = document.createElement('div');
        errorDiv.id = 'error-' + fieldId;
        errorDiv.className = 'field-error';
        errorDiv.style.cssText = `
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 4px;
            display: none;
            font-weight: 500;
            line-height: 1.4;
            padding: 8px 12px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 6px;
        `;
        
        const field = document.getElementById(fieldId);
        if (field && field.parentNode) {
            field.parentNode.appendChild(errorDiv);
        }
        return errorDiv;
    }
    
    // Créer les conteneurs d'erreurs
    const titreError = createErrorContainer('titreRepas');
    const typeMomentError = createErrorContainer('typeMoment');
    const dateError = createErrorContainer('dateConsommation');
    
    // Fonctions pour afficher/masquer les erreurs
    function showError(field, message) {
        const errorContainer = document.getElementById('error-' + field.id);
        if (errorContainer) {
            errorContainer.textContent = message;
            errorContainer.style.display = 'block';
        }
        field.style.borderColor = '#dc2626';
        field.style.boxShadow = '0 0 0 3px rgba(220, 38, 38, 0.1)';
    }
    
    function hideError(field) {
        const errorContainer = document.getElementById('error-' + field.id);
        if (errorContainer) {
            errorContainer.style.display = 'none';
        }
        field.style.borderColor = '#e5e7eb';
        field.style.boxShadow = 'none';
    }
    
    // Validation du titre
    function validateTitre(value) {
        if (!value || value.trim().length < 2) {
            return '❌ Le titre doit contenir au moins 2 caractères';
        }
        if (value.trim().length > 100) {
            return '❌ Le titre ne peut pas dépasser 100 caractères';
        }
        return null;
    }
    
    // Validation du type de moment
    function validateTypeMoment(value) {
        if (!value) {
            return '❌ Veuillez sélectionner un type de repas';
        }
        return null;
    }
    
    // Validation de la date
    function validateDate(value) {
        if (!value) {
            return '❌ Veuillez sélectionner une date';
        }
        return null;
    }
    
    // Validation complète
    function validateField(field) {
        const value = field.value;
        let error = null;
        
        if (field.id === 'titreRepas') {
            error = validateTitre(value);
        } else if (field.id === 'typeMoment') {
            error = validateTypeMoment(value);
        } else if (field.id === 'dateConsommation') {
            error = validateDate(value);
        }
        
        if (error) {
            showError(field, error);
            return false;
        } else {
            hideError(field);
            return true;
        }
    }
    
    // Ajouter les écouteurs d'événements
    [titreField, typeMomentField, dateField].forEach(field => {
        if (!field) return;
        
        // Validation en temps réel pendant la saisie
        let timeout;
        field.addEventListener('input', function() {
            clearTimeout(timeout);
            hideError(this);
            
            timeout = setTimeout(() => {
                validateField(this);
            }, 500);
        });
        
        // Validation immédiate à la perte de focus
        field.addEventListener('blur', function() {
            clearTimeout(timeout);
            validateField(this);
        });
        
        // Validation finale au changement
        field.addEventListener('change', function() {
            validateField(this);
        });
    });
    
    // Validation du formulaire complet avant soumission
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            let isValid = true;
            const fields = [titreField, typeMomentField, dateField];
            
            // Valider chaque champ
            fields.forEach(field => {
                if (field && !validateField(field)) {
                    isValid = false;
                }
            });
            
            // BLOQUER la soumission si erreurs, sinon autoriser
            if (isValid) {
                // Afficher un message de succès
                const successMessage = document.createElement('div');
                successMessage.textContent = '✅ Formulaire validé avec succès !';
                successMessage.style.cssText = `
                    background: #10b981;
                    color: white;
                    padding: 12px 20px;
                    border-radius: 8px;
                    margin-bottom: 16px;
                    font-weight: 600;
                    text-align: center;
                `;
                
                const submitBtn = form.querySelector('button[type=\"submit\"]');
                submitBtn.parentNode.insertBefore(successMessage, submitBtn);
                
                // Soumettre le formulaire après 1 seconde
                setTimeout(() => {
                    form.submit();
                }, 1000);
            } else {
                // Afficher un message d'erreur général
                const errorMessage = document.createElement('div');
                errorMessage.textContent = '❌ Veuillez corriger les erreurs avant de soumettre le formulaire';
                errorMessage.style.cssText = `
                    background: #dc2626;
                    color: white;
                    padding: 12px 20px;
                    border-radius: 8px;
                    margin-bottom: 16px;
                    font-weight: 600;
                    text-align: center;
                `;
                
                const submitBtn = form.querySelector('button[type=\"submit\"]');
                submitBtn.parentNode.insertBefore(errorMessage, submitBtn);
            }
        });
    }
});
</script>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
{% endblock %}", "repas/new.html.twig", "C:\\biosync_new\\templates\\repas\\new.html.twig");
    }
}
