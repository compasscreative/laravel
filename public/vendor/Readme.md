# Bower proposal

I’ve included a bower.json manifest file to make updating packages simple. Just run this from the public/vendor dir:

```
bower update
```

## Respond.js
 I’m including respond.js in git so we can link to it directly

## Modernizr
I’ve kept modernizr outside of bower so we can have a customized version of it. Eventually we should be able to build our own modernizr on demand. See: https://github.com/doctyper/customizr
