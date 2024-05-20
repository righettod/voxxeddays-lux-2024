# Description

Contains the schemas used into the presentation.

💻 [Editor used](https://mermaid.live/).

# Mermaid code

## CSP controlled resources

```mermaid
mindmap
  root((Resources))
    Scripts
    Styles
    Fonts
    Images and favicons
    Fetch sources
    Connection sources
    Audios and videos
    Objects
    Frames
    Workers
    Forms
    ...
```

## CSP directives

```mermaid
mindmap
  root((Directives))
    default-src
    script-src
    style-src
    img-src
    font-src
    connect-src
    media-src
    frame-src
    worker-src
    ...
```

### CSP sources

```mermaid
mindmap
  root((Sources))
    righettod.eu
    *.righettod.eu
    https://*.cdn.eu
    https://*.cdn.eu:843
    http://cdn.eu/js/lib.js
    ...
```

### CSP keywords

```mermaid
mindmap
  root((Keywords))
    'none'
        Won't allow loading of any resources
    'self'
        Only allow resources from the current origin
    'unsafe-inline'
        Allow use of inline resources
    'unsafe-eval'
        Allow use of dynamic code evaluation
    ...
```
