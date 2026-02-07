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

/* repas/_form.html.twig */
class __TwigTemplate_213f652a3eaefee6986a87a2e6fc53d5 extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "repas/_form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "repas/_form.html.twig"));

        // line 1
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 1, $this->source); })()), 'form_start');
        yield "
    <div class=\"grid grid-cols-2 gap-6\">
        <div class=\"form-group\">
            ";
        // line 4
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 4, $this->source); })()), "titreRepas", [], "any", false, false, false, 4), 'label');
        yield "
            ";
        // line 5
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 5, $this->source); })()), "titreRepas", [], "any", false, false, false, 5), 'widget', ["attr" => ["id" => "titreRepas", "class" => "form-control"]]);
        // line 10
        yield "
            ";
        // line 11
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 11, $this->source); })()), "titreRepas", [], "any", false, false, false, 11), 'errors');
        yield "
            <div class=\"field-error-titreRepas\" style=\"display: none;\"></div>
        </div>

        <div class=\"form-group\">
            ";
        // line 16
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 16, $this->source); })()), "typeMoment", [], "any", false, false, false, 16), 'label');
        yield "
            ";
        // line 17
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 17, $this->source); })()), "typeMoment", [], "any", false, false, false, 17), 'widget', ["attr" => ["id" => "typeMoment", "class" => "form-control"]]);
        // line 22
        yield "
            ";
        // line 23
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 23, $this->source); })()), "typeMoment", [], "any", false, false, false, 23), 'errors');
        yield "
            <div class=\"field-error-typeMoment\" style=\"display: none;\"></div>
        </div>

        <div class=\"form-group\">
            ";
        // line 28
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 28, $this->source); })()), "dateConsommation", [], "any", false, false, false, 28), 'label');
        yield "
            ";
        // line 29
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })()), "dateConsommation", [], "any", false, false, false, 29), 'widget', ["attr" => ["id" => "dateConsommation", "class" => "form-control"]]);
        // line 34
        yield "
            ";
        // line 35
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 35, $this->source); })()), "dateConsommation", [], "any", false, false, false, 35), 'errors');
        yield "
            <div class=\"field-error-dateConsommation\" style=\"display: none;\"></div>
        </div>

        <div class=\"form-group\">
            ";
        // line 40
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 40, $this->source); })()), "pointsGagnes", [], "any", false, false, false, 40), 'label');
        yield "
            ";
        // line 41
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 41, $this->source); })()), "pointsGagnes", [], "any", false, false, false, 41), 'widget', ["attr" => ["id" => "pointsGagnes", "class" => "form-control"]]);
        // line 46
        yield "
            ";
        // line 47
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 47, $this->source); })()), "pointsGagnes", [], "any", false, false, false, 47), 'errors');
        yield "
            <div class=\"field-error-pointsGagnes\" style=\"display: none;\"></div>
        </div>
    </div>

    <div class=\"form-actions\">
        <button type=\"submit\" class=\"btn btn-primary\">";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("button_label", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 53, $this->source); })()), "Save")) : ("Save")), "html", null, true);
        yield "</button>
        <a href=\"";
        // line 54
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_repas_index");
        yield "\" class=\"btn btn-secondary\">Cancel</a>
    </div>
";
        // line 56
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 56, $this->source); })()), 'form_end');
        yield "

<script>
console.log('🚀 Script chargé');

document.addEventListener('DOMContentLoaded', function() {
    console.log('✅ DOM prêt');
    
    const titreField = document.getElementById('titreRepas');
    console.log('Champ titre:', titreField);
    
    if (titreField) {
        titreField.addEventListener('input', function() {
            console.log('📝 Saisie détectée:', this.value);
            
            if (this.value === 'A') {
                alert('❌ Test: Le titre doit contenir au moins 2 caractères!');
                this.style.borderColor = 'red';
            } else if (this.value.length >= 2) {
                this.style.borderColor = 'green';
                console.log('✅ Titre valide');
            }
        });
        
        console.log('✅ Écouteur configuré');
    } else {
        console.error('❌ Champ titre non trouvé');
    }
});
</script>

<style>
.form-group {
    margin-bottom: 1rem;
}

.form-control {
    width: 100%;
    padding: 0.5rem 0.75rem;
    border: 1px solid #e5e7eb;
    border-radius: 0.375rem;
    transition: all 0.2s;
}

.form-control:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-control.error {
    border-color: #dc2626;
}

.btn {
    padding: 0.5rem 1rem;
    border-radius: 0.375rem;
    font-weight: 500;
    cursor: pointer;
    border: none;
    transition: all 0.2s;
}

