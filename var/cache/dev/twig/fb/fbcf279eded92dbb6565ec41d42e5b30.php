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

/* community/groupe.html.twig */
class __TwigTemplate_18458fb2e38be688a7843dd5f5212e6d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "community/groupe.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "community/groupe.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 3, $this->source); })()), "nomGroupe", [], "any", false, false, false, 3), "html", null, true);
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
        yield from $this->load("partials/_sidebar.html.twig", 7)->unwrap()->yield(CoreExtension::merge($context, ["active" => "community"]));
        // line 8
        yield "
    <main class=\"main-content\">
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 12, $this->source); })()), "nomGroupe", [], "any", false, false, false, 12), "html", null, true);
        yield "</h1>
                <p class=\"page-subtitle\">";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 13, $this->source); })()), "thematique", [], "any", false, false, false, 13), "html", null, true);
        yield "</p>
            </div>
            <div style=\"display: flex; gap: 0.5rem;\">
                ";
        // line 16
        if ((($tmp = (isset($context["isMember"]) || array_key_exists("isMember", $context) ? $context["isMember"] : (function () { throw new RuntimeError('Variable "isMember" does not exist.', 16, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 17
            yield "                    <form action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_community_leave", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 17, $this->source); })()), "id", [], "any", false, false, false, 17)]), "html", null, true);
            yield "\" method=\"post\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("leave" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 18, $this->source); })()), "id", [], "any", false, false, false, 18))), "html", null, true);
            yield "\">
                        <button type=\"submit\" class=\"btn btn-danger\">Quitter le groupe</button>
                    </form>
                ";
        } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,         // line 21
(isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 21, $this->source); })()), "hasPlaceDisponible", [], "any", false, false, false, 21)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 22
            yield "                    <form action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_community_join", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 22, $this->source); })()), "id", [], "any", false, false, false, 22)]), "html", null, true);
            yield "\" method=\"post\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
            // line 23
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("join" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 23, $this->source); })()), "id", [], "any", false, false, false, 23))), "html", null, true);
            yield "\">
                        <button type=\"submit\" class=\"btn btn-primary\">Rejoindre le groupe</button>
                    </form>
                ";
        }
        // line 27
        yield "                <a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_community");
        yield "\" class=\"btn btn-ghost\">Retour</a>
            </div>
        </div>

        <div class=\"grid grid-cols-2 gap-6\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Informations</h4>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Thematique</div>
                        <div class=\"list-item-title\">
                            <span class=\"badge badge-primary\">";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 40, $this->source); })()), "thematique", [], "any", false, false, false, 40), "html", null, true);
        yield "</span>
                        </div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Membres</div>
                        <div class=\"list-item-title\">";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 47, $this->source); })()), "nombreMembres", [], "any", false, false, false, 47), "html", null, true);
        yield " / ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 47, $this->source); })()), "capaciteMax", [], "any", false, false, false, 47), "html", null, true);
        yield "</div>
                    </div>
                </div>
                ";
        // line 50
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 50, $this->source); })()), "description", [], "any", false, false, false, 50)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 51
            yield "                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Description</div>
                        <div class=\"list-item-title\">";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 54, $this->source); })()), "description", [], "any", false, false, false, 54), "html", null, true);
            yield "</div>
                    </div>
                </div>
                ";
        }
        // line 58
        yield "                ";
        if ((($tmp = (isset($context["isMember"]) || array_key_exists("isMember", $context) ? $context["isMember"] : (function () { throw new RuntimeError('Variable "isMember" does not exist.', 58, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 59
            yield "                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Votre role</div>
                        <div class=\"list-item-title\">
                            <span class=\"badge badge-secondary\">";
            // line 63
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["membership"]) || array_key_exists("membership", $context) ? $context["membership"] : (function () { throw new RuntimeError('Variable "membership" does not exist.', 63, $this->source); })()), "roleMembre", [], "any", false, false, false, 63), "html", null, true);
            yield "</span>
                        </div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Membre depuis</div>
                        <div class=\"list-item-title\">";
            // line 70
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["membership"]) || array_key_exists("membership", $context) ? $context["membership"] : (function () { throw new RuntimeError('Variable "membership" does not exist.', 70, $this->source); })()), "dateAdhesion", [], "any", false, false, false, 70), "d/m/Y"), "html", null, true);
            yield "</div>
                    </div>
                </div>
                ";
        }
        // line 74
        yield "            </div>

            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Evenements (";
        // line 78
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 78, $this->source); })()), "evenements", [], "any", false, false, false, 78)), "html", null, true);
        yield ")</h4>
                </div>
                ";
        // line 80
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 80, $this->source); })()), "evenements", [], "any", false, false, false, 80)) > 0)) {
            // line 81
            yield "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 81, $this->source); })()), "evenements", [], "any", false, false, false, 81));
            foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
                // line 82
                yield "                        <div class=\"list-item\">
                            <div class=\"list-item-icon\" style=\"background: ";
                // line 83
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "isUpcoming", [], "any", false, false, false, 83)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("rgba(54, 124, 254, 0.1)") : ("rgba(156, 163, 175, 0.1)"));
                yield "; color: ";
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "isUpcoming", [], "any", false, false, false, 83)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("var(--secondary)") : ("var(--gray-400)"));
                yield ";\">
                                <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                    <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                                    <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                                    <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                                </svg>
                            </div>
                            <div class=\"list-item-content\">
                                <div class=\"list-item-title\">";
                // line 91
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "titreEvent", [], "any", false, false, false, 91), "html", null, true);
                yield "</div>
                                <div class=\"list-item-subtitle\">";
                // line 92
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "dateEvent", [], "any", false, false, false, 92), "d/m/Y H:i"), "html", null, true);
                yield "</div>
                            </div>
                            ";
                // line 94
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "isUpcoming", [], "any", false, false, false, 94)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 95
                    yield "                                <span class=\"badge badge-success\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "pointsParticipation", [], "any", false, false, false, 95), "html", null, true);
                    yield " pts</span>
                            ";
                } else {
                    // line 97
                    yield "                                <span class=\"badge badge-secondary\">Passe</span>
                            ";
                }
                // line 99
                yield "                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['event'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 101
            yield "                ";
        } else {
            // line 102
            yield "                    <div class=\"empty-state\">
                        <p class=\"text-gray\">Aucun evenement pour ce groupe</p>
                    </div>
                ";
        }
        // line 106
        yield "            </div>
        </div>

        ";
        // line 110
        yield "        <div class=\"card mt-6\">
            <div class=\"card-header\">
                <h4 class=\"card-title\">Membres (";
        // line 112
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 112, $this->source); })()), "membres", [], "any", false, false, false, 112)), "html", null, true);
        yield ")</h4>
            </div>
            ";
        // line 114
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 114, $this->source); })()), "membres", [], "any", false, false, false, 114)) > 0)) {
            // line 115
            yield "                <div class=\"grid grid-cols-4 gap-4\">
                    ";
            // line 116
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["groupe"]) || array_key_exists("groupe", $context) ? $context["groupe"] : (function () { throw new RuntimeError('Variable "groupe" does not exist.', 116, $this->source); })()), "membres", [], "any", false, false, false, 116));
            foreach ($context['_seq'] as $context["_key"] => $context["membre"]) {
                // line 117
                yield "                        <div class=\"list-item\">
                            <div class=\"sidebar-user-avatar\" style=\"width: 40px; height: 40px; font-size: 0.875rem;\">
                                ";
                // line 119
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["membre"], "utilisateur", [], "any", false, false, false, 119), "initials", [], "any", false, false, false, 119), "html", null, true);
                yield "
                            </div>
                            <div class=\"list-item-content\">
                                <div class=\"list-item-title\">";
                // line 122
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["membre"], "utilisateur", [], "any", false, false, false, 122), "nomComplet", [], "any", false, false, false, 122), "html", null, true);
                yield "</div>
                                <div class=\"list-item-subtitle\">";
                // line 123
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["membre"], "roleMembre", [], "any", false, false, false, 123), "html", null, true);
                yield "</div>
                            </div>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['membre'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 127
            yield "                </div>
            ";
        } else {
            // line 129
            yield "                <div class=\"empty-state\">
                    <p class=\"text-gray\">Aucun membre dans ce groupe</p>
                </div>
            ";
        }
        // line 133
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
        return "community/groupe.html.twig";
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
        return array (  352 => 133,  346 => 129,  342 => 127,  332 => 123,  328 => 122,  322 => 119,  318 => 117,  314 => 116,  311 => 115,  309 => 114,  304 => 112,  300 => 110,  295 => 106,  289 => 102,  286 => 101,  279 => 99,  275 => 97,  269 => 95,  267 => 94,  262 => 92,  258 => 91,  245 => 83,  242 => 82,  237 => 81,  235 => 80,  230 => 78,  224 => 74,  217 => 70,  207 => 63,  201 => 59,  198 => 58,  191 => 54,  186 => 51,  184 => 50,  176 => 47,  166 => 40,  149 => 27,  142 => 23,  137 => 22,  135 => 21,  129 => 18,  124 => 17,  122 => 16,  116 => 13,  112 => 12,  106 => 8,  104 => 7,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ groupe.nomGroupe }} - BioSync{% endblock %}

