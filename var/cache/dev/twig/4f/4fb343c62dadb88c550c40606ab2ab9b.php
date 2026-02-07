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

/* aliment/_form.html.twig */
class __TwigTemplate_189782c7a1e5d63350b9d690b771c784 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "aliment/_form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "aliment/_form.html.twig"));

        // line 1
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 1, $this->source); })()), 'form_start', ["attr" => ["class" => "form-styled"]]);
        yield "
    <div style=\"display: flex; gap: 32px; align-items: flex-start;\">
        
        ";
        // line 5
        yield "        <div style=\"flex: 1; display: flex; flex-direction: column; gap: 32px; min-width: 0;\">
            
            ";
        // line 8
        yield "            <div style=\"background: linear-gradient(135deg, #f8fafc, #e2e8f0); padding: 32px; border-radius: 20px; border: 1px solid #cbd5e1; position: relative; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);\">
                <div style=\"position: absolute; top: 0; right: 0; width: 80px; height: 80px; background: linear-gradient(45deg, #3b82f6, #60a5fa); opacity: 0.08; border-radius: 0 0 0 100%;\"></div>
                <div style=\"display: flex; align-items: center; gap: 16px; margin-bottom: 28px; position: relative; z-index: 1;\">
                    <div style=\"width: 48px; height: 48px; background: linear-gradient(135deg, #3b82f6, #60a5fa); border-radius: 16px; display: flex; align-items: center; justify-content: center; box-shadow: 0 6px 12px rgba(59, 130, 246, 0.25);\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"white\" style=\"width: 24px; height: 24px;\">
                            <path d=\"M12 2L2 7l10 5 10-5-10-5z\"/>
                            <path d=\"M2 17l10 5 10-5\"/>
                            <path d=\"M2 12l10 5 10-5\"/>
                        </svg>
                    </div>
                    <div>
                        <h4 style=\"margin: 0; color: #1e40af; font-size: 1.5rem; font-weight: 700;\">Informations de base</h4>
                        <p style=\"color: #64748b; font-size: 0.875rem; margin: 4px 0 0 0;\">Nom, type et valeur calorique</p>
                    </div>
                </div>
                <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 24px; position: relative; z-index: 1;\">
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Nom de l'aliment</label>
                        <div style=\"position: relative;\">
                            ";
        // line 27
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 27, $this->source); })()), "nomAliment", [], "any", false, false, false, 27), 'widget', ["attr" => ["style" => "width: 100%; padding: 16px 20px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);"]]);
        yield "
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); width: 24px; height: 24px; background: #f3f4f6; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#9ca3af\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z\"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Type d'aliment</label>
                        <div style=\"position: relative;\">
                            ";
        // line 38
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 38, $this->source); })()), "typeAliment", [], "any", false, false, false, 38), 'widget', ["attr" => ["style" => "width: 100%; padding: 16px 20px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);"]]);
        yield "
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); width: 24px; height: 24px; background: #e0e7ff; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#6366f1\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M12 2L2 7l10 5 10-5-10-5z\"/>
                                    <path d=\"M2 17l10 5 10-5\"/>
                                    <path d=\"M2 12l10 5 10-5\"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Calories</label>
                        <div style=\"position: relative;\">
                            ";
        // line 51
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), "calories", [], "any", false, false, false, 51), 'widget', ["attr" => ["style" => "width: 100%; padding: 16px 20px 16px 52px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);"]]);
        yield "
                            <div style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 28px; height: 28px; background: #fef3c7; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#f59e0b\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M13 2L3 14h9l-1 8 10-12h-9l1-8z\"/>
                                </svg>
                            </div>
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); font-size: 0.875rem; color: #9ca3af; font-weight: 500;\">kcal</div>
                        </div>
                    </div>
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Index glycémique</label>
                        <div style=\"position: relative;\">
                            ";
        // line 63
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 63, $this->source); })()), "indexGlycemique", [], "any", false, false, false, 63), 'widget', ["attr" => ["style" => "width: 100%; padding: 16px 20px 16px 52px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);"]]);
        yield "
                            <div style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 28px; height: 28px; background: #e0e7ff; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#6366f1\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M22 12h-4l-3 9L9 3l-3 9H2\"/>
                                </svg>
                            </div>
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); font-size: 0.875rem; color: #9ca3af; font-weight: 500;\">IG</div>
                        </div>
                    </div>
                </div>
            </div>

            ";
        // line 76
        yield "            <div style=\"background: linear-gradient(135deg, #f0fdf4, #dcfce7); padding: 32px; border-radius: 20px; border: 1px solid #bbf7d0; position: relative; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);\">
                <div style=\"position: absolute; top: 0; right: 0; width: 80px; height: 80px; background: linear-gradient(45deg, #22c55e, #34d399); opacity: 0.08; border-radius: 0 0 0 100%;\"></div>
                <div style=\"display: flex; align-items: center; gap: 16px; margin-bottom: 28px; position: relative; z-index: 1;\">
                    <div style=\"width: 48px; height: 48px; background: linear-gradient(135deg, #22c55e, #34d399); border-radius: 16px; display: flex; align-items: center; justify-content: center; box-shadow: 0 6px 12px rgba(34, 197, 94, 0.25);\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"white\" style=\"width: 24px; height: 24px;\">
                            <path d=\"M22 12h-4l-3 9L9 3l-3 9H2\"/>
                        </svg>
                    </div>
                    <div>
                        <h4 style=\"margin: 0; color: #15803d; font-size: 1.5rem; font-weight: 700;\">Macronutriments</h4>
                        <p style=\"color: #64748b; font-size: 0.875rem; margin: 4px 0 0 0;\">Protéines, glucides et lipides</p>
                    </div>
                </div>
                <div style=\"display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 24px; position: relative; z-index: 1;\">
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Protéines</label>
                        <div style=\"position: relative;\">
                            ";
        // line 93
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 93, $this->source); })()), "proteines", [], "any", false, false, false, 93), 'widget', ["attr" => ["style" => "width: 100%; padding: 16px 20px 16px 52px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);"]]);
        yield "
                            <div style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 28px; height: 28px; background: #dbeafe; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#3b82f6\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z\"/>
                                </svg>
                            </div>
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); font-size: 0.875rem; color: #9ca3af; font-weight: 500;\">g</div>
                        </div>
                    </div>
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Glucides</label>
                        <div style=\"position: relative;\">
                            ";
        // line 105
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 105, $this->source); })()), "glucides", [], "any", false, false, false, 105), 'widget', ["attr" => ["style" => "width: 100%; padding: 16px 20px 16px 52px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);"]]);
        yield "
                            <div style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 28px; height: 28px; background: #dcfce7; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#22c55e\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M12 2L2 7l10 5 10-5-10-5z\"/>
                                    <path d=\"M2 17l10 5 10-5\"/>
                                    <path d=\"M2 12l10 5 10-5\"/>
                                </svg>
                            </div>
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); font-size: 0.875rem; color: #9ca3af; font-weight: 500;\">g</div>
                        </div>
                    </div>
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Lipides</label>
                        <div style=\"position: relative;\">
                            ";
        // line 119
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 119, $this->source); })()), "lipides", [], "any", false, false, false, 119), 'widget', ["attr" => ["style" => "width: 100%; padding: 16px 20px 16px 52px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);"]]);
        yield "
                            <div style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 28px; height: 28px; background: #fed7aa; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#f97316\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z\"/>
                                </svg>
                            </div>
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); font-size: 0.875rem; color: #9ca3af; font-weight: 500;\">g</div>
                        </div>
                    </div>
                </div>
            </div>

            ";
        // line 132
        yield "            <div style=\"background: linear-gradient(135deg, #fff7ed, #fed7aa); padding: 32px; border-radius: 20px; border: 1px solid #fdba74; position: relative; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);\">
                <div style=\"position: absolute; top: 0; right: 0; width: 80px; height: 80px; background: linear-gradient(45deg, #f97316, #fb923c); opacity: 0.08; border-radius: 0 0 0 100%;\"></div>
                <div style=\"display: flex; align-items: center; gap: 16px; margin-bottom: 28px; position: relative; z-index: 1;\">
                    <div style=\"width: 48px; height: 48px; background: linear-gradient(135deg, #f97316, #fb923c); border-radius: 16px; display: flex; align-items: center; justify-content: center; box-shadow: 0 6px 12px rgba(249, 115, 22, 0.25);\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"white\" style=\"width: 24px; height: 24px;\">
                            <path d=\"M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z\"/>
                        </svg>
                    </div>
                    <div>
                        <h4 style=\"margin: 0; color: #c2410c; font-size: 1.5rem; font-weight: 700;\">Propriétés spéciales</h4>
                        <p style=\"color: #64748b; font-size: 0.875rem; margin: 4px 0 0 0;\">Scores et caractéristiques</p>
                    </div>
                </div>
                <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 24px; position: relative; z-index: 1;\">
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Multi Score</label>
                        <div style=\"position: relative;\">
                            ";
        // line 149
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 149, $this->source); })()), "multiScore", [], "any", false, false, false, 149), 'widget', ["attr" => ["style" => "width: 100%; padding: 16px 20px 16px 52px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);"]]);
        yield "
                            <div style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 28px; height: 28px; background: #f3e8ff; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#9333ea\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z\"/>
                                </svg>
                            </div>
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); font-size: 0.875rem; color: #9ca3af; font-weight: 500;\">pts</div>
                        </div>
                    </div>
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Repas associé</label>
                        <div style=\"position: relative;\">
                            ";
        // line 161
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 161, $this->source); })()), "repas", [], "any", false, false, false, 161), 'widget', ["attr" => ["style" => "width: 100%; padding: 16px 20px 16px 52px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04); cursor: pointer;"]]);
        yield "
                            <div style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 28px; height: 28px; background: #fef3c7; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#eab308\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"/>
                                    <circle cx=\"8.5\" cy=\"7\" r=\"4\"/>
                                    <path d=\"M20 8v6M23 11h-6\"/>
                                </svg>
                            </div>
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); pointer-events: none;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#9ca3af\" style=\"width: 20px; height: 20px;\">
                                    <path d=\"M6 9l6 6 6-6\"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div style=\"margin-top: 24px; position: relative; z-index: 1;\">
                    <div style=\"display: flex; align-items: center; gap: 16px; padding: 20px; background: white; border-radius: 12px; border: 2px solid #e5e7eb; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);\">
                        <div style=\"width: 32px; height: 32px; background: #fef2f2; border-radius: 8px; display: flex; align-items: center; justify-content: center;\">
                            ";
        // line 180
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 180, $this->source); })()), "estExcitant", [], "any", false, false, false, 180), 'widget', ["attr" => ["style" => "width: 20px; height: 20px; accent-color: #ef4444; cursor: pointer;"]]);
        yield "
                        </div>
                        <div style=\"flex: 1;\">
                            <label style=\"font-weight: 600; color: #374151; cursor: pointer; margin: 0; display: flex; align-items: center; gap: 8px;\">
                                Cet aliment est excitant
                                <span style=\"background: #fef2f2; color: #ef4444; padding: 4px 8px; border-radius: 6px; font-size: 0.75rem; font-weight: 500;\">Optionnel</span>
                            </label>
                            <p style=\"color: #6b7280; font-size: 0.75rem; margin: 4px 0 0 0;\">Cochez si l'aliment a un effet stimulant</p>
                        </div>
                    </div>
                </div>
            </div>

            ";
        // line 194
        yield "            <div style=\"display: flex; gap: 20px; justify-content: center; padding: 32px; background: linear-gradient(135deg, #f8fafc, #e2e8f0); border-radius: 20px; border: 1px solid #cbd5e1; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);\">
                <button type=\"submit\" class=\"btn btn-primary\" style=\"flex: 1; max-width: 320px; padding: 18px 36px; font-size: 1.125rem; font-weight: 700; background: linear-gradient(135deg, #3b82f6, #60a5fa); border: none; border-radius: 16px; color: white; cursor: pointer; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 16px; box-shadow: 0 8px 16px rgba(59, 130, 246, 0.2);\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"white\" style=\"width: 24px; height: 24px;\">
                        <path d=\"M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z\"/>
                        <polyline points=\"17 21 17 13 7 13 7 21\"/>
                        <polyline points=\"7 3 7 8 15 8\"/>
                    </svg>
                    ";
        // line 201
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("button_label", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 201, $this->source); })()), "Enregistrer l'aliment")) : ("Enregistrer l'aliment")), "html", null, true);
        yield "
                </button>
                <a href=\"";
        // line 203
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_aliment_index");
        yield "\" class=\"btn btn-ghost\" style=\"padding: 18px 36px; font-size: 1.125rem; font-weight: 600; border: 2px solid #e5e7eb; border-radius: 16px; color: #6b7280; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 16px; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 24px; height: 24px;\">
                        <path d=\"M18 6L6 18M6 6l12 12\"/>
                    </svg>
                    Annuler
                </a>
            </div>
        </div>

        ";
        // line 213
        yield "        <div style=\"width: 380px; position: sticky; top: 20px;\">
            <div style=\"background: linear-gradient(135deg, #fef3c7, #fed7aa); padding: 24px; border-radius: 20px; border: 1px solid #fdba74; box-shadow: 0 8px 24px rgba(251, 146, 60, 0.15); position: relative; overflow: hidden;\">
                <div style=\"position: absolute; top: 0; right: 0; width: 100px; height: 100px; background: linear-gradient(45deg, #f97316, #fb923c); opacity: 0.1; border-radius: 0 0 0 100%;\"></div>
                <div style=\"position: relative; z-index: 1;\">
                    <h4 style=\"margin: 0 0 16px 0; color: #c2410c; font-size: 1.25rem; font-weight: 700; text-align: center;\">Exemple d'aliment</h4>
                    
                    ";
        // line 220
        yield "                    <div style=\"width: 100%; height: 200px; background: linear-gradient(135deg, #fef2f2, #fee2e2); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; border: 2px solid #fecaca; position: relative; overflow: hidden;\">
                        <div style=\"position: absolute; top: 10px; right: 10px; background: #dc2626; color: white; padding: 6px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600;\">Exemple</div>
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#ef4444\" style=\"width: 80px; height: 80px; opacity: 0.3;\">
                            <path d=\"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z\"/>
                        </svg>
                        <div style=\"position: absolute; bottom: 10px; left: 10px; right: 10px; text-align: center;\">
                            <div style=\"color: #991b1b; font-size: 1.125rem; font-weight: 600;\">Pomme Rouge</div>
                            <div style=\"color: #7f1d1d; font-size: 0.875rem;\">Fruit frais</div>
                        </div>
                    </div>

                    ";
        // line 232
        yield "                    <div style=\"background: white; padding: 20px; border-radius: 12px; border: 1px solid #fed7aa;\">
                        <h5 style=\"margin: 0 0 16px 0; color: #92400e; font-size: 1rem; font-weight: 600; text-align: center;\">Valeurs nutritionnelles</h5>
                        <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 12px;\">
                            <div style=\"text-align: center; padding: 12px; background: #fef2f2; border-radius: 8px;\">
                                <div style=\"color: #dc2626; font-size: 1.25rem; font-weight: 700;\">52</div>
                                <div style=\"color: #7f1d1d; font-size: 0.75rem;\">kcal</div>
                            </div>
                            <div style=\"text-align: center; padding: 12px; background: #dbeafe; border-radius: 8px;\">
                                <div style=\"color: #2563eb; font-size: 1.25rem; font-weight: 700;\">0.3</div>
                                <div style=\"color: #1e3a8a; font-size: 0.75rem;\">prot</div>
                            </div>
                            <div style=\"text-align: center; padding: 12px; background: #dcfce7; border-radius: 8px;\">
                                <div style=\"color: #16a34a; font-size: 1.25rem; font-weight: 700;\">14</div>
                                <div style=\"color: #14532d; font-size: 0.75rem;\">gluc</div>
                            </div>
                            <div style=\"text-align: center; padding: 12px; background: #fed7aa; border-radius: 8px;\">
                                <div style=\"color: #ea580c; font-size: 1.25rem; font-weight: 700;\">0.2</div>
                                <div style=\"color: #7c2d12; font-size: 0.75rem;\">lip</div>
                            </div>
                        </div>
                    </div>

                    ";
        // line 255
        yield "                    <div style=\"margin-top: 20px; padding: 16px; background: white; border-radius: 12px; border: 1px solid #fed7aa;\">
                        <p style=\"margin: 0; color: #92400e; font-size: 0.875rem; line-height: 1.5; text-align: center;\">
                            Une pomme rouge est riche en fibres et antioxydants. Parfaite pour une collation saine et énergisante !
                        </p>
                    </div>

                    ";
        // line 262
        yield "                    <div style=\"margin-top: 16px; text-align: center;\">
                        <span style=\"background: linear-gradient(135deg, #f97316, #fb923c); color: white; padding: 8px 16px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; display: inline-block;\">
                            🍎 Aliment sain
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-control:focus, select:focus, input:focus {
            outline: none;
            border-color: #3b82f6 !important;
            background: white !important;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1) !important;
            transform: translateY(-1px);
        }
        
        .form-control:hover, select:hover, input:hover {
            border-color: #60a5fa !important;
            transform: translateY(-1px);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 32px rgba(59, 130, 246, 0.3) !important;
        }
        
        .btn-ghost:hover {
            background: #f8fafc !important;
            border-color: #d1d5db !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1) !important;
        }

        /* Responsive pour mobile */
        @media (max-width: 1024px) {
            .form-container {
                flex-direction: column;
            }
            
            .example-image {
                width: 100%;
                position: static;
            }
        }
    </style>
