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

/* index.html.twig */
class __TwigTemplate_4d8153ba8c6731ae4bc589b46f79a1ff extends Template
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
        // line 1
        yield "<!doctype html>
<html>
<head>
    <title>MDB Web Ban List</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
    <script src=\"https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4\"></script>
</head>
<body class=\"flex w-[100%] flex-col flex-wrap\">
  <table class=\"border-collapse border border-gray-400 w-[100%]\" role=\"table\">
      <thead>
      <tr>
          <th class=\"p-5 border border-gray-300\">Player</th>
          <th class=\"p-5 border border-gray-300\">mID</th>
          <th class=\"p-5 border border-gray-300\">SteamID</th>
      </tr>
      </thead>
      <tbody>
      ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 19
            yield "      <tr>
          <td class=\"border border-gray-300 text-center\">";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "PlayerName", [], "any", false, false, false, 20), "html", null, true);
            yield "</td>
          <td class=\"border border-gray-300 text-center\">";
            // line 21
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "PlayerId", [], "any", false, false, false, 21), "html", null, true);
            yield "</td>
          <td class=\"border border-gray-300 text-center\">";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "PlayerSteamId", [], "any", false, false, false, 22), "html", null, true);
            yield "</td>
      </tr>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        yield "      </tbody>
  </table>
</body>
</html>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "index.html.twig";
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
        return array (  85 => 25,  76 => 22,  72 => 21,  68 => 20,  65 => 19,  61 => 18,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "index.html.twig", "C:\\wamp64\\www\\WebBanList\\views\\index.html.twig");
    }
}
