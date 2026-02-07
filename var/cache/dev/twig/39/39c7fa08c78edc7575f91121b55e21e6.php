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

/* dashboard/index.html.twig */
class __TwigTemplate_7026853344d9f2d6669c13d4454be08b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/index.html.twig"));

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

        yield "Dashboard Repas - BioSync";
        
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
        yield "<div class=\"page-header\">
    <h1 class=\"page-title\">Dashboard Repas</h1>
    <p class=\"page-subtitle\">Gérez vos dashboards nutritionnels</p>
</div>

<div class=\"grid grid-cols-2 gap-6\">
    ";
        // line 13
        yield "    <div class=\"card\" style=\"margin: 20px 0;\">
        <div class=\"card-header flex-between\">
            <div>
            </div>
            <div style=\"display: flex; gap: 8px;\">
                <a href=\"";
        // line 18
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_index");
        yield "\" class=\"btn btn-sm btn-primary\">Gérer les utilisateurs et leurs repas</a>
                <a href=\"";
        // line 19
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_pdf");
        yield "\" class=\"btn btn-sm btn-outline-secondary\" target=\"_blank\">
                    <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                        <path d=\"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z\"/>
                        <polyline points=\"14 2 14 8 20 8\"/>
                        <line x1=\"16\" y1=\"13\" x2=\"8\" y2=\"13\"/>
                        <line x1=\"16\" y1=\"17\" x2=\"8\" y2=\"17\"/>
                        <polyline points=\"10 9 9 9 8 9\"/>
                    </svg>
                    Export PDF
                </a>
            </div>
        </div>
        
        ";
        // line 33
        yield "        <div style=\"padding: 16px 20px; border-bottom: 1px solid var(--border-light); background: var(--bg-secondary);\">
            <div style=\"display: flex; gap: 12px; align-items: center; flex-wrap: wrap;\">
                <div style=\"flex: 1; min-width: 200px; position: relative;\">
                    <span style=\"position: absolute; left: 12px; top: 50%; transform: translateY(-50%); font-size: 0.875rem;\">🔍</span>
                    <input type=\"text\" id=\"searchUsers\" placeholder=\"Rechercher un utilisateur...\" 
                           style=\"width: 100%; padding: 8px 12px 8px 35px; border: 1px solid var(--border-color); border-radius: 6px; font-size: 0.875rem;\">
                </div>
                <select id=\"sortUsers\" style=\"padding: 8px 12px; border: 1px solid var(--border-color); border-radius: 6px; font-size: 0.875rem;\">
                    <option value=\"name\">Trier par nom</option>
                    <option value=\"email\">Trier par email</option>
                </select>
            </div>
        </div>
        
        <div style=\"overflow-x: auto;\">
            <table style=\"width:100%; border-collapse: collapse;\">
                <thead>
                    <tr style=\"text-align: left; border-bottom: 1px solid var(--border-color);\">
                        <th style=\"padding: 12px;\">
                            <div style=\"display: flex; align-items: center; gap: 8px;\">
                                Nom
                                <button onclick=\"sortTable('name')\" style=\"background: none; border: none; cursor: pointer; padding: 4px;\">
                                    <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                        <polyline points=\"18 15 12 9 6 15\"/>
                                    </svg>
                                </button>
                            </div>
                        </th>
                        <th style=\"padding: 12px;\">
                            <div style=\"display: flex; align-items: center; gap: 8px;\">
                                Email
                                <button onclick=\"sortTable('email')\" style=\"background: none; border: none; cursor: pointer; padding: 4px;\">
                                    <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                        <polyline points=\"18 15 12 9 6 15\"/>
                                    </svg>
                                </button>
                            </div>
                        </th>
                        <th style=\"padding: 12px; text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody id=\"usersTableBody\">
                ";
        // line 75
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 75, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 76
            yield "                    <tr style=\"border-bottom: 1px solid var(--border-light);\" data-name=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "nomComplet", [], "any", false, false, false, 76)), "html", null, true);
            yield "\" data-email=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 76)), "html", null, true);
            yield "\">
                        <td style=\"padding: 12px; font-weight: 600;\">";
            // line 77
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "nomComplet", [], "any", true, true, false, 77)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "nomComplet", [], "any", false, false, false, 77), "N/A")) : ("N/A")), "html", null, true);
            yield "</td>
                        <td style=\"padding: 12px;\">";
            // line 78
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 78), "html", null, true);
            yield "</td>
                        <td style=\"padding: 12px; text-align: right;\">
                            <a class=\"btn btn-sm btn-outline-primary\" href=\"";
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_user_meals", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 80)]), "html", null, true);
            yield "\">Voir repas</a>
                        </td>
                    </tr>
                ";
            $context['_iterated'] = true;
        }
        // line 83
        if (!$context['_iterated']) {
            // line 84
            yield "                    <tr><td colspan=\"3\" style=\"padding: 16px; color: var(--text-secondary); text-align: center;\">Aucun utilisateur trouvé.</td></tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['user'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 86
        yield "                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
// Fonction de recherche
document.getElementById('searchUsers').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('#usersTableBody tr');
    
    rows.forEach(row => {
        const name = row.getAttribute('data-name') || '';
        const email = row.getAttribute('data-email') || '';
        const isVisible = name.includes(searchTerm) || email.includes(searchTerm);
        row.style.display = isVisible ? '' : 'none';
    });
});