.btn-primary {
    background-color: #3b82f6;
    color: white;
}

.btn-primary:hover {
    background-color: #2563eb;
}

.btn-secondary {
    background-color: #6b7280;
    color: white;
    margin-left: 0.5rem;
}

.btn-secondary:hover {
    background-color: #4b5563;
}

.form-actions {
    margin-top: 1.5rem;
    padding-top: 1rem;
    border-top: 1px solid #e5e7eb;
}
</style>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "repas/_form.html.twig";
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
        return array (  132 => 56,  127 => 54,  123 => 53,  114 => 47,  111 => 46,  109 => 41,  105 => 40,  97 => 35,  94 => 34,  92 => 29,  88 => 28,  80 => 23,  77 => 22,  75 => 17,  71 => 16,  63 => 11,  60 => 10,  58 => 5,  54 => 4,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ form_start(form) }}
    <div class=\"grid grid-cols-2 gap-6\">
        <div class=\"form-group\">
            {{ form_label(form.titreRepas) }}
            {{ form_widget(form.titreRepas, {
                'attr': {
                    'id': 'titreRepas',
                    'class': 'form-control'
                }
            }) }}
            {{ form_errors(form.titreRepas) }}
            <div class=\"field-error-titreRepas\" style=\"display: none;\"></div>
        </div>

        <div class=\"form-group\">
            {{ form_label(form.typeMoment) }}
            {{ form_widget(form.typeMoment, {
                'attr': {
                    'id': 'typeMoment',
                    'class': 'form-control'
                }
            }) }}
            {{ form_errors(form.typeMoment) }}
            <div class=\"field-error-typeMoment\" style=\"display: none;\"></div>
        </div>

        <div class=\"form-group\">
            {{ form_label(form.dateConsommation) }}
            {{ form_widget(form.dateConsommation, {
                'attr': {
                    'id': 'dateConsommation',
                    'class': 'form-control'
                }
            }) }}
            {{ form_errors(form.dateConsommation) }}
            <div class=\"field-error-dateConsommation\" style=\"display: none;\"></div>
        </div>

        <div class=\"form-group\">
            {{ form_label(form.pointsGagnes) }}
            {{ form_widget(form.pointsGagnes, {
                'attr': {
                    'id': 'pointsGagnes',
                    'class': 'form-control'
                }
            }) }}
            {{ form_errors(form.pointsGagnes) }}
            <div class=\"field-error-pointsGagnes\" style=\"display: none;\"></div>
        </div>
    </div>

    <div class=\"form-actions\">
        <button type=\"submit\" class=\"btn btn-primary\">{{ button_label|default('Save') }}</button>
        <a href=\"{{ path('app_repas_index') }}\" class=\"btn btn-secondary\">Cancel</a>
    </div>
{{ form_end(form) }}

<script>
console.log('🚀 Script chargé');

document.addEventListener('DOMContentLoaded', function() {
    console.log('✅ DOM prêt');
    
    const titreField = document.getElementById('titreRepas');
    console.log('Champ titre:', titreField);
    
    if (titreField) {
        titreField.addEventListener('input', function() {
            console.log('📝 Saisie détectée:', this.value);
            
            if (this.value === 'A') {
                alert('❌ Test: Le titre doit contenir au moins 2 caractères!');
                this.style.borderColor = 'red';
            } else if (this.value.length >= 2) {
                this.style.borderColor = 'green';
                console.log('✅ Titre valide');
            }
        });
        
        console.log('✅ Écouteur configuré');
    } else {
        console.error('❌ Champ titre non trouvé');
    }
});
</script>

<style>
.form-group {
    margin-bottom: 1rem;
}

.form-control {
    width: 100%;
    padding: 0.5rem 0.75rem;
    border: 1px solid #e5e7eb;
    border-radius: 0.375rem;
    transition: all 0.2s;
}

.form-control:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-control.error {
    border-color: #dc2626;
}

.btn {
    padding: 0.5rem 1rem;
    border-radius: 0.375rem;
    font-weight: 500;
    cursor: pointer;
    border: none;
    transition: all 0.2s;
}

.btn-primary {
    background-color: #3b82f6;
    color: white;
}

.btn-primary:hover {
    background-color: #2563eb;
}

.btn-secondary {
    background-color: #6b7280;
    color: white;
    margin-left: 0.5rem;
}

.btn-secondary:hover {
    background-color: #4b5563;
}

.form-actions {
    margin-top: 1.5rem;
    padding-top: 1rem;
    border-top: 1px solid #e5e7eb;
}
</style>", "repas/_form.html.twig", "C:\\biosync_new\\templates\\repas\\_form.html.twig");
    }
}
