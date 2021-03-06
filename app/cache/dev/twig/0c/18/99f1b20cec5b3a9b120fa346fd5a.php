<?php

/* PadelLeagueBundle:Teams:manager.html.twig */
class __TwigTemplate_0c1899f1b20cec5b3a9b120fa346fd5a extends Twig_Template
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

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <h1>Select league</h1>

    ";
        // line 6
        if (twig_test_empty($this->getContext($context, 'error'))) {
            // line 7
            echo "        <table id=\"tablesorter-teams\" class=\"tablesorter\"> 
            <thead> 
                <tr> 
                    <th>Teams</th> 
                    <th>Cars</th>
                </tr> 
            </thead> 
            <tbody> 
            ";
            // line 15
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'teams'));
            foreach ($context['_seq'] as $context['_key'] => $context['team']) {
                echo "               
                <tr>
                    <td>";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'team'), "name1", array(), "any", false), "html");
                echo "</td>
                    <td>                    
                        <select>
                          <option value=\"volvo\">Volvo</option>
                          <option value=\"saab\">Saab</option>
                          <option value=\"mercedes\">Mercedes</option>
                          <option value=\"audi\">Audi</option>
                        </select>
                    </td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['team'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 27
            echo "            
            </tbody> 
        </table> 
    ";
        } else {
            // line 31
            echo "        ";
            echo twig_escape_filter($this->env, $this->getContext($context, 'error'), "html");
            echo "
    ";
        }
        // line 33
        echo "    <form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("team_division"), "html");
        echo "\" id=\"login\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, 'form'));
        echo ">
    ";
        // line 34
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, 'form'));
        echo "

    <input type=\"submit\" class=\"symfony-button-grey\" value=\"SAVE\" />
    </form>
";
    }

    public function getTemplateName()
    {
        return "PadelLeagueBundle:Teams:manager.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
