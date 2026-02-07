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

/* aliment/show.html.twig */
class __TwigTemplate_e8696d17afd7e12a3777dac2d62baa97 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "aliment/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "aliment/show.html.twig"));

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

        yield "Aliment - BioSync";
        
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
        yield from $this->load("partials/_sidebar.html.twig", 7)->unwrap()->yield(CoreExtension::merge($context, ["active" => "nutrition"]));
        // line 8
        yield "
    <main class=\"main-content\">
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["aliment"]) || array_key_exists("aliment", $context) ? $context["aliment"] : (function () { throw new RuntimeError('Variable "aliment" does not exist.', 12, $this->source); })()), "nomAliment", [], "any", false, false, false, 12), "html", null, true);
        yield "</h1>
                <p class=\"page-subtitle\">Nutritional information</p>
            </div>
            <div style=\"display: flex; gap: 8px;\">
                <a class=\"btn btn-outline\" href=\"";
        // line 16
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_index");
        yield "\">Back</a>
                <a class=\"btn btn-primary\" href=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["aliment"]) || array_key_exists("aliment", $context) ? $context["aliment"] : (function () { throw new RuntimeError('Variable "aliment" does not exist.', 17, $this->source); })()), "id", [], "any", false, false, false, 17)]), "html", null, true);
        yield "\">Edit</a>
            </div>
        </div>

        <div class=\"card\">
            <div class=\"card-content\" style=\"padding: 20px;\">
                <div class=\"grid-2\">
                    <div>
                        <div class=\"form-label\">Calories</div>
                        <div class=\"stat-value\" style=\"font-size: 24px;\">";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["aliment"]) || array_key_exists("aliment", $context) ? $context["aliment"] : (function () { throw new RuntimeError('Variable "aliment" does not exist.', 26, $this->source); })()), "calories", [], "any", false, false, false, 26), "html", null, true);
        yield "</div>
                    </div>
                    <div>
                        <div class=\"form-label\">Glycemic Index</div>
                        <div class=\"stat-value\" style=\"font-size: 24px;\">";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["aliment"]) || array_key_exists("aliment", $context) ? $context["aliment"] : (function () { throw new RuntimeError('Variable "aliment" does not exist.', 30, $this->source); })()), "indexGlycemique", [], "any", false, false, false, 30), "html", null, true);
        yield "</div>
                    </div>
                    <div>
                        <div class=\"form-label\">Proteins (g)</div>
                        <div class=\"stat-value\" style=\"font-size: 24px;\">";
        // line 34
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["aliment"] ?? null), "proteines", [], "any", true, true, false, 34) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["aliment"]) || array_key_exists("aliment", $context) ? $context["aliment"] : (function () { throw new RuntimeError('Variable "aliment" does not exist.', 34, $this->source); })()), "proteines", [], "any", false, false, false, 34)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["aliment"]) || array_key_exists("aliment", $context) ? $context["aliment"] : (function () { throw new RuntimeError('Variable "aliment" does not exist.', 34, $this->source); })()), "proteines", [], "any", false, false, false, 34), "html", null, true)) : (0));
        yield "</div>
                    </div>
                    <div>
                        <div class=\"form-label\">Carbs (g)</div>
                        <div class=\"stat-value\" style=\"font-size: 24px;\">";
        // line 38
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["aliment"] ?? null), "glucides", [], "any", true, true, false, 38) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["aliment"]) || array_key_exists("aliment", $context) ? $context["aliment"] : (function () { throw new RuntimeError('Variable "aliment" does not exist.', 38, $this->source); })()), "glucides", [], "any", false, false, false, 38)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["aliment"]) || array_key_exists("aliment", $context) ? $context["aliment"] : (function () { throw new RuntimeError('Variable "aliment" does not exist.', 38, $this->source); })()), "glucides", [], "any", false, false, false, 38), "html", null, true)) : (0));
        yield "</div>
                    </div>
                    <div>
                        <div class=\"form-label\">Fats (g)</div>
                        <div class=\"stat-value\" style=\"font-size: 24px;\">";
        // line 42
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["aliment"] ?? null), "lipides", [], "any", true, true, false, 42) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["aliment"]) || array_key_exists("aliment", $context) ? $context["aliment"] : (function () { throw new RuntimeError('Variable "aliment" does not exist.', 42, $this->source); })()), "lipides", [], "any", false, false, false, 42)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["aliment"]) || array_key_exists("aliment", $context) ? $context["aliment"] : (function () { throw new RuntimeError('Variable "aliment" does not exist.', 42, $this->source); })()), "lipides", [], "any", false, false, false, 42), "html", null, true)) : (0));
        yield "</div>
                    </div>
                    <div>
                        <div class=\"form-label\">Excitant</div>
                        <div class=\"stat-value\" style=\"font-size: 24px;\">";
        // line 46
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["aliment"]) || array_key_exists("aliment", $context) ? $context["aliment"] : (function () { throw new RuntimeError('Variable "aliment" does not exist.', 46, $this->source); })()), "estExcitant", [], "any", false, false, false, 46)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Yes") : ("No"));
        yield "</div>
                    </div>
                </div>
            </div>
        </div>

        <div style=\"margin-top: 16px;\">
            ";
        // line 53
        yield Twig\Extension\CoreExtension::include($this->env, $context, "aliment/_delete_form.html.twig");
        yield "
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
        return "aliment/show.html.twig";
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
        return array (  179 => 53,  169 => 46,  162 => 42,  155 => 38,  148 => 34,  141 => 30,  134 => 26,  122 => 17,  118 => 16,  111 => 12,  105 => 8,  103 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Aliment - BioSync{% endblock %}

{% block body %}
<div class=\"app-layout\">
    {% include 'partials/_sidebar.html.twig' with {'active': 'nutrition'} %}

    <main class=\"main-content\">
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">{{ aliment.nomAliment }}</h1>
                <p class=\"page-subtitle\">Nutritional information</p>
            </div>
            <div style=\"display: flex; gap: 8px;\">
                <a class=\"btn btn-outline\" href=\"{{ path('app_aliment_index') }}\">Back</a>
                <a class=\"btn btn-primary\" href=\"{{ path('app_aliment_edit', {'id': aliment.id}) }}\">Edit</a>
            </div>
        </div>

        <div class=\"card\">
            <div class=\"card-content\" style=\"padding: 20px;\">
                <div class=\"grid-2\">
                    <div>
                        <div class=\"form-label\">Calories</div>
                        <div class=\"stat-value\" style=\"font-size: 24px;\">{{ aliment.calories }}</div>
                    </div>
                    <div>
                        <div class=\"form-label\">Glycemic Index</div>
                        <div class=\"stat-value\" style=\"font-size: 24px;\">{{ aliment.indexGlycemique }}</div>
                    </div>
                    <div>
                        <div class=\"form-label\">Proteins (g)</div>
                        <div class=\"stat-value\" style=\"font-size: 24px;\">{{ aliment.proteines ?? 0 }}</div>
                    </div>
                    <div>
                        <div class=\"form-label\">Carbs (g)</div>
                        <div class=\"stat-value\" style=\"font-size: 24px;\">{{ aliment.glucides ?? 0 }}</div>
                    </div>
                    <div>
                        <div class=\"form-label\">Fats (g)</div>
                        <div class=\"stat-value\" style=\"font-size: 24px;\">{{ aliment.lipides ?? 0 }}</div>
                    </div>
                    <div>
                        <div class=\"form-label\">Excitant</div>
                        <div class=\"stat-value\" style=\"font-size: 24px;\">{{ aliment.estExcitant ? 'Yes' : 'No' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div style=\"margin-top: 16px;\">
            {{ include('aliment/_delete_form.html.twig') }}
        </div>
    </main>
</div>
{% endblock %}", "aliment/show.html.twig", "C:\\biosync_new\\templates\\aliment\\show.html.twig");
    }
}