// Fonction de tri
function sortTable(column) {
    const tbody = document.getElementById('usersTableBody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    
    rows.sort((a, b) => {
        let aValue, bValue;
        
        if (column === 'name') {
            aValue = a.getAttribute('data-name') || '';
            bValue = b.getAttribute('data-name') || '';
        } else if (column === 'email') {
            aValue = a.getAttribute('data-email') || '';
            bValue = b.getAttribute('data-email') || '';
        }
        
        return aValue.localeCompare(bValue);
    });
    
    // Réorganiser les lignes
    rows.forEach(row => tbody.appendChild(row));
}

// Tri par select
document.getElementById('sortUsers').addEventListener('change', function(e) {
    sortTable(e.target.value);
});

// Réinitialiser la recherche
function resetSearch() {
    document.getElementById('searchUsers').value = '';
    document.getElementById('sortUsers').value = 'name';
    
    const rows = document.querySelectorAll('#usersTableBody tr');
    rows.forEach(row => {
        row.style.display = '';
    });
    
    // Remettre l'ordre original
    sortTable('name');
}
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
        return "dashboard/index.html.twig";
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
        return array (  217 => 86,  210 => 84,  208 => 83,  200 => 80,  195 => 78,  191 => 77,  184 => 76,  179 => 75,  135 => 33,  119 => 19,  115 => 18,  108 => 13,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Dashboard Repas - BioSync{% endblock %}

{% block body %}
<div class=\"page-header\">
    <h1 class=\"page-title\">Dashboard Repas</h1>
    <p class=\"page-subtitle\">Gérez vos dashboards nutritionnels</p>
</div>

<div class=\"grid grid-cols-2 gap-6\">
    {# Dashboard Utilisateurs #}
    <div class=\"card\" style=\"margin: 20px 0;\">
        <div class=\"card-header flex-between\">
            <div>
            </div>
            <div style=\"display: flex; gap: 8px;\">
                <a href=\"{{ path('admin_users_index') }}\" class=\"btn btn-sm btn-primary\">Gérer les utilisateurs et leurs repas</a>
                <a href=\"{{ path('admin_users_pdf') }}\" class=\"btn btn-sm btn-outline-secondary\" target=\"_blank\">
                    <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                        <path d=\"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z\"/>
                        <polyline points=\"14 2 14 8 20 8\"/>
                        <line x1=\"16\" y1=\"13\" x2=\"8\" y2=\"13\"/>
                        <line x1=\"16\" y1=\"17\" x2=\"8\" y2=\"17\"/>
                        <polyline points=\"10 9 9 9 8 9\"/>
                    </svg>
                    Export PDF
                </a>
            </div>
        </div>
        
        {# Barre de recherche et filtres #}
        <div style=\"padding: 16px 20px; border-bottom: 1px solid var(--border-light); background: var(--bg-secondary);\">
            <div style=\"display: flex; gap: 12px; align-items: center; flex-wrap: wrap;\">
                <div style=\"flex: 1; min-width: 200px; position: relative;\">
                    <span style=\"position: absolute; left: 12px; top: 50%; transform: translateY(-50%); font-size: 0.875rem;\">🔍</span>
                    <input type=\"text\" id=\"searchUsers\" placeholder=\"Rechercher un utilisateur...\" 
                           style=\"width: 100%; padding: 8px 12px 8px 35px; border: 1px solid var(--border-color); border-radius: 6px; font-size: 0.875rem;\">
                </div>
                <select id=\"sortUsers\" style=\"padding: 8px 12px; border: 1px solid var(--border-color); border-radius: 6px; font-size: 0.875rem;\">
                    <option value=\"name\">Trier par nom</option>
                    <option value=\"email\">Trier par email</option>
                </select>
            </div>
        </div>
        
        <div style=\"overflow-x: auto;\">
            <table style=\"width:100%; border-collapse: collapse;\">
                <thead>
                    <tr style=\"text-align: left; border-bottom: 1px solid var(--border-color);\">
                        <th style=\"padding: 12px;\">
                            <div style=\"display: flex; align-items: center; gap: 8px;\">
                                Nom
                                <button onclick=\"sortTable('name')\" style=\"background: none; border: none; cursor: pointer; padding: 4px;\">
                                    <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                        <polyline points=\"18 15 12 9 6 15\"/>
                                    </svg>
                                </button>
                            </div>
                        </th>
                        <th style=\"padding: 12px;\">
                            <div style=\"display: flex; align-items: center; gap: 8px;\">
                                Email
                                <button onclick=\"sortTable('email')\" style=\"background: none; border: none; cursor: pointer; padding: 4px;\">
                                    <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                        <polyline points=\"18 15 12 9 6 15\"/>
                                    </svg>
                                </button>
                            </div>
                        </th>
                        <th style=\"padding: 12px; text-align: right;\">Actions</th>
                    </tr>
                </thead>
                <tbody id=\"usersTableBody\">
                {% for user in users %}
                    <tr style=\"border-bottom: 1px solid var(--border-light);\" data-name=\"{{ user.nomComplet|lower }}\" data-email=\"{{ user.email|lower }}\">
                        <td style=\"padding: 12px; font-weight: 600;\">{{ user.nomComplet|default('N/A') }}</td>
                        <td style=\"padding: 12px;\">{{ user.email }}</td>
                        <td style=\"padding: 12px; text-align: right;\">
                            <a class=\"btn btn-sm btn-outline-primary\" href=\"{{ path('admin_user_meals', {'id': user.id}) }}\">Voir repas</a>
                        </td>
                    </tr>
                {% else %}
                    <tr><td colspan=\"3\" style=\"padding: 16px; color: var(--text-secondary); text-align: center;\">Aucun utilisateur trouvé.</td></tr>
                {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
// Fonction de recherche
document.getElementById('searchUsers').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('#usersTableBody tr');
    
    rows.forEach(row => {
        const name = row.getAttribute('data-name') || '';
        const email = row.getAttribute('data-email') || '';
        const isVisible = name.includes(searchTerm) || email.includes(searchTerm);
        row.style.display = isVisible ? '' : 'none';
    });
});

// Fonction de tri
function sortTable(column) {
    const tbody = document.getElementById('usersTableBody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    
    rows.sort((a, b) => {
        let aValue, bValue;
        
        if (column === 'name') {
            aValue = a.getAttribute('data-name') || '';
            bValue = b.getAttribute('data-name') || '';
        } else if (column === 'email') {
            aValue = a.getAttribute('data-email') || '';
            bValue = b.getAttribute('data-email') || '';
        }
        
        return aValue.localeCompare(bValue);
    });
    
    // Réorganiser les lignes
    rows.forEach(row => tbody.appendChild(row));
}

// Tri par select
document.getElementById('sortUsers').addEventListener('change', function(e) {
    sortTable(e.target.value);
});

// Réinitialiser la recherche
function resetSearch() {
    document.getElementById('searchUsers').value = '';
    document.getElementById('sortUsers').value = 'name';
    
    const rows = document.querySelectorAll('#usersTableBody tr');
    rows.forEach(row => {
        row.style.display = '';
    });
    
    // Remettre l'ordre original
    sortTable('name');
}
</script>
{% endblock %}
", "dashboard/index.html.twig", "C:\\biosync_new\\templates\\dashboard\\index.html.twig");
    }
}
