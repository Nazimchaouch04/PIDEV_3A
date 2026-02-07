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

/* dashboard/dashboard_repas_users.html.twig */
class __TwigTemplate_9a27d1aba43929b279ba26b498df439a extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/dashboard_repas_users.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/dashboard_repas_users.html.twig"));

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

        yield "Admin - Utilisateurs";
        
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
    <h1 class=\"page-title\">Utilisateurs</h1>
    <p class=\"page-subtitle\">Superviser les profils et accéder à leurs repas</p>
  </div>
</div>

<div class=\"card\">
  <div class=\"card-content\">
    <div style=\"overflow-x: auto;\">
      <table style=\"width:100%; border-collapse: collapse;\">
        <thead>
          <tr style=\"text-align: left; border-bottom: 1px solid var(--border-color);\">
            <th style=\"padding: 12px;\">Nom</th>
            <th style=\"padding: 12px;\">Email</th>
            <th style=\"padding: 12px;\">Rôle</th>
            <th style=\"padding: 12px; text-align: right;\">Actions</th>
          </tr>
        </thead>
        <tbody>
        ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 26, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 27
            yield "          <tr style=\"border-bottom: 1px solid var(--border-light);\">
            <td style=\"padding: 12px; font-weight: 600;\">";
            // line 28
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "nom", [], "any", true, true, false, 28) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["user"], "nom", [], "any", false, false, false, 28)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "nom", [], "any", false, false, false, 28), "html", null, true)) : ((((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "name", [], "any", true, true, false, 28) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["user"], "name", [], "any", false, false, false, 28)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "name", [], "any", false, false, false, 28), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::default(((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "prenom", [], "any", false, false, false, 28) . " ") . CoreExtension::getAttribute($this->env, $this->source, $context["user"], "nom", [], "any", false, false, false, 28)), "N/A"), "html", null, true)))));
            yield "</td>
            <td style=\"padding: 12px;\">";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 29), "html", null, true);
            yield "</td>
            <td style=\"padding: 12px;\">
              ";
            // line 31
            $context["roles"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "roles", [], "any", true, true, false, 31) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["user"], "roles", [], "any", false, false, false, 31)))) ? (CoreExtension::getAttribute($this->env, $this->source, $context["user"], "roles", [], "any", false, false, false, 31)) : ([]));
            // line 32
            yield "              ";
            if (CoreExtension::inFilter("ROLE_ADMIN", (isset($context["roles"]) || array_key_exists("roles", $context) ? $context["roles"] : (function () { throw new RuntimeError('Variable "roles" does not exist.', 32, $this->source); })()))) {
                // line 33
                yield "                Admin
              ";
            } elseif (CoreExtension::inFilter("ROLE_COACH",             // line 34
(isset($context["roles"]) || array_key_exists("roles", $context) ? $context["roles"] : (function () { throw new RuntimeError('Variable "roles" does not exist.', 34, $this->source); })()))) {
                // line 35
                yield "                Coach
              ";
            } else {
                // line 37
                yield "                Utilisateur
              ";
            }
            // line 39
            yield "            </td>
            <td style=\"padding: 12px; text-align: right;\">
              <a class=\"btn btn-outline\" href=\"";
            // line 41
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_user_meals", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 41)]), "html", null, true);
            yield "\">Voir ses repas</a>
            </td>
          </tr>
        ";
            $context['_iterated'] = true;
        }
        // line 44
        if (!$context['_iterated']) {
            // line 45
            yield "          <tr><td colspan=\"4\" style=\"padding: 16px; color: var(--text-secondary);\">Aucun utilisateur trouvé.</td></tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['user'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
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
        return "dashboard/dashboard_repas_users.html.twig";
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
        return array (  178 => 47,  171 => 45,  169 => 44,  161 => 41,  157 => 39,  153 => 37,  149 => 35,  147 => 34,  144 => 33,  141 => 32,  139 => 31,  134 => 29,  130 => 28,  127 => 27,  122 => 26,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Admin - Utilisateurs{% endblock %}

{% block body %}
<div class=\"page-header flex-between\">
  <div>
    <h1 class=\"page-title\">Utilisateurs</h1>
    <p class=\"page-subtitle\">Superviser les profils et accéder à leurs repas</p>
  </div>
</div>

<div class=\"card\">
  <div class=\"card-content\">
    <div style=\"overflow-x: auto;\">
      <table style=\"width:100%; border-collapse: collapse;\">
        <thead>
          <tr style=\"text-align: left; border-bottom: 1px solid var(--border-color);\">
            <th style=\"padding: 12px;\">Nom</th>
            <th style=\"padding: 12px;\">Email</th>
            <th style=\"padding: 12px;\">Rôle</th>
            <th style=\"padding: 12px; text-align: right;\">Actions</th>
          </tr>
        </thead>
        <tbody>
        {% for user in users %}
          <tr style=\"border-bottom: 1px solid var(--border-light);\">
            <td style=\"padding: 12px; font-weight: 600;\">{{ user.nom ?? user.name ?? (user.prenom ~ ' ' ~ user.nom)|default('N/A') }}</td>
            <td style=\"padding: 12px;\">{{ user.email }}</td>
            <td style=\"padding: 12px;\">
              {% set roles = user.roles ?? [] %}
              {% if 'ROLE_ADMIN' in roles %}
                Admin
              {% elseif 'ROLE_COACH' in roles %}
                Coach
              {% else %}
                Utilisateur
              {% endif %}
            </td>
            <td style=\"padding: 12px; text-align: right;\">
              <a class=\"btn btn-outline\" href=\"{{ path('admin_user_meals', {'id': user.id}) }}\">Voir ses repas</a>
            </td>
          </tr>
        {% else %}
          <tr><td colspan=\"4\" style=\"padding: 16px; color: var(--text-secondary);\">Aucun utilisateur trouvé.</td></tr>
        {% endfor %}
        </tbody>
      </table>
    </div>
  </div>
</div>
{% endblock %}
", "dashboard/dashboard_repas_users.html.twig", "C:\\biosync_new\\templates\\dashboard\\dashboard_repas_users.html.twig");
    }
}
