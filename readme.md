# Kirby File Types
A little hack to show file fields only for specific file types.

## Installation
To install the plugin, please put it in the `site/plugins` directory.  
The plugin folder must be named `file-types`.

```
site/plugins/
    file-types/
        file-types.php
        ...
```

## Blueprint
You can now use the `fileType` attribute in the field declarations.
```yml
# site/blueprints/fields/meta.yml

type: group
fields:

  label:
    label: Label
    type: text
    required: true
    fileType:
      - document
      - archive

  focus:
    label: Focus
    type: focus
    fileType: image

```