{% block body %}
<div class=\"app-layout\">
    {% include 'partials/_sidebar.html.twig' with {'active': 'community'} %}

    <main class=\"main-content\">
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">{{ groupe.nomGroupe }}</h1>
                <p class=\"page-subtitle\">{{ groupe.thematique }}</p>
            </div>
            <div style=\"display: flex; gap: 0.5rem;\">
                {% if isMember %}
                    <form action=\"{{ path('app_community_leave', {id: groupe.id}) }}\" method=\"post\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('leave' ~ groupe.id) }}\">
                        <button type=\"submit\" class=\"btn btn-danger\">Quitter le groupe</button>
                    </form>
                {% elseif groupe.hasPlaceDisponible %}
                    <form action=\"{{ path('app_community_join', {id: groupe.id}) }}\" method=\"post\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('join' ~ groupe.id) }}\">
                        <button type=\"submit\" class=\"btn btn-primary\">Rejoindre le groupe</button>
                    </form>
                {% endif %}
                <a href=\"{{ path('app_community') }}\" class=\"btn btn-ghost\">Retour</a>
            </div>
        </div>

        <div class=\"grid grid-cols-2 gap-6\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Informations</h4>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Thematique</div>
                        <div class=\"list-item-title\">
                            <span class=\"badge badge-primary\">{{ groupe.thematique }}</span>
                        </div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Membres</div>
                        <div class=\"list-item-title\">{{ groupe.nombreMembres }} / {{ groupe.capaciteMax }}</div>
                    </div>
                </div>
                {% if groupe.description %}
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Description</div>
                        <div class=\"list-item-title\">{{ groupe.description }}</div>
                    </div>
                </div>
                {% endif %}
                {% if isMember %}
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Votre role</div>
                        <div class=\"list-item-title\">
                            <span class=\"badge badge-secondary\">{{ membership.roleMembre }}</span>
                        </div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Membre depuis</div>
                        <div class=\"list-item-title\">{{ membership.dateAdhesion|date('d/m/Y') }}</div>
                    </div>
                </div>
                {% endif %}
            </div>

            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Evenements ({{ groupe.evenements|length }})</h4>
                </div>
                {% if groupe.evenements|length > 0 %}
                    {% for event in groupe.evenements %}
                        <div class=\"list-item\">
                            <div class=\"list-item-icon\" style=\"background: {{ event.isUpcoming ? 'rgba(54, 124, 254, 0.1)' : 'rgba(156, 163, 175, 0.1)' }}; color: {{ event.isUpcoming ? 'var(--secondary)' : 'var(--gray-400)' }};\">
                                <svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\">
                                    <rect x=\"3\" y=\"4\" width=\"18\" height=\"18\" rx=\"2\" ry=\"2\"/>
                                    <line x1=\"16\" y1=\"2\" x2=\"16\" y2=\"6\"/>
                                    <line x1=\"8\" y1=\"2\" x2=\"8\" y2=\"6\"/>
                                </svg>
                            </div>
                            <div class=\"list-item-content\">
                                <div class=\"list-item-title\">{{ event.titreEvent }}</div>
                                <div class=\"list-item-subtitle\">{{ event.dateEvent|date('d/m/Y H:i') }}</div>
                            </div>
                            {% if event.isUpcoming %}
                                <span class=\"badge badge-success\">{{ event.pointsParticipation }} pts</span>
                            {% else %}
                                <span class=\"badge badge-secondary\">Passe</span>
                            {% endif %}
                        </div>
                    {% endfor %}
                {% else %}
                    <div class=\"empty-state\">
                        <p class=\"text-gray\">Aucun evenement pour ce groupe</p>
                    </div>
                {% endif %}
            </div>
        </div>

        {# Membres du groupe #}
        <div class=\"card mt-6\">
            <div class=\"card-header\">
                <h4 class=\"card-title\">Membres ({{ groupe.membres|length }})</h4>
            </div>
            {% if groupe.membres|length > 0 %}
                <div class=\"grid grid-cols-4 gap-4\">
                    {% for membre in groupe.membres %}
                        <div class=\"list-item\">
                            <div class=\"sidebar-user-avatar\" style=\"width: 40px; height: 40px; font-size: 0.875rem;\">
                                {{ membre.utilisateur.initials }}
                            </div>
                            <div class=\"list-item-content\">
                                <div class=\"list-item-title\">{{ membre.utilisateur.nomComplet }}</div>
                                <div class=\"list-item-subtitle\">{{ membre.roleMembre }}</div>
                            </div>
                        </div>
                    {% endfor %}
                </div>
            {% else %}
                <div class=\"empty-state\">
                    <p class=\"text-gray\">Aucun membre dans ce groupe</p>
                </div>
            {% endif %}
        </div>
    </main>
</div>
{% endblock %}
", "community/groupe.html.twig", "C:\\biosync_new\\templates\\community\\groupe.html.twig");
    }
}
