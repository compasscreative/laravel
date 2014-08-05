# Bower proposal

I’ve included a bower.json manifest file to make updating packages simple. Just run this from the public/vendor dir:

```
bower update
```

## Respond.js
I have a gulp task to build the respond file from bower. This way we don’t have to include the respond bower files in git, but can still have the latest respond.js.

## Modernizr
I’ve kept modernizr outside of bower so we can have a customized version of it. Eventually we should be able to build our own modernizr file on demand. See: https://github.com/doctyper/customizr