";
        // line 310
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 310, $this->source); })()), 'form_end');
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "aliment/_form.html.twig";
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
        return array (  406 => 310,  356 => 262,  348 => 255,  324 => 232,  311 => 220,  303 => 213,  291 => 203,  286 => 201,  277 => 194,  261 => 180,  239 => 161,  224 => 149,  205 => 132,  190 => 119,  173 => 105,  158 => 93,  139 => 76,  124 => 63,  109 => 51,  93 => 38,  79 => 27,  58 => 8,  54 => 5,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ form_start(form, {'attr': {'class': 'form-styled'}}) }}
    <div style=\"display: flex; gap: 32px; align-items: flex-start;\">
        
        {# Formulaire principal #}
        <div style=\"flex: 1; display: flex; flex-direction: column; gap: 32px; min-width: 0;\">
            
            {# Section: Informations de base #}
            <div style=\"background: linear-gradient(135deg, #f8fafc, #e2e8f0); padding: 32px; border-radius: 20px; border: 1px solid #cbd5e1; position: relative; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);\">
                <div style=\"position: absolute; top: 0; right: 0; width: 80px; height: 80px; background: linear-gradient(45deg, #3b82f6, #60a5fa); opacity: 0.08; border-radius: 0 0 0 100%;\"></div>
                <div style=\"display: flex; align-items: center; gap: 16px; margin-bottom: 28px; position: relative; z-index: 1;\">
                    <div style=\"width: 48px; height: 48px; background: linear-gradient(135deg, #3b82f6, #60a5fa); border-radius: 16px; display: flex; align-items: center; justify-content: center; box-shadow: 0 6px 12px rgba(59, 130, 246, 0.25);\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"white\" style=\"width: 24px; height: 24px;\">
                            <path d=\"M12 2L2 7l10 5 10-5-10-5z\"/>
                            <path d=\"M2 17l10 5 10-5\"/>
                            <path d=\"M2 12l10 5 10-5\"/>
                        </svg>
                    </div>
                    <div>
                        <h4 style=\"margin: 0; color: #1e40af; font-size: 1.5rem; font-weight: 700;\">Informations de base</h4>
                        <p style=\"color: #64748b; font-size: 0.875rem; margin: 4px 0 0 0;\">Nom, type et valeur calorique</p>
                    </div>
                </div>
                <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 24px; position: relative; z-index: 1;\">
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Nom de l'aliment</label>
                        <div style=\"position: relative;\">
                            {{ form_widget(form.nomAliment, {'attr': {'style': 'width: 100%; padding: 16px 20px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);'}}) }}
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); width: 24px; height: 24px; background: #f3f4f6; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#9ca3af\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z\"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Type d'aliment</label>
                        <div style=\"position: relative;\">
                            {{ form_widget(form.typeAliment, {'attr': {'style': 'width: 100%; padding: 16px 20px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);'}}) }}
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); width: 24px; height: 24px; background: #e0e7ff; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#6366f1\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M12 2L2 7l10 5 10-5-10-5z\"/>
                                    <path d=\"M2 17l10 5 10-5\"/>
                                    <path d=\"M2 12l10 5 10-5\"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Calories</label>
                        <div style=\"position: relative;\">
                            {{ form_widget(form.calories, {'attr': {'style': 'width: 100%; padding: 16px 20px 16px 52px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);'}}) }}
                            <div style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 28px; height: 28px; background: #fef3c7; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#f59e0b\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M13 2L3 14h9l-1 8 10-12h-9l1-8z\"/>
                                </svg>
                            </div>
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); font-size: 0.875rem; color: #9ca3af; font-weight: 500;\">kcal</div>
                        </div>
                    </div>
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Index glycémique</label>
                        <div style=\"position: relative;\">
                            {{ form_widget(form.indexGlycemique, {'attr': {'style': 'width: 100%; padding: 16px 20px 16px 52px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);'}}) }}
                            <div style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 28px; height: 28px; background: #e0e7ff; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#6366f1\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M22 12h-4l-3 9L9 3l-3 9H2\"/>
                                </svg>
                            </div>
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); font-size: 0.875rem; color: #9ca3af; font-weight: 500;\">IG</div>
                        </div>
                    </div>
                </div>
            </div>

            {# Section: Informations nutritionnelles #}
            <div style=\"background: linear-gradient(135deg, #f0fdf4, #dcfce7); padding: 32px; border-radius: 20px; border: 1px solid #bbf7d0; position: relative; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);\">
                <div style=\"position: absolute; top: 0; right: 0; width: 80px; height: 80px; background: linear-gradient(45deg, #22c55e, #34d399); opacity: 0.08; border-radius: 0 0 0 100%;\"></div>
                <div style=\"display: flex; align-items: center; gap: 16px; margin-bottom: 28px; position: relative; z-index: 1;\">
                    <div style=\"width: 48px; height: 48px; background: linear-gradient(135deg, #22c55e, #34d399); border-radius: 16px; display: flex; align-items: center; justify-content: center; box-shadow: 0 6px 12px rgba(34, 197, 94, 0.25);\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"white\" style=\"width: 24px; height: 24px;\">
                            <path d=\"M22 12h-4l-3 9L9 3l-3 9H2\"/>
                        </svg>
                    </div>
                    <div>
                        <h4 style=\"margin: 0; color: #15803d; font-size: 1.5rem; font-weight: 700;\">Macronutriments</h4>
                        <p style=\"color: #64748b; font-size: 0.875rem; margin: 4px 0 0 0;\">Protéines, glucides et lipides</p>
                    </div>
                </div>
                <div style=\"display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 24px; position: relative; z-index: 1;\">
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Protéines</label>
                        <div style=\"position: relative;\">
                            {{ form_widget(form.proteines, {'attr': {'style': 'width: 100%; padding: 16px 20px 16px 52px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);'}}) }}
                            <div style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 28px; height: 28px; background: #dbeafe; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#3b82f6\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z\"/>
                                </svg>
                            </div>
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); font-size: 0.875rem; color: #9ca3af; font-weight: 500;\">g</div>
                        </div>
                    </div>
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Glucides</label>
                        <div style=\"position: relative;\">
                            {{ form_widget(form.glucides, {'attr': {'style': 'width: 100%; padding: 16px 20px 16px 52px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);'}}) }}
                            <div style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 28px; height: 28px; background: #dcfce7; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#22c55e\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M12 2L2 7l10 5 10-5-10-5z\"/>
                                    <path d=\"M2 17l10 5 10-5\"/>
                                    <path d=\"M2 12l10 5 10-5\"/>
                                </svg>
                            </div>
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); font-size: 0.875rem; color: #9ca3af; font-weight: 500;\">g</div>
                        </div>
                    </div>
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Lipides</label>
                        <div style=\"position: relative;\">
                            {{ form_widget(form.lipides, {'attr': {'style': 'width: 100%; padding: 16px 20px 16px 52px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);'}}) }}
                            <div style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 28px; height: 28px; background: #fed7aa; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#f97316\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z\"/>
                                </svg>
                            </div>
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); font-size: 0.875rem; color: #9ca3af; font-weight: 500;\">g</div>
                        </div>
                    </div>
                </div>
            </div>

            {# Section: Propriétés spéciales #}
            <div style=\"background: linear-gradient(135deg, #fff7ed, #fed7aa); padding: 32px; border-radius: 20px; border: 1px solid #fdba74; position: relative; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);\">
                <div style=\"position: absolute; top: 0; right: 0; width: 80px; height: 80px; background: linear-gradient(45deg, #f97316, #fb923c); opacity: 0.08; border-radius: 0 0 0 100%;\"></div>
                <div style=\"display: flex; align-items: center; gap: 16px; margin-bottom: 28px; position: relative; z-index: 1;\">
                    <div style=\"width: 48px; height: 48px; background: linear-gradient(135deg, #f97316, #fb923c); border-radius: 16px; display: flex; align-items: center; justify-content: center; box-shadow: 0 6px 12px rgba(249, 115, 22, 0.25);\">
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"white\" style=\"width: 24px; height: 24px;\">
                            <path d=\"M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z\"/>
                        </svg>
                    </div>
                    <div>
                        <h4 style=\"margin: 0; color: #c2410c; font-size: 1.5rem; font-weight: 700;\">Propriétés spéciales</h4>
                        <p style=\"color: #64748b; font-size: 0.875rem; margin: 4px 0 0 0;\">Scores et caractéristiques</p>
                    </div>
                </div>
                <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 24px; position: relative; z-index: 1;\">
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Multi Score</label>
                        <div style=\"position: relative;\">
                            {{ form_widget(form.multiScore, {'attr': {'style': 'width: 100%; padding: 16px 20px 16px 52px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);'}}) }}
                            <div style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 28px; height: 28px; background: #f3e8ff; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#9333ea\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z\"/>
                                </svg>
                            </div>
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); font-size: 0.875rem; color: #9ca3af; font-weight: 500;\">pts</div>
                        </div>
                    </div>
                    <div style=\"display: flex; flex-direction: column;\">
                        <label style=\"font-weight: 600; color: #374151; margin-bottom: 8px; font-size: 0.875rem;\">Repas associé</label>
                        <div style=\"position: relative;\">
                            {{ form_widget(form.repas, {'attr': {'style': 'width: 100%; padding: 16px 20px 16px 52px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04); cursor: pointer;'}}) }}
                            <div style=\"position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 28px; height: 28px; background: #fef3c7; border-radius: 6px; display: flex; align-items: center; justify-content: center;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#eab308\" style=\"width: 16px; height: 16px;\">
                                    <path d=\"M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"/>
                                    <circle cx=\"8.5\" cy=\"7\" r=\"4\"/>
                                    <path d=\"M20 8v6M23 11h-6\"/>
                                </svg>
                            </div>
                            <div style=\"position: absolute; right: 16px; top: 50%; transform: translateY(-50%); pointer-events: none;\">
                                <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#9ca3af\" style=\"width: 20px; height: 20px;\">
                                    <path d=\"M6 9l6 6 6-6\"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div style=\"margin-top: 24px; position: relative; z-index: 1;\">
                    <div style=\"display: flex; align-items: center; gap: 16px; padding: 20px; background: white; border-radius: 12px; border: 2px solid #e5e7eb; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);\">
                        <div style=\"width: 32px; height: 32px; background: #fef2f2; border-radius: 8px; display: flex; align-items: center; justify-content: center;\">
                            {{ form_widget(form.estExcitant, {'attr': {'style': 'width: 20px; height: 20px; accent-color: #ef4444; cursor: pointer;'}}) }}
                        </div>
                        <div style=\"flex: 1;\">
                            <label style=\"font-weight: 600; color: #374151; cursor: pointer; margin: 0; display: flex; align-items: center; gap: 8px;\">
                                Cet aliment est excitant
                                <span style=\"background: #fef2f2; color: #ef4444; padding: 4px 8px; border-radius: 6px; font-size: 0.75rem; font-weight: 500;\">Optionnel</span>
                            </label>
                            <p style=\"color: #6b7280; font-size: 0.75rem; margin: 4px 0 0 0;\">Cochez si l'aliment a un effet stimulant</p>
                        </div>
                    </div>
                </div>
            </div>

            {# Section: Actions #}
            <div style=\"display: flex; gap: 20px; justify-content: center; padding: 32px; background: linear-gradient(135deg, #f8fafc, #e2e8f0); border-radius: 20px; border: 1px solid #cbd5e1; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);\">
                <button type=\"submit\" class=\"btn btn-primary\" style=\"flex: 1; max-width: 320px; padding: 18px 36px; font-size: 1.125rem; font-weight: 700; background: linear-gradient(135deg, #3b82f6, #60a5fa); border: none; border-radius: 16px; color: white; cursor: pointer; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 16px; box-shadow: 0 8px 16px rgba(59, 130, 246, 0.2);\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"white\" style=\"width: 24px; height: 24px;\">
                        <path d=\"M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z\"/>
                        <polyline points=\"17 21 17 13 7 13 7 21\"/>
                        <polyline points=\"7 3 7 8 15 8\"/>
                    </svg>
                    {{ button_label|default('Enregistrer l\\'aliment') }}
                </button>
                <a href=\"{{ path('app_aliment_index') }}\" class=\"btn btn-ghost\" style=\"padding: 18px 36px; font-size: 1.125rem; font-weight: 600; border: 2px solid #e5e7eb; border-radius: 16px; color: #6b7280; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 16px; background: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);\">
                    <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" style=\"width: 24px; height: 24px;\">
                        <path d=\"M18 6L6 18M6 6l12 12\"/>
                    </svg>
                    Annuler
                </a>
            </div>
        </div>

        {# Image d'exemple à droite #}
        <div style=\"width: 380px; position: sticky; top: 20px;\">
            <div style=\"background: linear-gradient(135deg, #fef3c7, #fed7aa); padding: 24px; border-radius: 20px; border: 1px solid #fdba74; box-shadow: 0 8px 24px rgba(251, 146, 60, 0.15); position: relative; overflow: hidden;\">
                <div style=\"position: absolute; top: 0; right: 0; width: 100px; height: 100px; background: linear-gradient(45deg, #f97316, #fb923c); opacity: 0.1; border-radius: 0 0 0 100%;\"></div>
                <div style=\"position: relative; z-index: 1;\">
                    <h4 style=\"margin: 0 0 16px 0; color: #c2410c; font-size: 1.25rem; font-weight: 700; text-align: center;\">Exemple d'aliment</h4>
                    
                    {# Image principale #}
                    <div style=\"width: 100%; height: 200px; background: linear-gradient(135deg, #fef2f2, #fee2e2); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; border: 2px solid #fecaca; position: relative; overflow: hidden;\">
                        <div style=\"position: absolute; top: 10px; right: 10px; background: #dc2626; color: white; padding: 6px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600;\">Exemple</div>
                        <svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#ef4444\" style=\"width: 80px; height: 80px; opacity: 0.3;\">
                            <path d=\"M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z\"/>
                        </svg>
                        <div style=\"position: absolute; bottom: 10px; left: 10px; right: 10px; text-align: center;\">
                            <div style=\"color: #991b1b; font-size: 1.125rem; font-weight: 600;\">Pomme Rouge</div>
                            <div style=\"color: #7f1d1d; font-size: 0.875rem;\">Fruit frais</div>
                        </div>
                    </div>

                    {# Informations nutritionnelles #}
                    <div style=\"background: white; padding: 20px; border-radius: 12px; border: 1px solid #fed7aa;\">
                        <h5 style=\"margin: 0 0 16px 0; color: #92400e; font-size: 1rem; font-weight: 600; text-align: center;\">Valeurs nutritionnelles</h5>
                        <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 12px;\">
                            <div style=\"text-align: center; padding: 12px; background: #fef2f2; border-radius: 8px;\">
                                <div style=\"color: #dc2626; font-size: 1.25rem; font-weight: 700;\">52</div>
                                <div style=\"color: #7f1d1d; font-size: 0.75rem;\">kcal</div>
                            </div>
                            <div style=\"text-align: center; padding: 12px; background: #dbeafe; border-radius: 8px;\">
                                <div style=\"color: #2563eb; font-size: 1.25rem; font-weight: 700;\">0.3</div>
                                <div style=\"color: #1e3a8a; font-size: 0.75rem;\">prot</div>
                            </div>
                            <div style=\"text-align: center; padding: 12px; background: #dcfce7; border-radius: 8px;\">
                                <div style=\"color: #16a34a; font-size: 1.25rem; font-weight: 700;\">14</div>
                                <div style=\"color: #14532d; font-size: 0.75rem;\">gluc</div>
                            </div>
                            <div style=\"text-align: center; padding: 12px; background: #fed7aa; border-radius: 8px;\">
                                <div style=\"color: #ea580c; font-size: 1.25rem; font-weight: 700;\">0.2</div>
                                <div style=\"color: #7c2d12; font-size: 0.75rem;\">lip</div>
                            </div>
                        </div>
                    </div>

                    {# Description #}
                    <div style=\"margin-top: 20px; padding: 16px; background: white; border-radius: 12px; border: 1px solid #fed7aa;\">
                        <p style=\"margin: 0; color: #92400e; font-size: 0.875rem; line-height: 1.5; text-align: center;\">
                            Une pomme rouge est riche en fibres et antioxydants. Parfaite pour une collation saine et énergisante !
                        </p>
                    </div>

                    {# Badge indicateur #}
                    <div style=\"margin-top: 16px; text-align: center;\">
                        <span style=\"background: linear-gradient(135deg, #f97316, #fb923c); color: white; padding: 8px 16px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; display: inline-block;\">
                            🍎 Aliment sain
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-control:focus, select:focus, input:focus {
            outline: none;
            border-color: #3b82f6 !important;
            background: white !important;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1) !important;
            transform: translateY(-1px);
        }
        
        .form-control:hover, select:hover, input:hover {
            border-color: #60a5fa !important;
            transform: translateY(-1px);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 32px rgba(59, 130, 246, 0.3) !important;
        }
        
        .btn-ghost:hover {
            background: #f8fafc !important;
            border-color: #d1d5db !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1) !important;
        }

        /* Responsive pour mobile */
        @media (max-width: 1024px) {
            .form-container {
                flex-direction: column;
            }
            
            .example-image {
                width: 100%;
                position: static;
            }
        }
    </style>
{{ form_end(form) }}", "aliment/_form.html.twig", "C:\\biosync_new\\templates\\aliment\\_form.html.twig");
    }
}
