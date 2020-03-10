# imtheme

a CLI tool to speed up development with [incredibletheme](https://github.com/incrediblemarketing/incredibletheme)

## Installation

Choose somewhere to install it, then:

**clone the repo**
```
git clone https://github.com/incrediblemarketing/imtheme.git
```

**navigate inside**
```
cd imtheme
```

**link CLI**
```
npm link
```

now you can run `imtheme` commands from anywhere; just don't delete your cloned repo.

## Usage

Currently there are 2 options:
1. `--block` (`-b`) - create new block
2. `--component` (`-c`) - create new component

### New block

```
imtheme -b fancy_new_block
```
This generates the following files, with the appropriate barebones markup in each:
```
components/blocks/fancy_new_block.php
assets/src/sass/components/blocks/_fancy_new_block.scss
```
This also adds a line to the blocks section in `assets/src/sass/main.scss` to import the new sass partial.

### New component

```
imtheme -c fancy_new_component
```
This generates the following files, with the appropriate barebones markup in each:
```
components/fancy_new_component.php
assets/src/sass/components/_fancy_new_component.scss
```
This also adds a line to the components section in `assets/src/sass/main.scss` to import the new sass partial.
