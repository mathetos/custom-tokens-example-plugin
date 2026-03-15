# Custom Tokens Example Plugin

A minimal WordPress plugin that demonstrates the **Design Token Extensibility API** proposed for Gutenberg. It registers three sample design tokens that appear as editable controls in the Global Styles sidebar.

## Requirements

- WordPress 6.7+
- Gutenberg plugin with the Design Token Extensibility patch applied

## What it does

The plugin calls `register_design_token()` to register three tokens:

| Token | Type | Default | CSS Variable |
|-------|------|---------|--------------|
| Card Border Radius | `border-radius` | `8px` | `--wp--custom--custom-tokens-sample-card-radius` |
| Accent Color | `color` | `#0073aa` | `--wp--custom--custom-tokens-sample-accent-color` |
| Section Spacing | `spacing` | `2rem` | `--wp--custom--custom-tokens-sample-section-spacing` |

Once the plugin is active, navigate to **Appearance → Editor → Design → Styles** and you will see a new **Custom tokens** section with controls for each token.

## The two registration paths

This plugin uses the **PHP runtime API** (`register_design_token()`), which is intended for plugins.

Themes should prefer the **declarative theme.json path** — add UI metadata under `settings.customTokenDefinitions`:

```json
{
  "settings": {
    "custom": {
      "buttonRadius": "0.5rem"
    },
    "customTokenDefinitions": {
      "buttonRadius": {
        "label": "Button border radius",
        "type": "border-radius"
      }
    }
  }
}
```

Both paths feed the same merged registry; the editor receives a single list of tokens and renders controls accordingly.

## Related

- [Design Token Extensibility GitHub Issue](https://github.com/WordPress/gutenberg/issues/XXXXX)
- [Proposal: Standardized block markup, theme.json design tokens #38998](https://github.com/WordPress/gutenberg/issues/38998)

## License

GPL-2.0-or-later
