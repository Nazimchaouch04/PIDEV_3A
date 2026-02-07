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

/* medical/show.html.twig */
class __TwigTemplate_90cbecaae20af9f3fef04730cff695f8 extends Template
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
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "medical/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "medical/show.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
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

        yield "RDV - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 3, $this->source); })()), "specialiste", [], "any", false, false, false, 3), "nomDocteur", [], "any", false, false, false, 3), "html", null, true);
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
        yield from $this->load("partials/_sidebar.html.twig", 7)->unwrap()->yield(CoreExtension::merge($context, ["active" => "medical"]));
        // line 8
        yield "
    <main class=\"main-content\">
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">Rendez-vous</h1>
                <p class=\"page-subtitle\">Dr. ";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 13, $this->source); })()), "specialiste", [], "any", false, false, false, 13), "nomDocteur", [], "any", false, false, false, 13), "html", null, true);
        yield " - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 13, $this->source); })()), "dateHeureRdv", [], "any", false, false, false, 13), "d/m/Y H:i"), "html", null, true);
        yield "</p>
            </div>
            <div style=\"display: flex; gap: 0.5rem;\">
                ";
        // line 16
        if (( !CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 16, $this->source); })()), "isPassed", [], "any", false, false, false, 16) &&  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 16, $this->source); })()), "estHonore", [], "any", false, false, false, 16))) {
            // line 17
            yield "                    <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_medical_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 17, $this->source); })()), "id", [], "any", false, false, false, 17)]), "html", null, true);
            yield "\" class=\"btn btn-ghost\">Modifier</a>
                ";
        }
        // line 19
        yield "                <a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_medical");
        yield "\" class=\"btn btn-primary\">Retour</a>
            </div>
        </div>

        <div class=\"grid grid-cols-2 gap-6\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Details du rendez-vous</h4>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Date et heure</div>
                        <div class=\"list-item-title\">";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 31, $this->source); })()), "dateHeureRdv", [], "any", false, false, false, 31), "d/m/Y a H:i"), "html", null, true);
        yield "</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Statut</div>
                        <div class=\"list-item-title\">
                            ";
        // line 38
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 38, $this->source); })()), "estHonore", [], "any", false, false, false, 38)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 39
            yield "                                <span class=\"badge badge-success\">Honore</span>
                            ";
        } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,         // line 40
(isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 40, $this->source); })()), "isPassed", [], "any", false, false, false, 40)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 41
            yield "                                <span class=\"badge badge-danger\">Manque</span>
                            ";
        } else {
            // line 43
            yield "                                <span class=\"badge badge-warning\">A venir</span>
                            ";
        }
        // line 45
        yield "                        </div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Motif</div>
                        <div class=\"list-item-title\">";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 51, $this->source); })()), "motif", [], "any", false, false, false, 51), "html", null, true);
        yield "</div>
                    </div>
                </div>

                ";
        // line 55
        if (( !CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 55, $this->source); })()), "estHonore", [], "any", false, false, false, 55) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 55, $this->source); })()), "isPassed", [], "any", false, false, false, 55))) {
            // line 56
            yield "                    <form action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_medical_honor", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 56, $this->source); })()), "id", [], "any", false, false, false, 56)]), "html", null, true);
            yield "\" method=\"post\" class=\"mt-4\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
            // line 57
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("honor" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 57, $this->source); })()), "id", [], "any", false, false, false, 57))), "html", null, true);
            yield "\">
                        <button type=\"submit\" class=\"btn btn-primary w-full\">Marquer comme honore</button>
                    </form>
                ";
        }
        // line 61
        yield "            </div>

            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Specialiste</h4>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-icon\" style=\"background: rgba(54, 124, 254, 0.1); color: var(--secondary);\">
                        <svg width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                            <path d=\"M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2\"/>
                            <circle cx=\"12\" cy=\"7\" r=\"4\"/>
                        </svg>
                    </div>
                    <div class=\"list-item-content\">
                        <div class=\"list-item-title\">Dr. ";
        // line 75
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 75, $this->source); })()), "specialiste", [], "any", false, false, false, 75), "nomDocteur", [], "any", false, false, false, 75), "html", null, true);
        yield "</div>
                        <div class=\"list-item-subtitle\">";
        // line 76
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 76, $this->source); })()), "specialiste", [], "any", false, false, false, 76), "specialite", [], "any", false, false, false, 76), "html", null, true);
        yield "</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Telephone</div>
                        <div class=\"list-item-title\">";
        // line 82
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 82, $this->source); })()), "specialiste", [], "any", false, false, false, 82), "telephone", [], "any", false, false, false, 82), "html", null, true);
        yield "</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Disponibilite</div>
                        <div class=\"list-item-title\">";
        // line 88
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 88, $this->source); })()), "specialiste", [], "any", false, false, false, 88), "disponibilite", [], "any", false, false, false, 88), "html", null, true);
        yield "</div>
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
        return "medical/show.html.twig";
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
        return array (  238 => 88,  229 => 82,  220 => 76,  216 => 75,  200 => 61,  193 => 57,  188 => 56,  186 => 55,  179 => 51,  171 => 45,  167 => 43,  163 => 41,  161 => 40,  158 => 39,  156 => 38,  146 => 31,  130 => 19,  124 => 17,  122 => 16,  114 => 13,  107 => 8,  105 => 7,  102 => 6,  89 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}RDV - {{ rdv.specialiste.nomDocteur }} - BioSync{% endblock %}

