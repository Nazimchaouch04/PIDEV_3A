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

/* dashboard/dashboard_repas_user_meals.html.twig */
class __TwigTemplate_f33e897697536424e3aee67e89647e2c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/dashboard_repas_user_meals.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/dashboard_repas_user_meals.html.twig"));

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

        yield "Admin - Repas de ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 3, $this->source); })()), "email", [], "any", false, false, false, 3), "html", null, true);
        
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
    <h1 class=\"page-title\">Repas de l'utilisateur</h1>
    <p class=\"page-subtitle\">";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "nomComplet", [], "any", true, true, false, 9)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 9, $this->source); })()), "nomComplet", [], "any", false, false, false, 9), "Utilisateur")) : ("Utilisateur")), "html", null, true);
        yield " — ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 9, $this->source); })()), "email", [], "any", false, false, false, 9), "html", null, true);
        yield "</p>
  </div>
  <div>
    <a class=\"btn btn-outline\" href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
        yield "\">Retour à la liste</a>
  </div>
</div>

<div class=\"card\">
  <div class=\"card-content\">
    <div style=\"overflow-x: auto;\">
      <table style=\"width:100%; border-collapse: collapse;\">
        <thead>
          <tr style=\"text-align: left; border-bottom: 1px solid var(--border-color);\">
            <th style=\"padding: 12px;\">Titre du repas</th>
            <th style=\"padding: 12px;\">Moment</th>
            <th style=\"padding: 12px;\">Date de consommation</th>
            <th style=\"padding: 12px; text-align: right;\">Actions</th>
          </tr>
        </thead>
        <tbody>
        ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["repasList"]) || array_key_exists("repasList", $context) ? $context["repasList"] : (function () { throw new RuntimeError('Variable "repasList" does not exist.', 29, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["repa"]) {
            // line 30
            yield "          <tr style=\"border-bottom: 1px solid var(--border-light);\">
            <td style=\"padding: 12px; font-weight: 600;\">";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["repa"], "titreRepas", [], "any", false, false, false, 31), "html", null, true);
            yield "</td>
            <td style=\"padding: 12px;\">";
            // line 32
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["repa"], "typeMoment", [], "any", false, false, false, 32)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["repa"], "typeMoment", [], "any", false, false, false, 32), "label", [], "method", false, false, false, 32), "html", null, true)) : (""));
            yield "</td>
            <td style=\"padding: 12px;\">";
            // line 33
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["repa"], "dateConsommation", [], "any", false, false, false, 33)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["repa"], "dateConsommation", [], "any", false, false, false, 33), "d/m/Y H:i"), "html", null, true)) : (""));
            yield "</td>
            <td style=\"padding: 12px; text-align: right; display:flex; gap:8px; justify-content:flex-end;\">
              <a class=\"btn btn-outline\" href=\"";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_meal_foods", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["repa"], "id", [], "any", false, false, false, 35)]), "html", null, true);
            yield "\">Voir les aliments</a>
              <a class=\"btn btn-primary\" href=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_repas_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["repa"], "id", [], "any", false, false, false, 36), "redirect_to" => "admin_user_meals", "user_id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 36, $this->source); })()), "id", [], "any", false, false, false, 36)]), "html", null, true);
            yield "\">Modifier</a>
              <form method=\"post\" action=\"";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_repas_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["repa"], "id", [], "any", false, false, false, 37), "redirect_to" => "admin_user_meals", "user_id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 37, $this->source); })()), "id", [], "any", false, false, false, 37)]), "html", null, true);
            yield "\" onsubmit=\"return confirm('Confirmer la suppression de ce repas ?');\" style=\"display:inline-block;\">
                <input type=\"hidden\" name=\"_token\" value=\"";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["repa"], "id", [], "any", false, false, false, 38))), "html", null, true);
            yield "\">
                <button class=\"btn\" style=\"color:#EF4444; border:1px solid #FECACA; background:#FEF2F2;\">Supprimer</button>
              </form>
            </td>
          </tr>
        ";
            $context['_iterated'] = true;
        }
        // line 43
        if (!$context['_iterated']) {
            // line 44
            yield "          <tr><td colspan=\"4\" style=\"padding: 16px; color: var(--text-secondary);\">Aucun repas trouvé.</td></tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['repa'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
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
        return "dashboard/dashboard_repas_user_meals.html.twig";
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
        return array (  186 => 46,  179 => 44,  177 => 43,  167 => 38,  163 => 37,  159 => 36,  155 => 35,  150 => 33,  146 => 32,  142 => 31,  139 => 30,  134 => 29,  114 => 12,  106 => 9,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Admin - Repas de {{ user.email }}{% endblock %}

{% block body %}
<div class=\"page-header flex-between\">
  <div>
    <h1 class=\"page-title\">Repas de l'utilisateur</h1>
    <p class=\"page-subtitle\">{{ user.nomComplet|default('Utilisateur') }} — {{ user.email }}</p>
  </div>
  <div>
    <a class=\"btn btn-outline\" href=\"{{ path('app_dashboard') }}\">Retour à la liste</a>
  </div>
</div>

<div class=\"card\">
  <div class=\"card-content\">
    <div style=\"overflow-x: auto;\">
      <table style=\"width:100%; border-collapse: collapse;\">
        <thead>
          <tr style=\"text-align: left; border-bottom: 1px solid var(--border-color);\">
            <th style=\"padding: 12px;\">Titre du repas</th>
            <th style=\"padding: 12px;\">Moment</th>
            <th style=\"padding: 12px;\">Date de consommation</th>
            <th style=\"padding: 12px; text-align: right;\">Actions</th>
          </tr>
        </thead>
        <tbody>
        {% for repa in repasList %}
          <tr style=\"border-bottom: 1px solid var(--border-light);\">
            <td style=\"padding: 12px; font-weight: 600;\">{{ repa.titreRepas }}</td>
            <td style=\"padding: 12px;\">{{ repa.typeMoment ? repa.typeMoment.label() : '' }}</td>
            <td style=\"padding: 12px;\">{{ repa.dateConsommation ? repa.dateConsommation|date('d/m/Y H:i') : '' }}</td>
            <td style=\"padding: 12px; text-align: right; display:flex; gap:8px; justify-content:flex-end;\">
              <a class=\"btn btn-outline\" href=\"{{ path('admin_meal_foods', {'id': repa.id}) }}\">Voir les aliments</a>
              <a class=\"btn btn-primary\" href=\"{{ path('app_repas_edit', {'id': repa.id, 'redirect_to': 'admin_user_meals', 'user_id': user.id}) }}\">Modifier</a>
              <form method=\"post\" action=\"{{ path('app_repas_delete', {'id': repa.id, 'redirect_to': 'admin_user_meals', 'user_id': user.id}) }}\" onsubmit=\"return confirm('Confirmer la suppression de ce repas ?');\" style=\"display:inline-block;\">
                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ repa.id) }}\">
                <button class=\"btn\" style=\"color:#EF4444; border:1px solid #FECACA; background:#FEF2F2;\">Supprimer</button>
              </form>
            </td>
          </tr>
        {% else %}
          <tr><td colspan=\"4\" style=\"padding: 16px; color: var(--text-secondary);\">Aucun repas trouvé.</td></tr>
        {% endfor %}
        </tbody>
      </table>
    </div>
  </div>
</div>
{% endblock %}
", "dashboard/dashboard_repas_user_meals.html.twig", "C:\\biosync_new\\templates\\dashboard\\dashboard_repas_user_meals.html.twig");
    }
}
