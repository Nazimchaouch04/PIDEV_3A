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

/* profile/index.html.twig */
class __TwigTemplate_7fbec176b1d1f03ecb2b562a9ed471ed extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "profile/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "profile/index.html.twig"));

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

        yield "Profile - BioSync";
        
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
        yield "        <div class=\"page-header\">
            <h1 class=\"page-title\">Mon Profil</h1>
            <p class=\"page-subtitle\">Gerez vos informations personnelles et votre profil sante.</p>
        </div>

        <div class=\"grid grid-cols-2 gap-6\">
            ";
        // line 13
        yield "            <div class=\"card\">
                <div class=\"card-header flex-between\">
                    <h4 class=\"card-title\">Informations personnelles</h4>
                    <a href=\"";
        // line 16
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_edit");
        yield "\" class=\"btn btn-sm btn-ghost\">Modifier</a>
                </div>
                <div class=\"mb-4\">
                    <div class=\"sidebar-user\" style=\"background: var(--background);\">
                        <div class=\"sidebar-user-avatar\" style=\"width: 64px; height: 64px; font-size: 1.5rem;\">
                            ";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 21, $this->source); })()), "initials", [], "any", false, false, false, 21), "html", null, true);
        yield "
                        </div>
                        <div>
                            <div class=\"sidebar-user-name\" style=\"font-size: 1.25rem;\">";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 24, $this->source); })()), "nomComplet", [], "any", false, false, false, 24), "html", null, true);
        yield "</div>
                            <div class=\"sidebar-user-role\">Membre depuis ";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 25, $this->source); })()), "dateInscription", [], "any", false, false, false, 25), "d/m/Y"), "html", null, true);
        yield "</div>
                        </div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--gray-500)\" stroke-width=\"2\">
                        <path d=\"M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z\"/>
                        <polyline points=\"22,6 12,13 2,6\"/>
                    </svg>
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Email</div>
                        <div class=\"list-item-title\">";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 36, $this->source); })()), "email", [], "any", false, false, false, 36), "html", null, true);
        yield "</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--gray-500)\" stroke-width=\"2\">
                        <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                    </svg>
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Score global</div>
                        <div class=\"list-item-title\">";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 45, $this->source); })()), "scoreGlobal", [], "any", false, false, false, 45), "html", null, true);
        yield " points</div>
                    </div>
                </div>
            </div>

            ";
        // line 51
        yield "            <div class=\"card\">
                <div class=\"card-header flex-between\">
                    <h4 class=\"card-title\">Profil Sante</h4>
                    <a href=\"";
        // line 54
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_health");
        yield "\" class=\"btn btn-sm btn-ghost\">
                        ";
        // line 55
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 55, $this->source); })()), "profilSante", [], "any", false, false, false, 55)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier") : ("Configurer"));
        yield "
                    </a>
                </div>
                ";
        // line 58
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 58, $this->source); })()), "profilSante", [], "any", false, false, false, 58)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 59
            yield "                    <div class=\"list-item\">
                        <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--primary)\" stroke-width=\"2\">
                            <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                            <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                            <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                            <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                        </svg>
                        <div class=\"list-item-content\">
                            <div class=\"list-item-subtitle\">Age</div>
                            <div class=\"list-item-title\">";
            // line 68
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 68, $this->source); })()), "profilSante", [], "any", false, false, false, 68), "age", [], "any", false, false, false, 68), "html", null, true);
            yield " ans</div>
                        </div>
                    </div>
                    <div class=\"list-item\">
                        <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--secondary)\" stroke-width=\"2\">
                            <path d=\"M22 12h-4l-3 9L9 3l-3 9H2\"/>
                        </svg>
                        <div class=\"list-item-content\">
                            <div class=\"list-item-subtitle\">Poids</div>
                            <div class=\"list-item-title\">";
            // line 77
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 77, $this->source); })()), "profilSante", [], "any", false, false, false, 77), "poids", [], "any", false, false, false, 77), "html", null, true);
            yield " kg</div>
                        </div>
                    </div>
                    <div class=\"list-item\">
                        <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--warning)\" stroke-width=\"2\">
                            <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                            <polyline points=\"12 6 12 12 16 14\"/>
                        </svg>
                        <div class=\"list-item-content\">
                            <div class=\"list-item-subtitle\">Heure de reveil</div>
                            <div class=\"list-item-title\">";
            // line 87
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 87, $this->source); })()), "profilSante", [], "any", false, false, false, 87), "heureReveil", [], "any", false, false, false, 87), "H:i"), "html", null, true);
            yield "</div>
                        </div>
                    </div>
                ";
        } else {
            // line 91
            yield "                    <div class=\"empty-state\">
                        <svg width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--gray-300)\" stroke-width=\"2\">
                            <path d=\"M22 12h-4l-3 9L9 3l-3 9H2\"/>
                        </svg>
                        <p class=\"text-gray mt-4\">Completez votre profil sante pour un suivi personnalise</p>
                        <a href=\"";
            // line 96
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_health");
            yield "\" class=\"btn btn-primary mt-4\">Configurer maintenant</a>
                    </div>
                ";
        }
        // line 99
        yield "            </div>
        </div>

        ";
        // line 103
        yield "        <div class=\"card mt-6\">
            <div class=\"card-header\">
                <h4 class=\"card-title\">Mes statistiques</h4>
            </div>
            <div class=\"grid grid-cols-4 gap-4\">
                <div class=\"stat-card\">
                    <div class=\"stat-card-value\">";
        // line 109
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 109, $this->source); })()), "repas", [], "any", false, false, false, 109)), "html", null, true);
        yield "</div>
                    <div class=\"stat-card-label\">Repas enregistres</div>
                </div>
                <div class=\"stat-card\">
                    <div class=\"stat-card-value\">";
        // line 113
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 113, $this->source); })()), "seancesSport", [], "any", false, false, false, 113)), "html", null, true);
        yield "</div>
                    <div class=\"stat-card-label\">Seances de sport</div>
                </div>
                <div class=\"stat-card\">
                    <div class=\"stat-card-value\">";
        // line 117
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 117, $this->source); })()), "quizMentaux", [], "any", false, false, false, 117)), "html", null, true);
        yield "</div>
                    <div class=\"stat-card-label\">Quiz completes</div>
                </div>
                <div class=\"stat-card\">
                    <div class=\"stat-card-value\">";
        // line 121
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 121, $this->source); })()), "rendezVous", [], "any", false, false, false, 121)), "html", null, true);
        yield "</div>
                    <div class=\"stat-card-label\">Rendez-vous</div>
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
        return "profile/index.html.twig";
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
        return array (  272 => 121,  265 => 117,  258 => 113,  251 => 109,  243 => 103,  238 => 99,  232 => 96,  225 => 91,  218 => 87,  205 => 77,  193 => 68,  182 => 59,  180 => 58,  174 => 55,  170 => 54,  165 => 51,  157 => 45,  145 => 36,  131 => 25,  127 => 24,  121 => 21,  113 => 16,  108 => 13,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Profile - BioSync{% endblock %}

{% block body %}
        <div class=\"page-header\">
            <h1 class=\"page-title\">Mon Profil</h1>
            <p class=\"page-subtitle\">Gerez vos informations personnelles et votre profil sante.</p>
        </div>

        <div class=\"grid grid-cols-2 gap-6\">
            {# Informations personnelles #}
            <div class=\"card\">
                <div class=\"card-header flex-between\">
                    <h4 class=\"card-title\">Informations personnelles</h4>
                    <a href=\"{{ path('app_profile_edit') }}\" class=\"btn btn-sm btn-ghost\">Modifier</a>
                </div>
                <div class=\"mb-4\">
                    <div class=\"sidebar-user\" style=\"background: var(--background);\">
                        <div class=\"sidebar-user-avatar\" style=\"width: 64px; height: 64px; font-size: 1.5rem;\">
                            {{ user.initials }}
                        </div>
                        <div>
                            <div class=\"sidebar-user-name\" style=\"font-size: 1.25rem;\">{{ user.nomComplet }}</div>
                            <div class=\"sidebar-user-role\">Membre depuis {{ user.dateInscription|date('d/m/Y') }}</div>
                        </div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--gray-500)\" stroke-width=\"2\">
                        <path d=\"M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z\"/>
                        <polyline points=\"22,6 12,13 2,6\"/>
                    </svg>
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Email</div>
                        <div class=\"list-item-title\">{{ user.email }}</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--gray-500)\" stroke-width=\"2\">
                        <polygon points=\"12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2\"/>
                    </svg>
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Score global</div>
                        <div class=\"list-item-title\">{{ user.scoreGlobal }} points</div>
                    </div>
                </div>
            </div>

            {# Profil Sante #}
            <div class=\"card\">
                <div class=\"card-header flex-between\">
                    <h4 class=\"card-title\">Profil Sante</h4>
                    <a href=\"{{ path('app_profile_health') }}\" class=\"btn btn-sm btn-ghost\">
                        {{ user.profilSante ? 'Modifier' : 'Configurer' }}
                    </a>
                </div>
                {% if user.profilSante %}
                    <div class=\"list-item\">
                        <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--primary)\" stroke-width=\"2\">
                            <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                            <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                            <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                            <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                        </svg>
                        <div class=\"list-item-content\">
                            <div class=\"list-item-subtitle\">Age</div>
                            <div class=\"list-item-title\">{{ user.profilSante.age }} ans</div>
                        </div>
                    </div>
                    <div class=\"list-item\">
                        <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--secondary)\" stroke-width=\"2\">
                            <path d=\"M22 12h-4l-3 9L9 3l-3 9H2\"/>
                        </svg>
                        <div class=\"list-item-content\">
                            <div class=\"list-item-subtitle\">Poids</div>
                            <div class=\"list-item-title\">{{ user.profilSante.poids }} kg</div>
                        </div>
                    </div>
                    <div class=\"list-item\">
                        <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--warning)\" stroke-width=\"2\">
                            <circle cx=\"12\" cy=\"12\" r=\"10\"/>
                            <polyline points=\"12 6 12 12 16 14\"/>
                        </svg>
                        <div class=\"list-item-content\">
                            <div class=\"list-item-subtitle\">Heure de reveil</div>
                            <div class=\"list-item-title\">{{ user.profilSante.heureReveil|date('H:i') }}</div>
                        </div>
                    </div>
                {% else %}
                    <div class=\"empty-state\">
                        <svg width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"var(--gray-300)\" stroke-width=\"2\">
                            <path d=\"M22 12h-4l-3 9L9 3l-3 9H2\"/>
                        </svg>
                        <p class=\"text-gray mt-4\">Completez votre profil sante pour un suivi personnalise</p>
                        <a href=\"{{ path('app_profile_health') }}\" class=\"btn btn-primary mt-4\">Configurer maintenant</a>
                    </div>
                {% endif %}
            </div>
        </div>

        {# Statistiques #}
        <div class=\"card mt-6\">
            <div class=\"card-header\">
                <h4 class=\"card-title\">Mes statistiques</h4>
            </div>
            <div class=\"grid grid-cols-4 gap-4\">
                <div class=\"stat-card\">
                    <div class=\"stat-card-value\">{{ user.repas|length }}</div>
                    <div class=\"stat-card-label\">Repas enregistres</div>
                </div>
                <div class=\"stat-card\">
                    <div class=\"stat-card-value\">{{ user.seancesSport|length }}</div>
                    <div class=\"stat-card-label\">Seances de sport</div>
                </div>
                <div class=\"stat-card\">
                    <div class=\"stat-card-value\">{{ user.quizMentaux|length }}</div>
                    <div class=\"stat-card-label\">Quiz completes</div>
                </div>
                <div class=\"stat-card\">
                    <div class=\"stat-card-value\">{{ user.rendezVous|length }}</div>
                    <div class=\"stat-card-label\">Rendez-vous</div>
                </div>
            </div>
        </div>
{% endblock %}
", "profile/index.html.twig", "C:\\biosync_new\\templates\\profile\\index.html.twig");
    }
}
