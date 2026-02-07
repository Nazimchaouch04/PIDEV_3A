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

/* dashboard/dashboard_repas_meal_foods.html.twig */
class __TwigTemplate_107dffdb5ea2d3c5df7759fe01773fad extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/dashboard_repas_meal_foods.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/dashboard_repas_meal_foods.html.twig"));

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

        yield "Admin - Aliments du repas";
        
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
        yield "<div class=\"page-header flex-between\">
  <div>
    <h1 class=\"page-title\">Aliments du repas</h1>
    <p class=\"page-subtitle\">";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 9, $this->source); })()), "titreRepas", [], "any", false, false, false, 9), "html", null, true);
        yield " — ";
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 9, $this->source); })()), "dateConsommation", [], "any", false, false, false, 9)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 9, $this->source); })()), "dateConsommation", [], "any", false, false, false, 9), "d/m/Y H:i"), "html", null, true)) : (""));
        yield "</p>
  </div>
  <div style=\"display:flex; gap:8px;\">
    <a class=\"btn btn-outline\" href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_user_meals", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 12, $this->source); })()), "utilisateur", [], "any", false, false, false, 12), "id", [], "any", false, false, false, 12)]), "html", null, true);
        yield "\">Retour aux repas</a>
    <a class=\"btn btn-primary\" href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_new", ["repas_id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 13, $this->source); })()), "id", [], "any", false, false, false, 13)]), "html", null, true);
        yield "\">Ajouter un aliment</a>
  </div>
</div>

<div class=\"card\">
  <div class=\"card-content\">
    <div style=\"overflow-x: auto;\">
      <table style=\"width:100%; border-collapse: collapse;\">
        <thead>
          <tr style=\"text-align: left; border-bottom: 1px solid var(--border-color);\">
            <th style=\"padding: 12px;\">Nom</th>
            <th style=\"padding: 12px;\">Calories</th>
            <th style=\"padding: 12px; text-align: right;\">Actions</th>
          </tr>
        </thead>
        <tbody>
        ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["aliments"]) || array_key_exists("aliments", $context) ? $context["aliments"] : (function () { throw new RuntimeError('Variable "aliments" does not exist.', 29, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["aliment"]) {
            // line 30
            yield "          <tr style=\"border-bottom: 1px solid var(--border-light);\">
            <td style=\"padding: 12px; font-weight: 600;\">";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "nomAliment", [], "any", false, false, false, 31), "html", null, true);
            yield "</td>
            <td style=\"padding: 12px;\">";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "calories", [], "any", false, false, false, 32), "html", null, true);
            yield "</td>
            <td style=\"padding: 12px; text-align: right; display:flex; gap:8px; justify-content:flex-end;\">
              <a class=\"btn btn-primary\" href=\"";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "id", [], "any", false, false, false, 34), "repas_id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 34, $this->source); })()), "id", [], "any", false, false, false, 34)]), "html", null, true);
            yield "\">Modifier</a>
              <form method=\"post\" action=\"";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "id", [], "any", false, false, false, 35), "redirect_to" => "admin_meal_foods", "repas_id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["repas"]) || array_key_exists("repas", $context) ? $context["repas"] : (function () { throw new RuntimeError('Variable "repas" does not exist.', 35, $this->source); })()), "id", [], "any", false, false, false, 35)]), "html", null, true);
            yield "\" onsubmit=\"return confirm('Confirmer la suppression de cet aliment ?');\" style=\"display:inline-block;\">
                <input type=\"hidden\" name=\"_token\" value=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["aliment"], "id", [], "any", false, false, false, 36))), "html", null, true);
            yield "\">
                <button class=\"btn\" style=\"color:#EF4444; border:1px solid #FECACA; background:#FEF2F2;\">Supprimer</button>
              </form>
            </td>
          </tr>
        ";
            $context['_iterated'] = true;
        }
        // line 41
        if (!$context['_iterated']) {
            // line 42
            yield "          <tr><td colspan=\"3\" style=\"padding: 16px; color: var(--text-secondary);\">Aucun aliment trouvé.</td></tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['aliment'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        yield "        </tbody>
      </table>
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
        return "dashboard/dashboard_repas_meal_foods.html.twig";
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
        return array (  180 => 44,  173 => 42,  171 => 41,  161 => 36,  157 => 35,  153 => 34,  148 => 32,  144 => 31,  141 => 30,  136 => 29,  117 => 13,  113 => 12,  105 => 9,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Admin - Aliments du repas{% endblock %}

{% block body %}
<div class=\"page-header flex-between\">
  <div>
    <h1 class=\"page-title\">Aliments du repas</h1>
    <p class=\"page-subtitle\">{{ repas.titreRepas }} — {{ repas.dateConsommation ? repas.dateConsommation|date('d/m/Y H:i') : '' }}</p>
  </div>
  <div style=\"display:flex; gap:8px;\">
    <a class=\"btn btn-outline\" href=\"{{ path('admin_user_meals', {'id': repas.utilisateur.id}) }}\">Retour aux repas</a>
    <a class=\"btn btn-primary\" href=\"{{ path('app_aliment_new', {'repas_id': repas.id}) }}\">Ajouter un aliment</a>
  </div>
</div>

<div class=\"card\">
  <div class=\"card-content\">
    <div style=\"overflow-x: auto;\">
      <table style=\"width:100%; border-collapse: collapse;\">
        <thead>
          <tr style=\"text-align: left; border-bottom: 1px solid var(--border-color);\">
            <th style=\"padding: 12px;\">Nom</th>
            <th style=\"padding: 12px;\">Calories</th>
            <th style=\"padding: 12px; text-align: right;\">Actions</th>
          </tr>
        </thead>
        <tbody>
        {% for aliment in aliments %}
          <tr style=\"border-bottom: 1px solid var(--border-light);\">
            <td style=\"padding: 12px; font-weight: 600;\">{{ aliment.nomAliment }}</td>
            <td style=\"padding: 12px;\">{{ aliment.calories }}</td>
            <td style=\"padding: 12px; text-align: right; display:flex; gap:8px; justify-content:flex-end;\">
              <a class=\"btn btn-primary\" href=\"{{ path('app_aliment_edit', {'id': aliment.id, 'repas_id': repas.id}) }}\">Modifier</a>
              <form method=\"post\" action=\"{{ path('app_aliment_delete', {'id': aliment.id, 'redirect_to': 'admin_meal_foods', 'repas_id': repas.id}) }}\" onsubmit=\"return confirm('Confirmer la suppression de cet aliment ?');\" style=\"display:inline-block;\">
                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ aliment.id) }}\">
                <button class=\"btn\" style=\"color:#EF4444; border:1px solid #FECACA; background:#FEF2F2;\">Supprimer</button>
              </form>
            </td>
          </tr>
        {% else %}
          <tr><td colspan=\"3\" style=\"padding: 16px; color: var(--text-secondary);\">Aucun aliment trouvé.</td></tr>
        {% endfor %}
        </tbody>
      </table>
    </div>
  </div>
</div>
{% endblock %}
", "dashboard/dashboard_repas_meal_foods.html.twig", "C:\\biosync_new\\templates\\dashboard\\dashboard_repas_meal_foods.html.twig");
    }
}