{% block body %}
<div class=\"app-layout\">
    {% include 'partials/_sidebar.html.twig' with {'active': 'medical'} %}

    <main class=\"main-content\">
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">Rendez-vous</h1>
                <p class=\"page-subtitle\">Dr. {{ rdv.specialiste.nomDocteur }} - {{ rdv.dateHeureRdv|date('d/m/Y H:i') }}</p>
            </div>
            <div style=\"display: flex; gap: 0.5rem;\">
                {% if not rdv.isPassed and not rdv.estHonore %}
                    <a href=\"{{ path('app_medical_edit', {id: rdv.id}) }}\" class=\"btn btn-ghost\">Modifier</a>
                {% endif %}
                <a href=\"{{ path('app_medical') }}\" class=\"btn btn-primary\">Retour</a>
            </div>
        </div>

        <div class=\"grid grid-cols-2 gap-6\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Details du rendez-vous</h4>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Date et heure</div>
                        <div class=\"list-item-title\">{{ rdv.dateHeureRdv|date('d/m/Y a H:i') }}</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Statut</div>
                        <div class=\"list-item-title\">
                            {% if rdv.estHonore %}
                                <span class=\"badge badge-success\">Honore</span>
                            {% elseif rdv.isPassed %}
                                <span class=\"badge badge-danger\">Manque</span>
                            {% else %}
                                <span class=\"badge badge-warning\">A venir</span>
                            {% endif %}
                        </div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Motif</div>
                        <div class=\"list-item-title\">{{ rdv.motif }}</div>
                    </div>
                </div>

                {% if not rdv.estHonore and rdv.isPassed %}
                    <form action=\"{{ path('app_medical_honor', {id: rdv.id}) }}\" method=\"post\" class=\"mt-4\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('honor' ~ rdv.id) }}\">
                        <button type=\"submit\" class=\"btn btn-primary w-full\">Marquer comme honore</button>
                    </form>
                {% endif %}
            </div>

            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Specialiste</h4>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-icon\" style=\"background: rgba(54, 124, 254, 0.1); color: var(--secondary);\">
                        <svg width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                            <path d=\"M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2\"/>
                            <circle cx=\"12\" cy=\"7\" r=\"4\"/>
                        </svg>
                    </div>
                    <div class=\"list-item-content\">
                        <div class=\"list-item-title\">Dr. {{ rdv.specialiste.nomDocteur }}</div>
                        <div class=\"list-item-subtitle\">{{ rdv.specialiste.specialite }}</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Telephone</div>
                        <div class=\"list-item-title\">{{ rdv.specialiste.telephone }}</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Disponibilite</div>
                        <div class=\"list-item-title\">{{ rdv.specialiste.disponibilite }}</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
{% endblock %}
", "medical/show.html.twig", "C:\\biosync_new\\templates\\medical\\show.html.twig");
    }
}
