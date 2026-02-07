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

/* community/index.html.twig */
class __TwigTemplate_0418389daa09f3ebab5cf9a26cb7179e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "community/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "community/index.html.twig"));

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

        yield "Community & Support - BioSync";
        
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
        yield "        ";
        // line 7
        yield "        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">Community & Support</h1>
                <p class=\"page-subtitle\">Connect with others on their wellness journey</p>
            </div>
            <button class=\"btn btn-success\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/>
                    <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
                </svg>
                Create Event
            </button>
        </div>

        ";
        // line 22
        yield "        <div class=\"tabs\">
            <button class=\"tab-btn active\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"/>
                    <circle cx=\"9\" cy=\"7\" r=\"4\"/>
                    <path d=\"M23 21v-2a4 4 0 0 0-3-3.87\"/>
                    <path d=\"M16 3.13a4 4 0 0 1 0 7.75\"/>
                </svg>
                Support Groups
            </button>
            <button class=\"tab-btn\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                    <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                    <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                    <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                </svg>
                Events
            </button>
        </div>

        ";
        // line 44
        yield "        <div class=\"grid-3\">
            ";
        // line 46
        yield "            <div class=\"group-card\">
                <img src=\"https://images.unsplash.com/photo-1506126613408-eca07ce68773?w=800&h=400&fit=crop\" alt=\"Mindful Living\" class=\"group-image\">
                <button class=\"message-icon-btn\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z\"/>
                    </svg>
                </button>
                <div class=\"group-content\">
                    <div class=\"group-header\">
                        <h3 class=\"group-title\">Mindful Living Circle</h3>
                        <span class=\"badge badge-mental-health\">Mental Health</span>
                    </div>
                    <p class=\"group-description\">A supportive community for those practicing mindfulness and meditation techniques.</p>
                    <div class=\"group-meta\">
                        <span class=\"group-meta-item\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"/>
                                <circle cx=\"9\" cy=\"7\" r=\"4\"/>
                                <path d=\"M23 21v-2a4 4 0 0 0-3-3.87\"/>
                            </svg>
                            234 members
                        </span>
                        <span class=\"group-meta-item\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                                <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                                <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                                <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                            </svg>
                            Feb 2, 2026
                        </span>
                    </div>
                    <button class=\"btn btn-primary group-btn\">Join Group</button>
                </div>
            </div>

            ";
        // line 83
        yield "            <div class=\"group-card\">
                <img src=\"https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=800&h=400&fit=crop\" alt=\"Nutrition Warriors\" class=\"group-image\">
                <button class=\"message-icon-btn\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z\"/>
                    </svg>
                </button>
                <div class=\"group-content\">
                    <div class=\"group-header\">
                        <h3 class=\"group-title\">Nutrition Warriors</h3>
                        <span class=\"badge badge-nutrition\">Nutrition</span>
                    </div>
                    <p class=\"group-description\">Share recipes, meal plans, and nutritional tips with fellow health enthusiasts.</p>
                    <div class=\"group-meta\">
                        <span class=\"group-meta-item\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"/>
                                <circle cx=\"9\" cy=\"7\" r=\"4\"/>
                                <path d=\"M23 21v-2a4 4 0 0 0-3-3.87\"/>
                            </svg>
                            512 members
                        </span>
                        <span class=\"group-meta-item\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                                <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                                <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                                <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                            </svg>
                            Feb 5, 2026
                        </span>
                    </div>
                    <button class=\"btn btn-primary group-btn\">Join Group</button>
                </div>
            </div>

            ";
        // line 120
        yield "            <div class=\"group-card\">
                <img src=\"https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800&h=400&fit=crop\" alt=\"Active Lifestyle\" class=\"group-image\">
                <button class=\"message-icon-btn\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z\"/>
                    </svg>
                </button>
                <div class=\"group-content\">
                    <div class=\"group-header\">
                        <h3 class=\"group-title\">Active Lifestyle Club</h3>
                        <span class=\"badge badge-fitness\">Fitness</span>
                    </div>
                    <p class=\"group-description\">Join group workouts, challenges, and fitness events in your area.</p>
                    <div class=\"group-meta\">
                        <span class=\"group-meta-item\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"/>
                                <circle cx=\"9\" cy=\"7\" r=\"4\"/>
                                <path d=\"M23 21v-2a4 4 0 0 0-3-3.87\"/>
                            </svg>
                            387 members
                        </span>
                        <span class=\"group-meta-item\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                                <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                                <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                                <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                            </svg>
                            Feb 3, 2026
                        </span>
                    </div>
                    <button class=\"btn btn-primary group-btn\">Join Group</button>
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
        return "community/index.html.twig";
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
        return array (  220 => 120,  182 => 83,  144 => 46,  141 => 44,  118 => 22,  102 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base_back.html.twig' %}

{% block title %}Community & Support - BioSync{% endblock %}

{% block body %}
        {# Page Header #}
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">Community & Support</h1>
                <p class=\"page-subtitle\">Connect with others on their wellness journey</p>
            </div>
            <button class=\"btn btn-success\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/>
                    <line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/>
                </svg>
                Create Event
            </button>
        </div>

        {# Tabs #}
        <div class=\"tabs\">
            <button class=\"tab-btn active\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <path d=\"M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"/>
                    <circle cx=\"9\" cy=\"7\" r=\"4\"/>
                    <path d=\"M23 21v-2a4 4 0 0 0-3-3.87\"/>
                    <path d=\"M16 3.13a4 4 0 0 1 0 7.75\"/>
                </svg>
                Support Groups
            </button>
            <button class=\"tab-btn\">
                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                    <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                    <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                    <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                    <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                </svg>
                Events
            </button>
        </div>

        {# Support Groups Grid #}
        <div class=\"grid-3\">
            {# Group Card 1 - Mindful Living Circle #}
            <div class=\"group-card\">
                <img src=\"https://images.unsplash.com/photo-1506126613408-eca07ce68773?w=800&h=400&fit=crop\" alt=\"Mindful Living\" class=\"group-image\">
                <button class=\"message-icon-btn\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z\"/>
                    </svg>
                </button>
                <div class=\"group-content\">
                    <div class=\"group-header\">
                        <h3 class=\"group-title\">Mindful Living Circle</h3>
                        <span class=\"badge badge-mental-health\">Mental Health</span>
                    </div>
                    <p class=\"group-description\">A supportive community for those practicing mindfulness and meditation techniques.</p>
                    <div class=\"group-meta\">
                        <span class=\"group-meta-item\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"/>
                                <circle cx=\"9\" cy=\"7\" r=\"4\"/>
                                <path d=\"M23 21v-2a4 4 0 0 0-3-3.87\"/>
                            </svg>
                            234 members
                        </span>
                        <span class=\"group-meta-item\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                                <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                                <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                                <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                            </svg>
                            Feb 2, 2026
                        </span>
                    </div>
                    <button class=\"btn btn-primary group-btn\">Join Group</button>
                </div>
            </div>

            {# Group Card 2 - Nutrition Warriors #}
            <div class=\"group-card\">
                <img src=\"https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=800&h=400&fit=crop\" alt=\"Nutrition Warriors\" class=\"group-image\">
                <button class=\"message-icon-btn\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z\"/>
                    </svg>
                </button>
                <div class=\"group-content\">
                    <div class=\"group-header\">
                        <h3 class=\"group-title\">Nutrition Warriors</h3>
                        <span class=\"badge badge-nutrition\">Nutrition</span>
                    </div>
                    <p class=\"group-description\">Share recipes, meal plans, and nutritional tips with fellow health enthusiasts.</p>
                    <div class=\"group-meta\">
                        <span class=\"group-meta-item\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"/>
                                <circle cx=\"9\" cy=\"7\" r=\"4\"/>
                                <path d=\"M23 21v-2a4 4 0 0 0-3-3.87\"/>
                            </svg>
                            512 members
                        </span>
                        <span class=\"group-meta-item\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                                <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                                <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                                <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                            </svg>
                            Feb 5, 2026
                        </span>
                    </div>
                    <button class=\"btn btn-primary group-btn\">Join Group</button>
                </div>
            </div>

            {# Group Card 3 - Active Lifestyle Club #}
            <div class=\"group-card\">
                <img src=\"https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800&h=400&fit=crop\" alt=\"Active Lifestyle\" class=\"group-image\">
                <button class=\"message-icon-btn\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                        <path d=\"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z\"/>
                    </svg>
                </button>
                <div class=\"group-content\">
                    <div class=\"group-header\">
                        <h3 class=\"group-title\">Active Lifestyle Club</h3>
                        <span class=\"badge badge-fitness\">Fitness</span>
                    </div>
                    <p class=\"group-description\">Join group workouts, challenges, and fitness events in your area.</p>
                    <div class=\"group-meta\">
                        <span class=\"group-meta-item\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <path d=\"M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"/>
                                <circle cx=\"9\" cy=\"7\" r=\"4\"/>
                                <path d=\"M23 21v-2a4 4 0 0 0-3-3.87\"/>
                            </svg>
                            387 members
                        </span>
                        <span class=\"group-meta-item\">
                            <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\">
                                <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                                <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                                <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                                <line x1=\"3\" y1=\"10\" x2=\"21\" y2=\"10\"/>
                            </svg>
                            Feb 3, 2026
                        </span>
                    </div>
                    <button class=\"btn btn-primary group-btn\">Join Group</button>
                </div>
            </div>
        </div>
{% endblock %}
", "community/index.html.twig", "C:\\biosync_new\\templates\\community\\index.html.twig");
    }
}
