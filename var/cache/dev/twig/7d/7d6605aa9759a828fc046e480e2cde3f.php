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

/* partials/_sidebar.html.twig */
class __TwigTemplate_d2349c813b0de0cb27909ed646fff66b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_sidebar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partials/_sidebar.html.twig"));

        // line 1
        yield "<aside class=\"sidebar\">
    ";
        // line 3
        yield "    <div class=\"sidebar-header\">
        <a href=\"";
        // line 4
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
        yield "\" class=\"navbar-brand\">
            <div class=\"navbar-logo\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M22 12h-4l-3 9L9 3l-3 9H2\"/>
                </svg>
            </div>
            <span class=\"brand-text\">BioSync</span>
        </a>
    </div>

    ";
        // line 15
        yield "    <nav class=\"sidebar-menu\">
        <a href=\"";
        // line 16
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
        yield "\" class=\"menu-item ";
        yield (((((array_key_exists("active", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 16, $this->source); })()), "")) : ("")) == "dashboard")) ? ("active") : (""));
        yield "\">
            <span class=\"menu-item-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <rect x=\"3\" y=\"3\" width=\"7\" height=\"7\"/>
                    <rect x=\"14\" y=\"3\" width=\"7\" height=\"7\"/>
                    <rect x=\"14\" y=\"14\" width=\"7\" height=\"7\"/>
                    <rect x=\"3\" y=\"14\" width=\"7\" height=\"7\"/>
                </svg>
            </span>
            <span class=\"menu-item-text\">Dashboard</span>
        </a>

        <a href=\"";
        // line 28
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\" class=\"menu-item ";
        yield (((((array_key_exists("active", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 28, $this->source); })()), "")) : ("")) == "profile")) ? ("active") : (""));
        yield "\">
            <span class=\"menu-item-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2\"/>
                    <circle cx=\"12\" cy=\"7\" r=\"4\"/>
                </svg>
            </span>
            <div class=\"menu-item-text\">
                Profile
                <span class=\"menu-item-subtitle\">";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 37, $this->source); })()), "user", [], "any", false, false, false, 37), "nomComplet", [], "any", false, false, false, 37), " "), 0, [], "array", true, true, false, 37)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 37, $this->source); })()), "user", [], "any", false, false, false, 37), "nomComplet", [], "any", false, false, false, 37), " "), 0, [], "array", false, false, false, 37), "Mehdi")) : ("Mehdi")), "html", null, true);
        yield "</span>
            </div>
        </a>

        <a href=\"";
        // line 41
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_repas_index");
        yield "\" class=\"menu-item ";
        yield (((((array_key_exists("active", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 41, $this->source); })()), "")) : ("")) == "nutrition")) ? ("active") : (""));
        yield "\">
            <span class=\"menu-item-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                    <path d=\"M7 2v20\"/>
                    <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                </svg>
            </span>
            <div class=\"menu-item-text\">
                Nutrition
                <span class=\"menu-item-subtitle\">Selma</span>
            </div>
        </a>

        <a href=\"";
        // line 55
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
        yield "\" class=\"menu-item ";
        yield (((((array_key_exists("active", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 55, $this->source); })()), "")) : ("")) == "dashboard_repas")) ? ("active") : (""));
        yield "\">
            <span class=\"menu-item-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <rect x=\"3\" y=\"3\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                    <line x1=\"9\" y1=\"9\" x2=\"15\" y2=\"9\"/>
                    <line x1=\"9\" y1=\"15\" x2=\"15\" y2=\"15\"/>
                </svg>
            </span>
            <div class=\"menu-item-text\">
                Dashboard Repas
                <span class=\"menu-item-subtitle\">Admin</span>
            </div>
        </a>

        <a href=\"";
        // line 69
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports");
        yield "\" class=\"menu-item ";
        yield (((((array_key_exists("active", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 69, $this->source); })()), "")) : ("")) == "sports")) ? ("active") : (""));
        yield "\">
            <span class=\"menu-item-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M22 12h-4l-3 9L9 3l-3 9H2\"/>
                </svg>
            </span>
            <div class=\"menu-item-text\">
                Sports
                <span class=\"menu-item-subtitle\">Olfa</span>
            </div>
        </a>

        <a href=\"";
        // line 81
        yield (((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental_admin_dashboard")) : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental")));
        yield "\" class=\"menu-item ";
        yield (((((array_key_exists("active", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 81, $this->source); })()), "")) : ("")) == "mental")) ? ("active") : (""));
        yield "\">
            <span class=\"menu-item-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                    <path d=\"M8 14s1.5 2 4 2 4-2 4-2\"/>
                    <line x1=\"9\" y1=\"9\" x2=\"9.01\" y2=\"9\"/>
                    <line x1=\"15\" y1=\"9\" x2=\"15.01\" y2=\"9\"/>
                </svg>
            </span>
            <div class=\"menu-item-text\">
                Mental
                <span class=\"menu-item-subtitle\">";
        // line 92
        yield (((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Admin") : ("Nazim"));
        yield "</span>
            </div>
        </a>

        <a href=\"";
        // line 96
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_medical");
        yield "\" class=\"menu-item ";
        yield (((((array_key_exists("active", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 96, $this->source); })()), "")) : ("")) == "medical")) ? ("active") : (""));
        yield "\">
            <span class=\"menu-item-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                    <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                    <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                    <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                </svg>
            </span>
            <div class=\"menu-item-text\">
                Medical
                <span class=\"menu-item-subtitle\">Dhia</span>
            </div>
        </a>

        <a href=\"";
        // line 111
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_community");
        yield "\" class=\"menu-item ";
        yield (((((array_key_exists("active", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 111, $this->source); })()), "")) : ("")) == "community")) ? ("active") : (""));
        yield "\">
            <span class=\"menu-item-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"/>
                    <circle cx=\"9\" cy=\"7\" r=\"4\"/>
                    <path d=\"M23 21v-2a4 4 0 0 0-3-3.87\"/>
                    <path d=\"M16 3.13a4 4 0 0 1 0 7.75\"/>
                </svg>
            </span>
            <div class=\"menu-item-text\">
                Community
                <span class=\"menu-item-subtitle\">Houssem</span>
            </div>
        </a>
    </nav>

    ";
        // line 128
        yield "    <div class=\"sidebar-footer\">
        <div class=\"user-profile\">
            <div class=\"user-avatar\">
                ";
        // line 131
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::default(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 131, $this->source); })()), "user", [], "any", false, false, false, 131), "nomComplet", [], "any", false, false, false, 131), 0, 2)), "MA"), "html", null, true);
        yield "
            </div>
            <div class=\"user-info\">
                <div class=\"user-name\">";
        // line 134
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 134), "nomComplet", [], "any", true, true, false, 134)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 134, $this->source); })()), "user", [], "any", false, false, false, 134), "nomComplet", [], "any", false, false, false, 134), "Mehdi Ahmed")) : ("Mehdi Ahmed")), "html", null, true);
        yield "</div>
                <div class=\"user-role\">Premium Member</div>
            </div>
        </div>
        <a href=\"";
        // line 138
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" class=\"logout-link\">
            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                <path d=\"M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4\"/>
                <polyline points=\"16 17 21 12 16 7\"/>
                <line x1=\"21\" y1=\"12\" x2=\"9\" y2=\"12\"/>
            </svg>
            Logout
        </a>
    </div>
