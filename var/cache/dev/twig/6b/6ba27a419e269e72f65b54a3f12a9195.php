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

/* sports/index.html.twig */
class __TwigTemplate_997afae801e4fd7742552fab9d0731fc extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sports/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sports/index.html.twig"));

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

        yield "Sports & Fitness - BioSync";
        
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
                <h1 class=\"page-title\">Sport</h1>
                <p class=\"page-subtitle\">Suivez vos seances d'entrainement.</p>
            </div>
            <a href=\"";
        // line 11
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports_new");
        yield "\" class=\"btn btn-secondary\">
                <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                    <line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/>
                    <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
                </svg>
                Ajouter une seance
            </a>
        </div>

        ";
        // line 21
        yield "        <div class=\"grid grid-cols-3 gap-4 mb-6\">
            <div class=\"stat-card\">
                <div class=\"stat-card-icon secondary\">
                    <svg width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                        <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                        <polyline points=\"12 6 12 12 16 14\"/>
                    </svg>
                </div>
                <div class=\"stat-card-value\">";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalMinutesWeek"]) || array_key_exists("totalMinutesWeek", $context) ? $context["totalMinutesWeek"] : (function () { throw new RuntimeError('Variable "totalMinutesWeek" does not exist.', 29, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"stat-card-label\">Minutes cette semaine</div>
            </div>
            <div class=\"stat-card\">
                <div class=\"stat-card-value\">";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["weekSeances"]) || array_key_exists("weekSeances", $context) ? $context["weekSeances"] : (function () { throw new RuntimeError('Variable "weekSeances" does not exist.', 33, $this->source); })())), "html", null, true);
        yield "</div>
                <div class=\"stat-card-label\">Seances cette semaine</div>
            </div>
            <div class=\"stat-card\">
                <div class=\"stat-card-value\">";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["seances"]) || array_key_exists("seances", $context) ? $context["seances"] : (function () { throw new RuntimeError('Variable "seances" does not exist.', 37, $this->source); })())), "html", null, true);
        yield "</div>
                <div class=\"stat-card-label\">Total seances</div>
            </div>
        </div>

        ";
        // line 43
        yield "        <div class=\"card\">
            <div class=\"card-header\">
                <h4 class=\"card-title\">Historique des seances</h4>
            </div>
            ";
        // line 47
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["seances"]) || array_key_exists("seances", $context) ? $context["seances"] : (function () { throw new RuntimeError('Variable "seances" does not exist.', 47, $this->source); })())) > 0)) {
            // line 48
            yield "                <div class=\"table-container\">
                    <table class=\"table\">
                        <thead>
                            <tr>
                                <th>Seance</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Duree</th>
                                <th>Medaille</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
            // line 61
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["seances"]) || array_key_exists("seances", $context) ? $context["seances"] : (function () { throw new RuntimeError('Variable "seances" does not exist.', 61, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                // line 62
                yield "                                <tr>
                                    <td><strong>";
                // line 63
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "nomSeance", [], "any", false, false, false, 63), "html", null, true);
                yield "</strong></td>
                                    <td>";
                // line 64
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "dateSeance", [], "any", false, false, false, 64), "d/m/Y"), "html", null, true);
                yield "</td>
                                    <td>";
                // line 65
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "heureDebut", [], "any", false, false, false, 65), "H:i"), "html", null, true);
                yield "</td>
                                    <td>";
                // line 66
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "dureeMinutes", [], "any", false, false, false, 66), "html", null, true);
                yield " min</td>
                                    <td>
                                        ";
                // line 68
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["s"], "medailleObtenue", [], "any", false, false, false, 68)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 69
                    yield "                                            <span class=\"badge badge-warning\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "medailleObtenue", [], "any", false, false, false, 69), "html", null, true);
                    yield "</span>
                                        ";
                } else {
                    // line 71
                    yield "                                            <span class=\"text-gray\">-</span>
                                        ";
                }
                // line 73
                yield "                                    </td>
                                    <td>
                                        <div class=\"table-actions\">
                                            <a href=\"";
                // line 76
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["s"], "id", [], "any", false, false, false, 76)]), "html", null, true);
                yield "\" class=\"icon-btn\" title=\"Voir\">
                                                <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                                    <path d=\"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z\"/>
                                                    <circle cx=\"12\" cy=\"12\" r=\"3\"/>
                                                </svg>
                                            </a>
                                            <a href=\"";
                // line 82
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["s"], "id", [], "any", false, false, false, 82)]), "html", null, true);
                yield "\" class=\"icon-btn\" title=\"Modifier\">
                                                <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                                    <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                                    <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                                                </svg>
                                            </a>
                                            <form action=\"";
                // line 88
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["s"], "id", [], "any", false, false, false, 88)]), "html", null, true);
                yield "\" method=\"post\" style=\"display: inline;\" id=\"delete-form-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "id", [], "any", false, false, false, 88), "html", null, true);
                yield "\">
                                                <input type=\"hidden\" name=\"_token\" value=\"";
                // line 89
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["s"], "id", [], "any", false, false, false, 89))), "html", null, true);
                yield "\">
                                                <button type=\"button\" class=\"icon-btn danger\" title=\"Supprimer\" onclick=\"confirmDelete('delete-form-";
                // line 90
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "id", [], "any", false, false, false, 90), "html", null, true);
                yield "')\">
                                                    <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                                        <polyline points=\"3 6 5 6 21 6\"/>
                                                        <path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['s'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 101
            yield "                        </tbody>
                    </table>
                </div>
            ";
        } else {
            // line 105
            yield "                <div class=\"empty-state\">
                    <svg width=\"64\" height=\"64\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--gray-300)\" stroke-width=\"2\">
                        <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                        <polyline points=\"12 6 12 12 16 14\"/>
                    </svg>
                    <h4 class=\"empty-state-title\">Aucune seance enregistree</h4>
                    <p class=\"text-gray\">Commencez a suivre votre activite physique.</p>
                    <a href=\"";
            // line 112
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports_new");
            yield "\" class=\"btn btn-secondary mt-4\">Ajouter une seance</a>
                </div>
            ";
        }
        // line 115
        yield "        </div>
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
        return "sports/index.html.twig";
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
        return array (  281 => 115,  275 => 112,  266 => 105,  260 => 101,  243 => 90,  239 => 89,  233 => 88,  224 => 82,  215 => 76,  210 => 73,  206 => 71,  200 => 69,  198 => 68,  193 => 66,  189 => 65,  185 => 64,  181 => 63,  178 => 62,  174 => 61,  159 => 48,  157 => 47,  151 => 43,  143 => 37,  136 => 33,  129 => 29,  119 => 21,  107 => 11,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Sports & Fitness - BioSync{% endblock %}

{% block body %}
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">Sport</h1>
                <p class=\"page-subtitle\">Suivez vos seances d'entrainement.</p>
            </div>
            <a href=\"{{ path('app_sports_new') }}\" class=\"btn btn-secondary\">
                <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                    <line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/>
                    <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
                </svg>
                Ajouter une seance
            </a>
        </div>

        {# Stats #}
        <div class=\"grid grid-cols-3 gap-4 mb-6\">
            <div class=\"stat-card\">
                <div class=\"stat-card-icon secondary\">
                    <svg width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                        <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                        <polyline points=\"12 6 12 12 16 14\"/>
                    </svg>
                </div>
                <div class=\"stat-card-value\">{{ totalMinutesWeek }}</div>
                <div class=\"stat-card-label\">Minutes cette semaine</div>
            </div>
            <div class=\"stat-card\">
                <div class=\"stat-card-value\">{{ weekSeances|length }}</div>
                <div class=\"stat-card-label\">Seances cette semaine</div>
            </div>
            <div class=\"stat-card\">
                <div class=\"stat-card-value\">{{ seances|length }}</div>
                <div class=\"stat-card-label\">Total seances</div>
            </div>
        </div>

        {# Liste des seances #}
        <div class=\"card\">
            <div class=\"card-header\">
                <h4 class=\"card-title\">Historique des seances</h4>
            </div>
            {% if seances|length > 0 %}
                <div class=\"table-container\">
                    <table class=\"table\">
                        <thead>
                            <tr>
                                <th>Seance</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Duree</th>
                                <th>Medaille</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {% for s in seances %}
                                <tr>
                                    <td><strong>{{ s.nomSeance }}</strong></td>
                                    <td>{{ s.dateSeance|date('d/m/Y') }}</td>
                                    <td>{{ s.heureDebut|date('H:i') }}</td>
                                    <td>{{ s.dureeMinutes }} min</td>
                                    <td>
                                        {% if s.medailleObtenue %}
                                            <span class=\"badge badge-warning\">{{ s.medailleObtenue }}</span>
                                        {% else %}
                                            <span class=\"text-gray\">-</span>
                                        {% endif %}
                                    </td>
                                    <td>
                                        <div class=\"table-actions\">
                                            <a href=\"{{ path('app_sports_show', {id: s.id}) }}\" class=\"icon-btn\" title=\"Voir\">
                                                <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                                    <path d=\"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z\"/>
                                                    <circle cx=\"12\" cy=\"12\" r=\"3\"/>
                                                </svg>
                                            </a>
                                            <a href=\"{{ path('app_sports_edit', {id: s.id}) }}\" class=\"icon-btn\" title=\"Modifier\">
                                                <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                                    <path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/>
                                                    <path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/>
                                                </svg>
                                            </a>
                                            <form action=\"{{ path('app_sports_delete', {id: s.id}) }}\" method=\"post\" style=\"display: inline;\" id=\"delete-form-{{ s.id }}\">
                                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ s.id) }}\">
                                                <button type=\"button\" class=\"icon-btn danger\" title=\"Supprimer\" onclick=\"confirmDelete('delete-form-{{ s.id }}')\">
                                                    <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                                        <polyline points=\"3 6 5 6 21 6\"/>
                                                        <path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            {% endfor %}
                        </tbody>
                    </table>
                </div>
            {% else %}
                <div class=\"empty-state\">
                    <svg width=\"64\" height=\"64\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--gray-300)\" stroke-width=\"2\">
                        <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                        <polyline points=\"12 6 12 12 16 14\"/>
                    </svg>
                    <h4 class=\"empty-state-title\">Aucune seance enregistree</h4>
                    <p class=\"text-gray\">Commencez a suivre votre activite physique.</p>
                    <a href=\"{{ path('app_sports_new') }}\" class=\"btn btn-secondary mt-4\">Ajouter une seance</a>
                </div>
            {% endif %}
        </div>
    </main>
</div>
{% endblock %}
", "sports/index.html.twig", "C:\\biosync_new\\templates\\sports\\index.html.twig");
    }
}
