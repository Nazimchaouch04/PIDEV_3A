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

/* mental/show.html.twig */
class __TwigTemplate_fecd5de9cfd640ed2eff99b14acbb337 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mental/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mental/show.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 3, $this->source); })()), "titre", [], "any", false, false, false, 3), "html", null, true);
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
        yield from $this->load("partials/_sidebar.html.twig", 7)->unwrap()->yield(CoreExtension::merge($context, ["active" => "mental"]));
        // line 8
        yield "
    <main class=\"main-content\">
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 12, $this->source); })()), "titre", [], "any", false, false, false, 12), "html", null, true);
        yield "</h1>
                <p class=\"page-subtitle\">";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 13, $this->source); })()), "dateQuiz", [], "any", false, false, false, 13), "d/m/Y"), "html", null, true);
        yield "</p>
            </div>
            <a href=\"";
        // line 15
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mental");
        yield "\" class=\"btn btn-primary\">Retour</a>
        </div>

        <div class=\"grid grid-cols-2 gap-6\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Details du quiz</h4>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Niveau de stress cible</div>
                        <div class=\"list-item-title\">";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 26, $this->source); })()), "niveauStressCible", [], "any", false, false, false, 26), "html", null, true);
        yield "/10</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Score obtenu</div>
                        <div class=\"list-item-title\">";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 32, $this->source); })()), "scoreResultat", [], "any", false, false, false, 32), "html", null, true);
        yield " points</div>
                    </div>
                </div>
                ";
        // line 35
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 35, $this->source); })()), "medailleQuiz", [], "any", false, false, false, 35)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 36
            yield "                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Medaille</div>
                        <div class=\"list-item-title\">
                            <span class=\"badge badge-warning\">";
            // line 40
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 40, $this->source); })()), "medailleQuiz", [], "any", false, false, false, 40), "html", null, true);
            yield "</span>
                        </div>
                    </div>
                </div>
                ";
        }
        // line 45
        yield "            </div>

            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Questions (";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 49, $this->source); })()), "questions", [], "any", false, false, false, 49)), "html", null, true);
        yield ")</h4>
                </div>
                ";
        // line 51
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 51, $this->source); })()), "questions", [], "any", false, false, false, 51)) > 0)) {
            // line 52
            yield "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["quiz"]) || array_key_exists("quiz", $context) ? $context["quiz"] : (function () { throw new RuntimeError('Variable "quiz" does not exist.', 52, $this->source); })()), "questions", [], "any", false, false, false, 52));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
                // line 53
                yield "                        <div class=\"list-item\">
                            <div class=\"list-item-icon\" style=\"background: rgba(110, 197, 166, 0.1); color: var(--primary);\">
                                ";
                // line 55
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 55), "html", null, true);
                yield "
                            </div>
                            <div class=\"list-item-content\">
                                <div class=\"list-item-title\">";
                // line 58
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["question"], "enonce", [], "any", false, false, false, 58), 0, 50), "html", null, true);
                yield "...</div>
                                <div class=\"list-item-subtitle\">";
                // line 59
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "pointsValeur", [], "any", false, false, false, 59), "html", null, true);
                yield " points</div>
                            </div>
                        </div>
                    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['question'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            yield "                ";
        } else {
            // line 64
            yield "                    <div class=\"empty-state\">
                        <p class=\"text-gray\">Aucune question dans ce quiz</p>
                    </div>
                ";
        }
        // line 68
        yield "            </div>
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
        return "mental/show.html.twig";
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
        return array (  238 => 68,  232 => 64,  229 => 63,  211 => 59,  207 => 58,  201 => 55,  197 => 53,  179 => 52,  177 => 51,  172 => 49,  166 => 45,  158 => 40,  152 => 36,  150 => 35,  144 => 32,  135 => 26,  121 => 15,  116 => 13,  112 => 12,  106 => 8,  104 => 7,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ quiz.titre }} - BioSync{% endblock %}

{% block body %}
<div class=\"app-layout\">
    {% include 'partials/_sidebar.html.twig' with {'active': 'mental'} %}

    <main class=\"main-content\">
        <div class=\"page-header flex-between\">
            <div>
                <h1 class=\"page-title\">{{ quiz.titre }}</h1>
                <p class=\"page-subtitle\">{{ quiz.dateQuiz|date('d/m/Y') }}</p>
            </div>
            <a href=\"{{ path('app_mental') }}\" class=\"btn btn-primary\">Retour</a>
        </div>

        <div class=\"grid grid-cols-2 gap-6\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Details du quiz</h4>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Niveau de stress cible</div>
                        <div class=\"list-item-title\">{{ quiz.niveauStressCible }}/10</div>
                    </div>
                </div>
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Score obtenu</div>
                        <div class=\"list-item-title\">{{ quiz.scoreResultat }} points</div>
                    </div>
                </div>
                {% if quiz.medailleQuiz %}
                <div class=\"list-item\">
                    <div class=\"list-item-content\">
                        <div class=\"list-item-subtitle\">Medaille</div>
                        <div class=\"list-item-title\">
                            <span class=\"badge badge-warning\">{{ quiz.medailleQuiz }}</span>
                        </div>
                    </div>
                </div>
                {% endif %}
            </div>

            <div class=\"card\">
                <div class=\"card-header\">
                    <h4 class=\"card-title\">Questions ({{ quiz.questions|length }})</h4>
                </div>
                {% if quiz.questions|length > 0 %}
                    {% for question in quiz.questions %}
                        <div class=\"list-item\">
                            <div class=\"list-item-icon\" style=\"background: rgba(110, 197, 166, 0.1); color: var(--primary);\">
                                {{ loop.index }}
                            </div>
                            <div class=\"list-item-content\">
                                <div class=\"list-item-title\">{{ question.enonce|slice(0, 50) }}...</div>
                                <div class=\"list-item-subtitle\">{{ question.pointsValeur }} points</div>
                            </div>
                        </div>
                    {% endfor %}
                {% else %}
                    <div class=\"empty-state\">
                        <p class=\"text-gray\">Aucune question dans ce quiz</p>
                    </div>
                {% endif %}
            </div>
        </div>
    </main>
</div>
{% endblock %}
", "mental/show.html.twig", "C:\\biosync_new\\templates\\mental\\show.html.twig");
    }
}