</aside>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/_sidebar.html.twig";
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
        return array (  245 => 138,  238 => 134,  232 => 131,  227 => 128,  206 => 111,  186 => 96,  179 => 92,  163 => 81,  146 => 69,  127 => 55,  108 => 41,  101 => 37,  87 => 28,  70 => 16,  67 => 15,  54 => 4,  51 => 3,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<aside class=\"sidebar\">
    {# Logo Header #}
    <div class=\"sidebar-header\">
        <a href=\"{{ path('app_dashboard') }}\" class=\"navbar-brand\">
            <div class=\"navbar-logo\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M22 12h-4l-3 9L9 3l-3 9H2\"/>
                </svg>
            </div>
            <span class=\"brand-text\">BioSync</span>
        </a>
    </div>

    {# Navigation Menu #}
    <nav class=\"sidebar-menu\">
        <a href=\"{{ path('app_dashboard') }}\" class=\"menu-item {{ active|default('') == 'dashboard' ? 'active' : '' }}\">
            <span class=\"menu-item-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <rect x=\"3\" y=\"3\" width=\"7\" height=\"7\"/>
                    <rect x=\"14\" y=\"3\" width=\"7\" height=\"7\"/>
                    <rect x=\"14\" y=\"14\" width=\"7\" height=\"7\"/>
                    <rect x=\"3\" y=\"14\" width=\"7\" height=\"7\"/>
                </svg>
            </span>
            <span class=\"menu-item-text\">Dashboard</span>
        </a>

        <a href=\"{{ path('app_profile') }}\" class=\"menu-item {{ active|default('') == 'profile' ? 'active' : '' }}\">
            <span class=\"menu-item-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2\"/>
                    <circle cx=\"12\" cy=\"7\" r=\"4\"/>
                </svg>
            </span>
            <div class=\"menu-item-text\">
                Profile
                <span class=\"menu-item-subtitle\">{{ app.user.nomComplet|split(' ')[0]|default('Mehdi') }}</span>
            </div>
        </a>

        <a href=\"{{ path('app_repas_index') }}\" class=\"menu-item {{ active|default('') == 'nutrition' ? 'active' : '' }}\">
            <span class=\"menu-item-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2\"/>
                    <path d=\"M7 2v20\"/>
                    <path d=\"M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7\"/>
                </svg>
            </span>
            <div class=\"menu-item-text\">
                Nutrition
                <span class=\"menu-item-subtitle\">Selma</span>
            </div>
        </a>

        <a href=\"{{ path('app_dashboard') }}\" class=\"menu-item {{ active|default('') == 'dashboard_repas' ? 'active' : '' }}\">
            <span class=\"menu-item-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <rect x=\"3\" y=\"3\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                    <line x1=\"9\" y1=\"9\" x2=\"15\" y2=\"9\"/>
                    <line x1=\"9\" y1=\"15\" x2=\"15\" y2=\"15\"/>
                </svg>
            </span>
            <div class=\"menu-item-text\">
                Dashboard Repas
                <span class=\"menu-item-subtitle\">Admin</span>
            </div>
        </a>

        <a href=\"{{ path('app_sports') }}\" class=\"menu-item {{ active|default('') == 'sports' ? 'active' : '' }}\">
            <span class=\"menu-item-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M22 12h-4l-3 9L9 3l-3 9H2\"/>
                </svg>
            </span>
            <div class=\"menu-item-text\">
                Sports
                <span class=\"menu-item-subtitle\">Olfa</span>
            </div>
        </a>

        <a href=\"{{ is_granted('ROLE_ADMIN') ? path('app_mental_admin_dashboard') : path('app_mental') }}\" class=\"menu-item {{ active|default('') == 'mental' ? 'active' : '' }}\">
            <span class=\"menu-item-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                    <path d=\"M8 14s1.5 2 4 2 4-2 4-2\"/>
                    <line x1=\"9\" y1=\"9\" x2=\"9.01\" y2=\"9\"/>
                    <line x1=\"15\" y1=\"9\" x2=\"15.01\" y2=\"9\"/>
                </svg>
            </span>
            <div class=\"menu-item-text\">
                Mental
                <span class=\"menu-item-subtitle\">{{ is_granted('ROLE_ADMIN') ? 'Admin' : 'Nazim' }}</span>
            </div>
        </a>

        <a href=\"{{ path('app_medical') }}\" class=\"menu-item {{ active|default('') == 'medical' ? 'active' : '' }}\">
            <span class=\"menu-item-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                    <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                    <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                    <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                </svg>
            </span>
            <div class=\"menu-item-text\">
                Medical
                <span class=\"menu-item-subtitle\">Dhia</span>
            </div>
        </a>

        <a href=\"{{ path('app_community') }}\" class=\"menu-item {{ active|default('') == 'community' ? 'active' : '' }}\">
            <span class=\"menu-item-icon\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"/>
                    <circle cx=\"9\" cy=\"7\" r=\"4\"/>
                    <path d=\"M23 21v-2a4 4 0 0 0-3-3.87\"/>
                    <path d=\"M16 3.13a4 4 0 0 1 0 7.75\"/>
                </svg>
            </span>
            <div class=\"menu-item-text\">
                Community
                <span class=\"menu-item-subtitle\">Houssem</span>
            </div>
        </a>
    </nav>

    {# User Profile Footer #}
    <div class=\"sidebar-footer\">
        <div class=\"user-profile\">
            <div class=\"user-avatar\">
                {{ app.user.nomComplet|slice(0, 2)|upper|default('MA') }}
            </div>
            <div class=\"user-info\">
                <div class=\"user-name\">{{ app.user.nomComplet|default('Mehdi Ahmed') }}</div>
                <div class=\"user-role\">Premium Member</div>
            </div>
        </div>
        <a href=\"{{ path('app_logout') }}\" class=\"logout-link\">
            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                <path d=\"M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4\"/>
                <polyline points=\"16 17 21 12 16 7\"/>
                <line x1=\"21\" y1=\"12\" x2=\"9\" y2=\"12\"/>
            </svg>
            Logout
        </a>
    </div>
</aside>
", "partials/_sidebar.html.twig", "C:\\biosync_new\\templates\\partials\\_sidebar.html.twig");
    }
}
