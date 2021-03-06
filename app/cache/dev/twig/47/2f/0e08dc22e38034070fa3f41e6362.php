<?php

/* PadelLeagueBundle:Stages:create.html.twig */
class __TwigTemplate_472f0e08dc22e38034070fa3f41e6362 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("PadelLeagueBundle:Default:layout.html.twig");
        }

        return $this->parent;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 23
        $context['code'] = $this->env->getExtension('demo')->getCode($this);
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <h1>New stage</h1>
    <form action=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("create_stage", array("id" => $this->getContext($context, 'id'))), "html");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, 'form'));
        echo " id=\"login\">
        ";
        // line 6
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, 'form'));
        echo "
        <div>
            ";
        // line 8
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, 'form'), "startDate", array(), "any", false));
        echo "
            ";
        // line 9
        echo $this->env->getExtension('form')->renderErrors($this->getAttribute($this->getContext($context, 'form'), "startDate", array(), "any", false));
        echo "
            ";
        // line 10
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, 'form'), "startDate", array(), "any", false), array("attr" => array("class" => "name_field")));
        echo "
        </div>
        <div>
            ";
        // line 13
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, 'form'), "finishDate", array(), "any", false));
        echo "
            ";
        // line 14
        echo $this->env->getExtension('form')->renderErrors($this->getAttribute($this->getContext($context, 'form'), "finishDate", array(), "any", false));
        echo "
            ";
        // line 15
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, 'form'), "finishDate", array(), "any", false), array("attr" => array("class" => "name_field")));
        echo "
        </div>
        ";
        // line 17
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, 'form'));
        echo "
        <input type=\"submit\" class=\"symfony-button-grey\" value=\"REGISTER\" />
    </form>

";
    }

    public function getTemplateName()
    {
        return "PadelLeagueBundle:Stages:create.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
